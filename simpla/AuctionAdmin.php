<?PHP

require_once('api/Simpla.php');

class AuctionAdmin extends Simpla
{
	function fetch()
	{

		// Обработка действий 	
		if($this->request->method('post'))
		{

			$error_type = '';
			$auction->id = 			$this->request->post('id', 'integer');
			$auction->name = 		$this->request->post('name');
			$auction->description =	$this->request->post('description');
			$auction->duration = 	$this->request->post('duration');

			$date_start = $this->request->post('date_start');
			$date_end = $this->request->post('date_end');
			$time_start = $this->request->post('time_start');
			$time_end = $this->request->post('time_end');			
			
			$auction->date_start = 	$date_start.' '.$time_start;
			$auction->date_end = 	$date_end.' '.$time_end;

    		$date_closing = $this->auctions->set_moments($auction->id);

    		$moment = date_create_from_format('Y-m-d H:i', $auction->date_start);
    		    		
			$moment = date_format($moment, 'U');

			settype($moment, 'integer');
			
    		$moment_yestoday = date('Y-m-d H:i:s', intval($moment) - 60*60*24);

    		$moment_starting = date('Y-m-d H:i:s', intval($moment));

		$this->bots->deactivate();

    		
    		$this->notify->add_task(array(
    			'date'=>$moment_yestoday, 
    			'action'=>'before_auction_start', 
    			'auction_id'=>$auction->id, 
    			'check_dublicate'=>1)
    		);
    		
    		$this->notify->add_task(array(
    			'date'=>$date_closing, 
    			'action'=>'after_auction_end', 
    			'auction_id'=>$auction->id, 
    			'check_dublicate'=>1)
    		);

    		$this->notify->add_task(array(
    			'date'=>$date_closing, 
    			'action'=>'deactivate_robots', 
    			'auction_id'=>$auction->id, 
    			'check_dublicate'=>1)
    		);    		


    		$this->notify->add_task(array(
    			'date'=>$moment_starting, 
    			'action'=>'activate_robots', 
    			'auction_id'=>$auction->id, 
    			'check_dublicate'=>1)
    		);

			
			$compare_date_start = 	(int)strtotime($auction->date_start);
			$compare_date_end = 	(int)strtotime($auction->date_end);		
			
			// проверка на парадоксы
			if ($compare_date_start > $compare_date_end) $error_type = 'invalid_date';

			// Если ошибки нет то начинаем работу с БД
			if ($error_type == '')
			{
				if(empty($auction->id))
				{
	  				$auction->id = $this->auctions->add_auction($auction);
					$this->design->assign('message_success', 'added');
	  			}
	    		else
	    		{
	    			$this->auctions->update_auction($auction->id, $auction);
					$this->design->assign('message_success', 'updated');
	    		}	
				header("Location: index.php?module=AuctionsAdmin");	    		
	    	}

    		$this->design->assign('message_error', $error_type);    		
    		
    		$this->load_data($_GET['id']);  


    		return $this->body = $this->design->fetch('auction.tpl');

		}	

		else 
		{

			if (isset($_GET['id']))	
			{
				$this->load_data($_GET['id']);
			}

			return $this->body = $this->design->fetch('auction.tpl');

		}
		
	}

	private function load_data($id)
	{
		$auction = $this->auctions->get_auction($this->request->get('id'));
		$date_start = strtotime($auction->date_start);
		$date_end = strtotime($auction->date_end);
		$auction->date_start = date('Y-m-d', $date_start);
		$auction->date_end = date('Y-m-d', $date_end);				
		$auction->time_start = date('H:i', $date_start);
		$auction->time_end = date('H:i', $date_end);
		$this->design->assign('auction',$auction);
	}
}

