    {if $auction_started==0} Аукцион временно не работает {/if}
    {if $lots && $auction_started==1}
    <table class="waper-container-item-content-2 product-table">
		<!-- Заголовок тaблицы -->
        <tr class="products-header">
        	<td style="min-width:35px">
            	<span>№</span>
                <div class="arrows-block">
                    <a href={url sort='id_up'} class="auction-arrows-up {if $smarty.get.sort=='id_up'}auction-arrows-up-active{/if}"></a>
                    <a href={url sort='id_down'} class="auction-arrows-down {if $smarty.get.sort=='id_down'}auction-arrows-down-active{/if}"></a>
                </div>
            </td>
            <td>                
            	<span>Наименование</span>
                <div class="arrows-block">
                    <a href={url sort='name_up'} class="auction-arrows-up {if $smarty.get.sort=='name_up'}auction-arrows-up-active{/if}"></a>
                    <a href={url sort='name_down'} class="auction-arrows-down {if $smarty.get.sort=='name_down'}auction-arrows-down-active{/if}"></a>
                </div>
            </td>
            <td style="min-width:50px"><span>Год</span>
                <div class="arrows-block">
                    <a href={url sort='year_up'} class="auction-arrows-up {if $smarty.get.sort=='year_up'}auction-arrows-up-active{/if}"></a>
                    <a href={url sort='year_down'} class="auction-arrows-down {if $smarty.get.sort=='year_down'}auction-arrows-down-active{/if}"></a>
                </div>                
            </td>
            <td style="min-width:50px"><span>Сост.</span>
                <div class="arrows-block">
                    <a href={url sort='save_up'} class="auction-arrows-up {if $smarty.get.sort=='save_up'}auction-arrows-up-active{/if}"></a>
                    <a href={url sort='save_down'} class="auction-arrows-down {if $smarty.get.sort=='save_down'}auction-arrows-down-active{/if}"></a>
                </div>
            </td>
            <td style="min-width:80px"><span>Материал</span>
                <div class="arrows-block">
                    <a href={url sort='material_up'} class="auction-arrows-up {if $smarty.get.sort=='material_up'}auction-arrows-up-active{/if}"></a>
                    <a href={url sort='material_down'} class="auction-arrows-down {if $smarty.get.sort=='material_down'}auction-arrows-down-active{/if}"></a>
                </div>
            </td>
            <td style="min-width:60px"><span>Буквы</span>
                <div class="arrows-block">
                    <a href={url sort='letters_up'} class="auction-arrows-up {if $smarty.get.sort=='letters_up'}auction-arrows-up-active{/if}"></a>
                    <a href={url sort='letters_down'} class="auction-arrows-down {if $smarty.get.sort=='letters_down'}auction-arrows-down-active{/if}"></a>
                </div>
            </td>
            <td style="min-width:50px"><span>Вес</span>
                <div class="arrows-block">
                    <a href={url sort='weight_up'} class="auction-arrows-up {if $smarty.get.sort=='weight_up'}auction-arrows-up-active{/if}"></a>
                    <a href={url sort='weight_down'} class="auction-arrows-down {if $smarty.get.sort=='weight_down'}auction-arrows-down-active{/if}"></a>
                </div>
            </td>
            <td>
            	<span>Лидер</span>
            </td>

            <td style="min-width:60px">
                <span>Ставок</span>
                <div class="arrows-block">
                    <a href={url sort='bets_count_up'} class="auction-arrows-up {if $smarty.get.sort=='bets_count_up'}auction-arrows-up-active{/if}"></a>
                    <a href={url sort='bets_count_down'} class="auction-arrows-down {if $smarty.get.sort=='bets_count_down'}auction-arrows-down-active{/if}"></a>
                </div>                
            </td>            

            <td style="min-width:80px">
                <span>Цена</span>
                <div class="arrows-block">
                    <a href={url sort='price_up'} class="auction-arrows-up {if $smarty.get.sort=='price_up'}auction-arrows-up-active{/if}"></a>
                    <a href={url sort='price_down'} class="auction-arrows-down {if $smarty.get.sort=='price_down'}auction-arrows-down-active{/if}"></a>
                </div>                
            </td>    

            <td style="min-width:80px">
                <span>Закрытие</span>
                <div class="arrows-block">
                    <a href={url sort='date_up'} class="auction-arrows-up {if $smarty.get.sort=='date_up'}auction-arrows-up-active{/if}"></a>
                    <a href={url sort='date_down'} class="auction-arrows-down {if $smarty.get.sort=='date_down'}auction-arrows-down-active{/if}"></a>
                </div>                
            </td>                
        </tr>

        {foreach $lots as $lot}
        <tr class="products-line">
        	<td class="cell1">
            	<span>{$lot->order_num}</span>
            </td>
            <td class="lot_name">
            	<span><a href="lot/{$lot->lot_id}" class="lot_link" title="{$lot->user_name}">{$lot->name}</a></span>
                <div class="tooltip_image">
                    {if $lot->images[0]}<img src="{$lot->images[0]->filename|resize:200:150}" alt="{$lot->name}"/>{/if}
                    {if $lot->images[1]}<img src="{$lot->images[1]->filename|resize:200:150}" alt="{$lot->name}"/>{/if}
                </div>
            </td>  
            <td><span>{$lot->prop_year}</span></td>
            <td><span>{$lot->prop_save}</span></td>
            <td><span>{$lot->prop_material}</span></td>
            <td><span><nobr>{$lot->prop_letters}</nobr></span></td>
            <td><span><nobr>{$lot->prop_weight}</nobr></span></td>
            <td>
                {$lot->lider_name}
            </td>             
            <td class="table-price">
            	
                {$lot->bets_count}
                
            </td>

            <td>
                {$lot->price|number_format:0:".":" "} руб
            </td>

            <td>
		{if $lot->closed}
		  <span style="color:darkred">Закрыт</span>
		{else}
                {$lot->time_end}
		{/if}
            </td>                        
        </tr>
        {/foreach}

    </table>
    {else}
    <div style="padding:30px">
    По данным критериям лотов не найдено. Попробуйте смягчить условия поиска, либо выбрать другую категорию.
    </div>
    {/if}
