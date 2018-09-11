{$subject="Произведена регистрация на Нумис-Рус" scope=parent}

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


  <tr>
    <td style="padding:6px; width:170; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;">
      ФИО
    </td>
    <td style="padding:6px; width:330; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
      {$user->fam} {$user->name} {$user->otch}
    </td>
  </tr>
  <tr>
    <td style="padding:6px; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;">
      Адрес
    </td>
    <td style="padding:6px; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
      Город {$user->city}, улица {$user->street}, дом {$user->number}
    </td>
  </tr>

  <tr>
    <td style="padding:6px; width:170; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;">
      Номер телефона
    </td>
    <td style="padding:6px; width:330; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
      {$user->phone}
    </td>
  </tr>

</table>
<br><br>