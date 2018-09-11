<?php

require_once('Simpla.php');

class CommissionProducts extends Simpla
{
	/**
	* Функция возвращает товары
	* Возможные значения фильтра:
	* id - id товара или их массив
	* category_id - id категории или их массив
	* page - текущая страница, integer
	* limit - количество товаров на странице, integer
	* sort - порядок товаров, возможные значения: position(по умолчанию), name, price
	* keyword - ключевое слово для поиска
	* features - фильтр по свойствам товара, массив (id свойства => значение свойства)
	*/
	public function get_products($filter = array())
	{		
		// По умолчанию
		$limit = 100;
		$page = 1;
		$category_id_filter = '';
		$product_id_filter = '';
		$keyword_filter = '';
		$group_by = '';
		$order = 'p.position DESC';
		$status_filter = '';

		if(isset($filter['limit']))
			$limit = max(1, intval($filter['limit']));

		if(isset($filter['page']))
			$page = max(1, intval($filter['page']));

		$sql_limit = $this->db->placehold(' LIMIT ?, ? ', ($page-1)*$limit, $limit);

		if(!empty($filter['id']))
			$product_id_filter = $this->db->placehold('AND p.id in(?@)', (array)$filter['id']);

		if(!empty($filter['category_id']))
		{
			$category_id_filter = $this->db->placehold('INNER JOIN __comproducts_categories pc ON pc.product_id = p.id AND pc.category_id in(?@)', (array)$filter['category_id']);
			$group_by = "GROUP BY p.id";
		}

		if(!empty($filter['preparation']))
			$preparation_filter = ' AND p.status=0 ';

		if(!empty($filter['ready']))
			$ready_filter = ' AND p.status=1 ';		

		if(!empty($filter['toback']))
			$ready_filter = ' AND p.status=2 ';			

		if(!empty($filter['keyword']))
		{
			$keyword_filter = $this->db->placehold('AND (p.name LIKE "%'.$filter['keyword'].'%") ');
		}

		if(!empty($filter['status']))
			$status_filter .= $this->db->placehold('AND p.status=? ', $filter['status']);


		$query = "SELECT  
					p.id,
					p.url,
					p.name,
					p.annotation,
					p.body,
					p.position,
					p.created as created,
					p.visible, 
					p.featured, 
					p.is_lot,
					p.meta_title, 
					p.meta_keywords, 
					p.meta_description,
					p.status,
					p.user_id, 
					p.prop_year,
					p.prop_save,
					p.prop_material,
					p.prop_letters,
					p.prop_weight, 
					p.can_delete  
				FROM __comproducts p		
				$category_id_filter 
				WHERE 
					1
					AND p.is_lot=0 
					$product_id_filter
					$features_filter
					$keyword_filter
					$status_filter
					$preparation_filter
					$ready_filter
					$status_filter
				$group_by
				ORDER BY $order
					$sql_limit";

		$query = $this->db->placehold($query);
		$this->db->query($query);
		return $this->db->results();
	}

	/**
	* Функция возвращает количество товаров
	* Возможные значения фильтра:
	* category_id - id категории или их массив
	* keyword - ключевое слово для поиска
	* features - фильтр по свойствам товара, массив (id свойства => значение свойства)
	*/
	public function count_products($filter = array(), $type='')
	{		
		$category_id_filter = '';
		$keyword_filter = '';

		
		if(!empty($filter['category_id']))
			$category_id_filter = $this->db->placehold('INNER JOIN __comproducts_categories pc ON pc.product_id = p.id AND pc.category_id in(?@)', (array)$filter['category_id']);

		if(!empty($filter['keyword']))
		{
			$keyword_filter = $this->db->placehold('AND (p.name LIKE "%'.$filter['keyword'].'%") ');
		}

		if(!empty($filter['preparation']))
			$preparation_filter = ' AND p.status=0 ';

		if(!empty($filter['ready']))
			$ready_filter = ' AND p.status=1 ';		

		if(!empty($filter['toback']))
			$ready_filter = ' AND p.status=2 ';			
		
		$query = "SELECT count(distinct p.id) as count ".($type=='all' ? ', min(v.price) minCost, max(v.price) maxCost ' : '')." 
				FROM __comproducts AS p ".($type=='all' ? 'INNER JOIN __comvariants v ON (v.product_id = p.id) ' : '')."
				$category_id_filter
				WHERE 1
					AND p.is_lot=0 
					$keyword_filter
					$is_featured_filter
					$discounted_filter
					$visible_filter
					$features_filter 
					$preparation_filter 
					$ready_filter 
					";

		$this->db->query($query);	
		if($type=='all')
			return $this->db->result();
		else
			return $this->db->result('count');
	}


	/**
	* Функция возвращает товар по id
	* @param	$id
	* @retval	object
	*/
	public function get_product($id)
	{
		if(is_int($id))
			$filter = $this->db->placehold('p.id = ?', $id);
		else
			$filter = $this->db->placehold('p.url = ?', $id);
			
		$query = $this->db->placehold("SELECT DISTINCT
					p.id,
					p.url,
					p.name,
					p.annotation,
					p.is_lot,
					p.body,
					p.position,
					p.created as created,
					p.visible, 
					p.featured, 
					p.meta_title, 
					p.meta_keywords, 
					p.meta_description,
					p.status,
					p.user_id,
					p.prop_year,
					p.prop_save,
					p.prop_material,
					p.prop_letters,
					p.prop_weight 
				FROM __comproducts AS p
                WHERE $filter
                GROUP BY p.id
                LIMIT 1", intval($id));
		$this->db->query($query);
		$product = $this->db->result();
		return $product;
	}

	public function update_product($id, $product)
	{
		$query = $this->db->placehold("UPDATE __comproducts SET ?% WHERE id in (?@) LIMIT ?", $product, (array)$id, count((array)$id));
		if($this->db->query($query))
			return $id;
		else
			return false;
	}
	
	public function add_product($product)
	{	
		$product = (array) $product;
		
		if(empty($product['url']))
		{
			$product['url'] = preg_replace("/[\s]+/ui", '_', $product['name']);
			$product['url'] = strtolower(preg_replace("/[^0-9a-zа-я_]+/ui", '', $product['url']));
		}

		if($this->db->query("INSERT INTO __comproducts SET ?%", $product))
		{
			$id = $this->db->insert_id();
			$this->db->query("UPDATE __comproducts SET position=id WHERE id=?", $id);		
			return $id;
		}
		else
			return false;
	}
	

	/*
	*
	* Удалить товар
	*
	*/	
	public function delete_product($id)
	{
		if(!empty($id))
		{
			// Удаляем варианты
			$variants = $this->comvariants->get_variants(array('product_id'=>$id));
			foreach($variants as $v)
				$this->comvariants->delete_variant($v->id);
			
			// Удаляем изображения
			$images = $this->get_images(array('product_id'=>$id));
			foreach($images as $i)
				$this->delete_image($i->id);
			
			// Удаляем категории
			$categories = $this->comcategories->get_categories(array('product_id'=>$id));
			foreach($categories as $c)
				$this->comcategories->delete_product_category($id, $c->id);

			// Удаляем свойства
			$options = $this->features->get_options(array('product_id'=>$id));
			foreach($options as $o)
				$this->features->delete_option($id, $o->feature_id);
			
			// Удаляем связанные товары
			$related = $this->get_related_products($id);
			foreach($related as $r)
				$this->delete_related_product($id, $r->related_id);
			
			// Удаляем отзывы
			$comments = $this->comments->get_comments(array('object_id'=>$id, 'type'=>'product'));
			foreach($comments as $c)
				$this->comments->delete_comment($c->id);
			
			// Удаляем из покупок
			$this->db->query('UPDATE __purchases SET product_id=NULL WHERE product_id=?', intval($id));
			
			// Удаляем товар
			$query = $this->db->placehold("DELETE FROM __comproducts WHERE id=? LIMIT 1", intval($id));
			if($this->db->query($query))
				return true;			
		}
		return false;
	}	
	
	public function duplicate_product($id)
	{
    	$product = $this->get_product($id);
    	$product->id = null;
    	$product->created = null;

		// Сдвигаем товары вперед и вставляем копию на соседнюю позицию
    	$this->db->query('UPDATE __comproducts SET position=position+1 WHERE position>?', $product->position);
    	$new_id = $this->products->add_product($product);
    	$this->db->query('UPDATE __comproducts SET position=? WHERE id=?', $product->position+1, $new_id);
    	
    	// Очищаем url
    	$this->db->query('UPDATE __comproducts SET url="" WHERE id=?', $new_id);
    	
		// Дублируем категории
		$categories = $this->comcategories->get_product_categories($id);
		foreach($categories as $c)
			$this->comcategories->add_product_category($new_id, $c->category_id);
    	
    	// Дублируем изображения
    	$images = $this->get_images(array('product_id'=>$id));
    	foreach($images as $image)
    		$this->add_image($new_id, $image->filename);
    		
    	// Дублируем варианты
    	$variants = $this->comvariants->get_variants(array('product_id'=>$id));
    	foreach($variants as $variant)
    	{
    		$variant->product_id = $new_id;
    		unset($variant->id);
    		if($variant->infinity)
    			$variant->stock = null;
    		unset($variant->infinity);
    		$this->comvariants->add_variant($variant);
    	}
    	
    	// Дублируем свойства
		$options = $this->features->get_options(array('product_id'=>$id));
		foreach($options as $o)
			$this->features->update_option($new_id, $o->feature_id, $o->value);
			
		// Дублируем связанные товары
		$related = $this->get_related_products($id);
		foreach($related as $r)
			$this->add_related_product($new_id, $r->related_id);
			
    		
    	return $new_id;
	}
	

	
	function get_related_products($product_id = array())
	{
		if(empty($product_id))
			return array();

		$product_id_filter = $this->db->placehold('AND product_id in(?@)', (array)$product_id);
				
		$query = $this->db->placehold("SELECT product_id, related_id, position
					FROM __related_products
					WHERE 
					1
					$product_id_filter   
					ORDER BY position       
					");
		
		$this->db->query($query);
		return $this->db->results();
	}
	
	// Функция возвращает связанные товары
	public function add_related_product($product_id, $related_id, $position=0)
	{
		$query = $this->db->placehold("INSERT IGNORE INTO __related_products SET product_id=?, related_id=?, position=?", $product_id, $related_id, $position);
		$this->db->query($query);
		return $related_id;
	}
	
	// Удаление связанного товара
	public function delete_related_product($product_id, $related_id)
	{
		$query = $this->db->placehold("DELETE FROM __related_products WHERE product_id=? AND related_id=? LIMIT 1", intval($product_id), intval($related_id));
		$this->db->query($query);
	}
	
	
	function get_images($filter = array())
	{		
		$product_id_filter = '';
		$group_by = '';

		if(!empty($filter['product_id']))
			$product_id_filter = $this->db->placehold('AND i.product_id in(?@)', (array)$filter['product_id']);

		// images
		$query = $this->db->placehold("SELECT i.id, i.product_id, i.name, i.filename, i.position
									FROM __images2 AS i WHERE 1 $product_id_filter $group_by ORDER BY i.product_id, i.position");
		$this->db->query($query);
		return $this->db->results();
	}
	
	public function add_image($product_id, $filename, $name = '')
	{
		$query = $this->db->placehold("SELECT id FROM __images2 WHERE product_id=? AND filename=?", $product_id, $filename);
		$this->db->query($query);
		$id = $this->db->result('id');
		if(empty($id))
		{
			$query = $this->db->placehold("INSERT INTO __images2 SET product_id=?, filename=?", $product_id, $filename);
			$this->db->query($query);
			$id = $this->db->insert_id();
			$query = $this->db->placehold("UPDATE __images2 SET position=id WHERE id=?", $id);
			$this->db->query($query);
		}
		return($id);
	}
	
	public function update_image($id, $image)
	{
	
		$query = $this->db->placehold("UPDATE __images2 SET ?% WHERE id=?", $image, $id);
		$this->db->query($query);
		
		return($id);
	}
	
	public function delete_image($id)
	{
		$query = $this->db->placehold("SELECT filename FROM __images2 WHERE id=?", $id);
		$this->db->query($query);
		$filename = $this->db->result('filename');
		$query = $this->db->placehold("DELETE FROM __images2 WHERE id=? LIMIT 1", $id);
		$this->db->query($query);
		$query = $this->db->placehold("SELECT count(*) as count FROM __images2 WHERE filename=? LIMIT 1", $filename);
		$this->db->query($query);
		$count = $this->db->result('count');
		if($count == 0)
		{			
			$file = pathinfo($filename, PATHINFO_FILENAME);
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
			
			// Удалить все ресайзы
			$rezised_images = glob($this->config->root_dir.$this->config->resized_images_dir.$file."*.".$ext);
			if(is_array($rezised_images))
			foreach (glob($this->config->root_dir.$this->config->resized_images_dir.$file."*.".$ext) as $f)
				@unlink($f);

			@unlink($this->config->root_dir.$this->config->original_images_dir.$filename);		
		}
	}
		
	/*
	*
	* Следующий товар
	*
	*/	
	public function get_next_product($id)
	{
		$this->db->query("SELECT position FROM __comproducts WHERE id=? LIMIT 1", $id);
		$position = $this->db->result('position');
		
		$this->db->query("SELECT pc.category_id FROM __comproducts_categories pc WHERE product_id=? ORDER BY position LIMIT 1", $id);
		$category_id = $this->db->result('category_id');

		$query = $this->db->placehold("SELECT id FROM __comproducts p, __comproducts_categories pc
										WHERE pc.product_id=p.id AND p.position>? 
										AND pc.position=(SELECT MIN(pc2.position) FROM __comproducts_categories pc2 WHERE pc.product_id=pc2.product_id)
										AND pc.category_id=? 
										AND p.visible ORDER BY p.position limit 1", $position, $category_id);
		$this->db->query($query);
 
		return $this->get_product((integer)$this->db->result('id'));
	}
	
	/*
	*
	* Предыдущий товар
	*
	*/	
	public function get_prev_product($id)
	{
		$this->db->query("SELECT position FROM __comproducts WHERE id=? LIMIT 1", $id);
		$position = $this->db->result('position');
		
		$this->db->query("SELECT pc.category_id FROM __comproducts_categories pc WHERE product_id=? ORDER BY position LIMIT 1", $id);
		$category_id = $this->db->result('category_id');

		$query = $this->db->placehold("SELECT id FROM __comproducts p, __comproducts_categories pc
										WHERE pc.product_id=p.id AND p.position<? 
										AND pc.position=(SELECT MIN(pc2.position) FROM __comproducts_categories pc2 WHERE pc.product_id=pc2.product_id)
										AND pc.category_id=? 
										AND p.visible ORDER BY p.position DESC limit 1", $position, $category_id);
		$this->db->query($query);
 
		return $this->get_product((integer)$this->db->result('id'));	}
	
		
}