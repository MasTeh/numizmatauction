<?php

	$referer = str_replace('http://', '', $_SERVER['HTTP_REFERER']);
	$url = explode('/', $referer);
	if ($url[0] != $_SERVER['SERVER_NAME']) die();

	session_start();
	require_once('../api/Simpla.php');
	$simpla = new Simpla();	
	$lot_id = intval($simpla->request->get('lot_id'));
	$action = intval($simpla->request->get('action'));
	$user_id = intval($_SESSION['user_id']);

	if ($user_id>0)
	{
		$_lot = $simpla->auctions->get_lots(array('id'=>$lot_id));
		$lot = $_lot[0];

		$simpla->auctions->lot_to_product($lot_id);
		
		if ($action=='2')
		{
			$simpla->comproducts->update_product($lot->product_id, array('status'=>2));
		}
		elseif ($action=='1')
		{
			$simpla->comproducts->update_product($lot->product_id, array('status'=>1));
		}


		die(json_encode('ok'));

	}

