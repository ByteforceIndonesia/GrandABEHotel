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

    // // Set page one height for iphone
    // $("#firstPage").css('height', window.innerHeight * 0.8);

    $(".opened").css('height', window.innerHeight * 0.8 + "!important");


    // parallax
    var last_known_scroll_position = 0;
    var ticking = false;

    function doSomething(scroll_pos) {
        // $('#firstPage').css('background-position', '0 ' + scroll_pos*0.25 + 'px');
        $('#parallax').css('transform', 'translateY(' + scroll_pos*0.3 + 'px)');
    }

    window.addEventListener('scroll', function(e) {
      last_known_scroll_position = window.scrollY;
      if (!ticking) {
        window.requestAnimationFrame(function() {
          doSomething(last_known_scroll_position);
          ticking = false;
        });
      }
      ticking = true;
    });

});

