var curr_lot_id = $('input#lot_id').val();

function update_bets_list()
{
    if (time_left <= 10) return false;
    $.ajax({
        url: "ajax/update_bet_list.php",
        data: {lot_id: curr_lot_id},
        dataType: 'json',
        success: function(data){
            if (data=='empty') return false;

            $('#bets_list').html(data);
            update_lot_data();
        }
    });    
}

function select_user()
{
    $('.bet-item[user-id='+$('#user_id').val()+']').css({'font-weight':'bold'});    
}

function update_lot_data()
{
    if (time_left <= 10) return false;
    $.ajax({
        url: "ajax/update_lot_data.php",
        data: {lot_id: curr_lot_id},
        dataType: 'json',
        success: function(data){
            if (data=='empty') return false;

            $('span#current_bet').html(data['current_bet']);
            $('span#bet_size').html(data['bet_size']);
            $('span#bets_count').html(data['bets_count']);

	    if (Number($('input[name=bet_value]').val()) < Number(data['current_bet']))
            	$('input[name=bet_value]').val(data['current_bet']);

            select_user();
        }
    });        
}

$(function() {

select_user();
update_bets_list();

setInterval(function() {
    update_bets_list();
}, 15000);

var time_left = $('#time_left').val();


if (time_left > 1)
{
	countDown(time_left);
}
else
{
	
    $('.bets_panel').html('Торги окончены').hide();
    $('#time_left_container').html('<span style="color:darkred; font-size:26px; display:block">Лот закрыт</span>');
}




$('.set_bet_btn').click(function() {
    if (time_left <= 10) return false;
    $.ajax({ 
        url: "ajax/add_bet.php",
        data: {lot_id: curr_lot_id, bet_value: $('input[name=bet_value]').val(), token: $('input#token').val()},
        dataType: 'json',
        success: function(data) { 
            console.log(data);
            if (data=='time_is_over') { $.alert('Торги по данному лоту окончены'); return false; }
            if (data=='last_bet') { $.alert('Ваша ставка последняя'); return false; }
            if (data=='ok') { update_bets_list(); }
        }
    });     
    return false;
});

$('.set_autobid_btn').click(function() {    
    limit = $('input[name=autobid_limit]').val();
    if (Number(limit) <= Number($('input[name=bet_value]').val())) { $.alert('Автобид должен быть больше текущей ставки.'); return false; }
    if ($('#autobid_amount') !== undefined && Number($('#autobid_amount').val()) >= limit) {
        $.alert('Изменине ставки возможно только в большую сторону');
        return false;
    }
    $.ajax({
        url: "ajax/add_autobid.php",
        data: {lot_id: curr_lot_id, limit: limit, token: $('input#token').val()},
        dataType: 'json',
        success: function(data) { 
            console.log(data);
            if (data=='need_more') { $.alert('Слишком маленький лимит. Он должен быть больше следующей ставки.'); return false; }
            if (data=='ok' || data=='deleted')
            {
                location.reload();
            }
        }
    });         
    return false;
});  


$('.help-btn').click(function() { return false; })
  

});
