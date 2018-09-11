{if $bets|count>0}

    <!-- Заголовок тблицы -->
    <div class="waper-container-item-content-auction-table-row-1">
    	<div class="waper-container-item-content-auction-table-row-1-col-1">
        	<span>Сумма, р.</span>
        </div>
        <div class="waper-container-item-content-auction-table-row-1-col-1">
        	<span>Логин</span>
        </div>
        <div class="waper-container-item-content-auction-table-row-1-col-2">
        	<span>Дата/время</span>
        </div>
    </div>
    
    {foreach $bets as $bet name=bets}
    <!-- Содержимое тблицы -->
    <div class="waper-container-item-content-auction-table-row-2 {if $smarty.foreach.bets.iteration==1}last-bet{/if}">
    	<div class="waper-container-item-content-auction-table-row-2-col-1-list">
        	<span>{$bet->value|number_format:0:".":" "} руб</span>
        </div>
        <div class="waper-container-item-content-auction-table-row-2-col-1-list">
            <span class="bet-item" user-id="{$bet->user->id}">
{if $bet->user->login}
{$bet->user->login}
{else}
{$bet->user->name} {$bet->user->fam|truncate:2:'.'} {$bet->user->otch|truncate:2:'.'}
{/if}
</span>
        </div>
        <div class="waper-container-item-content-auction-table-row-2-col-2-list">
        	<span>{$bet->created|date_format:"%d.%m / %H:%M"}</span>
        </div>
    </div>
    {/foreach}

{else}

Ставок нет. 

{/if}