<?PHP

require_once('api/Simpla.php');

class LotsAdmin extends Simpla
{
	function fetch()
	{

		// Обработка действий 	
		if($this->request->method('get'))
		{

			switch($this->request->get('action'))
			{
				case 'delete':
				{
					$bets = $this->auctions->get_auction_bets($_GET['id']);					
					$lots = $this->auctions->get_auction_lots($_GET['id']);	
					
					if (!empty($bets)) 
						$this->design->assign('message_error','bets_exists');
					
					if (!empty($lots)) 
						$this->design->assign('message_error','lots_exists');
					
					if (empty($bets) && empty($lots)) 
						$this->auctions->delete_auction($_GET['id']);

		        	break;
				}
			}
		}	





		$auctions = $this->auctions->get_auctions();
 
		$this->design->assign('auctions', $auctions);
		return $this->body = $this->design->fetch('auctions.tpl');
	}
}

