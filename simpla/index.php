<?PHP

chdir('..');

date_default_timezone_set('Europe/Moscow');



// Засекаем время
$time_start = microtime(true);
session_start();


if (isset($_SESSION['HTTP_USER_AGENT']))
{
    if ($_SESSION['HTTP_USER_AGENT'] != md5($_SERVER['HTTP_USER_AGENT']))
    {
        unset($_SESSION['manager']);
	unset($_POST);	
	header('Location: /simpla/index.php');
    }
}
else
{
    $_SESSION['HTTP_USER_AGENT'] = md5($_SERVER['HTTP_USER_AGENT']);
    $_SESSION['id'] = session_id();
}


// unset($_SESSION['password_try_count']);
// unset($_SESSION['access_denied']);


@ini_set('session.gc_maxlifetime', 86400); // 86400 = 24 часа
@ini_set('session.cookie_lifetime', 0); // 0 - пока браузер не закрыт

require_once('simpla/IndexAdmin.php');

// Кеширование в админке нам не нужно
Header("Cache-Control: no-cache, must-revalidate");
header("Expires: -1");
Header("Pragma: no-cache");


// Установим переменную сессии, чтоб фронтенд нас узнал как админа
$_SESSION['admin'] = 'admin';

$backend = new IndexAdmin();

// Проверка сессии для защиты от xss
if (isset($_SESSION['manager']) && !$backend->request->check_session())
{
	unset($_POST);
	unset($_SESSION['manager']);
	die();
}


print $backend->fetch();

// Отладочная информация
if($backend->config->debug)
{
	print "<!--\r\n";
	$i = 0;
	$sql_time = 0;
	foreach($page->db->queries as $q)
	{
		$i++;
		print "$i.\t$q->exec_time sec\r\n$q->sql\r\n\r\n";
		$sql_time += $q->exec_time;
	}
  
	$time_end = microtime(true);
	$exec_time = $time_end-$time_start;
  
  	if(function_exists('memory_get_peak_usage'))
		print "memory peak usage: ".memory_get_peak_usage()." bytes\r\n";  
	print "page generation time: ".$exec_time." seconds\r\n";  
	print "sql queries time: ".$sql_time." seconds\r\n";  
	print "php run time: ".($exec_time-$sql_time)." seconds\r\n";  
	print "-->";
}
