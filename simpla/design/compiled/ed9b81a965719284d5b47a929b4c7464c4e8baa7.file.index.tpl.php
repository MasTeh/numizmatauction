<?php /* Smarty version Smarty-3.1.18, created on 2016-10-24 19:47:12
         compiled from "simpla/design/html/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:322095284580e3b10ccad92-37277554%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed9b81a965719284d5b47a929b4c7464c4e8baa7' => 
    array (
      0 => 'simpla/design/html/index.tpl',
      1 => 1462355843,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '322095284580e3b10ccad92-37277554',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'meta_title' => 0,
    'config' => 0,
    'manager' => 0,
    'new_orders_counter' => 0,
    'new_deals_counter' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_580e3b10d599b7_97979524',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_580e3b10d599b7_97979524')) {function content_580e3b10d599b7_97979524($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<META HTTP-EQUIV="Expires" CONTENT="-1">
<title><?php echo $_smarty_tpl->tpl_vars['meta_title']->value;?>
</title>
<link rel="icon" href="design/images/favicon.ico" type="image/x-icon">
<link href="design/css/style.css" rel="stylesheet" type="text/css" />

<script src="design/js/jquery/jquery.js"></script>
<script src="design/js/jquery/jquery.form.js"></script>
<script src="design/js/jquery/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="design/js/jquery/jquery-ui.css" media="screen" />

<meta name="viewport" content="width=1024">

</head>
<body>

<a href='<?php echo $_smarty_tpl->tpl_vars['config']->value->root_url;?>
' class='admin_bookmark'></a>


<!-- Вся страница --> 
<div id="main">
	<!-- Главное меню -->
	<ul id="main_menu">

		<?php if (in_array('pages',$_smarty_tpl->tpl_vars['manager']->value->permissions)) {?>
		<li><a href="index.php?module=PagesAdmin"><img src="design/images/menu/pages.png"><b>Контент</b></a></li>
		<?php }?>

		<?php if (in_array('products',$_smarty_tpl->tpl_vars['manager']->value->permissions)) {?>
		<li><a href="index.php?module=ProductsAdmin"><img src="design/images/menu/catalog.png"><b>Интернет-магазин</b></a></li>
		<?php }?>

		<?php if (in_array('products',$_smarty_tpl->tpl_vars['manager']->value->permissions)) {?>
		<li><a href="index.php?module=AuctionsAdmin"><img src="design/images/menu/auction.png"><b>Аукцион</b></a></li>	
		<?php }?>

		<?php if (in_array('comission',$_smarty_tpl->tpl_vars['manager']->value->permissions)) {?>
		<li><a href="index.php?module=CommissionProductsAdmin"><img src="design/images/menu/comission.png"><b>На комиссии</b></a></li>		
		<?php }?>
		
		<?php if (in_array('products',$_smarty_tpl->tpl_vars['manager']->value->permissions)) {?>
		<li>
			<a href="index.php?module=OrdersAdmin"><img src="design/images/menu/orders.png"><b>Заказы<br />в ИМ</b></a>
			<?php if ($_smarty_tpl->tpl_vars['new_orders_counter']->value) {?><div class='counter'><span><?php echo $_smarty_tpl->tpl_vars['new_orders_counter']->value;?>
</span></div><?php }?>
		</li>	
		<?php }?>

		<?php if (in_array('deals',$_smarty_tpl->tpl_vars['manager']->value->permissions)) {?>
		<li>
			
			<a href="index.php?module=DealsAdmin"><img src="design/images/menu/deals.png"><b>Сделки<br />на аукционе</b></a>
			<?php if ($_smarty_tpl->tpl_vars['new_deals_counter']->value) {?><div class='counter'><span><?php echo $_smarty_tpl->tpl_vars['new_deals_counter']->value;?>
</span></div><?php }?>
		</li>
		<?php }?>
		
		<?php if (in_array('users',$_smarty_tpl->tpl_vars['manager']->value->permissions)) {?>
		<li><a href="index.php?module=UsersAdmin"><img src="design/images/menu/users.png"><b>Пользователи</b></a></li>
		<?php }?>

		<?php if (in_array('settings',$_smarty_tpl->tpl_vars['manager']->value->permissions)) {?>
		<li><a href="index.php?module=SettingsAdmin"><img src="design/images/menu/settings.png"><b>Настройки</b></a></li>
		<?php }?>


		<?php if (in_array('design',$_smarty_tpl->tpl_vars['manager']->value->permissions)) {?>
		<li><a href="index.php?module=ThemeAdmin"><img src="design/images/menu/design.png"><b>Разработка</b></a></li>		
		<?php }?>

		<?php if (in_array('auction_start',$_smarty_tpl->tpl_vars['manager']->value->permissions)) {?>
		<li style="float:right"><a href="index.php?module=StartAdmin" class="auction_start">
			<img src="design/images/menu/start.png"><b id="auction_name_label">
			<?php if ($_SESSION['auction_started']) {?>Приостановить аукцион<?php } else { ?>Запустить аукцион<?php }?>
			</b></a>
			<span id="auction_status_label" style="color:green;font-size:12px">
				Состояние: 
				<?php if ($_SESSION['auction_started']) {?>запущен<?php } else { ?>ожидание<?php }?>
			</span>
		</li>		
		<?php }?>
		
	</ul>
	<!-- Главное меню (The End)-->
	
	
	<!-- Таб меню -->
	<ul id="tab_menu">
		<?php echo Smarty::$_smarty_vars['capture']['tabs'];?>

	</ul>
	<!-- Таб меню (The End)-->
	
 
	
	<!-- Основная часть страницы -->
	<div id="middle">
		<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

	</div>
	<!-- Основная часть страницы (The End) --> 
	
	</div>
	<!-- Подвал сайта (The End)--> 
	
</div>
<!-- Вся страница (The End)--> 
<br>
<center>
	<div style="color:#000">Вы вошли как <?php echo $_smarty_tpl->tpl_vars['manager']->value->login;?>
.
	<a href='<?php echo $_smarty_tpl->tpl_vars['config']->value->root_url;?>
/simpla/index.php?auth_action=logout'>Выйти</a>, 
	<a href='<?php echo $_smarty_tpl->tpl_vars['config']->value->root_url;?>
/simpla/index.php?auth_action=logout2'>Выйти и вернуться на сайт</a>
</div>
</center>
<br><br>
</body>
</html>
<?php }} ?>
