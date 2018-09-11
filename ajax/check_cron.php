<?php

	require_once('../api/Simpla.php');
	$app = new Simpla();	

	echo 'cron_working_last_time = '.$app->settings->cron_working_last_time.'<br>';
	echo 'bot_current_interval = '.$app->settings->bot_current_interval.'<br>';
	echo 'cron_working = '.$app->settings->cron_working.'<br>';


?>