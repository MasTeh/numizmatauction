<?php

$datetime = array();
$datetime['hours'] = date('H');
$datetime['minuts'] = date('i');
$datetime['seconds'] = date('s');
$datetime['days'] = date('d');
$datetime['month'] = date('m');

header("Content-type: application/json; charset=UTF-8");
header("Cache-Control: must-revalidate");
header("Pragma: no-cache");
header("Expires: -1");	
print(json_encode($datetime));

?>