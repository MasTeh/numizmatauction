<?PHP

require_once('api/Simpla.php');

############################################
# Class Product - edit the static section
############################################
class DealAdmin extends Simpla
{
	public function fetch()
	{
		$order = new stdClass;
		if($this->request->method('post'))
		{
			$order->id = $this->request->post('id', 'integer');
			$order->note = $this->request->post('note');;
			$order->delivery_id = $this->request->post('delivery_id', 'integer');
			$order->delivery_price = $this->request->post('delivery_price', 'float');
			$order->payment_method_id = $this->request->post('payment_method_id', 'integer');
			$order->paid = $this->request->post('paid', 'integer');
			$order->lot_id = $this->request->post('lot_id', 'integer');

			if ($order->paid == 1) $this->auctions->update_lot($order->lot_id, array('status'=>4));
			if ($order->paid == 0) $this->auctions->update_lot($order->lot_id, array('status'=>3));

			$order->separate_delivery = $this->request->post('separate_delivery', 'integer');
	 
	 		if(!$order_labels = $this->request->post('order_labels'))
	 			$order_labels = array();

			if(empty($order->id))
			{
  				$order->id = $this->deals->add_order($order);
				$this->design->assign('message_success', 'added');
  			}
    		else
    		{
    			$this->deals->update_order($order->id, $order);
				$this->design->assign('message_success', 'updated');
    		}	

	    	$this->deals->update_order_labels($order->id, $order_labels);
			
			if($order->id)
			{
					
				// Принять?
				if($this->request->post('status_new'))
					$new_status = 0;
				elseif($this->request->post('status_accept'))
					$new_status = 1;
				elseif($this->request->post('status_done'))
					if ($order->paid==1) $new_status = 2;
					else $this->design->assign('message_error','Заказ оплачен? Тогда поставьте галочку об этом внизу.');
				elseif($this->request->post('status_deleted'))
				{
					$new_status = 3;					
				}
				else
					$new_status = $this->request->post('status', 'string');
	
				if($new_status == 0)					
				{
					$this->auctions->update_lot($order->lot_id, array('status'=>3));
					$this->deals->update_order($order->id, array('status'=>0));
				}
				elseif($new_status == 1)					
				{
					$this->deals->update_order($order->id, array('status'=>1));
				}
				elseif($new_status == 2)					
				{
					if ($order->paid==1) 
					{
						$this->deals->update_order($order->id, array('status'=>2));
						$this->auctions->update_lot($order->lot_id, array('status'=>6));
					}
					else
					{
						$this->design->assign('message_error','Заказ оплачен? Тогда поставьте галочку об этом внизу.');
					}
				}
				elseif($new_status == 3)					
				{					
					$this->deals->update_order($order->id, array('status'=>3));
					$this->auctions->update_lot($order->lot_id, array('status'=>5));
					header('Location: '.$this->request->get('return'));
				}
				$order = $this->deals->get_order($order->id);
	
			}

		}
		else
		{
			$order->id = $this->request->get('id', 'integer');
			$order = $this->deals->get_order(intval($order->id));
			// Метки заказа
			$order_labels = array();
			if(isset($order->id))
			foreach($this->deals->get_order_labels($order->id) as $ol)
				$order_labels[] = $ol->id;			
		}


		$subtotal = 0;
		$purchases_count = 0;
		if($order && $purchases = $this->deals->get_purchases(array('order_id'=>$order->id)))
		{
			// Покупки
			$products_ids = array();
			$variants_ids = array();
			foreach($purchases as $purchase)
			{
				$products_ids[] = $purchase->product_id;
				$variants_ids[] = $purchase->variant_id;
			}
			
			$products = array();
			foreach($this->comproducts->get_products(array('id'=>$products_ids)) as $p)
				$products[$p->id] = $p;
	
			$images = $this->comproducts->get_images(array('product_id'=>$products_ids));		
			foreach($images as $image)
				$products[$image->product_id]->images[] = $image;
			
			$variants = array();
			foreach($this->variants->get_variants(array('product_id'=>$products_ids)) as $v)
				$variants[$v->id] = $v;
			
			foreach($variants as $variant)
				if(!empty($products[$variant->product_id]))
					$products[$variant->product_id]->variants[] = $variant;
				
	
			foreach($purchases as &$purchase)
			{
				if(!empty($products[$purchase->product_id]))
					$purchase->product = $products[$purchase->product_id];
				if(!empty($variants[$purchase->variant_id]))
					$purchase->variant = $variants[$purchase->variant_id];
				$subtotal += $purchase->price*$purchase->amount;
				$purchases_count += $purchase->amount;				
			}			
			
		}
		else
		{
			$purchases = array();
		}
		
		// Если новый заказ и передали get параметры
		if(empty($order->id))
		{
			$order = new stdClass;
			if(empty($order->phone))
				$order->phone = $this->request->get('phone', 'string');
			if(empty($order->name))
				$order->name = $this->request->get('name', 'string');
			if(empty($order->address))
				$order->address = $this->request->get('address', 'string');
			if(empty($order->email))
				$order->email = $this->request->get('email', 'string');
		}

		$this->design->assign('purchases', $purchases);
		$this->design->assign('purchases_count', $purchases_count);
		$this->design->assign('subtotal', $subtotal);
		$this->design->assign('order', $order);



		if(!empty($order->id))
		{
			// Способ доставки
			$delivery = $this->delivery->get_delivery($order->delivery_id);
			$this->design->assign('delivery', $delivery);
	
			// Способ оплаты
			$payment_method = $this->payment->get_payment_method($order->payment_method_id);
			
			if(!empty($payment_method))
			{
				$this->design->assign('payment_method', $payment_method);
		
				// Валюта оплаты
				$payment_currency = $this->money->get_currency(intval($payment_method->currency_id));
				$this->design->assign('payment_currency', $payment_currency);
			}
			// Пользователь
			if($order->user_id)
				$this->design->assign('user', $this->users->get_user(intval($order->user_id)));

			//echo "<pre>"; print_r($this->users->get_user(intval($order->user_id))); die();
	
			// Соседние заказы
			$this->design->assign('next_order', $this->deals->get_next_order($order->id, $this->request->get('status', 'string')));
			$this->design->assign('prev_order', $this->deals->get_prev_order($order->id, $this->request->get('status', 'string')));
		}

		// Все способы доставки
		$deliveries = $this->delivery->get_deliveries();
		$this->design->assign('deliveries', $deliveries);

		// Все способы оплаты
		$payment_methods = $this->payment->get_payment_methods();
		$this->design->assign('payment_methods', $payment_methods);

		// Метки заказов
	  	$labels = $this->deals->get_labels();
	 	$this->design->assign('labels', $labels);
	  	
	 	$this->design->assign('order_labels', $order_labels);	  	
		
		if($this->request->get('view') == 'print')
 		  	return $this->design->fetch('order_print.tpl');
 	  	else
	 	  	return $this->design->fetch('deal.tpl');
	}
}