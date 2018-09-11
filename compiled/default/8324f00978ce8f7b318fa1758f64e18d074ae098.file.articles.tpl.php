<?php /* Smarty version Smarty-3.1.18, created on 2016-10-25 20:27:47
         compiled from "/home/u457006/numisrus.ru/www/design/default/html/articles.tpl" */ ?>
<?php /*%%SmartyHeaderCode:666786989580f96134fefa6-41808792%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8324f00978ce8f7b318fa1758f64e18d074ae098' => 
    array (
      0 => '/home/u457006/numisrus.ru/www/design/default/html/articles.tpl',
      1 => 1462194856,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '666786989580f96134fefa6-41808792',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page' => 0,
    'articles' => 0,
    'p' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_580f96135e5ad9_18380390',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_580f96135e5ad9_18380390')) {function content_580f96135e5ad9_18380390($_smarty_tpl) {?>

<div class="waper-container">
	<div class="waper-container-top">
    	<!-- Хлебные крошки -->
        <div class="waper-container-top-siteway-1">
        	<?php if ($_smarty_tpl->tpl_vars['page']->value) {?>
			<a href="/" title="Главная">Главная</a> > <a href="articles">Статьи</a> > <?php echo $_smarty_tpl->tpl_vars['page']->value->name;?>

			<?php } else { ?>
			<a href="/" title="Главная">Главная</a> > Статьи
			<?php }?>
        </div>
        <!-- Заголовок -->
        <div class="waper-container-top-overall-1">
        	<div class="waper-container-top-overall-1-title">
            	<h2>Статьи</h2>
            </div>
        </div>
    </div>
		<div class="waper-container-item">
		<div class="waper-container-item-content-2">

		<!-- Заголовок /-->
		<?php if ($_smarty_tpl->tpl_vars['page']->value) {?>
		<h1><?php echo $_smarty_tpl->tpl_vars['page']->value->name;?>
</h1>
		<?php }?>

		<!-- Тело поста /-->
		<?php echo $_smarty_tpl->tpl_vars['page']->value->body;?>

		
		<?php if ($_smarty_tpl->tpl_vars['page']->value) {?>
		<br><br>
		<h2>Другие статьи</h2>
		<?php }?>
        <?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['articles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
        <?php if ($_smarty_tpl->tpl_vars['p']->value->id!=$_smarty_tpl->tpl_vars['page']->value->id) {?>
        	<p><a style="color:#000" href="articles/<?php echo $_smarty_tpl->tpl_vars['p']->value->url;?>
"><?php echo $_smarty_tpl->tpl_vars['p']->value->name;?>
</a></p>
        <?php }?>
        <?php } ?>   		

		</div>
		</div>
</div><?php }} ?>
