<?php /* Smarty version Smarty-3.1.18, created on 2016-10-27 02:05:33
         compiled from "simpla/design/html/auction.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2031254668581136bd9ade81-78132430%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc507280f73b6a4ca4476a787738c7faa67a33ee' => 
    array (
      0 => 'simpla/design/html/auction.tpl',
      1 => 1454788989,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2031254668581136bd9ade81-78132430',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'auction' => 0,
    'message_success' => 0,
    'message_error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_581136bda26fa8_82905034',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_581136bda26fa8_82905034')) {function content_581136bda26fa8_82905034($_smarty_tpl) {?>
<?php $_smarty_tpl->_capture_stack[0][] = array('tabs', null, null); ob_start(); ?>
	<li class="active"><a href="index.php?module=AuctionsAdmin">Аукционы</a></li>
	<li><a href="index.php?module=LotsAdmin">Лоты</a></li>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php if ($_smarty_tpl->tpl_vars['auction']->value->id) {?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable('Правка аукциона', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
<?php } else { ?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable('Новый аукцион', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
<?php }?>


<?php echo $_smarty_tpl->getSubTemplate ('tinymce_init.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>



<?php if ($_smarty_tpl->tpl_vars['message_success']->value) {?>
<!-- Системное сообщение -->
<div class="message message_success">
	<span class="text"><?php if ($_smarty_tpl->tpl_vars['message_success']->value=='added') {?>Аукцион добавлен<?php } elseif ($_smarty_tpl->tpl_vars['message_success']->value=='updated') {?>Аукцион обновлен<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['message_success']->value;?>
<?php }?></span>
	<a class="link" target="_blank" href="../auctions/<?php echo $_smarty_tpl->tpl_vars['auction']->value->url;?>
">Открыть аукцион на сайте</a>
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
	<span class="text"><?php if ($_smarty_tpl->tpl_vars['message_error']->value=='invalid_date') {?>
		Вы попытались создать парадокс во времени, указав дату начала позже даты завершения, Эйнштейн не одобряет такой подход!<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['message_error']->value;?>
<?php }?>
	</span>
</div>
<!-- Системное сообщение (The End)-->
<?php }?>


<!-- Основная форма -->
<form method=post id=product enctype="multipart/form-data">
<input type=hidden name="session_id" value="<?php echo $_SESSION['id'];?>
">
	<div id="name" style="display:none">
		<input class="name" name=name type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['auction']->value->name, ENT_QUOTES, 'UTF-8', true);?>
"/> 
		<input name=id type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['auction']->value->id, ENT_QUOTES, 'UTF-8', true);?>
"/> 
	</div> 

 		
	<!-- Левая колонка свойств товара -->
	<div id="column_left">
			
		<!-- Параметры страницы -->
		<div class="block layer">
			<h2>Параметры аукциона</h2>
			<ul>
				<li><label class="property">Дата открытия</label>
					<input name="date_start" class="simpla_inp" type="date" value="<?php echo $_smarty_tpl->tpl_vars['auction']->value->date_start;?>
">
					<input name="time_start" class="simpla_inp" type="time" value="<?php echo $_smarty_tpl->tpl_vars['auction']->value->time_start;?>
">
				</li>
				<li><label class="property">Дата закрытия первого лота</label>
					<input name="date_end" class="simpla_inp" type="date" value="<?php echo $_smarty_tpl->tpl_vars['auction']->value->date_end;?>
">
					<input name="time_end" class="simpla_inp" type="time" value="<?php echo $_smarty_tpl->tpl_vars['auction']->value->time_end;?>
">
				</li>
				<li><label class="property">Время на один лот</label>
					<input name="duration" class="simpla_inp" style="width:100px" type="number" value="<?php if ($_smarty_tpl->tpl_vars['auction']->value->duration>0) {?><?php echo $_smarty_tpl->tpl_vars['auction']->value->duration;?>
<?php } else { ?>5<?php }?>"> секунд</li>
				
			</ul>
		</div>
		<!-- Параметры страницы (The End)-->
		
			
	<input class="button_green button_save" type="submit" name="" value="Сохранить" />
	</div>
	<!-- Левая колонка свойств товара (The End)--> 
	

	

	<div class="block layer">
		<h2>Описание</h2>
		<textarea name="description" class="editor_large"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['auction']->value->description, ENT_QUOTES, 'UTF-8', true);?>
</textarea>
	</div>
	<!-- Описание  (The End)-->
	<input class="button_green button_save" type="submit" name="" value="Сохранить" />
	
	
</form>

<?php }} ?>
