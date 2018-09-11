<?php /* Smarty version Smarty-3.1.18, created on 2016-11-03 02:49:08
         compiled from "/home/u457006/numisrus.ru/www/design/default/html/seller_profile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1738220078580cbea23f7946-33367015%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7fc697b233a9393380d37a49793bc40422fd0652' => 
    array (
      0 => '/home/u457006/numisrus.ru/www/design/default/html/seller_profile.tpl',
      1 => 1478130349,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1738220078580cbea23f7946-33367015',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_580cbea24f1610_60843008',
  'variables' => 
  array (
    'user' => 0,
    'auction_started' => 0,
    'lots' => 0,
    'lot' => 0,
    'purchase' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_580cbea24f1610_60843008')) {function content_580cbea24f1610_60843008($_smarty_tpl) {?>


<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable("Кабинет продавца", null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
<input type="hidden" name="user_id" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>
">
<input type="hidden" name="user_area" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->area;?>
">
<!-- Контент -->
<div class="waper-container">
    <div class="waper-container-top">
        <!-- Хлебные крошки -->
        <div class="waper-container-top-siteway-1">
            <a href="/">Главная</a> → Кабинет продавца
        </div>

    </div>
    <div class="waper-container-item" style="margin-top:-70px">

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
        <a href="user/seller" title="Кабинет продавца">
            <div class="waper-container-top-profile-nav-item-selesed">
                <span>Кабинет<br>продавца</span>
            </div>
        </a>
        <a href="cart" title="Кабинет продавца">
            <div class="waper-container-top-profile-nav-item">
                <span>Корзина</span>
            </div>
        </a>
    </div>
</div>        

        <!-- Контент -->
        <div class="waper-container-item-content-2">
            <!-- Регистрация -->
            <div class="waper-container-item-content-registration">
                <div class="waper-container-item-content-registration-title">
                    <h3>Кабинет продавца</h3>
                </div>



                   <!-- Контент -->
                    <?php echo $_smarty_tpl->getSubTemplate ('pagination.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                    <div class="table-holder" style="margin:0px; padding:0px; width:920px">
                    <?php if ($_smarty_tpl->tpl_vars['auction_started']->value==0) {?> Аукцион временно не работает <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['lots']->value&&$_smarty_tpl->tpl_vars['auction_started']->value==1) {?>
                    <table class="waper-container-item-content-2 product-table">
                        <!-- Заголовок тaблицы -->
                        <tr class="products-header">
                            <td>
                                <span>ID</span>
                            </td>
                            <td>
                                <span>Лот</span>                                
                            </td>
                            <td>
                                <span>Дата закрытия</span>
                            </td>

                            <td>
                                <span>Лидер</span>
                            </td>       

                            <td>
                                <span>Ставок</span>            
                            </td>                                   

                            <td style="width:80px">
                                <span>Сумма, р</span>             
                            </td>    


                            <td>
                                <span>Действие</span>            
                            </td>    
              
                        </tr>

                        <?php  $_smarty_tpl->tpl_vars['lot'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['lot']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lots']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['lot']->key => $_smarty_tpl->tpl_vars['lot']->value) {
$_smarty_tpl->tpl_vars['lot']->_loop = true;
?>
                        <tr class="products-line" <?php if ($_smarty_tpl->tpl_vars['lot']->value->status==3) {?>style="background:#e9f9ea !important"<?php }?>>
                            <td class="cell1">
                                <span><?php echo $_smarty_tpl->tpl_vars['lot']->value->auction_id;?>
/<?php echo $_smarty_tpl->tpl_vars['lot']->value->lot_id;?>
</span>
                            </td>
                            <td>
                                <div>
                                    <?php if ($_smarty_tpl->tpl_vars['lot']->value->images[0]) {?><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['lot']->value->images[0]->filename,60,60);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['lot']->value->name;?>
"/><?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['lot']->value->images[1]) {?><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['lot']->value->images[1]->filename,60,60);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['lot']->value->name;?>
"/><?php }?>
                                </div>                                
                                <span><a href="lot/<?php echo $_smarty_tpl->tpl_vars['lot']->value->lot_id;?>
" class="lot_link" title="<?php echo $_smarty_tpl->tpl_vars['lot']->value->user_name;?>
"><?php echo $_smarty_tpl->tpl_vars['lot']->value->name;?>
</a></span>
                            </td>  

                            <td>
                                <?php echo $_smarty_tpl->tpl_vars['lot']->value->time_end;?>

                            </td>

                            <td>
                                <?php if (count($_smarty_tpl->tpl_vars['lot']->value->bets)>0) {?> <?php echo $_smarty_tpl->tpl_vars['lot']->value->bets[0]->user->login;?>
 <?php }?>
                            </td>             
                            <td class="table-price">
                                
                                <?php echo count($_smarty_tpl->tpl_vars['lot']->value->bets);?>

                                
                            </td>

                            <td>
                                <?php echo number_format($_smarty_tpl->tpl_vars['lot']->value->max_price,0,"."," ");?>
 руб
                            </td>
                           

                            <td style="width:200px">
                                <?php if ($_smarty_tpl->tpl_vars['lot']->value->status==1) {?>
                                Готовится к торгам <br> на аукционе № <?php echo $_smarty_tpl->tpl_vars['lot']->value->auction_id;?>

                                <?php } elseif ($_smarty_tpl->tpl_vars['lot']->value->status==2) {?>
                                <span style="color:#12891a">
				<?php if ($_smarty_tpl->tpl_vars['lot']->value->cost<=$_smarty_tpl->tpl_vars['lot']->value->max_price) {?>
				<span style="font-weight:bold; color:darkblue">
                                На торгах. Аукцион № <?php echo $_smarty_tpl->tpl_vars['lot']->value->auction_id;?>

				</span>
				<?php } else { ?>
				На торгах. Аукцион № <?php echo $_smarty_tpl->tpl_vars['lot']->value->auction_id;?>

				<?php }?>
                                </span>
                                <?php } elseif ($_smarty_tpl->tpl_vars['lot']->value->status==3) {?>
                                Ожидает оплаты покупателем
                                <?php } elseif ($_smarty_tpl->tpl_vars['lot']->value->status==4) {?>
                                <span style="color:red">
                                Лот выдан покупателю.<br> Готов к выплате продавцу.
                                </span>
                                <?php } elseif ($_smarty_tpl->tpl_vars['lot']->value->status==5) {?>
                                <span>
                                Лот не выкуплен. <br>
                                <a href="#" class="lot_restart" action="1" lot-id="<?php echo $_smarty_tpl->tpl_vars['lot']->value->lot_id;?>
">Перевыставить</a>, 
                                <a href="#" class="lot_restart" action="2" lot-id="<?php echo $_smarty_tpl->tpl_vars['lot']->value->lot_id;?>
">Забрать</a>
                                </span>
                                <?php } elseif ($_smarty_tpl->tpl_vars['lot']->value->status==6) {?>
                                Лот продан. Оплата получена.
                                <?php }?>

                                                                
                            </td>   
<!--                             <td style="width:20px">
                                <a href="cart/remove/<?php echo $_smarty_tpl->tpl_vars['purchase']->value->variant->id;?>
" title="Удалить">
                                    <div class="waper-container-item-content-backet-table-row-2-col-9-button-del"></div>
                                </a>
                            </td>       -->                                           
                        </tr>
                        <?php } ?>

                    </table>
                    <?php } else { ?>
                    Нет лотов
                    <?php }?>
                    </div>
                    <?php echo $_smarty_tpl->getSubTemplate ('pagination.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>



                
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">

$(function() {

$('.lot_restart').on('click', function() {

    lot_id = $(this).attr('lot-id');
    action = $(this).attr('action');
    var container = $(this).parent();

    $.ajax({
        url: "ajax/back_lot.php",
        data: {lot_id: lot_id, action: action},
        dataType: 'json',
        beforeSend: function() {
            container.append(ajax_loader);
        },
        success: function(data) { 
            var message = '';
            if (action=='1') message = '<b>Лот будет выставлен в следующем аукционе</b>. <br> Обращаем Ваше внимание, что в данном списке этот лот не будет отображаться до начала следующего аукциона.';
            if (action=='2') message = 'Вы можете забрать товар в офисе, в рабочее время. <br> Обращаем Ваше внимание, что в данном списке этот лот не будет отображаться.';

            if (data=='ok')
            {

                container.html(message);
            }
        }
    });     
    return false;    
});


$('.set_bet').click(function() {
    lot_id = $(this).attr('lot-id');
    bet_value = $(this).parent().find('input.bet_value').val();

    $.ajax({
        url: "ajax/add_bet.php",
        data: {lot_id: lot_id, bet_value: bet_value},
        dataType: 'json',
        success: function(data) { 
            if (data=='last_bet') { $.alert('Ваша ставка последняя'); return false; }
            if (data=='time_is_over') { $.alert('Время лота истекло'); return false; }
            if (data=='ok') { location.reload(); }
        }
    });     
    return false;
});

$('.set_autobid').click(function() {
    lot_id = $(this).attr('lot-id');
    autobid_value = $(this).parent().find('input.autobid_value').val();

    $.ajax({
        url: "ajax/add_autobid.php",
        data: {lot_id: lot_id, limit: autobid_value},
        dataType: 'json',
        success: function(data) { 

            if (data=='time_is_over') { $.alert('Время лота истекло.'); return false; }
            if (data=='need_more') { $.alert('Слишком маленький автобид. Он должен быть больше предыдущего значения и больше следующей ставки.', function() { location.reload();  }); }
            if (data=='ok' || data=='deleted')
            {
                location.reload();
            }
        }
    });     
    return false;
});


});

</script>
<?php }} ?>
