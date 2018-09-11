{* Шаблон корзины *}

{$meta_title = "Корзина" scope=parent}

<div class="waper-container-item">

<!-- Хлебные крошки -->
<div class="waper-container-top-siteway-1">
	<a href="/">Главная</a> → <a href="user">Личный кабинет</a> → Корзина покупателя
</div>

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
        {if $user->seller}
        <a href="user/seller" title="Кабинет продавца">
            <div class="waper-container-top-profile-nav-item">
                <span>Кабинет<br>продавца</span>
            </div>
        </a>
        {/if}
        
            <div class="waper-container-top-profile-nav-item-selesed">
                <span>Корзина</span>
            </div>
        
    </div>
</div>

{if $cart->purchases|count>0}

<div class="table-holder">
<table class="product-table">
	<!-- Заголовок тaблицы -->
    <tr class="products-header" style="height:40px">
    	<td class="bord-left">
        	<span>№</span>
        </td>
        <td>
        	<span>Фото</span>
        </td>
        <td>
        	<span>Наименование</span>
        </td>
        <td>
        	<span>Свойства</span>
        </td>        
        <td>
        	<span>Цена</span>
        </td>
        <td>

        </td>
    </tr>
    <!-- Содержимое  -->

    {foreach $cart->purchases as $purchase}
    <tr class="products-line">
    	<td class="cell1">
        	<span>{$purchase->product->id}</span>
        </td>
		<td class="products-photo-cell">
			{foreach $purchase->product->images as $img name=images}
			{if $smarty.foreach.images.iteration<=2}
            	<a href="products/{$purchase->product->url}">
            	<img src="{$img->filename|resize:86:86}" alt="{$purchase->product->name}"/>
           		</a>
            {/if}
            {/foreach}
		</td>
        <td>
        	<span><a href="products/{$purchase->product->url}" title="{$purchase->product->name}">{$purchase->product->name}</a></span>

            <input name="amounts[{$purchase->variant->id}]" type="hidden" value="{$purchase->amount}" />

        </td>  
        
        <td style="text-align:left">
        {if $purchase->product->properties}
        
        	{foreach $purchase->product->properties as $p}
            
            	<p>{$p->name}: <strong>{$p->value}</strong></p>
            	
                    		
        	{/foreach}
        
        {/if}
        </td>

        <td class="table-price">
        	<span><nobr>
        		{$purchase->variant->price|number_format:0:".":" "} руб
        	</nobr></span>
        </td>
        <td>
        	<a href="cart/remove/{$purchase->variant->id}" title="Удалить">
                <div class="waper-container-item-content-backet-table-row-2-col-9-button-del"></div>
            </a>
        </td>
    </tr>
    {/foreach}

</table>


<div class="waper-container-item-content-backet-controll">
    <div class="waper-container-item-content-backet-controll-right">
        <div class="waper-container-item-content-backet-controll-right-price">
            <div class="waper-container-item-content-backet-controll-right-price-left">
                <span>Стоимость, руб.:</span>
            </div>
            <div class="waper-container-item-content-backet-controll-right-price-right">
                <span style="font-size:20px">{$cart->total_price|number_format:0:".":" "} руб</span>
            </div>
        </div>
        <div class="waper-container-item-content-backet-controll-right-button">
            <a href="#" id="order_button1" title="Оформить заказ">
                <div class="waper-container-item-content-backet-controll-right-button-item">
                    Оформить заказ
                </div>
            </a>
        </div>
    </div>
</div>
</div>

<div id="order_form" style="display:none">
<div class="waper-container-item-content-2" style="margin-top:30px">
    <div class="waper-container-item-content-registration">
        <div class="waper-container-item-content-registration-block">
            <div class="forms-1">
                <div class="waper-container-item-content-registration-title">
                    <h3>Оформление заказа</h3>
                </div>                
                <form id="order_form_submit" method="post" name="cart"">
                    <input type="hidden" value="checkout" name="checkout" />
                    <div class="forms-1-row-1">
                        <div class="forms-1-row-1-col">
                            <span>Ваше имя:</span>
                        </div>
                        <div class="forms-1-row-1-filed">
                            <input type="text" name="name" id="" class="form-filed-1" value="{$user->name} {$user->fam} {$user->otch}" />
                        </div>
                    </div>
                    <div class="forms-1-row-1">
                        <div class="forms-1-row-1-col">
                            <span>Ваш e-mail:</span>
                        </div>
                        <div class="forms-1-row-1-filed">
                            <input type="text" name="email" id="" class="form-filed-1" value="{$user->email}" />
                        </div>
                    </div>
                    <div class="forms-1-row-1">
                        <div class="forms-1-row-1-col">
                            <span>Телефон:</span>
                        </div>
                        <div class="forms-1-row-1-filed">
                            <input type="text" name="phone" id="" class="form-filed-1" value="{$user->phone}" placeholder="+7 (   )" />
                        </div>
                    </div>
                    <div class="forms-1-row-1">
                        <div class="forms-1-row-1-col">
                            <span>Город:</span>
                        </div>
                        <div class="forms-1-row-1-filed">
                            <input type="text" name="city" id="" class="form-filed-1" value="{$user->city}" />
                        </div>
                    </div>
                    <div class="forms-1-row-2">
                        <div class="forms-1-row-2-col">
                            <span>Адрес:</span>
                        </div>
                        <div class="forms-1-row-2-filed">
                            <textarea name="address" id="" class="form-filed-2">{$user->street} {$user->number} {$user->office}</textarea>
                        </div>
                    </div>

                    {if $deliveries} 
                    <div class="forms-1-row-1">
                        <div class="forms-1-row-1-col">
                            <span>Доставка:</span>
                        </div>
                        <div class="forms-1-row-1-radio">
                            {foreach $deliveries as $delivery}
                            <input type="radio" name="delivery_id" value="{$delivery->id}" {if $delivery_id==$delivery->id}checked{elseif $delivery@first}checked{/if} id="deliveries_{$delivery->id}">
                            <label for="deliveries_{$delivery->id}">{$delivery->name}</label><br>
                            {/foreach}
                        </div>
                    </div>
                    {/if}

                   {if $payment_methods}
                    <div class="forms-1-row-1">
                        <div class="forms-1-row-1-col">
                            <span>Способ оплаты:</span>
                        </div>
                        <div class="forms-1-row-1-radio">
                            {foreach $payment_methods as $payment_method}
                            <input type="radio" name="payment_method_id" value='{$payment_method->id}' {if $payment_method@first}checked{/if} 
                            id="payment_{$payment_method->id}">
                            <label for=payment_{$payment_method->id}>{$payment_method->name}</label><br>
                            {/foreach}
                        </div>
                    </div>
                   {/if}                    


                </form>
            </div>
            <div class="waper-container-item-content-registration-block-shadow"></div>
        </div>
    </div>
    {if !$user}
    <div class="waper-container-item-content-profilelink-1">
        <a href="#" class="login_link" next-page='cart' title="Уже зарегистрированы на сайте?">
            Уже зарегистрированы на сайте? 
        </a>
    </div>
    {/if}
</div>

<div style="margin-left:480px">
    <div class="waper-container-item-content-backet-controll-right-button">
        <a href="#" id="order_btn" title="Оформить заказ">
            <div class="waper-container-item-content-backet-controll-right-button-item">
                Отправить
            </div>
        </a>
    </div>
</div>
</div>

{else}

<div class="table-holder" style="height:400px">
Корзина пуста
</div>

{/if}

</div>

<script type="text/javascript">

$(function() {
    $('#order_button1').click(function() {
        $('#order_form').slideDown(500);
        $(this).hide();
        return false;
    });

    $('#order_btn').click(function() {
        $('form#order_form_submit').submit();
        return false;
    })
});

</script>