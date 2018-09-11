<?PHP

require_once('View.php');

class BetsProfileView extends View
{
	function fetch()
	{ 
		if(empty($this->user))
		{
			header('Location: '.$this->config->root_url.'/user/login');
			exit();
		}
	
		if($this->request->method('post'))
		{
	
		
		}

		$reverse = false;
		$auction_id = $this->settings->current_auction;
		
		if (isset($_GET['history']))
		{
			//$auction_id = 0;
			$reverse = true;
			$this->design->assign('is_history', true);
		}
	
		$lots = $this->auctions->get_lots_by_user($this->user->id, $auction_id, $reverse);

		foreach ($lots as $lot)
		{
			$lot->max_price = $lot->bets[0]->value;
			$lot->next_bet = ceil($lot->bets[0]->value*1.1);
			$lot->autobid = $this->auctions->get_user_autobid($lot->lot_id, $this->user->id);
			
		}

		$this->design->assign('lots', $lots);
		
		$this->design->assign('meta_title', $this->user->login.' - кабинет продавца');
		$body = $this->design->fetch('buyer_profile.tpl');
		
		return $body;
	}
}
