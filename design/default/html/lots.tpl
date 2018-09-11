{* Список товаров *}
<div class="waper-container-top">
	<!-- Хлебные крошки -->
    <div class="waper-container-top-siteway-1">

	{if $smarty.get.auction_id>0}
	<a href="/">Главная</a> → <a href="auctions">Все аукционы</a> → Аукцион №{$smarty.get.auction_id}

	{/if}

    </div>
    <!-- Заголовок -->
    <div class="waper-container-top-overall-1">
    	<div class="waper-container-top-overall-1-title">
        	<h1>Аукцион №{$smarty.get.auction_id}</h1>
        </div>
    </div>
</div>


<div class="waper-container-item">

<div style="padding:10px 90px">
<!-- Категории -->
<div class="waper-container-item-content-auction-category">
    <a href="/auctions/{$smarty.get.auction_id}/" class="category-link {if !$smarty.get.category_id}category-link-selected{/if}">
         <b>Все категории</b>
     </a>
    {foreach $categories as $c}
    <a href="/auctions/{$smarty.get.auction_id}/{$c->id}/" class="category-link {if $smarty.get.category_id==$c->id}category-link-selected{/if}">
        {$c->name}
    </a>
    {/foreach}
	<div style="clear:both"></div>
</div>
</div>

<script type="text/javascript" src="js/tapas.js"></script>
<input id="keyword" type="hidden" value="{$keyword}">

<script type="text/javascript">
{literal}

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
{/literal}
</script>

    <!-- Фильтр -->
    <form method="get" class="filter_form" action="">
    <input type="hidden" id="current_url" value="{$smarty.server.REQUEST_URI}" />
    <div class="waper-container-item-content-auction-filter" style="margin-left:90px">
        <div class="waper-container-item-content-auction-filter-row-1">
            <div class="waper-container-item-content-auction-filter-row-1-title">
                <span>Фильтр:</span>
            </div>
            <div class="waper-container-item-content-auction-filter-row-1-name">
                <span>По названию:</span>
                <div class="waper-container-item-content-auction-filter-row-1-name-filed">
                    <input type="text" name="keyword" class="filter-name-form-filed-1" value="{$smarty.get.keyword}" />
                </div>
            </div>

        </div>
        <div style="width:780px">
        {if $features}
        {foreach $features as $f_name => $f}
        {if $f['options']|count>0}
        <nobr>
            <div style="display:inline-block; padding:10px; width:80px"><b>{$f['name']}</b></div>&nbsp; 
            <select name="{$f_name}" class="filter_select" style="width:120px">
                <option value="">выбрать</option>
                {foreach $f['options'] as $option name=opt}
                <option value="{$option['value']}" {if $option['value']==$smarty.get[$f_name]} selected {/if}>{$option['value']} ({$option['count']})
                </option>
                {/foreach}
            </select>

        </nobr>
        {/if}
        {/foreach}
        {/if}
        </div>
        <a href="#" id="filter_button" style="float:right; margin-top:-40px" title="Найти">
            <div class="waper-container-item-content-auction-filter-row-1-button">
                Найти
            </div>
        </a>
    </div>
    </form>

    
    <!-- Контент -->
    {include file='pagination.tpl'}
    <div class="table-holder lots-list">
	<div style="padding:10%; font-size:16px; text-align:center"> Загрузка лотов...</div>
    </div>
    {include file='pagination.tpl'}

</div>
