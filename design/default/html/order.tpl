{* Страница заказа *}

{$meta_title = "Ваш заказ №`$order->id`" scope=parent}


<div class="waper-container">
	<div class="waper-container-top">
    	<!-- Хлебные крошки -->
        <div class="waper-container-top-siteway-1">
			<a href="/">Главная</a> > <a href="user">Личный кабинет</a> > Оформление заказа № {$order->id}
        </div>
        <!-- Заголовок -->
        <div class="waper-container-top-overall-1">
        	<div class="waper-container-top-overall-1-title">
            	<h1>Оформление заказа № {$order->id}</h1>
            </div>
        </div>
    </div>
    <div class="waper-container-item">
        <!-- Контент -->
        <div class="waper-container-item-content-2">
            <div class="waper-container-item-content-text-1">
            	<p><span><strong>Ваш заказ № {$order->id} успешно оформлен!</strong></span></p>
                <p>Стоимость заказа {$order->total_price|number_format:0:".":" "} рублей. Наш консультант свяжется с вами в скором времени. Спасибо.</p>
            </div>
            <div class="waper-container-item-content-backlink-1">
			<a href="/">
				Назад на главную
			</a>
		</div>
		</div>
    </div>
</div>

 