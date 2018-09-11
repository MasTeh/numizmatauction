<?php /* Smarty version Smarty-3.1.18, created on 2016-11-03 03:06:10
         compiled from "/home/u457006/numisrus.ru/www/design/default/html/buyer_profile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1189056707580cb241e2ecc0-81365975%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '60648b5b6adc0086a553cdd78a66e75394cc8234' => 
    array (
      0 => '/home/u457006/numisrus.ru/www/design/default/html/buyer_profile.tpl',
      1 => 1478131565,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1189056707580cb241e2ecc0-81365975',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_580cb241ef9aa2_16350352',
  'variables' => 
  array (
    'user' => 0,
    'token' => 0,
    'is_history' => 0,
    'auction_started' => 0,
    'lots' => 0,
    'lot' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_580cb241ef9aa2_16350352')) {function content_580cb241ef9aa2_16350352($_smarty_tpl) {?>


<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable("Торги - личный кабинет", null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
<input type="hidden" name="user_id" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>
">
<input type="hidden" name="user_area" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->area;?>
">
<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" id="token" />
<!-- Контент -->
<div class="waper-container">
    <div class="waper-container-top">
        <!-- Хлебные крошки -->
        <div class="waper-container-top-siteway-1">
            <a href="/">Главная</a> → <?php if ($_smarty_tpl->tpl_vars['is_history']->value) {?>Прошедшие аукционы<?php } else { ?>Текущие торги<?php }?>
        </div>

    </div>
    <div class="waper-container-item" style="margin-top:-70px">

<div class="waper-container-top">
    <div class="waper-container-top-profile-nav">
        <a href="user">
            <div class="waper-container-top-profile-nav-item">
                <span>Профиль</span>
            </div>
        </a>
        <?php if ($_smarty_tpl->tpl_vars['user']->value->buyer) {?>
        <a href="user/bets" title="Текущие торги">
            <div class="<?php if (!$_smarty_tpl->tpl_vars['is_history']->value) {?>waper-container-top-profile-nav-item-selesed<?php } else { ?>waper-container-top-profile-nav-item<?php }?>">
                <span>Текущие торги</span>
            </div>
        </a>
        <?php }?>
        <a href="user/history" title="Прошедшие аукционы">
            <div class="<?php if ($_smarty_tpl->tpl_vars['is_history']->value) {?>waper-container-top-profile-nav-item-selesed<?php } else { ?>waper-container-top-profile-nav-item<?php }?>">
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
                    <h3><?php if ($_smarty_tpl->tpl_vars['is_history']->value) {?>Прошедшие аукционы<?php } else { ?>Текущие торги<?php }?></h3>
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
                                <span>Лидерство</span>            
                            </td>     
                            <?php if (!$_smarty_tpl->tpl_vars['is_history']->value) {?>
                            <td>
                                <span>Действие</span>            
                            </td>                              
			    <?php }?>
              
                        </tr>

                        <?php  $_smarty_tpl->tpl_vars['lot'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['lot']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lots']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['lot']->key => $_smarty_tpl->tpl_vars['lot']->value) {
$_smarty_tpl->tpl_vars['lot']->_loop = true;
?>
                        <tr class="products-line">
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

                            <td>
                                <?php if ($_smarty_tpl->tpl_vars['lot']->value->bets[0]->user->id==$_smarty_tpl->tpl_vars['user']->value->id) {?><span style="color:green">Да</span><?php } else { ?><span style="color:red">Нет</span><?php }?>
                            </td>                              

			<?php if (!$_smarty_tpl->tpl_vars['is_history']->value) {?>

                            <td style="width:240px">
                            <?php if ($_smarty_tpl->tpl_vars['lot']->value->autobid==0) {?>
                            <div>
                                <div class="waper-container-item-content-auction-data-1-filed" style="width:80px">
                                    <input type="text" readonly class="data-1-filed bet_value" style="width:40px;" value="<?php echo $_smarty_tpl->tpl_vars['lot']->value->next_bet;?>
" />р.
                                </div>
                                <a href="#" class="set_bet" title="Сделать ставку" lot-id="<?php echo $_smarty_tpl->tpl_vars['lot']->value->lot_id;?>
">
                                    <div class="waper-container-item-content-auction-data-1-button">
                                        Сделать ставку
                                    </div>
                                </a>
                            </div>
                            <?php }?>
                            <div>
                                <div class="waper-container-item-content-auction-data-1-filed" style="width:80px;  <?php if ($_smarty_tpl->tpl_vars['lot']->value->autobid==0) {?>margin-top:8px<?php }?>">
                                    <input type="text" class="data-1-filed autobid_value" style="width:40px" value="<?php echo $_smarty_tpl->tpl_vars['lot']->value->autobid;?>
" />р.
                                </div>
                                <a href="#" class="set_autobid" title="Сделать ставку" lot-id="<?php echo $_smarty_tpl->tpl_vars['lot']->value->lot_id;?>
">
                                    <div class="waper-container-item-content-auction-data-1-button">
                                        <?php if ($_smarty_tpl->tpl_vars['lot']->value->autobid==0) {?>Установить автобид<?php } else { ?>Повысить автобид<?php }?>
                                    </div>
                                </a>
                            </div>                            

                            </td>   
			<?php }?>

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


$('.set_bet').click(function() {
    lot_id = $(this).attr('lot-id');
    bet_value = $(this).parent().find('input.bet_value').val();

    $.ajax({
        url: "ajax/add_bet.php",
        data: {lot_id: lot_id, bet_value: bet_value, token: $('input#token').val()},
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
        data: {lot_id: lot_id, limit: autobid_value, token: $('input#token').val()},
        dataType: 'json',
        success: function(data) { 
//alert(data); return false;
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
