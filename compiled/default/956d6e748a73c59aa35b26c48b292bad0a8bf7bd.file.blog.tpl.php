<?php /* Smarty version Smarty-3.1.18, created on 2016-10-29 02:38:54
         compiled from "/home/u457006/numisrus.ru/www/design/default/html/blog.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17284972115813e18ee660b2-13303692%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '956d6e748a73c59aa35b26c48b292bad0a8bf7bd' => 
    array (
      0 => '/home/u457006/numisrus.ru/www/design/default/html/blog.tpl',
      1 => 1462342498,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17284972115813e18ee660b2-13303692',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'posts' => 0,
    'n' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5813e18f079c47_21952477',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5813e18f079c47_21952477')) {function content_5813e18f079c47_21952477($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/u457006/numisrus.ru/www/Smarty/libs/plugins/modifier.date_format.php';
?>

<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable('Новости - Нумис Рус', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>

<div class="waper-container">
	<div class="waper-container-top">
    	<!-- Хлебные крошки -->
        <div class="waper-container-top-siteway-1">
			<a href="/" title="Главная">Главная</a> > Новости
        </div>
        <!-- Заголовок -->
        <div class="waper-container-top-overall-1">
        	<div class="waper-container-top-overall-1-title">
            	<h2>Новости</h2>
            </div>
        </div>
    </div>
		<div class="waper-container-item">
		<div class="waper-container-item-content-2">

            <?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['n']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['posts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value) {
$_smarty_tpl->tpl_vars['n']->_loop = true;
?>            
            <div style="float:left; margin-right:10px; margin-top:2px"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['n']->value->date,"%D");?>
</div>
        	<div style="float:left"><a style="font-size:18px" href="news/<?php echo $_smarty_tpl->tpl_vars['n']->value->url;?>
"><?php echo $_smarty_tpl->tpl_vars['n']->value->name;?>
</a></div>
        	<div style="clear:both"></div>
            <p><?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['n']->value->annotation);?>
</p>            
            <div style="height:20px"></div>
            <?php } ?>	

		<?php echo $_smarty_tpl->getSubTemplate ('pagination.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


		</div>
		</div>
</div>
          <?php }} ?>
