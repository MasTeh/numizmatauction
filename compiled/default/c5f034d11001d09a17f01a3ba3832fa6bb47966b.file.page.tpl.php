<?php /* Smarty version Smarty-3.1.18, created on 2016-10-23 15:55:24
         compiled from "/home/u457006/numisrus.ru/www/design/default/html/page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1010496920580cb33c6e16c7-18087141%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c5f034d11001d09a17f01a3ba3832fa6bb47966b' => 
    array (
      0 => '/home/u457006/numisrus.ru/www/design/default/html/page.tpl',
      1 => 1462198800,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1010496920580cb33c6e16c7-18087141',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_580cb33c70fa53_78521383',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_580cb33c70fa53_78521383')) {function content_580cb33c70fa53_78521383($_smarty_tpl) {?>

<div class="waper-container">
	<div class="waper-container-top">
    	<!-- Хлебные крошки -->
        <div class="waper-container-top-siteway-1">
			<a href="" target="_parent" title="Главная">Главная</a> > <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value->header, ENT_QUOTES, 'UTF-8', true);?>

        </div>
        <!-- Заголовок -->
        <div class="waper-container-top-overall-1">
        	<div class="waper-container-top-overall-1-title">
            	<h1><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value->header, ENT_QUOTES, 'UTF-8', true);?>
</h1>
            </div>
        </div>
    </div>
    <div class="waper-container-item">

    <div class="waper-container-item-content-2">
    
     <?php echo $_smarty_tpl->tpl_vars['page']->value->body;?>

     
     </div>
    </div>
</div><?php }} ?>
