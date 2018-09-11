<?PHP

require_once('View.php');

class SellerProfileView extends View
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
	
		$lots = $this->auctions->get_lots_by_seller($this->user->id);

		foreach ($lots as $lot)
		{
			if (count($lot->bets) > 0) $lot->max_price = $lot->bets[0]->value;
			else $lot->max_price = $lot->price;
			
			$lot->next_bet = ceil($lot->bets[0]->value*1.1);
			
			
		}

		$this->design->assign('lots', $lots);
		
		$this->design->assign('meta_title', $this->user->login.' - кабинет продавца');
		$body = $this->design->fetch('seller_profile.tpl');
		
		return $body;
	}
}
