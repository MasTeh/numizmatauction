{capture name=tabs}
	<li><a href="{$smarty.get.return}">
		Вернуться к списку</a></li>


<!-- 
	{if in_array('features', $manager->permissions)}<li><a href="index.php?module=FeaturesAdmin">Свойства</a></li>{/if} -->
{/capture}

{if $product->id}
{$meta_title = $product->name scope=parent}
{else}
{$meta_title = 'Новый товар' scope=parent}
{/if}

{* Подключаем Tiny MCE *}
{include file='tinymce_init.tpl'}

{* On document load *}
{literal}
<script src="design/js/autocomplete/jquery.autocomplete-min.js"></script>


<script>
$(function() {

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

	$('.pass_gen').click(function() {
		$('input[name=user_password]').val(str_rand());
		return false;
	});


	$('.add_prodavec').click(function() {
		$('.add_prod_block').slideDown(500);
		$('.add_prodavec').hide();
		$('.seller').hide();
	});	

	$('.button_add_user').click(function() { 
		name = $('.add_user_form')			.find('input[name=user_name]').val();
		fam = $('.add_user_form')			.find('input[name=user_fam]').val();
		otch = $('.add_user_form')			.find('input[name=user_otch]').val();
		email = $('.add_user_form')			.find('input[name=user_email]').val();
		region = $('.add_user_form')		.find('input[name=user_region]').val();
		postcode = $('.add_user_form')		.find('input[name=user_postcode]').val();
		city = $('.add_user_form')			.find('input[name=user_city]').val();
		area = $('.add_user_form')			.find('input[name=user_area]').val();
		street = $('.add_user_form')		.find('input[name=user_street]').val();
		number = $('.add_user_form')		.find('input[name=user_number]').val();
		housing = $('.add_user_form')		.find('input[name=user_housing]').val();
		office = $('.add_user_form')		.find('input[name=user_office]').val();
		phone = $('.add_user_form')			.find('input[name=user_phone]').val();
		login = $('.add_user_form')			.find('input[name=user_login]').val();
		password = $('.add_user_form')		.find('input[name=user_password]').val();

		error = '';
		if (email == '') error += 'Не указан E-Mail. ';
		if (phone == '') error += 'Не указан телефон. ';
		if (login == '') error += 'Не указан логин. ';
		if (password == '') error += 'Не указан пароль. ';
		if (error !== '')
		{ 
			$('.add_user_form').find('.message_error').html('');
			$('.add_user_form').find('.message_error').append(error).show();
			return false;
		}

		$.ajax({
			url: "ajax/add_user.php",
			data: {name:name, fam:fam, otch:otch, email: email, region: region, postcode: postcode, city: city, area: area, street: street, number: number, housing: housing, office: office, phone:phone, login:login, password:password},
			dataType: 'json',
			success: function(data){ 
				if (data == 'error1')
				{
					$('.add_user_form').find('.message_error').html('Пользователь с таким E-Mail уже есть');
					return false;
				}
				else 
				{
					if (data !== 'false')
					{
						$('select[name=user_id]').append('<option selected value="'+data+'">(# '+data+') '+fam+' '+name[0]+'. '+otch[0]+'.</option>');
						$('.add_user_form').slideUp(500);
					}
				}
			}
		});

		return false;
	});

	// Добавление категории
	$('#product_categories .add').click(function() {
		$("#product_categories ul li:last").clone(false).appendTo('#product_categories ul').fadeIn('slow').find("select[name*=categories]:last").focus();
		$("#product_categories ul li:last span.add").hide();
		$("#product_categories ul li:last span.delete").show();
		return false;		
	});

	// Удаление категории
	$("#product_categories .delete").live('click', function() {
		$(this).closest("li").fadeOut(200, function() { $(this).remove(); });
		return false;
	});

	// Сортировка вариантов
	$("#variants_block").sortable({ items: '#variants ul' , axis: 'y',  cancel: '#header', handle: '.move_zone' });
	// Сортировка вариантов
	$("table.related_products").sortable({ items: 'tr' , axis: 'y',  cancel: '#header', handle: '.move_zone' });

	
	// Сортировка связанных товаров
	$(".sortable").sortable({
		items: "div.row",
		tolerance:"pointer",
		scrollSensitivity:40,
		opacity:0.7,
		handle: '.move_zone'
	});
		

	// Сортировка изображений
	$(".images ul").sortable({ tolerance: 'pointer'});

	// Удаление изображений
	$(".images a.delete").live('click', function() {
		 $(this).closest("li").fadeOut(200, function() { $(this).remove(); });
		 return false;
	});
	// Загрузить изображение с компьютера
	$('#upload_image').click(function() {
		$("<input class='upload_image' name=images[] type=file multiple  accept='image/jpeg,image/png,image/gif'>").appendTo('div#add_image').focus().click();
	});
	// Или с URL
	$('#add_image_url').click(function() {
		$("<input class='remote_image' name=images_urls[] type=text value='http://'>").appendTo('div#add_image').focus().select();
	});
	// Или перетаскиванием
	if(window.File && window.FileReader && window.FileList)
	{
		$("#dropZone").show();
		$("#dropZone").on('dragover', function (e){
			$(this).css('border', '1px solid #8cbf32');
		});
		$(document).on('dragenter', function (e){
			$("#dropZone").css('border', '1px dotted #8cbf32').css('background-color', '#c5ff8d');
		});
	
		dropInput = $('.dropInput').last().clone();
		
		function handleFileSelect(evt){
			var files = evt.target.files; // FileList object
			// Loop through the FileList and render image files as thumbnails.
		    for (var i = 0, f; f = files[i]; i++) {
				// Only process image files.
				if (!f.type.match('image.*')) {
					continue;
				}
			var reader = new FileReader();
			// Closure to capture the file information.
			reader.onload = (function(theFile) {
				return function(e) {
					// Render thumbnail.
					$("<li class=wizard><a href='' class='delete'><img src='design/images/cross-circle-frame.png'></a><img onerror='$(this).closest(\"li\").remove();' src='"+e.target.result+"' /><input name=images_urls[] type=hidden value='"+theFile.name+"'></li>").appendTo('div .images ul');
					temp_input =  dropInput.clone();
					$('.dropInput').hide();
					$('#dropZone').append(temp_input);
					$("#dropZone").css('border', '1px solid #d0d0d0').css('background-color', '#ffffff');
					clone_input.show();
		        };
		      })(f);
		
		      // Read in the image file as a data URL.
		      reader.readAsDataURL(f);
		    }
		}
		$('.dropInput').live("change", handleFileSelect);
	};

	// Удаление варианта
	$('a.del_variant').click(function() {
		if($("#variants ul").size()>1)
		{
			$(this).closest("ul").fadeOut(200, function() { $(this).remove(); });
		}
		else
		{
			$('#variants_block .variant_name input[name*=variant][name*=name]').val('');
			$('#variants_block .variant_name').hide('slow');
			$('#variants_block').addClass('single_variant');
		}
		return false;
	});

	// Загрузить файл к варианту
	$('#variants_block a.add_attachment').click(function() {
		$(this).hide();
		$(this).closest('li').find('div.browse_attachment').show('fast');
		$(this).closest('li').find('input[name*=attachment]').attr('disabled', false);
		return false;		
	});
	
	// Удалить файл к варианту
	$('#variants_block a.remove_attachment').click(function() {
		closest_li = $(this).closest('li');
		closest_li.find('.attachment_name').hide('fast');
		$(this).hide('fast');
		closest_li.find('input[name*=delete_attachment]').val('1');
		closest_li.find('a.add_attachment').show('fast');
		return false;		
	});


	// Добавление варианта
	var variant = $('#new_variant').clone(true);
	$('#new_variant').remove().removeAttr('id');
	$('#variants_block span.add').click(function() {
		if(!$('#variants_block').is('.single_variant'))
		{
			$(variant).clone(true).appendTo('#variants').fadeIn('slow').find("input[name*=variant][name*=name]").focus();
		}
		else
		{
			$('#variants_block .variant_name').show('slow');
			$('#variants_block').removeClass('single_variant');		
		}
		return false;		
	});
	
	
	function show_category_features(category_id)
	{
		$('ul.prop_ul').empty();
		$.ajax({
			url: "ajax/get_features.php",
			data: {category_id: category_id, product_id: $("input[name=id]").val()},
			dataType: 'json',
			success: function(data){
				for(i=0; i<data.length; i++)
				{
					feature = data[i];
					
					line = $("<li><label class=property></label><input class='simpla_inp' type='text'/></li>");
					var new_line = line.clone(true);
					new_line.find("label.property").text(feature.name);
					new_line.find("input").attr('name', "options["+feature.id+"]").val(feature.value);
					new_line.appendTo('ul.prop_ul').find("input")
					.autocomplete({
						serviceUrl:'ajax/options_autocomplete.php',
						minChars:0,
						params: {feature_id:feature.id},
						noCache: false
					});
				}
			}
		});
		return false;
	}
	
	// Изменение набора свойств при изменении категории
	$('select[name="categories[]"]:first').change(function() {
		show_category_features($("option:selected",this).val());
	});

	// Автодополнение свойств
	$('ul.prop_ul input[name*=options]').each(function(index) {
		feature_id = $(this).closest('li').attr('feature_id');
		$(this).autocomplete({
			serviceUrl:'ajax/options_autocomplete.php',
			minChars:0,
			params: {feature_id:feature_id},
			noCache: false
		});
	}); 	
	
	// Добавление нового свойства товара
	var new_feature = $('#new_feature').clone(true);
	$('#new_feature').remove().removeAttr('id');
	$('#add_new_feature').click(function() {
		$(new_feature).clone(true).appendTo('ul.new_features').fadeIn('slow').find("input[name*=new_feature_name]").focus();
		return false;		
	});

	
	// Удаление связанного товара
	$(".related_products a.delete").live('click', function() {
		 $(this).closest("div.row").fadeOut(200, function() { $(this).remove(); });
		 return false;
	});
 

	// Добавление связанного товара 
	var new_related_product = $('#new_related_product').clone(true);
	$('#new_related_product').remove().removeAttr('id');
 
	$("input#related_products").autocomplete({
		serviceUrl:'ajax/search_products.php',
		minChars:0,
		noCache: false, 
		onSelect:
			function(suggestion){
				$("input#related_products").val('').focus().blur(); 
				new_item = new_related_product.clone().appendTo('.related_products');
				new_item.removeAttr('id');
				new_item.find('a.related_product_name').html(suggestion.data.name);
				new_item.find('a.related_product_name').attr('href', 'index.php?module=CommissionProductAdmin&id='+suggestion.data.id);
				new_item.find('input[name*="related_products"]').val(suggestion.data.id);
				if(suggestion.data.image)
					new_item.find('img.product_icon').attr("src", suggestion.data.image);
				else
					new_item.find('img.product_icon').remove();
				new_item.show();
			},
		formatResult:
			function(suggestions, currentValue){
				var reEscape = new RegExp('(\\' + ['/', '.', '*', '+', '?', '|', '(', ')', '[', ']', '{', '}', '\\'].join('|\\') + ')', 'g');
				var pattern = '(' + currentValue.replace(reEscape, '\\$1') + ')';
  				return (suggestions.data.image?"<img align=absmiddle src='"+suggestions.data.image+"'> ":'') + suggestions.value.replace(new RegExp(pattern, 'gi'), '<strong>$1<\/strong>');
			}

	});
  

	// infinity
	$("input[name*=variant][name*=stock]").focus(function() {
		if($(this).val() == '∞')
			$(this).val('');
		return false;
	});

	$("input[name*=variant][name*=stock]").blur(function() {
		if($(this).val() == '')
			$(this).val('∞');
	});
	
	// Волшебные изображения
	name_changed = false;
	$("input[name=name]").change(function() {
		name_changed = true;
		images_loaded = 0;
	});	
	images_num = 8;
	images_loaded = 0;
	old_wizar_dicon_src = $('#images_wizard img').attr('src');
	$('#images_wizard').click(function() {
		
		$('#images_wizard img').attr('src', 'design/images/loader.gif');
		if(name_changed)
			$('div.images ul li.wizard').remove();
		name_changed = false;
		key = $('input[name=name]').val();
		$.ajax({
 			 url: "ajax/get_images.php",
 			 	data: {keyword: key, start: images_loaded},
 			 	dataType: 'json',
  				success: function(data){
    				for(i=0; i<Math.min(data.length, images_num); i++)
    				{
	    				image_url = data[i];
						$("<li class=wizard><a href='' class='delete'><img src='design/images/cross-circle-frame.png'></a><a href='"+image_url+"' target=_blank><img onerror='$(this).closest(\"li\").remove();' src='"+image_url+"' /><input name=images_urls[] type=hidden value='"+image_url+"'></a></li>").appendTo('div .images ul');
    				}
					$('#images_wizard img').attr('src', old_wizar_dicon_src);
					images_loaded += images_num;
  				}
		});
		return false;
	});
	
	// Волшебное описание
	name_changed = false;
	captcha_code = '';
	$("input[name=name]").change(function() {
		name_changed = true;
	});	
	old_prop_wizard_icon_src = $('#properties_wizard img').attr('src');
	$('#properties_wizard').click(function() {
		
		$('#properties_wizard img').attr('src', 'design/images/loader.gif');
		$('#captcha_form').remove();
		if(name_changed)
			$('div.images ul li.wizard').remove();
		name_changed = false;
		key = $('input[name=name]').val();

		$.ajax({
 			 url: "ajax/get_info.php",
 			 	data: {keyword: key, captcha: captcha_code},
 			 	dataType: 'json',
  				success: function(data){
 
  					captcha_code = '';
					$('#properties_wizard img').attr('src', old_prop_wizard_icon_src);

					// Если запрашивают капчу
					if(data.captcha)
					{	 
						captcha_form = $("<form id='captcha_form'><img src='data:image/png;base64,"+data.captcha+"' align='absmiddle'><input id='captcha_input' type=text><input type=submit value='Ok'></form>");
						$("#properties_wizard").parent().append(captcha_form);
						$('#captcha_input').focus();
						captcha_form.submit(function() {
							captcha_code = $('#captcha_input').val();
							$(this).remove();
							$('#properties_wizard').click();
							return false;
						});
					}
					else
  					if(data.product)
  					{ 
  						$('li#new_feature').remove();
	    				for(i=0; i<data.product.options.length; i++)
	    				{
	    					option_name = data.product.options[i].name;
	    					option_value = data.product.options[i].value;
							// Добавление нового свойства товара
							exists = false;
														
							if(!$('label.property:visible').filter(function(){ return $(this).text().toLowerCase() === option_name.toLowerCase();}).closest('li').find('input[name*=options]').val(option_value).length)
							{
								f = $(new_feature).clone(true);
								f.find('input[name*=new_features_names]').val(option_name);
								f.find('input[name*=new_features_values]').val(option_value);
								f.appendTo('ul.new_features').fadeIn('slow').find("input[name*=new_feature_name]");
							}
	   					}
	   					
   					}				
				},
				error: function(xhr, textStatus, errorThrown){
                	alert("Error: " +textStatus);
           		}
		});
		return false;
	});
	

	// Автозаполнение мета-тегов
	meta_title_touched = true;
	meta_keywords_touched = true;
	meta_description_touched = true;
	url_touched = true;
	
	if($('input[name="meta_title"]').val() == generate_meta_title() || $('input[name="meta_title"]').val() == '')
		meta_title_touched = false;
	if($('input[name="meta_keywords"]').val() == generate_meta_keywords() || $('input[name="meta_keywords"]').val() == '')
		meta_keywords_touched = false;
	if($('textarea[name="meta_description"]').val() == generate_meta_description() || $('textarea[name="meta_description"]').val() == '')
		meta_description_touched = false;
	if($('input[name="url"]').val() == generate_url() || $('input[name="url"]').val() == '')
		url_touched = false;
		
	$('input[name="meta_title"]').change(function() { meta_title_touched = true; });
	$('input[name="meta_keywords"]').change(function() { meta_keywords_touched = true; });
	$('textarea[name="meta_description"]').change(function() { meta_description_touched = true; });
	$('input[name="url"]').change(function() { url_touched = true; });
	
	$('input[name="name"]').keyup(function() { set_meta(); });
	$('select[name="brand_id"]').change(function() { set_meta(); });
	$('select[name="categories[]"]').change(function() { set_meta(); });


	var login_gen1 = '';
	var login_gen2 = '';
	var login_gen3 = '';

	$('.pass_gen').click(function() {
		$('.new_password_input').val(str_rand());
		return false;
	});

	$('input[name=user_name]').keypress(function() {		
			text = translit($(this).val());
			login_gen1 = text[0];
			$('input[name=user_login]').val(login_gen2+login_gen1+login_gen3);
	});

	$('input[name=user_fam]').keypress(function() {
			text = translit($(this).val());
			login_gen2 = text;
			$('input[name=user_login]').val(login_gen2+login_gen1+login_gen3);
	});

	$('input[name=user_otch]').keypress(function() {
			text = translit($(this).val());
			login_gen3 = text[0];
			$('input[name=user_login]').val(login_gen2+login_gen1+login_gen3);
	});


	
});

function set_meta()
{
	if(!meta_title_touched)
		$('input[name="meta_title"]').val(generate_meta_title());
	if(!meta_keywords_touched)
		$('input[name="meta_keywords"]').val(generate_meta_keywords());
	if(!meta_description_touched)
		$('textarea[name="meta_description"]').val(generate_meta_description());
	if(!url_touched)
		$('input[name="url"]').val(generate_url());
}

function generate_meta_title()
{
	name = $('input[name="name"]').val();
	return name;
}

function generate_meta_keywords()
{
	name = $('input[name="name"]').val();
	result = name;
	brand = $('select[name="brand_id"] option:selected').attr('brand_name');
	if(typeof(brand) == 'string' && brand!='')
			result += ', '+brand;
	$('select[name="categories[]"]').each(function(index) {
		c = $(this).find('option:selected').attr('category_name');
		if(typeof(c) == 'string' && c != '')
    		result += ', '+c;
	}); 
	return result;
}

function generate_meta_description()
{
	if(typeof(tinyMCE.get("annotation")) =='object')
	{
		description = tinyMCE.get("annotation").getContent().replace(/(<([^>]+)>)/ig," ").replace(/(\&nbsp;)/ig," ").replace(/^\s+|\s+$/g, '').substr(0, 512);
		return description;
	}
	else
		return $('textarea[name=annotation]').val().replace(/(<([^>]+)>)/ig," ").replace(/(\&nbsp;)/ig," ").replace(/^\s+|\s+$/g, '').substr(0, 512);
}

function generate_url()
{
	url = $('input[name="name"]').val();
	url = url.replace(/[\s]+/gi, '-');
	url = translit(url);
	url = url.replace(/[^0-9a-z_\-]+/gi, '').toLowerCase();	
	return url;
}

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



{if $message_success}
<!-- Системное сообщение -->
<div class="message message_success">
	<span class="text">{if $message_success=='added'}Товар добавлен{elseif $message_success=='updated'}Товар изменен{else}{$message_success|escape}{/if}</span>

	{if $smarty.get.return}
	<a class="button" href="{$smarty.get.return}">Вернуться</a>
	{/if}

</div>
<!-- Системное сообщение (The End)-->
{/if}

{if $message_error}
<!-- Системное сообщение -->
<div class="message message_error">
	<span class="text">
	{if $message_error=='url_exists'}Товар с таким адресом уже существует{elseif $message_error=='empty_name'}Введите название{else}{$message_error|escape}{/if}
	</span>
	{if $smarty.get.return}
	<a class="button" href="{$smarty.get.return}">Вернуться</a>
	{/if}
</div>
<!-- Системное сообщение (The End)-->
{/if}

{if $message_warning}
<div class="message message_error">
	<span class="text">
		{if $message_warning=='no_seller'}Не присвоен продавец, товар не готов к аукциону{/if}
	</span>
</div>
{/if}

{if $product->is_lot}	{include file='lot_view.tpl'} {/if}


<!-- Основная форма -->
<form method=post id=product enctype="multipart/form-data">
<input type=hidden name="session_id" value="{$smarty.session.id}">

 	<div id="name">
		<input class="name" name=name type="text" value="{$product->name|escape}"/> 
		<input name=id type="hidden" value="{$product->id|escape}"/> 


	</div> 
	

	
	<div id="product_categories" {if !$categories}style='display:none;'{/if}>
		<label>Категория</label>
		<div>
			<ul>
				{foreach $product_categories as $product_category name=categories}
				<li>
					<select name="categories[]">
						{function name=category_select level=0}
						{foreach $categories as $category}
								<option value='{$category->id}' {if $category->id == $selected_id}selected{/if} category_name='{$category->name|escape}'>{section name=sp loop=$level}&nbsp;&nbsp;&nbsp;&nbsp;{/section}{$category->name|escape}</option>
								{category_select categories=$category->subcategories selected_id=$selected_id  level=$level+1}
						{/foreach}
						{/function}
						{category_select categories=$categories selected_id=$product_category->id}
					</select>
					<span {if not $smarty.foreach.categories.first}style='display:none;'{/if} class="add"><i class="dash_link">Дополнительная категория</i></span>
					<span {if $smarty.foreach.categories.first}style='display:none;'{/if} class="delete"><i class="dash_link">Удалить</i></span>
				</li>
				{/foreach}		
			</ul>
		</div>
	</div>

	<div class="admin_list admin_selected_block">
		<label style="font-weight:bold;padding:0px 10px">Статус товара</label>
		<select name="status_id">
            <option value='0' {if $product->status=='0'}selected{/if}>В обработке</option>
            <option value='1' {if $product->status=='1'}selected{/if}>Готов к аукциону</option>
 		</select>
	</div>


	<div class="admin_list admin_selected_block">
		{if $users}

		<label style="font-weight:bold;padding:0px 10px">Продавец</label>

		<select name="user_id" class="prod_list">
			<option value="0">Не указан</option>
			{foreach $users as $u}	   		
	        	<option value="{$u->id}" {if $u->id==$product->user_id} selected {/if}>(# {$u->id}) {$u->fam} {$u->name|truncate:1:''}. {$u->otch|truncate:1:''}.</option>
	        {/foreach}
		</select>	

		<span class="add add_prodavec clickable"><i class="dash_link">Добавить продавца</i></span>

		{/if}

		<div class="seller_registration">
		
			<!-- Параметры страницы -->
			<div class="block layer add_prod_block add_user_form" style="margin-top:20px; display:none">
				<h2>Регистрация продавца</h2>
				<ul>				
					<li><label class="property">Фамилия</label><input 					name="user_fam" class="simpla_inp" type="text" value=""></li>
					<li><label class="property">Имя</label><input 						name="user_name" class="simpla_inp" type="text" value=""></li>
					<li><label class="property">Отчество</label><input 					name="user_otch" class="simpla_inp" type="text" value=""></li>
					<li><label class="property">E-mail</label><input 					name="user_email" class="simpla_inp" type="text" value=""></li>
					<li><label class="property">Регион</label><input 					name="user_region" class="simpla_inp" type="text" value=""></li>
					<li><label class="property">Почтовый индекс</label><input 			name="user_postcode" class="simpla_inp" type="text" value=""></li>
					<li><label class="property">Город (населенный пункт)</label><input 	name="user_city" class="simpla_inp" type="text" value=""></li>
					<li><label class="property">Район</label><input 					name="user_area" class="simpla_inp" type="text" value=""></li>
					<li><label class="property">Улица</label><input 					name="user_street" class="simpla_inp" type="text" value=""></li>
					<li><label class="property">Номер дома</label><input 				name="user_number" class="simpla_inp" type="text" value=""></li>
					<li><label class="property">Корпус</label><input 					name="user_housing" class="simpla_inp" type="text" value=""></li>
					<li><label class="property">Номер офиса/квартиры</label><input 		name="user_office" class="simpla_inp" type="text" value=""></li>
					<li><label class="property">Телефон</label><input 					name="user_phone" class="simpla_inp" type="text" value=""></li>
					<li><label class="property">Логин</label><input 					name="user_login" class="simpla_inp" type="text" value=""></li>
					<li><label class="property">Пароль</label><input 					name="user_password" class="simpla_inp" type="text" value="">

					<br />
					<a href="#" class="pass_gen" style="display:block; margin-left:170px; margin-top:5px">Сгенерировать</a>
					<br />

					</li>


					<input class="button_green button_save button_add_user" type="button" name value="Добавить">
					<br /><br /><br />
					<div class="message message_error" style="display:none">

					</div>

				</ul>
			</div>

		</div>

	</div>


 	<!-- Варианты товара -->
	<div id="variants_block" {assign var=first_variant value=$product_variants|@first}{if $product_variants|@count <= 1 && !$first_variant->name}class=single_variant{/if}>
		<ul id="header">
			
			<li class="variant_name">Название варианта</li>	
			<li class="variant_sku">Артикул</li>	
			<li class="variant_price">Цена</li>	
			<!-- <li class="variant_discount">Валюта</li>		 -->		
		</ul>
		<div id="variants">
		{foreach $product_variants as $variant}
		<ul>
			
			<li class="variant_name">      <input name="variants[id][]"            type="hidden" value="{$variant->id|escape}" /><input name="variants[name][]" type="" value="{$variant->name|escape}" /> <a class="del_variant" href=""><img src="design/images/cross-circle-frame.png" alt="" /></a></li>
			<li class="variant_sku">       <input name="variants[sku][]"           type="text"   value="{$variant->sku|escape}" /></li>
			<li class="variant_price">     <input name="variants[price][]"         type="text"   value="{$variant->price|escape}" />
				<input name="variants[stock][]" type="hidden" value="∞" />
			</li>
			<li class="variant_price"> 
			<div style="font-size:16px; padding:6px 0px">
			{$currency->sign} 
			</div>
			</li>
			<!-- <li class="variant_price">  			
				<select name="currency" style="font-size:14px; padding:3px">
				{foreach $currencies as $c}
					<option value="{$c->id}">{$c->code}</option>
				{/foreach}
				</select>
			</li>	 -->		
			
				
			  
		</ul>
		{/foreach}		
		</div>


		<input class="button_green button_save" type="submit" name="" value="Сохранить" />

 	</div>
	<!-- Варианты товара (The End)--> 
	
 	<!-- Левая колонка свойств товара -->
	<div id="column_left">
			
		<!-- Параметры страницы -->
		<div class="block layer">
			<h2>Параметры страницы</h2>
			<ul>
				<li><label class=property>Адрес</label><div class="page_url"> /products/</div><input name="url" class="page_url" type="text" value="{$product->url|escape}" /></li>
				<li><label class=property>Заголовок</label><input name="meta_title" class="simpla_inp" type="text" value="{$product->meta_title|escape}" /></li>
				<li><label class=property>Ключевые слова</label><input name="meta_keywords" class="simpla_inp" type="text" value="{$product->meta_keywords|escape}" /></li>
				<li><label class=property>Описание</label><textarea name="meta_description" class="simpla_inp" />{$product->meta_description|escape}</textarea></li>
			</ul>
		</div>
		<!-- Параметры страницы (The End)-->
				
		<div class="block layer">
			<h2>Свойства товара
			
			</h2>
			
			<ul class="prop_ul">
<li><label class=property>Год</label><input class="simpla_inp" type="number" name="prop_year" value="{$product->prop_year}" /></li>
<li><label class=property>Сохранность</label><input class="simpla_inp" type="text" name="prop_save" value="{$product->prop_save}" /></li>
<li><label class=property>Материал</label><input class="simpla_inp" type="text" name="prop_material" value="{$product->prop_material}" /></li>
<li><label class=property>Буквы</label><input class="simpla_inp" type="text" name="prop_letters" value="{$product->prop_letters}" /></li>
<li><label class=property>Вес</label><input class="simpla_inp" type="number" min="0.01" step="0.01" name="prop_weight" value="{$product->prop_weight}" /> грамм</li>
			</ul>
			<input class="button_green button_save" type="submit" name="" value="Сохранить" />			
		</div>
		
		<!-- Свойства товара (The End)-->

			
	</div>
	<!-- Левая колонка свойств товара (The End)--> 
	
	<!-- Правая колонка свойств товара -->	
	<div id="column_right">

	
		
		<!-- Изображения товара -->	
		<div class="block layer images">
			<h2>Изображения товара<br><br>
		<div class="checkbox">
			<input name='numizmat_filter' id='numizmat_filter' type="checkbox" /> 
			<label for="numizmat_filter">Применить фильтр "Нумизматический"
			</label><br>
			<select name="filter_param">
				<option value="1">Средняя монета (2 - 3см)</option>
				<option value="2">Маленькая монета (1,5 - 2см)</option>
				<option value="3">Очень маленькая монета (1 - 1,5см)</option>
				<option value="4">Большая монета (более 3см)</option>
				<option value="5">Бумажная купюра</option>
			</select>
			<br><br><a href="../files/scan_get_starting.pdf" target="_blank">Инструкция по сканированию монет</a><br><br>
			{foreach $product_images as $image}			
			<a href="../files/originals/{$image->filename}?{1|rand:100}" target="_blank">Глянуть оригинал</a><br>
			{/foreach}<br><br>
			{if $product_images|count>0}
			<b>При добавлении новых картинок,<br> сперва удалите предыдущие</b>
			{/if}
		</div><br>
			</h2>
			<ul>{foreach $product_images as $image}<li>
					<a href='#' class="delete"><img src='design/images/cross-circle-frame.png'></a>
					<img src="{$image->filename|resize:100:100}" alt="" />
					<input type=hidden name='images[]' value='{$image->id}'>
				</li>{/foreach}</ul>
			<div id=dropZone>
				<div id=dropMessage>Перетащите файлы сюда</div>
				<input type="file" name="dropped_images[]" multiple class="dropInput">
			</div>
			<div id="add_image"></div>
			<span class=upload_image><i class="dash_link" id="upload_image">Добавить изображение</i></span> или <span class=add_image_url><i class="dash_link" id="add_image_url">загрузить из интернета</i></span>
		</div>



		<input class="button_green button_save" type="submit" name="" value="Сохранить" />
		
	</div>
	<!-- Правая колонка свойств товара (The End)--> 

	<!-- Описагние товара -->
	<div class="block layer">
		<h2>Краткое описание</h2>
		<textarea name="annotation" class="editor_small">{$product->annotation|escape}</textarea>
	</div>
		
	<div class="block">		
		<h2>Полное  описание</h2>
		<textarea name="body" class="editor_large">{$product->body|escape}</textarea>
	</div>
	<!-- Описание товара (The End)-->
	<input class="button_green button_save" type="submit" name="" value="Сохранить" />
	
</form>
<!-- Основная форма (The End) -->

