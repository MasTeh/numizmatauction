<?php

	session_start();

	$referer = str_replace('http://', '', $_SERVER['HTTP_REFERER']);
	$url = explode('/', $referer);

	if ($url[0] != $_SERVER['SERVER_NAME']) die(json_encode('Access blocked: code 1'));

	require_once('../api/Simpla.php');
	$simpla = new Simpla();	

	$token = trim($simpla->request->get('token')); 
	$token = str_replace(array("'",'"'), "", $token);

	if ($_SESSION['session_id'] != $token) die();	

	$lot_id = intval($simpla->request->get('lot_id'));
	if ($simpla->auctions->time_is_over($lot_id)) die(json_encode('time_is_over'));

	$limit = intval($simpla->request->get('limit'));


	$last_bet = $simpla->auctions->get_last_bet($lot_id);
	$last_player = $simpla->auctions->get_last_player($lot_id);

	$next_bet = ceil($last_bet*1.1);

	$user_id = intval($_SESSION['user_id']);



	if ($user_id>0)
	{		
		$old_autobid = $simpla->auctions->get_user_autobid($lot_id, $user_id);

		if ($old_autobid != false)
			if ($old_autobid < $next_bet || $old_autobid > $limit) die(json_encode('need_more'));

		// if ($limit==0) {
		// 	$simpla->auctions->delete_autobid($user_id, $lot_id);
		// 	die(json_encode('deleted'));
		// }

		if ($limit <= $next_bet) die(json_encode('need_more'));

		$simpla->auctions->set_autobid($lot_id, $user_id, $limit);


		if ($last_player != $user_id) $simpla->auctions->add_bet($lot_id, $user_id, $next_bet);

		die(json_encode('ok'));

	}

