<?php /* Smarty version Smarty-3.1.18, created on 2016-10-23 15:51:10
         compiled from "/home/u457006/numisrus.ru/www/design/default/html/main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2015373751580cb23e1469f2-93113006%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '32b786ba0a308f902a32e7255edb3f6040cee414' => 
    array (
      0 => '/home/u457006/numisrus.ru/www/design/default/html/main.tpl',
      1 => 1476126709,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2015373751580cb23e1469f2-93113006',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'featured_lots' => 0,
    'main_lots_descr2' => 0,
    'lot' => 0,
    'page' => 0,
    'news' => 0,
    'n' => 0,
    'articles' => 0,
    'p' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_580cb23e209bc7_76971906',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_580cb23e209bc7_76971906')) {function content_580cb23e209bc7_76971906($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/u457006/numisrus.ru/www/Smarty/libs/plugins/modifier.date_format.php';
?>



<?php $_smarty_tpl->tpl_vars['wrapper'] = new Smarty_variable('index.tpl', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['wrapper'] = clone $_smarty_tpl->tpl_vars['wrapper'];?>


<?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable('', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['canonical'] = clone $_smarty_tpl->tpl_vars['canonical'];?>


<div class="waper-container-top">
	<!-- Заголовок -->
    <div class="waper-container-top-left-1">
    	<div class="waper-container-top-left-1-title">
		<?php if ($_smarty_tpl->tpl_vars['featured_lots']->value) {?>
        	<h1>Избранные лоты</h1>
		<?php }?>
        </div>
    </div>
    <div class="waper-container-top-right-1">
    	<div class="waper-container-top-right-1-title">
        	<h3>Новости:</h3>
        </div>
    </div>
</div>
<div class="waper-container-item">
    <div class="waper-container-item-content-1">
		<!-- Левая колонка -->
    	<div class="waper-container-item-content-left-1">

        	<div class="waper-container-item-content-left-1-lots">
    <div class="main_lots_descr">
          <?php echo $_smarty_tpl->tpl_vars['main_lots_descr2']->value->body;?>

    </div>
                <!-- Избарнные лоты begin -->
                <?php if ($_smarty_tpl->tpl_vars['featured_lots']->value) {?>
                <?php  $_smarty_tpl->tpl_vars['lot'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['lot']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['featured_lots']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['lots']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['lot']->key => $_smarty_tpl->tpl_vars['lot']->value) {
$_smarty_tpl->tpl_vars['lot']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['lots']['iteration']++;
?>                        
                <div class="waper-container-item-content-left-1-lots-item featured_lot" <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['lots']['iteration']>6) {?>style="display:none"<?php }?>>
                    <div class="waper-container-item-content-left-1-lots-item-pic">
                    	<?php if (count($_smarty_tpl->tpl_vars['lot']->value->product->images)>0) {?>
                        <a href="/lot/<?php echo $_smarty_tpl->tpl_vars['lot']->value->id;?>
"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['lot']->value->product->images[0]->filename,155,155);?>
" alt=""/></a>
                        <?php }?>
                    </div>
                    <div class="waper-container-item-content-left-1-lots-item-text">
                    
			<b><?php echo $_smarty_tpl->tpl_vars['lot']->value->product->name;?>
</b>
                    </div>
                    <a href="/lot/<?php echo $_smarty_tpl->tpl_vars['lot']->value->id;?>
" target="_parent" title="Подробнее">
                        <div class="waper-container-item-content-left-1-lots-item-button">
                            Подробнее
                        </div>
                    </a>
                    <div class="waper-container-item-content-left-1-lots-item-shadow"></div>
                </div>
                <?php } ?>
                <?php }?>
                <!-- Избарнные лоты end -->
            </div>
            <?php if (count($_smarty_tpl->tpl_vars['featured_lots']->value)>6) {?>
            <!-- Загрузить еще -->
            <div class="waper-container-item-content-left-1-download">
            	<a href="#" class="show_all_lots" title="Подробнее">
                	Загрузить еще (<?php echo count($_smarty_tpl->tpl_vars['featured_lots']->value)-6;?>
)
                </a>
            </div>
            <?php }?>
            <!-- Наш интернет-аукцион -->
            <div class="waper-container-item-content-left-1-auction">
            	<div class="waper-container-item-content-left-1-auction-title">
                	<h2><?php echo $_smarty_tpl->tpl_vars['page']->value->header;?>
</h2>
                </div>
                <div class="waper-container-item-content-left-1-auction-block-1">

                	<?php echo $_smarty_tpl->tpl_vars['page']->value->body;?>

                	
                </div>
            </div>
        </div>
        
    	<div class="waper-container-item-content-right-1">
            <!-- Новости -->
            <?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['n']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['news']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value) {
$_smarty_tpl->tpl_vars['n']->_loop = true;
?>
        	<p><span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['n']->value->date,"%d / %m / %y");?>
</span></p>
            <p><a href="news/<?php echo $_smarty_tpl->tpl_vars['n']->value->url;?>
"><?php echo $_smarty_tpl->tpl_vars['n']->value->name;?>
</a></p>
            <p><?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['n']->value->annotation);?>
</p>
            <?php } ?>
            <p><a href="news">Все новости</a></p>

            <div class="article-title">
                <h3>Статьи:</h3>
            </div>            
            <!-- Статьи -->
            <?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['articles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
            <p><a style="color:#000" href="articles/<?php echo $_smarty_tpl->tpl_vars['p']->value->url;?>
"><?php echo $_smarty_tpl->tpl_vars['p']->value->name;?>
</a></p>
            <?php } ?>            
            <p><a href="articles">Все статьи</a></p>
        </div>
    </div>
</div>


<?php }} ?>
