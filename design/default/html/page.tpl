{* Шаблон текстовой страницы *}

<div class="waper-container">
	<div class="waper-container-top">
    	<!-- Хлебные крошки -->
        <div class="waper-container-top-siteway-1">
			<a href="" target="_parent" title="Главная">Главная</a> > {$page->header|escape}
        </div>
        <!-- Заголовок -->
        <div class="waper-container-top-overall-1">
        	<div class="waper-container-top-overall-1-title">
            	<h1>{$page->header|escape}</h1>
            </div>
        </div>
    </div>
    <div class="waper-container-item">

    <div class="waper-container-item-content-2">
    
     {$page->body}
     
     </div>
    </div>
</div>