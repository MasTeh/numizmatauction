var month_arr_rus = ["января","февраля","марта","апреля","мая","июня","июля","августа","сентября","октября","ноября","декабря"];

function time() {

    $.ajax({
        url: "ajax/timer.php",
        data: {},
        dataType: 'json',
        success: function(data){ 
			hou = Number(data['hours']).toString();
			min = Number(data['minuts']).toString();
			sec = Number(data['seconds']).toString();
			day = data['days'];
			month =Number(data['month'])-1;

			hou = (hou<10)?0+hou:hou;
			min = (min<10)?0+min:min;
			sec = (sec<10)?0+sec:sec;

			$('.timer_hour').text(hou);
			$('.timer_min').text(min);
			$('.timer_sec').text(sec);
			$('.timer_day').text(day);
			$('.timer_month').html(month_arr_rus[month]+' <span style="position:absolute; margin-top:8px">(мск)</span>');			
        }
    });   

	setTimeout(time,1000);
}

$(function() {

	time();

});