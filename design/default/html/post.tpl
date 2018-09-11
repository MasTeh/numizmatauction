{* Страница отдельной записи блога *}

<div class="waper-container">
	<div class="waper-container-top">
    	<!-- Хлебные крошки -->
        <div class="waper-container-top-siteway-1">
			<a href="" target="_parent" title="Главная">Главная</a> > <a href="news">Новости</a> > {$post->name}
        </div>
        <!-- Заголовок -->
        <div class="waper-container-top-overall-1">
        	<div class="waper-container-top-overall-1-title">
            	<h1>Новость от {$post->date|date}</h1>
            </div>
        </div>
    </div>
		<div class="waper-container-item">
		<div class="waper-container-item-content-2">

		{* Канонический адрес страницы *}
		{$canonical="/blog/{$post->url}" scope=parent}

		<!-- Заголовок /-->
		<h1 data-post="{$post->id}">{$post->name}</h1>

		<!-- Тело поста /-->
		{$post->text}

		</div>
		</div>
</div>