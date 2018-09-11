{* Вкладки *}
{capture name=tabs}
	<li><a href="index.php?module=UsersAdmin&group_id=0">Список пользователей</a></li>
{/capture}

{if $user->id}
{$meta_title = $user->name|escape scope=parent}
{/if}

{if $user_adding=='1'}
{$meta_title = 'Добавление пользователя'}
{/if}

{if $message_success}
<!-- Системное сообщение -->
<div class="message message_success">
	<span class="text">
	{if $message_success=='updated'}Пользователь отредактирован{elseif $message_success=='added'}Пользователь добавлен{else}{$message_success|escape}{/if}</span>
	{if $smarty.get.return}
	<a class="button" href="{$smarty.get.return}">Вернуться</a>
	{/if}
</div>
<!-- Системное сообщение (The End)-->
{/if}

{if $message_error}
<!-- Системное сообщение -->
<div class="message message_error">
	<span class="text">{if $message_error=='login_exists'}Пользователь с таким email уже зарегистрирован
	{elseif $message_error=='empty_name'}Введите имя пользователя
	{elseif $message_error=='empty_email'}Введите email пользователя
	{else}{$message_error|escape}{/if}</span>
	{if $smarty.get.return}
	<a class="button" href="{$smarty.get.return}">Вернуться</a>
	{/if}
</div>
<!-- Системное сообщение (The End)-->
{/if}



<form method=post id="product" enctype="multipart/form-data">

<input type=hidden name="session_id" value="{$smarty.session.id}">
{if $user_adding!='1'}
<input name=id type="hidden" value="{$user->id|escape}"/> 
{/if}

<div id="column_left">
		{if $user->bot==1}
		<h3>Личные данные этого пользователя недоступны для изменений, т.к. он бот. Вы можете только удалить его.</h3>
		{else}
		<div class="block">
			<ul>
				{if $groups}
				<li>
					<label class=property>Статус</label>
					<select name="group_id">						
				   		{foreach from=$groups item=g}
				        	<option value='{$g->id}' {if $user->group_id == $g->id}selected{/if}>{$g->name|escape}</option>
				    	{/foreach}
					</select>
				</li>
				{/if}				
				<li>
					<label class=property>Сервисы</label>
					<input name="seller" class="simpla_inp" type="checkbox" {if $user->seller}checked{/if} /> 
					<label for="seller">Продавец</label>&nbsp;&nbsp;
					<input name="buyer" class="simpla_inp" type="checkbox" {if $user->buyer}checked{/if} /> 
					<label for="buyer">Покупатель</label>
					<br /><br />
				</li>
				<li><label class=property>Фамилия</label><input name="fam" class="simpla_inp" type="text" value="{$user->fam}" /></li>
				<li><label class=property>Имя</label><input name="name" class="simpla_inp" type="text" value="{$user->name}" /></li>
				<li><label class=property>Отчество</label><input name="otch" class="simpla_inp" type="text" value="{$user->otch}" /></li>

				<li><label class=property>Ник</label><input name="login" class="simpla_inp" type="text" value="{$user->login|escape}" /></li>
				{if $user_adding!='1'}
				<li><label class=property>Пароль</label>
					<a class="password_remid" href="#">Установить новый</a>
					<div style="display:none" class="new_password_input">
					<input placeholder="Новый пароль" name="new_password" class="simpla_inp new_password_input" type="text" value="" />
					<br />
					<a href="#" class="pass_gen" style="display:block; margin-left:170px; margin-top:5px">Сгенерировать</a>
					<br />
					</div>
				</li>
				{else}
				<li><label class=property>Пароль</label>
					<div class="new_password_input">
					<input name="new_password" class="simpla_inp new_password_input" type="text" value="" />
					<br />
					<a href="#" class="pass_gen" style="display:block; margin-left:170px; margin-top:5px">Сгенерировать</a>
					<br />					
					</div>
				</li>
				{/if}
				<li><label class=property>E-Mail</label><input name="email" class="simpla_inp" type="text" value="{$user->email|escape}" /></li>
				{if $user_adding!='1'}
				<li><label class=property>Дата регистрации</label><input name="created" class="simpla_inp" type="text" disabled value="{$user->created|date}" />
				</li>

				<li><label class=property>Последний IP</label><input name="last_ip" class="simpla_inp" type="text" disabled value="{$user->last_ip|escape}" /></li>
				{/if}
				<li><label class=property>Регион</label><input name="area" class="simpla_inp" type="text" value="{$user->area|escape}" /></li>
				<li><label class=property>Почтовый индекс</label><input name="postcode" class="simpla_inp" type="text" value="{$user->postcode|escape}" /></li>
				<li><label class=property>Город (населенный пункт)</label><input name="city" class="simpla_inp" type="text" value="{$user->city|escape}" />
				</li>
				<li><label class=property>Район</label><input name="region" class="simpla_inp" type="text" value="{$user->region|escape}" /></li>
				<li><label class=property>Улица</label><input name="street" class="simpla_inp" type="text" value="{$user->street|escape}" /></li>
				<li><label class=property>Номер дома</label><input name="number" class="simpla_inp" type="text" value="{$user->number|escape}" /></li>
				<li><label class=property>Корпус</label><input name="housing" class="simpla_inp" type="text" value="{$user->housing|escape}" /></li>
				<li><label class=property>Номер офиса/квартиры</label><input name="office" class="simpla_inp" type="text" value="{$user->office|escape}" /></li>
				<li><label class=property>Телефон</label><input name="phone" class="simpla_inp" type="text" value="{$user->phone|escape}" /></li>

				<li><label class=property>Размер комиссии %</label>
					<input name="commission" class="simpla_inp" type="number" min="0" max="100" value="{if $user->id}{$user->commission}{else}10{/if}" /></li>

				{if $user->document}
				<li><label class=property>Скан документа</label><a href="/simpla/files/documents/{$user->document}" target="_blank">
					<img src="/simpla/files/documents/{$user->document}" class="doc_img" width="150" /><br /><br />
					<a href="#" class="del_img" style="display:block; margin-left:170px; margin-top:5px">Удалить</a><br /><br />
					<input type="hidden" name="del_document" value="0" />
					<input style="display:block; margin-left:170px; margin-top:5px; display:none" name="document" class="simpla_inp" type="file" value="" /><br><br>
				</a></li>
				{else}
				<li><label class=property>Скан документа</label><input name="document" class="simpla_inp" type="file" value="" /></li>
				{/if}
			</ul>
		</div>
		{/if}

		
		<!-- Параметры страницы (The End)-->			
	{if $user_adding=='1'}
	<input class="button_green button_save" type="submit" name="user_info" value="Добавить" />
	{else}
	{if $user->bot!=1}
	<input class="button_green button_save" type="submit" name="user_info" value="Сохранить" />
	{/if}
	{/if}
</div>
		

<div id="column_right">


<div style="padding:10px">
<h2>Сделки</h2>

<div style="padding:10px">
	{foreach $auctions as $a}
		<a href="index.php?module=UserAdmin&action=open_print1&auction_id={$a->id}" style="display:block; padding:8px" target="_blank">
		    Возвратная накладная за аукцион № {$a->id}
		</a>
	{/foreach}	
</div>
<br>

Аукцион

	{foreach $auctions as $a}
		<a href="{url auction_filter=$a->id}" class="user_filter {if $smarty.get.auction_filter==$a->id}user_filter_active{/if}">
			{$a->id}
		</a>
	{/foreach}	


<br><br>
{if $deals}
<div style="height:400px; overflow: scroll">
{foreach $deals as $deal}
<div style="margin-bottom:10px">
{if $deal->type=='buy'}
<div style="display:inline-block;padding:4px;background:#b1ffc2; font-size:12px; font-weight:bold">
покупка
</div>
{else if $deal->type=='sell'}
<div style="display:inline-block;padding:4px;background:#fffeb1; font-size:12px; font-weight:bold">
продажа
</div>
{/if}
<a style="font-size:13px" href="index.php?module=DealAdmin&id={$deal->id}">сделка № {$deal->id}</a> на сумму {$deal->total_price|number_format:0:".":","}руб  от {$deal->date}
</div>
{/foreach}
</div>
{/if}

</div>

{if $lots}

<div style="padding:10px">
<h2>Лоты</h2>

Аукцион

	{foreach $auctions as $a}
		<a href="{url auction_filter2=$a->id}" class="user_filter {if $smarty.get.auction_filter2==$a->id}user_filter_active{/if}">
			{$a->id}
		</a>
	{/foreach}	


<br><br>

<div style="height:400px; overflow: scroll">

{foreach $lots as $lot}

<div style="float:left; width:50px; height:50px; display:inline-block">
  <a target="_blank" href="index.php?module=CommissionProductAdmin&id={$lot->product_id}"><img src="{$lot->images[0]->filename|resize:50:50}" /></a>
</div>
<div style="float:left; height:30px; display:inline-block; padding:10px; width:300px">
<a target="_blank" href="index.php?module=CommissionProductAdmin&id={$lot->product_id}">#{$lot->order_num} - {$lot->name}</a>
</div>

<div style="clear:both"></div>

{/foreach}

</div>

<div style="clear:both">
{include file='pagination.tpl'}
</div>

</div>


{/if}

</div>





		
</form>
<!-- Основная форма (The End) -->
 

{* On document load *}
{literal}

<script>

function translit(str)
{
	var ru=("А-а-Б-б-В-в-Ґ-ґ-Г-г-Д-д-Е-е-Ё-ё-Є-є-Ж-ж-З-з-И-и-І-і-Ї-ї-Й-й-К-к-Л-л-М-м-Н-н-О-о-П-п-Р-р-С-с-Т-т-У-у-Ф-ф-Х-х-Ц-ц-Ч-ч-Ш-ш-Щ-щ-Ъ-ъ-Ы-ы-Ь-ь-Э-э-Ю-ю-Я-я").split("-")   
	var en=("A-a-B-b-V-v-G-g-G-g-D-d-E-e-E-e-E-e-ZH-zh-Z-z-I-i-I-i-I-i-J-j-K-k-L-l-M-m-N-n-O-o-P-p-R-r-S-s-T-t-U-u-F-f-H-h-TS-ts-CH-ch-SH-sh-SCH-sch-'-'-Y-y-'-'-E-e-YU-yu-YA-ya").split("-")   
 	var res = '';
	for(var i=0, l=str.length; i<l; i++)
	{ 
		var s = str.charAt(i), n = ru.indexOf(s); 
		if(n >= 0) { res += en[n]; } 
		else { res += s; } 
    } 
    return res;  
}

$(function() {

	$('.del_img').click(function() {
		$('input[name=del_document]').val('1');
		$('img.doc_img').remove();
		$('input[name=document]').show();
		$(this).remove();
		return false;
	});

	//Скрипт генерации паролей
	function str_rand() {
		var result       = '';
		var words        = '0123456789qwertyuiopasdfghjklzxcvbnm';
		var max_position = words.length - 1;
			for( i = 0; i < 8; ++i ) {
				position = Math.floor ( Math.random() * max_position );
				result = result + words.substring(position, position + 1);
			}
		return result;
	}	

	var login_gen1 = '';
	var login_gen2 = '';
	var login_gen3 = '';

	$('.pass_gen').click(function() {
		$('.new_password_input').val(str_rand());
		return false;
	});

	$('input[name=name]').keypress(function() {		
			text = translit($(this).val());
			login_gen1 = text[0];
			$('input[name=login]').val(login_gen2+login_gen1+login_gen3);
	});

	$('input[name=fam]').keypress(function() {
			text = translit($(this).val());
			login_gen2 = text;
			$('input[name=login]').val(login_gen2+login_gen1+login_gen3);
	});

	$('input[name=otch]').keypress(function() {
			text = translit($(this).val());
			login_gen3 = text[0];
			$('input[name=login]').val(login_gen2+login_gen1+login_gen3);
	});


	$('.password_remid').click(function() {
		$('.new_password_input').fadeIn(300);
		$(this).hide();
		return false;
	});

	// Раскраска строк
	function colorize()
	{
		$("#list div.row:even").addClass('even');
		$("#list div.row:odd").removeClass('even');
	}
	// Раскрасить строки сразу
	colorize();

	// Выделить все
	$("#check_all").click(function() {
		$('#list input[type="checkbox"][name*="check"]').attr('checked', 1-$('#list input[type="checkbox"][name*="check"]').attr('checked'));
	});	

	// Удалить 
	$("a.delete").click(function() {
		$('#list input[type="checkbox"][name*="check"]').attr('checked', false);
		$(this).closest(".row").find('input[type="checkbox"][name*="check"]').attr('checked', true);
		$(this).closest("form#list").find('select[name="action"] option[value=delete]').attr('selected', true);
		$(this).closest("form#list").submit();
	});

	// Подтверждение удаления
	$("#list").submit(function() {
		if($('select[name="action"]').val()=='delete' && !confirm('Подтвердите удаление'))
			return false;	
	});
});

</script>
{/literal}
