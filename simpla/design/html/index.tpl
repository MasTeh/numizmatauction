<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<META HTTP-EQUIV="Expires" CONTENT="-1">
<title>{$meta_title}</title>
<link rel="icon" href="design/images/favicon.ico" type="image/x-icon">
<link href="design/css/style.css" rel="stylesheet" type="text/css" />

<script src="design/js/jquery/jquery.js"></script>
<script src="design/js/jquery/jquery.form.js"></script>
<script src="design/js/jquery/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="design/js/jquery/jquery-ui.css" media="screen" />

<meta name="viewport" content="width=1024">

</head>
<body>

<a href='{$config->root_url}' class='admin_bookmark'></a>


<!-- Вся страница --> 
<div id="main">
	<!-- Главное меню -->
	<ul id="main_menu">

		{if in_array('pages', $manager->permissions)}
		<li><a href="index.php?module=PagesAdmin"><img src="design/images/menu/pages.png"><b>Контент</b></a></li>
		{/if}

		{if in_array('products', $manager->permissions)}
		<li><a href="index.php?module=ProductsAdmin"><img src="design/images/menu/catalog.png"><b>Интернет-магазин</b></a></li>
		{/if}

		{if in_array('products', $manager->permissions)}
		<li><a href="index.php?module=AuctionsAdmin"><img src="design/images/menu/auction.png"><b>Аукцион</b></a></li>	
		{/if}

		{if in_array('comission', $manager->permissions)}
		<li><a href="index.php?module=CommissionProductsAdmin"><img src="design/images/menu/comission.png"><b>На комиссии</b></a></li>		
		{/if}
		
		{if in_array('products', $manager->permissions)}
		<li>
			<a href="index.php?module=OrdersAdmin"><img src="design/images/menu/orders.png"><b>Заказы<br />в ИМ</b></a>
			{if $new_orders_counter}<div class='counter'><span>{$new_orders_counter}</span></div>{/if}
		</li>	
		{/if}

		{if in_array('deals', $manager->permissions)}
		<li>
			
			<a href="index.php?module=DealsAdmin"><img src="design/images/menu/deals.png"><b>Сделки<br />на аукционе</b></a>
			{if $new_deals_counter}<div class='counter'><span>{$new_deals_counter}</span></div>{/if}
		</li>
		{/if}
		
		{if in_array('users', $manager->permissions)}
		<li><a href="index.php?module=UsersAdmin"><img src="design/images/menu/users.png"><b>Пользователи</b></a></li>
		{/if}

		{if in_array('settings', $manager->permissions)}
		<li><a href="index.php?module=SettingsAdmin"><img src="design/images/menu/settings.png"><b>Настройки</b></a></li>
		{/if}


		{if in_array('design', $manager->permissions)}
		<li><a href="index.php?module=ThemeAdmin"><img src="design/images/menu/design.png"><b>Разработка</b></a></li>		
		{/if}

		{if in_array('auction_start', $manager->permissions)}
		<li style="float:right"><a href="index.php?module=StartAdmin" class="auction_start">
			<img src="design/images/menu/start.png"><b id="auction_name_label">
			{if $smarty.session.auction_started}Приостановить аукцион{else}Запустить аукцион{/if}
			</b></a>
			<span id="auction_status_label" style="color:green;font-size:12px">
				Состояние: 
				{if $smarty.session.auction_started}запущен{else}ожидание{/if}
			</span>
		</li>		
		{/if}
		
	</ul>
	<!-- Главное меню (The End)-->
	
	
	<!-- Таб меню -->
	<ul id="tab_menu">
		{$smarty.capture.tabs}
	</ul>
	<!-- Таб меню (The End)-->
	
 
	
	<!-- Основная часть страницы -->
	<div id="middle">
		{$content}
	</div>
	<!-- Основная часть страницы (The End) --> 
	
	</div>
	<!-- Подвал сайта (The End)--> 
	
</div>
<!-- Вся страница (The End)--> 
<br>
<center>
	<div style="color:#000">Вы вошли как {$manager->login}.
	<a href='{$config->root_url}/simpla/index.php?auth_action=logout'>Выйти</a>, 
	<a href='{$config->root_url}/simpla/index.php?auth_action=logout2'>Выйти и вернуться на сайт</a>
</div>
</center>
<br><br>
</body>
</html>
