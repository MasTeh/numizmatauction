<?php



require_once('Simpla.php');

class Auctions extends Simpla
{

	public function get_auctions($filter = array())
	{		

		$auctions = array();
		$auction_id_filter = '';
		$visible_filter = '';
		if(isset($filter['visible']))
			$visible_filter = $this->db->placehold('AND visible=?', intval($filter['visible']));

		$in_future_filter = '';
		if(isset($filter['in_future']))
			$in_future_filter = ' AND date_start > NOW() ';

		$at_current_time_filter = '';
		if(isset($filter['at_current_time']))
			$at_current_time_filter = ' AND date_start < NOW() AND date_closing > NOW() ';		

		$order = "date_start DESC";
		if(isset($filter['order']))
			$order = $filter['order'];		

		// Выбираем все аукционы
		$query = $this->db->placehold("SELECT * FROM __auctions WHERE 1 
											$visible_filter 
											$in_future_filter
											$at_current_time_filter 
										ORDER BY $order");
		$this->db->query($query);

		$items = $this->db->results();

		$i = 0;

		foreach ($items as $item) {
			$_date = strtotime($item->date_start);
			$item->date_label1 = date("d.m", $_date);
			$_date = strtotime($item->date_end);
			$item->date_label2 = date("d.m", $_date);		
			$item->sum = 0;

			

		}

		return $items;
	}


	public function get_auction($id)
	{
		$query = $this->db->placehold("SELECT * FROM __auctions WHERE id=?", (int)$id);
		$this->db->query($query);
		return $this->db->result();
	}

	public function get_min_price($lot_id)
	{
		$query = $this->db->placehold("SELECT price FROM __comvariants WHERE product_id IN 
										(SELECT product_id FROM __lots WHERE id=?)", (int)$lot_id);
		$this->db->query($query);
		$variants = $this->db->results();

		return $variants[0]->price;
	}

	public function get_last_bet($lot_id)
	{
		$query = $this->db->placehold("SELECT value FROM __bets WHERE lot_id=? ORDER BY value DESC LIMIT 1", (int)$lot_id);
		$this->db->query($query);
		$last_bet = $this->db->result('value');
		if (empty($last_bet)) return 1;
		else return intval($last_bet);
	}		

	public function get_lot_bets($id)
	{
		$query = $this->db->placehold("SELECT * FROM __bets WHERE lot_id=? ORDER BY value DESC", (int)$id);
		$this->db->query($query);
		$items = $this->db->results();
		foreach ($items as $item) {
			$item->user = $this->users->get_user((int)$item->user_id);
		}
		return $items;		
	}	

	public function get_last_player($lot_id)
	{
		$query = $this->db->placehold("SELECT user_id FROM __bets WHERE lot_id=? ORDER BY value DESC", (int)$lot_id);
		$this->db->query($query);
		$user = $this->db->result();
		if (empty($user))
			return false;
		else
			return $user->user_id;
	}

	public function add_bet($lot_id, $user_id, $value)
	{	
		$last_bet = $this->get_last_bet($lot_id);

		if ($value < ceil($last_bet*1.1)) return false;

		$this->db->query("INSERT INTO __bets SET lot_id=?, user_id=?, value=?, created=NOW()", $lot_id, $user_id, $value);
		$insert_id = $this->db->insert_id();
		$bets = $this->get_lot_bets($lot_id);
		$this->update_lot($lot_id, array('cost'=>$value, 'bets_count'=>count($bets)));
		return $insert_id;
	}

	public function set_autobid($lot_id, $user_id, $value)
	{		
		$query = $this->db->placehold('SELECT id FROM __autobids WHERE lot_id=? AND value=?', (int)$lot_id, (int)$value);
		$this->db->query($query);
		$data = $this->db->result();
		if (!empty($data)) $value = intval($value)+1;

		$query = $this->db->placehold('SELECT id FROM __autobids WHERE lot_id=? AND user_id=?', (int)$lot_id, (int)$user_id);
		$this->db->query($query);
		$data = $this->db->result();
		if (empty($data))
			$this->db->query("INSERT INTO __autobids SET lot_id=?, user_id=?, value=?, time=NOW()", $lot_id, $user_id, $value);
		else
			$this->db->query("UPDATE __autobids SET value=? WHERE lot_id=? AND user_id=?", $value, (int)$lot_id, (int)$user_id);
	}	

	public function get_user_autobid($lot_id, $user_id)
	{
		$query = $this->db->placehold('SELECT value FROM __autobids WHERE lot_id=? AND user_id=? LIMIT 1', (int)$lot_id, (int)$user_id);

		$this->db->query($query);		
		$data = $this->db->result();

		if (empty($data)) return false;
		else return $data->value;		
	}

	public function get_lot_autobids($lot_id)
	{
		$this->db->query('SELECT * FROM __autobids WHERE lot_id=? ORDER BY time DESC', (int)$lot_id);
		return $this->db->results();
	}	

	public function delete_autobid($user_id, $lot_id)
	{
		$this->db->query('DELETE FROM __autobids WHERE user_id=? AND lot_id=?', (int)$user_id, (int)$lot_id);
	}

	public function get_lot_winner($id)
	{
		$query = $this->db->placehold("SELECT * FROM __bets WHERE lot_id=? ORDER BY value DESC", (int)$id);
		$this->db->query($query);
		$bet = $this->db->result();
		if (!empty($bet))
		{
			$query = $this->db->placehold("SELECT * FROM __users WHERE id=?", $bet->user_id);
			$this->db->query($query);
			$bet->user = $this->db->result();
			
			return $bet;
		}
		else
			return false;
	}

	public function get_auction_bets($id)
	{
		$query = $this->db->placehold("SELECT * FROM __bets WHERE auction_id=? ORDER BY value DESC", $id);
		$this->db->query($query);
		return $this->db->results();		
	}

	public function get_auction_lots($id)
	{
		$query = $this->db->placehold("SELECT * FROM __lots WHERE auction_id=?", $id);
		$this->db->query($query);
		return $this->db->results();		
	}


	public function add_auction($auction)
	{
	
		$this->db->query("INSERT INTO __auctions SET ?%", $auction);
		return $this->db->insert_id();
	}

	
	public function update_auction($id, $auction)
	{
		$query = $this->db->placehold("UPDATE __auctions SET ?% WHERE id=? LIMIT 1", $auction, intval($id));
		$this->db->query($query);
		return $id;
	}

	public function update_lot($id, $lot)
	{
		$query = $this->db->placehold("UPDATE __lots SET ?% WHERE id=? LIMIT 1", $lot, intval($id));
		$this->db->query($query);
		return $id;
	}	
	

	public function delete_auction($id)
	{

		$query = $this->db->placehold("DELETE FROM __auctions WHERE id=? LIMIT 1", $id);
		$this->db->query($query);		

	}

	public function add_lot($lot)
	{
		$this->db->query("INSERT INTO __lots SET ?%", $lot);
		return $this->db->insert_id();		
	}

	public function delete_lot($id)
	{

		$query = $this->db->placehold("DELETE FROM __lots WHERE id=? LIMIT 1", $id);
		$this->db->query($query);		

	}	

	public function get_lot($id)
	{
		$query = $this->db->placehold("SELECT * FROM __lots WHERE id=?", (int)$id);
		$this->db->query($query);
		$lot = $this->db->result();

		if ($lot->product_id > 0)
			$product = $this->comproducts->get_products(array('id'=>$lot->product_id));
		else
			return false;	

		$lot->product = $product[0];
		$variants = $this->comvariants->get_variants(array('product_id'=>$lot->product->id));
		$lot->product->price = $variants[0]->price;
		$lot->product->sku = $variants[0]->sku;

		$this->db->query('SELECT * FROM __bets WHERE lot_id=? ORDER BY value DESC', $lot->id);
		$lot->bets = $this->db->results();


		if ($lot->product->user_id > 0)
			$lot->user = $this->users->get_user((int)$lot->product->user_id);
		else
			return false;	

		return $lot;

	}

	public function get_lots_processor($filter = array())
	{                                  
		$lot_id_f = '';
		$user_f = '';
		$status_f = '';
		$closed_f = '';
		$auction_f = '';

		if (isset($filter['id']))
			$lot_id_f = $this->db->placehold('AND l.id in(?@)', (array)$filter['id']);


		if (isset($filter['auction_id']))
			$auction_f = ' AND auction_id='.intval($filter['auction_id']);

		if (isset($filter['closed']))
		{			
			$closed_f = ' AND l.time_end < NOW()';
		}

		$limit = ' LIMIT 100';
		if (isset($filter['limit'])) $limit = 'LIMIT '.$filter['limit'];

		if (isset($filter['user_id']))
			$user_f = ' AND p.user_id='.intval($filter['user_id']);

		if (isset($filter['status']))
			$status_ff = ' AND l.status='.intval($filter['status']);		


		$sort = 'l.id ASC';
		if (isset($_GET['sort']))
		{	if ($_GET['sort']=='name_up') $sort = 'p.name ASC'; elseif ($_GET['sort']=='name_down') $sort = 'p.name DESC';	}

		if (isset($_GET['sort']))
		{	if ($_GET['sort']=='id_up') $sort = 'l.id ASC'; elseif ($_GET['sort']=='id_down') $sort = 'l.id DESC';	}

		

		$query = "SELECT 
					l.id as lot_id,
					l.trade_number as trade_number,
					l.auction_id as auction_id,
					l.featured as featured,
					l.time_start as time_start,
					l.time_end as time_end,
					l.status as status,
					p.id as product_id,
					p.url as url,
					p.name as name,
					p.created,
					u.id as user 

				FROM __lots l 
					LEFT JOIN __comproducts p ON l.product_id = p.id 
					LEFT JOIN __users u ON p.user_id = u.id 
				WHERE
					1
					$auction_f
					$status_f 
					$lot_id_f 
					$user_f
					$closed_f 
				ORDER BY 
					$sort
					$limit
				";
			   //print('<br><br>');    print($query);die();
		$this->db->query($query); 
		$lots = $this->db->results();
		       
		if (isset($filter['bets']))
		{
			foreach ($lots as $lot) {
				$lot->bets = $this->get_lot_bets($lot->lot_id);
			}
		}		
		else
		{
			foreach ($lots as $lot) {
				$lot->max_bet = $this->get_last_bet($lot->lot_id);
				$lot->winner = $this->users->get_user(intval($this->get_last_player($lot->lot_id)));
			}
		}
		
		if (isset($filter['get_variant_id']))
		{
			foreach ($lots as $lot) {
				$variants = $this->comvariants->get_variants(array('product_id'=>$lot->product_id));
				$lot->vairant_id = $variants[0]->id;
			}
		}		
				
		return $lots;

	}


	public function get_lots($filter = array())
	{
		$id_f = '';
		$auction_f = '';
		$order = 'order_num_int ASC';
		$status_f = '';
		$keyword_f = '';
		$page_count = $this->settings->products_num_admin;
		$limit_f = ' LIMIT '.$page_count;

		if (!empty($filter['id']))
			$id_f = $this->db->placehold('AND id in(?@)', (array)$filter['id']);

		$product_id_f = '';
		if (!empty($filter['product_id']))
			$product_id_f = $this->db->placehold('AND product_id=?', $filter['product_id']);

		if (!empty($filter['auction_id']))
			$id_f = ' AND auction_id='.intval($filter['auction_id']);

 		if(!empty($filter['order']))
			$order = $filter['order'];

		if(!empty($filter['keyword']) && $filter['keyword']!='')
			$keyword_f = $this->db->placehold('AND name LIKE "%?%"', $filter['keyword']);

 		if(!empty($filter['status']))
			$status_f = " AND status=".$filter['status'];

 		if(!empty($filter['limit']) && !empty($filter['page']))
		{
			$offset = intval($filter['page'])*intval($page_count);
			$limit_f = $this->db->placehold(" LIMIT ?, ?", $offset, $page_count);
		}

		$featured_filter = '';
		if(isset($filter['featured']))
			$featured_filter = ' AND featured=1 ';		
	

		$query = $this->db->placehold("SELECT * FROM __lots WHERE 1 $id_f $auction_f $status_f $product_id_f $featured_filter ORDER BY $order");
		

		$this->db->query($query);
		$lots = $this->db->results();		
	
		//if (!isset($filter['minimal']))
		foreach ($lots as $lot) {
			$lot->product = $this->comproducts->get_product((int)$lot->product_id);
			$lot->user = $this->users->get_user((int)$lot->product->user_id);
			$variants = $this->comvariants->get_variants(array('product_id'=>$lot->product->id));
			$lot->price = $variants[0]->price;
			$lot->sku = $variants[0]->sku;			
			$lot->bets = $this->get_lot_bets($lot->id);
			$lot->product->images = $this->comproducts->get_images(array('product_id'=>$lot->product->id));			
		}

		return $lots;

	}



	public function get_lots_frontend($filter = array())
	{
		$lot_id_f = '';
		if (!empty($filter['id']))
			$lot_id_f = $this->db->placehold('AND l.id in(?@)', (array)$filter['id']);


		$auction_id_f = '';
		if (!empty($filter['auction_id']))
			$auction_id_f = ' AND auction_id='.intval($filter['auction_id']);

		$user_f = '';
		if (!empty($filter['user_id']))
			$user_f = ' AND p.user_id='.intval($filter['user_id']);

	
		$category_id_filter = '';
		if(!empty($filter['category_id']))
		{
			$category_id_filter = $this->db->placehold('INNER JOIN __comproducts_categories pc ON pc.product_id = p.id AND pc.category_id in(?@)', (array)$filter['category_id']);
		}

	
		$properties_filter = '';
		if(isset($filter['properties']))
		{
			
			foreach ($filter['properties'] as $col_name => $p)
			{
				$properties_filter = $this->db->placehold(" AND p.".$col_name."=?", $p);
			}
		}


		$keyword_filter = '';
		if (!empty($filter['keyword']))
		{
			if (strlen($filter['keyword']) > 8)
				$keyword = substr($filter['keyword'], 0, (strlen($filter['keyword'])-4));
			else
				$keyword = $filter['keyword'];
			$keyword_filter = " AND (p.name LIKE '%".$keyword."%' OR l.order_num LIKE '%".$keyword."%') ";
			$this->design->assign('keyword', $keyword);
		}		

		$sort = 'l.order_num ASC';
		if (isset($_GET['sort']))
		{	if ($_GET['sort']=='name_up') $sort = 'p.name ASC'; elseif ($_GET['sort']=='name_down') $sort = 'p.name DESC';	}

		if (isset($_GET['sort']))
		{	if ($_GET['sort']=='id_up') $sort = 'l.order_num ASC'; elseif ($_GET['sort']=='id_down') $sort = 'l.order_num DESC';	}

		if (isset($_GET['sort']))
		{	if ($_GET['sort']=='year_up') $sort = 'p.prop_year ASC'; elseif ($_GET['sort']=='year_down') $sort = 'p.prop_year DESC';	}

		if (isset($_GET['sort']))
		{	if ($_GET['sort']=='save_up') $sort = 'p.prop_save ASC'; elseif ($_GET['sort']=='save_down') $sort = 'p.prop_save DESC';	}

		if (isset($_GET['sort']))
		{	if ($_GET['sort']=='material_up') $sort = 'p.prop_material ASC'; elseif ($_GET['sort']=='material_down') $sort = 'p.prop_material DESC';	}

		if (isset($_GET['sort']))
		{	if ($_GET['sort']=='letters_up') $sort = 'p.prop_letters ASC'; elseif ($_GET['sort']=='letters_down') $sort = 'p.prop_letters DESC';	}

		if (isset($_GET['sort']))
		{	if ($_GET['sort']=='weight_up') $sort = 'p.prop_weight ASC'; elseif ($_GET['sort']=='weight_down') $sort = 'p.prop_weight DESC';	}	

		if (isset($_GET['sort']))
		{	if ($_GET['sort']=='date_up') $sort = 'l.time_end ASC'; elseif ($_GET['sort']=='date_down') $sort = 'l.time_end DESC';	}

		if (isset($_GET['sort']))
		{	if ($_GET['sort']=='price_up') $sort = 'l.cost ASC'; elseif ($_GET['sort']=='price_down') $sort = 'l.cost DESC';	}

		if (isset($_GET['sort']))
		{	if ($_GET['sort']=='bets_count_up') $sort = 'l.bets_count ASC'; elseif ($_GET['sort']=='bets_count_down') $sort = 'l.bets_count DESC';	}	

		if (isset($filter['special_sort']))
		{	$sort = $filter['special_sort'];	}
		                                               
		if(isset($filter['limit']))
			$limit = max(1, intval($filter['limit']));

		if(isset($filter['page']))
			$page = max(1, intval($filter['page']));

		$sql_limit = $this->db->placehold(' LIMIT ?, ? ', ($page-1)*$limit, $limit);


		$status_f = '';
 		if(!empty($filter['status']))
			$status_f = " AND l.status=".$filter['status'];


		$big_data = " p.body as body, p.annotation as annotation, ";

		if (isset($filter['minimal'])) $big_data = '';

		$query = "SELECT 
					l.id as lot_id,
					l.order_num as order_num,
					l.trade_number as trade_number,
					l.auction_id as auction_id,
					l.featured as featured,
					l.time_start as time_start,
					l.time_end as time_end,
					l.status as status,
					l.cost,
					l.bets_count,
					p.id as product_id,
					p.url as url,
					p.name as name,
					p.meta_title,
					p.meta_keywords,
					p.meta_description,
					p.created,
					p.prop_year,
					p.prop_save,
					p.prop_material,
					p.prop_letters,
					p.prop_weight, 
					u.id as user,
					$big_data
					u.login as user_login
				FROM __lots l 
					LEFT JOIN __comproducts p ON l.product_id = p.id 
					LEFT JOIN __users u ON p.user_id = u.id 
					$category_id_filter 
				WHERE
					1
					$auction_id_f 
					$lot_id_f 
					$user_f 
					$properties_filter 
					$keyword_filter
					$status_f 
				ORDER BY 
					$sort
					$sql_limit 
				";
		$this->db->query($query); //die($query);
		$lots = $this->db->results();
		
		foreach ($lots as $lot) {
			if (!isset($filter['minimal']))
				$lot->user = $this->users->get_user((int)$lot->user);
			
			$lot->time_start_stamp = intval(strtotime($lot->time_start));
			$lot->time_end_stamp = intval(strtotime($lot->time_end));
			$lot->time_left = $lot->time_end_stamp - $lot->time_start_stamp;

			$lot->time_start = date('d.m H:i:s', strtotime($lot->time_start));
			$lot->time_end = date('d.m <b>H:i:s</b>', strtotime($lot->time_end));
			
		        if (!isset($filter['no_bets']))
			{
				$lot->bets = $this->get_lot_bets($lot->lot_id);
				if (empty($lot->bets)) $lot->price = 1;
				//$lot->max_bet = $lot->price;
			}
			else {
				$last_bet = $this->get_last_bet($lot->lot_id);				
				if (!empty($last_bet)) $lot->price = $last_bet; else $lot->price = 1;
				
				$lot->max_bet = $lot->price;

				$this->db->query("SELECT COUNT(*) FROM __bets WHERE lot_id=?", $lot->lot_id);
				$lot->bets_count = $this->db->result('COUNT(*)');

				$this->db->query("SELECT u.login FROM __bets b 
								LEFT JOIN __users u ON b.user_id=u.id 
								WHERE b.lot_id=? ORDER BY b.id DESC LIMIT 1", $lot->lot_id);
				$lot->lider_name = $this->db->result('login');
			}			

			$lot->images = $this->comproducts->get_images(array('product_id'=>$lot->product_id));
			//$lot->properties = $this->features->get_product_options($lot->product_id, 1);
		}		


	

		//echo "<pre>"; print_r($lots); die();
		return $lots;

	}

	public function get_lots_by_user($user_id, $auction_id = 0, $reverse = false)
	{
		$auction_filter = "";
		if ($auction_id != 0) 
		{
			if ($reverse)
                                $auction_filter = $this->db->placehold("AND l.auction_id!=?", (int)$auction_id);
			else
				$auction_filter = $this->db->placehold("AND l.auction_id=?", (int)$auction_id);
		}

		$query = $this->db->placehold("SELECT b.lot_id FROM __bets b 
						LEFT JOIN __lots l ON l.id=b.lot_id 
						WHERE b.user_id=? $auction_filter", intval($user_id));
		$this->db->query($query); //die($query);
		$bets = $this->db->results();

		$ids = array();
		$filter = array();
		foreach ($bets as $bet)
		{
			$ids[] = $bet->lot_id;
		}

		if (empty($bets)) return array();

		$filter['id'] = $ids;
		//print_r($filter['id']); die();

		$items_per_page = $this->settings->products_num;		
		$current_page = $this->request->get('page', 'int');	
		$current_page = max(1, $current_page);
		$this->design->assign('current_page_num', $current_page);
		$lots_count = $this->auctions->count_lots($filter);

		if($this->request->get('page') == 'all')
			$items_per_page = $lots_count;	
		
		$pages_num = ceil($lots_count/$items_per_page);
		$this->design->assign('total_pages_num', $pages_num);

		$filter['page'] = $current_page;
		$filter['limit'] = $items_per_page;
		$filter['special_sort'] = 'l.id DESC';
		
		$result = $this->get_lots_frontend($filter);

		return $result;
	}

	public function get_lots_by_seller($user_id)
	{
		$filter = array();

		$filter['user_id'] = intval($user_id);

		$items_per_page = $this->settings->products_num;		
		$current_page = $this->request->get('page', 'int');	
		$current_page = max(1, $current_page);
		$this->design->assign('current_page_num', $current_page);
		$lots_count = $this->auctions->count_lots($filter);

		if($this->request->get('page') == 'all')
			$items_per_page = $lots_count;	
		
		$pages_num = ceil($lots_count/$items_per_page);
		$this->design->assign('total_pages_num', $pages_num);

		$filter['page'] = $current_page;
		$filter['limit'] = $items_per_page;
		
		$filter['special_sort'] = 'l.time_end ASC';

		$result = $this->get_lots_frontend($filter);
		

		return $result;
	}	


	public function count_lots($filter = array())
	{

		$lot_id_f = '';
		if (isset($filter['id']))
			$lot_id_f = $this->db->placehold('AND l.id in(?@)', (array)$filter['id']);

		$user_f = '';
		if (isset($filter['user_id']))
			$user_f = ' AND p.user_id='.intval($filter['user_id']);

                $id_f = '';

		if (isset($filter['auction_id']))
			$id_f = ' AND auction_id='.intval($filter['auction_id']);

		$category_id_filter = '';
		if(isset($filter['category_id']))
		{
			$category_id_filter = $this->db->placehold('INNER JOIN __comproducts_categories pc ON pc.product_id = p.id AND pc.category_id in(?@)', (array)$filter['category_id']);
		}

		$featured_filter = '';
		if(isset($filter['featured']))
			$featured_filter = ' AND featured=1 ';
	
	
		$properties_filter = '';
		if(isset($filter['properties']))
		{
			
			foreach ($filter['properties'] as $col_name => $p)
			{
				$properties_filter = $this->db->placehold(" AND p.".$col_name."=?", $p);
			}
		}

		$keyword_filter = '';
		if (isset($filter['keyword']))
		{
			if (strlen($filter['keyword']) > 8)
				$keyword = substr($filter['keyword'], 0, (strlen($filter['keyword'])-4));
			else
				$keyword = $filter['keyword'];
			$keyword_filter = " AND (p.name LIKE '%".$keyword."%' OR l.order_num LIKE '%".$keyword."%') ";
			$this->design->assign('keyword', $keyword);
		}

		$status_f = '';
 		if(isset($filter['status']))
			$status_f = " AND l.status=".$filter['status'];


		$query = "SELECT 
					count(distinct l.id) as count 

				FROM __lots l 
					LEFT JOIN __comproducts p ON l.product_id = p.id 
					LEFT JOIN __users u ON p.user_id = u.id 
					$category_id_filter 
				WHERE
					1
					$status_f 
					$lot_id_f 
					$id_f
					$properties_filter 			
					$keyword_filter 
					$user_f
				";
				
		$this->db->query($query);

		return $this->db->result('count');

	}	


	public function product_to_lot($product_id, $auction_id)
	{
		$lot = new stdClass;
		$lot->auction_id = $auction_id;
		$lot->product_id = $product_id;
		$today = date('Y-m-d H:i:s');
		$lot->created = $today;
		$lot->status = 1;
		$this->comproducts->update_product($product_id, array('is_lot'=>1));
		
		return $this->add_lot($lot);
	}
	

	public function lot_to_product($lot_id, $delete = true)
	{ 
		$this->db->query("SELECT product_id FROM __lots WHERE id=".$lot_id);		
		$product_id = $this->db->result('product_id'); 
		$this->comproducts->update_product($product_id, array('is_lot'=>0, 'can_delete'=>0));
		
		$this->db->query("SELECT COUNT(*) FROM __bets WHERE lot_id=?", intval($lot_id));
		$bets_count = intval($this->db->result('COUNT(*)'));
		if ($bets_count>0 && $delete) $this->delete_lot($lot_id);

	}


	public function is_ready_for_auction($id)
	{
		$prod = $this->comproducts->get_product((int)$id);
		$ok = false;
		if ($prod->user_id > 0) $ok = true;
		else $ok = false;

		if ($prod->status == 1) $ok = true;
		else $ok = false;	

		$variants = $this->comvariants->get_variants(array('product_id'=>$prod->id));

		if ($variants[0]->price > 0) $ok = true;
		else $ok = false;		

		return $ok;

	}

	public function set_moments($auction_id = 0)
	{
		if ($auction_id == 0)	
		{
			$this->db->query("SELECT * FROM __auctions WHERE date_start < NOW() ORDER BY date_start DESC LIMIT 1"); 
			$auctions1 = $this->db->results();		// тот который начался и предыдущий
			$this->db->query("SELECT * FROM __auctions WHERE date_start > NOW()"); 
			$auctions2 = $this->db->results();		// те котрые будут
			$auctions = array_merge($auctions1, $auctions2);
		}
		else
		{
			$this->db->query("SELECT * FROM __auctions WHERE id=".$auction_id); 
			$auctions = $this->db->results();
		}
	

		foreach ($auctions as $a)
		{
    			//$time_of_first_closing =  intval(strtotime(strval($a->date_end)));


			$this->db->query("SELECT * FROM __lots WHERE auction_id=".$a->id);
			$lots = $this->db->results();
			$moment_start = intval(strtotime($a->date_end));
			$auction_start = intval(strtotime($a->date_start));
			$d = intval($a->duration);
			$i = 0;
			foreach ($lots as $num => $lot) {
				$i++;
				$moment_end = 	$moment_start + $d*$i;
				//echo $moment_start.' - '.$moment_end.'<br>';
				$_start = 	date('Y-m-d H:i:s', $auction_start);
				$_end = 	date('Y-m-d H:i:s', $moment_end);
				//echo $_start.' - '.$_end.'<br>';
				$this->update_lot($lot->id, array('time_start'=>$_start, 'time_end'=>$_end));				
			}
			$date_closing = date('Y-m-d H:i:s', ($moment_end + $d*count($lots)));
			$this->auctions->update_auction($a->id, array('date_closing'=>$date_closing));
		}

		return $date_closing;
				
	}

	public function set_numbers($auction_id = 0)
	{

		$cats = $this->categories->get_categories();
		$order_num = 0;
		foreach ($cats as $c)
		{
		

		$this->db->query("SELECT l.* FROM __lots l 
				        		LEFT JOIN __comproducts p ON l.product_id=p.id 
					 		WHERE l.auction_id=? 
							AND p.id IN (SELECT product_id FROM __comproducts_categories WHERE category_id=?)
							ORDER BY p.prop_year ASC", 
				(int)$auction_id, (int)$c->id);
		

		$lots = $this->db->results();

		//echo "<pre>"; print_r($lots); die();

		
		$order_str = '';
		foreach ($lots as $num => $lot) {
			$order_num++;
		        if ($order_num < 10) 				$order_str = '000'.$order_num;
		        if ($order_num > 9 && $order_num < 100) 	$order_str = '00'.$order_num;
		        if ($order_num > 99 && $order_num < 1000) 	$order_str = '0'.$order_num;
		        if ($order_num > 999 && $order_num < 10000) 	$order_str = $order_num;
	
			$order_str = $auction_id.'-'.$order_str;

			$this->update_lot($lot->id, array('order_num'=>$order_str, 'order_num_int'=>$order_num));
		}

		}

				
	}


	public function is_early($date)
	{
		$_now = getdate();
		$now = $_now[0];
		if (is_integer($date))
		{
			if ($date < $now) return true; else return false;
		}
		else
		{
			if (strtotime($date) < $now) return true; else return false;
		}
	}

	public function is_future($date)
	{
		$_now = getdate();
		$now = $_now[0];
		if (is_integer($date))
		{
			if ($date > $now) return true; else return false;
		}
		else
		{
			if (strtotime($date) > $now) return true; else return false;
		}
	}	

	public function time_is_over($lot_id)
	{		
		$this->db->query('SELECT time_end FROM __lots WHERE id='.intval($lot_id));
		$time_end = intval(strtotime($this->db->result('time_end')));
		$_now = getdate();
		$now = $_now[0];		
		if ($now > $time_end) return true;
		else return false;
	}


}