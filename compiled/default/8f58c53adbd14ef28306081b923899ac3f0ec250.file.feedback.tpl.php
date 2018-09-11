<?php /* Smarty version Smarty-3.1.18, created on 2016-10-24 09:35:13
         compiled from "/home/u457006/numisrus.ru/www/design/default/html/feedback.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1795589302580daba11244b7-04991178%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8f58c53adbd14ef28306081b923899ac3f0ec250' => 
    array (
      0 => '/home/u457006/numisrus.ru/www/design/default/html/feedback.tpl',
      1 => 1472933325,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1795589302580daba11244b7-04991178',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page' => 0,
    'error' => 0,
    'name' => 0,
    'email' => 0,
    'message' => 0,
    'message_sent' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_580daba1318cb2_76356971',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_580daba1318cb2_76356971')) {function content_580daba1318cb2_76356971($_smarty_tpl) {?><?php if (!is_callable('smarty_function_math')) include '/home/u457006/numisrus.ru/www/Smarty/libs/plugins/function.math.php';
?>




<?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable("/".((string)$_smarty_tpl->tpl_vars['page']->value->url), null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['canonical'] = clone $_smarty_tpl->tpl_vars['canonical'];?>

<div class="waper-container">
	<div class="waper-container-top">
    	<!-- Хлебные крошки -->
        <div class="waper-container-top-siteway-1">
			<a href="" target="_parent" title="Главная">Главная</a> > Контакты
        </div>
        <!-- Заголовок -->
        <div class="waper-container-top-overall-1">
        	<div class="waper-container-top-overall-1-title">
            	<h1>Контакты</h1>
            </div>
        </div>
    </div>
    <div class="waper-container-item">
        <!-- Контент -->
        <div class="waper-container-item-content-2">
            <div class="waper-container-item-content-text-3">
				<div class="waper-container-item-content-text-3-phone">
					<strong>Телефон</strong>
                    <p>+7 (495) 960-85-49</p>
                </div>
                <div class="waper-container-item-content-text-3-adres">
					<strong>Адрес</strong>
                 <p>ул. Краснобогатырская д.2, офис 57<br/> <i>Режим работы: с 10:00 до 18:00 <br/>ежедневно, без выходных</i></p>
                </div>
                <div class="waper-container-item-content-text-3-email">
					<strong>Электронная почта</strong>
                    <p><a href="mailto:info@numisrus.ru" target="_blank" title="Отправить сообщение">info@numisrus.ru</a></p>
                </div>
			</div>
            <div class="waper-container-item-content-map">
            	<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=OWtsrMGubVDFDtidj3SD_SUDYpp7t3JE&amp;width=925&amp;height=400&amp;lang=ru_RU&amp;sourceType=constructor&amp;scroll=true"></script>
            </div>
            <div class="waper-container-item-content-form">
            	<div class="waper-container-item-content-form-title">
                	<h2>Отправить сообщение</h2>
                </div>
                <div class="waper-container-item-content-form-text">
                	<p>Если у вас возникли вопросы о нашей работе или пожелания или жалобы, или ещё какой-то текст вступительный. Выберите тему вопроса и укажите свой е-мэйл адрес, чтобы мы могли вам ответить.</p>
                </div>
				<?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
				<div class="message_error">
					<?php if ($_smarty_tpl->tpl_vars['error']->value=='captcha') {?>
					Неверно введена капча
					<?php } elseif ($_smarty_tpl->tpl_vars['error']->value=='empty_name') {?>
					Введите имя
					<?php } elseif ($_smarty_tpl->tpl_vars['error']->value=='empty_email') {?>
					Введите email
					<?php } elseif ($_smarty_tpl->tpl_vars['error']->value=='empty_text') {?>
					Введите сообщение
					<?php }?>
				</div>
				<?php }?>                
                <div class="waper-container-item-content-form-block">
                	<div class="forms-1">
                        <form action="" id="" method="POST">
                        	<div class="forms-1-row-1">
                            	<div class="forms-1-row-1-col">
                                    <span>Ваше имя:</span>
                                </div>
                                <div class="forms-1-row-1-filed">
                                    <input type="text" data-format=".+" data-notice="Введите имя" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name']->value, ENT_QUOTES, 'UTF-8', true);?>
" name="name"  class="form-filed-1" />
                                </div>
                            </div>
                            <div class="forms-1-row-1">
                                <div class="forms-1-row-1-col">
                                    <span>Ваш e-mail:</span>
                                </div>
                                <div class="forms-1-row-1-filed">
                                    <input type="text" data-format="email" data-notice="Введите email" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['email']->value, ENT_QUOTES, 'UTF-8', true);?>
" name="email" class="form-filed-1" />
                                </div>
                            </div>
                            <div class="forms-1-row-1">
                                <div class="forms-1-row-1-col">
                                    <span>Тема обращения:</span>
                                </div>
                                <div class="forms-1-row-1-filed">
                                    <input type="text" name="" id="" class="form-filed-1" value="" />
                                </div>
                            </div>
                            <div class="forms-1-row-2">
                                <div class="forms-1-row-2-col">
                                    <span>Текст сообщения:</span>
                                </div>
                                <div class="forms-1-row-2-filed">
<textarea data-format=".+" data-notice="Введите сообщение" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['message']->value, ENT_QUOTES, 'UTF-8', true);?>
" name="message" class="form-filed-2"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['message']->value, ENT_QUOTES, 'UTF-8', true);?>
</textarea>
                                </div>
                            </div>                            


<div class="captcha"><img src="captcha/image.php?<?php echo smarty_function_math(array('equation'=>'rand(10,10000)'),$_smarty_tpl);?>
"/></div> 
<input class="input_captcha" id="comment_captcha" type="text" name="captcha_code" value="" data-format="\d\d\d\d" data-notice="Введите капчу"/>

                         <br/><br/>
                         <input type="submit" name="feedback" style="padding:10px 20px; background: darkred; color:#fff; font-size:18px; border:none; border-radius:6px">
                         
                        </form>
                    </div>

	
		                
		               
                </div>
            </div>
		</div>
    </div>
</div>


<?php if ($_smarty_tpl->tpl_vars['message_sent']->value) {?>
<?php } else { ?>

<?php }?>
<?php }} ?>
