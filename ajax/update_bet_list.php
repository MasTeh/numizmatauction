<?php
	$referer = str_replace('http://', '', $_SERVER['HTTP_REFERER']);
	$url = explode('/', $referer);
	if ($url[0] != $_SERVER['SERVER_NAME']) die();

	session_start();
	require_once('../api/Simpla.php');

	$simpla = new Simpla();

	$lot_id = intval($simpla->request->get('lot_id'));

	$bets = $simpla->auctions->get_lot_bets($lot_id);

	if (empty($bets)) die(json_encode('empty'));


	$simpla->design->assign('bets', $bets);

	$result = $simpla->design->fetch('bets_list.tpl');

    print json_encode($result);	

