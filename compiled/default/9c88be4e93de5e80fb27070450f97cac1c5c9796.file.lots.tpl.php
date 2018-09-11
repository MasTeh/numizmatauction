<?php /* Smarty version Smarty-3.1.18, created on 2016-10-23 15:41:14
         compiled from "/home/u457006/numisrus.ru/www/design/default/html/lots.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1583010009580cafeae65ee1-46724971%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9c88be4e93de5e80fb27070450f97cac1c5c9796' => 
    array (
      0 => '/home/u457006/numisrus.ru/www/design/default/html/lots.tpl',
      1 => 1477224739,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1583010009580cafeae65ee1-46724971',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'categories' => 0,
    'c' => 0,
    'keyword' => 0,
    'features' => 0,
    'f' => 0,
    'f_name' => 0,
    'option' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_580cafeaeece25_71498786',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_580cafeaeece25_71498786')) {function content_580cafeaeece25_71498786($_smarty_tpl) {?>
<div class="waper-container-top">
	<!-- Хлебные крошки -->
    <div class="waper-container-top-siteway-1">

	<?php if ($_GET['auction_id']>0) {?>
	<a href="/">Главная</a> → <a href="auctions">Все аукционы</a> → Аукцион №<?php echo $_GET['auction_id'];?>


	<?php }?>

    </div>
    <!-- Заголовок -->
    <div class="waper-container-top-overall-1">
    	<div class="waper-container-top-overall-1-title">
        	<h1>Аукцион №<?php echo $_GET['auction_id'];?>
</h1>
        </div>
    </div>
</div>


<div class="waper-container-item">

<div style="padding:10px 90px">
<!-- Категории -->
<div class="waper-container-item-content-auction-category">
    <a href="/auctions/<?php echo $_GET['auction_id'];?>
/" class="category-link <?php if (!$_GET['category_id']) {?>category-link-selected<?php }?>">
         <b>Все категории</b>
     </a>
    <?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->_loop = true;
?>
    <a href="/auctions/<?php echo $_GET['auction_id'];?>
/<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
/" class="category-link <?php if ($_GET['category_id']==$_smarty_tpl->tpl_vars['c']->value->id) {?>category-link-selected<?php }?>">
        <?php echo $_smarty_tpl->tpl_vars['c']->value->name;?>

    </a>
    <?php } ?>
	<div style="clear:both"></div>
</div>
</div>

<script type="text/javascript" src="js/tapas.js"></script>
<input id="keyword" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
">

<script type="text/javascript">


function update_lots() {
    console.log('reloading...');
    console.log($('#current_url').val());
    $.ajax({
        url: $('#current_url').val(),
        data: {},
        dataType: 'html',
        success: function(data){
            $('.lots-list').html(data);
	    console.log('reloaded...');
	    setTimeout(function() { 
			update_lots(); 
		}, 15000);
        }
    });
}


    var show_flag = 0;


$(document).on('mouseover', '.lot_link', function() {
        $(this).parent().parent().parent().addClass('select-table-line');
        tooltip = $(this).parent().parent().find('.tooltip_image');
        show_flag = 1;
        tooltip_timer = setTimeout(function() {            
            if (show_flag==1) tooltip.fadeIn(300); else tooltip.hide();
        }, 800);
})
.on('mousemove', '.lot_link', function() {
        $(this).parent().parent().find('.tooltip_image').css({
            'left':event.clientX-30+'px',
            'top':event.clientY+20+'px'
        });
})
.on('mouseout', '.lot_link', function() {
        show_flag = 0;
        $(this).parent().parent().find('.tooltip_image').fadeOut(30);
        $(this).parent().parent().parent().removeClass('select-table-line');       
});




$(function() {


    $('.filter_select').on('change', function() {
        val = $(this).val(); 
        $('.filter_select option:first-child').attr('selected','selected');
        $(this).val(val);
    });

    $('#filter_button').click(function() {      
        $('form.filter_form').submit();
        return false;
    });


    if ($('input#keyword').val()!=='')
    {
        searchTerm = $('input#keyword').val();
        searchRegex  = new RegExp(searchTerm, 'g');
        $(".lot_name *").replaceText( searchRegex, '<span class="highlight">'+searchTerm+'</span>');
    }

    
    update_lots();


});

</script>

    <!-- Фильтр -->
    <form method="get" class="filter_form" action="">
    <input type="hidden" id="current_url" value="<?php echo $_SERVER['REQUEST_URI'];?>
" />
    <div class="waper-container-item-content-auction-filter" style="margin-left:90px">
        <div class="waper-container-item-content-auction-filter-row-1">
            <div class="waper-container-item-content-auction-filter-row-1-title">
                <span>Фильтр:</span>
            </div>
            <div class="waper-container-item-content-auction-filter-row-1-name">
                <span>По названию:</span>
                <div class="waper-container-item-content-auction-filter-row-1-name-filed">
                    <input type="text" name="keyword" class="filter-name-form-filed-1" value="<?php echo $_GET['keyword'];?>
" />
                </div>
            </div>

        </div>
        <div style="width:780px">
        <?php if ($_smarty_tpl->tpl_vars['features']->value) {?>
        <?php  $_smarty_tpl->tpl_vars['f'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['f']->_loop = false;
 $_smarty_tpl->tpl_vars['f_name'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['features']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['f']->key => $_smarty_tpl->tpl_vars['f']->value) {
$_smarty_tpl->tpl_vars['f']->_loop = true;
 $_smarty_tpl->tpl_vars['f_name']->value = $_smarty_tpl->tpl_vars['f']->key;
?>
        <?php if (count($_smarty_tpl->tpl_vars['f']->value['options'])>0) {?>
        <nobr>
            <div style="display:inline-block; padding:10px; width:80px"><b><?php echo $_smarty_tpl->tpl_vars['f']->value['name'];?>
</b></div>&nbsp; 
            <select name="<?php echo $_smarty_tpl->tpl_vars['f_name']->value;?>
" class="filter_select" style="width:120px">
                <option value="">выбрать</option>
                <?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['f']->value['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['option']->key => $_smarty_tpl->tpl_vars['option']->value) {
$_smarty_tpl->tpl_vars['option']->_loop = true;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['option']->value['value'];?>
" <?php if ($_smarty_tpl->tpl_vars['option']->value['value']==$_GET[$_smarty_tpl->tpl_vars['f_name']->value]) {?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['option']->value['value'];?>
 (<?php echo $_smarty_tpl->tpl_vars['option']->value['count'];?>
)
                </option>
                <?php } ?>
            </select>

        </nobr>
        <?php }?>
        <?php } ?>
        <?php }?>
        </div>
        <a href="#" id="filter_button" style="float:right; margin-top:-40px" title="Найти">
            <div class="waper-container-item-content-auction-filter-row-1-button">
                Найти
            </div>
        </a>
    </div>
    </form>

    
    <!-- Контент -->
    <?php echo $_smarty_tpl->getSubTemplate ('pagination.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div class="table-holder lots-list">
	<div style="padding:10%; font-size:16px; text-align:center"> Загрузка лотов...</div>
    </div>
    <?php echo $_smarty_tpl->getSubTemplate ('pagination.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


</div>
<?php }} ?>
