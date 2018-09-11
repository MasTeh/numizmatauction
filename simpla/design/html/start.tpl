
{$meta_title = "Активизация аукциона" scope=parent}

{if $message_success}
<!-- Системное сообщение -->
<div class="message message_success">
	<span class="text">

	</span>	
</div>
<!-- Системное сообщение (The End)-->
{/if}

{if $message_error}
<!-- Системное сообщение -->
<div class="message message_error">
	<span class="text">
	</span>
</div>
<!-- Системное сообщение (The End)-->
{/if}
			

<!-- Основная форма -->
<form method=post id=product enctype="multipart/form-data">

{if !$smarty.session.auction_started}
<h2>1. Выбор аукциона для старта (только из тех которые в будущем).</h2>
<select id="auction_id">
	{foreach $auctions as $a}
		<option value="{$a->id}">Аукцион № {$a->id}, {$a->date_label1} - {$a->date_label2}</option>
	{/foreach}
</select>
{/if}

<div></div>

<input type=hidden name="session_id" value="{$smarty.session.id}">

{if $smarty.session.auction_started}

<div class="block">
	<h2 class="hello">Для остановки аукциона, пройдите повторную авторизацию.</h2>
	<br>
	<a href="#" id="send">Выслать код проверочный</a>
	<div id="sms_code" style="display:none">
		<input name="code" value="" type="text" />
		<input type="submit" action="stop" value="Отправить" />
	</div>
</div>

{else}

<div class="block">
	<div style="height:40px"></div>
	<h2 class="hello">2. Подтверждение подлинности.</h2>
	<br>
	<a href="#" id="send">Выслать проверочную смс на телефон</a>
	<div id="sms_code" style="display:none">
		<input name="code" value="" type="text" />
		<input type="submit" action="start" value="Отправить" />
	</div>
</div>

{/if}
			
		
<!-- 		<div class="block">
			<h2>Настройки сайта</h2>
			<ul>
				<li><label class=property>Имя сайта</label><input name="site_name" class="simpla_inp" type="text" value="{$settings->site_name|escape}" /></li>
				<li><label class=property>Имя компании</label><input name="company_name" class="simpla_inp" type="text" value="{$settings->company_name|escape}" /></li>
				<li><label class=property>Формат даты</label><input name="date_format" class="simpla_inp" type="text" value="{$settings->date_format|escape}" /></li>
				<li><label class=property>Email для восстановления пароля</label><input name="admin_email" class="simpla_inp" type="text" value="{$settings->admin_email|escape}" /></li>
			</ul>
		</div>
 -->

		
		<!-- <input class="button_green button_save" type="submit" name="save" value="Сохранить" /> -->
			
	<!-- Левая колонка свойств товара (The End)--> 

	
	
</form>
<!-- Основная форма (The End) -->

{literal}
<script>

function send_sms()
{
	$.ajax({
		url: "ajax/sms_code.php",
		type: "GET",
		data: "action=send",
		success: function(data){ 
			if (data=='201') { alert('СМС подтверждение не удалось выслать'); return false; }
			$('#sms_code').slideDown(300);
			$('#sending_message').remove();
		}
	});
}

$(function() {

	$('#send').click(function() {
		$(this).parent().append('<span id="sending_message">Отправка СМС...</span>');
		$(this).remove(); 
		send_sms();
		return false;
	});	


	$('#sms_code input[type=submit]').click(function() {
		var action = $(this).attr('action');
		var auction_id = $('#auction_id option:selected').val();
		
		$.ajax({
			url: "ajax/sms_code.php",
			type: "GET",
			data: "action=check&auction_id="+auction_id+"&code="+$('input[name=code]').val()+"&action2="+action,
			success: function(data){ 
				if (data=='ok')
				{
					$('#sms_code').remove();
					$('#send').remove();
					$('.hello').html('Система Вас признала. Аукцион активирован.');
					$('#auction_status_label').text('запущен');
					$('#auction_name_label').text('Приостановить аукцион');
				}
				else if (data=='error')
				{
					alert('Код неверный. Мы Вас не признали. Попробуйте ещё раз.');
					send_sms();
				}
				else if (data=='stopped')
				{
					$('#sms_code').remove();
					$('#send').remove();
					$('.hello').html('Аукцион остановлен. Чтобы запустить, зайдите заново в данный раздел или нажмите F5.')
					$('#auction_status_label').text('ожидание');
					$('#auction_name_label').text('Запустить аукцион');					
				}				
			}
		});
		return false;		
	});

});
</script>
{/literal}
