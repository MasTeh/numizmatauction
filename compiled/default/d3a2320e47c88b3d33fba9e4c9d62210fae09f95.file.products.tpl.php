<?php /* Smarty version Smarty-3.1.18, created on 2016-10-23 16:12:11
         compiled from "/home/u457006/numisrus.ru/www/design/default/html/products.tpl" */ ?>
<?php /*%%SmartyHeaderCode:659412551580cb72bebf5b9-15049869%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd3a2320e47c88b3d33fba9e4c9d62210fae09f95' => 
    array (
      0 => '/home/u457006/numisrus.ru/www/design/default/html/products.tpl',
      1 => 1474139679,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '659412551580cb72bebf5b9-15049869',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'category' => 0,
    'cat' => 0,
    'keyword' => 0,
    'products' => 0,
    'category_features' => 0,
    'p' => 0,
    'img' => 0,
    'categories' => 0,
    'c' => 0,
    'featured_products' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_580cb72c1205c8_12935370',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_580cb72c1205c8_12935370')) {function content_580cb72c1205c8_12935370($_smarty_tpl) {?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable('Интернет-магазин монет - Нумис-Рус', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>

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
	→ <?php echo $_smarty_tpl->tpl_vars['cat']->value->name;?>

	<?php } ?>  

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

<?php if ($_smarty_tpl->tpl_vars['category']->value) {?>

<?php if ($_smarty_tpl->tpl_vars['products']->value) {?>
<div class="waper-container-item">
    <!-- Контент -->
    <div class="table-holder">
    <table class="waper-container-item-content-2 product-table">
		<!-- Заголовок тaблицы -->
        <tr class="products-header">
        	<td>
            	<span>№</span>
            </td>
            <td>
            	<span>Фото</span>
            </td>
            <td>
            	<span>Наименование</span>
            </td>
	    <td><span><?php echo $_smarty_tpl->tpl_vars['category_features']->value[0]->name;?>
</span></td>
	    <td><span><?php echo $_smarty_tpl->tpl_vars['category_features']->value[1]->name;?>
</span></td>
	    <td><span><?php echo $_smarty_tpl->tpl_vars['category_features']->value[2]->name;?>
</span></td>
	    <td><span><?php echo $_smarty_tpl->tpl_vars['category_features']->value[3]->name;?>
</span></td>
            <td>
            	<span>Цена</span>
            </td>
            <td>

            </td>
        </tr>
        <!-- Содержимое тблицы -->
        <!-- 1 -->
        <?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
        <tr class="products-line">
        	<td class="cell1">
            	<span><?php echo $_smarty_tpl->tpl_vars['p']->value->id;?>
</span>
            </td>
			<td class="products-photo-cell">
				<?php  $_smarty_tpl->tpl_vars['img'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['img']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['p']->value->images; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['images']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['img']->key => $_smarty_tpl->tpl_vars['img']->value) {
$_smarty_tpl->tpl_vars['img']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['images']['iteration']++;
?>
				<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['images']['iteration']<=3) {?>
                	<a href="products/<?php echo $_smarty_tpl->tpl_vars['p']->value->url;?>
">
                	<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['img']->value->filename,86,86);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['p']->value->name;?>
"/>
               		</a>
                <?php }?>
                <?php } ?>
			</td>
            <td>
            	<span><a href="products/<?php echo $_smarty_tpl->tpl_vars['p']->value->url;?>
" title="<?php echo $_smarty_tpl->tpl_vars['p']->value->name;?>
"><?php echo $_smarty_tpl->tpl_vars['p']->value->name;?>
</a></span>
            </td>  


	    <td><span><?php echo $_smarty_tpl->tpl_vars['p']->value->options[0]->value;?>
</span></td>
	    <td><span><?php echo $_smarty_tpl->tpl_vars['p']->value->options[1]->value;?>
</span></td>
	    <td><span><?php echo $_smarty_tpl->tpl_vars['p']->value->options[2]->value;?>
</span></td>
	    <td><span><?php echo $_smarty_tpl->tpl_vars['p']->value->options[3]->value;?>
</span></td>


            <td class="table-price">
            	<span><nobr>
            		<?php echo number_format($_smarty_tpl->tpl_vars['p']->value->variant->price,0,"."," ");?>
 руб
            	</nobr></span>
            </td>
            <td class="cart-cell">
            	<a href="#" variant_id="<?php echo $_smarty_tpl->tpl_vars['p']->value->variants[0]->id;?>
" page="1" class="button button-bascket add_to_cart">
                    <span class="add_to_basket_label">В корзину</span>
                </a>
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
Нет товаров
</div>
</div>

<?php }?>

<?php } else { ?>
<div class="waper-container-item">
    <!-- Контент -->
    <div class="waper-container-item-content-3">
    	<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->_loop = true;
?>
		<a href="catalog/<?php echo $_smarty_tpl->tpl_vars['c']->value->url;?>
" title="<?php echo $_smarty_tpl->tpl_vars['c']->value->name;?>
">
            <div class="waper-container-item-content-shop-item-1">
            	<?php if ($_smarty_tpl->tpl_vars['c']->value->image) {?>
                <div class="waper-container-item-content-shop-item-1-pic">
                    <img src="files/categories/<?php echo $_smarty_tpl->tpl_vars['c']->value->image;?>
" width="163" alt="Инвестиционные монеты"/>
                </div>
                <?php }?>
                <div class="waper-container-item-content-shop-item-1-text">
                    <span><?php echo $_smarty_tpl->tpl_vars['c']->value->name;?>
</span>
                </div>
                <div class="waper-container-item-content-shop-item-shadow"></div>
            </div>
        </a>
        <?php } ?>
	</div>

	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['get_featured_products'][0][0]->get_featured_products_plugin(array('var'=>'featured_products'),$_smarty_tpl);?>

	<?php if ($_smarty_tpl->tpl_vars['featured_products']->value) {?>
    <div class="waper-container-item-content-shop-title-1">
		<h2>Хиты продаж</h2>
	</div>
    <div class="waper-container-item-content-3">
    	<?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['featured_products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
    	<div class="waper-container-item-content-shop-item-2">
			<a href="products/<?php echo $_smarty_tpl->tpl_vars['p']->value->url;?>
">
				<div class="waper-container-item-content-shop-item-2-button">
					<?php echo $_smarty_tpl->tpl_vars['p']->value->name;?>

				</div>
			</a>
            <div class="waper-container-item-content-shop-item-2-pic">
            	<a href="products/<?php echo $_smarty_tpl->tpl_vars['p']->value->url;?>
">
            	<?php if ($_smarty_tpl->tpl_vars['p']->value->images) {?>
				<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['p']->value->images[0]->filename,163,163);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['p']->value->name;?>
"/>
				<?php }?>
				</a>
			</div>
			<div class="waper-container-item-content-shop-item-2-text">
				<?php if ($_smarty_tpl->tpl_vars['p']->value->variants) {?>
				<span style="font-size:16px"><?php echo number_format($_smarty_tpl->tpl_vars['p']->value->variants[0]->price,0,"."," ");?>
 р.</span>
                <a href="products/<?php echo $_smarty_tpl->tpl_vars['p']->value->url;?>
">
                    <div  class="waper-container-item-content-shop-item-2-button-bascket">
                        Купить
                    </div>
                </a>
                <?php }?>
			</div>
			<div class="waper-container-item-content-shop-item-shadow"></div>
		</div>
		<?php } ?>
    </div>
    <?php }?>

</div>
<?php }?>
<?php }} ?>
