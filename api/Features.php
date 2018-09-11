<?php

 
require_once('Simpla.php');

class Features extends Simpla
{	
	
	function get_features($filter = array())
	{
		$category_id_filter = '';	
		if(isset($filter['category_id']))
			$category_id_filter = $this->db->placehold('AND id in(SELECT feature_id FROM __categories_features AS cf WHERE cf.category_id in(?@))', (array)$filter['category_id']);
		
		$in_filter_filter = '';	
		if(isset($filter['in_filter']))
			$in_filter_filter = $this->db->placehold('AND f.in_filter=?', intval($filter['in_filter']));
		
		$id_filter = '';	
		if(!empty($filter['id']))
			$id_filter = $this->db->placehold('AND f.id in(?@)', (array)$filter['id']);

		$limit = '';
		if(!empty($filter['limit']))
			$limit = 'LIMIT '.$filter['limit'];


		
		// Выбираем свойства
		$query = $this->db->placehold("SELECT id, name, position, in_filter FROM __features AS f
									WHERE 1
									$category_id_filter $in_filter_filter $id_filter ORDER BY f.position $limit");
		$this->db->query($query);
		return $this->db->results();
	}
		
	function get_feature($id)
	{
		// Выбираем свойство
		$query = $this->db->placehold("SELECT id, name, position, in_filter FROM __features WHERE id=? LIMIT 1", $id);
		$this->db->query($query);
		$feature = $this->db->result();

		return $feature;
	}
	
	function get_feature_categories($id)
	{
		$query = $this->db->placehold("SELECT cf.category_id as category_id FROM __categories_features cf
										WHERE cf.feature_id = ?", $id);
		$this->db->query($query);
		return $this->db->results('category_id');	
	}
	
	public function add_feature($feature)
	{
		$query = $this->db->placehold("INSERT INTO __features SET ?%", $feature);
		$this->db->query($query);
		$id = $this->db->insert_id();
		$query = $this->db->placehold("UPDATE __features SET position=id WHERE id=? LIMIT 1", $id);
		$this->db->query($query);
		return $id;
	}
		
	public function update_feature($id, $feature)
	{
		$query = $this->db->placehold("UPDATE __features SET ?% WHERE id in(?@) LIMIT ?", (array)$feature, (array)$id, count((array)$id));
		$this->db->query($query);
		return $id;
	}
	
	public function delete_feature($id = array())
	{
		if(!empty($id))
		{
			$query = $this->db->placehold("DELETE FROM __features WHERE id=? LIMIT 1", intval($id));
			$this->db->query($query);
			$query = $this->db->placehold("DELETE FROM __options WHERE feature_id=?", intval($id));
			$this->db->query($query);	
			$query = $this->db->placehold("DELETE FROM __categories_features WHERE feature_id=?", intval($id));
			$this->db->query($query);	
		}
	}
	

	public function delete_option($product_id, $feature_id)
	{
		$query = $this->db->placehold("DELETE FROM __options WHERE product_id=? AND feature_id=? LIMIT 1", intval($product_id), intval($feature_id));
		$this->db->query($query);
	}

	
	public function update_option($product_id, $feature_id, $value, $type=0)
	{	 
		if(!empty($value))
			$query = $this->db->placehold("REPLACE INTO __options SET value=?, product_id=?, feature_id=?, type=?", $value, intval($product_id), intval($feature_id), intval($type));
		else
			$query = $this->db->placehold("DELETE FROM __options WHERE feature_id=? AND product_id=?, type=?", intval($feature_id), intval($product_id), intval($type));
		return $this->db->query($query);
	}


	public function add_feature_category($id, $category_id)
	{
		$query = $this->db->placehold("INSERT IGNORE INTO __categories_features SET feature_id=?, category_id=?", $id, $category_id);
		$this->db->query($query);
	}
			
	public function update_feature_categories($id, $categories)
	{
		$id = intval($id);
		$query = $this->db->placehold("DELETE FROM __categories_features WHERE feature_id=?", $id);
		$this->db->query($query);
		
		
		if(is_array($categories))
		{
			$values = array();
			foreach($categories as $category)
				$values[] = "($id , ".intval($category).")";
	
			$query = $this->db->placehold("INSERT INTO __categories_features (feature_id, category_id) VALUES ".implode(', ', $values));
			$this->db->query($query);

			// Удалим значения из options 
			$query = $this->db->placehold("DELETE o FROM __options o
			                               LEFT JOIN __products_categories pc ON pc.product_id=o.product_id
			                               WHERE o.feature_id=? AND pc.category_id not in(?@)", $id, $categories);
			$this->db->query($query);
		}
		else
		{
			// Удалим значения из options 
			$query = $this->db->placehold("DELETE o FROM __options o WHERE o.feature_id=?", $id);
			$this->db->query($query);
		}
	}
			

	public function get_options($filter = array())
	{
		$feature_id_filter = '';
		$product_id_filter = '';
		$category_id_filter = '';
		$brand_id_filter = '';
		$features_filter = '';

		if(empty($filter['feature_id']) && empty($filter['product_id']))
			return array();
		
		$group_by = '';
		if(isset($filter['feature_id']))
			$group_by = 'GROUP BY feature_id, value';
			
		if(isset($filter['feature_id']))
			$feature_id_filter = $this->db->placehold('AND po.feature_id in(?@)', (array)$filter['feature_id']);

		if(isset($filter['product_id']))
			$product_id_filter = $this->db->placehold('AND po.product_id in(?@)', (array)$filter['product_id']);

		if(isset($filter['category_id']))
			$category_id_filter = $this->db->placehold('INNER JOIN __products_categories pc ON pc.product_id=po.product_id AND pc.category_id in(?@)', (array)$filter['category_id']);

		if(isset($filter['brand_id']))
			$brand_id_filter = $this->db->placehold('AND po.product_id in(SELECT id FROM __products WHERE brand_id in(?@))', (array)$filter['brand_id']);

		if(isset($filter['features']))
			foreach($filter['features'] as $feature=>$value)
			{
				$features_filter .= $this->db->placehold('AND (po.feature_id=? OR po.product_id in (SELECT product_id FROM __options WHERE feature_id=? AND value in (?@) )) ', $feature, $feature, $value);
			}

		$type_filter = '';
		if(isset($filter['type']) && $filter['type']==1)
			$type_filter = ' AND type=1 ';
		else
			$type_filter = ' AND type=0 ';		

		$query = $this->db->placehold("SELECT po.product_id, po.feature_id, po.value FROM __options po
			$category_id_filter
			WHERE 1 $feature_id_filter $product_id_filter $brand_id_filter $features_filter $type_filter GROUP BY po.feature_id, po.value ORDER BY value=0, -value DESC, value");
		
		$this->db->query($query);
		$res = $this->db->results();

		return $res;
	}

	public function get_lots_options($filter = array())
	{
		$feature_id_filter = '';
		$product_id_filter = '';
		$category_id_filter = '';
		$brand_id_filter = '';
		$features_filter = '';

		if(empty($filter['feature_id']) && empty($filter['product_id']))
			return array();
		
		$group_by = '';
		if(isset($filter['feature_id']))
			$group_by = 'GROUP BY feature_id, value';
			
		if(isset($filter['feature_id']))
			$feature_id_filter = $this->db->placehold('AND po.feature_id in(?@)', (array)$filter['feature_id']);

		if(isset($filter['product_id']))
			$product_id_filter = $this->db->placehold('AND po.product_id in(?@)', (array)$filter['product_id']);

		if(isset($filter['category_id']))
			$category_id_filter = $this->db->placehold('INNER JOIN __comproducts_categories pc ON pc.product_id=po.product_id AND pc.category_id in(?@)', (array)$filter['category_id']);


		$type_filter = '';
		if(isset($filter['type']) && $filter['type']==1)
			$type_filter = ' AND type=1 ';
		else
			$type_filter = ' AND type=0 ';		

		$query = $this->db->placehold("SELECT po.product_id, po.feature_id, po.value FROM __options po
			$category_id_filter
			WHERE 1 $feature_id_filter $product_id_filter $features_filter $type_filter GROUP BY po.feature_id, po.value ORDER BY value=0, -value DESC, value");
		
		$this->db->query($query);
		$res = $this->db->results();

		foreach ($res as $opt) {

			$cat_f = '';
			if(isset($filter['category_id'])) 
			$cat_f = $this->db->placehold(" AND p.id IN (SELECT product_id FROM __comproducts_categories WHERE category_id=?) ", $filter['category_id']);

			$opt_f = $this->db->placehold(" AND p.id IN (SELECT product_id FROM __options WHERE value=? AND type=1) ", $opt->value);

			$auc_f = $this->db->placehold(" AND l.auction_id=? ", $filter['auction_id']);

			$q = "SELECT count(distinct l.id) as count FROM __lots l LEFT JOIN __comproducts p ON l.product_id = p.id	
					WHERE 1 $opt_f $cat_f $auc_f"; 
			
			$this->db->query($q);

			$opt->count = $this->db->result('count');			
		}

		$i=0;
		foreach ($res as $opt) {
			if ($opt->count==0)	unset($res[$i]); $i++;
		}

		return $res;
	}	
	
	public function get_product_options($product_id, $type=0)
	{
		$query = $this->db->placehold("SELECT f.id as feature_id, f.name, po.value, po.product_id FROM __options po LEFT JOIN __features f ON f.id=po.feature_id
										WHERE po.type=$type AND po.product_id  in(?@) ORDER BY f.position", (array)$product_id);

		$this->db->query($query);
		$res = $this->db->results();

		return $res;
	}
	


}
