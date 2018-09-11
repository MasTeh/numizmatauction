{* Шаблон письма покупателю о выйгрыше *}
<center>
<img src="http://numisrus.ru/design/default/images/logo-1.png" />
<h1 style="font-weight:normal;font-family:arial;">
	Здравствуйте, {$user->name} {$user->fam} {$user->otch}. 
</h1>
<h2>
	Поздравляем Вас, вы выйграли лот(ы) на аукционе № {$auction->id}
</h2>
</center>
<table cellpadding="6" cellspacing="0" style="border-collapse: collapse;">
	<tr style="background-color:#f0f0f0;">
		<td style="padding:3px; font-size:14px; border:1px solid #e0e0e0;font-family:arial;">
			№
		</td>
		<td style="padding:3px; font-size:14px; border:1px solid #e0e0e0;font-family:arial;">
			
		</td>		
		<td style="padding:3px; width:200px; font-size:14px; border:1px solid #e0e0e0;font-family:arial;">
			Название
		</td>
		<td style="padding:3px; font-size:14px; border:1px solid #e0e0e0;font-family:arial;">
			Описание
		</td>	
		<td style="padding:3px; font-size:14px; border:1px solid #e0e0e0;font-family:arial;">
			Цена
		</td>
	
	</tr>
	{foreach $user->deals as $deal}
	<tr style="background-color:#fff;">
		<td style="padding:3px; font-size:14px; border:1px solid #e0e0e0;font-family:arial;">
			{$deal->order_num}
		</td>
		<td style="padding:3px; font-size:14px; border:1px solid #e0e0e0;font-family:arial;">
			<a href="{$root_url}/lot/{$lot->lot_id}">{$deal->purchases[0]->product_name}</a>
		</td>
		<td style="padding:3px; font-size:14px; border:1px solid #e0e0e0;font-family:arial;">
			{foreach $deal->properties as $p}
				<b>{$p->name}</b>: {$p->value}; 
			{/foreach}
		</td>	
		<td style="padding:3px; font-size:14px; border:1px solid #e0e0e0;font-family:arial;">
			{$deal->purchases[0]->price} руб
		</td>
		
	</tr>
	{/foreach}
</table>
<h3>Сумма к оплате без пересылки, с учётом комиссии аукциона: {($user->summ*(1+$user->commission/100))|number_format:0:".":","} руб</h3>
<br><br>
{$under_text->body}