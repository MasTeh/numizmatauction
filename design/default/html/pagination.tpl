{* Постраничный вывод *}

{if $total_pages_num>1}
{* Скрипт для листания через ctrl → *}
{* Ссылки на соседние страницы должны иметь id PrevLink и NextLink *}
<script type="text/javascript" src="js/ctrlnavigate.js"></script>           

<!-- Листалка страниц -->
<div class="waper-container-item-content-shop-paginator">
	<center>
    <div class="waper-container-item-content-shop-paginator-links" style="display:inline-block;">
	
	{* Количество выводимых ссылок на страницы *}
	{$visible_pages = 200}

	{* По умолчанию начинаем вывод со страницы 1 *}
	{$page_from = 1}
	
	{* Если выбранная пользователем страница дальше середины "окна" - начинаем вывод уже не с первой *}
	{if $current_page_num > floor($visible_pages/2)}
		{$page_from = max(1, $current_page_num-floor($visible_pages/2)-1)}
	{/if}	
	
	{* Если выбранная пользователем страница близка к концу навигации - начинаем с "конца-окно" *}
	{if $current_page_num > $total_pages_num-ceil($visible_pages/2)}
		{$page_from = max(1, $total_pages_num-$visible_pages-1)}
	{/if}
	
	{* До какой страницы выводить - выводим всё окно, но не более ощего количества страниц *}
	{$page_to = min($page_from+$visible_pages, $total_pages_num-1)}

	{if $current_page_num==2}
	<a href="{url page=null}"><div class="waper-container-item-content-shop-paginator-links-arrow-disable-1"></div></a>
	{/if}

	{if $current_page_num>2}
	<a href="{url page=$current_page_num-1}"><div class="waper-container-item-content-shop-paginator-links-arrow-disable-1"></div></a>
	{/if}	

	{* Ссылка на 1 страницу отображается всегда *}
    <a href="{url page=null}">
        <div class="{if $current_page_num==1}waper-container-item-content-shop-paginator-links-item-selected{else}waper-container-item-content-shop-paginator-links-item{/if}">
            <span>1</span>
        </div>
    </a>
	
	{* Выводим страницы нашего "окна" *}	
	{section name=pages loop=$page_to start=$page_from}
		{* Номер текущей выводимой страницы *}	
		{$p = $smarty.section.pages.index+1}	
		{* Для крайних страниц "окна" выводим троеточие, если окно не возле границы навигации *}	
		

            <a href="{url page=$p}">
                <div class="{if $p==$current_page_num}waper-container-item-content-shop-paginator-links-item-selected{else}waper-container-item-content-shop-paginator-links-item{/if}">
                    <span>{$p}</span>
                </div>
            </a>


	{/section}

	{* Ссылка на последнююю страницу отображается всегда *}
    <a href="{url page=$total_pages_num}">
        <div class="{if $current_page_num==$total_pages_num}waper-container-item-content-shop-paginator-links-item-selected{else}waper-container-item-content-shop-paginator-links-item{/if}">
            <span>{$total_pages_num}</span>
        </div>
    </a>	
	
	


	{if $current_page_num<$total_pages_num}
	<a href="{url page=$current_page_num+1}"><div class="waper-container-item-content-shop-paginator-links-arrow-disable-2"></div></a>
	{/if}


	
	</div>
	</center>
</div>
<!-- Листалка страниц (The End) -->
{/if}