<?php /* Smarty version Smarty-3.1.18, created on 2016-10-23 15:38:17
         compiled from "/home/u457006/numisrus.ru/www/design/default/html/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1344766030580caf397750d3-99564322%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '72afa6ceec8e4995f48563747be0304fc0b10598' => 
    array (
      0 => '/home/u457006/numisrus.ru/www/design/default/html/index.tpl',
      1 => 1476713887,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1344766030580caf397750d3-99564322',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'meta_title' => 0,
    'meta_description' => 0,
    'meta_keywords' => 0,
    'canonical' => 0,
    'pages' => 0,
    'p' => 0,
    'user' => 0,
    'no_auction' => 0,
    'next_auction' => 0,
    'current_auction' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_580caf398596b5_80988942',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_580caf398596b5_80988942')) {function content_580caf398596b5_80988942($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/u457006/numisrus.ru/www/Smarty/libs/plugins/modifier.date_format.php';
?><!DOCTYPE html>

<html>
<head>

<meta charset="utf-8">
<base href="<?php echo $_smarty_tpl->tpl_vars['config']->value->root_url;?>
/"/>
<title><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_title']->value, ENT_QUOTES, 'UTF-8', true);?>
</title>



<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_description']->value, ENT_QUOTES, 'UTF-8', true);?>
" />
<meta name="keywords"    content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_keywords']->value, ENT_QUOTES, 'UTF-8', true);?>
" />
<meta name="viewport" content="width=1024"/>



<?php if (isset($_smarty_tpl->tpl_vars['canonical']->value)) {?><link rel="canonical" href="<?php echo $_smarty_tpl->tpl_vars['config']->value->root_url;?>
<?php echo $_smarty_tpl->tpl_vars['canonical']->value;?>
"/><?php }?>

<link rel="icon" href="design/default/images/favicon.ico"  />
<link rel="SHORTCUT ICON" href="design/default/images/favicon.ico"  />

<!-- СТИЛИ (НАЧАЛО) -->
<link type="text/css" href="design/default/css/basic.css" rel="stylesheet">
<link type="text/css" href="design/default/css/navigation.css" rel="stylesheet">
<link type="text/css" href="design/default/css/profile.css" rel="stylesheet">
<link type="text/css" href="design/default/css/forms.css" rel="stylesheet">
<!-- СТИЛИ (КОНЕЦ) -->

<!-- JS СКРИПТЫ (НАЧАЛО) -->
<script type="text/javascript" src="design/default/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="design/default/js/gallery.js"></script>
<!-- JS СКРИПТЫ (КОНЕЦ) -->



<script src="design/default/js/jquery-1.8.3.min.js"></script>
<script src="design/default/js/jquery-ui.min.js"></script>
<script src="design/default/js/ajax_cart.js"></script>


<script src="js/baloon/js/baloon.js" type="text/javascript"></script>
<link   href="js/baloon/css/baloon.css" rel="stylesheet" type="text/css" /> 


<script src="design/default/js/timer.js"></script>
<script src="design/default/js/index.js"></script>

<script src="js/jquery.msgbox.js"></script>

</head>

<body>
<?php echo $_smarty_tpl->getSubTemplate ('login_form.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>



<!-- ШАПКА САЙТА (НАЧАЛО) -->    
<div class="header">
    <div class="header-content">
        <!-- Навигация -->
        <div class="header-content-navigation">
            <div class="navigation">
                <ul>
                    <?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
                    <?php if ($_smarty_tpl->tpl_vars['p']->value->menu_id==1) {?>
                    
                        <li class="navigation-links">
                            <a href="<?php echo $_smarty_tpl->tpl_vars['p']->value->url;?>
" class="navigations-1"><span><?php echo $_smarty_tpl->tpl_vars['p']->value->name;?>
</span></a>
                        </li>
                    
                    <?php }?>
                    <?php } ?>

                </ul>
            </div>
        </div>
        <!-- Профиль -->
        <div class="header-content-profile">
            <div class="profile">
                <ul>
                    <?php if ($_smarty_tpl->tpl_vars['user']->value) {?>
                    <a href="user/bets" class="profile-1">
                        <li class="user/">
                            <span>Личный кабинет</span>
                        </li>
                    </a> 
                    <a href="user/logout" class="profile-1">
                        <li class="user/profile">
                            <span>Выйти</span>
                        </li>
                    </a>                                        

                    <?php } else { ?>
                    <a href="user/login" class="profile-1 login_link">
                        <li class="profile-links">
                            <span>Вход</span>
                        </li>
                    </a>
                    
                    <a href="user/register" class="profile-1">
                        <li class="profile-links">
                            <span>Регистрация</span>
                        </li>
                    </a>
                    <?php }?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- ШАПКА САЙТА (КОНЕЦ) -->

<!-- КОНТЕНТ САЙТА (НАЧАЛО) -->    
<div class="waper">
    <!-- Верхний блок -->
    <div class="waper-top">
		<div class="waper-top-content">
            <!-- Логотип -->
            <div class="waper-top-content-logo">
            	<a href="/"><img src="design/default/images/logo-1.png" width="182" height="146" alt="НумисРус - Интернет-аукцион монет."/></a>
            </div>
            <!-- Аукцион -->
            <div class="waper-top-content-auction">
		<?php if ($_smarty_tpl->tpl_vars['no_auction']->value) {?>
            	<strong style="font-size:22px">Открытых аукционов нет</strong>
		<p>ближайший состоится: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['next_auction']->value,"%d / %m в %H:%M");?>
</p>
                <a href="/auctions" title="Все аукционы">Прошедшие аукционы</a>
		<?php } else { ?>
            	<strong><a href="/auctions/<?php echo $_smarty_tpl->tpl_vars['current_auction']->value->id;?>
" target="_parent">Текущий аукцион №<?php echo $_smarty_tpl->tpl_vars['current_auction']->value->id;?>
</a></strong>
                <p>закрытие <?php echo $_smarty_tpl->tpl_vars['current_auction']->value->date_end->day;?>
 <?php echo $_smarty_tpl->tpl_vars['current_auction']->value->date_end->month_label;?>
 <?php echo $_smarty_tpl->tpl_vars['current_auction']->value->date_end->year;?>
 г., <?php echo $_smarty_tpl->tpl_vars['current_auction']->value->date_end->time;?>
</p>
                <a href="/auctions" title="Все аукционы">Все аукционы</a>
		<?php }?>
            </div>
            <!-- Дата -->
            <div class="waper-top-content-date">
				<strong class="timer_day"></strong> <span class="timer_month"></span>
                <div class="waper-top-content-timer">
                	<div class="waper-top-content-timer-item">
						<span class="timer_hour"></span>
                        <div class="waper-top-content-timer-item-title">час.</div>
                    </div>
                    <div class="waper-top-content-timer-between">
						<span>:</span>
                    </div>
                    <div class="waper-top-content-timer-item">
						<span class="timer_min"></span>
                        <div class="waper-top-content-timer-item-title">мин.</div>
                    </div>
                    <div class="waper-top-content-timer-between">
						<span>:</span>
                    </div>
                    <div class="waper-top-content-timer-item">
						<span class="timer_sec"></span>
                        <div class="waper-top-content-timer-item-title">сек.</div>
                    </div>
                </div>
            </div>
            <!-- Кнопка -->
            <div class="waper-top-content-button">
				<a href="/products" target="_parent" title="Наш магазин">
					<div class="waper-top-content-button-item">
						Наш магазин
					</div>
				</a>
                <div id="cart_informer">
                <?php echo $_smarty_tpl->getSubTemplate ('cart_informer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                </div>
            </div>
		</div>
    </div>
    
    <!-- Контент -->
	<div class="waper-container">
    
    <?php echo $_smarty_tpl->tpl_vars['content']->value;?>


	</div>

</div>
<!-- КОНТЕНТ САЙТА (КОНЕЦ) -->

<!-- ПОДВАЛ САЙТА (НАЧАЛО) -->    
<div class="footer">

    <div class="bottom_navigation">
        <ul>
            <?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
            <?php if ($_smarty_tpl->tpl_vars['p']->value->menu_id==5) {?>
            
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['p']->value->url;?>
" class="navigations-1"><span><?php echo $_smarty_tpl->tpl_vars['p']->value->name;?>
</span></a>
                 
                </li>
         
          
            
            <?php }?>
            <?php } ?>

        </ul>
    </div>

    <!-- Контент -->
    <div class="footer-content">
    	<span>
        	Copyright &copy; 2016 Интернет аукцион &laquo;НумисРус&raquo;:  монеты, медали, боны, антиквариат<br>
        	<a href="http://masterstvo.info/" target="_blank">Разработка аукциона</a> 
        </span>
    </div>
</div>
<!-- ПОДВАЛ САЙТА (КОНЕЦ) -->
 
 <!-- Yandex.Metrika counter --> <script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter36836090 = new Ya.Metrika({ id:36836090, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/36836090" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->

</body>
</html>
<?php }} ?>
