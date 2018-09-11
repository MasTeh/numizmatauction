<?php /* Smarty version Smarty-3.1.18, created on 2016-10-30 14:57:47
         compiled from "/home/u457006/numisrus.ru/www/design/default/html/email_before_auction.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10947022475815d3c772a9d7-34248796%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2cbc3c51b11c837cfa0ba8bbe778af5d50a7f7c6' => 
    array (
      0 => '/home/u457006/numisrus.ru/www/design/default/html/email_before_auction.tpl',
      1 => 1477828655,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10947022475815d3c772a9d7-34248796',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5815d3c78decb7_11830563',
  'variables' => 
  array (
    'user' => 0,
    'auction' => 0,
    'lot' => 0,
    'under_text' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5815d3c78decb7_11830563')) {function content_5815d3c78decb7_11830563($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/u457006/numisrus.ru/www/Smarty/libs/plugins/modifier.date_format.php';
?>
<div style="padding:5%">
<center>
<img src="http://numisrus.ru/design/default/images/logo-1.png" />
<h1 style="font-weight:normal;font-family:arial;">
	Здравствуйте, <?php echo $_smarty_tpl->tpl_vars['user']->value->name;?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value->fam;?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value->otch;?>
. 
</h1>
<h2 style="font-weight:normal;font-family:arial;">
	Вы выставили лоты на аукцион № <?php echo $_smarty_tpl->tpl_vars['auction']->value->id;?>
, который состоится <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['auction']->value->date_start,"%d.%m.%Y в %R");?>

</h2>
</center>
<h2 style="font-weight:normal;font-family:arial;">Ваши лоты:</h2>


    <table style="font-family:Arial; font-size:12px" border="1" cellpadding="4" cellspacing="0" bordercolor="#CCCCCC">
        <tr>
       	<td style="min-width:35px">
       	<span>№ лота</span>
            </td>
	    <td></td>
            <td style="font-weight:bold">                
            	<span>Наименование</span>
            </td>
            <td style="min-width:50px;font-weight:bold"><span>Год</span>
            </td>
            <td style="min-width:50px;font-weight:bold"><span>Сост.</span>
            </td>
            <td style="min-width:80px;font-weight:bold"><span>Материал</span>
            </td>
            <td style="min-width:60px;font-weight:bold"><span>Буквы</span>
            </td>
            <td style="min-width:50px;font-weight:bold"><span>Вес</span>
            </td>

        </tr>

        <?php  $_smarty_tpl->tpl_vars['lot'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['lot']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['user']->value->lots; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['lot']->key => $_smarty_tpl->tpl_vars['lot']->value) {
$_smarty_tpl->tpl_vars['lot']->_loop = true;
?>
        <tr>
        	<td class="cell1">
            	<span><?php echo $_smarty_tpl->tpl_vars['lot']->value->order_num;?>
</span>
            </td>
	    <td>
		<?php if ($_smarty_tpl->tpl_vars['lot']->value->images[0]) {?><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['lot']->value->images[0]->filename,100,100);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['lot']->value->name;?>
"/><?php }?>
	    </td>
            <td class="lot_name">
            	<span><a href="http://numisrus.ru/lot/<?php echo $_smarty_tpl->tpl_vars['lot']->value->lot_id;?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['lot']->value->user_name;?>
"><?php echo $_smarty_tpl->tpl_vars['lot']->value->name;?>
</a></span>
            </td>  
            <td><span><?php if ($_smarty_tpl->tpl_vars['lot']->value->prop_year==0) {?><?php } else { ?><?php echo $_smarty_tpl->tpl_vars['lot']->value->prop_year;?>
<?php }?></span></td>
            <td><span><?php echo $_smarty_tpl->tpl_vars['lot']->value->prop_save;?>
</span></td>
            <td><span><?php echo $_smarty_tpl->tpl_vars['lot']->value->prop_material;?>
</span></td>
            <td><span><nobr><?php echo $_smarty_tpl->tpl_vars['lot']->value->prop_letters;?>
</nobr></span></td>
            <td><span><nobr><?php if ($_smarty_tpl->tpl_vars['lot']->value->prop_weight==0) {?><?php } else { ?><?php echo $_smarty_tpl->tpl_vars['lot']->value->prop_weight;?>
<?php }?></nobr></span></td>
        </tr>
        <?php } ?>

    </table>


<div  style="font-weight:normal;font-family:arial; font-size:12px">
<?php echo $_smarty_tpl->tpl_vars['under_text']->value->body;?>

</div>

</div><?php }} ?>
