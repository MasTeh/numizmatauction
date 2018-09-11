{* Письмо восстановления пароля *}
	
{$subject = 'Новый пароль' scope=parent}
<html>
	<body>
		<p>{$user->name|escape}, на сайте <a href='http://{$config->root_url}/'>{$settings->site_name}</a> был сделан запрос на восстановление вашего пароля.</p>
		<p>Ваш новый пароль: <b>{$new_password}</b></p>
		
		
		<p>Вы можете изменить пароль в личном кабинете.</p>
	</body>
</html>

