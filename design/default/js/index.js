var ajax_loader = '<div id="bowlG"><div id="bowl_ringG"><div class="ball_holderG"><div class="ballG"></div></div></div></div>';


function countDown(second) {

var time = second;
var left_timer = setInterval(function() { 	
    if (time < 0) {
		clearInterval(left_timer);
		$('#time_left_container').html('Торги окончены');
    } else {
		
	days = Math.floor(time/86400); 
        hours = Math.floor(time/3600) % 24; 
        minutes = Math.floor(time/60) % 60;
        seconds = Math.floor(time) % 60;
                if (days > 0) days_str = days+' дней, '; else days_str = '';
		if (hours < 10) hours_label = '0'+String(hours); else hours_label = hours;
		if (minutes < 10) minutes_label = '0'+String(minutes); else minutes_label = minutes;
		if (seconds < 10) seconds_label = '0'+String(seconds); else seconds_label = seconds;

		$('#time_left_tablo').html(days_str+hours_label+':'+minutes_label+':'+seconds_label);

        if (!seconds && !minutes && !hours) {              
            clearInterval(left_timer);
			$('#time_left_tablo').html('00:00:00');
		    $('.bets_panel').html('Торги окончены');
        }           
    }
    time--;
}, 1000);
}

$(function() {
	

	$('.login_link').click(function() {
		if ($(this).attr('next-page')!==undefined)
			$('#login_form').find('input[name=next_page]').val($(this).attr('next-page'));

		if ($('#login_form').attr('visible')=='1')
		{
			$('#login_form').fadeOut(100);
			$('#login_form').attr('visible','0');
		}
		else
		{
			$('#login_form').css({
				'left':$(this).offset().left-40+'px',
				'top':$(this).offset().top+40+'px'
			}).fadeIn(300);
			$('#login_form').attr('visible','1');
		}
		return false;
	});

	$('.header, .waper, .footer').click(function() {
		$('#login_form').fadeOut(100);
	});

	$('.show_all_lots').click(function() {
		$('.featured_lot').fadeIn(300);
		$(this).remove();
		return false;
	})

});