{* Вкладки *}
{capture name=tabs}
	<li class="active"><a href="index.php?module=AuctionsAdmin">Аукционы</a></li>
	<li><a href="index.php?module=LotsAdmin&current_auction={$auctions[0]->id}">Лоты</a></li>
{/capture}

{* Title *}
{$meta_title='Аукционы' scope=parent}

{* Заголовок *}
<div id="header">
	<h1>Аукционы</h1> 
	<a class="add" href="index.php?module=AuctionAdmin">Добавить аукцион</a>
</div>	

{if $message_error}
<!-- Системное сообщение -->
<div class="message message_error">
	<span class="text">{if $message_error=='bets_exists'}Данный аукцион был активен, удалять его нельзя
		{else if $message_error="lots_exists"}К данному аукциону привязаны лоты, если хотите удалить, сначала удалите лоты. А вот так просто взять и, ни с того ни с чего, удалить, так нельзя!
		{else}
		{$message_error}{/if}</span>
</div>
<!-- Системное сообщение (The End)-->
{/if}

<input type=hidden name="session_id" value="{$smarty.session.id}">

{if $auctions}
<div id="main_list">
	
	
	<form id="form_list" method="post">

		<div id="list">	
			<div class=" row" style="font-weight:bold">

				<div class="order_name cell" style="width:110px; padding-left:20px">
										
					№ аукциона	 				
	 				 	 			
				</div>
				<div class="order_date cell">				 	
	 				дата начала
				</div>
				<div class="order_date cell">				 	
	 				рассчётная дата закрытия
				</div>					
				<div class="order_date cell">				 	
	 				длительность лота
				</div>												
				<div class="name cell" style="white-space:nowrap;">
	 				закрытие первого лота
				</div>



				<div class="clear"></div>
			</div>	

			{foreach $auctions as $auction}
			<div class=" row">

				<div class="order_name cell" style="width:110px; padding-left:20px">
										
					<a href="index.php?module=AuctionAdmin&id={$auction->id}">Аукцион № {$auction->id}</a>
	 				 	 			
				</div>
				<div class="order_date cell">				 	
	 				{$auction->date_start} 
				</div>
	
				<div class="order_date cell">				 	
	 				{$auction->date_closing} 
				</div>				
				<div class="order_date cell">				 	
	 				{$auction->duration} 
				</div>												

				<div class="icons cell">	
					{if $auction->sum == 0}				
					<a class="delete" data-id="{$auction->id}" title="Удалить" href="#"></a>
					{/if}
				</div>	
				<div class="icons cell">
					
					{$auction->date_end} 
				</div>							
				<div class="clear"></div>
			</div>		
			{/foreach}
		</div>
	</form>
</div>

{else}

Нет аукцион

{/if}

{literal}
<script>
$(function() {

	$('a.delete').click(function() {
		if (confirm('Вы хотите удалить аукцион. Уверены?'))
		{
			window.location.href = 'index.php?module=AuctionsAdmin&action=delete&id='+$(this).attr('data-id');
		}
	});
 	
});
</script>
{/literal}
