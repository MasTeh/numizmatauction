<?php

	date_default_timezone_set('Europe/Moscow');


	session_start();
	require_once('/home/u457006/numisrus.ru/www/api/Simpla.php');
	$app = new Simpla();

	if (empty($app->settings->products_num)) $app->settings->products_num = 50;

	if (empty($app->settings->products_num_admin)) $app->settings->products_num_admin = 50;

	$app->settings->cron_working = rand(0, 255);

	if (isset($_GET['generate_bots']))	
	{
		$app->bots->generate_bots(); 
		echo "bots ready";
		die();
	}

	if ($app->settings->auction_started != 1) die();

	$current_auction = $app->auctions->get_auctions(array('at_current_time'=>1, 'no_lots'=>1));
                                             //echo "<pre>"; print_r($current_auction); die();

	if (!empty($current_auction)) 
		$app->settings->current_auction = $current_auction[0]->id;
	else
		$app->settings->current_auction = 0;

	
	// Ставим отметку "на торгах" для лотов, у которых начался аукцион
	$app->db->query("UPDATE __lots SET status=2 WHERE auction_id=? AND status=1", (int)$app->settings->current_auction);

	$auction_id = (int)$app->settings->current_auction;
	
	// Сгребаем выторгованые лоты
	$lots = $app->auctions->get_lots_processor(array('status'=>2, 'closed'=>1, 'get_variant_id'=>1, 'auction_id'=>$auction_id));
	
	 //echo "<pre>"; print_r($lots); die();
	foreach ($lots as $lot) {
		// Если по лоту были торги и есть победитель
		if ($lot->winner != false)
		{

			if ($lot->winner->bot==1)
			{
				$app->auctions->lot_to_product($lot->lot_id, false);
				$app->auctions->update_lot($lot->lot_id, array('status'=>5));
			}
			else
			{
			$app->auctions->update_lot($lot->lot_id, array('status'=>3));

			$order = new stdClass;	    	
	    		$order->name        = $lot->winner->name.' '.$winner->fam;
	    		$order->email       = $lot->winner->email;
	    		$order->phone       = $lot->winner->phone;
	    		$order->user_id		= $lot->winner->id;
	    		$order->seller 		= $lot->user;
	    		$order->auction_id	= $lot->auction_id;
	    		$order->total_price = $lot->max_bet;
	    		$order->lot_id 		= $lot->lot_id;
	    		$order->ip      	= $_SERVER['REMOTE_ADDR'];

                         
	    		$order_id = $app->deals->add_order($order);
	    		$app->deals->add_purchase(array(
	    			'order_id'=>$order_id, 
	    			'variant_id'=>intval($lot->variant_id), 
	    			'amount'=>1, 
	    			'product_id'=>$lot->product_id,
	    			'product_name'=>$lot->name,
	    			'price'=>$lot->max_bet));

			}

		}
		// Если не торговал никто
		else
		{       
			$app->auctions->update_lot($lot->lot_id, array('status'=>5));
		}
		
	}

	// Выполняем одно задание

	$tasks = $app->notify->get_next_tasks();

	//echo "<pre>"; print_r($tasks); echo "</pre>"; die();
	
	if (!empty($tasks))
	{
		foreach ($tasks as $task)
		{			
			$app->notify->do_task($task);
			if ($task->action != 'set_bet') die();
		}
	}
	
	$app->settings->cron_working_last_time = date("m.d.y H:i:s");