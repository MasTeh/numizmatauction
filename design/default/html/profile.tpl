{* Страница профиля *}


{$meta_title = "Профиль" scope=parent}
<input type="hidden" name="user_id" value="{$user->id}">
<input type="hidden" name="user_area" value="{$user->area}">
<!-- Контент -->
<div class="waper-container">
    <div class="waper-container-top">
        <!-- Хлебные крошки -->
        <div class="waper-container-top-siteway-1">
            <a href="/">Главная</a> → Профиль
        </div>

    </div>
    <div class="waper-container-item" style="margin-top:-70px">

<div class="waper-container-top">
    <div class="waper-container-top-profile-nav">
        <a href="user" title="Профиль">
            <div class="waper-container-top-profile-nav-item-selesed">
                <span>Профиль</span>
            </div>
        </a>
        {if $user->buyer}
        <a href="user/bets" title="Текущие торги">
            <div class="waper-container-top-profile-nav-item">
                <span>Текущие торги</span>
            </div>
        </a>
        {/if}
        <a href="user/history" title="Прошедшие аукционы">
            <div class="waper-container-top-profile-nav-item">
                <span>Прошедшие<br>аукционы</span>
            </div>
        </a>
        {if $user->seller}
        <a href="user/seller" title="Кабинет продавца">
            <div class="waper-container-top-profile-nav-item">
                <span>Кабинет<br>продавца</span>
            </div>
        </a>
        {/if}
        <a href="cart" title="Кабинет продавца">
            <div class="waper-container-top-profile-nav-item">
                <span>Корзина</span>
            </div>
        </a>
    </div>
</div>        

        <!-- Контент -->
        <div class="waper-container-item-content-2">
            <!-- Регистрация -->
            <div class="waper-container-item-content-registration">
                <div class="waper-container-item-content-registration-title">
                    <h3>Профиль</h3>
                </div>

                <div class="waper-container-item-content-registration-block">
                    <div class="forms-1">
                            {if $error}
                            <div class="message_error">
                                {if $error == 'empty_name'}Введите имя
                                {elseif $error == 'empty_email'}Введите email
                                {elseif $error == 'empty_password'}Введите пароль
                                {elseif $error == 'user_exists'}Пользователь с таким email уже зарегистрирован
                                {elseif $error == 'captcha'}Извините, неверно указано число на картинке, попробуйте ещё раз.
                                {else}{$error}{/if}
                            </div>
                            {/if}    
                            {if $user_updated}                   
                            <div class="message message_success">
                                Данные обновлены
                            </div>
                            {/if}
                        <form method="post" id="reg_form">
                            <div class="forms-1-row-1">
                                <div class="forms-1-row-1-col">
                                    <span><strong>Имя:*</strong></span>
                                </div>
                                <div class="forms-1-row-1-filed">
                                    <input type="text" name="name" data-format=".+" data-notice="Введите имя, пожалуйста" value="{$user->name}" 
                                    class="form-filed-1"  />
                                </div>
                            </div>
                            <div class="forms-1-row-1">
                                <div class="forms-1-row-1-col">
                                    <span><strong>Фамилия:*</strong></span>
                                </div>
                                <div class="forms-1-row-1-filed">
                                    <input type="text" name="fam" data-format=".+" data-notice="Введите фамилию, пожалуйста" value="{$user->fam}" 
                                    class="form-filed-1"  />
                                </div>
                            </div>
                            <div class="forms-1-row-1">
                                <div class="forms-1-row-1-col">
                                    <span><strong>Отчество:*</strong></span>
                                </div>
                                <div class="forms-1-row-1-filed">
                                    <input type="text" name="otch" data-format=".+" data-notice="Введите отчество, пожалуйста" value="{$user->otch}" 
                                    class="form-filed-1"  />
                                </div>
                            </div>
                            <div class="forms-1-row-1">
                                <div class="forms-1-row-1-col">
                                    <span>Я регистрируюсь как:</span>
                                </div>
                                <div class="forms-1-row-1-filed">
                                    <input type="checkbox" name="is_buyer" {if $user->buyer}checked{/if} id="is_buyer" /> <label for="is_buyer">Покупатель</label><br>
                                    <input type="checkbox" name="is_seller" {if $user->seller}checked{/if} id="is_seller" /> <label for="is_seller">Продавец</label><br>
                                </div>
                            </div>                            
                            <div class="forms-1-row-1">
                                <div class="forms-1-row-1-col">
                                    <span><strong>E-Mail:*</strong></span>
                                </div>
                                <div class="forms-1-row-1-filed">
                                    <input type="text" name="email" data-format="email" data-notice="Введите E-Mail" value="{$user->email}" 
                                    class="form-filed-1"  />
                                </div>
                            </div>
                            <div class="forms-1-row-1">
                                <div class="forms-1-row-1-col">
                                    <span>Регион:</span>
                                </div>
                                <div class="forms-1-row-1-filed">
                                    <input type="text" name="region" value="{$user->region}" class="form-filed-1"  />
                                </div>
                            </div>
                            <div class="forms-1-row-1">
                                <div class="forms-1-row-1-col">
                                    <span>Почтовый индекс:</span>
                                </div>
                                <div class="forms-1-row-1-filed">
                                    <input type="text" name="postcode" value="{$user->postcode}" class="form-filed-1"  />
                                </div>
                            </div>
                            <div class="forms-1-row-1">
                                <div class="forms-1-row-1-col">
                                    <span>Город<br>(населенный пункт):</span>
                                </div>
                                <div class="forms-1-row-1-filed">
                                    <input type="text" name="city" value="{$user->city}" class="form-filed-1"  />
                                </div>
                            </div>
                            <div class="forms-1-row-1">
                                <div class="forms-1-row-1-col">
                                    <span>Район:</span>
                                </div>
                                <div class="forms-1-row-1-filed">
                                    <select name="area">
                                        <option value="Московская область">Московская область</option>
                                        <option value="Ленинградская область">Ленинградская область</option>
                                        <option value="Свердловская область">Свердловская область</option>
                                        <option value="Агинский Бурятский автономный округ">Агинский Бурятский автономный округ</option>
                                        <option value="Адыгея республика">Адыгея республика</option>
                                        <option value="Алтай республика">Алтай республика</option>
                                        <option value="Алтайский край">Алтайский край</option>
                                        <option value="Амурская область">Амурская область</option>
                                        <option value="Архангельская область">Архангельская область</option>
                                        <option value="Астраханская область">Астраханская область</option>
                                        <option value="Башкортостан республика">Башкортостан республика</option>
                                        <option value="Белгородская область">Белгородская область</option>
                                        <option value="Брянская область">Брянская область</option>
                                        <option value="Бурятия республика">Бурятия республика</option>
                                        <option value="Владимирская область">Владимирская область</option>
                                        <option value="Волгоградская область">Волгоградская область</option>
                                        <option value="Вологодская область">Вологодская область</option>
                                        <option value="Воронежская область">Воронежская область</option>
                                        <option value="Дагестан республика">Дагестан республика</option>
                                        <option value="Еврейская автономная область">Еврейская автономная область</option>
                                        <option value="Ивановская область">Ивановская область</option>
                                        <option value="Ингушетия республика">Ингушетия республика</option>
                                        <option value="Иркутская область">Иркутская область</option>
                                        <option value="Кабардино-Балкария республика">Кабардино-Балкария республика</option>
                                        <option value="Калининградская область">Калининградская область</option>
                                        <option value="Калмыкия республика">Калмыкия республика</option>
                                        <option value="Калужская область">Калужская область</option>
                                        <option value="Камчатская область">Камчатская область</option>
                                        <option value="Карачаево-Черкесская республика">Карачаево-Черкесская республика</option>
                                        <option value="Карелия республика">Карелия республика</option>
                                        <option value="Кемеровская область">Кемеровская область</option>
                                        <option value="Кировская область">Кировская область</option>
                                        <option value="Коми республика">Коми республика</option>
                                        <option value="Корякский автономный округ">Корякский автономный округ</option>
                                        <option value="Костромская область">Костромская область</option>
                                        <option value="Краснодарский край">Краснодарский край</option>
                                        <option value="Красноярский край">Красноярский край</option>
                                        <option value="Курганская область">Курганская область</option>
                                        <option value="Курская область">Курская область</option>                                        
                                        <option value="Липецкая область">Липецкая область</option>
                                        <option value="Магаданская область">Магаданская область</option>
                                        <option value="Марий Эл республика">Марий Эл республика</option>
                                        <option value="Мордовия республика">Мордовия республика</option></option>                               
                                        <option value="Мурманская область">Мурманская область</option>
                                        <option value="Ненецкий автономный округ">Ненецкий автономный округ</option>
                                        <option value="Нижегородская область">Нижегородская область</option>
                                        <option value="Новгородская область">Новгородская область</option>
                                        <option value="Новосибирская область">Новосибирская область</option>
                                        <option value="Омская область">Омская область</option>
                                        <option value="Оренбургская область">Оренбургская область</option>
                                        <option value="Орловская область">Орловская область</option>
                                        <option value="Пензенская область">Пензенская область</option>
                                        <option value="Пермский край">Пермский край</option>
                                        <option value="Приморский край">Приморский край</option>
                                        <option value="Псковская область">Псковская область</option>
                                        <option value="Ростовская область">Ростовская область</option>
                                        <option value="Рязанская область">Рязанская область</option>
                                        <option value="Самарская область">Самарская область</option>
                                        <option value="Саратовская область">Саратовская область</option>
                                        <option value="Саха(Якутия) республика">Саха(Якутия) республика</option>
                                        <option value="Сахалинская область">Сахалинская область</option>                                        
                                        <option value="Северная Осетия-Алания республика">Северная Осетия-Алания республика</option>
                                        <option value="Смоленская область">Смоленская область</option>
                                        <option value="Ставропольский край">Ставропольский край</option>
                                        <option value="Таймырский автономный округ">Таймырский автономный округ</option>
                                        <option value="Тамбовская область">Тамбовская область</option>
                                        <option value="Татарстан республика">Татарстан республика</option>
                                        <option value="Тверская область">Тверская область</option>
                                        <option value="Томская область">Томская область</option>
                                        <option value="Тульская область">Тульская область</option>
                                        <option value="Тыва республика">Тыва республика</option>
                                        <option value="Тюменская область">Тюменская область</option>
                                        <option value="Удмуртия республика">Удмуртия республика</option>
                                        <option value="Ульяновская область">Ульяновская область</option>
                                        <option value="Усть-Ордынский Бурятский автономный округ">Усть-Ордынский Бурятский автономный округ</option>
                                        <option value="Хабаровский край">Хабаровский край</option>
                                        <option value="Хакасия республика">Хакасия республика</option>
                                        <option value="Ханты-Мансийский автономный округ">Ханты-Мансийский автономный округ</option>
                                        <option value="Челябинская область">Челябинская область</option>
                                        <option value="Чеченская республика">Чеченская республика</option>
                                        <option value="Читинская область">Читинская область</option>
                                        <option value="Чувашская республика">Чувашская республика</option>
                                        <option value="Чукотский автономный округ">Чукотский автономный округ</option>
                                        <option value="Эвенкийский автономный округ">Эвенкийский автономный округ</option>
                                        <option value="Ямало-Ненецкий автономный округ">Ямало-Ненецкий автономный округ</option>
                                        <option value="Ярославская область">Ярославская область</option>
                                        <option value="Другая (нет в списке)">Другая (нет в списке)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="forms-1-row-1">
                                <div class="forms-1-row-1-col">
                                    <span>Улица:</span>
                                </div>
                                <div class="forms-1-row-1-filed">
                                    <input type="text" name="street" value="{$user->street}" class="form-filed-1"  />
                                </div>
                            </div>
                            <div class="forms-1-row-1">
                                <div class="forms-1-row-1-col">
                                    <span>Номер дома:</span>
                                </div>
                                <div class="forms-1-row-1-filed">
                                    <input type="text" name="number" value="{$user->number}" class="form-filed-1"  />
                                </div>
                            </div>
                            <div class="forms-1-row-1">
                                <div class="forms-1-row-1-col">
                                    <span>Корпус:</span>
                                </div>
                                <div class="forms-1-row-1-filed">
                                    <input type="text" name="housing" value="{$user->housing}" class="form-filed-1"  />
                                </div>
                            </div>
                            <div class="forms-1-row-1">
                                <div class="forms-1-row-1-col">
                                    <span>Номер<br>офиса/квартиры:</span>
                                </div>
                                <div class="forms-1-row-1-filed">
                                    <input type="text" name="office" value="{$user->office}" class="form-filed-1"  />
                                </div>
                            </div>
                            <div class="forms-1-row-1">
                                <div class="forms-1-row-1-col">
                                    <span><strong>Телефон:*</strong></span>
                                </div>
                                <div class="forms-1-row-1-filed">
                                    <input type="text" name="phone" data-format=".+" data-notice="Введите, пожалуйста, номер телефона" 
                                    class="form-filed-1" value="{$user->phone}" placeholder="+7 (   )" />
                                </div>
                            </div>
                            <div class="forms-1-row-1">
                                <div class="forms-1-row-1-col">
                                    <span><strong>Логин:*</strong></span>
                                </div>
                                <div class="forms-1-row-1-filed">
                                    <input type="text" name="login" value="{$user->login}" class="form-filed-1"  />
                                </div>
                            </div>
                            <div class="forms-1-row-1">
                                <div class="forms-1-row-1-col">
                                    <span><strong>Новый пароль (если меняете):</strong></span>
                                </div>
                                <div class="forms-1-row-1-filed">
                                    <input type="password" name="password" class="form-filed-1" value="" />
                                </div>
                            </div>
                            <div class="forms-1-row-1">
                                <div class="forms-1-row-1-col">
                                    <span><strong>Старый пароль:</strong></span>
                                </div>
                                <div class="forms-1-row-1-filed">
                                    <input type="password" name="old_password" class="form-filed-1" value="" />
                                </div>
                            </div>
    


                            <input type="submit" name="register" value="Сохранить" class="form-button-22" />
                        </form>
                    </div>
                    <div class="waper-container-item-content-registration-block-shadow"></div>
                </div>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">

$(function() {

    $('select[name=area] option').each(function() {
        if ($(this).html()==$('input[name=user_area]').val()) $(this).attr('selected', 'selected');
    });

});

</script>
