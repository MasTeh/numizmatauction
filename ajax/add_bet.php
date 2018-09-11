<?php

	session_start();

	$referer = str_replace('http://', '', $_SERVER['HTTP_REFERER']);
	$url = explode('/', $referer);

	if ($url[0] != $_SERVER['SERVER_NAME']) die(json_encode('Access blocked: code 1'));

	require_once('../api/Simpla.php');
	$simpla = new Simpla();	

	$token = trim($simpla->request->get('token')); 
	$token = str_replace(array("'",'"'), "", $token);

	if ($_SESSION['session_id'] != $token) die(json_encode('Access blocked: code 2'));	

	$lot_id = intval($simpla->request->get('lot_id'));

	$last_bet = $simpla->auctions->get_last_bet($lot_id);

	$next_bet = $simpla->request->get('bet_value', 'integer');

	if ($last_bet != false)
	{
		$bet_value = max(ceil($last_bet*1.1), $next_bet);
	}
	else $bet_value = $next_bet;

	//die(json_encode($bet_value));
	$user_id = intval($_SESSION['user_id']);

	if ($user_id>0)
	{
		// Проверка: не закончились ли торги лота
		if ($simpla->auctions->time_is_over($lot_id)) die(json_encode('time_is_over'));

		$last_player = $simpla->auctions->get_last_player($lot_id);
		if (intval($last_player) == $user_id) die(json_encode('last_bet'));

		$simpla->auctions->add_bet($lot_id, $user_id, $bet_value);

		$autobids = $simpla->auctions->get_lot_autobids($lot_id);

		$next_bet = ceil($bet_value*1.1);

		// Применение автобидов
		if (!empty($autobids))
		{
			foreach ($autobids as $abid) {
				if ($abid->value >= $next_bet) 
				{
					$simpla->auctions->add_bet($lot_id, $abid->user_id, $abid->value);
					$simpla->auctions->delete_autobid($abid->user_id, $lot_id);
				}
				else 
					$simpla->auctions->delete_autobid($abid->user_id, $lot_id);
				
				$next_bet = ceil($next_bet*1.1);
			}
		}

		die(json_encode('ok'));

	}

