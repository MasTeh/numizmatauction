{* Вкладки *}
{capture name=tabs}
	<li class="active"><a href="index.php?module=UsersAdmin">Пользователи</a></li>
	
{/capture}

{* Title *}
{$meta_title='Пользователи' scope=parent}

{* Поиск *}
{if $users || $keyword}
<form method="get">
<div id="search">
	<input type="hidden" name="module" value='UsersAdmin'>
	<input class="search" type="text" name="keyword" value="{$keyword|escape}" />
	<input class="search_button" type="submit" value=""/>
</div>
</form>
{/if}

{* Заголовок *}
<div id="header">
	{if $keyword && $users_count>0}
	<h1>{$users_count|plural:'Нашелся':'Нашлось':'Нашлись'} {$users_count} {$users_count|plural:'пользователь':'пользователей':'пользователя'}</h1>
	{elseif $users_count>0}
	<h1>{$users_count} {$users_count|plural:'пользователь':'пользователей':'пользователя'}</h1> 	
	{else}
	<h1>Нет пользователей</h1> 	
	{/if}
	
	{if $users_count>0}
	<form method="post" action="{url module=ExportUsersAdmin}" target="_blank">
	<input type="hidden" name="session_id" value="{$smarty.session.id}">
	<input type="image" src="./design/images/export_excel.png" name="export" title="Экспортировать этих пользователей">
	</form>
	{/if}

<a class="add" href="{url module=UserAdmin return=$smarty.server.REQUEST_URI}">Добавить пользователя</a>	
	
</div>

{if $users}
<!-- Основная часть -->
<div id="main_list">

	<!-- Листалка страниц -->
	{include file='pagination.tpl'}	
	<!-- Листалка страниц (The End) -->

	<div id="sort_links" style='display:block;'>
	<!-- Ссылки для сортировки -->
	Упорядочить по 
	{if $sort!='name'}<a href="{url sort=name}">имени</a>{else}имени{/if} или
	{if $sort!='date'}<a href="{url sort=date}">дате</a>{else}дате{/if}
	<!-- Ссылки для сортировки (The End) -->
	</div>

	<form id="form_list" method="post">
	<input type="hidden" name="session_id" value="{$smarty.session.id}">
	
		<div id="list">	
			{foreach $users as $user}
			<div class="row" style="{if $user->group_id==2}background-color:#e6f9d8;{elseif $user->group_id==3}opacity:0.3;{/if}">
		 		<div class="checkbox cell">
					<input type="checkbox" name="check[]" value="{$user->id}"/>				
				</div>
				<div class="cell" style="padding:10px; width:220px; overflow:hidden">
					{if $user->bot==0}
					<a href="index.php?module=UserAdmin&id={$user->id}">#{$user->id} <span style="font-weight:bold">{$user->fam}</span> {$user->name} {$user->otch}</a>
					{else}
					<a href="index.php?module=UserAdmin&id={$user->id}">#{$user->id} 
					{$user->fam} {$user->name|truncate:2:'.'} {$user->otch|truncate:2:'.'}</a>
					{/if}
				</div>
				<div class="cell" style="padding:10px">
				{if $user->bot!=1}
					<a href="mailto:{$user->name|escape}<{$user->email|escape}>">написать</a>	
				{else}
				robot
				{/if}
				</div>
				<div class="cell" style="padding:10px; width:150px; ">
					{if $user->seller}Продавец{/if}
					{if $user->seller && $user->buyer}/ {/if}
					{if $user->buyer}Покупатель{/if}
				</div>				
				<div class="cell" style="padding:10px">
					{if $user->deals_count > 0}sell {$user->sells_count} / buy {$user->buys_count}{else}нет сделок{/if}
				</div>				
				<div class="cell" style="padding:10px">
					{$user->cash}
				</div>						
				<div class="icons cell">
					<!-- <a class="enable" title="Активен" href="#"></a> -->
					<a class="delete" title="Удалить" href="#"></a>
				</div>
				<div class="clear"></div>
			</div>
			{/foreach}
		</div>
	
		<div id="action">
		<label id="check_all" class="dash_link">Выбрать все</label>
	
		<span id=select>
		<select name="action">
			<option value="enable">Сделать подтвержденным</option>
			<option value="disable">Заблокировать</option>			
			<option value="delete">Удалить</option>
		</select>
		</span>
	
		<input id="apply_action" class="button_green" type="submit" value="Применить">
		</div>

	</form>

	<!-- Листалка страниц -->
	{include file='pagination.tpl'}	
	<!-- Листалка страниц (The End) -->

</div>
{/if}

 <!-- Меню -->
<div id="right_menu">

	<!-- Группы -->
	{if $groups}
	<ul>
		<li {if !$group->id}class="selected"{/if}><a href='index.php?module=UsersAdmin'>Весь список</a></li>		
		{foreach $groups as $g}
		<li {if $group->id == $g->id}class="selected"{/if}><a href="index.php?module=UsersAdmin&group_id={$g->id}">{$g->name}</a></li>
		{/foreach}
	</ul>
	{/if}
	<!-- Группы (The End)-->

	<ul>
		<li {if !$user_type}class="selected"{/if}><a href="{url user_type=null}">Обе категории</a></li>
		<li {if $user_type == 1}class="selected"{/if}><a href="{url user_type=1}">Продавцы</a></li>
		<li {if $user_type == 2}class="selected"{/if}><a href="{url user_type=2}">Покупатели</a></li>
	</ul>	
		
</div>
<!-- Меню  (The End) -->


{literal}
<script>
$(function() {

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
		$(this).closest("form").find('select[name="action"] option[value=delete]').attr('selected', true);
		$(this).closest("form").submit();
	});
	
	// Скрыт/Видим
	$("a.enable").click(function() {
		var icon        = $(this);
		var line        = icon.closest(".row");
		var id          = line.find('input[type="checkbox"][name*="check"]').val();
		var state       = line.hasClass('invisible')?1:0;
		icon.addClass('loading_icon');
		$.ajax({
			type: 'POST',
			url: 'ajax/update_object.php',
			data: {'object': 'user', 'id': id, 'values': {'enabled': state}, 'session_id': '{/literal}{$smarty.session.id}{literal}'},
			success: function(data){
				icon.removeClass('loading_icon');
				if(state)
					line.removeClass('invisible');
				else
					line.addClass('invisible');				
			},
			dataType: 'json'
		});	
		return false;	
	});
	
	// Подтверждение удаления
	$("form").submit(function() {
		if($('#list input[type="checkbox"][name*="check"]:checked').length>0)
			if($('select[name="action"]').val()=='delete' && !confirm('Подтвердите удаление'))
				return false;	
	});
});

</script>
{/literal}
