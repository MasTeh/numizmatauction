 	<div style="font-size:22px; width:100%; padding:10px; margin-bottom:30px; background:#fff; border:1px solid #dadada">
		<div style="display:inline-block">
		Название лота: <span style="color:#079c00 !important">{$product->name}</span> 
		
			(# {$lot->order_num})

		</div>
		<div style="float:right; display:inline-block; font-size:16px; padding:5px">
			<a target="_blank" href="../lot/{$lot->id}">открыть на сайте</a>
		</div>

	</div> 
	<div style="float:left"></div>
	<div style="width:45%; display:inline-block; float:left">
		<div id="product_categories" {if !$categories}style='display:none;'{/if}>
			<label>Категория</label>
			<div>
				<ul>
					{foreach $product_categories as $product_category name=categories}
					<li>
						<select name="categories[]" disabled>
							{function name=category_select level=0}
							{foreach $categories as $category}
									<option value='{$category->id}' {if $category->id == $selected_id}selected{/if} category_name='{$category->name|escape}'>{section name=sp loop=$level}&nbsp;&nbsp;&nbsp;&nbsp;{/section}{$category->name|escape}</option>
									{category_select categories=$category->subcategories selected_id=$selected_id  level=$level+1}
							{/foreach}
							{/function}
							{category_select categories=$categories selected_id=$product_category->id}
						</select>
											
					</li>
					{/foreach}		
				</ul>
			</div>
		</div>
	</div>
	<div style="width:45%; display:inline-block; float:left">
		<div class="admin_list admin_selected_block">
			{if $users}

			<label style="font-weight:bold;padding:0px 10px">Продавец</label>

			{foreach $users as $u}	   		
			{if $u->id==$product->user_id}
		    <a href="index.php?module=UserAdmin&id={$u->id}" target="_blank" style="font-size:18px">(# {$u->id}) {$u->fam} {$u->name|truncate:1:''}. {$u->otch|truncate:1:''}.</a>
		    {/if}
		    {/foreach}
			



			{/if}	

		</div>
	</div>

	<div style="float:left"></div>



	
	<div id="column_left" style="width:260px;">
		
		<!-- Изображения товара -->	
		<div class="block layer images">
			<h2>Изображения товара
			</h2>
			<ul>{foreach $product_images as $image}<li>					
					<a href="{$image->filename|resize:500:500}" target="_blank"><img src="{$image->filename|resize:200:200}" alt="" /></a>
				</li>{/foreach}</ul>

		</div>


	</div>

	<div id="column_right">

		<div class="block layer" style="width:660px" {if !$categories}style='display:none;'{/if}>
			<h2>Свойства товара			
			</h2>

		<div>
		<div style="width:285px; display:inline-block; font-size:14px; padding:6px; border-bottom:1px dotted #ccc">Год</div>
		<div style="width:270px; display:inline-block; font-size:14px; padding:6px; border-bottom:1px dotted #717171">{$product->prop_year}</div>
		</div>
		<div>
		<div style="width:285px; display:inline-block; font-size:14px; padding:6px; border-bottom:1px dotted #ccc">Сохранность</div>
		<div style="width:270px; display:inline-block; font-size:14px; padding:6px; border-bottom:1px dotted #717171">{$product->prop_save}</div>
		</div>
		<div>
		<div style="width:285px; display:inline-block; font-size:14px; padding:6px; border-bottom:1px dotted #ccc">Материал</div>
		<div style="width:270px; display:inline-block; font-size:14px; padding:6px; border-bottom:1px dotted #717171">{$product->prop_material}</div>
		</div>
		<div>
		<div style="width:285px; display:inline-block; font-size:14px; padding:6px; border-bottom:1px dotted #ccc">Буквы</div>
		<div style="width:270px; display:inline-block; font-size:14px; padding:6px; border-bottom:1px dotted #717171">{$product->prop_letters}</div>
		</div>	
		<div>
		<div style="width:285px; display:inline-block; font-size:14px; padding:6px; border-bottom:1px dotted #ccc">Вес</div>
		<div style="width:270px; display:inline-block; font-size:14px; padding:6px; border-bottom:1px dotted #717171">{$product->prop_weight} грамм</div>
		</div>								
		
		</div>
		
		<!-- Свойства товара (The End)-->


		<div class="block layer" style="width:660px; margin-top:30px">
			<h2>Торги 
				{if $lot->status==1}(не начинались)
				{else if $lot->status==2}(идут)
				{else if $lot->status==3}(закончились)
				{else if $lot->status==4}(лот не продан)
				{/if}
			</h2>
			
			<div>
			<div style="width:285px; display:inline-block; font-size:14px; padding:6px; border-bottom:1px dotted #ccc">
				Минимальная отпускная цена
			</div>
			<div style="width:270px; display:inline-block; font-size:14px; padding:6px; border-bottom:1px dotted #717171">
				{$product_variants[0]->price|number_format:0:".":" "} руб</div>
			</div>			
			
			{if $lot->bets}
			{foreach $lot->bets as $bet name=bets}

			<div>
			<div style="width:285px; display:inline-block; font-size:14px; padding:6px; border-bottom:1px dotted #ccc">
				<a target="_blank" href="index.php?UserAdmin&id={$bet->user->id}">(#{$bet->user->id}) {$bet->user->fam} {$bet->user->name|truncate:1:''}. {$bet->user->otch|truncate:1:''}.</a>
			</div>
			<div style="width:270px; display:inline-block; font-size:14px; padding:6px; border-bottom:1px dotted #717171">
				{$bet->value|number_format:0:".":" "} руб</div>
			</div>				

			{/foreach}
			{/if}

			<br><br>

			{if $winner->value>0}
			<div style="padding:10px; background:#b0ffc1">
			<h3>Конечная цена {$winner->value|number_format:0:".":","} руб, победитель: 
			<a target="_blank" href="index.php?module=UserAdmin&id={$winner->user->id}">
				(#{$winner->user->id}) {$winner->user->fam} {$winner->user->name|truncate:1:''}. {$winner->user->otch|truncate:1:''}.
			</a> <!-- <a href="{url lot_action=to_order to_lot_id={$winner->id} to_user_id={$winner->user->id}}">передать в сделки</a> -->
			</h3>
			</div>
			{/if}

		</div>


	</div>

