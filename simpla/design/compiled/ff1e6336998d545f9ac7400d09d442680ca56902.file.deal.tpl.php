<?php /* Smarty version Smarty-3.1.18, created on 2016-10-26 10:52:19
         compiled from "simpla/design/html/deal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1098847011581060b3c2e804-75133348%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ff1e6336998d545f9ac7400d09d442680ca56902' => 
    array (
      0 => 'simpla/design/html/deal.tpl',
      1 => 1476721265,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1098847011581060b3c2e804-75133348',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'status' => 0,
    'keyword' => 0,
    'order' => 0,
    'prev_order' => 0,
    'next_order' => 0,
    'message_error' => 0,
    'message_success' => 0,
    'user' => 0,
    'labels' => 0,
    'l' => 0,
    'order_labels' => 0,
    'purchases' => 0,
    'purchase' => 0,
    'image' => 0,
    'currency' => 0,
    'subtotal' => 0,
    'deliveries' => 0,
    'd' => 0,
    'delivery' => 0,
    'payment_methods' => 0,
    'pm' => 0,
    'payment_method' => 0,
    'settings' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_581060b4346188_20960601',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_581060b4346188_20960601')) {function content_581060b4346188_20960601($_smarty_tpl) {?>
<?php $_smarty_tpl->_capture_stack[0][] = array('tabs', null, null); ob_start(); ?>
	<li <?php if ($_smarty_tpl->tpl_vars['status']->value===0) {?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'DealsAdmin','status'=>0,'keyword'=>null,'id'=>null,'page'=>null,'label'=>null),$_smarty_tpl);?>
">Выйгран</a></li>
	<li <?php if ($_smarty_tpl->tpl_vars['status']->value==1) {?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'DealsAdmin','status'=>1,'keyword'=>null,'id'=>null,'page'=>null,'label'=>null),$_smarty_tpl);?>
">Ждёт оплаты</a></li>
	<li <?php if ($_smarty_tpl->tpl_vars['status']->value==2) {?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'DealsAdmin','status'=>2,'keyword'=>null,'id'=>null,'page'=>null,'label'=>null),$_smarty_tpl);?>
">Выдан покупателю</a></li>
	<li <?php if ($_smarty_tpl->tpl_vars['status']->value==3) {?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'DealsAdmin','status'=>3,'keyword'=>null,'id'=>null,'page'=>null,'label'=>null),$_smarty_tpl);?>
">Возвращен</a></li>
	<?php if ($_smarty_tpl->tpl_vars['keyword']->value) {?>
	<li class="active"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'DealsAdmin','keyword'=>$_smarty_tpl->tpl_vars['keyword']->value,'id'=>null,'label'=>null),$_smarty_tpl);?>
">Поиск</a></li>
	<?php }?>
	
	<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'DealsLabelsAdmin','keyword'=>null,'id'=>null,'page'=>null,'label'=>null),$_smarty_tpl);?>
">Метки</a></li>
	
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>


<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable("Сделка №".((string)$_smarty_tpl->tpl_vars['order']->value->id), null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>

<!-- Основная форма -->
<form method=post id=order enctype="multipart/form-data">
<input type=hidden name="session_id" value="<?php echo $_SESSION['id'];?>
">

<input type=hidden name="lot_id" value="<?php echo $_smarty_tpl->tpl_vars['order']->value->lot_id;?>
">

<div id="name">
	<input name=id type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->id, ENT_QUOTES, 'UTF-8', true);?>
"/> 
	<h1><?php if ($_smarty_tpl->tpl_vars['order']->value->id) {?>Сделка №<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
<?php }?>
	<select class=status name="status">
		<option value='0' <?php if ($_smarty_tpl->tpl_vars['order']->value->status==0) {?>selected<?php }?>>Выйгран</option>
		<option value='1' <?php if ($_smarty_tpl->tpl_vars['order']->value->status==1) {?>selected<?php }?>>Ждёт оплаты</option>
		<option value='2' <?php if ($_smarty_tpl->tpl_vars['order']->value->status==2) {?>selected<?php }?>>Выдан покупателю</option>
		<option value='3' <?php if ($_smarty_tpl->tpl_vars['order']->value->status==3) {?>selected<?php }?>>Возвращен</option>
	</select>
	</h1>
	<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('view'=>'print','id'=>$_smarty_tpl->tpl_vars['order']->value->id),$_smarty_tpl);?>
" target="_blank"><img src="./design/images/printer.png" name="export" title="Печать информации"></a>


	<div id=next_order>
		<?php if ($_smarty_tpl->tpl_vars['prev_order']->value) {?>
		<a class=prev_order href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('id'=>$_smarty_tpl->tpl_vars['prev_order']->value->id),$_smarty_tpl);?>
">←</a>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['next_order']->value) {?>
		<a class=next_order href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('id'=>$_smarty_tpl->tpl_vars['next_order']->value->id),$_smarty_tpl);?>
">→</a>
		<?php }?>
	</div>
		
</div> 


<?php if ($_smarty_tpl->tpl_vars['message_error']->value) {?>
<!-- Системное сообщение -->
<div class="message message_error">
	<span class="text"><?php echo $_smarty_tpl->tpl_vars['message_error']->value;?>
</span>
	<?php if ($_GET['return']) {?>
	<a class="button" href="<?php echo $_GET['return'];?>
">Назад к списку заказов</a>
	<?php }?>
</div>
<!-- Системное сообщение (The End)-->
<?php } elseif ($_smarty_tpl->tpl_vars['message_success']->value) {?>
<!-- Системное сообщение -->
<div class="message message_success">
	<span class="text"><?php if ($_smarty_tpl->tpl_vars['message_success']->value=='updated') {?>Заказ обновлен<?php } elseif ($_smarty_tpl->tpl_vars['message_success']->value=='added') {?>Заказ добавлен<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['message_success']->value;?>
<?php }?></span>
	<?php if ($_GET['return']) {?>
	<a class="button" href="<?php echo $_GET['return'];?>
">Вернуться</a>
	<?php }?>
</div>
<!-- Системное сообщение (The End)-->
<?php }?>



<div id="order_details">
	<h2>Покупатель</h2>
	
	<div id="user">
	<ul class="order_details" <?php if ($_smarty_tpl->tpl_vars['user']->value->bot) {?>style="background:#f9eaea"<?php }?>>
		<li>
			<label class=property>Дата выйгрыша</label>
			<div class="edit_order_detail view_order_detail">
			<?php echo $_smarty_tpl->tpl_vars['order']->value->date;?>
 <?php echo $_smarty_tpl->tpl_vars['order']->value->time;?>

			</div>
		</li>
		<li>
			<label class=property>Личный номер пользователя</label>
			<div class="edit_order_detail view_order_detail">
			#<?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>
 <a target="_blank" href='index.php?module=UserAdmin&id=<?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>
' target='_blank'>открыть профиль</a>
			</div>
		</li>	
		<?php if ($_smarty_tpl->tpl_vars['user']->value->bot) {?>	
		<li>
			<div class="view_order_detail">
				<b>Это бот</b>
			</div>
		</li>
		<?php } else { ?>
		<li>
			<label class=property>Имя</label> 
			<div class="view_order_detail">
				<?php echo $_smarty_tpl->tpl_vars['user']->value->name;?>

			</div>
		</li>
		<li>
			<label class=property>Фамилия</label> 
			<div class="view_order_detail">
				<?php echo $_smarty_tpl->tpl_vars['user']->value->fam;?>

			</div>
		</li>
		<li>
			<label class=property>Отчество</label> 
			<div class="view_order_detail">
				<?php echo $_smarty_tpl->tpl_vars['user']->value->otch;?>

			</div>
		</li>				
		<li>
			<label class=property>Email</label>
			<div class="view_order_detail">
				<a href="mailto:<?php echo $_smarty_tpl->tpl_vars['user']->value->email;?>
"><?php echo $_smarty_tpl->tpl_vars['user']->value->email;?>
</a>
			</div>
		</li>
		<li>
			<label class=property>Телефон</label>
			<div class="view_order_detail">
				<?php if ($_smarty_tpl->tpl_vars['user']->value->phone) {?>
				<span class="ip_call" data-phone="<?php echo $_smarty_tpl->tpl_vars['user']->value->phone;?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['user']->value->phone;?>
</span><?php } else { ?><?php echo $_smarty_tpl->tpl_vars['user']->value->phone;?>
<?php }?>
			</div>
		</li>
		<li>
			<label class=property>Адрес</label>
			<div class="view_order_detail">
			<a href="http://maps.yandex.ru/?text=Россия, <?php echo $_smarty_tpl->tpl_vars['user']->value->city;?>
, <?php echo $_smarty_tpl->tpl_vars['user']->value->street;?>
, <?php echo $_smarty_tpl->tpl_vars['user']->value->number;?>
 <?php if ($_smarty_tpl->tpl_vars['user']->value->housing) {?> / <?php echo $_smarty_tpl->tpl_vars['user']->value->housing;?>
<?php }?>, <?php echo $_smarty_tpl->tpl_vars['user']->value->office;?>
" target="_blank">
			г. <?php echo $_smarty_tpl->tpl_vars['user']->value->city;?>
, ул. <?php echo $_smarty_tpl->tpl_vars['user']->value->street;?>
, д. <?php echo $_smarty_tpl->tpl_vars['user']->value->number;?>
 <?php if ($_smarty_tpl->tpl_vars['user']->value->housing) {?>, корпус <?php echo $_smarty_tpl->tpl_vars['user']->value->housing;?>
<?php }?>, <?php echo $_smarty_tpl->tpl_vars['user']->value->office;?>

			</a>
			</div>
		</li>
		<?php }?>		


	</ul>
	</div>

	<div class='layer'>
	<h2>Продавец</h2>
		<div class='view_user' style="font-weight:bold">

			#<?php echo $_smarty_tpl->tpl_vars['order']->value->seller_user->id;?>

			<a href='index.php?module=UserAdmin&id=<?php echo $_smarty_tpl->tpl_vars['order']->value->seller_user->id;?>
' target='_blank'>

			<?php echo $_smarty_tpl->tpl_vars['order']->value->seller_user->fam;?>
 <?php echo $_smarty_tpl->tpl_vars['order']->value->seller_user->name;?>
 <?php echo $_smarty_tpl->tpl_vars['order']->value->seller_user->otch;?>


			</a>

		</div>

	</div>	

	
	<?php if ($_smarty_tpl->tpl_vars['labels']->value) {?>
	<div class='layer'>
	<h2>Метка</h2>
	<!-- Метки -->
	<ul>
		<?php  $_smarty_tpl->tpl_vars['l'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['l']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['labels']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['l']->key => $_smarty_tpl->tpl_vars['l']->value) {
$_smarty_tpl->tpl_vars['l']->_loop = true;
?>
		<li>
		<label for="label_<?php echo $_smarty_tpl->tpl_vars['l']->value->id;?>
">
		<input id="label_<?php echo $_smarty_tpl->tpl_vars['l']->value->id;?>
" type="checkbox" name="order_labels[]" value="<?php echo $_smarty_tpl->tpl_vars['l']->value->id;?>
" <?php if (in_array($_smarty_tpl->tpl_vars['l']->value->id,$_smarty_tpl->tpl_vars['order_labels']->value)) {?>checked<?php }?>>
		<span style="background-color:#<?php echo $_smarty_tpl->tpl_vars['l']->value->color;?>
;" class="order_label"></span>
		<?php echo $_smarty_tpl->tpl_vars['l']->value->name;?>

		</label>
		</li>
		<?php } ?>
	</ul>
	<!-- Метки -->
	</div>
	<?php }?>

	

	

	
	<div class='layer'>
	<h2>Примечание <a href='#' class="edit_note"><img src='design/images/pencil.png' alt='Редактировать' title='Редактировать'></a></h2>
	<ul class="order_details">
		<li>
			<div class="edit_note" style='display:none;'>
				<label class=property>Ваше примечание (не видно пользователю)</label>
				<textarea name="note"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->note, ENT_QUOTES, 'UTF-8', true);?>
</textarea>
			</div>
			<div class="view_note" <?php if (!$_smarty_tpl->tpl_vars['order']->value->note) {?>style='display:none;'<?php }?>>
				<label class=property>Ваше примечание (не видно пользователю)</label>
				<div class="note_text"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->note, ENT_QUOTES, 'UTF-8', true);?>
</div>
			</div>
		</li>
	</ul>
	</div>
		
</div>


<div id="purchases">
 
	<div id="list" class="purchases">
		<?php  $_smarty_tpl->tpl_vars['purchase'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['purchase']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['purchases']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['purchase']->key => $_smarty_tpl->tpl_vars['purchase']->value) {
$_smarty_tpl->tpl_vars['purchase']->_loop = true;
?>
		<div class="row">
			<div class="image cell">
				<input type=hidden name=purchases[id][<?php echo $_smarty_tpl->tpl_vars['purchase']->value->id;?>
] value='<?php echo $_smarty_tpl->tpl_vars['purchase']->value->id;?>
'>
				<?php $_smarty_tpl->tpl_vars['image'] = new Smarty_variable($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['first'][0][0]->first_modifier($_smarty_tpl->tpl_vars['purchase']->value->product->images), null, 0);?>
				<?php if ($_smarty_tpl->tpl_vars['image']->value) {?>
				<img class=product_icon src='<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['image']->value->filename,35,35);?>
'>
				<?php }?>
			</div>
			<div class="purchase_name cell">
			
				<div class='purchase_variant'>				

				<span class=view_purchase>
					<?php echo $_smarty_tpl->tpl_vars['purchase']->value->variant_name;?>
 <?php if ($_smarty_tpl->tpl_vars['purchase']->value->sku) {?>(арт. <?php echo $_smarty_tpl->tpl_vars['purchase']->value->sku;?>
)<?php }?>			
				</span>
				</div>
		
				<?php if ($_smarty_tpl->tpl_vars['purchase']->value->product) {?>
				<a class="related_product_name" href="index.php?module=CommissionProductAdmin&id=<?php echo $_smarty_tpl->tpl_vars['purchase']->value->product->id;?>
&return=<?php echo urlencode($_SERVER['REQUEST_URI']);?>
"><?php echo $_smarty_tpl->tpl_vars['purchase']->value->product_name;?>
</a>
				<?php } else { ?>
				<?php echo $_smarty_tpl->tpl_vars['purchase']->value->product_name;?>
				
				<?php }?>
			</div>
			<div class="price cell">

			</div>
			<div class="amount cell">			
				<span class=view_purchase><?php echo number_format($_smarty_tpl->tpl_vars['purchase']->value->price,0,".",",");?>
</span>
				<?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>

			
			</div>
			<div class="icons cell">		

				<!-- <a href='#' class="delete" title="Удалить"></a>		 -->
			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>
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
				<input type=text name=purchases[price][] value='' size=5> <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>

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



	<?php if ($_smarty_tpl->tpl_vars['purchases']->value) {?>
	<div class="subtotal">
	Стоимость лота<b> <?php echo number_format($_smarty_tpl->tpl_vars['subtotal']->value,0,".",",");?>
 руб</b>
	</div>
	<?php }?>

	<br><br>

	<div class="subtotal layer">
	Комиссия организатора (<?php echo ($_smarty_tpl->tpl_vars['order']->value->seller_user->commission+$_smarty_tpl->tpl_vars['user']->value->commission);?>
%)<b> 

	<?php echo number_format(($_smarty_tpl->tpl_vars['subtotal']->value*$_smarty_tpl->tpl_vars['order']->value->seller_user->commission/100+$_smarty_tpl->tpl_vars['subtotal']->value*$_smarty_tpl->tpl_vars['user']->value->commission/100),0,".",",");?>
 руб</b>

	</div> 

	<div class="subtotal layer">
	Выплата продавцу<b> <?php echo number_format(($_smarty_tpl->tpl_vars['subtotal']->value-($_smarty_tpl->tpl_vars['subtotal']->value*$_smarty_tpl->tpl_vars['order']->value->seller_user->commission/100)),0,".",",");?>
 руб</b>
	</div> 	

	<div class="subtotal layer">
	Покупателю к оплате<b> <?php echo number_format(($_smarty_tpl->tpl_vars['subtotal']->value+($_smarty_tpl->tpl_vars['subtotal']->value*$_smarty_tpl->tpl_vars['user']->value->commission/100)),0,".",",");?>
 руб</b>
	</div> 		

	
	<div class="block delivery">
		<h2>Доставка</h2>
				<select name="delivery_id">
				<option value="0">Не выбрана</option>
				<?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['d']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['deliveries']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value) {
$_smarty_tpl->tpl_vars['d']->_loop = true;
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['d']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['d']->value->id==$_smarty_tpl->tpl_vars['delivery']->value->id) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['d']->value->name;?>
</option>
				<?php } ?>
				</select>	
				<input type=text name=delivery_price value='<?php echo $_smarty_tpl->tpl_vars['order']->value->delivery_price;?>
'> <span class=currency><?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
</span>
				<div class="separate_delivery">
					<input type=checkbox id="separate_delivery" name=separate_delivery value='1' <?php if ($_smarty_tpl->tpl_vars['order']->value->separate_delivery) {?>checked<?php }?>> <label  for="separate_delivery">оплачивается отдельно</label>
				</div>
	</div>
<!-- 
	<div class="total layer">
	Итого<b> <?php echo $_smarty_tpl->tpl_vars['order']->value->total_price;?>
 <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
</b>
	</div> -->
		
		
	<div class="block payment">
		<h2>Оплата</h2>
				<select name="payment_method_id">
				<option value="0">Не выбрана</option>
				<?php  $_smarty_tpl->tpl_vars['pm'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pm']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['payment_methods']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pm']->key => $_smarty_tpl->tpl_vars['pm']->value) {
$_smarty_tpl->tpl_vars['pm']->_loop = true;
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['pm']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['pm']->value->id==$_smarty_tpl->tpl_vars['payment_method']->value->id) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['pm']->value->name;?>
</option>
				<?php } ?>
				</select>
		
		<input type=checkbox name="paid" id="paid" value="1" <?php if ($_smarty_tpl->tpl_vars['order']->value->paid) {?>checked<?php }?>> <label for="paid" <?php if ($_smarty_tpl->tpl_vars['order']->value->paid) {?>class="green"<?php }?>>Заказ оплачен</label>		
	</div>

 


	<div class="block_save">


	<input class="button_green button_save" type="submit" name="" value="Сохранить" />
	</div>


</div>


</form>
<!-- Основная форма (The End) -->




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
			amount_select.append("<option value='"+i+"'>"+i+" <?php echo $_smarty_tpl->tpl_vars['settings']->value->units;?>
</option>");
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


<?php }} ?>
