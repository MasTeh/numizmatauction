<?php
	session_start();

	require_once('../../api/Simpla.php');
	$simpla = new Simpla();

	if ($_GET['action']=='send')
	{
		$code = $simpla->users->rand_str(4);
		$_SESSION['sms_code'] = $code;
		$msg=file_get_contents("http://sms.ru/sms/send?api_id=2b4d1645-76b6-0214-91ff-3aacc6a2d6eb&to=79090142872&text=".urlencode(iconv("windows-1251","utf-8",$code)));
	}
	elseif ($_GET['action']=='check' && isset($_GET['code']))
	{
		if ($_GET['code']==$_SESSION['sms_code'])
		{
			if ($_GET['action2']=='start')
			{
				$_SESSION['auction_started'] = true;
				$simpla->settings->auction_started = 1;
				$simpla->settings->current_auction = $_GET['auction_id'];
				$simpla->auctions->set_moments();
				$msg = 'ok';
			}
			elseif ($_GET['action2']=='stop')
			{
				unset($_SESSION['auction_started']);
				$simpla->settings->auction_started = 0;
				$msg = 'stopped';
			}
		}
		else
		{
			$msg = 'error';
		}
		unset($_SESSION['sms_code']);
	}

	header("Content-type: application/json; charset=UTF-8");
	header("Cache-Control: must-revalidate");
	header("Pragma: no-cache");
	header("Expires: -1");
	print json_encode($msg);
