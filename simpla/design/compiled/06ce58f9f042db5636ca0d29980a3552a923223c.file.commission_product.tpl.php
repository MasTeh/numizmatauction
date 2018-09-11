<?php /* Smarty version Smarty-3.1.18, created on 2016-10-24 19:47:16
         compiled from "simpla/design/html/commission_product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1289309584580e3b14a8b6e1-87482544%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06ce58f9f042db5636ca0d29980a3552a923223c' => 
    array (
      0 => 'simpla/design/html/commission_product.tpl',
      1 => 1474745790,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1289309584580e3b14a8b6e1-87482544',
  'function' => 
  array (
    'category_select' => 
    array (
      'parameter' => 
      array (
        'level' => 0,
      ),
      'compiled' => '',
    ),
  ),
  'variables' => 
  array (
    'manager' => 0,
    'product' => 0,
    'message_success' => 0,
    'message_error' => 0,
    'message_warning' => 0,
    'categories' => 0,
    'product_categories' => 0,
    'category' => 0,
    'selected_id' => 0,
    'level' => 0,
    'product_category' => 0,
    'users' => 0,
    'u' => 0,
    'product_variants' => 0,
    'first_variant' => 0,
    'variant' => 0,
    'currency' => 0,
    'currencies' => 0,
    'c' => 0,
    'product_images' => 0,
    'image' => 0,
  ),
  'has_nocache_code' => 0,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_580e3b14c148a8_55650353',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_580e3b14c148a8_55650353')) {function content_580e3b14c148a8_55650353($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/home/u457006/numisrus.ru/www/Smarty/libs/plugins/modifier.truncate.php';
?><?php $_smarty_tpl->_capture_stack[0][] = array('tabs', null, null); ob_start(); ?>
	<li><a href="<?php echo $_GET['return'];?>
">
		Вернуться к списку</a></li>


<!-- 
	<?php if (in_array('features',$_smarty_tpl->tpl_vars['manager']->value->permissions)) {?><li><a href="index.php?module=FeaturesAdmin">Свойства</a></li><?php }?> -->
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php if ($_smarty_tpl->tpl_vars['product']->value->id) {?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value->name, null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
<?php } else { ?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable('Новый товар', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
<?php }?>


<?php echo $_smarty_tpl->getSubTemplate ('tinymce_init.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>




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




<?php if ($_smarty_tpl->tpl_vars['message_success']->value) {?>
<!-- Системное сообщение -->
<div class="message message_success">
	<span class="text"><?php if ($_smarty_tpl->tpl_vars['message_success']->value=='added') {?>Товар добавлен<?php } elseif ($_smarty_tpl->tpl_vars['message_success']->value=='updated') {?>Товар изменен<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['message_success']->value, ENT_QUOTES, 'UTF-8', true);?>
<?php }?></span>

	<?php if ($_GET['return']) {?>
	<a class="button" href="<?php echo $_GET['return'];?>
">Вернуться</a>
	<?php }?>

</div>
<!-- Системное сообщение (The End)-->
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['message_error']->value) {?>
<!-- Системное сообщение -->
<div class="message message_error">
	<span class="text">
	<?php if ($_smarty_tpl->tpl_vars['message_error']->value=='url_exists') {?>Товар с таким адресом уже существует<?php } elseif ($_smarty_tpl->tpl_vars['message_error']->value=='empty_name') {?>Введите название<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['message_error']->value, ENT_QUOTES, 'UTF-8', true);?>
<?php }?>
	</span>
	<?php if ($_GET['return']) {?>
	<a class="button" href="<?php echo $_GET['return'];?>
">Вернуться</a>
	<?php }?>
</div>
<!-- Системное сообщение (The End)-->
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['message_warning']->value) {?>
<div class="message message_error">
	<span class="text">
		<?php if ($_smarty_tpl->tpl_vars['message_warning']->value=='no_seller') {?>Не присвоен продавец, товар не готов к аукциону<?php }?>
	</span>
</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['product']->value->is_lot) {?>	<?php echo $_smarty_tpl->getSubTemplate ('lot_view.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
 <?php }?>


<!-- Основная форма -->
<form method=post id=product enctype="multipart/form-data">
<input type=hidden name="session_id" value="<?php echo $_SESSION['id'];?>
">

 	<div id="name">
		<input class="name" name=name type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
"/> 
		<input name=id type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->id, ENT_QUOTES, 'UTF-8', true);?>
"/> 


	</div> 
	

	
	<div id="product_categories" <?php if (!$_smarty_tpl->tpl_vars['categories']->value) {?>style='display:none;'<?php }?>>
		<label>Категория</label>
		<div>
			<ul>
				<?php  $_smarty_tpl->tpl_vars['product_category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product_category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product_categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['product_category']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['product_category']->key => $_smarty_tpl->tpl_vars['product_category']->value) {
$_smarty_tpl->tpl_vars['product_category']->_loop = true;
 $_smarty_tpl->tpl_vars['product_category']->index++;
 $_smarty_tpl->tpl_vars['product_category']->first = $_smarty_tpl->tpl_vars['product_category']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['categories']['first'] = $_smarty_tpl->tpl_vars['product_category']->first;
?>
				<li>
					<select name="categories[]">
						<?php if (!function_exists('smarty_template_function_category_select')) {
    function smarty_template_function_category_select($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['category_select']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
						<?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
								<option value='<?php echo $_smarty_tpl->tpl_vars['category']->value->id;?>
' <?php if ($_smarty_tpl->tpl_vars['category']->value->id==$_smarty_tpl->tpl_vars['selected_id']->value) {?>selected<?php }?> category_name='<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value->name, ENT_QUOTES, 'UTF-8', true);?>
'><?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['sp'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['sp']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['name'] = 'sp';
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['level']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['total']);
?>&nbsp;&nbsp;&nbsp;&nbsp;<?php endfor; endif; ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</option>
								<?php smarty_template_function_category_select($_smarty_tpl,array('categories'=>$_smarty_tpl->tpl_vars['category']->value->subcategories,'selected_id'=>$_smarty_tpl->tpl_vars['selected_id']->value,'level'=>$_smarty_tpl->tpl_vars['level']->value+1));?>

						<?php } ?>
						<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>

						<?php smarty_template_function_category_select($_smarty_tpl,array('categories'=>$_smarty_tpl->tpl_vars['categories']->value,'selected_id'=>$_smarty_tpl->tpl_vars['product_category']->value->id));?>

					</select>
					<span <?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['categories']['first']) {?>style='display:none;'<?php }?> class="add"><i class="dash_link">Дополнительная категория</i></span>
					<span <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['categories']['first']) {?>style='display:none;'<?php }?> class="delete"><i class="dash_link">Удалить</i></span>
				</li>
				<?php } ?>		
			</ul>
		</div>
	</div>

	<div class="admin_list admin_selected_block">
		<label style="font-weight:bold;padding:0px 10px">Статус товара</label>
		<select name="status_id">
            <option value='0' <?php if ($_smarty_tpl->tpl_vars['product']->value->status=='0') {?>selected<?php }?>>В обработке</option>
            <option value='1' <?php if ($_smarty_tpl->tpl_vars['product']->value->status=='1') {?>selected<?php }?>>Готов к аукциону</option>
 		</select>
	</div>


	<div class="admin_list admin_selected_block">
		<?php if ($_smarty_tpl->tpl_vars['users']->value) {?>

		<label style="font-weight:bold;padding:0px 10px">Продавец</label>

		<select name="user_id" class="prod_list">
			<option value="0">Не указан</option>
			<?php  $_smarty_tpl->tpl_vars['u'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['u']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['u']->key => $_smarty_tpl->tpl_vars['u']->value) {
$_smarty_tpl->tpl_vars['u']->_loop = true;
?>	   		
	        	<option value="<?php echo $_smarty_tpl->tpl_vars['u']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['u']->value->id==$_smarty_tpl->tpl_vars['product']->value->user_id) {?> selected <?php }?>>(# <?php echo $_smarty_tpl->tpl_vars['u']->value->id;?>
) <?php echo $_smarty_tpl->tpl_vars['u']->value->fam;?>
 <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['u']->value->name,1,'');?>
. <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['u']->value->otch,1,'');?>
.</option>
	        <?php } ?>
		</select>	

		<span class="add add_prodavec clickable"><i class="dash_link">Добавить продавца</i></span>

		<?php }?>

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
	<div id="variants_block" <?php $_smarty_tpl->tpl_vars['first_variant'] = new Smarty_variable($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['first'][0][0]->first_modifier($_smarty_tpl->tpl_vars['product_variants']->value), null, 0);?><?php if (count($_smarty_tpl->tpl_vars['product_variants']->value)<=1&&!$_smarty_tpl->tpl_vars['first_variant']->value->name) {?>class=single_variant<?php }?>>
		<ul id="header">
			
			<li class="variant_name">Название варианта</li>	
			<li class="variant_sku">Артикул</li>	
			<li class="variant_price">Цена</li>	
			<!-- <li class="variant_discount">Валюта</li>		 -->		
		</ul>
		<div id="variants">
		<?php  $_smarty_tpl->tpl_vars['variant'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['variant']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product_variants']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['variant']->key => $_smarty_tpl->tpl_vars['variant']->value) {
$_smarty_tpl->tpl_vars['variant']->_loop = true;
?>
		<ul>
			
			<li class="variant_name">      <input name="variants[id][]"            type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['variant']->value->id, ENT_QUOTES, 'UTF-8', true);?>
" /><input name="variants[name][]" type="" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['variant']->value->name, ENT_QUOTES, 'UTF-8', true);?>
" /> <a class="del_variant" href=""><img src="design/images/cross-circle-frame.png" alt="" /></a></li>
			<li class="variant_sku">       <input name="variants[sku][]"           type="text"   value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['variant']->value->sku, ENT_QUOTES, 'UTF-8', true);?>
" /></li>
			<li class="variant_price">     <input name="variants[price][]"         type="text"   value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['variant']->value->price, ENT_QUOTES, 'UTF-8', true);?>
" />
				<input name="variants[stock][]" type="hidden" value="∞" />
			</li>
			<li class="variant_price"> 
			<div style="font-size:16px; padding:6px 0px">
			<?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
 
			</div>
			</li>
			<!-- <li class="variant_price">  			
				<select name="currency" style="font-size:14px; padding:3px">
				<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['currencies']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->_loop = true;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['c']->value->code;?>
</option>
				<?php } ?>
				</select>
			</li>	 -->		
			
				
			  
		</ul>
		<?php } ?>		
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
				<li><label class=property>Адрес</label><div class="page_url"> /products/</div><input name="url" class="page_url" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->url, ENT_QUOTES, 'UTF-8', true);?>
" /></li>
				<li><label class=property>Заголовок</label><input name="meta_title" class="simpla_inp" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->meta_title, ENT_QUOTES, 'UTF-8', true);?>
" /></li>
				<li><label class=property>Ключевые слова</label><input name="meta_keywords" class="simpla_inp" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->meta_keywords, ENT_QUOTES, 'UTF-8', true);?>
" /></li>
				<li><label class=property>Описание</label><textarea name="meta_description" class="simpla_inp" /><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->meta_description, ENT_QUOTES, 'UTF-8', true);?>
</textarea></li>
			</ul>
		</div>
		<!-- Параметры страницы (The End)-->
				
		<div class="block layer">
			<h2>Свойства товара
			
			</h2>
			
			<ul class="prop_ul">
<li><label class=property>Год</label><input class="simpla_inp" type="number" name="prop_year" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->prop_year;?>
" /></li>
<li><label class=property>Сохранность</label><input class="simpla_inp" type="text" name="prop_save" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->prop_save;?>
" /></li>
<li><label class=property>Материал</label><input class="simpla_inp" type="text" name="prop_material" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->prop_material;?>
" /></li>
<li><label class=property>Буквы</label><input class="simpla_inp" type="text" name="prop_letters" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->prop_letters;?>
" /></li>
<li><label class=property>Вес</label><input class="simpla_inp" type="number" min="0.01" step="0.01" name="prop_weight" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->prop_weight;?>
" /> грамм</li>
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
			<?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product_images']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
?>			
			<a href="../files/originals/<?php echo $_smarty_tpl->tpl_vars['image']->value->filename;?>
?<?php echo rand(1,100);?>
" target="_blank">Глянуть оригинал</a><br>
			<?php } ?><br><br>
			<?php if (count($_smarty_tpl->tpl_vars['product_images']->value)>0) {?>
			<b>При добавлении новых картинок,<br> сперва удалите предыдущие</b>
			<?php }?>
		</div><br>
			</h2>
			<ul><?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product_images']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
?><li>
					<a href='#' class="delete"><img src='design/images/cross-circle-frame.png'></a>
					<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['image']->value->filename,100,100);?>
" alt="" />
					<input type=hidden name='images[]' value='<?php echo $_smarty_tpl->tpl_vars['image']->value->id;?>
'>
				</li><?php } ?></ul>
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
		<textarea name="annotation" class="editor_small"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->annotation, ENT_QUOTES, 'UTF-8', true);?>
</textarea>
	</div>
		
	<div class="block">		
		<h2>Полное  описание</h2>
		<textarea name="body" class="editor_large"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->body, ENT_QUOTES, 'UTF-8', true);?>
</textarea>
	</div>
	<!-- Описание товара (The End)-->
	<input class="button_green button_save" type="submit" name="" value="Сохранить" />
	
</form>
<!-- Основная форма (The End) -->

<?php }} ?>
