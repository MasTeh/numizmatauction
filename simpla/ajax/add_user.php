<?php
	session_start();

	require_once('../../api/Simpla.php');
	$simpla = new Simpla();
	
	$user = new stdClass;

	$user->enabled = 1;
	$user->seller = 1;
	$user->group_id = 2;
	$user->buyer = 0;
	$user->name = $simpla->request->get('name');
	$user->fam = $simpla->request->get('fam');
	$user->otch = $simpla->request->get('otch');
	$user->email = $simpla->request->get('email');
	$user->region = $simpla->request->get('region');
	$user->postcode = $simpla->request->get('postcode');
	$user->city = $simpla->request->get('city');
	$user->area = $simpla->request->get('area');
	$user->street = $simpla->request->get('street');
	$user->number = $simpla->request->get('number');
	$user->housing = $simpla->request->get('housing');
	$user->office = $simpla->request->get('office');
	$user->phone = $simpla->request->get('phone');
	$user->login = $simpla->request->get('login');
	$user->password = $simpla->request->get('password');


	$simpla->db->query("SELECT * FROM __users WHERE email='".$user->email."'");
	$exist_test = $simpla->db->results();

	if (count($exist_test) > 0)
		die(json_encode('error1'));


	$user_id = $simpla->users->add_user($user);

	$simpla->notify->email_registration($user, $user->email);


	header("Content-type: application/json; charset=UTF-8");
	header("Cache-Control: must-revalidate");
	header("Pragma: no-cache");
	header("Expires: -1");
	print json_encode($user_id);
