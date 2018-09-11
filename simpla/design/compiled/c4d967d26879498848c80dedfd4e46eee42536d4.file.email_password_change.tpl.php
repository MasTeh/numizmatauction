<?php /* Smarty version Smarty-3.1.18, created on 2016-10-27 14:07:59
         compiled from "/home/u457006/numisrus.ru/www/simpla/design/html/email_password_change.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5999262565811e00feecf94-40660096%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c4d967d26879498848c80dedfd4e46eee42536d4' => 
    array (
      0 => '/home/u457006/numisrus.ru/www/simpla/design/html/email_password_change.tpl',
      1 => 1452245530,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5999262565811e00feecf94-40660096',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5811e0100d5703_02028402',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5811e0100d5703_02028402')) {function content_5811e0100d5703_02028402($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars['subject'] = new Smarty_variable("Смена пароля вашей учётной записи на Нумис-Рус", null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['subject'] = clone $_smarty_tpl->tpl_vars['subject'];?>

<h1 style="font-weight:normal;font-family:arial;">
Пароль для вашей учётной записи на сайте Нумис-Рус был изменён администратором.
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
</table>
<br><br><?php }} ?>
