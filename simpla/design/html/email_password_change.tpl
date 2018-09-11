{$subject="Смена пароля вашей учётной записи на Нумис-Рус" scope=parent}

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
      {$user->email}
    </td>
  </tr>
  <tr>
    <td style="padding:6px; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;">
      Пароль
    </td>
    <td style="padding:6px; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
      {$user->password}
    </td>
  </tr>
</table>
<br><br>