{* Страница профиля *}


{$meta_title = "Кабинет продавца" scope=parent}
<input type="hidden" name="user_id" value="{$user->id}">
<input type="hidden" name="user_area" value="{$user->area}">
<!-- Контент -->
<div class="waper-container">
    <div class="waper-container-top">
        <!-- Хлебные крошки -->
        <div class="waper-container-top-siteway-1">
            <a href="/">Главная</a> → Кабинет продавца
        </div>

    </div>
    <div class="waper-container-item" style="margin-top:-70px">

<div class="waper-container-top">
    <div class="waper-container-top-profile-nav">
        <a href="user" title="Профиль">
            <div class="waper-container-top-profile-nav-item">
                <span>Профиль</span>
            </div>
        </a>
        {if $user->buyer}
        <a href="user/bets" title="Текущие торги">
            <div class="waper-container-top-profile-nav-item">
                <span>Текущие торги</span>
            </div>
        </a>
        {/if}
        <a href="user/history" title="Прошедшие аукционы">
            <div class="waper-container-top-profile-nav-item">
                <span>Прошедшие<br>аукционы</span>
            </div>
        </a>
        <a href="user/seller" title="Кабинет продавца">
            <div class="waper-container-top-profile-nav-item-selesed">
                <span>Кабинет<br>продавца</span>
            </div>
        </a>
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
                    <h3>Кабинет продавца</h3>
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
                                <span>Действие</span>            
                            </td>    
              
                        </tr>

                        {foreach $lots as $lot}
                        <tr class="products-line" {if $lot->status==3}style="background:#e9f9ea !important"{/if}>
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
                           

                            <td style="width:200px">
                                {if $lot->status==1}
                                Готовится к торгам <br> на аукционе № {$lot->auction_id}
                                {else if $lot->status==2}
                                <span style="color:#12891a">
				{if $lot->cost<=$lot->max_price}
				<span style="font-weight:bold; color:darkblue">
                                На торгах. Аукцион № {$lot->auction_id}
				</span>
				{else}
				На торгах. Аукцион № {$lot->auction_id}
				{/if}
                                </span>
                                {else if $lot->status==3}
                                Ожидает оплаты покупателем
                                {else if $lot->status==4}
                                <span style="color:red">
                                Лот выдан покупателю.<br> Готов к выплате продавцу.
                                </span>
                                {else if $lot->status==5}
                                <span>
                                Лот не выкуплен. <br>
                                <a href="#" class="lot_restart" action="1" lot-id="{$lot->lot_id}">Перевыставить</a>, 
                                <a href="#" class="lot_restart" action="2" lot-id="{$lot->lot_id}">Забрать</a>
                                </span>
                                {else if $lot->status==6}
                                Лот продан. Оплата получена.
                                {/if}

                                                                
                            </td>   
<!--                             <td style="width:20px">
                                <a href="cart/remove/{$purchase->variant->id}" title="Удалить">
                                    <div class="waper-container-item-content-backet-table-row-2-col-9-button-del"></div>
                                </a>
                            </td>       -->                                           
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

$('.lot_restart').on('click', function() {

    lot_id = $(this).attr('lot-id');
    action = $(this).attr('action');
    var container = $(this).parent();

    $.ajax({
        url: "ajax/back_lot.php",
        data: {lot_id: lot_id, action: action},
        dataType: 'json',
        beforeSend: function() {
            container.append(ajax_loader);
        },
        success: function(data) { 
            var message = '';
            if (action=='1') message = '<b>Лот будет выставлен в следующем аукционе</b>. <br> Обращаем Ваше внимание, что в данном списке этот лот не будет отображаться до начала следующего аукциона.';
            if (action=='2') message = 'Вы можете забрать товар в офисе, в рабочее время. <br> Обращаем Ваше внимание, что в данном списке этот лот не будет отображаться.';

            if (data=='ok')
            {

                container.html(message);
            }
        }
    });     
    return false;    
});


$('.set_bet').click(function() {
    lot_id = $(this).attr('lot-id');
    bet_value = $(this).parent().find('input.bet_value').val();

    $.ajax({
        url: "ajax/add_bet.php",
        data: {lot_id: lot_id, bet_value: bet_value},
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
        data: {lot_id: lot_id, limit: autobid_value},
        dataType: 'json',
        success: function(data) { 

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
