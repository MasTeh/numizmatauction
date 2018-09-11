<?php /* Smarty version Smarty-3.1.18, created on 2016-10-25 00:07:04
         compiled from "/home/u457006/numisrus.ru/www/design/default/html/email_after_auction.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1903520457580e77f86f2c68-35654707%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '81ef50143bc2539b8ae0d5de65fe76c8ab56157f' => 
    array (
      0 => '/home/u457006/numisrus.ru/www/design/default/html/email_after_auction.tpl',
      1 => 1459440600,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1903520457580e77f86f2c68-35654707',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'root_url' => 0,
    'user' => 0,
    'auction' => 0,
    'deal' => 0,
    'lot' => 0,
    'p' => 0,
    'under_text' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_580e77f8818781_13970722',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_580e77f8818781_13970722')) {function content_580e77f8818781_13970722($_smarty_tpl) {?>
<center>
<img src="<?php echo $_smarty_tpl->tpl_vars['root_url']->value;?>
/design/default/images/logo-1.png" />
<h1 style="font-weight:normal;font-family:arial;">
	Здравствуйте, <?php echo $_smarty_tpl->tpl_vars['user']->value->name;?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value->fam;?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value->otch;?>
. 
</h1>
<h2>
	Поздравляем Вас, вы выйграли лот(ы) на аукционе № <?php echo $_smarty_tpl->tpl_vars['auction']->value->id;?>

</h2>
</center>
<table cellpadding="6" cellspacing="0" style="border-collapse: collapse;">
	<tr style="background-color:#f0f0f0;">
		<td style="padding:3px; font-size:14px; border:1px solid #e0e0e0;font-family:arial;">
			№
		</td>
		<td style="padding:3px; font-size:14px; border:1px solid #e0e0e0;font-family:arial;">
			
		</td>		
		<td style="padding:3px; width:200px; font-size:14px; border:1px solid #e0e0e0;font-family:arial;">
			Название
		</td>
		<td style="padding:3px; font-size:14px; border:1px solid #e0e0e0;font-family:arial;">
			Описание
		</td>	
		<td style="padding:3px; font-size:14px; border:1px solid #e0e0e0;font-family:arial;">
			Цена
		</td>
	
	</tr>
	<?php  $_smarty_tpl->tpl_vars['deal'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['deal']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['user']->value->deals; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['deal']->key => $_smarty_tpl->tpl_vars['deal']->value) {
$_smarty_tpl->tpl_vars['deal']->_loop = true;
?>
	<tr style="background-color:#fff;">
		<td style="padding:3px; font-size:14px; border:1px solid #e0e0e0;font-family:arial;">
			<?php echo $_smarty_tpl->tpl_vars['deal']->value->lot_id;?>

		</td>
		<td style="padding:3px; font-size:14px; border:1px solid #e0e0e0;font-family:arial;">
			<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['deal']->value->images[0]->filename,60,60);?>
" />
		</td>		
		<td style="padding:3px; font-size:14px; border:1px solid #e0e0e0;font-family:arial;">
			<a href="<?php echo $_smarty_tpl->tpl_vars['root_url']->value;?>
/lot/<?php echo $_smarty_tpl->tpl_vars['lot']->value->lot_id;?>
"><?php echo $_smarty_tpl->tpl_vars['deal']->value->purchases[0]->product_name;?>
</a>
		</td>
		<td style="padding:3px; font-size:14px; border:1px solid #e0e0e0;font-family:arial;">
			<?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['deal']->value->properties; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
				<b><?php echo $_smarty_tpl->tpl_vars['p']->value->name;?>
</b>: <?php echo $_smarty_tpl->tpl_vars['p']->value->value;?>
; 
			<?php } ?>
		</td>	
		<td style="padding:3px; font-size:14px; border:1px solid #e0e0e0;font-family:arial;">
			<?php echo $_smarty_tpl->tpl_vars['deal']->value->purchases[0]->price;?>
 руб
		</td>
		
	</tr>
	<?php } ?>
</table>
<h3>Сумма к оплате без пересылки, с учётом комиссии аукциона: <?php echo number_format(($_smarty_tpl->tpl_vars['user']->value->summ*(1+$_smarty_tpl->tpl_vars['user']->value->commission/100)),0,".",",");?>
 руб</h3>
<br><br>
<?php echo $_smarty_tpl->tpl_vars['under_text']->value->body;?>
<?php }} ?>
