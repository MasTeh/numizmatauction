{* Список новостей *}

{$meta_title='Новости - Нумис Рус' scope=parent}

<div class="waper-container">
	<div class="waper-container-top">
    	<!-- Хлебные крошки -->
        <div class="waper-container-top-siteway-1">
			<a href="/" title="Главная">Главная</a> > Новости
        </div>
        <!-- Заголовок -->
        <div class="waper-container-top-overall-1">
        	<div class="waper-container-top-overall-1-title">
            	<h2>Новости</h2>
            </div>
        </div>
    </div>
		<div class="waper-container-item">
		<div class="waper-container-item-content-2">

            {foreach $posts as $n}            
            <div style="float:left; margin-right:10px; margin-top:2px">{$n->date|date_format:"%D"}</div>
        	<div style="float:left"><a style="font-size:18px" href="news/{$n->url}">{$n->name}</a></div>
        	<div style="clear:both"></div>
            <p>{$n->annotation|strip_tags}</p>            
            <div style="height:20px"></div>
            {/foreach}	

		{include file='pagination.tpl'}

		</div>
		</div>
</div>
          