$(document).ready(function() {
    
    //Get days in booking form
    $('#selectDay').change(function() {
    	var day = $('#selectDay').val();
    	$('#dayBig').html(day);
    });

    //Get month in booking form
    $('#selectMonth').change(function() {
    	var month = $('#selectMonth').val();
    	$('#monthBig').html(month);
    });

    //Get year in booking form
    $('#selectYear').change(function() {
    	var year = $('#selectYear').val();
    	$('#yearBig').html(year);
    });

});