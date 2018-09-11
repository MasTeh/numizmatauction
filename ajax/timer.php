<?php

date_default_timezone_set('Europe/Moscow');

$time_start = microtime(true);

$datetime = array();
$datetime['hours'] = date('H');
$datetime['minuts'] = date('i');
$datetime['seconds'] = date('s');
$datetime['days'] = date('d');
$datetime['month'] = date('m');

print(json_encode($datetime));

?>