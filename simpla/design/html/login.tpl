<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
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
{if $show_sess_id}
<input type=hidden name="session_id" value="{$smarty.session.id}">
{/if}
<span style="width:80px; display:inline-block; font-size:20px">Логин</span>
<input class="simpla_inp" type="text" name="login" value="{$login}" style="font-size:20px" /><br>
<div style="height:10px"></div>
<span style="width:80px; display:inline-block; font-size:20px">Пароль</span>
<input class="simpla_inp" type="password" name="password" value="" style="font-size:20px" /><br><br>
{if !$smarty.session.access_denied}
<input style="margin-left:85px" type="checkbox" name="remid_password"> <span style="width:80px; font-size:16px">Пароль утерян</span>
{/if}
<br><br>
{if $incorrect}
<div style="margin-left:85px; color:red">Неверно указан логин и(или) пароль</div>
{/if}
{if $smarty.session.access_denied}
<div style="margin-left:85px; color:#000; font-size:14px">Превышен лимит попыток ввода пароля. <br>Мы вам не доверяем. <br>Если Вы не взломщик, не переживайте, через 5 минут можно попробовать снова.</div>
{else}
<input type="submit" value="Войти" style="font-size:18px; padding:5px 16px; margin-left:85px" />
{/if}
</form>
</div>
	
</div>
<!-- Вся страница (The End)--> 

</body>
</html>