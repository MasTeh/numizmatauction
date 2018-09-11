<?php /* Smarty version Smarty-3.1.18, created on 2016-10-23 15:38:17
         compiled from "/home/u457006/numisrus.ru/www/design/default/html/login_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1686299202580caf39862888-28764934%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1a14635f631164c37826cf00f4ccaf7b204de4ab' => 
    array (
      0 => '/home/u457006/numisrus.ru/www/design/default/html/login_form.tpl',
      1 => 1459425377,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1686299202580caf39862888-28764934',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_580caf398e1cf9_96905928',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_580caf398e1cf9_96905928')) {function content_580caf398e1cf9_96905928($_smarty_tpl) {?>
<div class="waper-container-item-content-enter" id="login_form">
    <div class="waper-container-item-content-enter-block">
    	<div class="forms-2">
            <form action="user/login/" method="post">
            	<div class="forms-2-row-1">
                	<div class="forms-2-row-1-col">
                        <span>E-mail:</span>
                    </div>
                    <div class="forms-2-row-1-filed">
                        <input type="text" name="email" class="form-filed-3" value="" />
                    </div>
                </div>
                <div class="forms-2-row-1">
                	<div class="forms-2-row-1-col">
                        <span>Пароль:</span>
                    </div>
                    <div class="forms-2-row-1-filed">
                        <input type="password" name="password" class="form-filed-3" value="" />
                    </div>
                </div>
                <input type="hidden" name="next_page" value="user">
                <div class="forms-2-row-2">
                    <a href="user/password_remind/">
                    	Напомнить пароль
                    </a>
                </div>
                <input type="submit" name="login" value="Войти" class="form-button-22" />
        	</form>
        </div>
    </div>
</div>
<?php }} ?>
