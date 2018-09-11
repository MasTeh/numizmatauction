<?php /* Smarty version Smarty-3.1.18, created on 2016-10-23 16:47:47
         compiled from "/home/u457006/numisrus.ru/www/design/default/html/auctions.tpl" */ ?>
<?php /*%%SmartyHeaderCode:429779404580cbf838cebe5-75240123%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4a64cfd15ee762d98cbcbe6c5e9e15e900d03dd6' => 
    array (
      0 => '/home/u457006/numisrus.ru/www/design/default/html/auctions.tpl',
      1 => 1460017682,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '429779404580cbf838cebe5-75240123',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'auctions' => 0,
    'page' => 0,
    'auction' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_580cbf839f0348_12713238',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_580cbf839f0348_12713238')) {function content_580cbf839f0348_12713238($_smarty_tpl) {?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable('Аукцион монет Нумис-Рус', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>

<div class="waper-container-top">
	<!-- Хлебные крошки -->
    <div class="waper-container-top-siteway-1">

	<a href="/">Главная</a> → Все аукционы

    </div>
    <!-- Заголовок -->
    <div class="waper-container-top-overall-1">
    	<div class="waper-container-top-overall-1-title">
        	<h1>Аукционы</h1>
        </div>
    </div>
</div>

<?php if ($_smarty_tpl->tpl_vars['auctions']->value) {?>

<div class="waper-container-item">
<div class="waper-container-item-content-2" style="min-height:auto">

<?php echo $_smarty_tpl->tpl_vars['page']->value->body;?>

</div>
    <!-- Контент -->
    <div class="table-holder">
    <table class="waper-container-item-content-2 product-table">
		<!-- Заголовок тaблицы -->
        <tr class="products-header">

        	<td>
            	<span>Аукцион №</span>
            </td>

            <td>
            	<span>Всего лотов</span>
            </td>

            <td>
            	<span>Закрытие</span>
            </td>

        </tr>
        <?php  $_smarty_tpl->tpl_vars['auction'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['auction']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['auctions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['auction']->key => $_smarty_tpl->tpl_vars['auction']->value) {
$_smarty_tpl->tpl_vars['auction']->_loop = true;
?>
        <tr class="products-line">

        	<td>
            	<a href="/auctions/<?php echo $_smarty_tpl->tpl_vars['auction']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['auction']->value->id;?>
</a>
            </td>

			<td>
				<?php echo $_smarty_tpl->tpl_vars['auction']->value->count;?>

			</td>

            <td>
            	<?php echo $_smarty_tpl->tpl_vars['auction']->value->date_closing;?>

            </td>  

        </tr>
        <?php } ?>
    </table>
    </div>

    <?php echo $_smarty_tpl->getSubTemplate ('pagination.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


</div>
<?php } else { ?>

<div class="waper-container-item">
<div class="waper-container-item-content-2">
Нет аукционов
</div>
</div>

<?php }?><?php }} ?>
