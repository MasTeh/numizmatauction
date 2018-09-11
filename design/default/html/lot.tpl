{* Страница лота *}


<input type="hidden" id="time_left" value="{$time_left}" />
<input type="hidden" id="lot_id" value="{$lot->id}" />
<input type="hidden" id="user_id" value="{$user->id}" />
{if $autobid}<input type="hidden" id="autobid_amount" value="{$autobid}" />{/if}

<script type="text/javascript" src="design/default/js/lot.js"></script>

{if $user}
<input type="hidden" value="{$token}" id="token" />
{/if}

<div class="waper-container-item">


    <!-- Контент -->
    <div class="waper-container">
    	<div class="waper-container-top">
        	<!-- Хлебные крошки -->
            <div class="waper-container-top-siteway-1">
				<a href="/">Главная</a> →  <a href="/auctions">Все аукционы</a> → 
				<a href="/auctions/{$lot->auction_id}">Аукцион № {$lot->auction_id}</a> →  
				 {$lot->product->name}
            </div>
            <!-- Заголовок -->
            <div class="waper-container-top-overall-1">
            	<div class="waper-container-top-overall-1-title">
                	<h1>Лот № {$lot->order_num}. <span style="color:#999">{$lot->product->name}</span></h1>
                </div>
            </div>
        </div>
        <div class="waper-container-item">
            <!-- Большие картинки -->
            {foreach $lot->product->images as $img}
            <div class="waper-container-item-content-shop-gallery-big">
				<div class="waper-container-item-content-shop-gallery-big-close"></div>
                <img src="{$img->filename|resize:530:530}" alt="{$lot->product->name}"/>
            </div>
            {/foreach}

            <!-- Контент -->
            <div class="waper-container-item-content-2">
                <div class="waper-container-item-content-shop-gallery">
                	{foreach $lot->product->images as $img}
                    <div class="waper-container-item-content-shop-gallery-prev">
                    	<img src="{$img->filename|resize:260:260}" alt="{$lot->product->name}"/>
                    </div>
                    {/foreach}
                </div>
                <div class="waper-container-item-content-auction-descrit">
                    
                    <div class="waper-container-item-content-auction-descrit-specif">
                    	<div class="waper-container-item-content-auction-descrit-specif-left">
                    	    {foreach $lot->product->properties as $p}
                            <p>{$p->name}: <strong>{$p->value}</strong></p>
                            {/foreach}
                        </div>
                        <div class="waper-container-item-content-auction-descrit-specif-right">
                            <p><strong>Время закрытия лота:</strong><br> {$lot->time_end|date_format:"%d.%m.%Y %R"}</p>
                            <p><strong>Текущая ставка:</strong> <span id="current_bet">{$lot->max_price|number_format:0:".":" "}</span> р.</p>
                            <p><strong>Шаг торгов:</strong> <span id="bet_size">{($lot->bet_size)|number_format:0:".":" "}</span> р.</p>
                            <p><strong>Количество ставок:</strong> <span id="bets_count">{$lot->bets|count}</span></p>
                        </div>
                        <div class="waper-container-item-content-auction-descrit-specif-right">
                            
                            <p><strong>Год:</strong><br> {$lot->product->prop_year}</p>
                            <p><strong>Сохранность:</strong><br> {$lot->product->prop_save}</p>
                            <p><strong>Материал:</strong><br> {$lot->product->prop_material}</p>
                            <p><strong>Буквы:</strong><br> {$lot->product->prop_letters}</p>
                            <p><strong>Вес:</strong><br> {$lot->product->prop_weight} гр</p>
                            
                        </div>
                       

                    </div>
                </div>
            </div>            
            <div class="waper-container-item-content-2">
            	<!-- Таймер -->
                <div class="waper-container-item-content-auction-timer" id="time_left_container">
                	До окончания торгов осталось: <strong id="time_left_tablo">--:--:--</strong>
                </div>
                <!-- Панель -->                
                <div class="waper-container-item-content-auction-panel bets_panel">
                	{if $user}
                    {if $user->buyer==1}
<!--                 	<div class="waper-container-item-content-auction-panel-link">
                    	<a href="#" class="add_to_profile">
                        	Добавить в личный кабинет
                        </a>
                    </div> -->
                    {if $autobid}
                    После ставки др. игрока Ваша ставка поставится автоматически
                    {else}
                    <div class="waper-container-item-content-auction-data-1">
                    	<span>Ваша ставка:</span>
                        <div class="waper-container-item-content-auction-data-1-filed">
                        	<input type="number" name="bet_value" class="data-1-filed" value="{$lot->next_bet}" min="{$lot->next_bet}" />р.
                        </div>
                        <a href="#" class="set_bet_btn" title="Сделать ставку">
                            <div class="waper-container-item-content-auction-data-1-button">
                                Сделать ставку
                            </div>
                        </a>
                    </div>
                    {/if}
                    <div class="waper-container-item-content-auction-data-2">
                    	<div class="waper-container-item-content-auction-data-2-filed">
                        	<input type="text" name="autobid_limit" class="data-2-filed" value="{if $autobid}{$autobid}{/if}" />р.
                        </div>
                        <a href="#" class="set_autobid_btn" title="Установить автобид">
                            <div class="waper-container-item-content-auction-data-2-button">
                                {if $autobid}
                                Изменить<br>автобид
                                {else}
                                Установить<br>автобид
                                {/if}
                            </div>
                        </a>
                    </div>
                    <a href="#" class="help-btn" style="padding:4px; display:inline-block; margin-top:5px; text-decoration:none; font-weight:bold"
                    title="Ставка будет делаться автоматически, не превышая указанную сумму.">?</a>



                    {else}
                    Для участия в торгах Вам необходимо получить статус покупателя.
                    {/if}
                    
                    {else}
                    Для участия в торгах вам необходимо авторизироваться. <a class="login_link" href="user/login">Войти</a>

                    {/if}
                </div>
                <div id="bets_list">

                </div>
	<div style="clear:both">
	<p>{$lot->product->body}</p>
	</div>
            </div>
            <div class="waper-container-item-content-backlink-1">
				<a href="javascript:history.go(-1);"  title="Назад к списку лотов">
					Назад к списку лотов
				</a>
			</div>
        </div>
    </div>
</div>