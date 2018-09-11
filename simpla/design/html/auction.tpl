{* Вкладки *}
{capture name=tabs}
	<li class="active"><a href="index.php?module=AuctionsAdmin">Аукционы</a></li>
	<li><a href="index.php?module=LotsAdmin">Лоты</a></li>
{/capture}

{if $auction->id}
{$meta_title = 'Правка аукциона' scope=parent}
{else}
{$meta_title = 'Новый аукцион' scope=parent}
{/if}

{* Подключаем Tiny MCE *}
{include file='tinymce_init.tpl'}


{if $message_success}
<!-- Системное сообщение -->
<div class="message message_success">
	<span class="text">{if $message_success=='added'}Аукцион добавлен{elseif $message_success=='updated'}Аукцион обновлен{else}{$message_success}{/if}</span>
	<a class="link" target="_blank" href="../auctions/{$auction->url}">Открыть аукцион на сайте</a>
	{if $smarty.get.return}
	<a class="button" href="{$smarty.get.return}">Вернуться</a>
	{/if}
	

	
</div>
<!-- Системное сообщение (The End)-->
{/if}

{if $message_error}
<!-- Системное сообщение -->
<div class="message message_error">
	<span class="text">{if $message_error=='invalid_date'}
		Вы попытались создать парадокс во времени, указав дату начала позже даты завершения, Эйнштейн не одобряет такой подход!{else}{$message_error}{/if}
	</span>
</div>
<!-- Системное сообщение (The End)-->
{/if}


<!-- Основная форма -->
<form method=post id=product enctype="multipart/form-data">
<input type=hidden name="session_id" value="{$smarty.session.id}">
	<div id="name" style="display:none">
		<input class="name" name=name type="text" value="{$auction->name|escape}"/> 
		<input name=id type="hidden" value="{$auction->id|escape}"/> 
	</div> 

 		
	<!-- Левая колонка свойств товара -->
	<div id="column_left">
			
		<!-- Параметры страницы -->
		<div class="block layer">
			<h2>Параметры аукциона</h2>
			<ul>
				<li><label class="property">Дата открытия</label>
					<input name="date_start" class="simpla_inp" type="date" value="{$auction->date_start}">
					<input name="time_start" class="simpla_inp" type="time" value="{$auction->time_start}">
				</li>
				<li><label class="property">Дата закрытия первого лота</label>
					<input name="date_end" class="simpla_inp" type="date" value="{$auction->date_end}">
					<input name="time_end" class="simpla_inp" type="time" value="{$auction->time_end}">
				</li>
				<li><label class="property">Время на один лот</label>
					<input name="duration" class="simpla_inp" style="width:100px" type="number" value="{if $auction->duration>0}{$auction->duration}{else}5{/if}"> секунд</li>
				
			</ul>
		</div>
		<!-- Параметры страницы (The End)-->
		
			
	<input class="button_green button_save" type="submit" name="" value="Сохранить" />
	</div>
	<!-- Левая колонка свойств товара (The End)--> 
	

	

	<div class="block layer">
		<h2>Описание</h2>
		<textarea name="description" class="editor_large">{$auction->description|escape}</textarea>
	</div>
	<!-- Описание  (The End)-->
	<input class="button_green button_save" type="submit" name="" value="Сохранить" />
	
	
</form>

