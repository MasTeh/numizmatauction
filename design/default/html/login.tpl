{* Страница входа пользователя *}
{$meta_title = "Вход" scope=parent}
   
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
                        <input type="text" class="form-filed-3" value="{$email}" name="email" maxlength="255" />
                    </div>
                </div>
                <div class="forms-2-row-1">
                	<div class="forms-2-row-1-col">
                        <span>Пароль:</span>
                    </div>
                    <div class="forms-2-row-1-filed">
                        <input type="password" class="form-filed-3" value="{$password}" name="password" maxlength="255" />
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


{if $error}
<div class="message_error">
	{if $error == 'login_incorrect'}Неверный логин или пароль
	{elseif $error == 'user_disabled'}Ваш аккаунт еще не активирован.
	{else}{$error}{/if}
</div>
{/if}


</div>
</div>