{* Вкладки *}
{capture name=tabs}
	<li {if $status===0}class="active"{/if}><a href="{url module=DealsAdmin status=0 keyword=null id=null page=null label=null}">Выйгран</a></li>
	<li {if $status==1}class="active"{/if}><a href="{url module=DealsAdmin status=1 keyword=null id=null page=null label=null}">Ждёт оплаты</a></li>
	<li {if $status==2}class="active"{/if}><a href="{url module=DealsAdmin status=2 keyword=null id=null page=null label=null}">Выдан покупателю</a></li>
	<li {if $status==3}class="active"{/if}><a href="{url module=DealsAdmin status=3 keyword=null id=null page=null label=null}">Возвращен</a></li>
	{if $keyword}
	<li class="active"><a href="{url module=DealsAdmin keyword=$keyword id=null label=null}">Поиск</a></li>
	{/if}
	
	<li><a href="{url module=DealsLabelsAdmin keyword=null id=null page=null label=null}">Метки</a></li>
	
{/capture}


{$meta_title = "Сделка №`$order->id`" scope=parent}

<!-- Основная форма -->
<form method=post id=order enctype="multipart/form-data">
<input type=hidden name="session_id" value="{$smarty.session.id}">

<input type=hidden name="lot_id" value="{$order->lot_id}">

<div id="name">
	<input name=id type="hidden" value="{$order->id|escape}"/> 
	<h1>{if $order->id}Сделка №{$order->id}{/if}
	<select class=status name="status">
		<option value='0' {if $order->status == 0}selected{/if}>Выйгран</option>
		<option value='1' {if $order->status == 1}selected{/if}>Ждёт оплаты</option>
		<option value='2' {if $order->status == 2}selected{/if}>Выдан покупателю</option>
		<option value='3' {if $order->status == 3}selected{/if}>Возвращен</option>
	</select>
	</h1>
	<a href="{url view=print id=$order->id}" target="_blank"><img src="./design/images/printer.png" name="export" title="Печать информации"></a>


	<div id=next_order>
		{if $prev_order}
		<a class=prev_order href="{url id=$prev_order->id}">←</a>
		{/if}
		{if $next_order}
		<a class=next_order href="{url id=$next_order->id}">→</a>
		{/if}
	</div>
		
</div> 


{if $message_error}
<!-- Системное сообщение -->
<div class="message message_error">
	<span class="text">{$message_error}</span>
	{if $smarty.get.return}
	<a class="button" href="{$smarty.get.return}">Назад к списку заказов</a>
	{/if}
</div>
<!-- Системное сообщение (The End)-->
{elseif $message_success}
<!-- Системное сообщение -->
<div class="message message_success">
	<span class="text">{if $message_success=='updated'}Заказ обновлен{elseif $message_success=='added'}Заказ добавлен{else}{$message_success}{/if}</span>
	{if $smarty.get.return}
	<a class="button" href="{$smarty.get.return}">Вернуться</a>
	{/if}
</div>
<!-- Системное сообщение (The End)-->
{/if}



<div id="order_details">
	<h2>Покупатель</h2>
	
	<div id="user">
	<ul class="order_details" {if $user->bot}style="background:#f9eaea"{/if}>
		<li>
			<label class=property>Дата выйгрыша</label>
			<div class="edit_order_detail view_order_detail">
			{$order->date} {$order->time}
			</div>
		</li>
		<li>
			<label class=property>Личный номер пользователя</label>
			<div class="edit_order_detail view_order_detail">
			#{$user->id} <a target="_blank" href='index.php?module=UserAdmin&id={$user->id}' target='_blank'>открыть профиль</a>
			</div>
		</li>	
		{if $user->bot}	
		<li>
			<div class="view_order_detail">
				<b>Это бот</b>
			</div>
		</li>
		{else}
		<li>
			<label class=property>Имя</label> 
			<div class="view_order_detail">
				{$user->name}
			</div>
		</li>
		<li>
			<label class=property>Фамилия</label> 
			<div class="view_order_detail">
				{$user->fam}
			</div>
		</li>
		<li>
			<label class=property>Отчество</label> 
			<div class="view_order_detail">
				{$user->otch}
			</div>
		</li>				
		<li>
			<label class=property>Email</label>
			<div class="view_order_detail">
				<a href="mailto:{$user->email}">{$user->email}</a>
			</div>
		</li>
		<li>
			<label class=property>Телефон</label>
			<div class="view_order_detail">
				{if $user->phone}
				<span class="ip_call" data-phone="{$user->phone}" target="_blank">{$user->phone}</span>{else}{$user->phone}{/if}
			</div>
		</li>
		<li>
			<label class=property>Адрес</label>
			<div class="view_order_detail">
			<a href="http://maps.yandex.ru/?text=Россия, {$user->city}, {$user->street}, {$user->number} {if $user->housing} / {$user->housing}{/if}, {$user->office}" target="_blank">
			г. {$user->city}, ул. {$user->street}, д. {$user->number} {if $user->housing}, корпус {$user->housing}{/if}, {$user->office}
			</a>
			</div>
		</li>
		{/if}		


	</ul>
	</div>

	<div class='layer'>
	<h2>Продавец</h2>
		<div class='view_user' style="font-weight:bold">

			#{$order->seller_user->id}
			<a href='index.php?module=UserAdmin&id={$order->seller_user->id}' target='_blank'>

			{$order->seller_user->fam} {$order->seller_user->name} {$order->seller_user->otch}

			</a>

		</div>

	</div>	

	
	{if $labels}
	<div class='layer'>
	<h2>Метка</h2>
	<!-- Метки -->
	<ul>
		{foreach $labels as $l}
		<li>
		<label for="label_{$l->id}">
		<input id="label_{$l->id}" type="checkbox" name="order_labels[]" value="{$l->id}" {if in_array($l->id, $order_labels)}checked{/if}>
		<span style="background-color:#{$l->color};" class="order_label"></span>
		{$l->name}
		</label>
		</li>
		{/foreach}
	</ul>
	<!-- Метки -->
	</div>
	{/if}

	

	

	
	<div class='layer'>
	<h2>Примечание <a href='#' class="edit_note"><img src='design/images/pencil.png' alt='Редактировать' title='Редактировать'></a></h2>
	<ul class="order_details">
		<li>
			<div class="edit_note" style='display:none;'>
				<label class=property>Ваше примечание (не видно пользователю)</label>
				<textarea name="note">{$order->note|escape}</textarea>
			</div>
			<div class="view_note" {if !$order->note}style='display:none;'{/if}>
				<label class=property>Ваше примечание (не видно пользователю)</label>
				<div class="note_text">{$order->note|escape}</div>
			</div>
		</li>
	</ul>
	</div>
		
</div>


<div id="purchases">
 
	<div id="list" class="purchases">
		{foreach $purchases as $purchase}
		<div class="row">
			<div class="image cell">
				<input type=hidden name=purchases[id][{$purchase->id}] value='{$purchase->id}'>
				{$image = $purchase->product->images|first}
				{if $image}
				<img class=product_icon src='{$image->filename|resize:35:35}'>
				{/if}
			</div>
			<div class="purchase_name cell">
			
				<div class='purchase_variant'>				

				<span class=view_purchase>
					{$purchase->variant_name} {if $purchase->sku}(арт. {$purchase->sku}){/if}			
				</span>
				</div>
		
				{if $purchase->product}
				<a class="related_product_name" href="index.php?module=CommissionProductAdmin&id={$purchase->product->id}&return={$smarty.server.REQUEST_URI|urlencode}">{$purchase->product_name}</a>
				{else}
				{$purchase->product_name}				
				{/if}
			</div>
			<div class="price cell">

			</div>
			<div class="amount cell">			
				<span class=view_purchase>{$purchase->price|number_format:0:".":","}</span>
				{$currency->sign}
			
			</div>
			<div class="icons cell">		

				<!-- <a href='#' class="delete" title="Удалить"></a>		 -->
			</div>
			<div class="clear"></div>
		</div>
		{/foreach}
		<div id="new_purchase" class="row" style='display:none;'>
			<div class="image cell">
				<input type=hidden name=purchases[id][] value=''>
				<img class=product_icon src=''>
			</div>
			<div class="purchase_name cell">
				<div class='purchase_variant'>				
					<select name=purchases[variant_id][] style='display:none;'></select>
				</div>
				<a class="purchase_name" href=""></a>
			</div>
			<div class="price cell">
				<input type=text name=purchases[price][] value='' size=5> {$currency->sign}
			</div>
			<div class="amount cell">
	        	<select name=purchases[amount][]></select>
			</div>
			<div class="icons cell">
				<a href='#' class="delete" title="Удалить"></a>	
			</div>
			<div class="clear"></div>
		</div>
	</div>



	{if $purchases}
	<div class="subtotal">
	Стоимость лота<b> {$subtotal|number_format:0:".":","} руб</b>
	</div>
	{/if}

	<br><br>

	<div class="subtotal layer">
	Комиссия организатора ({($order->seller_user->commission+$user->commission)}%)<b> 

	{($subtotal*$order->seller_user->commission/100+$subtotal*$user->commission/100)|number_format:0:".":","} руб</b>

	</div> 

	<div class="subtotal layer">
	Выплата продавцу<b> {($subtotal-($subtotal*$order->seller_user->commission/100))|number_format:0:".":","} руб</b>
	</div> 	

	<div class="subtotal layer">
	Покупателю к оплате<b> {($subtotal+($subtotal*$user->commission/100))|number_format:0:".":","} руб</b>
	</div> 		

	
	<div class="block delivery">
		<h2>Доставка</h2>
				<select name="delivery_id">
				<option value="0">Не выбрана</option>
				{foreach $deliveries as $d}
				<option value="{$d->id}" {if $d->id==$delivery->id}selected{/if}>{$d->name}</option>
				{/foreach}
				</select>	
				<input type=text name=delivery_price value='{$order->delivery_price}'> <span class=currency>{$currency->sign}</span>
				<div class="separate_delivery">
					<input type=checkbox id="separate_delivery" name=separate_delivery value='1' {if $order->separate_delivery}checked{/if}> <label  for="separate_delivery">оплачивается отдельно</label>
				</div>
	</div>
<!-- 
	<div class="total layer">
	Итого<b> {$order->total_price} {$currency->sign}</b>
	</div> -->
		
		
	<div class="block payment">
		<h2>Оплата</h2>
				<select name="payment_method_id">
				<option value="0">Не выбрана</option>
				{foreach $payment_methods as $pm}
				<option value="{$pm->id}" {if $pm->id==$payment_method->id}selected{/if}>{$pm->name}</option>
				{/foreach}
				</select>
		
		<input type=checkbox name="paid" id="paid" value="1" {if $order->paid}checked{/if}> <label for="paid" {if $order->paid}class="green"{/if}>Заказ оплачен</label>		
	</div>

 


	<div class="block_save">


	<input class="button_green button_save" type="submit" name="" value="Сохранить" />
	</div>


</div>


</form>
<!-- Основная форма (The End) -->


{* On document load *}
{literal}
<script src="design/js/autocomplete/jquery.autocomplete-min.js"></script>

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
	
	// Удаление товара
	$(".purchases a.delete").live('click', function() {
		 $(this).closest(".row").fadeOut(200, function() { $(this).remove(); });
		 return false;
	});
 

	// Добавление товара 
	var new_purchase = $('.purchases #new_purchase').clone(true);
	$('.purchases #new_purchase').remove().removeAttr('id');

	$("input#add_purchase").autocomplete({
  	serviceUrl:'ajax/add_order_product.php',
  	minChars:0,
  	noCache: false, 
  	onSelect:
  		function(suggestion){
  			new_item = new_purchase.clone().appendTo('.purchases');
  			new_item.removeAttr('id');
  			new_item.find('a.purchase_name').html(suggestion.data.name);
  			new_item.find('a.purchase_name').attr('href', 'index.php?module=CommissionProductAdmin&id='+suggestion.data.id);
  			
  			// Добавляем варианты нового товара
  			var variants_select = new_item.find('select[name*=purchases][name*=variant_id]');
			for(var i in suggestion.data.variants)
			{
				sku = suggestion.data.variants[i].sku == ''?'':' (арт. '+suggestion.data.variants[i].sku+')';
  				variants_select.append("<option value='"+suggestion.data.variants[i].id+"' price='"+suggestion.data.variants[i].price+"' amount='"+suggestion.data.variants[i].stock+"'>"+suggestion.data.variants[i].name+sku+"</option>");
  			}
  			
  			if(suggestion.data.variants.length>1 || suggestion.data.variants[0].name != '')
  				variants_select.show();
  				  				
			variants_select.bind('change', function(){change_variant(variants_select);});
				change_variant(variants_select);
  			
  			if(suggestion.data.image)
  				new_item.find('img.product_icon').attr("src", suggestion.data.image);
  			else
  				new_item.find('img.product_icon').remove();

			$("input#add_purchase").val('').focus().blur(); 
  			new_item.show();
  		},
		formatResult:
			function(suggestion, currentValue){
				var reEscape = new RegExp('(\\' + ['/', '.', '*', '+', '?', '|', '(', ')', '[', ']', '{', '}', '\\'].join('|\\') + ')', 'g');
				var pattern = '(' + currentValue.replace(reEscape, '\\$1') + ')';
  				return (suggestion.data.image?"<img align=absmiddle src='"+suggestion.data.image+"'> ":'') + suggestion.value.replace(new RegExp(pattern, 'gi'), '<strong>$1<\/strong>');
			}
  		
  });
  
  // Изменение цены и макс количества при изменении варианта
  function change_variant(element)
  {
		price = element.find('option:selected').attr('price');
		amount = element.find('option:selected').attr('amount');
		element.closest('.row').find('input[name*=purchases][name*=price]').val(price);
		
		// 
		amount_select = element.closest('.row').find('select[name*=purchases][name*=amount]');
		selected_amount = amount_select.val();
		amount_select.html('');
		for(i=1; i<=amount; i++)
			amount_select.append("<option value='"+i+"'>"+i+" {/literal}{$settings->units}{literal}</option>");
		amount_select.val(Math.min(selected_amount, amount));


		return false;
  }
  
  

  
	// Редактировать получателя
	$("div#order_details a.edit_order_details").click(function() {
		 $("ul.order_details .view_order_detail").hide();
		 $("ul.order_details .edit_order_detail").show();
		 return false;
	});
  
	// Редактировать примечание
	$("div#order_details a.edit_note").click(function() {
		 $("div.view_note").hide();
		 $("div.edit_note").show();
		 return false;
	});
  
	// Редактировать пользователя
	$("div#order_details a.edit_user").click(function() {
		 $("div.view_user").hide();
		 $("div.edit_user").show();
		 return false;
	});
	$("input#user").autocomplete({
		serviceUrl:'ajax/search_users.php',
		minChars:0,
		noCache: false, 
		onSelect:
			function(suggestion){
				$('input[name="user_id"]').val(suggestion.data.id);
			}
	});
  
	// Удалить пользователя
	$("div#order_details a.delete_user").click(function() {
		$('input[name="user_id"]').val(0);
		$('div.view_user').hide();
		$('div.edit_user').hide();
		return false;
	});

	// Посмотреть адрес на карте
	$("a#address_link").attr('href', 'http://maps.yandex.ru/?text='+$('#order_details textarea[name="address"]').val());
  
	// Подтверждение удаления
	$('select[name*=purchases][name*=variant_id]').bind('change', function(){change_variant($(this));});
	$("input[name='status_deleted']").click(function() {
		if(!confirm('Подтвердите удаление'))
			return false;	
	});

});

</script>

<style>
.autocomplete-suggestions{
background-color: #ffffff;
overflow: hidden;
border: 1px solid #e0e0e0;
overflow-y: auto;
}
.autocomplete-suggestions .autocomplete-suggestion{cursor: default;}
.autocomplete-suggestions .selected { background:#F0F0F0; }
.autocomplete-suggestions div { padding:2px 5px; white-space:nowrap; }
.autocomplete-suggestions strong { font-weight:normal; color:#3399FF; }
</style>
{/literal}

