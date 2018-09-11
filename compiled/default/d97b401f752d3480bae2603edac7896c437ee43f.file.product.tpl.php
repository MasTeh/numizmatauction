<?php /* Smarty version Smarty-3.1.18, created on 2016-10-23 15:45:16
         compiled from "/home/u457006/numisrus.ru/www/design/default/html/product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1253573553580cb0dc7ac712-04028385%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd97b401f752d3480bae2603edac7896c437ee43f' => 
    array (
      0 => '/home/u457006/numisrus.ru/www/design/default/html/product.tpl',
      1 => 1459425377,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1253573553580cb0dc7ac712-04028385',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'category' => 0,
    'cat' => 0,
    'product' => 0,
    'keyword' => 0,
    'image' => 0,
    'f' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_580cb0dc8261f7_71109425',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_580cb0dc8261f7_71109425')) {function content_580cb0dc8261f7_71109425($_smarty_tpl) {?>

<div class="waper-container-top">
	<!-- Хлебные крошки -->
    <div class="waper-container-top-siteway-1">

	<?php if ($_smarty_tpl->tpl_vars['category']->value) {?>
	<a href="/">Главная</a> → <a href="products">Наш магазин</a>
	<?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['category']->value->path; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>
	→ <a href="catalog/<?php echo $_smarty_tpl->tpl_vars['cat']->value->url;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cat']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a>
	<?php } ?>  
	→  <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
 
	<?php } elseif ($_smarty_tpl->tpl_vars['keyword']->value) {?>
	→ Поиск
	<?php } else { ?>
	<a href="/">Главная</a> → Наш магазин
	<?php }?>

    </div>
    <!-- Заголовок -->
    <div class="waper-container-top-overall-1">
    	<div class="waper-container-top-overall-1-title">
        	<h1>Магазин</h1>
        </div>
    </div>
</div>

<div class="waper-container-item">
    <!-- Большие картинки -->
    <?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value->images; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
?>
    <div class="waper-container-item-content-shop-gallery-big">
		<div class="waper-container-item-content-shop-gallery-big-close"></div>
        <img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['image']->value->filename,530,530);?>
" />
    </div>
    <?php } ?>

    <!-- Контент -->
    <div class="waper-container-item-content-2">
        <div class="waper-container-item-content-shop-gallery">
		    <?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value->images; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
?>
		        <div class="waper-container-item-content-shop-gallery-prev">
		          	<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['image']->value->filename,170,170);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['product']->value->name;?>
" />
		        </div>
		    <?php } ?>        	

        </div>
        <div class="waper-container-item-content-shop-descrit">
            <div class="waper-container-item-content-shop-descrit-price">
				<span><strong><?php echo number_format($_smarty_tpl->tpl_vars['product']->value->variant->price,0,"."," ");?>
</strong> р.</span>
                <a href="#" variant_id="<?php echo $_smarty_tpl->tpl_vars['product']->value->variant->id;?>
" title="В корзину" class="add_to_cart">
                    <div class="waper-container-item-content-shop-descrit-price-button-bascket">
                        <div class="add_to_basket_label">В корзину</div>
                    </div>
                </a>
			</div>
            <p><?php echo $_smarty_tpl->tpl_vars['product']->value->body;?>
</p>
            <?php if ($_smarty_tpl->tpl_vars['product']->value->features) {?>
            <div class="waper-container-item-content-shop-descrit-specif">
            	<?php  $_smarty_tpl->tpl_vars['f'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['f']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value->features; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['f']->key => $_smarty_tpl->tpl_vars['f']->value) {
$_smarty_tpl->tpl_vars['f']->_loop = true;
?>
            	<p><?php echo $_smarty_tpl->tpl_vars['f']->value->name;?>
: <strong><?php echo $_smarty_tpl->tpl_vars['f']->value->value;?>
</strong></p>
            	<?php } ?>
            </div>
            <?php }?>
        </div>
    </div>
    <div class="waper-container-item-content-backlink-1">
		<a href="javascript:history.back()">
			Назад в раздел
		</a>
	</div>
</div>
<?php }} ?>
