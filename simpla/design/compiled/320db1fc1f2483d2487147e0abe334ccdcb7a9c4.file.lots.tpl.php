<?php /* Smarty version Smarty-3.1.18, created on 2016-11-03 04:07:23
         compiled from "simpla/design/html/lots.tpl" */ ?>
<?php /*%%SmartyHeaderCode:474317409581135f8b7f1a8-88999396%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '320db1fc1f2483d2487147e0abe334ccdcb7a9c4' => 
    array (
      0 => 'simpla/design/html/lots.tpl',
      1 => 1478135239,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '474317409581135f8b7f1a8-88999396',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_581135f8cf1005_03419521',
  'variables' => 
  array (
    'current_auction' => 0,
    'keyword' => 0,
    'products_count' => 0,
    'message_error' => 0,
    'categories' => 0,
    'c' => 0,
    'lots' => 0,
    'lot' => 0,
    'image' => 0,
    'currency' => 0,
    'filter' => 0,
    'auctions' => 0,
    'a' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_581135f8cf1005_03419521')) {function content_581135f8cf1005_03419521($_smarty_tpl) {?>
<?php $_smarty_tpl->_capture_stack[0][] = array('tabs', null, null); ob_start(); ?>
	<li><a href="index.php?module=AuctionsAdmin">Аукционы</a></li>
	<li class="active"><a href="index.php?module=LotsAdmin">Лоты</a></li>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>


<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable('Лоты', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>


<form method="get">
<div id="search">
	<input type="hidden" name="module" value="LotsAdmin">
	<input type="hidden" name="current_auction" value="<?php echo $_smarty_tpl->tpl_vars['current_auction']->value;?>
">
	<input class="search" type="text" name="keyword" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['keyword']->value, ENT_QUOTES, 'UTF-8', true);?>
" />
	<input class="search_button" type="submit" value=""/>
</div>
</form>



<div id="header">
	<?php if ($_smarty_tpl->tpl_vars['products_count']->value) {?>
		<?php if ($_smarty_tpl->tpl_vars['keyword']->value) {?>
			<h1><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['plural'][0][0]->plural_modifier($_smarty_tpl->tpl_vars['products_count']->value,'Найден','Найдено','Найдено');?>
 <?php echo $_smarty_tpl->tpl_vars['products_count']->value;?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['plural'][0][0]->plural_modifier($_smarty_tpl->tpl_vars['products_count']->value,'лот','лотов','лота');?>
</h1>
		<?php } else { ?>
			<h1><?php echo $_smarty_tpl->tpl_vars['products_count']->value;?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['plural'][0][0]->plural_modifier($_smarty_tpl->tpl_vars['products_count']->value,'лот','лотов','лота');?>
</h1>
		<?php }?>		
	<?php } else { ?>
		<h1>Нет лотов</h1>
	<?php }?>
</div>	

<?php if ($_smarty_tpl->tpl_vars['message_error']->value) {?>
<!-- Системное сообщение -->
<div class="message message_error">
	<span class="text">
	</span>
</div>
<!-- Системное сообщение (The End)-->
<?php }?>

<input type=hidden name="session_id" value="<?php echo $_SESSION['id'];?>
">


<div id="main_list">


<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->_loop = true;
?>
<a style="display:inline-block; padding:6px; <?php if ($_smarty_tpl->tpl_vars['c']->value->id==$_GET['category_id']) {?>background:#fff; border:1px dotted #000; font-weight:bold<?php }?>" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('category_id'=>$_smarty_tpl->tpl_vars['c']->value->id),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['c']->value->name;?>
</a>
<?php } ?>
<div style="height:30px"></div>		
	
<?php if ($_smarty_tpl->tpl_vars['lots']->value) {?>
<form id="list_form" method="post">
	<input type="hidden" name="session_id" value="<?php echo $_SESSION['id'];?>
">

	<!-- Листалка страниц -->
	<?php echo $_smarty_tpl->getSubTemplate ('pagination.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
	
	<!-- Листалка страниц (The End) -->
	
		<div id="list">
		<?php  $_smarty_tpl->tpl_vars['lot'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['lot']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lots']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['lot']->key => $_smarty_tpl->tpl_vars['lot']->value) {
$_smarty_tpl->tpl_vars['lot']->_loop = true;
?>
		<div class="row <?php if ($_smarty_tpl->tpl_vars['lot']->value->featured) {?>featured<?php }?>" <?php if ($_smarty_tpl->tpl_vars['lot']->value->status==2) {?> style="background:#fffeb1" <?php } elseif ($_smarty_tpl->tpl_vars['lot']->value->status==3) {?> style="background:#b1ffc2" <?php } elseif ($_smarty_tpl->tpl_vars['lot']->value->status==4) {?> style="background:#ffd3d3" <?php }?>>
			<input type="hidden" name="positions[<?php echo $_smarty_tpl->tpl_vars['lot']->value->lot_id;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['lot']->value->lot_id;?>
">
			<div class="move cell"><div class="move_zone"></div></div>
	 		<div class="checkbox cell">
				<input type="checkbox" name="check[]" value="<?php echo $_smarty_tpl->tpl_vars['lot']->value->lot_id;?>
"/>				
			</div>
			<div class="image cell">
				<?php $_smarty_tpl->tpl_vars['image'] = new Smarty_variable($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['first'][0][0]->first_modifier($_smarty_tpl->tpl_vars['lot']->value->images), null, 0);?>
				<?php if ($_smarty_tpl->tpl_vars['image']->value) {?>
				<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'LotAdmin','id'=>$_smarty_tpl->tpl_vars['lot']->value->lot_id,'return'=>$_SERVER['REQUEST_URI']),$_smarty_tpl);?>
"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier(htmlspecialchars($_smarty_tpl->tpl_vars['image']->value->filename, ENT_QUOTES, 'UTF-8', true),35,35);?>
" /></a>
				<?php }?>
			</div>

			<div class="name product_name cell">
			 	
			 	<div class="variants">
			 	<ul>
				
				<li>
					<span style="font-size:14px">
					<?php echo number_format($_smarty_tpl->tpl_vars['lot']->value->price,0,"."," ");?>
 <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
  
					</span>
				</li>
				
				</ul>
				</div>
				
				<div style="float:left; margin-right:10px; width:80px">
					<b># <?php echo $_smarty_tpl->tpl_vars['lot']->value->order_num;?>
</b>
				</div>
				<a style="display:inline-block;width:200px" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'CommissionProductAdmin','id'=>$_smarty_tpl->tpl_vars['lot']->value->product_id,'return'=>$_SERVER['REQUEST_URI']),$_smarty_tpl);?>
">
					 <?php echo $_smarty_tpl->tpl_vars['lot']->value->name;?>
</a>

				
			
	 			
			</div>



			<div class="icons cell">
				
				<a class="featured"  title="Выводить на главной"     href="#"></a>
				<?php if ($_smarty_tpl->tpl_vars['lot']->value->status==1) {?>
				<a class="delete"    title="Вернуть на комиссию"     href="#"></a>
				<?php }?>
			</div>
			
			<div class="clear"></div>
		</div>
		<?php } ?>
		</div>

	<!-- Листалка страниц -->
	<?php echo $_smarty_tpl->getSubTemplate ('pagination.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
	
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
<?php } else { ?>

Нет лотов

<?php }?>




</div>

<!-- Меню -->
<div id="right_menu">
	
	<!-- Фильтры -->
	<ul>
		<li <?php if (!$_smarty_tpl->tpl_vars['filter']->value) {?>class="selected"<?php }?>>
			<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('keyword'=>null,'page'=>null,'filter'=>null),$_smarty_tpl);?>
">Все лоты</a></li>

		<li <?php if ($_smarty_tpl->tpl_vars['filter']->value=='1') {?>class="selected"<?php }?>>
			<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('filter'=>'1'),$_smarty_tpl);?>
">Готовятся к торгам</a></li>

		<li <?php if ($_smarty_tpl->tpl_vars['filter']->value=='2') {?>class="selected"<?php }?>>
			<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('filter'=>'2'),$_smarty_tpl);?>
">На торгах</a></li>

		<li <?php if ($_smarty_tpl->tpl_vars['filter']->value=='3') {?>class="selected"<?php }?>>
			<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('filter'=>'3'),$_smarty_tpl);?>
">Ожидают оплаты покупателем</a></li>

		<li <?php if ($_smarty_tpl->tpl_vars['filter']->value=='4') {?>class="selected"<?php }?>>
			<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('filter'=>'4'),$_smarty_tpl);?>
">Лот продан и оплачен</a></li>

		<li <?php if ($_smarty_tpl->tpl_vars['filter']->value=='5') {?>class="selected"<?php }?>>
			<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('filter'=>'5'),$_smarty_tpl);?>
">Лот не продан</a></li>									


	</ul>
	<!-- Фильтры -->



	<?php if ($_smarty_tpl->tpl_vars['auctions']->value) {?>
	<ul>
		<li <?php if (!$_smarty_tpl->tpl_vars['current_auction']->value) {?>class="selected"<?php }?>>
			<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('keyword'=>null,'current_auction'=>null),$_smarty_tpl);?>
">Все аукционы</a>
		</li>

		<?php  $_smarty_tpl->tpl_vars['a'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['a']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['auctions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['a']->key => $_smarty_tpl->tpl_vars['a']->value) {
$_smarty_tpl->tpl_vars['a']->_loop = true;
?>
		<li <?php if ($_smarty_tpl->tpl_vars['current_auction']->value==$_smarty_tpl->tpl_vars['a']->value->id) {?>class="selected"<?php }?>>
			<a href='<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['a']->value->id;?>
<?php $_tmp1=ob_get_clean();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('keyword'=>null,'current_auction'=>$_tmp1),$_smarty_tpl);?>
'>Аукцион № <?php echo $_smarty_tpl->tpl_vars['a']->value->id;?>
, <?php echo $_smarty_tpl->tpl_vars['a']->value->date_label1;?>
 - <?php echo $_smarty_tpl->tpl_vars['a']->value->date_label2;?>
</a>
		</li>
		<?php } ?>
	</ul>
	<?php }?>
	
</div>
<!-- Меню  (The End) -->


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
			data: {'object': 'lots', 'id': id, 'values': {'featured': state}, 'session_id': '<?php echo $_SESSION['id'];?>
'},
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

<?php }} ?>
