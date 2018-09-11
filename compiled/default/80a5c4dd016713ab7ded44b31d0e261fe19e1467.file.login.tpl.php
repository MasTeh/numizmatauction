<?php /* Smarty version Smarty-3.1.18, created on 2016-10-23 15:51:13
         compiled from "/home/u457006/numisrus.ru/www/design/default/html/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1364251146580cb241aabe48-22781148%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '80a5c4dd016713ab7ded44b31d0e261fe19e1467' => 
    array (
      0 => '/home/u457006/numisrus.ru/www/design/default/html/login.tpl',
      1 => 1459425377,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1364251146580cb241aabe48-22781148',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'email' => 0,
    'password' => 0,
    'error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_580cb241ae84e6_45500251',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_580cb241ae84e6_45500251')) {function content_580cb241ae84e6_45500251($_smarty_tpl) {?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable("Вход", null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
   
<div class="waper-container-item">
<div class="waper-container-item-content-2">
<div style="padding-top:40px"></div>
<h1>Авторизация</h1>
    	<div class="forms-2">
            <form  method="post">
            	<div class="forms-2-row-1">
                	<div class="forms-2-row-1-col">
                        <span>E-mail:</span>
                    </div>
                    <div class="forms-2-row-1-filed">
                        <input type="text" class="form-filed-3" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
" name="email" maxlength="255" />
                    </div>
                </div>
                <div class="forms-2-row-1">
                	<div class="forms-2-row-1-col">
                        <span>Пароль:</span>
                    </div>
                    <div class="forms-2-row-1-filed">
                        <input type="password" class="form-filed-3" value="<?php echo $_smarty_tpl->tpl_vars['password']->value;?>
" name="password" maxlength="255" />
                    </div>
                </div>
                <div class="forms-2-row-2">
                    <a href="user/password_remind/">
                    	Напомнить пароль
                    </a>
                </div>
                <input type="submit" name="login" value="Войти" class="form-button-22">
        	</form>
        </div>


<?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
<div class="message_error">
	<?php if ($_smarty_tpl->tpl_vars['error']->value=='login_incorrect') {?>Неверный логин или пароль
	<?php } elseif ($_smarty_tpl->tpl_vars['error']->value=='user_disabled') {?>Ваш аккаунт еще не активирован.
	<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
<?php }?>
</div>
<?php }?>


</div>
</div><?php }} ?>
