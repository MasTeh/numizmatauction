<?php /* Smarty version Smarty-3.1.18, created on 2016-11-03 03:59:08
         compiled from "/home/u457006/numisrus.ru/www/design/default/html/cart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:923744228580f02a8104dd3-40563158%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cf28a5b78b66cfe83cd767bffe044b29f5b9fa28' => 
    array (
      0 => '/home/u457006/numisrus.ru/www/design/default/html/cart.tpl',
      1 => 1478134736,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '923744228580f02a8104dd3-40563158',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_580f02a82bab90_56049936',
  'variables' => 
  array (
    'user' => 0,
    'cart' => 0,
    'purchase' => 0,
    'img' => 0,
    'p' => 0,
    'deliveries' => 0,
    'delivery' => 0,
    'delivery_id' => 0,
    'payment_methods' => 0,
    'payment_method' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_580f02a82bab90_56049936')) {function content_580f02a82bab90_56049936($_smarty_tpl) {?>

<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable("Корзина", null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>

<div class="waper-container-item">

<!-- Хлебные крошки -->
<div class="waper-container-top-siteway-1">
	<a href="/">Главная</a> → <a href="user">Личный кабинет</a> → Корзина покупателя
</div>

<div class="waper-container-top">
    <div class="waper-container-top-profile-nav">
        <a href="user" title="Профиль">
            <div class="waper-container-top-profile-nav-item">
                <span>Профиль</span>
            </div>
        </a>
        <?php if ($_smarty_tpl->tpl_vars['user']->value->buyer) {?>
        <a href="user/bets" title="Текущие торги">
            <div class="waper-container-top-profile-nav-item">
                <span>Текущие торги</span>
            </div>
        </a>
        <?php }?>
        <a href="user/history" title="Прошедшие аукционы">
            <div class="waper-container-top-profile-nav-item">
                <span>Прошедшие<br>аукционы</span>
            </div>
        </a>
        <?php if ($_smarty_tpl->tpl_vars['user']->value->seller) {?>
        <a href="user/seller" title="Кабинет продавца">
            <div class="waper-container-top-profile-nav-item">
                <span>Кабинет<br>продавца</span>
            </div>
        </a>
        <?php }?>
        
            <div class="waper-container-top-profile-nav-item-selesed">
                <span>Корзина</span>
            </div>
        
    </div>
</div>

<?php if (count($_smarty_tpl->tpl_vars['cart']->value->purchases)>0) {?>

<div class="table-holder">
<table class="product-table">
	<!-- Заголовок тaблицы -->
    <tr class="products-header" style="height:40px">
    	<td class="bord-left">
        	<span>№</span>
        </td>
        <td>
        	<span>Фото</span>
        </td>
        <td>
        	<span>Наименование</span>
        </td>
        <td>
        	<span>Свойства</span>
        </td>        
        <td>
        	<span>Цена</span>
        </td>
        <td>

        </td>
    </tr>
    <!-- Содержимое  -->

    <?php  $_smarty_tpl->tpl_vars['purchase'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['purchase']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cart']->value->purchases; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['purchase']->key => $_smarty_tpl->tpl_vars['purchase']->value) {
$_smarty_tpl->tpl_vars['purchase']->_loop = true;
?>
    <tr class="products-line">
    	<td class="cell1">
        	<span><?php echo $_smarty_tpl->tpl_vars['purchase']->value->product->id;?>
</span>
        </td>
		<td class="products-photo-cell">
			<?php  $_smarty_tpl->tpl_vars['img'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['img']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['purchase']->value->product->images; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['images']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['img']->key => $_smarty_tpl->tpl_vars['img']->value) {
$_smarty_tpl->tpl_vars['img']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['images']['iteration']++;
?>
			<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['images']['iteration']<=2) {?>
            	<a href="products/<?php echo $_smarty_tpl->tpl_vars['purchase']->value->product->url;?>
">
            	<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['img']->value->filename,86,86);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['purchase']->value->product->name;?>
"/>
           		</a>
            <?php }?>
            <?php } ?>
		</td>
        <td>
        	<span><a href="products/<?php echo $_smarty_tpl->tpl_vars['purchase']->value->product->url;?>
" title="<?php echo $_smarty_tpl->tpl_vars['purchase']->value->product->name;?>
"><?php echo $_smarty_tpl->tpl_vars['purchase']->value->product->name;?>
</a></span>

            <input name="amounts[<?php echo $_smarty_tpl->tpl_vars['purchase']->value->variant->id;?>
]" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['purchase']->value->amount;?>
" />

        </td>  
        
        <td style="text-align:left">
        <?php if ($_smarty_tpl->tpl_vars['purchase']->value->product->properties) {?>
        
        	<?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['purchase']->value->product->properties; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
            
            	<p><?php echo $_smarty_tpl->tpl_vars['p']->value->name;?>
: <strong><?php echo $_smarty_tpl->tpl_vars['p']->value->value;?>
</strong></p>
            	
                    		
        	<?php } ?>
        
        <?php }?>
        </td>

        <td class="table-price">
        	<span><nobr>
        		<?php echo number_format($_smarty_tpl->tpl_vars['purchase']->value->variant->price,0,"."," ");?>
 руб
        	</nobr></span>
        </td>
        <td>
        	<a href="cart/remove/<?php echo $_smarty_tpl->tpl_vars['purchase']->value->variant->id;?>
" title="Удалить">
                <div class="waper-container-item-content-backet-table-row-2-col-9-button-del"></div>
            </a>
        </td>
    </tr>
    <?php } ?>

</table>


<div class="waper-container-item-content-backet-controll">
    <div class="waper-container-item-content-backet-controll-right">
        <div class="waper-container-item-content-backet-controll-right-price">
            <div class="waper-container-item-content-backet-controll-right-price-left">
                <span>Стоимость, руб.:</span>
            </div>
            <div class="waper-container-item-content-backet-controll-right-price-right">
                <span style="font-size:20px"><?php echo number_format($_smarty_tpl->tpl_vars['cart']->value->total_price,0,"."," ");?>
 руб</span>
            </div>
        </div>
        <div class="waper-container-item-content-backet-controll-right-button">
            <a href="#" id="order_button1" title="Оформить заказ">
                <div class="waper-container-item-content-backet-controll-right-button-item">
                    Оформить заказ
                </div>
            </a>
        </div>
    </div>
</div>
</div>

<div id="order_form" style="display:none">
<div class="waper-container-item-content-2" style="margin-top:30px">
    <div class="waper-container-item-content-registration">
        <div class="waper-container-item-content-registration-block">
            <div class="forms-1">
                <div class="waper-container-item-content-registration-title">
                    <h3>Оформление заказа</h3>
                </div>                
                <form id="order_form_submit" method="post" name="cart"">
                    <input type="hidden" value="checkout" name="checkout" />
                    <div class="forms-1-row-1">
                        <div class="forms-1-row-1-col">
                            <span>Ваше имя:</span>
                        </div>
                        <div class="forms-1-row-1-filed">
                            <input type="text" name="name" id="" class="form-filed-1" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->name;?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value->fam;?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value->otch;?>
" />
                        </div>
                    </div>
                    <div class="forms-1-row-1">
                        <div class="forms-1-row-1-col">
                            <span>Ваш e-mail:</span>
                        </div>
                        <div class="forms-1-row-1-filed">
                            <input type="text" name="email" id="" class="form-filed-1" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->email;?>
" />
                        </div>
                    </div>
                    <div class="forms-1-row-1">
                        <div class="forms-1-row-1-col">
                            <span>Телефон:</span>
                        </div>
                        <div class="forms-1-row-1-filed">
                            <input type="text" name="phone" id="" class="form-filed-1" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->phone;?>
" placeholder="+7 (   )" />
                        </div>
                    </div>
                    <div class="forms-1-row-1">
                        <div class="forms-1-row-1-col">
                            <span>Город:</span>
                        </div>
                        <div class="forms-1-row-1-filed">
                            <input type="text" name="city" id="" class="form-filed-1" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->city;?>
" />
                        </div>
                    </div>
                    <div class="forms-1-row-2">
                        <div class="forms-1-row-2-col">
                            <span>Адрес:</span>
                        </div>
                        <div class="forms-1-row-2-filed">
                            <textarea name="address" id="" class="form-filed-2"><?php echo $_smarty_tpl->tpl_vars['user']->value->street;?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value->number;?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value->office;?>
</textarea>
                        </div>
                    </div>

                    <?php if ($_smarty_tpl->tpl_vars['deliveries']->value) {?> 
                    <div class="forms-1-row-1">
                        <div class="forms-1-row-1-col">
                            <span>Доставка:</span>
                        </div>
                        <div class="forms-1-row-1-radio">
                            <?php  $_smarty_tpl->tpl_vars['delivery'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['delivery']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['deliveries']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['delivery']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['delivery']->key => $_smarty_tpl->tpl_vars['delivery']->value) {
$_smarty_tpl->tpl_vars['delivery']->_loop = true;
 $_smarty_tpl->tpl_vars['delivery']->index++;
 $_smarty_tpl->tpl_vars['delivery']->first = $_smarty_tpl->tpl_vars['delivery']->index === 0;
?>
                            <input type="radio" name="delivery_id" value="<?php echo $_smarty_tpl->tpl_vars['delivery']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['delivery_id']->value==$_smarty_tpl->tpl_vars['delivery']->value->id) {?>checked<?php } elseif ($_smarty_tpl->tpl_vars['delivery']->first) {?>checked<?php }?> id="deliveries_<?php echo $_smarty_tpl->tpl_vars['delivery']->value->id;?>
">
                            <label for="deliveries_<?php echo $_smarty_tpl->tpl_vars['delivery']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['delivery']->value->name;?>
</label><br>
                            <?php } ?>
                        </div>
                    </div>
                    <?php }?>

                   <?php if ($_smarty_tpl->tpl_vars['payment_methods']->value) {?>
                    <div class="forms-1-row-1">
                        <div class="forms-1-row-1-col">
                            <span>Способ оплаты:</span>
                        </div>
                        <div class="forms-1-row-1-radio">
                            <?php  $_smarty_tpl->tpl_vars['payment_method'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['payment_method']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['payment_methods']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['payment_method']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['payment_method']->key => $_smarty_tpl->tpl_vars['payment_method']->value) {
$_smarty_tpl->tpl_vars['payment_method']->_loop = true;
 $_smarty_tpl->tpl_vars['payment_method']->index++;
 $_smarty_tpl->tpl_vars['payment_method']->first = $_smarty_tpl->tpl_vars['payment_method']->index === 0;
?>
                            <input type="radio" name="payment_method_id" value='<?php echo $_smarty_tpl->tpl_vars['payment_method']->value->id;?>
' <?php if ($_smarty_tpl->tpl_vars['payment_method']->first) {?>checked<?php }?> 
                            id="payment_<?php echo $_smarty_tpl->tpl_vars['payment_method']->value->id;?>
">
                            <label for=payment_<?php echo $_smarty_tpl->tpl_vars['payment_method']->value->id;?>
><?php echo $_smarty_tpl->tpl_vars['payment_method']->value->name;?>
</label><br>
                            <?php } ?>
                        </div>
                    </div>
                   <?php }?>                    


                </form>
            </div>
            <div class="waper-container-item-content-registration-block-shadow"></div>
        </div>
    </div>
    <?php if (!$_smarty_tpl->tpl_vars['user']->value) {?>
    <div class="waper-container-item-content-profilelink-1">
        <a href="#" class="login_link" next-page='cart' title="Уже зарегистрированы на сайте?">
            Уже зарегистрированы на сайте? 
        </a>
    </div>
    <?php }?>
</div>

<div style="margin-left:480px">
    <div class="waper-container-item-content-backet-controll-right-button">
        <a href="#" id="order_btn" title="Оформить заказ">
            <div class="waper-container-item-content-backet-controll-right-button-item">
                Отправить
            </div>
        </a>
    </div>
</div>
</div>

<?php } else { ?>

<div class="table-holder" style="height:400px">
Корзина пуста
</div>

<?php }?>

</div>

<script type="text/javascript">

$(function() {
    $('#order_button1').click(function() {
        $('#order_form').slideDown(500);
        $(this).hide();
        return false;
    });

    $('#order_btn').click(function() {
        $('form#order_form_submit').submit();
        return false;
    })
});

</script><?php }} ?>
