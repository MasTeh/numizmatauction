<?php

/**
 * Simpla CMS
 *
 * @copyright	2011 Denis Pikusov
 * @link		http://simplacms.ru
 * @author		Denis Pikusov
 *
 */
 
class Notify extends Simpla
{
    function email($to, $subject, $message, $from = '', $reply_to = '')
    {
    	$headers = "MIME-Version: 1.0\n" ;
    	$headers .= "Content-type: text/html; charset=utf-8; \r\n"; 
    	$headers .= "From: $from\r\n";
    	if(!empty($reply_to))
	    	$headers .= "reply-to: $reply_to\r\n";
    	
    	$subject = "=?utf-8?B?".base64_encode($subject)."?=";

    	@mail($to, $subject, $message, $headers);
    }

	public function email_order_user($order_id)
	{
			if(!($order = $this->orders->get_order(intval($order_id))) || empty($order->email))
				return false;
			
			$purchases = $this->orders->get_purchases(array('order_id'=>$order->id));
			$this->design->assign('purchases', $purchases);			

			$products_ids = array();
			$variants_ids = array();
			foreach($purchases as $purchase)
			{
				$products_ids[] = $purchase->product_id;
				$variants_ids[] = $purchase->variant_id;
			}
			
			$products = array();
			foreach($this->products->get_products(array('id'=>$products_ids)) as $p)
				$products[$p->id] = $p;
				
			$images = $this->products->get_images(array('product_id'=>$products_ids));
			foreach($images as $image)
				$products[$image->product_id]->images[] = $image;
			
			$variants = array();
			foreach($this->variants->get_variants(array('id'=>$variants_ids)) as $v)
			{
				$variants[$v->id] = $v;
				$products[$v->product_id]->variants[] = $v;
			}
				
			foreach($purchases as &$purchase)
			{
				if(!empty($products[$purchase->product_id]))
					$purchase->product = $products[$purchase->product_id];
				if(!empty($variants[$purchase->variant_id]))
					$purchase->variant = $variants[$purchase->variant_id];
			}
			
			// Способ доставки
			$delivery = $this->delivery->get_delivery($order->delivery_id);
			$this->design->assign('delivery', $delivery);

			$this->design->assign('order', $order);
			$this->design->assign('purchases', $purchases);

			// Отправляем письмо
			// Если в шаблон не передавалась валюта, передадим
			if ($this->design->smarty->getTemplateVars('currency') === null) 
			{
				$this->design->assign('currency', reset($this->money->get_currencies(array('enabled'=>1))));
			}
			$email_template = $this->design->fetch($this->config->root_dir.'design/'.$this->settings->theme.'/html/email_order.tpl');
			$subject = $this->design->get_var('subject');
			$this->email($order->email, $subject, $email_template, $this->settings->notify_from_email);
	
	}


	public function email_order_admin($order_id)
	{
			if(!($order = $this->orders->get_order(intval($order_id))))
				return false;
			
			$purchases = $this->orders->get_purchases(array('order_id'=>$order->id));
			$this->design->assign('purchases', $purchases);			

			$products_ids = array();
			$variants_ids = array();
			foreach($purchases as $purchase)
			{
				$products_ids[] = $purchase->product_id;
				$variants_ids[] = $purchase->variant_id;
			}

			$products = array();
			foreach($this->products->get_products(array('id'=>$products_ids)) as $p)
				$products[$p->id] = $p;

			$images = $this->products->get_images(array('product_id'=>$products_ids));
			foreach($images as $image)
				$products[$image->product_id]->images[] = $image;
			
			$variants = array();
			foreach($this->variants->get_variants(array('id'=>$variants_ids)) as $v)
			{
				$variants[$v->id] = $v;
				$products[$v->product_id]->variants[] = $v;
			}
	
			foreach($purchases as &$purchase)
			{
				if(!empty($products[$purchase->product_id]))
					$purchase->product = $products[$purchase->product_id];
				if(!empty($variants[$purchase->variant_id]))
					$purchase->variant = $variants[$purchase->variant_id];
			}
			
			// Способ доставки
			$delivery = $this->delivery->get_delivery($order->delivery_id);
			$this->design->assign('delivery', $delivery);

			// Пользователь
			$user = $this->users->get_user(intval($order->user_id));
			$this->design->assign('user', $user);

			$this->design->assign('order', $order);
			$this->design->assign('purchases', $purchases);

			// В основной валюте
			$this->design->assign('main_currency', $this->money->get_currency());

			// Отправляем письмо
			$email_template = $this->design->fetch($this->config->root_dir.'simpla/design/html/email_order_admin.tpl');
			$subject = $this->design->get_var('subject');
			$this->email($this->settings->order_email, $subject, $email_template, $this->settings->notify_from_email);
	
	}

	

	public function email_comment_admin($comment_id)
	{ 
			if(!($comment = $this->comments->get_comment(intval($comment_id))))
				return false;
			
			if($comment->type == 'product')
				$comment->product = $this->products->get_product(intval($comment->object_id));
			if($comment->type == 'blog')
				$comment->post = $this->blog->get_post(intval($comment->object_id));

			$this->design->assign('comment', $comment);

			// Отправляем письмо
			$email_template = $this->design->fetch($this->config->root_dir.'simpla/design/html/email_comment_admin.tpl');
			$subject = $this->design->get_var('subject');
			$this->email($this->settings->comment_email, $subject, $email_template, $this->settings->notify_from_email);
	}

	public function email_password_remind($user_id, $code)
	{
			if(!($user = $this->users->get_user(intval($user_id))))
				return false;
			
			$this->design->assign('user', $user);
			$this->design->assign('code', $code);

			// Отправляем письмо
			$email_template = $this->design->fetch($this->config->root_dir.'design/'.$this->settings->theme.'/html/email_password_remind.tpl');
			$subject = $this->design->get_var('subject');
			$this->email($user->email, $subject, $email_template, $this->settings->notify_from_email);
			
			$this->design->smarty->clearAssign('user');
			$this->design->smarty->clearAssign('code');
	}

	public function email_new_password($user_id, $new_password)
	{
			if(!($user = $this->users->get_user(intval($user_id))))
				return false;
			
			$this->design->assign('user', $user);
			$this->design->assign('new_password', $new_password);

			// Отправляем письмо
			$email_template = $this->design->fetch($this->config->root_dir.'design/'.$this->settings->theme.'/html/email_new_password.tpl');
			$subject = $this->design->get_var('subject');
			$this->email($user->email, $subject, $email_template, $this->settings->notify_from_email);
			
			$this->design->smarty->clearAssign('user');
			$this->design->smarty->clearAssign('new_password');
	}	

	public function email_feedback_admin($feedback_id)
	{ 
			if(!($feedback = $this->feedbacks->get_feedback(intval($feedback_id))))
				return false;

			$this->design->assign('feedback', $feedback);

			// Отправляем письмо
			$email_template = $this->design->fetch($this->config->root_dir.'simpla/design/html/email_feedback_admin.tpl');
			$subject = $this->design->get_var('subject');
			$this->email($this->settings->comment_email, $subject, $email_template, "$feedback->name <$feedback->email>", "$feedback->name <$feedback->email>");
	}

	public function email_password_change($user, $email)
	{ 
			$this->design->assign('user', $user);

			// Отправляем письмо
			$email_template = $this->design->fetch($this->config->root_dir.'simpla/design/html/email_password_change.tpl');
			$subject = $this->design->get_var('subject');
			$this->email($email, $subject, $email_template, $this->settings->notify_from_email);
	}	

	public function email_registration($user, $email)
	{ 
			$this->design->assign('user', $user);

			// Отправляем письмо
			$email_template = $this->design->fetch($this->config->root_dir.'simpla/design/html/email_registration.tpl');
			$subject = $this->design->get_var('subject');
			$this->email($email, $subject, $email_template, $this->settings->notify_from_email);
			$this->email($this->settings->notify_from_email, 'Новая регистрация', 
			'Зарегистрирован новый пользователь<br><a href="http://numisrus.ru/simpla/index.php?module=UsersAdmin&group_id=1">зайти в админку</a>', 'noreply@numisrus.ru');
	}		


	public function add_task($task)
	{
		if (isset($task['check_dublicate']))
		{
			$this->db->query("SELECT id FROM __tasks WHERE auction_id=? AND action=?", $task['auction_id'], $task['action']);
			$id = $this->db->result('id');	
			unset($task['check_dublicate']);
		}
		if (empty($id))
		{

			$query = $this->db->placehold("INSERT INTO __tasks SET ?%", $task);
			$this->db->query($query);
			return $this->db->insert_id();
		}
		else
		{
			$this->db->query("UPDATE __tasks SET date=?, action=? WHERE id=?", $task['date'], $task['action'], $id);
			return $id;
		}
	}

	public function update_task($id, $task)
	{
		$query = $this->db->placehold("UPDATE __tasks SET ?% WHERE id=? LIMIT 1", $task, intval($id));
		$this->db->query($query);
	}	

	public function get_next_tasks()
	{
		$this->db->query("SELECT * FROM __tasks WHERE date < NOW() AND done=0 ORDER BY date ASC LIMIT 50");
		return $this->db->results();
	}

	public function clear_tasks()
	{
		$this->db->query("DELETE FROM __tasks WHERE done=1");
	}

	public function do_task($task)
	{
		$task = (object)$task;

		if ($task->action == 'before_auction_start')
		{
			$auction = $this->auctions->get_auction($task->auction_id);
			$users = $this->users->get_users(array('seller'=>1, 'bot'=>0));
			$i=0;        // echo "<pre>"; print_r($users); die();
			foreach ($users as $u)
			{
				$u->lots = $this->auctions->get_lots_frontend(array('user_id'=>$u->id, 'auction_id'=>$task->auction_id, 'minimal'=>1, 'no_bets'=>1));
				if (empty($u->lots)) unset($users[$i]);

				$i++;
			}
			$under_text = $this->pages->get_page('__letter-under-text2');
                        $this->design->assign('under_text', $under_text);
			foreach ($users as $u)
			{
				$this->design->assign('user', $u);
				$this->design->assign('auction', $auction);
				$this->design->assign('root_url', $this->config->root_url);
				$letter = $this->design->fetch($this->config->root_dir.'design/default/html/email_before_auction.tpl');
				$email = $u->email;
				$subject = 'Нумисрус: Аукцион состоится '.$auction->date_start;
				$this->email($email, $subject, $letter, 'noreply@numisrus.ru');
				 //print '<div style="width:1000px; margin:20px">';
				 //print $letter;
				 //print '</div>';   //die();
			}

		}

		if ($task->action == 'after_auction_end')
		{
			$auction = $this->auctions->get_auction($task->auction_id);
			$users = $this->users->get_users(array('buyer'=>1, 'bot'=>0));
			$i=0;
			foreach ($users as $u)
			{
				$u->deals = $this->deals->get_orders(array('user_id'=>$u->id, 'auction_id'=>$auction->id));
				$u->summ = 0;
				if (empty($u->deals)) unset($users[$i]);
				else {
					foreach ($u->deals as $deal) {
						$deal->purchases = $this->deals->get_purchases(array('order_id'=>$deal->id));

						$this->db->query("SELECT order_num, product_id FROM __lots WHERE id=? LIMIT 1", $deal->lot_id);
						$lot_data = $this->db->result();
						$deal->order_num = $lot_data->order_num;
						$deal->images = $this->comproducts->get_images(array('product_id'=>$lot_data->product_id));

						$deal->properties = $this->features->get_product_options($deal->purchases[0]->product_id, 1);
						$u->summ = ceil($u->summ+$deal->purchases[0]->price);
					}
				}
				$i++;
			}
			$under_text = $this->pages->get_page('__letter-under-text');
		
			foreach ($users as $u)
			{
				$this->design->assign('user', $u);
				$this->design->assign('auction', $auction);
				$this->design->assign('under_text', $under_text);
				$this->design->assign('root_url', $this->config->root_url);

				$letter = $this->design->fetch($this->config->root_dir.'design/default/html/email_after_auction.tpl');
				$email = $u->email;
				$subject = 'Нумисрус: Результаты аукциона '.$auction->date_start;
				$this->email($email, $subject, $letter, 'noreply@numisrus.ru');
				// print '<div style="width:1000px; margin:20px">';
				// print $letter;
				// print '</div>';
			}			
		}

		if ($task->action == 'activate_robots')
		{
			$this->bots->activate($task); 
		}	

		if ($task->action == 'deactivate_robots')
		{
			$this->bots->deactivate($task);
		}


		if ($task->action == 'set_bet')
		{
			$lot_id = $task->lot_id;
			$last_bet = ceil($this->auctions->get_last_bet($lot_id));
			$min_price = ceil($this->auctions->get_min_price($lot_id));
			//echo($min_price." ".$last_bet); die();
			if ($last_bet < 1) $last_bet = 1;

			$last_player = $this->auctions->get_last_player($lot_id);


			if ($min_price > ceil($last_bet*1.1) && intval($last_player) != $task->user_id)
			{         
				$this->auctions->add_bet($lot_id, $task->user_id, ceil($last_bet*1.1));


				$autobids = $this->auctions->get_lot_autobids($lot_id);

				$next_bet = ceil($last_bet*1.1);

				// Применение автобидов
				if (!empty($autobids))
				{
					foreach ($autobids as $abid) {
					if ($abid->value >= $next_bet) 
					{
						$this->auctions->add_bet($lot_id, $abid->user_id, $abid->value);
						$this->auctions->delete_autobid($abid->user_id, $lot_id);
					}
					else 
						$this->auctions->delete_autobid($abid->user_id, $lot_id);
				
					$next_bet = ceil($next_bet*1.1);

					}
				}



			}

		}
		//die();		

		$this->update_task($task->id, array('done'=>1));
		$this->clear_tasks();
	}



}