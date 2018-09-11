<?PHP

require_once('api/Simpla.php');

class AuctionsAdmin extends Simpla
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
					$lots = $this->auctions->get_auction_lots(intval($_GET['id']));
					
					
					if (!empty($lots)) 
						$this->design->assign('message_error','lots_exists');
					
					if (empty($lots)) 
						$this->auctions->delete_auction($_GET['id']);

		        	break;
				}
			}
		}	

		$auctions = $this->auctions->get_auctions(array('calc_summ'=>1));
 
		$this->design->assign('auctions', $auctions);
		return $this->body = $this->design->fetch('auctions.tpl');
	}
}

