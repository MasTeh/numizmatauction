<?php /* Smarty version Smarty-3.1.18, created on 2016-10-29 21:10:32
         compiled from "simpla/design/html/lot_view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12791338455814e6188a7024-95035146%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a6597fba24e6d60e17cecef8fdd19a6774d2544c' => 
    array (
      0 => 'simpla/design/html/lot_view.tpl',
      1 => 1476791672,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12791338455814e6188a7024-95035146',
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
    'product' => 0,
    'lot' => 0,
    'categories' => 0,
    'product_categories' => 0,
    'category' => 0,
    'selected_id' => 0,
    'level' => 0,
    'product_category' => 0,
    'users' => 0,
    'u' => 0,
    'product_images' => 0,
    'image' => 0,
    'product_variants' => 0,
    'bet' => 0,
    'winner' => 0,
  ),
  'has_nocache_code' => 0,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5814e618b31b24_13794635',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5814e618b31b24_13794635')) {function content_5814e618b31b24_13794635($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/home/u457006/numisrus.ru/www/Smarty/libs/plugins/modifier.truncate.php';
?> 	<div style="font-size:22px; width:100%; padding:10px; margin-bottom:30px; background:#fff; border:1px solid #dadada">
		<div style="display:inline-block">
		Название лота: <span style="color:#079c00 !important"><?php echo $_smarty_tpl->tpl_vars['product']->value->name;?>
</span> 
		
			(# <?php echo $_smarty_tpl->tpl_vars['lot']->value->order_num;?>
)

		</div>
		<div style="float:right; display:inline-block; font-size:16px; padding:5px">
			<a target="_blank" href="../lot/<?php echo $_smarty_tpl->tpl_vars['lot']->value->id;?>
">открыть на сайте</a>
		</div>

	</div> 
	<div style="float:left"></div>
	<div style="width:45%; display:inline-block; float:left">
		<div id="product_categories" <?php if (!$_smarty_tpl->tpl_vars['categories']->value) {?>style='display:none;'<?php }?>>
			<label>Категория</label>
			<div>
				<ul>
					<?php  $_smarty_tpl->tpl_vars['product_category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product_category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product_categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product_category']->key => $_smarty_tpl->tpl_vars['product_category']->value) {
$_smarty_tpl->tpl_vars['product_category']->_loop = true;
?>
					<li>
						<select name="categories[]" disabled>
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
											
					</li>
					<?php } ?>		
				</ul>
			</div>
		</div>
	</div>
	<div style="width:45%; display:inline-block; float:left">
		<div class="admin_list admin_selected_block">
			<?php if ($_smarty_tpl->tpl_vars['users']->value) {?>

			<label style="font-weight:bold;padding:0px 10px">Продавец</label>

			<?php  $_smarty_tpl->tpl_vars['u'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['u']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['u']->key => $_smarty_tpl->tpl_vars['u']->value) {
$_smarty_tpl->tpl_vars['u']->_loop = true;
?>	   		
			<?php if ($_smarty_tpl->tpl_vars['u']->value->id==$_smarty_tpl->tpl_vars['product']->value->user_id) {?>
		    <a href="index.php?module=UserAdmin&id=<?php echo $_smarty_tpl->tpl_vars['u']->value->id;?>
" target="_blank" style="font-size:18px">(# <?php echo $_smarty_tpl->tpl_vars['u']->value->id;?>
) <?php echo $_smarty_tpl->tpl_vars['u']->value->fam;?>
 <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['u']->value->name,1,'');?>
. <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['u']->value->otch,1,'');?>
.</a>
		    <?php }?>
		    <?php } ?>
			



			<?php }?>	

		</div>
	</div>

	<div style="float:left"></div>



	
	<div id="column_left" style="width:260px;">
		
		<!-- Изображения товара -->	
		<div class="block layer images">
			<h2>Изображения товара
			</h2>
			<ul><?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product_images']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
?><li>					
					<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['image']->value->filename,500,500);?>
" target="_blank"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['image']->value->filename,200,200);?>
" alt="" /></a>
				</li><?php } ?></ul>

		</div>


	</div>

	<div id="column_right">

		<div class="block layer" style="width:660px" <?php if (!$_smarty_tpl->tpl_vars['categories']->value) {?>style='display:none;'<?php }?>>
			<h2>Свойства товара			
			</h2>

		<div>
		<div style="width:285px; display:inline-block; font-size:14px; padding:6px; border-bottom:1px dotted #ccc">Год</div>
		<div style="width:270px; display:inline-block; font-size:14px; padding:6px; border-bottom:1px dotted #717171"><?php echo $_smarty_tpl->tpl_vars['product']->value->prop_year;?>
</div>
		</div>
		<div>
		<div style="width:285px; display:inline-block; font-size:14px; padding:6px; border-bottom:1px dotted #ccc">Сохранность</div>
		<div style="width:270px; display:inline-block; font-size:14px; padding:6px; border-bottom:1px dotted #717171"><?php echo $_smarty_tpl->tpl_vars['product']->value->prop_save;?>
</div>
		</div>
		<div>
		<div style="width:285px; display:inline-block; font-size:14px; padding:6px; border-bottom:1px dotted #ccc">Материал</div>
		<div style="width:270px; display:inline-block; font-size:14px; padding:6px; border-bottom:1px dotted #717171"><?php echo $_smarty_tpl->tpl_vars['product']->value->prop_material;?>
</div>
		</div>
		<div>
		<div style="width:285px; display:inline-block; font-size:14px; padding:6px; border-bottom:1px dotted #ccc">Буквы</div>
		<div style="width:270px; display:inline-block; font-size:14px; padding:6px; border-bottom:1px dotted #717171"><?php echo $_smarty_tpl->tpl_vars['product']->value->prop_letters;?>
</div>
		</div>	
		<div>
		<div style="width:285px; display:inline-block; font-size:14px; padding:6px; border-bottom:1px dotted #ccc">Вес</div>
		<div style="width:270px; display:inline-block; font-size:14px; padding:6px; border-bottom:1px dotted #717171"><?php echo $_smarty_tpl->tpl_vars['product']->value->prop_weight;?>
 грамм</div>
		</div>								
		
		</div>
		
		<!-- Свойства товара (The End)-->


		<div class="block layer" style="width:660px; margin-top:30px">
			<h2>Торги 
				<?php if ($_smarty_tpl->tpl_vars['lot']->value->status==1) {?>(не начинались)
				<?php } elseif ($_smarty_tpl->tpl_vars['lot']->value->status==2) {?>(идут)
				<?php } elseif ($_smarty_tpl->tpl_vars['lot']->value->status==3) {?>(закончились)
				<?php } elseif ($_smarty_tpl->tpl_vars['lot']->value->status==4) {?>(лот не продан)
				<?php }?>
			</h2>
			
			<div>
			<div style="width:285px; display:inline-block; font-size:14px; padding:6px; border-bottom:1px dotted #ccc">
				Минимальная отпускная цена
			</div>
			<div style="width:270px; display:inline-block; font-size:14px; padding:6px; border-bottom:1px dotted #717171">
				<?php echo number_format($_smarty_tpl->tpl_vars['product_variants']->value[0]->price,0,"."," ");?>
 руб</div>
			</div>			
			
			<?php if ($_smarty_tpl->tpl_vars['lot']->value->bets) {?>
			<?php  $_smarty_tpl->tpl_vars['bet'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['bet']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lot']->value->bets; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['bet']->key => $_smarty_tpl->tpl_vars['bet']->value) {
$_smarty_tpl->tpl_vars['bet']->_loop = true;
?>

			<div>
			<div style="width:285px; display:inline-block; font-size:14px; padding:6px; border-bottom:1px dotted #ccc">
				<a target="_blank" href="index.php?UserAdmin&id=<?php echo $_smarty_tpl->tpl_vars['bet']->value->user->id;?>
">(#<?php echo $_smarty_tpl->tpl_vars['bet']->value->user->id;?>
) <?php echo $_smarty_tpl->tpl_vars['bet']->value->user->fam;?>
 <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['bet']->value->user->name,1,'');?>
. <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['bet']->value->user->otch,1,'');?>
.</a>
			</div>
			<div style="width:270px; display:inline-block; font-size:14px; padding:6px; border-bottom:1px dotted #717171">
				<?php echo number_format($_smarty_tpl->tpl_vars['bet']->value->value,0,"."," ");?>
 руб</div>
			</div>				

			<?php } ?>
			<?php }?>

			<br><br>

			<?php if ($_smarty_tpl->tpl_vars['winner']->value->value>0) {?>
			<div style="padding:10px; background:#b0ffc1">
			<h3>Конечная цена <?php echo number_format($_smarty_tpl->tpl_vars['winner']->value->value,0,".",",");?>
 руб, победитель: 
			<a target="_blank" href="index.php?module=UserAdmin&id=<?php echo $_smarty_tpl->tpl_vars['winner']->value->user->id;?>
">
				(#<?php echo $_smarty_tpl->tpl_vars['winner']->value->user->id;?>
) <?php echo $_smarty_tpl->tpl_vars['winner']->value->user->fam;?>
 <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['winner']->value->user->name,1,'');?>
. <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['winner']->value->user->otch,1,'');?>
.
			</a> <!-- <a href="<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['winner']->value->id;?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['winner']->value->user->id;?>
<?php $_tmp2=ob_get_clean();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('lot_action'=>'to_order','to_lot_id'=>$_tmp1,'to_user_id'=>$_tmp2),$_smarty_tpl);?>
">передать в сделки</a> -->
			</h3>
			</div>
			<?php }?>

		</div>


	</div>

<?php }} ?>
