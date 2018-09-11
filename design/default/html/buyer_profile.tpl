{* Страница профиля *}


{$meta_title = "Торги - личный кабинет" scope=parent}
<input type="hidden" name="user_id" value="{$user->id}">
<input type="hidden" name="user_area" value="{$user->area}">
<input type="hidden" value="{$token}" id="token" />
<!-- Контент -->
<div class="waper-container">
    <div class="waper-container-top">
        <!-- Хлебные крошки -->
        <div class="waper-container-top-siteway-1">
            <a href="/">Главная</a> → {if $is_history}Прошедшие аукционы{else}Текущие торги{/if}
        </div>

    </div>
    <div class="waper-container-item" style="margin-top:-70px">

<div class="waper-container-top">
    <div class="waper-container-top-profile-nav">
        <a href="user">
            <div class="waper-container-top-profile-nav-item">
                <span>Профиль</span>
            </div>
        </a>
        {if $user->buyer}
        <a href="user/bets" title="Текущие торги">
            <div class="{if !$is_history}waper-container-top-profile-nav-item-selesed{else}waper-container-top-profile-nav-item{/if}">
                <span>Текущие торги</span>
            </div>
        </a>
        {/if}
        <a href="user/history" title="Прошедшие аукционы">
            <div class="{if $is_history}waper-container-top-profile-nav-item-selesed{else}waper-container-top-profile-nav-item{/if}">
                <span>Прошедшие<br>аукционы</span>
            </div>
        </a>
        {if $user->seller}
        <a href="user/seller" title="Кабинет продавца">
            <div class="waper-container-top-profile-nav-item">
                <span>Кабинет<br>продавца</span>
            </div>
        </a>
        {/if}
        <a href="cart" title="Кабинет продавца">
            <div class="waper-container-top-profile-nav-item">
                <span>Корзина</span>
            </div>
        </a>
    </div>
</div>        

        <!-- Контент -->
        <div class="waper-container-item-content-2">
            <!-- Регистрация -->
            <div class="waper-container-item-content-registration">
                <div class="waper-container-item-content-registration-title">
                    <h3>{if $is_history}Прошедшие аукционы{else}Текущие торги{/if}</h3>
                </div>



                   <!-- Контент -->
                    {include file='pagination.tpl'}
                    <div class="table-holder" style="margin:0px; padding:0px; width:920px">
                    {if $auction_started==0} Аукцион временно не работает {/if}
                    {if $lots && $auction_started==1}
                    <table class="waper-container-item-content-2 product-table">
                        <!-- Заголовок тaблицы -->
                        <tr class="products-header">
                            <td>
                                <span>ID</span>
                            </td>
                            <td>
                                <span>Лот</span>                                
                            </td>
                            <td>
                                <span>Дата закрытия</span>
                            </td>

                            <td>
                                <span>Лидер</span>
                            </td>       

                            <td>
                                <span>Ставок</span>            
                            </td>                                   

                            <td style="width:80px">
                                <span>Сумма, р</span>             
                            </td>    
                            <td>
                                <span>Лидерство</span>            
                            </td>     
                            {if !$is_history}
                            <td>
                                <span>Действие</span>            
                            </td>                              
			    {/if}
              
                        </tr>

                        {foreach $lots as $lot}
                        <tr class="products-line">
                            <td class="cell1">
                                <span>{$lot->auction_id}/{$lot->lot_id}</span>
                            </td>
                            <td>
                                <div>
                                    {if $lot->images[0]}<img src="{$lot->images[0]->filename|resize:60:60}" alt="{$lot->name}"/>{/if}
                                    {if $lot->images[1]}<img src="{$lot->images[1]->filename|resize:60:60}" alt="{$lot->name}"/>{/if}
                                </div>                                
                                <span><a href="lot/{$lot->lot_id}" class="lot_link" title="{$lot->user_name}">{$lot->name}</a></span>
                            </td>  

                            <td>
                                {$lot->time_end}
                            </td>

                            <td>
                                {if $lot->bets|count>0} {$lot->bets[0]->user->login} {/if}
                            </td>             
                            <td class="table-price">
                                
                                {$lot->bets|count}
                                
                            </td>

                            <td>
                                {$lot->max_price|number_format:0:".":" "} руб
                            </td>

                            <td>
                                {if $lot->bets[0]->user->id==$user->id}<span style="color:green">Да</span>{else}<span style="color:red">Нет</span>{/if}
                            </td>                              

			{if !$is_history}

                            <td style="width:240px">
                            {if $lot->autobid==0}
                            <div>
                                <div class="waper-container-item-content-auction-data-1-filed" style="width:80px">
                                    <input type="text" readonly class="data-1-filed bet_value" style="width:40px;" value="{$lot->next_bet}" />р.
                                </div>
                                <a href="#" class="set_bet" title="Сделать ставку" lot-id="{$lot->lot_id}">
                                    <div class="waper-container-item-content-auction-data-1-button">
                                        Сделать ставку
                                    </div>
                                </a>
                            </div>
                            {/if}
                            <div>
                                <div class="waper-container-item-content-auction-data-1-filed" style="width:80px;  {if $lot->autobid == 0}margin-top:8px{/if}">
                                    <input type="text" class="data-1-filed autobid_value" style="width:40px" value="{$lot->autobid}" />р.
                                </div>
                                <a href="#" class="set_autobid" title="Сделать ставку" lot-id="{$lot->lot_id}">
                                    <div class="waper-container-item-content-auction-data-1-button">
                                        {if $lot->autobid == 0}Установить автобид{else}Повысить автобид{/if}
                                    </div>
                                </a>
                            </div>                            

                            </td>   
			{/if}

                        </tr>
                        {/foreach}

                    </table>
                    {else}
                    Нет лотов
                    {/if}
                    </div>
                    {include file='pagination.tpl'}


                
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
{literal}
$(function() {


$('.set_bet').click(function() {
    lot_id = $(this).attr('lot-id');
    bet_value = $(this).parent().find('input.bet_value').val();

    $.ajax({
        url: "ajax/add_bet.php",
        data: {lot_id: lot_id, bet_value: bet_value, token: $('input#token').val()},
        dataType: 'json',
        success: function(data) { 
            if (data=='last_bet') { $.alert('Ваша ставка последняя'); return false; }
            if (data=='time_is_over') { $.alert('Время лота истекло'); return false; }
            if (data=='ok') { location.reload(); }
        }
    });     
    return false;
});

$('.set_autobid').click(function() {
    lot_id = $(this).attr('lot-id');
    autobid_value = $(this).parent().find('input.autobid_value').val();

    $.ajax({
        url: "ajax/add_autobid.php",
        data: {lot_id: lot_id, limit: autobid_value, token: $('input#token').val()},
        dataType: 'json',
        success: function(data) { 
//alert(data); return false;
            if (data=='time_is_over') { $.alert('Время лота истекло.'); return false; }
            if (data=='need_more') { $.alert('Слишком маленький автобид. Он должен быть больше предыдущего значения и больше следующей ставки.', function() { location.reload();  }); }
            if (data=='ok' || data=='deleted')
            {
                location.reload();
            }
        }
    });     
    return false;
});


});
{/literal}
</script>
