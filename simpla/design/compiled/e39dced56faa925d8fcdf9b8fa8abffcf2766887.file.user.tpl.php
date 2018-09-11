<?php /* Smarty version Smarty-3.1.18, created on 2016-10-29 20:59:24
         compiled from "simpla/design/html/user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:743448015580f1cf7b0f1c0-12547026%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e39dced56faa925d8fcdf9b8fa8abffcf2766887' => 
    array (
      0 => 'simpla/design/html/user.tpl',
      1 => 1477763947,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '743448015580f1cf7b0f1c0-12547026',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_580f1cf7d97f10_28438012',
  'variables' => 
  array (
    'user' => 0,
    'user_adding' => 0,
    'message_success' => 0,
    'message_error' => 0,
    'groups' => 0,
    'g' => 0,
    'auctions' => 0,
    'a' => 0,
    'deals' => 0,
    'deal' => 0,
    'lots' => 0,
    'lot' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_580f1cf7d97f10_28438012')) {function content_580f1cf7d97f10_28438012($_smarty_tpl) {?>
<?php $_smarty_tpl->_capture_stack[0][] = array('tabs', null, null); ob_start(); ?>
	<li><a href="index.php?module=UsersAdmin&group_id=0">Список пользователей</a></li>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php if ($_smarty_tpl->tpl_vars['user']->value->id) {?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable(htmlspecialchars($_smarty_tpl->tpl_vars['user']->value->name, ENT_QUOTES, 'UTF-8', true), null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['user_adding']->value=='1') {?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable('Добавление пользователя', null, 0);?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['message_success']->value) {?>
<!-- Системное сообщение -->
<div class="message message_success">
	<span class="text">
	<?php if ($_smarty_tpl->tpl_vars['message_success']->value=='updated') {?>Пользователь отредактирован<?php } elseif ($_smarty_tpl->tpl_vars['message_success']->value=='added') {?>Пользователь добавлен<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['message_success']->value, ENT_QUOTES, 'UTF-8', true);?>
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
	<span class="text"><?php if ($_smarty_tpl->tpl_vars['message_error']->value=='login_exists') {?>Пользователь с таким email уже зарегистрирован
	<?php } elseif ($_smarty_tpl->tpl_vars['message_error']->value=='empty_name') {?>Введите имя пользователя
	<?php } elseif ($_smarty_tpl->tpl_vars['message_error']->value=='empty_email') {?>Введите email пользователя
	<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['message_error']->value, ENT_QUOTES, 'UTF-8', true);?>
<?php }?></span>
	<?php if ($_GET['return']) {?>
	<a class="button" href="<?php echo $_GET['return'];?>
">Вернуться</a>
	<?php }?>
</div>
<!-- Системное сообщение (The End)-->
<?php }?>



<form method=post id="product" enctype="multipart/form-data">

<input type=hidden name="session_id" value="<?php echo $_SESSION['id'];?>
">
<?php if ($_smarty_tpl->tpl_vars['user_adding']->value!='1') {?>
<input name=id type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value->id, ENT_QUOTES, 'UTF-8', true);?>
"/> 
<?php }?>

<div id="column_left">
		<?php if ($_smarty_tpl->tpl_vars['user']->value->bot==1) {?>
		<h3>Личные данные этого пользователя недоступны для изменений, т.к. он бот. Вы можете только удалить его.</h3>
		<?php } else { ?>
		<div class="block">
			<ul>
				<?php if ($_smarty_tpl->tpl_vars['groups']->value) {?>
				<li>
					<label class=property>Статус</label>
					<select name="group_id">						
				   		<?php  $_smarty_tpl->tpl_vars['g'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['g']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['g']->key => $_smarty_tpl->tpl_vars['g']->value) {
$_smarty_tpl->tpl_vars['g']->_loop = true;
?>
				        	<option value='<?php echo $_smarty_tpl->tpl_vars['g']->value->id;?>
' <?php if ($_smarty_tpl->tpl_vars['user']->value->group_id==$_smarty_tpl->tpl_vars['g']->value->id) {?>selected<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['g']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</option>
				    	<?php } ?>
					</select>
				</li>
				<?php }?>				
				<li>
					<label class=property>Сервисы</label>
					<input name="seller" class="simpla_inp" type="checkbox" <?php if ($_smarty_tpl->tpl_vars['user']->value->seller) {?>checked<?php }?> /> 
					<label for="seller">Продавец</label>&nbsp;&nbsp;
					<input name="buyer" class="simpla_inp" type="checkbox" <?php if ($_smarty_tpl->tpl_vars['user']->value->buyer) {?>checked<?php }?> /> 
					<label for="buyer">Покупатель</label>
					<br /><br />
				</li>
				<li><label class=property>Фамилия</label><input name="fam" class="simpla_inp" type="text" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->fam;?>
" /></li>
				<li><label class=property>Имя</label><input name="name" class="simpla_inp" type="text" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->name;?>
" /></li>
				<li><label class=property>Отчество</label><input name="otch" class="simpla_inp" type="text" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->otch;?>
" /></li>

				<li><label class=property>Ник</label><input name="login" class="simpla_inp" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value->login, ENT_QUOTES, 'UTF-8', true);?>
" /></li>
				<?php if ($_smarty_tpl->tpl_vars['user_adding']->value!='1') {?>
				<li><label class=property>Пароль</label>
					<a class="password_remid" href="#">Установить новый</a>
					<div style="display:none" class="new_password_input">
					<input placeholder="Новый пароль" name="new_password" class="simpla_inp new_password_input" type="text" value="" />
					<br />
					<a href="#" class="pass_gen" style="display:block; margin-left:170px; margin-top:5px">Сгенерировать</a>
					<br />
					</div>
				</li>
				<?php } else { ?>
				<li><label class=property>Пароль</label>
					<div class="new_password_input">
					<input name="new_password" class="simpla_inp new_password_input" type="text" value="" />
					<br />
					<a href="#" class="pass_gen" style="display:block; margin-left:170px; margin-top:5px">Сгенерировать</a>
					<br />					
					</div>
				</li>
				<?php }?>
				<li><label class=property>E-Mail</label><input name="email" class="simpla_inp" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value->email, ENT_QUOTES, 'UTF-8', true);?>
" /></li>
				<?php if ($_smarty_tpl->tpl_vars['user_adding']->value!='1') {?>
				<li><label class=property>Дата регистрации</label><input name="created" class="simpla_inp" type="text" disabled value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['date'][0][0]->date_modifier($_smarty_tpl->tpl_vars['user']->value->created);?>
" />
				</li>

				<li><label class=property>Последний IP</label><input name="last_ip" class="simpla_inp" type="text" disabled value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value->last_ip, ENT_QUOTES, 'UTF-8', true);?>
" /></li>
				<?php }?>
				<li><label class=property>Регион</label><input name="area" class="simpla_inp" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value->area, ENT_QUOTES, 'UTF-8', true);?>
" /></li>
				<li><label class=property>Почтовый индекс</label><input name="postcode" class="simpla_inp" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value->postcode, ENT_QUOTES, 'UTF-8', true);?>
" /></li>
				<li><label class=property>Город (населенный пункт)</label><input name="city" class="simpla_inp" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value->city, ENT_QUOTES, 'UTF-8', true);?>
" />
				</li>
				<li><label class=property>Район</label><input name="region" class="simpla_inp" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value->region, ENT_QUOTES, 'UTF-8', true);?>
" /></li>
				<li><label class=property>Улица</label><input name="street" class="simpla_inp" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value->street, ENT_QUOTES, 'UTF-8', true);?>
" /></li>
				<li><label class=property>Номер дома</label><input name="number" class="simpla_inp" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value->number, ENT_QUOTES, 'UTF-8', true);?>
" /></li>
				<li><label class=property>Корпус</label><input name="housing" class="simpla_inp" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value->housing, ENT_QUOTES, 'UTF-8', true);?>
" /></li>
				<li><label class=property>Номер офиса/квартиры</label><input name="office" class="simpla_inp" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value->office, ENT_QUOTES, 'UTF-8', true);?>
" /></li>
				<li><label class=property>Телефон</label><input name="phone" class="simpla_inp" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value->phone, ENT_QUOTES, 'UTF-8', true);?>
" /></li>

				<li><label class=property>Размер комиссии %</label>
					<input name="commission" class="simpla_inp" type="number" min="0" max="100" value="<?php if ($_smarty_tpl->tpl_vars['user']->value->id) {?><?php echo $_smarty_tpl->tpl_vars['user']->value->commission;?>
<?php } else { ?>10<?php }?>" /></li>

				<?php if ($_smarty_tpl->tpl_vars['user']->value->document) {?>
				<li><label class=property>Скан документа</label><a href="/simpla/files/documents/<?php echo $_smarty_tpl->tpl_vars['user']->value->document;?>
" target="_blank">
					<img src="/simpla/files/documents/<?php echo $_smarty_tpl->tpl_vars['user']->value->document;?>
" class="doc_img" width="150" /><br /><br />
					<a href="#" class="del_img" style="display:block; margin-left:170px; margin-top:5px">Удалить</a><br /><br />
					<input type="hidden" name="del_document" value="0" />
					<input style="display:block; margin-left:170px; margin-top:5px; display:none" name="document" class="simpla_inp" type="file" value="" /><br><br>
				</a></li>
				<?php } else { ?>
				<li><label class=property>Скан документа</label><input name="document" class="simpla_inp" type="file" value="" /></li>
				<?php }?>
			</ul>
		</div>
		<?php }?>

		
		<!-- Параметры страницы (The End)-->			
	<?php if ($_smarty_tpl->tpl_vars['user_adding']->value=='1') {?>
	<input class="button_green button_save" type="submit" name="user_info" value="Добавить" />
	<?php } else { ?>
	<?php if ($_smarty_tpl->tpl_vars['user']->value->bot!=1) {?>
	<input class="button_green button_save" type="submit" name="user_info" value="Сохранить" />
	<?php }?>
	<?php }?>
</div>
		

<div id="column_right">


<div style="padding:10px">
<h2>Сделки</h2>

<div style="padding:10px">
	<?php  $_smarty_tpl->tpl_vars['a'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['a']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['auctions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['a']->key => $_smarty_tpl->tpl_vars['a']->value) {
$_smarty_tpl->tpl_vars['a']->_loop = true;
?>
		<a href="index.php?module=UserAdmin&action=open_print1&auction_id=<?php echo $_smarty_tpl->tpl_vars['a']->value->id;?>
" style="display:block; padding:8px" target="_blank">
		    Возвратная накладная за аукцион № <?php echo $_smarty_tpl->tpl_vars['a']->value->id;?>

		</a>
	<?php } ?>	
</div>
<br>

Аукцион

	<?php  $_smarty_tpl->tpl_vars['a'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['a']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['auctions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['a']->key => $_smarty_tpl->tpl_vars['a']->value) {
$_smarty_tpl->tpl_vars['a']->_loop = true;
?>
		<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('auction_filter'=>$_smarty_tpl->tpl_vars['a']->value->id),$_smarty_tpl);?>
" class="user_filter <?php if ($_GET['auction_filter']==$_smarty_tpl->tpl_vars['a']->value->id) {?>user_filter_active<?php }?>">
			<?php echo $_smarty_tpl->tpl_vars['a']->value->id;?>

		</a>
	<?php } ?>	


<br><br>
<?php if ($_smarty_tpl->tpl_vars['deals']->value) {?>
<div style="height:400px; overflow: scroll">
<?php  $_smarty_tpl->tpl_vars['deal'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['deal']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['deals']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['deal']->key => $_smarty_tpl->tpl_vars['deal']->value) {
$_smarty_tpl->tpl_vars['deal']->_loop = true;
?>
<div style="margin-bottom:10px">
<?php if ($_smarty_tpl->tpl_vars['deal']->value->type=='buy') {?>
<div style="display:inline-block;padding:4px;background:#b1ffc2; font-size:12px; font-weight:bold">
покупка
</div>
<?php } elseif ($_smarty_tpl->tpl_vars['deal']->value->type=='sell') {?>
<div style="display:inline-block;padding:4px;background:#fffeb1; font-size:12px; font-weight:bold">
продажа
</div>
<?php }?>
<a style="font-size:13px" href="index.php?module=DealAdmin&id=<?php echo $_smarty_tpl->tpl_vars['deal']->value->id;?>
">сделка № <?php echo $_smarty_tpl->tpl_vars['deal']->value->id;?>
</a> на сумму <?php echo number_format($_smarty_tpl->tpl_vars['deal']->value->total_price,0,".",",");?>
руб  от <?php echo $_smarty_tpl->tpl_vars['deal']->value->date;?>

</div>
<?php } ?>
</div>
<?php }?>

</div>

<?php if ($_smarty_tpl->tpl_vars['lots']->value) {?>

<div style="padding:10px">
<h2>Лоты</h2>

Аукцион

	<?php  $_smarty_tpl->tpl_vars['a'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['a']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['auctions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['a']->key => $_smarty_tpl->tpl_vars['a']->value) {
$_smarty_tpl->tpl_vars['a']->_loop = true;
?>
		<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('auction_filter2'=>$_smarty_tpl->tpl_vars['a']->value->id),$_smarty_tpl);?>
" class="user_filter <?php if ($_GET['auction_filter2']==$_smarty_tpl->tpl_vars['a']->value->id) {?>user_filter_active<?php }?>">
			<?php echo $_smarty_tpl->tpl_vars['a']->value->id;?>

		</a>
	<?php } ?>	


<br><br>

<div style="height:400px; overflow: scroll">

<?php  $_smarty_tpl->tpl_vars['lot'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['lot']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lots']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['lot']->key => $_smarty_tpl->tpl_vars['lot']->value) {
$_smarty_tpl->tpl_vars['lot']->_loop = true;
?>

<div style="float:left; width:50px; height:50px; display:inline-block">
  <a target="_blank" href="index.php?module=CommissionProductAdmin&id=<?php echo $_smarty_tpl->tpl_vars['lot']->value->product_id;?>
"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['lot']->value->images[0]->filename,50,50);?>
" /></a>
</div>
<div style="float:left; height:30px; display:inline-block; padding:10px; width:300px">
<a target="_blank" href="index.php?module=CommissionProductAdmin&id=<?php echo $_smarty_tpl->tpl_vars['lot']->value->product_id;?>
">#<?php echo $_smarty_tpl->tpl_vars['lot']->value->order_num;?>
 - <?php echo $_smarty_tpl->tpl_vars['lot']->value->name;?>
</a>
</div>

<div style="clear:both"></div>

<?php } ?>

</div>

<div style="clear:both">
<?php echo $_smarty_tpl->getSubTemplate ('pagination.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>

</div>


<?php }?>

</div>





		
</form>
<!-- Основная форма (The End) -->
 




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

<?php }} ?>
