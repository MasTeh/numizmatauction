<?php /* Smarty version Smarty-3.1.18, created on 2016-10-25 05:16:31
         compiled from "/home/u457006/numisrus.ru/www/design/default/html/password_remind.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1019691393580ec07f986318-48176690%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '77c1ec568903259a963651a985604c66cbcefc28' => 
    array (
      0 => '/home/u457006/numisrus.ru/www/design/default/html/password_remind.tpl',
      1 => 1462183284,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1019691393580ec07f986318-48176690',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'email_sent' => 0,
    'email' => 0,
    'error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_580ec07fb1af44_80080842',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_580ec07fb1af44_80080842')) {function content_580ec07fb1af44_80080842($_smarty_tpl) {?>


<?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable("/user/password_remind", null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['canonical'] = clone $_smarty_tpl->tpl_vars['canonical'];?>

<div class="waper-container-item">
<div class="waper-container-item-content-2">
<div style="padding-top:40px"></div>

<?php if ($_smarty_tpl->tpl_vars['email_sent']->value) {?>
<h1>Вам отправлено письмо</h1>

<p>На <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['email']->value, ENT_QUOTES, 'UTF-8', true);?>
 отправлено письмо для восстановления пароля.</p>
<?php } else { ?>
<h1>Напоминание пароля</h1>

<?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
<div class="message_error">
	<?php if ($_smarty_tpl->tpl_vars['error']->value=='user_not_found') {?>Пользователь не найден
	<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
<?php }?>
</div>
<?php }?>
<br><br>
<form class="form" method="post">
	<label>Введите email, который вы указывали при регистрации</label>
	<input type="text" name="email" data-format="email" data-notice="Введите email" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['email']->value, ENT_QUOTES, 'UTF-8', true);?>
"  maxlength="255"/>
	<input type="submit" class="button_submit" value="Вспомнить" />
</form>
<?php }?>

</div>
</div><?php }} ?>
