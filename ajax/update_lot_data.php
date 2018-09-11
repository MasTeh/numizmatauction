<?php

	$referer = str_replace('http://', '', $_SERVER['HTTP_REFERER']);
	$url = explode('/', $referer);
	if ($url[0] != $_SERVER['SERVER_NAME']) die();

	$referer = $_SERVER['HTTP_REFERER'];

	session_start();
	require_once('../api/Simpla.php');

	$simpla = new Simpla();

	$lot_id = intval($simpla->request->get('lot_id'));
	$bets = $simpla->auctions->get_lot_bets($lot_id);

	$result = array();

	if (empty($bets)) die(json_encode('empty'));


	$result['current_bet'] = ceil($bets[0]->value*1.1);
	$result['bet_size'] = ceil($bets[0]->value*0.1);
	$result['bets_count'] = count($bets);

	print json_encode($result);

