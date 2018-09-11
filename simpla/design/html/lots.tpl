{* Вкладки *}
{capture name=tabs}
	<li><a href="index.php?module=AuctionsAdmin">Аукционы</a></li>
	<li class="active"><a href="index.php?module=LotsAdmin">Лоты</a></li>
{/capture}

{* Title *}
{$meta_title='Лоты' scope=parent}

{* Поиск *}
<form method="get">
<div id="search">
	<input type="hidden" name="module" value="LotsAdmin">
	<input type="hidden" name="current_auction" value="{$current_auction}">
	<input class="search" type="text" name="keyword" value="{$keyword|escape}" />
	<input class="search_button" type="submit" value=""/>
</div>
</form>


{* Заголовок *}
<div id="header">
	{if $products_count}
		{if $keyword}
			<h1>{$products_count|plural:'Найден':'Найдено':'Найдено'} {$products_count} {$products_count|plural:'лот':'лотов':'лота'}</h1>
		{else}
			<h1>{$products_count} {$products_count|plural:'лот':'лотов':'лота'}</h1>
		{/if}		
	{else}
		<h1>Нет лотов</h1>
	{/if}
</div>	

{if $message_error}
<!-- Системное сообщение -->
<div class="message message_error">
	<span class="text">
	</span>
</div>
<!-- Системное сообщение (The End)-->
{/if}

<input type=hidden name="session_id" value="{$smarty.session.id}">


<div id="main_list">


{foreach $categories as $c}
<a style="display:inline-block; padding:6px; {if $c->id==$smarty.get.category_id}background:#fff; border:1px dotted #000; font-weight:bold{/if}" href="{url category_id=$c->id}">{$c->name}</a>
{/foreach}
<div style="height:30px"></div>		
	
{if $lots}
<form id="list_form" method="post">
	<input type="hidden" name="session_id" value="{$smarty.session.id}">

	<!-- Листалка страниц -->
	{include file='pagination.tpl'}	
	<!-- Листалка страниц (The End) -->
	
		<div id="list">
		{foreach $lots as $lot}
		<div class="row {if $lot->featured}featured{/if}" {if $lot->status==2} style="background:#fffeb1" {else if $lot->status==3} style="background:#b1ffc2" {else if $lot->status==4} style="background:#ffd3d3" {/if}>
			<input type="hidden" name="positions[{$lot->lot_id}]" value="{$lot->lot_id}">
			<div class="move cell"><div class="move_zone"></div></div>
	 		<div class="checkbox cell">
				<input type="checkbox" name="check[]" value="{$lot->lot_id}"/>				
			</div>
			<div class="image cell">
				{$image = $lot->images|@first}
				{if $image}
				<a href="{url module=LotAdmin id=$lot->lot_id return=$smarty.server.REQUEST_URI}"><img src="{$image->filename|escape|resize:35:35}" /></a>
				{/if}
			</div>

			<div class="name product_name cell">
			 	
			 	<div class="variants">
			 	<ul>
				
				<li>
					<span style="font-size:14px">
					{$lot->price|number_format:0:".":" "} {$currency->sign}  
					</span>
				</li>
				
				</ul>
				</div>
				
				<div style="float:left; margin-right:10px; width:80px">
					<b># {$lot->order_num}</b>
				</div>
				<a style="display:inline-block;width:200px" href="{url module=CommissionProductAdmin id=$lot->product_id return=$smarty.server.REQUEST_URI}">
					 {$lot->name}</a>

				
			
	 			
			</div>



			<div class="icons cell">
				
				<a class="featured"  title="Выводить на главной"     href="#"></a>
				{if $lot->status==1}
				<a class="delete"    title="Вернуть на комиссию"     href="#"></a>
				{/if}
			</div>
			
			<div class="clear"></div>
		</div>
		{/foreach}
		</div>

	<!-- Листалка страниц -->
	{include file='pagination.tpl'}	
	<!-- Листалка страниц (The End) -->		


		<div id="action">
			<label id="check_all" class="dash_link">Выбрать все</label>
		
			<span id="select">
			<select name="action">
				<option value="">выбрать действие</option>
				<option value="delete">Вернуть на комиссию</option>
			</select>
			</span>


		
			<input id="apply_action" class="button_green" type="submit" value="Применить">		

		</div>
		
	</form>
{else}

Нет лотов

{/if}




</div>

<!-- Меню -->
<div id="right_menu">
	
	<!-- Фильтры -->
	<ul>
		<li {if !$filter}class="selected"{/if}>
			<a href="{url keyword=null page=null filter=null}">Все лоты</a></li>

		<li {if $filter=='1'}class="selected"{/if}>
			<a href="{url filter='1'}">Готовятся к торгам</a></li>

		<li {if $filter=='2'}class="selected"{/if}>
			<a href="{url filter='2'}">На торгах</a></li>

		<li {if $filter=='3'}class="selected"{/if}>
			<a href="{url filter='3'}">Ожидают оплаты покупателем</a></li>

		<li {if $filter=='4'}class="selected"{/if}>
			<a href="{url filter='4'}">Лот продан и оплачен</a></li>

		<li {if $filter=='5'}class="selected"{/if}>
			<a href="{url filter='5'}">Лот не продан</a></li>									


	</ul>
	<!-- Фильтры -->



	{if $auctions}
	<ul>
		<li {if !$current_auction}class="selected"{/if}>
			<a href="{url keyword=null current_auction=null}">Все аукционы</a>
		</li>

		{foreach $auctions as $a}
		<li {if $current_auction == $a->id}class="selected"{/if}>
			<a href='{url keyword=null current_auction={$a->id}}'>Аукцион № {$a->id}, {$a->date_label1} - {$a->date_label2}</a>
		</li>
		{/foreach}
	</ul>
	{/if}
	
</div>
<!-- Меню  (The End) -->

{literal}
<script>
$(function() {

	// Удалить товар
	$("a.delete").click(function() {
		if (!confirm('Лот будет удален, а товар возвращен на комиссию. Подтверждаете?')) return false;
		$('#list input[type="checkbox"][name*="check"]').attr('checked', false);
		$(this).closest("div.row").find('input[type="checkbox"][name*="check"]').attr('checked', true);
		$(this).closest("form").find('select[name="action"] option[value=delete]').attr('selected', true);
		$(this).closest("form").submit();
	});	

	// Сделать хитом
	$("a.featured").click(function() {
		var icon        = $(this);
		var line        = icon.closest("div.row");
		var id          = line.find('input[type="checkbox"][name*="check"]').val();
		var state       = line.hasClass('featured')?0:1;
		icon.addClass('loading_icon');
		$.ajax({
			type: 'POST',
			url: 'ajax/update_object.php',
			data: {'object': 'lots', 'id': id, 'values': {'featured': state}, 'session_id': '{/literal}{$smarty.session.id}{literal}'},
			success: function(data){
				icon.removeClass('loading_icon');
				if(state)
					line.addClass('featured');				
				else
					line.removeClass('featured');
			},
			dataType: 'json'
		});	
		return false;	
	});

	// Выделить все
	$("#check_all").click(function() {
		$('#list input[type="checkbox"][name*="check"]').attr('checked', $('#list input[type="checkbox"][name*="check"]:not(:checked)').length>0);
	});		

});
</script>
{/literal}
