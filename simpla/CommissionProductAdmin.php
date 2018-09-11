<?PHP

require_once('api/Simpla.php');

class CommissionProductAdmin extends Simpla
{
	public function fetch()
	{
	
		$options = array();
		$product_categories = array();
		$variants = array();
		$images = array();
		$product_features = array();
		$related_products = array();
	
		if($this->request->method('post') && !empty($_POST))
		{
			$product = new stdClass;
			$product->id = $this->request->post('id', 'integer');
			$product->name = $this->request->post('name');
			$product->visible = $this->request->post('visible', 'boolean');
			$product->featured = $this->request->post('featured');

			$product->url = trim($this->request->post('url', 'string'));
			$product->meta_title = $this->request->post('meta_title');
			$product->meta_keywords = $this->request->post('meta_keywords');
			$product->meta_description = $this->request->post('meta_description');
			
			$product->annotation = $this->request->post('annotation');
			$product->body = $this->request->post('body');

			$product->user_id = $this->request->post('user_id');

			$product->status = $this->request->post('status_id');

			$product->prop_year = $this->request->post('prop_year');
			$product->prop_save = $this->request->post('prop_save');
			$product->prop_material = $this->request->post('prop_material');
			$product->prop_letters = $this->request->post('prop_letters');
			$product->prop_weight = $this->request->post('prop_weight');
			    		
    		if ($product->user_id == 0 && $product->status == 1)
    		{
				$product->status = 0;
				$this->design->assign('message_warning','no_seller');
    		}
    		 
			

			// Варианты товара
			if($this->request->post('variants'))
			foreach($this->request->post('variants') as $n=>$va)
			{
				foreach($va as $i=>$v)
				{
					if(empty($variants[$i]))
						$variants[$i] = new stdClass;
					$variants[$i]->$n = $v;
				}

			}

			// Категории товара
			$product_categories = $this->request->post('categories');
			if(is_array($product_categories))
			{
				foreach($product_categories as $c)
				{
					$x = new stdClass;
					$x->id = $c;
					$pc[] = $x;
				}
				$product_categories = $pc;
			}

			// Свойства товара
   	    	$options = $this->request->post('options');
			if(is_array($options))
			{
				foreach($options as $f_id=>$val)
				{
					$po[$f_id] = new stdClass;
					$po[$f_id]->feature_id = $f_id;
					$po[$f_id]->value = $val;
					$po[$f_id]->type = 1;
				}
				$options = $po;
			}

			// Связанные товары
			if(is_array($this->request->post('related_products')))
			{
				foreach($this->request->post('related_products') as $p)
				{
					$rp[$p] = new stdClass;
					$rp[$p]->product_id = $product->id;
					$rp[$p]->related_id = $p;
				}
				$related_products = $rp;
			}
				
			// Не допустить пустое название товара.
			if(empty($product->name))
			{			
				$this->design->assign('message_error', 'empty_name');
				if(!empty($product->id))
					$images = $this->comproducts->get_images(array('product_id'=>$product->id));
			}
			// Не допустить одинаковые URL разделов.
			elseif(($p = $this->comproducts->get_product($product->url)) && $p->id!=$product->id)
			{			
				$this->design->assign('message_error', 'url_exists');
				if(!empty($product->id))
					$images = $this->comproducts->get_images(array('product_id'=>$product->id));
			}
			else
			{
				if(empty($product->id))
				{
	  				$product->id = $this->comproducts->add_product($product);
	  				$product = $this->comproducts->get_product($product->id);
					$this->design->assign('message_success', 'added');
	  			}
  	    		else
  	    		{
  	    			$this->comproducts->update_product($product->id, $product);
  	    			$product = $this->comproducts->get_product($product->id);
					$this->design->assign('message_success', 'updated');
  	    		}	
   	    		
   	    		if($product->id)
   	    		{
	   	    		// Категории товара
	   	    		$query = $this->db->placehold('DELETE FROM __comproducts_categories WHERE product_id=?', $product->id);
	   	    		$this->db->query($query);
	 	  		    if(is_array($product_categories))
		  		    {
		  		    	foreach($product_categories as $i=>$category)
	   	    				$this->comcategories->add_product_category($product->id, $category->id, $i);
	  	    		}
	
	   	    		// Варианты
		  		    if(is_array($variants))
		  		    { 
	 					$variants_ids = array();
						foreach($variants as $index=>&$variant)
						{
							if($variant->stock == '∞' || $variant->stock == '')
								$variant->stock = null;
								
	
							if(!empty($variant->id))
								$this->comvariants->update_variant($variant->id, $variant);
							else
							{
								$variant->product_id = $product->id;
								$variant->id = $this->comvariants->add_variant($variant);
							}
							$variant = $this->comvariants->get_variant($variant->id);
							if(!empty($variant->id))
					 			$variants_ids[] = $variant->id;
						}
						
	
						// Удалить непереданные варианты
						$current_variants = $this->comvariants->get_variants(array('product_id'=>$product->id));
						foreach($current_variants as $current_variant)
							if(!in_array($current_variant->id, $variants_ids))
	 							$this->comvariants->delete_variant($current_variant->id);
						
						// Отсортировать  варианты
						asort($variants_ids);
						$i = 0;
						foreach($variants_ids as $variant_id)
						{ 
							$this->comvariants->update_variant($variants_ids[$i], array('position'=>$variant_id));
							$i++;
						}
					}
	
					// Удаление изображений
					$images = (array)$this->request->post('images');
					$current_images = $this->comproducts->get_images(array('product_id'=>$product->id));
					foreach($current_images as $image)
					{
						if(!in_array($image->id, $images))
	 						$this->comproducts->delete_image($image->id);
						}
	
					// Порядок изображений
					if($images = $this->request->post('images'))
					{
	 					$i=0;
						foreach($images as $id)
						{
							$this->comproducts->update_image($id, array('position'=>$i));
							$i++;
						}
					}
	   	    		// Загрузка изображений
		  		    if($images = $this->request->files('images'))
		  		    { 
						for($i=0; $i<count($images['name']); $i++)
						{
				 			if ($image_name = $this->image->upload_image($images['tmp_name'][$i], $images['name'][$i]))
				 			{
			  	   				$this->comproducts->add_image($product->id, $image_name);
			  	   			}
							else
							{
								$this->design->assign('error', 'error uploading image');
							}
						}
					}
	   	    		// Загрузка изображений из интернета и drag-n-drop файлов
		  		    if($images = $this->request->post('images_urls'))
		  		    { 
						foreach($images as $url)
						{
							// Если не пустой адрес и файл не локальный
							if(!empty($url) && $url != 'http://' && strstr($url,'/')!==false)
					 			$this->comproducts->add_image($product->id, $url);
					 		elseif($dropped_images = $this->request->files('dropped_images'))
					  		{
					 			$key = array_search($url, $dropped_images['name']);
							 	if ($key!==false && $image_name = $this->image->upload_image($dropped_images['tmp_name'][$key], $dropped_images['name'][$key]))
						  	   				$this->comproducts->add_image($product->id, $image_name);
							}
						}
					}
					$images = $this->comproducts->get_images(array('product_id'=>$product->id));
	
	   	    		// Характеристики товара
	   	    		
	   	    		// Удалим все из товара
					foreach($this->features->get_product_options($product->id) as $po)
						$this->features->delete_option($product->id, $po->feature_id);
						
					// Свойства текущей категории
					$category_features = array();
					foreach($this->features->get_features(array('category_id'=>$product_categories[0])) as $f)
						$category_features[] = $f->id;
	
	  	    		if(is_array($options))
					foreach($options as $option)
					{
						if(in_array($option->feature_id, $category_features))
							$this->features->update_option($product->id, $option->feature_id, $option->value, 1);
					}
					
					// Новые характеристики
					$new_features_names = $this->request->post('new_features_names');
					$new_features_values = $this->request->post('new_features_values');
					if(is_array($new_features_names) && is_array($new_features_values))
					{
						foreach($new_features_names as $i=>$name)
						{
							$value = trim($new_features_values[$i]);
							if(!empty($name) && !empty($value))
							{
								$query = $this->db->placehold("SELECT * FROM __features WHERE name=? LIMIT 1", trim($name));
								$this->db->query($query);
								$feature_id = $this->db->result('id');
								if(empty($feature_id))
								{
									$feature_id = $this->features->add_feature(array('name'=>trim($name)));
								}
								$this->features->add_feature_category($feature_id, reset($product_categories)->id);
								$this->features->update_option($product->id, $feature_id, $value);
							}
						}
						// Свойства товара
						$options = $this->features->get_product_options($product->id);
					}
					
					// Связанные товары
	   	    		$query = $this->db->placehold('DELETE FROM __related_products WHERE product_id=?', $product->id);
	   	    		$this->db->query($query);
	 	  		    if(is_array($related_products))
		  		    {
		  		    	$pos = 0;
		  		    	foreach($related_products  as $i=>$related_product)
	   	    				$this->comproducts->add_related_product($product->id, $related_product->related_id, $pos++);
	  	    		}
  	    		}
			}
			
			if ($_POST['numizmat_filter']=='on')
			{
				$images = $this->comproducts->get_images(array('product_id'=>$product->id));
				$originals_dir = $this->config->root_dir.$this->config->original_images_dir;
				foreach ($images as $img) {

					$filter_param = $_POST['filter_param'];

					if ($filter_param==1)
						$f_params = array('small_image_width' => 300, 'crop_padding' => 1.5, 'smothing_force' => 10, 'linear'=>1);
					elseif ($filter_param==2)
						$f_params = array('small_image_width' => 400, 'crop_padding' => 1.5, 'smothing_force' => 20, 'linear'=>1);					
					elseif ($filter_param==3)
						$f_params = array('small_image_width' => 500, 'crop_padding' => 1.5, 'smothing_force' => 10, 'linear'=>1, 'no_logo'=>1, 'padding-top'=>1);
					elseif ($filter_param==4)
						$f_params = array('small_image_width' => 300, 'crop_padding' => 3, 'smothing_force' => 10, 'linear'=>1);					
					elseif ($filter_param==5)
						$f_params = array('small_image_width' => 300, 'crop_padding' => 1, 'smothing_force' => 20, 'linear'=>2, 'is_bon'=>1);					


					$this->num_filter($originals_dir.$img->filename, $root.$originals_dir.$img->filename, $f_params);

					$p_files = scandir($this->config->root_dir.'files/products/');
					
					foreach ($p_files as $file) {
						if ($file != '..' && $file!= '.')
						{
							$name_ex = explode('.', $img->filename);
							$name_n = $name_ex[0];
							$name_ex = explode('.', $file);
							$name_n2 = $name_ex[0];							
							if ($name_n == $name_n2) unlink($this->config->root_dir.'files/products/'.$file);
						}
					}
				}
			}

			
			
			//header('Location: '.$this->request->url(array('message_success'=>'updated')));
		}
		else
		{
			$id = $this->request->get('id', 'integer');
			$product = $this->comproducts->get_product(intval($id));


			if($product)
			{
				
				// Категории товара
				$product_categories = $this->comcategories->get_categories(array('product_id'=>$product->id));
				
				// Варианты товара
				$variants = $this->comvariants->get_variants(array('product_id'=>$product->id));
				
				// Изображения товара
				$images = $this->comproducts->get_images(array('product_id'=>$product->id));
				
				// Свойства товара
				$options = $this->features->get_options(array('product_id'=>$product->id, 'type'=>1));
				
				// Связанные товары
				$related_products = $this->comproducts->get_related_products(array('product_id'=>$product->id));
			}
			else
			{
				// Сразу активен
				$product = new stdClass;
				$product->visible = 1;			
			}
		}
		
		
		if(empty($variants))
			$variants = array(1);
			
		if(empty($product_categories))
		{
			if($category_id = $this->request->get('category_id'))
				$product_categories[0]->id = $category_id;		
			else
				$product_categories = array(1);
		}

			
			
		/*if(is_array($options))
		{
			$temp_options = array();
			foreach($options as $option)
				$temp_options[$option->feature_id] = $option;
			$options = $temp_options;
		}*/

		$users = $this->users->get_users(array('group_id'=>2, 'seller'=>1, 'bot'=>0));
		$this->design->assign('users', $users);			
		//$lots = $this->auctions->get_lots(array('product_id'=>$product->id));

		if ($product->is_lot==1) 
		{
			$winner = $this->auctions->get_lot_winner($lots[0]->id);
			$this->design->assign('lot', $lots[0]);
			$this->design->assign('winner', $winner);

			//echo "<pre>"; print_r($variants[0]->id); die();

			if (isset($_GET['lot_action']) && $_GET['lot_action']=='to_order')
			{
		    	$order = new stdClass;

		    	$order->user_id = $_GET['to_user_id'];		    	
		    	$order->name = $product->fam.' '.$product->name.' '.$product->otch;		    	

				$order_id = $this->deals->add_order($order);
				$this->deals->add_purchase(array('order_id'=>$order_id, 'variant_id'=>intval($variants[0]->id), 'price'=>$winner->value));
			}
		}
			

		$this->design->assign('product', $product);

		$this->design->assign('product_categories', $product_categories);
		$this->design->assign('product_variants', $variants);
		$this->design->assign('product_images', $images);
		$this->design->assign('options', $options);
		$this->design->assign('related_products', $related_products);		
				
		// Все категории
		$categories = $this->comcategories->get_categories_tree();
		$this->design->assign('categories', $categories);
		
		// Все свойства товара
		$category = reset($product_categories);
		if(!is_object($category))
			$category = reset($categories);		
		if(is_object($category))
		{
			$features = $this->features->get_features(array('category_id'=>$category->id));
			$this->design->assign('features', $features);
		}

			$this->db->query("SELECT * FROM __lots WHERE product_id=? AND auction_id=?", $this->request->get('id', 'integer'), $_GET['current_auction']);
			$lot = $this->db->result(); 
			$this->design->assign('lot', $lot);

		
 	  	return $this->design->fetch('commission_product.tpl');
	}

	public function num_filter($source_file, $save_path, $params = array('small_image_width' => 300, 'crop_padding' => 1.5, 'smothing_force' => 20, 'linear'=>1))
	{
		$root = $_SERVER['DOCUMENT_ROOT'];
		$linear_file = $root.'/simpla/files/watermark/linear.png';
		if ($params['linear']==2) $linear_file = $root.'/simpla/files/watermark/linear2.png';
		$watermark_file = $root.'/simpla/files/watermark/watermark.png';
		$size = getimagesize($source_file);
		$image = imagecreatefromjpeg($source_file);

	$rsz_img = imagecreatetruecolor($size[0]*0.8, $size[1]*0.8);

	imagecopyresampled($rsz_img, $image, 0, 0, $size[0]*0.1, $size[1]*0.1, $size[0]*0.8, $size[1]*0.8, $size[0]*0.8, $size[1]*0.8);

	

	$image = $rsz_img;

	$size[0] = $size[0]*0.8;
	$size[1] = $size[1]*0.8;

		
		$k = $params['small_image_width']/$size[0];

		$small_width = $params['small_image_width'];
		$small_height = intval($size[1]*$k);

		$small_image = imagecreatetruecolor($params['small_image_width'], intval($size[1]*$k));

		imagecopyresampled($small_image, $image, 0, 0, 0, 0, $small_width, $small_height, $size[0], $size[1]);

		for ($i=0; $i <= $params['smothing_force']; $i++) imagefilter($small_image, IMG_FILTER_SMOOTH, 0);

		imagefilter($small_image, IMG_FILTER_BRIGHTNESS, -40);

		if (isset($params['is_bon']))
		{
			imagefilter($small_image, IMG_FILTER_PIXELATE, 10);
			imagefilter($small_image, IMG_FILTER_BRIGHTNESS, -100);
		}

		for ($x = 0; $x < $small_width; $x++) {
			for ($y = 0; $y < $small_height; $y++) {
			 $colors=imagecolorsforindex($small_image, imagecolorat($small_image, $x,$y));
			 $r=$colors['red'];
			 $g=$colors['green'];
			 $b=$colors['blue'];
			 $random = $r + $g + $b;
			 if ($random > (((255 + 20) / 2) * 3)) {
			  $r = 255;
			  $g = 255;
			  $b = 255; }
			 else {
			  $r = 0;
			  $g = 0;
			  $b = 0; }
			 $color = imagecolorallocate($small_image, $r,$g,$b);
			 imagesetpixel($small_image, $x, $y, $color);
			}
		}  

		$top_y = 0;
		$bottom_y = 0;
		$left_x = 0;
		$right_x = 0;

		for ($y = 0; $y < $small_height && $top_y==0; $y++) {
			for ($x = 0; $x < $small_width && $top_y==0; $x++) {
				$colors=imagecolorsforindex($small_image, imagecolorat($small_image, $x,$y));
				if ($colors['red']==0 && $colors['green']==0 && $colors['blue']==0)
					$top_y = $y;
			}
		}

		for ($y = $small_height-2; $y > 0 && $bottom_y==0; $y--) {
			for ($x = 0; $x < $small_width && $bottom_y==0; $x++) {
				$colors=imagecolorsforindex($small_image, imagecolorat($small_image, $x,$y));
				if ($colors['red']==0 && $colors['green']==0 && $colors['blue']==0)
					$bottom_y = $y;
			}
		}

		for ($x = 0; $x < $small_width && $left_x==0; $x++) {
			for ($y = 0; $y < $small_height && $left_x==0; $y++) {
				$colors=imagecolorsforindex($small_image, imagecolorat($small_image, $x,$y));
				if ($colors['red']==0 && $colors['green']==0 && $colors['blue']==0)
					$left_x = $x;
			}
		}

		for ($x = $small_width-2; $x > 0 && $right_x==0; $x--) {
			for ($y = 0; $y < $small_height && $right_x==0; $y++) {
				$colors=imagecolorsforindex($small_image, imagecolorat($small_image, $x,$y));
				if ($colors['red']==0 && $colors['green']==0 && $colors['blue']==0)
					$right_x = $x;
			}
		}

		$k2 = 1/$k;

		$padding_interval = intval($size[0]*($params['crop_padding']/100));
		$crop_width = intval(($right_x - $left_x)*$k2) + $padding_interval*2;
		$crop_height = intval(($bottom_y - $top_y)*$k2) + $padding_interval*2;
		$dop_k = 1;
		if (isset($params['is_bon'])) {
			$dop_k = 2;
		}
		
		$crop_x1 = ($left_x*$k2) - $padding_interval*$dop_k;
		$crop_y1 = ($top_y*$k2) - $padding_interval*$dop_k;

		if (isset($params['padding-top'])) 
		{
			$crop_y1 = ($top_y*$k2) - intval($size[0]*($params['padding-top']/100));
			$crop_x1 = $crop_x1 - intval(($size[0]*($params['padding-top']/100))/2);
		}
		$cropped_image = imagecreatetruecolor($crop_width, $crop_height);

		imagecopyresampled($cropped_image, $image, 0, 0, $crop_x1, $crop_y1, $crop_width, $crop_height, $crop_width, $crop_height);

		$linear_size = getimagesize($linear_file);
		$linear = imagecreatefrompng($linear_file);

		$watermark = imagecreatefrompng($watermark_file);
		$watermark_size = getimagesize($watermark_file);

		imagecopy($cropped_image, $linear, 0, -4, 0, 0, $linear_size[0], $linear_size[1]);	

		if (!isset($params['no_logo'])) 
			imagecopy($cropped_image, $watermark, $crop_width-$watermark_size[0]-10, $crop_height-$watermark_size[1]-10, 0, 0, $watermark_size[0], $watermark_size[1]);	
// header('Content-Type: image/jpeg'); imagejpeg($cropped_image); die();
		imagejpeg($cropped_image, $save_path);

		imagedestroy($small_image);
		imagedestroy($image);		
	}
}