{* Шаблон письма продавцу о начале аукциона *}
<div style="padding:5%">
<center>
<img src="http://numisrus.ru/design/default/images/logo-1.png" />
<h1 style="font-weight:normal;font-family:arial;">
	Здравствуйте, {$user->name} {$user->fam} {$user->otch}. 
</h1>
<h2 style="font-weight:normal;font-family:arial;">
	Вы выставили лоты на аукцион № {$auction->id}, который состоится {$auction->date_start|date_format:"%d.%m.%Y в %R"}
</h2>
</center>
<h2 style="font-weight:normal;font-family:arial;">Ваши лоты:</h2>


    <table style="font-family:Arial; font-size:12px" border="1" cellpadding="4" cellspacing="0" bordercolor="#CCCCCC">
        <tr>
       	<td style="min-width:35px">
       	<span>№ лота</span>
            </td>
	    <td></td>
            <td style="font-weight:bold">                
            	<span>Наименование</span>
            </td>
            <td style="min-width:50px;font-weight:bold"><span>Год</span>
            </td>
            <td style="min-width:50px;font-weight:bold"><span>Сост.</span>
            </td>
            <td style="min-width:80px;font-weight:bold"><span>Материал</span>
            </td>
            <td style="min-width:60px;font-weight:bold"><span>Буквы</span>
            </td>
            <td style="min-width:50px;font-weight:bold"><span>Вес</span>
            </td>

        </tr>

        {foreach $user->lots as $lot}
        <tr>
        	<td class="cell1">
            	<span>{$lot->order_num}</span>
            </td>
	    <td>
		{if $lot->images[0]}<img src="{$lot->images[0]->filename|resize:100:100}" alt="{$lot->name}"/>{/if}
	    </td>
            <td class="lot_name">
            	<span><a href="http://numisrus.ru/lot/{$lot->lot_id}" target="_blank" title="{$lot->user_name}">{$lot->name}</a></span>
            </td>  
            <td><span>{if $lot->prop_year==0}{else}{$lot->prop_year}{/if}</span></td>
            <td><span>{$lot->prop_save}</span></td>
            <td><span>{$lot->prop_material}</span></td>
            <td><span><nobr>{$lot->prop_letters}</nobr></span></td>
            <td><span><nobr>{if $lot->prop_weight==0}{else}{$lot->prop_weight}{/if}</nobr></span></td>
        </tr>
        {/foreach}

    </table>


<div  style="font-weight:normal;font-family:arial; font-size:12px">
{$under_text->body}
</div>

</div>