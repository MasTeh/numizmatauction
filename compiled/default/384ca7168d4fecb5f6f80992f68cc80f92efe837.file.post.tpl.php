<?php /* Smarty version Smarty-3.1.18, created on 2016-10-28 05:54:53
         compiled from "/home/u457006/numisrus.ru/www/design/default/html/post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4283385175812bdfd38e323-35332151%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '384ca7168d4fecb5f6f80992f68cc80f92efe837' => 
    array (
      0 => '/home/u457006/numisrus.ru/www/design/default/html/post.tpl',
      1 => 1462195270,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4283385175812bdfd38e323-35332151',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'post' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5812bdfd595369_32763993',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5812bdfd595369_32763993')) {function content_5812bdfd595369_32763993($_smarty_tpl) {?>

<div class="waper-container">
	<div class="waper-container-top">
    	<!-- Хлебные крошки -->
        <div class="waper-container-top-siteway-1">
			<a href="" target="_parent" title="Главная">Главная</a> > <a href="news">Новости</a> > <?php echo $_smarty_tpl->tpl_vars['post']->value->name;?>

        </div>
        <!-- Заголовок -->
        <div class="waper-container-top-overall-1">
        	<div class="waper-container-top-overall-1-title">
            	<h1>Новость от <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['date'][0][0]->date_modifier($_smarty_tpl->tpl_vars['post']->value->date);?>
</h1>
            </div>
        </div>
    </div>
		<div class="waper-container-item">
		<div class="waper-container-item-content-2">

		
		<?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable("/blog/".((string)$_smarty_tpl->tpl_vars['post']->value->url), null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['canonical'] = clone $_smarty_tpl->tpl_vars['canonical'];?>

		<!-- Заголовок /-->
		<h1 data-post="<?php echo $_smarty_tpl->tpl_vars['post']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['post']->value->name;?>
</h1>

		<!-- Тело поста /-->
		<?php echo $_smarty_tpl->tpl_vars['post']->value->text;?>


		</div>
		</div>
</div><?php }} ?>
