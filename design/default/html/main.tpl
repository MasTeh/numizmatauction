{* Главная страница магазина *}

{* Для того чтобы обернуть центральный блок в шаблон, отличный от index.tpl *}
{* Укажите нужный шаблон строкой ниже. Это работает и для других модулей *}
{$wrapper = 'index.tpl' scope=parent}

{* Канонический адрес страницы *}
{$canonical="" scope=parent}


<div class="waper-container-top">
	<!-- Заголовок -->
    <div class="waper-container-top-left-1">
    	<div class="waper-container-top-left-1-title">
		{if $featured_lots}
        	<h1>Избранные лоты</h1>
		{/if}
        </div>
    </div>
    <div class="waper-container-top-right-1">
    	<div class="waper-container-top-right-1-title">
        	<h3>Новости:</h3>
        </div>
    </div>
</div>
<div class="waper-container-item">
    <div class="waper-container-item-content-1">
		<!-- Левая колонка -->
    	<div class="waper-container-item-content-left-1">

        	<div class="waper-container-item-content-left-1-lots">
    <div class="main_lots_descr">
          {$main_lots_descr2->body}
    </div>
                <!-- Избарнные лоты begin -->
                {if $featured_lots}
                {foreach $featured_lots as $lot name=lots}                        
                <div class="waper-container-item-content-left-1-lots-item featured_lot" {if $smarty.foreach.lots.iteration>6}style="display:none"{/if}>
                    <div class="waper-container-item-content-left-1-lots-item-pic">
                    	{if $lot->product->images|count>0}
                        <a href="/lot/{$lot->id}"><img src="{$lot->product->images[0]->filename|resize:155:155}" alt=""/></a>
                        {/if}
                    </div>
                    <div class="waper-container-item-content-left-1-lots-item-text">
                    
			<b>{$lot->product->name}</b>
                    </div>
                    <a href="/lot/{$lot->id}" target="_parent" title="Подробнее">
                        <div class="waper-container-item-content-left-1-lots-item-button">
                            Подробнее
                        </div>
                    </a>
                    <div class="waper-container-item-content-left-1-lots-item-shadow"></div>
                </div>
                {/foreach}
                {/if}
                <!-- Избарнные лоты end -->
            </div>
            {if $featured_lots|count>6}
            <!-- Загрузить еще -->
            <div class="waper-container-item-content-left-1-download">
            	<a href="#" class="show_all_lots" title="Подробнее">
                	Загрузить еще ({$featured_lots|count-6})
                </a>
            </div>
            {/if}
            <!-- Наш интернет-аукцион -->
            <div class="waper-container-item-content-left-1-auction">
            	<div class="waper-container-item-content-left-1-auction-title">
                	<h2>{$page->header}</h2>
                </div>
                <div class="waper-container-item-content-left-1-auction-block-1">

                	{$page->body}
                	
                </div>
            </div>
        </div>
        
    	<div class="waper-container-item-content-right-1">
            <!-- Новости -->
            {foreach $news as $n}
        	<p><span>{$n->date|date_format:"%d / %m / %y"}</span></p>
            <p><a href="news/{$n->url}">{$n->name}</a></p>
            <p>{$n->annotation|strip_tags}</p>
            {/foreach}
            <p><a href="news">Все новости</a></p>

            <div class="article-title">
                <h3>Статьи:</h3>
            </div>            
            <!-- Статьи -->
            {foreach $articles as $p}
            <p><a style="color:#000" href="articles/{$p->url}">{$p->name}</a></p>
            {/foreach}            
            <p><a href="articles">Все статьи</a></p>
        </div>
    </div>
</div>


