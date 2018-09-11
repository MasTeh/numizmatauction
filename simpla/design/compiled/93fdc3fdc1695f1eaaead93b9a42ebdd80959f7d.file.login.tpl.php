<?php /* Smarty version Smarty-3.1.18, created on 2016-10-25 00:27:17
         compiled from "simpla/design/html/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1971149890580e7cb5c0df20-74997324%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '93fdc3fdc1695f1eaaead93b9a42ebdd80959f7d' => 
    array (
      0 => 'simpla/design/html/login.tpl',
      1 => 1461740541,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1971149890580e7cb5c0df20-74997324',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'show_sess_id' => 0,
    'login' => 0,
    'incorrect' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_580e7cb5ef52a8_36269015',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_580e7cb5ef52a8_36269015')) {function content_580e7cb5ef52a8_36269015($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<META HTTP-EQUIV="Expires" CONTENT="-1">
<title>Авторизация</title>
<link rel="icon" href="design/images/favicon.ico" type="image/x-icon">
<link href="design/css/style.css" rel="stylesheet" type="text/css" />

<script src="design/js/jquery/jquery.js"></script>
<script src="design/js/jquery/jquery.form.js"></script>
<script src="design/js/jquery/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="design/js/jquery/jquery-ui.css" media="screen" />

<meta name="viewport" content="width=1024">

<script type="text/javascript">
$(function() { 
	$('form').submit(function() {
		if (($('input[name=login]').val()=='' || $('input[name=password]').val() =='') && $('input[name=remid_password]').attr('checked')===undefined) 
			return false;
	});
});
</script>

</head>
<body>



<!-- Вся страница --> 
<div id="main">

<div style="width:450px; padding:20px; position:absolute; top:50%; left:50%; margin-left:-300px; margin-top:-150px; border:1px solid #ccc; background:#fff; 
box-shadow:5px 5px 100px rgba(0,0,0,0.2)">


<form style="padding:40px" method="post">
<?php if ($_smarty_tpl->tpl_vars['show_sess_id']->value) {?>
<input type=hidden name="session_id" value="<?php echo $_SESSION['id'];?>
">
<?php }?>
<span style="width:80px; display:inline-block; font-size:20px">Логин</span>
<input class="simpla_inp" type="text" name="login" value="<?php echo $_smarty_tpl->tpl_vars['login']->value;?>
" style="font-size:20px" /><br>
<div style="height:10px"></div>
<span style="width:80px; display:inline-block; font-size:20px">Пароль</span>
<input class="simpla_inp" type="password" name="password" value="" style="font-size:20px" /><br><br>
<?php if (!$_SESSION['access_denied']) {?>
<input style="margin-left:85px" type="checkbox" name="remid_password"> <span style="width:80px; font-size:16px">Пароль утерян</span>
<?php }?>
<br><br>
<?php if ($_smarty_tpl->tpl_vars['incorrect']->value) {?>
<div style="margin-left:85px; color:red">Неверно указан логин и(или) пароль</div>
<?php }?>
<?php if ($_SESSION['access_denied']) {?>
<div style="margin-left:85px; color:#000; font-size:14px">Превышен лимит попыток ввода пароля. <br>Мы вам не доверяем. <br>Если Вы не взломщик, не переживайте, через 5 минут можно попробовать снова.</div>
<?php } else { ?>
<input type="submit" value="Войти" style="font-size:18px; padding:5px 16px; margin-left:85px" />
<?php }?>
</form>
</div>
	
</div>
<!-- Вся страница (The End)--> 

</body>
</html><?php }} ?>
