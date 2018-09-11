{* Страница статей *}

<div class="waper-container">
	<div class="waper-container-top">
    	<!-- Хлебные крошки -->
        <div class="waper-container-top-siteway-1">
        	{if $page}
			<a href="/" title="Главная">Главная</a> > <a href="articles">Статьи</a> > {$page->name}
			{else}
			<a href="/" title="Главная">Главная</a> > Статьи
			{/if}
        </div>
        <!-- Заголовок -->
        <div class="waper-container-top-overall-1">
        	<div class="waper-container-top-overall-1-title">
            	<h2>Статьи</h2>
            </div>
        </div>
    </div>
		<div class="waper-container-item">
		<div class="waper-container-item-content-2">

		<!-- Заголовок /-->
		{if $page}
		<h1>{$page->name}</h1>
		{/if}

		<!-- Тело поста /-->
		{$page->body}
		
		{if $page}
		<br><br>
		<h2>Другие статьи</h2>
		{/if}
        {foreach $articles as $p}
        {if $p->id!=$page->id}
        	<p><a style="color:#000" href="articles/{$p->url}">{$p->name}</a></p>
        {/if}
        {/foreach}   		

		</div>
		</div>
</div>