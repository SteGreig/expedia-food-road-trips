jQuery(document).ready(function($) {


// ------------------------------------------------------------------------
// Function to find distance in km between 2 sets of longitude & latitude
// ------------------------------------------------------------------------
function distance(lat1, lon1, lat2, lon2) {
    var p = 0.017453292519943295;    // Math.PI / 180
    var c = Math.cos;
    var a = 0.5 - c((lat2 - lat1) * p)/2 + 
          c(lat1 * p) * c(lat2 * p) * 
          (1 - c((lon2 - lon1) * p))/2;

    return 12742 * Math.asin(Math.sqrt(a)); // 2 * R; R = 6371 km
}


// ------------------------------------------------------------------------
// Add comma to thousand numbers
// ------------------------------------------------------------------------
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}


// ------------------------------------------------------------------------------------
// DETERMINE STARTING CITY (Get user's location and calculate distance from cities)
// ------------------------------------------------------------------------------------
$.get("https://ipinfo.io/json", function (response) {
    var userLocOrig = response.loc;
    var userLoc = userLocOrig.split(',');

    var userCity = response.city;

    // Starting Cities
    var startCities = [
    "3.139003,101.686855", // Kuala Lumpur
    "5.416346,100.332762", // Penang
    "1.492659,103.741359", // Johor Bahru
    "4.597479,101.090106", // Ipoh
    "1.607681,110.378544", // Kuching
    "5.980408,116.073457", // Kota Kinabalu
    "2.189594,102.250087", // Melaka
    ];

    // Loop through starting cities array
    var numOfStartCities = startCities.length;
    for (var i = 0; i < numOfStartCities; i++) {

        // Find distance between user and each theme park
        var startCity = startCities[i].split(',');
        var tpUgly = Math.round(distance(userLoc[0],userLoc[1],startCity[0],startCity[1]));
        var tp = numberWithCommas(tpUgly);
        $('.sc-'+[i+1]).attr('data-dist', tpUgly);

    }

}, "jsonp");


window.onload = function () { 
	// ------------------------------------------------------------------------
	// Reorder Starting Cities dropdown by distance
	// ------------------------------------------------------------------------
    $(".starting-cities option").sort(sort_li) // sort elements
                      .appendTo('.starting-cities'); // append again to the list
    // sort function callback
    function sort_li(a, b){
        return ($(b).data('dist')) < ($(a).data('dist')) ? 1 : -1; 
    }

    // ------------------------------------------------------------------------
    // Select first 'starting city' (closest one to the user)
    // ------------------------------------------------------------------------
	$('.starting-cities option:first-child').attr('selected','selected');

	// ------------------------------------------------------------------------
    // Show destinations for the selected city
    // ------------------------------------------------------------------------
	var startingCity = $('.starting-cities').val();
	$('.destinations-list.sc-'+startingCity).addClass('active');

	$('.starting-cities').change(function() {
		var startingCity = $('.starting-cities').val();
		$('.destinations-list').removeClass('active');
		$('.destinations-list.sc-'+startingCity).addClass('active');
	});
};


// ------------------------------------------------------------------------
// Side Panel Toggle
// ------------------------------------------------------------------------
$('.hide-side-panel').click(function() {
	$('.side-panel').addClass('hidden');
	$('.hide-side-panel').removeClass('active');
	$('.show-side-panel').addClass('active');
});
$('.show-side-panel').click(function() {
	$('.side-panel').removeClass('hidden');
	$('.hide-side-panel').addClass('active');
	$('.show-side-panel').removeClass('active');
});
var windowWidth = $(window).width();
if (windowWidth < 1400) {
    $('.googlemap').click(function() {
		$('.side-panel').addClass('hidden');
		$('.hide-side-panel').removeClass('active');
		$('.show-side-panel').addClass('active');
	});
}


// ------------------------------------------------------------------------
// Trip Length Filters
// ------------------------------------------------------------------------
$('.filters').click(function() {
	if($('input[value="day-trip"]').is(':checked')) {
		$('.destinations-list .weekend').addClass('hide');
		$('input[value="day-trip').parent().addClass('checked');
	} else {
		$('.destinations-list .weekend').removeClass('hide');
		$('input[value="day-trip').parent().removeClass('checked');
	}
	if($('input[value="weekend-trip"]').is(':checked')) {
		$('.destinations-list .day').addClass('hide');
		$('input[value="weekend-trip').parent().addClass('checked');
	} else {
		$('.destinations-list .day').removeClass('hide');
		$('input[value="weekend-trip').parent().removeClass('checked');
	}
	if($('input[value="all-trips"]').is(':checked')) {
		$('input[value="all-trips').parent().addClass('checked');
	} else {
		$('input[value="all-trips').parent().removeClass('checked');
	}
});


// ------------------------------------------------------------------------
// SELECT DESTINATION
// ------------------------------------------------------------------------
$('.destinations-list .select').click(function() {
	$(this).parents('.destinations-list li').addClass('active');
	$('body').addClass('dest-selected');
	var start = $(this).parents('.destinations-list li').attr('data-start');
	$('.starting-from span').text(start);
	$('.dishes-panel').show();
	var end = $(this).parents('.destinations-list li').attr('data-end');
	var end = end.replace(/\s+/g, '-').toLowerCase();
	var start = start.replace(/\s+/g, '-').toLowerCase();
	$('.dishes-panel .dishes-'+start+'-'+end).show();

	var windowWidth = $(window).width();
	if (windowWidth > 749) {
		$('.googlemap').click(function() {
			$('.dishes-panel').addClass('active');
			$('.dishes-toggle-strip .show-dishes-panel').show();
		$('.dishes-toggle-strip .hide-dishes-panel').hide();
		});
	}
});

/* Deselect Destination (back to all destinations) */
$('.dest-deselect').click(function() {
	$('body').removeClass('dest-selected');
	$('.destinations-list li').removeClass('active');
	$('.added-stopover > *').remove();
	$('.added-stopover').hide();
	$('.remove-from-route').removeClass('active');
	$('.add-to-route').addClass('active');
	$('.dishes-panel').hide().removeClass('active');
	$('.dishes-panel > ul').hide();

	var windowWidth = $(window).width();
	if (windowWidth > 749) {
		$('.googlemap').click(function() {
			$('.dishes-panel').removeClass('active');
			$('.dishes-toggle-strip .show-dishes-panel').hide();
		$('.dishes-toggle-strip .hide-dishes-panel').show();
		});
	}
});


// ------------------------------------------------------------------------
// ADD STOPOVER
// ------------------------------------------------------------------------
$('.stopover .add-to-route').click(function() {
	$(this).removeClass('active');
	$(this).next('.remove-from-route').addClass('active');
	$(this).parents('.destinations-list li').addClass('active');
	$('body').addClass('dest-selected');
	var start = $(this).parents('.destinations-list li').attr('data-start');
	$('.starting-from span').text(start);
	var stopover = $(this).attr('data-stopover');
	var stopoverClass = $(this).attr('data-num');
	//$(this).parents('.destinations-list').after('<div class="added-stopover '+stopoverClass+'">Stopover: <strong>'+stopover+'</strong></div>');
	$(this).parents('.destinations-list').next('.added-stopover').show();
	$(this).parents('.destinations-list').next('.added-stopover').addClass(stopoverClass);
	$(this).parents('.destinations-list').next('.added-stopover').append('<strong>'+stopover+'</strong>');
	$('.dishes-panel').show();
	var end = $(this).parents('.destinations-list li').attr('data-end');
	var end = end.replace(/\s+/g, '-').toLowerCase();
	var start = start.replace(/\s+/g, '-').toLowerCase();
	$('.dishes-panel .dishes-'+start+'-'+end).show();

	var windowWidth = $(window).width();
	if (windowWidth > 749) {
		$('.googlemap').click(function() {
			$('.dishes-panel').addClass('active');
			$('.dishes-toggle-strip .show-dishes-panel').show();
		$('.dishes-toggle-strip .hide-dishes-panel').hide();
		});
	}
});

$('.remove-from-route').click(function() {
	$(this).removeClass('active');
	$(this).prev('.add-to-route').addClass('active');
	var stopoverClass = $(this).attr('data-num');
	$('.added-stopover.'+stopoverClass+' > *').remove();
	$('.added-stopover.'+stopoverClass).hide();
});

/* Stopover Suggestions Toggle */
$('.stopover-toggle').click(function() {
	$(this).parents('li').find('.stopovers').toggleClass('active');
	$('.overlay').toggleClass('active');
	$('.hide-side-panel, .show-side-panel').toggle();
});

$('.added-stopover').click(function() {
	$(this).prev().find('.stopovers').addClass('active');
	$('.overlay').toggleClass('active');
	$('.hide-side-panel, .show-side-panel').toggle();
});

$('.overlay, .close-stopovers, .close-modal').click(function() {
	$('.overlay, .stopovers, .dishes-panel, .more-info-modal').removeClass('active');
	$('.hide-side-panel, .show-side-panel').toggle();
	$('body').removeClass('fixed');
	$('.destinations-list > li').removeClass('modal-active');
});



// ------------------------------------------------------------------------
// Dishes Panel
// ------------------------------------------------------------------------
$('.dishes-toggle-strip .show-dishes-panel, .dishes-toggle-strip .hide-dishes-panel').click(function() {
	$('.dishes-toggle-strip .show-dishes-panel, .dishes-toggle-strip .hide-dishes-panel').toggle();
	$('.dishes-panel').toggleClass('active');

	var windowWidth = $(window).width();
	if (windowWidth < 750) {
		if ($('.dishes-panel').hasClass('active')) {
			$('body').addClass('fixed');
		} else {
			$('body').removeClass('fixed');
		}
	}
});

var windowWidth = $(window).width();
if (windowWidth > 749) {
    $('.stopover-toggle, .more-info-toggle, .added-stopover').click(function() {
		$('.dishes-panel').addClass('active');
		$('.dishes-toggle-strip .show-dishes-panel').show();
		$('.dishes-toggle-strip .hide-dishes-panel').hide();
	});
	$('.destinations-list .select').click(function() {
		$('.dishes-toggle-strip .show-dishes-panel').hide();
		$('.dishes-toggle-strip .hide-dishes-panel').show();
	});
	$('.overlay, .close-stopovers, .close-modal').click(function() {
		$('.dishes-toggle-strip .show-dishes-panel').hide();
		$('.dishes-toggle-strip .hide-dishes-panel').show();
	});
}

$('.dishes-panel .halal-toggle').click(function() {
	if ($('.dishes-panel .halal-toggle input').is(':checked')) {
		$('.dishes-panel > ul > li').hide();
		$('.dishes-panel > ul > .halal').show();
	} else {
		$('.dishes-panel > ul > li').show();
	}
});


// ------------------------------------------------------------------------
// MORE INFO MODALS
// ------------------------------------------------------------------------
$('.more-info-toggle').click(function() {
	var infoModalClass = $(this).parents('.destinations-list li').attr('data-end');
	var infoModalClass = infoModalClass.replace(/\s+/g, '-').toLowerCase();
	var startCity = $(this).parents('.destinations-list li').attr('data-start');
	var startCity = startCity.replace(/\s+/g, '-').toLowerCase();
	$('.info-'+startCity+'-'+infoModalClass).addClass('active');
	$('.overlay').addClass('active');
	$('.hide-side-panel, .show-side-panel').toggle();
	$('body').addClass('fixed');
	$(this).parents('.destinations-list > li').addClass('modal-active');
});

$('.tabs-nav li').click(function() {
	$(this).siblings().removeClass('active');
	$(this).addClass('active');
});

$('.close-modal').click(function() {
	$('.more-info-modal, .overlay').removeClass('active');
	$('body').removeClass('fixed');
	$('.destinations-list > li').removeClass('modal-active');
});

var numTabs = $('.tabs-nav > li').length;

for (var i=0; i<=numTabs; i++) {
    (function(i){
        $('.tabs-nav li:nth-child('+i+')').click(function() {
        	$(this).parent().next('.tabs').find('> article').hide();
        	$(this).parent().next('.tabs').find('> article').removeClass('active');
        	$(this).parent().next('.tabs').find('> article:nth-child('+i+')').show().addClass('active');;
        });
    })(i);
}


// ------------------------------------------------------------------------
// H1 info icon popup
// ------------------------------------------------------------------------
$('h1 .fa-info-circle').hover(function() {
	$('.intro-copy').toggle();
});



// ------------------------------------------------------------------------
// Make Facebook/Twitter buttons open in popup window
// ------------------------------------------------------------------------
$('.fb, .tweet').click(function (event) {
    if (event.preventDefault) { event.preventDefault(); } else { event.returnValue = false; }
    window.open($(this).attr("href"), "popupWindow", "width=600,height=600,scrollbars=yes");
});


});

