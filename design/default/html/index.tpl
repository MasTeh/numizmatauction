<!DOCTYPE html>
{*
	Общий вид страницы
	Этот шаблон отвечает за общий вид страниц без центрального блока.
*}
<html>
<head>

<meta charset="utf-8">
<base href="{$config->root_url}/"/>
<title>{$meta_title|escape}</title>


{* Метатеги *}
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="{$meta_description|escape}" />
<meta name="keywords"    content="{$meta_keywords|escape}" />
<meta name="viewport" content="width=1024"/>


{* Канонический адрес страницы *}
{if isset($canonical)}<link rel="canonical" href="{$config->root_url}{$canonical}"/>{/if}

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


{* Аяксовая корзина *}
<script src="design/default/js/jquery-1.8.3.min.js"></script>
<script src="design/default/js/jquery-ui.min.js"></script>
<script src="design/default/js/ajax_cart.js"></script>

{* js-проверка форм *}
<script src="js/baloon/js/baloon.js" type="text/javascript"></script>
<link   href="js/baloon/css/baloon.css" rel="stylesheet" type="text/css" /> 

{* Таймер *}
<script src="design/default/js/timer.js"></script>
<script src="design/default/js/index.js"></script>

<script src="js/jquery.msgbox.js"></script>

</head>

<body>
{include file='login_form.tpl'}


<!-- ШАПКА САЙТА (НАЧАЛО) -->    
<div class="header">
    <div class="header-content">
        <!-- Навигация -->
        <div class="header-content-navigation">
            <div class="navigation">
                <ul>
                    {foreach $pages as $p}
                    {if $p->menu_id==1}
                    
                        <li class="navigation-links">
                            <a href="{$p->url}" class="navigations-1"><span>{$p->name}</span></a>
                        </li>
                    
                    {/if}
                    {/foreach}

                </ul>
            </div>
        </div>
        <!-- Профиль -->
        <div class="header-content-profile">
            <div class="profile">
                <ul>
                    {if $user}
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

                    {else}
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
                    {/if}
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
		{if $no_auction}
            	<strong style="font-size:22px">Открытых аукционов нет</strong>
		<p>ближайший состоится: {$next_auction|date_format:"%d / %m в %H:%M"}</p>
                <a href="/auctions" title="Все аукционы">Прошедшие аукционы</a>
		{else}
            	<strong><a href="/auctions/{$current_auction->id}" target="_parent">Текущий аукцион №{$current_auction->id}</a></strong>
                <p>закрытие {$current_auction->date_end->day} {$current_auction->date_end->month_label} {$current_auction->date_end->year} г., {$current_auction->date_end->time}</p>
                <a href="/auctions" title="Все аукционы">Все аукционы</a>
		{/if}
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
                {include file='cart_informer.tpl'}
                </div>
            </div>
		</div>
    </div>
    
    <!-- Контент -->
	<div class="waper-container">
    
    {$content}

	</div>

</div>
<!-- КОНТЕНТ САЙТА (КОНЕЦ) -->

<!-- ПОДВАЛ САЙТА (НАЧАЛО) -->    
<div class="footer">

    <div class="bottom_navigation">
        <ul>
            {foreach $pages as $p}
            {if $p->menu_id==5}
            
                <li>
                    <a href="{$p->url}" class="navigations-1"><span>{$p->name}</span></a>
                 
                </li>
         
          
            
            {/if}
            {/foreach}

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
