<?php /* Smarty version Smarty-3.1.18, created on 2016-10-23 20:08:02
         compiled from "/home/u457006/numisrus.ru/www/design/default/html/words_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:283698589580cee729d0902-27807003%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f9fdfcde9856065a5e0ec3f01e3d82b8849734a4' => 
    array (
      0 => '/home/u457006/numisrus.ru/www/design/default/html/words_list.tpl',
      1 => 1459425377,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '283698589580cee729d0902-27807003',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'current_auction' => 0,
    'symbol' => 0,
    'word_pages' => 0,
    'p' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_580cee72a9f081_96768498',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_580cee72a9f081_96768498')) {function content_580cee72a9f081_96768498($_smarty_tpl) {?>

<div class="waper-container-item">

<div class="waper-container-top">
	<!-- Хлебные крошки -->
    <div class="waper-container-top-siteway-1">

	<?php if ($_smarty_tpl->tpl_vars['current_auction']->value->id>0) {?>
	<a href="/">Главная</a> → <a href="/words">Словарь</a> → <?php echo $_smarty_tpl->tpl_vars['symbol']->value;?>


	<?php }?>

    </div>
    <!-- Заголовок -->
    <div class="waper-container-top-overall-1">
    	<div class="waper-container-top-overall-1-title">
        	<h1>Словарь</h1>
        </div>
    </div>
</div>

<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['symbol']->value;?>
" class="current_symbol">

<script type="text/javascript">

$(function() { 
    $('.waper-container-item-content-alphabet-2-letter').each(function() {

        if ($(this).find('span').html()==$('input.current_symbol').val())
        { 
            $(this).removeClass('waper-container-item-content-alphabet-2-letter');
            $(this).addClass('waper-container-item-content-alphabet-2-letter-selected');

        }
    });
})

</script>

        <div class="waper-container-item">
            <!-- Контент -->
             <div class="waper-container-item-content-2">
                <div class="waper-container-item-content-alphabet-2 words_list">
                    <a href="words/А">
                        <div class="waper-container-item-content-alphabet-2-letter">
                            <span>А</span>
                        </div>
                    </a>
                    <a href="words/Б">
                        <div class="waper-container-item-content-alphabet-2-letter">
                            <span>Б</span>
                        </div>
                    </a>
                    <a href="words/В">
                        <div class="waper-container-item-content-alphabet-2-letter">
                            <span>В</span>
                        </div>
                    </a>
                    <a href="words/Г">
                        <div class="waper-container-item-content-alphabet-2-letter">
                            <span>Г</span>
                        </div>
                    </a>
                    <a href="words/Д">
                        <div class="waper-container-item-content-alphabet-2-letter">
                            <span>Д</span>
                        </div>
                    </a>
                    <a href="words/Е">
                        <div class="waper-container-item-content-alphabet-2-letter">
                            <span>Е</span>
                        </div>
                    </a>
                    <a href="words/Ё">
                        <div class="waper-container-item-content-alphabet-2-letter">
                            <span>Ё</span>
                        </div>
                    </a>
                    <a href="words/Ж">
                        <div class="waper-container-item-content-alphabet-2-letter">
                            <span>Ж</span>
                        </div>
                    </a>
                    <a href="words/З">
                        <div class="waper-container-item-content-alphabet-2-letter">
                            <span>З</span>
                        </div>
                    </a>
                    <a href="words/И">
                        <div class="waper-container-item-content-alphabet-2-letter">
                            <span>И</span>
                        </div>
                    </a>
                    <a href="words/Й">
                        <div class="waper-container-item-content-alphabet-2-letter">
                            <span>Й</span>
                        </div>
                    </a>
                    <a href="words/К">
                        <div class="waper-container-item-content-alphabet-2-letter">
                            <span>К</span>
                        </div>
                    </a>
                    <a href="words/Л">
                        <div class="waper-container-item-content-alphabet-2-letter">
                            <span>Л</span>
                        </div>
                    </a>
                    <a href="words/М">
                        <div class="waper-container-item-content-alphabet-2-letter">
                            <span>М</span>
                        </div>
                    </a>
                    <a href="words/Н">
                        <div class="waper-container-item-content-alphabet-2-letter">
                            <span>Н</span>
                        </div>
                    </a>
                    <a href="words/О">
                        <div class="waper-container-item-content-alphabet-2-letter">
                            <span>О</span>
                        </div>
                    </a>
                    <a href="words/П">
                        <div class="waper-container-item-content-alphabet-2-letter">
                            <span>П</span>
                        </div>
                    </a>
                    <a href="words/Р">
                        <div class="waper-container-item-content-alphabet-2-letter">
                            <span>Р</span>
                        </div>
                    </a>
                    <a href="words/С">
                        <div class="waper-container-item-content-alphabet-2-letter">
                            <span>С</span>
                        </div>
                    </a>
                    <a href="words/Т">
                        <div class="waper-container-item-content-alphabet-2-letter">
                            <span>Т</span>
                        </div>
                    </a>
                    <a href="words/У">
                        <div class="waper-container-item-content-alphabet-2-letter">
                            <span>У</span>
                        </div>
                    </a>
                    <a href="words/Ф">
                        <div class="waper-container-item-content-alphabet-2-letter">
                            <span>Ф</span>
                        </div>
                    </a>
                    <a href="words/Х">
                        <div class="waper-container-item-content-alphabet-2-letter">
                            <span>Х</span>
                        </div>
                    </a>
                    <a href="words/Ц">
                        <div class="waper-container-item-content-alphabet-2-letter">
                            <span>Ц</span>
                        </div>
                    </a>
                    <a href="words/Ч">
                        <div class="waper-container-item-content-alphabet-2-letter">
                            <span>Ч</span>
                        </div>
                    </a>
                    <a href="words/Ш">
                        <div class="waper-container-item-content-alphabet-2-letter">
                            <span>Ш</span>
                        </div>
                    </a>
                    <a href="words/Щ">
                        <div class="waper-container-item-content-alphabet-2-letter">
                            <span>Щ</span>
                        </div>
                    </a>
                    <a href="words/Ъ">
                        <div class="waper-container-item-content-alphabet-2-letter">
                            <span>Ъ</span>
                        </div>
                    </a>
                    <a href="words/Ы">
                        <div class="waper-container-item-content-alphabet-2-letter">
                            <span>Ы</span>
                        </div>
                    </a>
                    <a href="words/Ь">
                        <div class="waper-container-item-content-alphabet-2-letter">
                            <span>Ь</span>
                        </div>
                    </a>
                    <a href="words/Э">
                        <div class="waper-container-item-content-alphabet-2-letter">
                            <span>Э</span>
                        </div>
                    </a>
                    <a href="words/Ю">
                        <div class="waper-container-item-content-alphabet-2-letter">
                            <span>Ю</span>
                        </div>
                    </a>
                    <a href="words/Я">
                        <div class="waper-container-item-content-alphabet-2-letter">
                            <span>Я</span>
                        </div>
                    </a>
                </div>
                <div class="waper-container-item-content-subtitle-1">
                    <?php echo $_smarty_tpl->tpl_vars['symbol']->value;?>

                </div>
                <div class="waper-container-item-content-text-1">
                    <?php if ($_smarty_tpl->tpl_vars['word_pages']->value) {?>
                    <?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['word_pages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
                    <p><strong><?php echo $_smarty_tpl->tpl_vars['p']->value->name;?>
</strong></p>                    
                    <p><?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['p']->value->body);?>
</p>
                    <?php } ?>
                    <?php } else { ?>
                    Раздел пуст
                    <?php }?>
                </div>

                <div class="waper-container-item-content-auctionlink-1">
                	<a href="/auctions" title="Перейти к аукционам">
                    	Перейти к аукционам
                    </a>
                </div>
			</div>
        </div>


</div>
<?php }} ?>
