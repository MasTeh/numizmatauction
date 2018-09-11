<?php /* Smarty version Smarty-3.1.18, created on 2016-10-28 00:50:37
         compiled from "/home/u457006/numisrus.ru/www/design/default/html/pagination.tpl" */ ?>
<?php /*%%SmartyHeaderCode:277787313580cafeaef57e6-44837703%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c762fe7e167b6cf4dee06d92e2ac46a00d76c93' => 
    array (
      0 => '/home/u457006/numisrus.ru/www/design/default/html/pagination.tpl',
      1 => 1477605026,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '277787313580cafeaef57e6-44837703',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_580cafeb0b97d8_22879937',
  'variables' => 
  array (
    'total_pages_num' => 0,
    'current_page_num' => 0,
    'visible_pages' => 0,
    'page_from' => 0,
    'page_to' => 0,
    'p' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_580cafeb0b97d8_22879937')) {function content_580cafeb0b97d8_22879937($_smarty_tpl) {?>

<?php if ($_smarty_tpl->tpl_vars['total_pages_num']->value>1) {?>


<script type="text/javascript" src="js/ctrlnavigate.js"></script>           

<!-- Листалка страниц -->
<div class="waper-container-item-content-shop-paginator">
	<center>
    <div class="waper-container-item-content-shop-paginator-links" style="display:inline-block;">
	
	
	<?php $_smarty_tpl->tpl_vars['visible_pages'] = new Smarty_variable(200, null, 0);?>

	
	<?php $_smarty_tpl->tpl_vars['page_from'] = new Smarty_variable(1, null, 0);?>
	
	
	<?php if ($_smarty_tpl->tpl_vars['current_page_num']->value>floor($_smarty_tpl->tpl_vars['visible_pages']->value/2)) {?>
		<?php $_smarty_tpl->tpl_vars['page_from'] = new Smarty_variable(max(1,$_smarty_tpl->tpl_vars['current_page_num']->value-floor($_smarty_tpl->tpl_vars['visible_pages']->value/2)-1), null, 0);?>
	<?php }?>	
	
	
	<?php if ($_smarty_tpl->tpl_vars['current_page_num']->value>$_smarty_tpl->tpl_vars['total_pages_num']->value-ceil($_smarty_tpl->tpl_vars['visible_pages']->value/2)) {?>
		<?php $_smarty_tpl->tpl_vars['page_from'] = new Smarty_variable(max(1,$_smarty_tpl->tpl_vars['total_pages_num']->value-$_smarty_tpl->tpl_vars['visible_pages']->value-1), null, 0);?>
	<?php }?>
	
	
	<?php $_smarty_tpl->tpl_vars['page_to'] = new Smarty_variable(min($_smarty_tpl->tpl_vars['page_from']->value+$_smarty_tpl->tpl_vars['visible_pages']->value,$_smarty_tpl->tpl_vars['total_pages_num']->value-1), null, 0);?>

	<?php if ($_smarty_tpl->tpl_vars['current_page_num']->value==2) {?>
	<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('page'=>null),$_smarty_tpl);?>
"><div class="waper-container-item-content-shop-paginator-links-arrow-disable-1"></div></a>
	<?php }?>

	<?php if ($_smarty_tpl->tpl_vars['current_page_num']->value>2) {?>
	<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('page'=>$_smarty_tpl->tpl_vars['current_page_num']->value-1),$_smarty_tpl);?>
"><div class="waper-container-item-content-shop-paginator-links-arrow-disable-1"></div></a>
	<?php }?>	

	
    <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('page'=>null),$_smarty_tpl);?>
">
        <div class="<?php if ($_smarty_tpl->tpl_vars['current_page_num']->value==1) {?>waper-container-item-content-shop-paginator-links-item-selected<?php } else { ?>waper-container-item-content-shop-paginator-links-item<?php }?>">
            <span>1</span>
        </div>
    </a>
	
		
	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['pages'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['pages']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['name'] = 'pages';
$_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['page_to']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['start'] = (int) $_smarty_tpl->tpl_vars['page_from']->value;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['step'] = 1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['total']);
?>
			
		<?php $_smarty_tpl->tpl_vars['p'] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['section']['pages']['index']+1, null, 0);?>	
			
		

            <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('page'=>$_smarty_tpl->tpl_vars['p']->value),$_smarty_tpl);?>
">
                <div class="<?php if ($_smarty_tpl->tpl_vars['p']->value==$_smarty_tpl->tpl_vars['current_page_num']->value) {?>waper-container-item-content-shop-paginator-links-item-selected<?php } else { ?>waper-container-item-content-shop-paginator-links-item<?php }?>">
                    <span><?php echo $_smarty_tpl->tpl_vars['p']->value;?>
</span>
                </div>
            </a>


	<?php endfor; endif; ?>

	
    <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('page'=>$_smarty_tpl->tpl_vars['total_pages_num']->value),$_smarty_tpl);?>
">
        <div class="<?php if ($_smarty_tpl->tpl_vars['current_page_num']->value==$_smarty_tpl->tpl_vars['total_pages_num']->value) {?>waper-container-item-content-shop-paginator-links-item-selected<?php } else { ?>waper-container-item-content-shop-paginator-links-item<?php }?>">
            <span><?php echo $_smarty_tpl->tpl_vars['total_pages_num']->value;?>
</span>
        </div>
    </a>	
	
	


	<?php if ($_smarty_tpl->tpl_vars['current_page_num']->value<$_smarty_tpl->tpl_vars['total_pages_num']->value) {?>
	<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('page'=>$_smarty_tpl->tpl_vars['current_page_num']->value+1),$_smarty_tpl);?>
"><div class="waper-container-item-content-shop-paginator-links-arrow-disable-2"></div></a>
	<?php }?>


	
	</div>
	</center>
</div>
<!-- Листалка страниц (The End) -->
<?php }?><?php }} ?>
