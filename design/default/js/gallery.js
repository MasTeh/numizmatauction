// УВЕЛИЧЕНИЕ КАРТИНОК

$(document).ready(function() {
	
	// Указываем ID для блоков
	var gallBlock = 1;
	
	$('div.waper-container-item-content-shop-gallery-big').each(function() {
		
		$(this).attr('id', 'gallery-big-' + gallBlock);
		
		gallBlock++;
		
	});
	
	var gallBlock = 1;
	
	$('div.waper-container-item-content-shop-gallery-prev').each(function() {
		
		$(this).attr('id', 'gallery-prev-' + gallBlock);
		
		gallBlock++;
		
	});
	
	// -------------------------------------------
	// Нажатие на превью
	// -------------------------------------------
	
	$('div.waper-container-item-content-shop-gallery-prev').on('click', function() {
		
		// Определяем ID
		verID = ($(this).attr('id')).replace('gallery-prev-', '');
		// Показываем большую картинку
		$('#gallery-big-' + verID).fadeIn();
		
	})
	
	// -------------------------------------------
	// Нажатие на кнопку закрытия
	// -------------------------------------------
	
	$('div.waper-container-item-content-shop-gallery-big-close').on('click', function() {

		// Скрываем большую картинку
		$('div.waper-container-item-content-shop-gallery-big').fadeOut();
		
	})
		
});