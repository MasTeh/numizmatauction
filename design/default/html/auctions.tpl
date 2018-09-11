{* Список аукционов *}
{$meta_title = 'Аукцион монет Нумис-Рус' scope=parent}

<div class="waper-container-top">
	<!-- Хлебные крошки -->
    <div class="waper-container-top-siteway-1">

	<a href="/">Главная</a> → Все аукционы

    </div>
    <!-- Заголовок -->
    <div class="waper-container-top-overall-1">
    	<div class="waper-container-top-overall-1-title">
        	<h1>Аукционы</h1>
        </div>
    </div>
</div>

{if $auctions}

<div class="waper-container-item">
<div class="waper-container-item-content-2" style="min-height:auto">

{$page->body}
</div>
    <!-- Контент -->
    <div class="table-holder">
    <table class="waper-container-item-content-2 product-table">
		<!-- Заголовок тaблицы -->
        <tr class="products-header">

        	<td>
            	<span>Аукцион №</span>
            </td>

            <td>
            	<span>Всего лотов</span>
            </td>

            <td>
            	<span>Закрытие</span>
            </td>

        </tr>
        {foreach $auctions as $auction}
        <tr class="products-line">

        	<td>
            	<a href="/auctions/{$auction->id}">{$auction->id}</a>
            </td>

			<td>
				{$auction->count}
			</td>

            <td>
            	{$auction->date_closing}
            </td>  

        </tr>
        {/foreach}
    </table>
    </div>

    {include file='pagination.tpl'}

</div>
{else}

<div class="waper-container-item">
<div class="waper-container-item-content-2">
Нет аукционов
</div>
</div>

{/if}