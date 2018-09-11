<?PHP

require_once('api/Simpla.php');

class LotsAdmin extends Simpla
{
	function fetch()
	{
//echo "<pre>"; print_r($_POST); die();
		$current_auction = $this->request->get('current_auction','integer');
		$status_filter = $this->request->get('filter');
		$this->design->assign('filter',$status_filter);
		$this->design->assign('current_auction', $current_auction);

		
		$status_filter = 0;


		// Обработка действий 	
		if($this->request->method('post'))
		{
			switch($this->request->post('action'))
			{
				case 'delete':
				{					
					foreach ($_POST['check'] as $lot_id) 
						$this->auctions->lot_to_product($lot_id);
		        	break;
				}
			}
		}

		// Что показывать 	
		if($this->request->method('get'))
		{

			switch($this->request->get('filter'))
			{
				case 'preparing':
				{
					$status_filter = 1;
					break;
				}				
				case 'trading':
				{
					$status_filter = 2;
					break;
				}		
				case 'waiting_pay':
				{
					$status_filter = 3;
					break;
				}
				case 'sold':
				{
					$status_filter = 4;
					break;
				}														
				case 'dont_sold':
				{
					$status_filter = 5;
					break;
				}						
			}

		}			
		
		if (isset($_POST['keyword']))
			$keyword = $this->request->post('keyword');



		if (isset($_GET['current_auction']))
		$filter['auction_id'] = $this->request->get('current_auction','integer');

		$filter['minimal'] = 1;
		$filter['no_bets'] = 1;

		if (isset($_GET['filter']))
		$filter['status'] = $_GET['filter'];

		if (isset($_GET['category_id']))
		$filter['category_id'] = $_GET['category_id'];


		if (isset($_GET['keyword'])) { $filter['keyword'] = $_GET['keyword']; $this->design->assign('keyword', $_GET['keyword']); }

		// Постраничная навигация


		$filter['page'] = max(1, $this->request->get('page', 'integer'));
			
		$filter['limit'] = $this->settings->products_num_admin;



	  	$products_count = $this->auctions->count_lots($filter);
		// Показать все страницы сразу
		if($this->request->get('page') == 'all')
			$filter['limit'] = $products_count;
		
		if($filter['limit']>0)	  	
		  	$pages_count = ceil($products_count/$filter['limit']);
		else
		  	$pages_count = 0;
	  	$filter['page'] = min($filter['page'], $pages_count);
	 	$this->design->assign('products_count', $products_count);
	 	$this->design->assign('pages_count', $pages_count);
	 	$this->design->assign('current_page', $filter['page']);



		// Постраничная навигация END


		$lots = $this->auctions->get_lots_frontend($filter);


		//echo "<pre>"; print_r($lots); die();
 
		$this->design->assign('lots', $lots);
		$this->design->assign('auctions', $this->auctions->get_auctions(array('no_lots'=>1)));
		$this->design->assign('categories', $this->categories->get_categories());

		return $this->body = $this->design->fetch('lots.tpl');
	}
}

