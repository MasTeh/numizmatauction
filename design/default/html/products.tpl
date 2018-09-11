{* Список товаров *}
{$meta_title = 'Интернет-магазин монет - Нумис-Рус' scope=parent}

<div class="waper-container-top">
	<!-- Хлебные крошки -->
    <div class="waper-container-top-siteway-1">

	{if $category}
	<a href="/">Главная</a> → <a href="products">Наш магазин</a>
	{foreach $category->path as $cat}
	→ {$cat->name}
	{/foreach}  

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

{if $category}

{if $products}
<div class="waper-container-item">
    <!-- Контент -->
    <div class="table-holder">
    <table class="waper-container-item-content-2 product-table">
		<!-- Заголовок тaблицы -->
        <tr class="products-header">
        	<td>
            	<span>№</span>
            </td>
            <td>
            	<span>Фото</span>
            </td>
            <td>
            	<span>Наименование</span>
            </td>
	    <td><span>{$category_features[0]->name}</span></td>
	    <td><span>{$category_features[1]->name}</span></td>
	    <td><span>{$category_features[2]->name}</span></td>
	    <td><span>{$category_features[3]->name}</span></td>
            <td>
            	<span>Цена</span>
            </td>
            <td>

            </td>
        </tr>
        <!-- Содержимое тблицы -->
        <!-- 1 -->
        {foreach $products as $p}
        <tr class="products-line">
        	<td class="cell1">
            	<span>{$p->id}</span>
            </td>
			<td class="products-photo-cell">
				{foreach $p->images as $img name=images}
				{if $smarty.foreach.images.iteration<=3}
                	<a href="products/{$p->url}">
                	<img src="{$img->filename|resize:86:86}" alt="{$p->name}"/>
               		</a>
                {/if}
                {/foreach}
			</td>
            <td>
            	<span><a href="products/{$p->url}" title="{$p->name}">{$p->name}</a></span>
            </td>  


	    <td><span>{$p->options[0]->value}</span></td>
	    <td><span>{$p->options[1]->value}</span></td>
	    <td><span>{$p->options[2]->value}</span></td>
	    <td><span>{$p->options[3]->value}</span></td>


            <td class="table-price">
            	<span><nobr>
            		{$p->variant->price|number_format:0:".":" "} руб
            	</nobr></span>
            </td>
            <td class="cart-cell">
            	<a href="#" variant_id="{$p->variants[0]->id}" page="1" class="button button-bascket add_to_cart">
                    <span class="add_to_basket_label">В корзину</span>
                </a>
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
Нет товаров
</div>
</div>

{/if}

{else}
<div class="waper-container-item">
    <!-- Контент -->
    <div class="waper-container-item-content-3">
    	{foreach $categories as $c}
		<a href="catalog/{$c->url}" title="{$c->name}">
            <div class="waper-container-item-content-shop-item-1">
            	{if $c->image}
                <div class="waper-container-item-content-shop-item-1-pic">
                    <img src="files/categories/{$c->image}" width="163" alt="Инвестиционные монеты"/>
                </div>
                {/if}
                <div class="waper-container-item-content-shop-item-1-text">
                    <span>{$c->name}</span>
                </div>
                <div class="waper-container-item-content-shop-item-shadow"></div>
            </div>
        </a>
        {/foreach}
	</div>

	{get_featured_products var=featured_products}
	{if $featured_products}
    <div class="waper-container-item-content-shop-title-1">
		<h2>Хиты продаж</h2>
	</div>
    <div class="waper-container-item-content-3">
    	{foreach $featured_products as $p}
    	<div class="waper-container-item-content-shop-item-2">
			<a href="products/{$p->url}">
				<div class="waper-container-item-content-shop-item-2-button">
					{$p->name}
				</div>
			</a>
            <div class="waper-container-item-content-shop-item-2-pic">
            	<a href="products/{$p->url}">
            	{if $p->images}
				<img src="{$p->images[0]->filename|resize:163:163}" alt="{$p->name}"/>
				{/if}
				</a>
			</div>
			<div class="waper-container-item-content-shop-item-2-text">
				{if $p->variants}
				<span style="font-size:16px">{$p->variants[0]->price|number_format:0:".":" "} р.</span>
                <a href="products/{$p->url}">
                    <div  class="waper-container-item-content-shop-item-2-button-bascket">
                        Купить
                    </div>
                </a>
                {/if}
			</div>
			<div class="waper-container-item-content-shop-item-shadow"></div>
		</div>
		{/foreach}
    </div>
    {/if}

</div>
{/if}
