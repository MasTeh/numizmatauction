<?php /* Smarty version Smarty-3.1.18, created on 2016-10-23 15:38:17
         compiled from "/home/u457006/numisrus.ru/www/design/default/html/lot.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2079874572580caf3959a691-51130633%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8ac6f1a726a91f4d99ed40f37f13aa0782e7e084' => 
    array (
      0 => '/home/u457006/numisrus.ru/www/design/default/html/lot.tpl',
      1 => 1477048457,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2079874572580caf3959a691-51130633',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'time_left' => 0,
    'lot' => 0,
    'user' => 0,
    'autobid' => 0,
    'token' => 0,
    'img' => 0,
    'p' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_580caf397675f0_05639210',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_580caf397675f0_05639210')) {function content_580caf397675f0_05639210($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/u457006/numisrus.ru/www/Smarty/libs/plugins/modifier.date_format.php';
?>


<input type="hidden" id="time_left" value="<?php echo $_smarty_tpl->tpl_vars['time_left']->value;?>
" />
<input type="hidden" id="lot_id" value="<?php echo $_smarty_tpl->tpl_vars['lot']->value->id;?>
" />
<input type="hidden" id="user_id" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>
" />
<?php if ($_smarty_tpl->tpl_vars['autobid']->value) {?><input type="hidden" id="autobid_amount" value="<?php echo $_smarty_tpl->tpl_vars['autobid']->value;?>
" /><?php }?>

<script type="text/javascript" src="design/default/js/lot.js"></script>

<?php if ($_smarty_tpl->tpl_vars['user']->value) {?>
<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" id="token" />
<?php }?>

<div class="waper-container-item">


    <!-- Контент -->
    <div class="waper-container">
    	<div class="waper-container-top">
        	<!-- Хлебные крошки -->
            <div class="waper-container-top-siteway-1">
				<a href="/">Главная</a> →  <a href="/auctions">Все аукционы</a> → 
				<a href="/auctions/<?php echo $_smarty_tpl->tpl_vars['lot']->value->auction_id;?>
">Аукцион № <?php echo $_smarty_tpl->tpl_vars['lot']->value->auction_id;?>
</a> →  
				 <?php echo $_smarty_tpl->tpl_vars['lot']->value->product->name;?>

            </div>
            <!-- Заголовок -->
            <div class="waper-container-top-overall-1">
            	<div class="waper-container-top-overall-1-title">
                	<h1>Лот № <?php echo $_smarty_tpl->tpl_vars['lot']->value->order_num;?>
. <span style="color:#999"><?php echo $_smarty_tpl->tpl_vars['lot']->value->product->name;?>
</span></h1>
                </div>
            </div>
        </div>
        <div class="waper-container-item">
            <!-- Большие картинки -->
            <?php  $_smarty_tpl->tpl_vars['img'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['img']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lot']->value->product->images; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['img']->key => $_smarty_tpl->tpl_vars['img']->value) {
$_smarty_tpl->tpl_vars['img']->_loop = true;
?>
            <div class="waper-container-item-content-shop-gallery-big">
				<div class="waper-container-item-content-shop-gallery-big-close"></div>
                <img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['img']->value->filename,530,530);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['lot']->value->product->name;?>
"/>
            </div>
            <?php } ?>

            <!-- Контент -->
            <div class="waper-container-item-content-2">
                <div class="waper-container-item-content-shop-gallery">
                	<?php  $_smarty_tpl->tpl_vars['img'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['img']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lot']->value->product->images; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['img']->key => $_smarty_tpl->tpl_vars['img']->value) {
$_smarty_tpl->tpl_vars['img']->_loop = true;
?>
                    <div class="waper-container-item-content-shop-gallery-prev">
                    	<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['img']->value->filename,260,260);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['lot']->value->product->name;?>
"/>
                    </div>
                    <?php } ?>
                </div>
                <div class="waper-container-item-content-auction-descrit">
                    
                    <div class="waper-container-item-content-auction-descrit-specif">
                    	<div class="waper-container-item-content-auction-descrit-specif-left">
                    	    <?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lot']->value->product->properties; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
                            <p><?php echo $_smarty_tpl->tpl_vars['p']->value->name;?>
: <strong><?php echo $_smarty_tpl->tpl_vars['p']->value->value;?>
</strong></p>
                            <?php } ?>
                        </div>
                        <div class="waper-container-item-content-auction-descrit-specif-right">
                            <p><strong>Время закрытия лота:</strong><br> <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['lot']->value->time_end,"%d.%m.%Y %R");?>
</p>
                            <p><strong>Текущая ставка:</strong> <span id="current_bet"><?php echo number_format($_smarty_tpl->tpl_vars['lot']->value->max_price,0,"."," ");?>
</span> р.</p>
                            <p><strong>Шаг торгов:</strong> <span id="bet_size"><?php echo number_format(($_smarty_tpl->tpl_vars['lot']->value->bet_size),0,"."," ");?>
</span> р.</p>
                            <p><strong>Количество ставок:</strong> <span id="bets_count"><?php echo count($_smarty_tpl->tpl_vars['lot']->value->bets);?>
</span></p>
                        </div>
                        <div class="waper-container-item-content-auction-descrit-specif-right">
                            
                            <p><strong>Год:</strong><br> <?php echo $_smarty_tpl->tpl_vars['lot']->value->product->prop_year;?>
</p>
                            <p><strong>Сохранность:</strong><br> <?php echo $_smarty_tpl->tpl_vars['lot']->value->product->prop_save;?>
</p>
                            <p><strong>Материал:</strong><br> <?php echo $_smarty_tpl->tpl_vars['lot']->value->product->prop_material;?>
</p>
                            <p><strong>Буквы:</strong><br> <?php echo $_smarty_tpl->tpl_vars['lot']->value->product->prop_letters;?>
</p>
                            <p><strong>Вес:</strong><br> <?php echo $_smarty_tpl->tpl_vars['lot']->value->product->prop_weight;?>
 гр</p>
                            
                        </div>
                       

                    </div>
                </div>
            </div>            
            <div class="waper-container-item-content-2">
            	<!-- Таймер -->
                <div class="waper-container-item-content-auction-timer" id="time_left_container">
                	До окончания торгов осталось: <strong id="time_left_tablo">--:--:--</strong>
                </div>
                <!-- Панель -->                
                <div class="waper-container-item-content-auction-panel bets_panel">
                	<?php if ($_smarty_tpl->tpl_vars['user']->value) {?>
                    <?php if ($_smarty_tpl->tpl_vars['user']->value->buyer==1) {?>
<!--                 	<div class="waper-container-item-content-auction-panel-link">
                    	<a href="#" class="add_to_profile">
                        	Добавить в личный кабинет
                        </a>
                    </div> -->
                    <?php if ($_smarty_tpl->tpl_vars['autobid']->value) {?>
                    После ставки др. игрока Ваша ставка поставится автоматически
                    <?php } else { ?>
                    <div class="waper-container-item-content-auction-data-1">
                    	<span>Ваша ставка:</span>
                        <div class="waper-container-item-content-auction-data-1-filed">
                        	<input type="number" name="bet_value" class="data-1-filed" value="<?php echo $_smarty_tpl->tpl_vars['lot']->value->next_bet;?>
" min="<?php echo $_smarty_tpl->tpl_vars['lot']->value->next_bet;?>
" />р.
                        </div>
                        <a href="#" class="set_bet_btn" title="Сделать ставку">
                            <div class="waper-container-item-content-auction-data-1-button">
                                Сделать ставку
                            </div>
                        </a>
                    </div>
                    <?php }?>
                    <div class="waper-container-item-content-auction-data-2">
                    	<div class="waper-container-item-content-auction-data-2-filed">
                        	<input type="text" name="autobid_limit" class="data-2-filed" value="<?php if ($_smarty_tpl->tpl_vars['autobid']->value) {?><?php echo $_smarty_tpl->tpl_vars['autobid']->value;?>
<?php }?>" />р.
                        </div>
                        <a href="#" class="set_autobid_btn" title="Установить автобид">
                            <div class="waper-container-item-content-auction-data-2-button">
                                <?php if ($_smarty_tpl->tpl_vars['autobid']->value) {?>
                                Изменить<br>автобид
                                <?php } else { ?>
                                Установить<br>автобид
                                <?php }?>
                            </div>
                        </a>
                    </div>
                    <a href="#" class="help-btn" style="padding:4px; display:inline-block; margin-top:5px; text-decoration:none; font-weight:bold"
                    title="Ставка будет делаться автоматически, не превышая указанную сумму.">?</a>



                    <?php } else { ?>
                    Для участия в торгах Вам необходимо получить статус покупателя.
                    <?php }?>
                    
                    <?php } else { ?>
                    Для участия в торгах вам необходимо авторизироваться. <a class="login_link" href="user/login">Войти</a>

                    <?php }?>
                </div>
                <div id="bets_list">

                </div>
	<div style="clear:both">
	<p><?php echo $_smarty_tpl->tpl_vars['lot']->value->product->body;?>
</p>
	</div>
            </div>
            <div class="waper-container-item-content-backlink-1">
				<a href="javascript:history.go(-1);"  title="Назад к списку лотов">
					Назад к списку лотов
				</a>
			</div>
        </div>
    </div>
</div><?php }} ?>
