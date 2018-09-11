{* Страница товара *}

<div class="waper-container-top">
	<!-- Хлебные крошки -->
    <div class="waper-container-top-siteway-1">

	{if $category}
	<a href="/">Главная</a> → <a href="products">Наш магазин</a>
	{foreach $category->path as $cat}
	→ <a href="catalog/{$cat->url}">{$cat->name|escape}</a>
	{/foreach}  
	→  {$product->name|escape} 
	{elseif $keyword}
	→ Поиск
	{else}
	<a href="/">Главная</a> → Наш магазин
	{/if}

    </div>
    <!-- Заголовок -->
    <div class="waper-container-top-overall-1">
    	<div class="waper-container-top-overall-1-title">
        	<h1>Магазин</h1>
        </div>
    </div>
</div>

<div class="waper-container-item">
    <!-- Большие картинки -->
    {foreach $product->images as $image}
    <div class="waper-container-item-content-shop-gallery-big">
		<div class="waper-container-item-content-shop-gallery-big-close"></div>
        <img src="{$image->filename|resize:530:530}" />
    </div>
    {/foreach}

    <!-- Контент -->
    <div class="waper-container-item-content-2">
        <div class="waper-container-item-content-shop-gallery">
		    {foreach $product->images as $image}
		        <div class="waper-container-item-content-shop-gallery-prev">
		          	<img src="{$image->filename|resize:170:170}" alt="{$product->name}" />
		        </div>
		    {/foreach}        	

        </div>
        <div class="waper-container-item-content-shop-descrit">
            <div class="waper-container-item-content-shop-descrit-price">
				<span><strong>{$product->variant->price|number_format:0:".":" "}</strong> р.</span>
                <a href="#" variant_id="{$product->variant->id}" title="В корзину" class="add_to_cart">
                    <div class="waper-container-item-content-shop-descrit-price-button-bascket">
                        <div class="add_to_basket_label">В корзину</div>
                    </div>
                </a>
			</div>
            <p>{$product->body}</p>
            {if $product->features}
            <div class="waper-container-item-content-shop-descrit-specif">
            	{foreach $product->features as $f}
            	<p>{$f->name}: <strong>{$f->value}</strong></p>
            	{/foreach}
            </div>
            {/if}
        </div>
    </div>
    <div class="waper-container-item-content-backlink-1">
		<a href="javascript:history.back()">
			Назад в раздел
		</a>
	</div>
</div>
