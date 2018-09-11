<?PHP

require_once('View.php');

class LotView extends View
{

	function fetch()
	{
		
		$lot_id = $this->request->get('lot_id', 'integer');

		$lots = $this->auctions->get_lots(array('id'=>$lot_id));
		$lot = $lots[0];


		if (!empty($lot->bets))
		{
			$lot->max_price = $lot->bets[0]->value;
		}
		else
		{
			$lot->max_price = 1;
		}

		$lot->bet_size = ceil($lot->max_price*0.1);
		$lot->next_bet = ceil($lot->max_price*1.1);

		//$this->design->assign('meta_title',$lot->product->name.' - '.$settings->site_name);

		$_now = getdate();
		$now = $_now[0]; 
		$time_end = strtotime($lot->time_end);
		$time_left = intval($time_end) - intval($now);
		$this->design->assign('time_left', $time_left);
		                               
		$bets = $this->auctions->get_lot_bets($lot->id); 		

		$this->design->assign('lot', $lot);

		if ($this->user)
		{
			$autobid = $this->auctions->get_user_autobid($lot->id, $this->user->id);
			if ($autobid != false) $this->design->assign('autobid', $autobid);
		}


		//echo "<pre>"; print_r($autobid); die();		


		$this->design->assign('meta_title', 'Лот '.$lot->product->name.' - '.$this->settings->site_name);

		return $this->design->fetch('lot.tpl');

	}


}