<?PHP

require_once('View.php');

class LotsView extends View
{
 	/**
	 *
	 * Отображение списка лотов
	 *
	 */	
	function fetch()
	{
                 

		// GET-Параметры
		$category_id = $this->request->get('category_id');
		$auction_id = $this->request->get('auction_id');

		// $this->db->query("SELECT * FROM __options WHERE type=1");
		// $options = $this->db->results();
		// $pr_numbers = array(
		// 		159 => 'prop_year',
		// 		164 => 'prop_save',
		// 		165 => 'prop_material',
		// 		162 => 'prop_letters',
		// 		166 => 'prop_weight'
		// 	);
		// foreach ($options as $o)
		// {
		// 	$value = $o->value;
		// 	if ($o->feature_id == 159 || $o->feature_id == 166) {
		// 		$value_2 = explode('/', $value);
		// 		if (count($value_2)>1) $value = $value_2[0];
		// 		$value = str_replace(' гр', '', $value);
		// 		$value = str_replace(' ', '.', $value);
		// 		$value = preg_replace('/[^\d.]/','',$value);				
		// 	}
		// 	else
		// 	{
		// 		$value = str_replace('   ', ' ', $value);
		// 		$value = str_replace('  ', ' ', $value);
		// 		$value = str_replace('без  букв', 'без букв', $value);
		// 	}
		// 	echo("UPDATE __comproducts SET ".$pr_numbers[$o->feature_id]."=".$value); echo "<br>";
		// 	$this->db->query("UPDATE __comproducts SET ".$pr_numbers[$o->feature_id]."=? WHERE id=?", $value, $o->product_id);
		// }

		// $this->db->query("SELECT * FROM __comproducts_categories");
		// $cats = $this->db->results();
		// foreach ($cats as $c) {
		// 	$this->db->query("UPDATE __comproducts SET category_id=? WHERE id=?", $c->category_id, $c->product_id);
		// }


		$options_category_filter = '';
		if ($category_id > 0) 
		{
			$filter['category_id'] = $category_id;
			$options_category_filter = $this->db->placehold('INNER JOIN __comproducts_categories pc ON pc.product_id = p.id AND pc.category_id=? ', $category_id);
		}

		$keyword = $this->request->get('keyword');
		$keyword = str_replace(array("'",'"'), "", $keyword);
		if (!empty($keyword))
		{
			$filter['keyword'] = $keyword;
		}
		                                                 

		$features = array(
				'prop_year' => 		array('type' => 'range', 'name' => 'Год', 'options' => array()),
				'prop_save' => 		array('type' => 'list', 'name' => 'Сохранность', 'options' => array()),
				'prop_material' => 	array('type' => 'list', 'name' => 'Материал', 'options' => array())
				//'prop_weight' => 	array('type' => 'range', 'name' => 'Вес', 'options' => array()
									
			);

		$cols = array_keys($features);
		$filter_propertirs_q = '';
		foreach ($cols as $feature_name) {
			$f_val = $this->request->get($feature_name);
			$f_val = str_replace(array("'",'"'), "", $f_val);
			if (!empty($f_val)) 
			{
				$filter['properties'][$feature_name] = $f_val;
				//$filter_propertirs_q .= $this->db->placehold(' AND p.'.$feature_name.'=? ', $this->request->get($feature_name));
			}
		}
		

		$cols_q = implode(', ', $cols);		
		
		$this->db->query("SELECT ".$cols_q." 	FROM __comproducts p 
												$options_category_filter 
												INNER JOIN __lots l ON l.product_id=p.id 
												WHERE l.auction_id=? $filter_propertirs_q", $auction_id);
		$options_all = $this->db->results();
		$options = array();

		foreach ($options_all as $o) {
			foreach ($o as $key => $value) {
				if (!isset($options[$key][$value]))
					$options[$key][$value] = 1;
				else $options[$key][$value]++;
			}
		}

		foreach ($options as $option_name => $values) {
			foreach ($values as $option_val => $products_count) {
				if ($option_val!="") {
					$options_list_item = array('value' => $option_val, 'count' => $products_count);
					$features[$option_name]['options'][] = $options_list_item;
				}
			}			
		}

		if (isset($features['prop_year']))
		{
			$sort_arr = array();
			$years = $features['prop_year']['options'];
			
			while (count($years)>0)
			{
				$min = 2050;
				$min_index = 0;				
				foreach ($years as $i => $y) {
					if (intval($y['value']) <= $min) { $min = intval($y['value']); $min_index = $i; }
				}
				$sort_arr[] = $years[$min_index];
				unset($years[$min_index]);
			}
		}

		unset($options);

		$features['prop_year']['options'] = $sort_arr;

		$filter['auction_id'] = (int)$auction_id;

		// Постраничная навигация
		$items_per_page = $this->settings->products_num_admin;		
		// Текущая страница в постраничном выводе
		$current_page = $this->request->get('page', 'int');	
		// Если не задана, то равна 1
		$current_page = max(1, $current_page);
		$this->design->assign('current_page_num', $current_page);
		// Вычисляем количество страниц
		$lots_count = $this->auctions->count_lots($filter);
		// Показать все страницы сразу
		if($this->request->get('page') == 'all')
			$items_per_page = $lots_count;	
		$pages_num = ceil($lots_count/$items_per_page);
		$this->design->assign('total_pages_num', $pages_num);
		$filter['page'] = $current_page;
		$filter['limit'] = $items_per_page;
		// Постраничная навигация END

		$filter['minimal'] = 1;
		$filter['no_bets'] = 1;
                                                         //echo "<pre>"; print_r($filter); die();  
		$lots = $this->auctions->get_lots_frontend($filter);
		
		foreach ($lots as $lot) {
			$max_num = 0; $value = 0; 
			$time_diff = (int)$lot->time_end_stamp - time();
			if ($time_diff < 0) $lot->closed = true;
			
		}

		if ($auction_id > 0)
		{
			$this->design->assign('meta_title', 'Аукцион № '.$auction_id.' - '.$this->settings->site_name);
			$this->design->assign('meta_keywords', 'Аукцион № '.$auction_id.' - '.$this->settings->site_name);
			$this->design->assign('meta_description', 'Аукцион № '.$auction_id.' - '.$this->settings->site_name);		
		}

		
		$this->design->assign('features', $features);
		$this->design->assign('categories', $this->comcategories->get_categories());
		$this->design->assign('lots', $lots);
		//        echo "<pre>"; print_r($lots); die();

		if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
		{
			print($this->design->fetch('lots_list.tpl'));
			die();
		}

		$this->body = $this->design->fetch('lots.tpl');
		return $this->body;
	}
	
	

}
