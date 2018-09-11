// Аяксовая корзина
$(function() {


$('.add_to_cart').on('click', function(e) {
	e.preventDefault();

	if ($(this).attr('added')=='1') return false;
	variant_id = $(this).attr('variant_id');
	page = $(this).attr('page');

	$(this).attr('added','1');
	$(this).find('.add_to_basket_label').html('Добавлено');
	$(this).parent().parent().addClass('added_row');

	$.ajax({
		url: "ajax/cart.php",
		data: {variant: variant_id},
		dataType: 'json',
		success: function(data){
			$('#cart_informer').html(data);
		}
	});

	var o1 = $(this).offset();
	var o2 = $('#cart_informer').offset();
	var dx = o1.left - o2.left;
	var dy = o1.top - o2.top;
	var distance = Math.sqrt(dx * dx + dy * dy);
	if (page==1)
	{
		$(this).parent().parent().find('.products-photo-cell').find('img:first').effect("transfer", { to: $("#cart_informer"), className: "transfer_class" }, distance);	
		$('.transfer_class').html($(this).parent().parent().find('.products-photo-cell').find('img:first').clone());
		$('.transfer_class').find('img:first').css('height', '100%');
	}
	else
	{
		$('.waper-container-item-content-shop-gallery').find('img:first').effect("transfer", { to: $("#cart_informer"), className: "transfer_class" }, distance);	
		$('.transfer_class').html($('.waper-container-item-content-shop-gallery').find('img:first').clone());
		$('.transfer_class').find('img:first').css({'height':'100%'});
		
	}
	return false;
});




});

/*
// Аяксовая корзина
$('a[href*="cart?variant"]').live('click', function(e) {
	e.preventDefault();
	//variant_id = $(this).attr('id');
	
	href = $(this).attr('href');
	pattern = /\/?cart\?variant=(\d+)$/;
	variant_id = pattern.exec(href)[1];
	
	link = $(this);
	$.ajax({
		url: "ajax/cart.php",
		data: {variant: variant_id},
		dataType: 'json',
		success: function(data){
			$('#cart_informer').html(data);
			//if(link.attr('added_text'))
			//	link.html(link.attr('added_text'));
			//link.attr('href', '/cart');
		}
	});

	var o1 = $(this).offset();
	var o2 = $('#cart_informer').offset();
	var dx = o1.left - o2.left;
	var dy = o1.top - o2.top;
	var distance = Math.sqrt(dx * dx + dy * dy);

	$(this).closest('.product').find('.image img').effect("transfer", { to: $("#cart_informer"), className: "transfer_class" }, distance);	
	$('.transfer_class').html($(this).closest('.product').find('.image').html());
	$('.transfer_class').find('img').css('height', '100%');
	return false;
});
*/