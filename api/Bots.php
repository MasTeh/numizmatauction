<?php 

require_once('Simpla.php');


class Bots extends Simpla
{

	private $male_count = 0.8;
	private $female_count = 0.1;
	private $hach_count = 0.1;
	private $part_size = 30;

	public function generate_bots()
	{
		$this->db->query("DELETE FROM __users WHERE bot=1");

		require_once('bots/hach_fam.php');
		require_once('bots/hach_names.php');
		require_once('bots/male_fam.php');
		require_once('bots/male_names.php');
		require_once('bots/male_otch.php');
		require_once('bots/female_otch.php');
		require_once('bots/female_name.php');		
		require_once('bots/female_fam.php');
		require_once('bots/nicknames.php');

		$users = array();
		$nick_ind = 0;

		$count = count($nicknames);

		for ($i = 0; $i <= ceil($count*$this->male_count); $i++)
		{
			$user = array(
				'name' => $this->rand_elem($male_names),
				'fam'  => $this->rand_elem($male_fam),
				'otch' => $this->rand_elem($male_otch),
				'email'=> $this->users->rand_str().'@noreply.ru',
				'login'=> $nicknames[$nick_ind],
				'password'=> '123',
				'bot'  => 1,
				'buyer' => 1
			);

			$nick_ind++;

			$users[] = $user;
		}

		for ($i = 0; $i <= ceil($count*$this->female_count); $i++)
		{
			$user = array(
				'name' => $this->rand_elem($female_names),
				'fam'  => $this->rand_elem($female_fam),
				'otch' => $this->rand_elem($female_otch),
				'email'=> $this->users->rand_str().'@noreply.ru',
				'login'=> $nicknames[$nick_ind],
				'password'=> '123',				
				'bot'  => 1,
				'buyer' => 1
			);

			$nick_ind++;

			$users[] = $user;
		}

		for ($i = 0; $i <= ceil($count*$this->hach_count); $i++)
		{
			$user = array(
				'name' => $this->rand_elem($hach_names),
				'fam'  => $this->rand_elem($hach_fam),
				'email'=> $this->users->rand_str().'@noreply.ru',
				'login'=> $nicknames[$nick_ind],
				'password'=> '123',				
				'bot'  => 1,
				'buyer' => 1
			);

			$nick_ind++;

			$users[] = $user;
		}

		

		foreach ($users as $u)	$this->users->add_user($u);

	}

	public function activate($data)
	{
		$i=0;
                $time_start = microtime(true);
                
                $this->part_size = (int)$this->settings->part_size;
		$last_cron_time = floatval($this->settings->cron_time);

		if ($last_cron_time <= 0.9) $this->settings->part_size = $this->part_size + 10;
		else $this->settings->part_size = $this->part_size - 10;
		              
		$act_limit = $this->settings->bot_activation_limit;
		if (empty($act_limit)) $this->settings->bot_activation_limit = $this->part_size;
		
		$limit_from = $act_limit - $this->part_size;
		if ($limit_from < 0) 
			$limit = strval($this->part_size);
		else
			$limit = strval($limit_from).','.strval($this->part_size);
		                                                          
		$this->settings->bot_current_interval = $limit;
		
		$lots = $this->auctions->get_lots_processor(array('auction_id'=>$data->auction_id, 'limit'=>$limit));
//echo "<pre>"; print_r($lots); die();
		if (empty($lots))
		{
			$this->settings->bot_activation_limit = $this->part_size; 
			return false;
		}

		foreach ($lots as $lot)
		{
			$i++;
			
			$variants = $this->comvariants->get_variants(array('product_id'=>$lot->product_id));
			$lot->price = intval($variants[0]->price);

			$this->db->query("SELECT id FROM __users WHERE bot=1");
			$bots = $this->db->results();
			            
			if (intval($lot->price)==0) $lot->price=1;

			$lot->begin = $this->date_to_int($lot->time_start) + 60*60*2;
			$lot->end = $this->date_to_int($lot->time_end);
			$lot->interval = $lot->end - $lot->begin;
			$lot->bets_needed = $this->super_logarifm($lot->price);

			$players_count = ceil($lot->bets_needed/rand(2, 5));

			$players = array();

			$j = 0;
			for ($j = 0; $j < $players_count; $j++)
			{
				$player = $this->rand_elem($bots);
				$players[] = $player->id;
			}

			$lot->players = $players;

			if ($lot->bets_needed==0)
				$lot->bets_interval = 0;
			else
				$lot->bets_interval = ceil($lot->interval / $lot->bets_needed);
			 
		}
                //echo "<pre>"; print_r($lots); die();
		$intents = array();
		$query = "INSERT INTO s_tasks (date, action, auction_id, lot_id, user_id, done) VALUES ";
		$inserts = array();
		foreach ($lots as $lot)
		{						
			$m = 0;
			$user_id = 0;
			$prev_user_id = 0;
			$time_interval = 0;			
			while ($m < $lot->bets_needed)
			{
				$user_id = $this->rand_elem($lot->players);
				if ($user_id != $prev_user_id)
				{
					$time_interval = $time_interval + rand(ceil($lot->bets_interval/2), $lot->bets_interval);
					$bet_time = $lot->begin + $time_interval;

					$bet_time_str = date('Y-m-d H:i:s', $bet_time);

					// $intent = array(
					// 	'lot_id'=>$lot->lot_id,
					// 	'user_id'=>$user_id, 
					// 	'auction_id'=>$data->auction_id, 
					// 	'date'=>$bet_time_str,
					// 	'action'=>'set_bet'
					// );


					$inserts[] = $this->db->placehold("(?, 'set_bet', ?, ?, ?, 0)",
						$bet_time_str, $data->auction_id, $lot->lot_id, $user_id);
		    							

					$prev_user_id = $user_id;

					$m++;
				}

			}
		}

		$query .= implode(',', $inserts).';';
		
		$this->db->query($query);

		$this->settings->bot_activation_limit = $act_limit + $this->part_size;

    		$this->notify->add_task(array(
    			'date'=>'NOW()', 
    			'action'=>'activate_robots', 
    			'auction_id'=>$data->auction_id)
    		);		

		$time_end = microtime(true); 
		$this->settings->cron_time = $time_end-$time_start;

	}

	public function deactivate()
	{
		$this->db->query("DELETE FROM __tasks WHERE action='set_bet'");
		$this->db->query("DELETE FROM __tasks WHERE action='activate_robots'");
		$this->db->query("DELETE FROM __tasks WHERE action='deactivate_robots'");
		$this->settings->bot_activation_limit = $this->part_size;
		$this->settings->part_size = 30;
	}	

	public function rand_elem($arr)
	{
		if (is_array($arr))
			return $arr[rand(0, count($arr)-1)];
		else
			return false;
	}

	public function screen($arr)
	{
		echo "<pre>";
		print_r($arr);
		die();
	}

	public function date_to_int($date)
	{
		return intval(strtotime($date));
	}

	public function super_logarifm($y)
	{
		$i = 0;
		$x = 1;
		while ($x < $y)
		{
			$x = ceil($x*1.1);
			$i++;
		}
		return $i;
	}


}