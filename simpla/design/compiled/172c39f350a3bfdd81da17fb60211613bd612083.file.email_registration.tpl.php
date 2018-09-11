<?php /* Smarty version Smarty-3.1.18, created on 2016-10-27 14:08:00
         compiled from "/home/u457006/numisrus.ru/www/simpla/design/html/email_registration.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8408381575811e0101055f8-35746723%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '172c39f350a3bfdd81da17fb60211613bd612083' => 
    array (
      0 => '/home/u457006/numisrus.ru/www/simpla/design/html/email_registration.tpl',
      1 => 1473160829,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8408381575811e0101055f8-35746723',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5811e0101366e9_55003670',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5811e0101366e9_55003670')) {function content_5811e0101366e9_55003670($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars['subject'] = new Smarty_variable("Произведена регистрация на Нумис-Рус", null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['subject'] = clone $_smarty_tpl->tpl_vars['subject'];?>

<h1 style="font-weight:normal;font-family:arial;">
Вы были зарегистрированы на сайте "Нумис-Рус".
</h1>


<p>Данные вашей учётной записи. <br /> Не сообщайте их даже сотрудникам нашей компании.</p>

<table cellpadding="6" cellspacing="0" style="border-collapse: collapse;">

  <tr>
    <td style="padding:6px; width:170; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;">
      Логин
    </td>
    <td style="padding:6px; width:330; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
      <?php echo $_smarty_tpl->tpl_vars['user']->value->email;?>

    </td>
  </tr>

  <tr>
    <td style="padding:6px; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;">
      Пароль
    </td>
    <td style="padding:6px; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
      <?php echo $_smarty_tpl->tpl_vars['user']->value->password;?>

    </td>
  </tr>


  <tr>
    <td style="padding:6px; width:170; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;">
      ФИО
    </td>
    <td style="padding:6px; width:330; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
      <?php echo $_smarty_tpl->tpl_vars['user']->value->fam;?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value->name;?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value->otch;?>

    </td>
  </tr>
  <tr>
    <td style="padding:6px; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;">
      Адрес
    </td>
    <td style="padding:6px; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
      Город <?php echo $_smarty_tpl->tpl_vars['user']->value->city;?>
, улица <?php echo $_smarty_tpl->tpl_vars['user']->value->street;?>
, дом <?php echo $_smarty_tpl->tpl_vars['user']->value->number;?>

    </td>
  </tr>

  <tr>
    <td style="padding:6px; width:170; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;">
      Номер телефона
    </td>
    <td style="padding:6px; width:330; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
      <?php echo $_smarty_tpl->tpl_vars['user']->value->phone;?>

    </td>
  </tr>

</table>
<br><br><?php }} ?>
