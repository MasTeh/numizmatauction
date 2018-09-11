{* Письмо пользователю для восстановления пароля *}

{* Канонический адрес страницы *}
{$canonical="/user/password_remind" scope=parent}

<div class="waper-container-item">
<div class="waper-container-item-content-2">
<div style="padding-top:40px"></div>

{if $email_sent}
<h1>Вам отправлено письмо</h1>

<p>На {$email|escape} отправлено письмо для восстановления пароля.</p>
{else}
<h1>Напоминание пароля</h1>

{if $error}
<div class="message_error">
	{if $error == 'user_not_found'}Пользователь не найден
	{else}{$error}{/if}
</div>
{/if}
<br><br>
<form class="form" method="post">
	<label>Введите email, который вы указывали при регистрации</label>
	<input type="text" name="email" data-format="email" data-notice="Введите email" value="{$email|escape}"  maxlength="255"/>
	<input type="submit" class="button_submit" value="Вспомнить" />
</form>
{/if}

</div>
</div>