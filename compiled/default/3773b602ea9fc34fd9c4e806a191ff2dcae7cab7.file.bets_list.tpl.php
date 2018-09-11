<?php /* Smarty version Smarty-3.1.18, created on 2016-10-23 15:49:24
         compiled from "/home/u457006/numisrus.ru/www/design/default/html/bets_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:234550710580cb1d429f4d8-74714230%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3773b602ea9fc34fd9c4e806a191ff2dcae7cab7' => 
    array (
      0 => '/home/u457006/numisrus.ru/www/design/default/html/bets_list.tpl',
      1 => 1475530939,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '234550710580cb1d429f4d8-74714230',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'bets' => 0,
    'bet' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_580cb1d4365054_36567386',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_580cb1d4365054_36567386')) {function content_580cb1d4365054_36567386($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/home/u457006/numisrus.ru/www/Smarty/libs/plugins/modifier.truncate.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/u457006/numisrus.ru/www/Smarty/libs/plugins/modifier.date_format.php';
?><?php if (count($_smarty_tpl->tpl_vars['bets']->value)>0) {?>

    <!-- Заголовок тблицы -->
    <div class="waper-container-item-content-auction-table-row-1">
    	<div class="waper-container-item-content-auction-table-row-1-col-1">
        	<span>Сумма, р.</span>
        </div>
        <div class="waper-container-item-content-auction-table-row-1-col-1">
        	<span>Логин</span>
        </div>
        <div class="waper-container-item-content-auction-table-row-1-col-2">
        	<span>Дата/время</span>
        </div>
    </div>
    
    <?php  $_smarty_tpl->tpl_vars['bet'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['bet']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['bets']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['bets']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['bet']->key => $_smarty_tpl->tpl_vars['bet']->value) {
$_smarty_tpl->tpl_vars['bet']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['bets']['iteration']++;
?>
    <!-- Содержимое тблицы -->
    <div class="waper-container-item-content-auction-table-row-2 <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['bets']['iteration']==1) {?>last-bet<?php }?>">
    	<div class="waper-container-item-content-auction-table-row-2-col-1-list">
        	<span><?php echo number_format($_smarty_tpl->tpl_vars['bet']->value->value,0,"."," ");?>
 руб</span>
        </div>
        <div class="waper-container-item-content-auction-table-row-2-col-1-list">
            <span class="bet-item" user-id="<?php echo $_smarty_tpl->tpl_vars['bet']->value->user->id;?>
">
<?php if ($_smarty_tpl->tpl_vars['bet']->value->user->login) {?>
<?php echo $_smarty_tpl->tpl_vars['bet']->value->user->login;?>

<?php } else { ?>
<?php echo $_smarty_tpl->tpl_vars['bet']->value->user->name;?>
 <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['bet']->value->user->fam,2,'.');?>
 <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['bet']->value->user->otch,2,'.');?>

<?php }?>
</span>
        </div>
        <div class="waper-container-item-content-auction-table-row-2-col-2-list">
        	<span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['bet']->value->created,"%d.%m / %H:%M");?>
</span>
        </div>
    </div>
    <?php } ?>

<?php } else { ?>

Ставок нет. 

<?php }?><?php }} ?>
