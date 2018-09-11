{* Страница с формой обратной связи *}



{* Канонический адрес страницы *}
{$canonical="/{$page->url}" scope=parent}

<div class="waper-container">
	<div class="waper-container-top">
    	<!-- Хлебные крошки -->
        <div class="waper-container-top-siteway-1">
			<a href="" target="_parent" title="Главная">Главная</a> > Контакты
        </div>
        <!-- Заголовок -->
        <div class="waper-container-top-overall-1">
        	<div class="waper-container-top-overall-1-title">
            	<h1>Контакты</h1>
            </div>
        </div>
    </div>
    <div class="waper-container-item">
        <!-- Контент -->
        <div class="waper-container-item-content-2">
            <div class="waper-container-item-content-text-3">
				<div class="waper-container-item-content-text-3-phone">
					<strong>Телефон</strong>
                    <p>+7 (495) 960-85-49</p>
                </div>
                <div class="waper-container-item-content-text-3-adres">
					<strong>Адрес</strong>
                 <p>ул. Краснобогатырская д.2, офис 57<br/> <i>Режим работы: с 10:00 до 18:00 <br/>ежедневно, без выходных</i></p>
                </div>
                <div class="waper-container-item-content-text-3-email">
					<strong>Электронная почта</strong>
                    <p><a href="mailto:info@numisrus.ru" target="_blank" title="Отправить сообщение">info@numisrus.ru</a></p>
                </div>
			</div>
            <div class="waper-container-item-content-map">
            	<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=OWtsrMGubVDFDtidj3SD_SUDYpp7t3JE&amp;width=925&amp;height=400&amp;lang=ru_RU&amp;sourceType=constructor&amp;scroll=true"></script>
            </div>
            <div class="waper-container-item-content-form">
            	<div class="waper-container-item-content-form-title">
                	<h2>Отправить сообщение</h2>
                </div>
                <div class="waper-container-item-content-form-text">
                	<p>Если у вас возникли вопросы о нашей работе или пожелания или жалобы, или ещё какой-то текст вступительный. Выберите тему вопроса и укажите свой е-мэйл адрес, чтобы мы могли вам ответить.</p>
                </div>
				{if $error}
				<div class="message_error">
					{if $error=='captcha'}
					Неверно введена капча
					{elseif $error=='empty_name'}
					Введите имя
					{elseif $error=='empty_email'}
					Введите email
					{elseif $error=='empty_text'}
					Введите сообщение
					{/if}
				</div>
				{/if}                
                <div class="waper-container-item-content-form-block">
                	<div class="forms-1">
                        <form action="" id="" method="POST">
                        	<div class="forms-1-row-1">
                            	<div class="forms-1-row-1-col">
                                    <span>Ваше имя:</span>
                                </div>
                                <div class="forms-1-row-1-filed">
                                    <input type="text" data-format=".+" data-notice="Введите имя" value="{$name|escape}" name="name"  class="form-filed-1" />
                                </div>
                            </div>
                            <div class="forms-1-row-1">
                                <div class="forms-1-row-1-col">
                                    <span>Ваш e-mail:</span>
                                </div>
                                <div class="forms-1-row-1-filed">
                                    <input type="text" data-format="email" data-notice="Введите email" value="{$email|escape}" name="email" class="form-filed-1" />
                                </div>
                            </div>
                            <div class="forms-1-row-1">
                                <div class="forms-1-row-1-col">
                                    <span>Тема обращения:</span>
                                </div>
                                <div class="forms-1-row-1-filed">
                                    <input type="text" name="" id="" class="form-filed-1" value="" />
                                </div>
                            </div>
                            <div class="forms-1-row-2">
                                <div class="forms-1-row-2-col">
                                    <span>Текст сообщения:</span>
                                </div>
                                <div class="forms-1-row-2-filed">
<textarea data-format=".+" data-notice="Введите сообщение" value="{$message|escape}" name="message" class="form-filed-2">{$message|escape}</textarea>
                                </div>
                            </div>                            


<div class="captcha"><img src="captcha/image.php?{math equation='rand(10,10000)'}"/></div> 
<input class="input_captcha" id="comment_captcha" type="text" name="captcha_code" value="" data-format="\d\d\d\d" data-notice="Введите капчу"/>

                         <br/><br/>
                         <input type="submit" name="feedback" style="padding:10px 20px; background: darkred; color:#fff; font-size:18px; border:none; border-radius:6px">
                         
                        </form>
                    </div>

	
		                
		               
                </div>
            </div>
		</div>
    </div>
</div>


{if $message_sent}
{else}

{/if}
