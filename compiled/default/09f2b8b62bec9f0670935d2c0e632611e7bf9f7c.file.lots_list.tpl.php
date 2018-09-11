<?php /* Smarty version Smarty-3.1.18, created on 2016-10-23 15:28:55
         compiled from "/home/u457006/numisrus.ru/www/design/default/html/lots_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:421052109580cad07e5b217-00671487%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '09f2b8b62bec9f0670935d2c0e632611e7bf9f7c' => 
    array (
      0 => '/home/u457006/numisrus.ru/www/design/default/html/lots_list.tpl',
      1 => 1476908686,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '421052109580cad07e5b217-00671487',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'auction_started' => 0,
    'lots' => 0,
    'lot' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_580cad080690a5_80706070',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_580cad080690a5_80706070')) {function content_580cad080690a5_80706070($_smarty_tpl) {?>﻿    <?php if ($_smarty_tpl->tpl_vars['auction_started']->value==0) {?> Аукцион временно не работает <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['lots']->value&&$_smarty_tpl->tpl_vars['auction_started']->value==1) {?>
    <table class="waper-container-item-content-2 product-table">
		<!-- Заголовок тaблицы -->
        <tr class="products-header">
        	<td style="min-width:35px">
            	<span>№</span>
                <div class="arrows-block">
                    <a href=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('sort'=>'id_up'),$_smarty_tpl);?>
 class="auction-arrows-up <?php if ($_GET['sort']=='id_up') {?>auction-arrows-up-active<?php }?>"></a>
                    <a href=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('sort'=>'id_down'),$_smarty_tpl);?>
 class="auction-arrows-down <?php if ($_GET['sort']=='id_down') {?>auction-arrows-down-active<?php }?>"></a>
                </div>
            </td>
            <td>                
            	<span>Наименование</span>
                <div class="arrows-block">
                    <a href=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('sort'=>'name_up'),$_smarty_tpl);?>
 class="auction-arrows-up <?php if ($_GET['sort']=='name_up') {?>auction-arrows-up-active<?php }?>"></a>
                    <a href=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('sort'=>'name_down'),$_smarty_tpl);?>
 class="auction-arrows-down <?php if ($_GET['sort']=='name_down') {?>auction-arrows-down-active<?php }?>"></a>
                </div>
            </td>
            <td style="min-width:50px"><span>Год</span>
                <div class="arrows-block">
                    <a href=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('sort'=>'year_up'),$_smarty_tpl);?>
 class="auction-arrows-up <?php if ($_GET['sort']=='year_up') {?>auction-arrows-up-active<?php }?>"></a>
                    <a href=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('sort'=>'year_down'),$_smarty_tpl);?>
 class="auction-arrows-down <?php if ($_GET['sort']=='year_down') {?>auction-arrows-down-active<?php }?>"></a>
                </div>                
            </td>
            <td style="min-width:50px"><span>Сост.</span>
                <div class="arrows-block">
                    <a href=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('sort'=>'save_up'),$_smarty_tpl);?>
 class="auction-arrows-up <?php if ($_GET['sort']=='save_up') {?>auction-arrows-up-active<?php }?>"></a>
                    <a href=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('sort'=>'save_down'),$_smarty_tpl);?>
 class="auction-arrows-down <?php if ($_GET['sort']=='save_down') {?>auction-arrows-down-active<?php }?>"></a>
                </div>
            </td>
            <td style="min-width:80px"><span>Материал</span>
                <div class="arrows-block">
                    <a href=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('sort'=>'material_up'),$_smarty_tpl);?>
 class="auction-arrows-up <?php if ($_GET['sort']=='material_up') {?>auction-arrows-up-active<?php }?>"></a>
                    <a href=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('sort'=>'material_down'),$_smarty_tpl);?>
 class="auction-arrows-down <?php if ($_GET['sort']=='material_down') {?>auction-arrows-down-active<?php }?>"></a>
                </div>
            </td>
            <td style="min-width:60px"><span>Буквы</span>
                <div class="arrows-block">
                    <a href=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('sort'=>'letters_up'),$_smarty_tpl);?>
 class="auction-arrows-up <?php if ($_GET['sort']=='letters_up') {?>auction-arrows-up-active<?php }?>"></a>
                    <a href=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('sort'=>'letters_down'),$_smarty_tpl);?>
 class="auction-arrows-down <?php if ($_GET['sort']=='letters_down') {?>auction-arrows-down-active<?php }?>"></a>
                </div>
            </td>
            <td style="min-width:50px"><span>Вес</span>
                <div class="arrows-block">
                    <a href=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('sort'=>'weight_up'),$_smarty_tpl);?>
 class="auction-arrows-up <?php if ($_GET['sort']=='weight_up') {?>auction-arrows-up-active<?php }?>"></a>
                    <a href=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('sort'=>'weight_down'),$_smarty_tpl);?>
 class="auction-arrows-down <?php if ($_GET['sort']=='weight_down') {?>auction-arrows-down-active<?php }?>"></a>
                </div>
            </td>
            <td>
            	<span>Лидер</span>
            </td>

            <td style="min-width:60px">
                <span>Ставок</span>
                <div class="arrows-block">
                    <a href=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('sort'=>'bets_count_up'),$_smarty_tpl);?>
 class="auction-arrows-up <?php if ($_GET['sort']=='bets_count_up') {?>auction-arrows-up-active<?php }?>"></a>
                    <a href=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('sort'=>'bets_count_down'),$_smarty_tpl);?>
 class="auction-arrows-down <?php if ($_GET['sort']=='bets_count_down') {?>auction-arrows-down-active<?php }?>"></a>
                </div>                
            </td>            

            <td style="min-width:80px">
                <span>Цена</span>
                <div class="arrows-block">
                    <a href=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('sort'=>'price_up'),$_smarty_tpl);?>
 class="auction-arrows-up <?php if ($_GET['sort']=='price_up') {?>auction-arrows-up-active<?php }?>"></a>
                    <a href=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('sort'=>'price_down'),$_smarty_tpl);?>
 class="auction-arrows-down <?php if ($_GET['sort']=='price_down') {?>auction-arrows-down-active<?php }?>"></a>
                </div>                
            </td>    

            <td style="min-width:80px">
                <span>Закрытие</span>
                <div class="arrows-block">
                    <a href=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('sort'=>'date_up'),$_smarty_tpl);?>
 class="auction-arrows-up <?php if ($_GET['sort']=='date_up') {?>auction-arrows-up-active<?php }?>"></a>
                    <a href=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('sort'=>'date_down'),$_smarty_tpl);?>
 class="auction-arrows-down <?php if ($_GET['sort']=='date_down') {?>auction-arrows-down-active<?php }?>"></a>
                </div>                
            </td>                
        </tr>

        <?php  $_smarty_tpl->tpl_vars['lot'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['lot']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lots']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['lot']->key => $_smarty_tpl->tpl_vars['lot']->value) {
$_smarty_tpl->tpl_vars['lot']->_loop = true;
?>
        <tr class="products-line">
        	<td class="cell1">
            	<span><?php echo $_smarty_tpl->tpl_vars['lot']->value->order_num;?>
</span>
            </td>
            <td class="lot_name">
            	<span><a href="lot/<?php echo $_smarty_tpl->tpl_vars['lot']->value->lot_id;?>
" class="lot_link" title="<?php echo $_smarty_tpl->tpl_vars['lot']->value->user_name;?>
"><?php echo $_smarty_tpl->tpl_vars['lot']->value->name;?>
</a></span>
                <div class="tooltip_image">
                    <?php if ($_smarty_tpl->tpl_vars['lot']->value->images[0]) {?><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['lot']->value->images[0]->filename,200,150);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['lot']->value->name;?>
"/><?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['lot']->value->images[1]) {?><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['lot']->value->images[1]->filename,200,150);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['lot']->value->name;?>
"/><?php }?>
                </div>
            </td>  
            <td><span><?php echo $_smarty_tpl->tpl_vars['lot']->value->prop_year;?>
</span></td>
            <td><span><?php echo $_smarty_tpl->tpl_vars['lot']->value->prop_save;?>
</span></td>
            <td><span><?php echo $_smarty_tpl->tpl_vars['lot']->value->prop_material;?>
</span></td>
            <td><span><nobr><?php echo $_smarty_tpl->tpl_vars['lot']->value->prop_letters;?>
</nobr></span></td>
            <td><span><nobr><?php echo $_smarty_tpl->tpl_vars['lot']->value->prop_weight;?>
</nobr></span></td>
            <td>
                <?php echo $_smarty_tpl->tpl_vars['lot']->value->lider_name;?>

            </td>             
            <td class="table-price">
            	
                <?php echo $_smarty_tpl->tpl_vars['lot']->value->bets_count;?>

                
            </td>

            <td>
                <?php echo number_format($_smarty_tpl->tpl_vars['lot']->value->price,0,"."," ");?>
 руб
            </td>

            <td>
		<?php if ($_smarty_tpl->tpl_vars['lot']->value->closed) {?>
		  <span style="color:darkred">Закрыт</span>
		<?php } else { ?>
                <?php echo $_smarty_tpl->tpl_vars['lot']->value->time_end;?>

		<?php }?>
            </td>                        
        </tr>
        <?php } ?>

    </table>
    <?php } else { ?>
    <div style="padding:30px">
    По данным критериям лотов не найдено. Попробуйте смягчить условия поиска, либо выбрать другую категорию.
    </div>
    <?php }?>
<?php }} ?>
