<?PHP 

require_once('api/Simpla.php');

class CommissionProductsAdmin extends Simpla
{
	function fetch()
	{		

		$filter = array();
		$filter['page'] = max(1, $this->request->get('page', 'integer'));
			
		$filter['limit'] = $this->settings->products_num_admin;
	
		// Категории
		$categories = $this->comcategories->get_categories_tree();
		$this->design->assign('categories', $categories);
		
		// Текущая категория
		$category_id = $this->request->get('category_id', 'integer'); 
		if($category_id && $category = $this->comcategories->get_category($category_id))
	  		$filter['category_id'] = $category->children;

	
		// Текущий фильтр
		if($f = $this->request->get('filter', 'string'))
		{
			if($f == 'preparation')
				$filter['preparation'] = 1; 
			elseif($f == 'ready')
				$filter['ready'] = 1; 
			elseif($f == 'ready')
				$filter['ready'] = 1; 		
			elseif($f == 'toback')
				$filter['toback'] = 1; 			

			$this->design->assign('filter', $f);
		}
	
		// Поиск
		$keyword = $this->request->get('keyword');
		if(!empty($keyword))
		{
	  		$filter['keyword'] = $keyword;
			$this->design->assign('keyword', $keyword);
		}

		// Обработка действий 	
		if($this->request->method('post'))
		{
			// Сохранение цен и наличия
			$prices = $this->request->post('price');
			$stocks = $this->request->post('stock');
		
			if (!empty($prices))
			{
				foreach($prices as $id=>$price)
				{
					$stock = $stocks[$id];
					if($stock == '∞' || $stock == '')
						$stock = null;
						
					//$this->comvariants->update_variant($id, array('price'=>$price, 'stock'=>$stock));
				}
			}
		
			// Сортировка
			$positions = $this->request->post('positions'); 		
				$ids = array_keys($positions);
			sort($positions);
			$positions = array_reverse($positions);
			foreach($positions as $i=>$position)
				$this->comproducts->update_product($ids[$i], array('position'=>$position)); 
		
			
			// Действия с выбранными
			$ids = $this->request->post('check');
			if(!empty($ids))
			switch($this->request->post('action'))
			{
			    case 'disable':
			    {
			    	$this->comproducts->update_product($ids, array('status'=>0));
					break;
			    }
			    case 'enable':
			    {
			    	
			    	foreach ($ids as $id)
			    	{
			    		$p = $this->comproducts->get_product((int)$id);
			    		
			    		if ($p->user_id > 0)
			    			$this->comproducts->update_product($id, array('status'=>1));
			    	}
			        break;
			    }
			    case 'go_to_auction':
			    {
				    $auction_id = $this->request->post('auction_id');				    
				    if ($auction_id > 0)
				    {
				    	foreach($ids as $id)
				    		if ($this->auctions->is_ready_for_auction($id))
				    		{
				    			$this->auctions->product_to_lot($id, $auction_id);
				    		}
				    	$this->auctions->set_moments($auction_id);
					$this->auctions->set_numbers($auction_id);
				    }
			        break;
			    }			    
			    case 'delete':
			    {
				    foreach($ids as $id)
						$this->comproducts->delete_product($id);    
			        break;
			    }


			}			
		}

		// Отображение
		if(isset($category))
			$this->design->assign('category', $category);
		
	  	$products_count = $this->comproducts->count_products($filter);
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
	 	
		$products = array();
		foreach($this->comproducts->get_products($filter) as $p)
			$products[$p->id] = $p;
	 	
	
		if(!empty($products))
		{
		  	
			// Товары 
			$products_ids = array_keys($products);
			foreach($products as &$product)
			{
				$product->comvariants = array();
				$product->images = array();
				$product->properties = array();
				if ($product->user_id > 0) $product->user = $this->users->get_user((int)$product->user_id);
			}

		
			$variants = $this->comvariants->get_variants(array('product_id'=>$products_ids));
		
		 
			foreach($variants as &$variant)
			{
				$products[$variant->product_id]->comvariants[] = $variant;
			}
		
			$images = $this->comproducts->get_images(array('product_id'=>$products_ids));
			foreach($images as $image)
				$products[$image->product_id]->images[$image->id] = $image;

		}

	 
		$this->design->assign('auctions', $this->auctions->get_auctions(array('in_future'=>1)));

		$this->design->assign('products', $products);
	
		return $this->design->fetch('commission_products.tpl');
	}
}
