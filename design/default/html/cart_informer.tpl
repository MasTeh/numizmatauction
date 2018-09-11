{* Информера корзины (отдаётся аяксом) *}

{if $cart->total_products}
<a href="/cart">
    <div class="waper-top-content-button-item" style="font-size:18px">
        Корзина ({$cart->total_products})
    </div>
</a>
{/if}  