
{* Вкладки *}
{capture name=tabs}
	<li class="active"><a href="index.php?module=CommissionProductsAdmin">
		Приемка товаров на комиссию и подготовка к аукциону</a></li>

<!-- 
	{if in_array('features', $manager->permissions)}<li><a href="index.php?module=FeaturesAdmin">Свойства</a></li>{/if} -->
{/capture}

{* Title *}
{if $category}
	{$meta_title=$category->name scope=parent}
{else}
	{$meta_title='Товары' scope=parent}
{/if}

{* Поиск *}
<form method="get">
<div id="search">
	<input type="hidden" name="module" value="CommissionProductsAdmin">
	<input class="search" type="text" name="keyword" value="{$keyword|escape}" />
	<input class="search_button" type="submit" value=""/>
</div>
</form>
	
{* Заголовок *}
<div id="header">	
	{if $products_count}
		{if $category->name || $brand->name}
			<h1>{$category->name} {$brand->name} ({$products_count} {$products_count|plural:'товар':'товаров':'товара'})</h1>
		{elseif $keyword}
			<h1>{$products_count|plural:'Найден':'Найдено':'Найдено'} {$products_count} {$products_count|plural:'товар':'товаров':'товара'}</h1>
		{else}
			<h1>{$products_count} {$products_count|plural:'товар':'товаров':'товара'}</h1>
		{/if}		
	{else}
		<h1>Нет товаров</h1>
	{/if}
	<a class="add" href="{url module=CommissionProductAdmin return=$smarty.server.REQUEST_URI}">Добавить товар</a>
</div>	

<div id="main_list">
	
	<!-- Листалка страниц -->
	{include file='pagination.tpl'}	
	<!-- Листалка страниц (The End) -->
		
	{if $products}

	<div id="expand">
	<!-- Свернуть/развернуть варианты -->
	<a href="#" class="dash_link" id="expand_all">Развернуть все варианты ↓</a>
	<a href="#" class="dash_link" id="roll_up_all" style="display:none;">Свернуть все варианты ↑</a>
	<!-- Свернуть/развернуть варианты (The End) -->
	</div>

	{* Основная форма *}
	<form id="list_form" method="post">
	<input type="hidden" name="session_id" value="{$smarty.session.id}">
	
		<div id="list">
		{foreach $products as $product}
		<div class="{if !$product->visible}invisible{/if} {if $product->featured}featured{/if} row" {if $product->status=='1'}style="background:#FCFFD9"{/if}
			{if $product->status=='2'}style="background:#ffe6e6"{/if}>
			<input type="hidden" name="positions[{$product->id}]" value="{$product->position}">
			<div class="move cell"><div class="move_zone"></div></div>
	 		<div class="checkbox cell">
				<input type="checkbox" name="check[]" value="{$product->id}"/>				
			</div>
			<div class="image cell">
				{$image = $product->images|@first}
				{if $image}
				<a href="{url module=CommissionProductAdmin id=$product->id return=$smarty.server.REQUEST_URI}"><img src="{$image->filename|escape|resize:35:35}" /></a>
				{/if}
			</div>

			<div class="name product_name cell">
			 	
			 	<div class="variants">
			 	<ul>
				{foreach $product->comvariants as $variant}
				<li {if !$variant@first}class="variant" style="display:none;"{/if}>
					<span style="font-size:16px">
					{$variant->price|number_format:0:".":" "} {$currency->sign}  
					</span>
				</li>
				{/foreach}
				</ul>
	
				{$variants_num = $product->comvariants|count}
				{if $variants_num>1}
				<div class="expand_variant">
				<a class="dash_link expand_variant" href="#">{$variants_num} {$variants_num|plural:'вариант':'вариантов':'варианта'} ↓</a>
				<a class="dash_link roll_up_variant" style="display:none;" href="#">{$variants_num} {$variants_num|plural:'вариант':'вариантов':'варианта'} ↑</a>
				</div>
				{/if}
				</div>
				
				<a style="display:inline-block;width:200px" href="{url module=CommissionProductAdmin id=$product->id return=$smarty.server.REQUEST_URI}">{$product->name|escape}</a>

				{if $product->user}<a href="index.php?module=UserAdmin&id={$product->user->id}">{$product->user->fam} {$product->user->name|truncate:1:''} {$product->user->otch|truncate:1:''}</a>, #{$product->user->id}{/if}
			
	 			
			</div>



			<div class="icons cell">
				<!-- <a class="preview"   title="Предпросмотр в новом окне" href="../products/{$product->url}" target="_blank"></a>			 -->
				<!-- <a class="enable"    title="Активен"                 href="#"></a> -->
				<!-- <a class="featured"  title="Выводить на главной"           href="#"></a> -->
				
				<a class="delete"    title="Удалить"                 href="#"></a>
			</div>
			
			<div class="clear"></div>
		</div>
		{/foreach}
		</div>

		<div id="action">
			<label id="check_all" class="dash_link">Выбрать все</label>
		
			<span id="select">
			<select name="action">
				<option value="">выбрать действие</option>
				<option value="enable">Пометить "Готов к аукциону"</option>
				<option value="disable">Поменить "В обработке"</option>
				<option value="go_to_auction">Передать на аукцион..</option>
				<option value="delete">Удалить</option>
			</select>
			</span>

			<span id="select_auction" style="display:none">
			<select name="auction_id">
				<option value="0">выберите аукцион</option>
				{foreach $auctions as $a}
					<option value="{$a->id}">Аукцион № {$a->id}, {$a->date_label1} - {$a->date_label2}</option>
				{/foreach}
			</select>
			</span>			
		

			<span id="move_to_category">
			<select name="target_category">
				{function name=category_select level=0}
				{foreach $categories as $category}
						<option value='{$category->id}'>{section sp $level}&nbsp;&nbsp;&nbsp;&nbsp;{/section}{$category->name|escape}</option>
						{category_select categories=$category->subcategories selected_id=$selected_id level=$level+1}
				{/foreach}
				{/function}
				{category_select categories=$categories}
			</select> 
			</span>
			

			<input id="apply_action" class="button_green" type="submit" value="Применить">		

		</div>
		{/if}
	</form>

	<!-- Листалка страниц -->
	{include file='pagination.tpl'}	
	<!-- Листалка страниц (The End) -->		
</div>


<!-- Меню -->
<div id="right_menu">
	
	<!-- Фильтры -->
	<ul>
		<li {if !$filter}class="selected"{/if}><a href="{url brand_id=null category_id=null keyword=null page=null filter=null}">Все товары</a></li>
		<li {if $filter=='preparation'}class="selected"{/if}><a href="{url keyword=null brand_id=null category_id=null page=null filter='preparation'}">В обработке</a></li>
		<li {if $filter=='ready'}class="selected"{/if}><a href="{url keyword=null brand_id=null category_id=null page=null filter='ready'}">Готовы к аукциону</a></li>
		<li {if $filter=='toback'}class="selected"{/if}><a href="{url keyword=null brand_id=null category_id=null page=null filter='toback'}">На возврат</a></li>

	</ul>
	<!-- Фильтры -->


	<!-- Категории товаров -->
	{function name=categories_tree}
	{if $categories}
	<ul>
		{if $categories[0]->parent_id == 0}
		<li {if !$category->id}class="selected"{/if}><a href="{url category_id=null brand_id=null}">Все категории</a></li>	
		{/if}
		{foreach $categories as $c}
		<li category_id="{$c->id}" {if $category->id == $c->id}class="selected"{else}class="droppable category"{/if}><a href='{url keyword=null brand_id=null page=null category_id={$c->id}}'>{$c->name}</a></li>
		{categories_tree categories=$c->subcategories}
		{/foreach}
	</ul>
	{/if}
	{/function}
	{categories_tree categories=$categories}
	<!-- Категории товаров (The End)-->
	

	
</div>
<!-- Меню  (The End) -->


{* On document load *}
{literal}
<script>

$(function() {

	$('select[name=action]').change(function() {
		if ($(this).val()=='go_to_auction')  $('#select_auction').show(); 
		else  $('#select_auction').hide(); 

	});


	// Сортировка списка
	$("#list").sortable({
		items:             ".row",
		tolerance:         "pointer",
		handle:            ".move_zone",
		scrollSensitivity: 40,
		opacity:           0.7, 
		
		helper: function(event, ui){		
			if($('input[type="checkbox"][name*="check"]:checked').size()<1) return ui;
			var helper = $('<div/>');
			$('input[type="checkbox"][name*="check"]:checked').each(function(){
				var item = $(this).closest('.row');
				helper.height(helper.height()+item.innerHeight());
				if(item[0]!=ui[0]) {
					helper.append(item.clone());
					$(this).closest('.row').remove();
				}
				else {
					helper.append(ui.clone());
					item.find('input[type="checkbox"][name*="check"]').attr('checked', false);
				}
			});
			return helper;			
		},	
 		start: function(event, ui) {
  			if(ui.helper.children('.row').size()>0)
				$('.ui-sortable-placeholder').height(ui.helper.height());
		},
		beforeStop:function(event, ui){
			if(ui.helper.children('.row').size()>0){
				ui.helper.children('.row').each(function(){
					$(this).insertBefore(ui.item);
				});
				ui.item.remove();
			}
		},
		update:function(event, ui)
		{
			$("#list_form input[name*='check']").attr('checked', false);
			$("#list_form").ajaxSubmit(function() {
				colorize();
			});
		}
	});
	

	// Перенос товара на другую страницу
	$("#action select[name=action]").change(function() {
		if($(this).val() == 'move_to_page')
			$("span#move_to_page").show();
		else
			$("span#move_to_page").hide();
	});
	$("#pagination a.droppable").droppable({
		activeClass: "drop_active",
		hoverClass: "drop_hover",
		tolerance: "pointer",
		drop: function(event, ui){
			$(ui.helper).find('input[type="checkbox"][name*="check"]').attr('checked', true);
			$(ui.draggable).closest("form").find('select[name="action"] option[value=move_to_page]').attr("selected", "selected");		
			$(ui.draggable).closest("form").find('select[name=target_page] option[value='+$(this).html()+']').attr("selected", "selected");
			$(ui.draggable).closest("form").submit();
			return false;	
		}		
	});


	// Перенос товара в другую категорию
	$("#action select[name=action]").change(function() {
		if($(this).val() == 'move_to_category')
			$("span#move_to_category").show();
		else
			$("span#move_to_category").hide();
	});
	$("#right_menu .droppable.category").droppable({
		activeClass: "drop_active",
		hoverClass: "drop_hover",
		tolerance: "pointer",
		drop: function(event, ui){
			$(ui.helper).find('input[type="checkbox"][name*="check"]').attr('checked', true);
			$(ui.draggable).closest("form").find('select[name="action"] option[value=move_to_category]').attr("selected", "selected");	
			$(ui.draggable).closest("form").find('select[name=target_category] option[value='+$(this).attr('category_id')+']').attr("selected", "selected");
			$(ui.draggable).closest("form").submit();
			return false;			
		}
	});


	// Перенос товара в другой бренд
	$("#action select[name=action]").change(function() {
		if($(this).val() == 'move_to_brand')
			$("span#move_to_brand").show();
		else
			$("span#move_to_brand").hide();
	});
	$("#right_menu .droppable.brand").droppable({
		activeClass: "drop_active",
		hoverClass: "drop_hover",
		tolerance: "pointer",
		drop: function(event, ui){
			$(ui.helper).find('input[type="checkbox"][name*="check"]').attr('checked', true);
			$(ui.draggable).closest("form").find('select[name="action"] option[value=move_to_brand]').attr("selected", "selected");			
			$(ui.draggable).closest("form").find('select[name=target_brand] option[value='+$(this).attr('brand_id')+']').attr("selected", "selected");
			$(ui.draggable).closest("form").submit();
			return false;			
		}
	});


	// Если есть варианты, отображать ссылку на их разворачивание
	if($("li.variant").size()>0)
		$("#expand").show();


	// Раскраска строк
	function colorize()
	{
		$("#list div.row:even").addClass('even');
		$("#list div.row:odd").removeClass('even');
	}
	// Раскрасить строки сразу
	colorize();


	// Показать все варианты
	$("#expand_all").click(function() {
		$("a#expand_all").hide();
		$("a#roll_up_all").show();
		$("a.expand_variant").hide();
		$("a.roll_up_variant").show();
		$(".variants ul li.variant").fadeIn('fast');
		return false;
	});


	// Свернуть все варианты
	$("#roll_up_all").click(function() {
		$("a#roll_up_all").hide();
		$("a#expand_all").show();
		$("a.roll_up_variant").hide();
		$("a.expand_variant").show();
		$(".variants ul li.variant").fadeOut('fast');
		return false;
	});

 
	// Показать вариант
	$("a.expand_variant").click(function() {
		$(this).closest("div.cell").find("li.variant").fadeIn('fast');
		$(this).closest("div.cell").find("a.expand_variant").hide();
		$(this).closest("div.cell").find("a.roll_up_variant").show();
		return false;
	});

	// Свернуть вариант
	$("a.roll_up_variant").click(function() {
		$(this).closest("div.cell").find("li.variant").fadeOut('fast');
		$(this).closest("div.cell").find("a.roll_up_variant").hide();
		$(this).closest("div.cell").find("a.expand_variant").show();
		return false;
	});

	// Выделить все
	$("#check_all").click(function() {
		$('#list input[type="checkbox"][name*="check"]').attr('checked', $('#list input[type="checkbox"][name*="check"]:not(:checked)').length>0);
	});	

	// Удалить товар
	$("a.delete").click(function() {
		$('#list input[type="checkbox"][name*="check"]').attr('checked', false);
		$(this).closest("div.row").find('input[type="checkbox"][name*="check"]').attr('checked', true);
		$(this).closest("form").find('select[name="action"] option[value=delete]').attr('selected', true);
		$(this).closest("form").submit();
	});
	

	
	// Показать товар
	$("a.enable").click(function() {
		var icon        = $(this);
		var line        = icon.closest("div.row");
		var id          = line.find('input[type="checkbox"][name*="check"]').val();
		var state       = line.hasClass('invisible')?1:0;
		icon.addClass('loading_icon');
		$.ajax({
			type: 'POST',
			url: 'ajax/update_object.php',
			data: {'object': 'product', 'id': id, 'values': {'visible': state}, 'session_id': '{/literal}{$smarty.session.id}{literal}'},
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
			data: {'object': 'product', 'id': id, 'values': {'featured': state}, 'session_id': '{/literal}{$smarty.session.id}{literal}'},
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


	// Подтверждение удаления
	$("form").submit(function() {
		if($('select[name="action"]').val()=='delete' && !confirm('Подтвердите удаление'))
			return false;	

		if($('select[name="action"]').val()=='go_to_auction' && $('select[name="auction_id"]').val()=='0')
		{
			alert('Укажите аукцион в списке');
			return false;
		}

		if($('select[name="action"]').val()=='go_to_auction' && !confirm('Товар будет перенесён в список лотов. Сделать?'))
			return false;			
	});
	
	
	// Бесконечность на складе
	$("input[name*=stock]").focus(function() {
		if($(this).val() == '∞')
			$(this).val('');
		return false;
	});
	$("input[name*=stock]").blur(function() {
		if($(this).val() == '')
			$(this).val('∞');
	});
});

</script>
{/literal}