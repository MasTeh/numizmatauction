<?php /* Smarty version Smarty-3.1.18, created on 2016-10-25 11:50:54
         compiled from "simpla/design/html/users.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1312894180580f1cee870979-21583018%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a3ae23904099efd352223d16f642cb5627b78cf0' => 
    array (
      0 => 'simpla/design/html/users.tpl',
      1 => 1475420520,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1312894180580f1cee870979-21583018',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'users' => 0,
    'keyword' => 0,
    'users_count' => 0,
    'sort' => 0,
    'user' => 0,
    'groups' => 0,
    'group' => 0,
    'g' => 0,
    'user_type' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_580f1ceeac7720_65985060',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_580f1ceeac7720_65985060')) {function content_580f1ceeac7720_65985060($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/home/u457006/numisrus.ru/www/Smarty/libs/plugins/modifier.truncate.php';
?>
<?php $_smarty_tpl->_capture_stack[0][] = array('tabs', null, null); ob_start(); ?>
	<li class="active"><a href="index.php?module=UsersAdmin">Пользователи</a></li>
	
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>


<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable('Пользователи', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>


<?php if ($_smarty_tpl->tpl_vars['users']->value||$_smarty_tpl->tpl_vars['keyword']->value) {?>
<form method="get">
<div id="search">
	<input type="hidden" name="module" value='UsersAdmin'>
	<input class="search" type="text" name="keyword" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['keyword']->value, ENT_QUOTES, 'UTF-8', true);?>
" />
	<input class="search_button" type="submit" value=""/>
</div>
</form>
<?php }?>


<div id="header">
	<?php if ($_smarty_tpl->tpl_vars['keyword']->value&&$_smarty_tpl->tpl_vars['users_count']->value>0) {?>
	<h1><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['plural'][0][0]->plural_modifier($_smarty_tpl->tpl_vars['users_count']->value,'Нашелся','Нашлось','Нашлись');?>
 <?php echo $_smarty_tpl->tpl_vars['users_count']->value;?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['plural'][0][0]->plural_modifier($_smarty_tpl->tpl_vars['users_count']->value,'пользователь','пользователей','пользователя');?>
</h1>
	<?php } elseif ($_smarty_tpl->tpl_vars['users_count']->value>0) {?>
	<h1><?php echo $_smarty_tpl->tpl_vars['users_count']->value;?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['plural'][0][0]->plural_modifier($_smarty_tpl->tpl_vars['users_count']->value,'пользователь','пользователей','пользователя');?>
</h1> 	
	<?php } else { ?>
	<h1>Нет пользователей</h1> 	
	<?php }?>
	
	<?php if ($_smarty_tpl->tpl_vars['users_count']->value>0) {?>
	<form method="post" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'ExportUsersAdmin'),$_smarty_tpl);?>
" target="_blank">
	<input type="hidden" name="session_id" value="<?php echo $_SESSION['id'];?>
">
	<input type="image" src="./design/images/export_excel.png" name="export" title="Экспортировать этих пользователей">
	</form>
	<?php }?>

<a class="add" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'UserAdmin','return'=>$_SERVER['REQUEST_URI']),$_smarty_tpl);?>
">Добавить пользователя</a>	
	
</div>

<?php if ($_smarty_tpl->tpl_vars['users']->value) {?>
<!-- Основная часть -->
<div id="main_list">

	<!-- Листалка страниц -->
	<?php echo $_smarty_tpl->getSubTemplate ('pagination.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
	
	<!-- Листалка страниц (The End) -->

	<div id="sort_links" style='display:block;'>
	<!-- Ссылки для сортировки -->
	Упорядочить по 
	<?php if ($_smarty_tpl->tpl_vars['sort']->value!='name') {?><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('sort'=>'name'),$_smarty_tpl);?>
">имени</a><?php } else { ?>имени<?php }?> или
	<?php if ($_smarty_tpl->tpl_vars['sort']->value!='date') {?><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('sort'=>'date'),$_smarty_tpl);?>
">дате</a><?php } else { ?>дате<?php }?>
	<!-- Ссылки для сортировки (The End) -->
	</div>

	<form id="form_list" method="post">
	<input type="hidden" name="session_id" value="<?php echo $_SESSION['id'];?>
">
	
		<div id="list">	
			<?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->_loop = true;
?>
			<div class="row" style="<?php if ($_smarty_tpl->tpl_vars['user']->value->group_id==2) {?>background-color:#e6f9d8;<?php } elseif ($_smarty_tpl->tpl_vars['user']->value->group_id==3) {?>opacity:0.3;<?php }?>">
		 		<div class="checkbox cell">
					<input type="checkbox" name="check[]" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>
"/>				
				</div>
				<div class="cell" style="padding:10px; width:220px; overflow:hidden">
					<?php if ($_smarty_tpl->tpl_vars['user']->value->bot==0) {?>
					<a href="index.php?module=UserAdmin&id=<?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>
">#<?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>
 <span style="font-weight:bold"><?php echo $_smarty_tpl->tpl_vars['user']->value->fam;?>
</span> <?php echo $_smarty_tpl->tpl_vars['user']->value->name;?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value->otch;?>
</a>
					<?php } else { ?>
					<a href="index.php?module=UserAdmin&id=<?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>
">#<?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>
 
					<?php echo $_smarty_tpl->tpl_vars['user']->value->fam;?>
 <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['user']->value->name,2,'.');?>
 <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['user']->value->otch,2,'.');?>
</a>
					<?php }?>
				</div>
				<div class="cell" style="padding:10px">
				<?php if ($_smarty_tpl->tpl_vars['user']->value->bot!=1) {?>
					<a href="mailto:<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value->name, ENT_QUOTES, 'UTF-8', true);?>
<<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value->email, ENT_QUOTES, 'UTF-8', true);?>
>">написать</a>	
				<?php } else { ?>
				robot
				<?php }?>
				</div>
				<div class="cell" style="padding:10px; width:150px; ">
					<?php if ($_smarty_tpl->tpl_vars['user']->value->seller) {?>Продавец<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['user']->value->seller&&$_smarty_tpl->tpl_vars['user']->value->buyer) {?>/ <?php }?>
					<?php if ($_smarty_tpl->tpl_vars['user']->value->buyer) {?>Покупатель<?php }?>
				</div>				
				<div class="cell" style="padding:10px">
					<?php if ($_smarty_tpl->tpl_vars['user']->value->deals_count>0) {?>sell <?php echo $_smarty_tpl->tpl_vars['user']->value->sells_count;?>
 / buy <?php echo $_smarty_tpl->tpl_vars['user']->value->buys_count;?>
<?php } else { ?>нет сделок<?php }?>
				</div>				
				<div class="cell" style="padding:10px">
					<?php echo $_smarty_tpl->tpl_vars['user']->value->cash;?>

				</div>						
				<div class="icons cell">
					<!-- <a class="enable" title="Активен" href="#"></a> -->
					<a class="delete" title="Удалить" href="#"></a>
				</div>
				<div class="clear"></div>
			</div>
			<?php } ?>
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
	<?php echo $_smarty_tpl->getSubTemplate ('pagination.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
	
	<!-- Листалка страниц (The End) -->

</div>
<?php }?>

 <!-- Меню -->
<div id="right_menu">

	<!-- Группы -->
	<?php if ($_smarty_tpl->tpl_vars['groups']->value) {?>
	<ul>
		<li <?php if (!$_smarty_tpl->tpl_vars['group']->value->id) {?>class="selected"<?php }?>><a href='index.php?module=UsersAdmin'>Весь список</a></li>		
		<?php  $_smarty_tpl->tpl_vars['g'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['g']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['g']->key => $_smarty_tpl->tpl_vars['g']->value) {
$_smarty_tpl->tpl_vars['g']->_loop = true;
?>
		<li <?php if ($_smarty_tpl->tpl_vars['group']->value->id==$_smarty_tpl->tpl_vars['g']->value->id) {?>class="selected"<?php }?>><a href="index.php?module=UsersAdmin&group_id=<?php echo $_smarty_tpl->tpl_vars['g']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['g']->value->name;?>
</a></li>
		<?php } ?>
	</ul>
	<?php }?>
	<!-- Группы (The End)-->

	<ul>
		<li <?php if (!$_smarty_tpl->tpl_vars['user_type']->value) {?>class="selected"<?php }?>><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('user_type'=>null),$_smarty_tpl);?>
">Обе категории</a></li>
		<li <?php if ($_smarty_tpl->tpl_vars['user_type']->value==1) {?>class="selected"<?php }?>><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('user_type'=>1),$_smarty_tpl);?>
">Продавцы</a></li>
		<li <?php if ($_smarty_tpl->tpl_vars['user_type']->value==2) {?>class="selected"<?php }?>><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('user_type'=>2),$_smarty_tpl);?>
">Покупатели</a></li>
	</ul>	
		
</div>
<!-- Меню  (The End) -->



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
			data: {'object': 'user', 'id': id, 'values': {'enabled': state}, 'session_id': '<?php echo $_SESSION['id'];?>
'},
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

<?php }} ?>
