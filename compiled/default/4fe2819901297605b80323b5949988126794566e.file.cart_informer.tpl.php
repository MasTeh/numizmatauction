<?php /* Smarty version Smarty-3.1.18, created on 2016-10-23 15:38:17
         compiled from "/home/u457006/numisrus.ru/www/design/default/html/cart_informer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:271816422580caf398e9cc7-84727619%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4fe2819901297605b80323b5949988126794566e' => 
    array (
      0 => '/home/u457006/numisrus.ru/www/design/default/html/cart_informer.tpl',
      1 => 1459425377,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '271816422580caf398e9cc7-84727619',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cart' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_580caf3990b317_35595393',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_580caf3990b317_35595393')) {function content_580caf3990b317_35595393($_smarty_tpl) {?>

<?php if ($_smarty_tpl->tpl_vars['cart']->value->total_products) {?>
<a href="/cart">
    <div class="waper-top-content-button-item" style="font-size:18px">
        Корзина (<?php echo $_smarty_tpl->tpl_vars['cart']->value->total_products;?>
)
    </div>
</a>
<?php }?>  <?php }} ?>
