<?php
	$pg = "index";
?>

<!doctype html>
<html lang="en">
<head>

	<?php include('includes/head.php'); ?>

</head>
<body class="<?php echo $pg; ?>">

	<div class="content">

		<?php include('includes/header.php'); ?>
			

		<div class="side-panel">

			<h1>Makan Road Trips <i class="fa fa-info-circle"></i></h1>

			<div class="intro-copy">
				<p>Hungry? Good news! From Kuala Lumpur to Kota Kinabalu, Malaysia has some of the finest street food on the planet. With the help of Makan Road Trips, you can now try the tastiest local delicacies in the country and plan your next Malaysian road trip at the same time. Use the Makan Road Trips map to find your destination, local dishes, stopover suggestions, attractions and hotels.</p>
			</div>

			<label class="starting-cities-label">Start your trip from...</label>
			<select class="starting-cities">
				<option value="kuala-lumpur" class="sc-1">Kuala Lumpur</option>
				<option value="penang" class="sc-2">Penang</option>
				<option value="johor-bahru" class="sc-3">Johor Bahru</option>
				<option value="ipoh" class="sc-4">Ipoh</option>
				<option value="kuching" class="sc-5">Kuching</option>
				<option value="kota-kinabalu" class="sc-6">Kota Kinabalu</option>
				<option value="melaka" class="sc-7">Melaka</option>
			</select>

			<div class="filters">
				<h5>Trip Length</h5>
				<label class="checked">
					<input type="radio" value="all-trips" name="triplength" checked>
					<span>All Trips</span>
				</label>
				<label>
					<input type="radio" value="day-trip" name="triplength">
					<span>Day Trips</span>
				</label>
				<label>
					<input type="radio" value="weekend-trip" name="triplength">
					<span>Weekend Trips</span>
				</label>
			</div>

			<p class="starting-from">From <span></span> to...</p>

			<?php include('includes/destination-list-data.php'); ?>

			<p class="dest-deselect"><img class="icon" src="images/arrow-left-dark.svg" alt="hide panel icon"> <span>Back</span></p>

			<div class="overlay"></div>
		</div>


		<img class="icon hide-side-panel active" src="images/arrow-left-dark.svg" alt="hide panel icon">
		<img class="icon show-side-panel" src="images/arrow-right-dark.svg" alt="show panel icon">


		<?php include('includes/dishes-panel.php'); ?>


		<?php include('includes/more-info-data.php'); ?>


		<div id="map" class="googlemap"></div>


	</div>



<?php include('includes/footer-includes.php'); ?>

<script>
  function initMap() {

  	var start = '';
    var end = '';

    var malaysia = {lat: 4.210484, lng: 101.975766};

	var map = new google.maps.Map(document.getElementById('map'), {
      center: malaysia,
      zoom: 7,
      styles: [{"featureType":"administrative.country","stylers":[{"visibility":"off"}]},{"featureType":"administrative.locality","stylers":[{"color":"#00355F"},{"visibility":"simplified"}]},{"featureType":"administrative.locality","elementType":"labels.text.fill","stylers":[{"color":"#00355F"},{"visibility":"on"}]},{"featureType":"administrative.locality","elementType":"labels.text.stroke","stylers":[{"visibility":"off"},{"weight":1.5}]},{"featureType":"administrative.province","stylers":[{"visibility":"off"}]},{"featureType":"landscape.man_made","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural","stylers":[{"color":"#6a958f"}]},{"featureType":"landscape.natural","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural.terrain","stylers":[{"color":"#E49925"},{"visibility":"off"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry","stylers":[{"color":"#E49925"}]},{"featureType":"poi.park","stylers":[{"color":"#8FAAA6"}]},{"featureType":"poi.park","elementType":"labels","stylers":[{"color":"#00355F"}]},{"featureType":"poi.park","elementType":"labels.text.fill","stylers":[{"color":"#00355F"}]},{"featureType":"poi.park","elementType":"labels.text.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","stylers":[{"color":"#c1c1c1"}]},{"featureType":"road.arterial","elementType":"labels","stylers":[{"color":"#ffffff"},{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"labels.text","stylers":[{"color":"#333333"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#FFCB00"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#c93b00"},{"weight":0.5}]},{"featureType":"road.highway","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.highway","elementType":"labels.text.stroke","stylers":[{"color":"#333333"}]},{"featureType":"road.local","stylers":[{"color":"#ffffff"},{"visibility":"off"}]},{"featureType":"road.local","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"transit.station.airport","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"transit.station.airport","elementType":"labels.text.fill","stylers":[{"color":"#00355F"}]},{"featureType":"water","stylers":[{"color":"#a0cbeb"}]},{"featureType":"water","elementType":"labels","stylers":[{"color":"#e1e1e1"}]}],
      streetViewControl: false,
      fullscreenControl: false,
      zoomControlOptions: {
          position: google.maps.ControlPosition.RIGHT_CENTER
      },
      mapTypeControlOptions: { mapTypeIds: [] }
    });

    $('.dest-deselect').click(function() {
    	var map = new google.maps.Map(document.getElementById('map'), {
	      center: malaysia,
	      zoom: 7,
	      styles: [{"featureType":"administrative.country","stylers":[{"visibility":"off"}]},{"featureType":"administrative.locality","stylers":[{"color":"#00355F"},{"visibility":"simplified"}]},{"featureType":"administrative.locality","elementType":"labels.text.fill","stylers":[{"color":"#00355F"},{"visibility":"on"}]},{"featureType":"administrative.locality","elementType":"labels.text.stroke","stylers":[{"visibility":"off"},{"weight":1.5}]},{"featureType":"administrative.province","stylers":[{"visibility":"off"}]},{"featureType":"landscape.man_made","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural","stylers":[{"color":"#6a958f"}]},{"featureType":"landscape.natural","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural.terrain","stylers":[{"color":"#E49925"},{"visibility":"off"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry","stylers":[{"color":"#E49925"}]},{"featureType":"poi.park","stylers":[{"color":"#8FAAA6"}]},{"featureType":"poi.park","elementType":"labels","stylers":[{"color":"#00355F"}]},{"featureType":"poi.park","elementType":"labels.text.fill","stylers":[{"color":"#00355F"}]},{"featureType":"poi.park","elementType":"labels.text.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","stylers":[{"color":"#c1c1c1"}]},{"featureType":"road.arterial","elementType":"labels","stylers":[{"color":"#ffffff"},{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"labels.text","stylers":[{"color":"#333333"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#FFCB00"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#c93b00"},{"weight":0.5}]},{"featureType":"road.highway","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.highway","elementType":"labels.text.stroke","stylers":[{"color":"#333333"}]},{"featureType":"road.local","stylers":[{"color":"#ffffff"},{"visibility":"off"}]},{"featureType":"road.local","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"transit.station.airport","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"transit.station.airport","elementType":"labels.text.fill","stylers":[{"color":"#00355F"}]},{"featureType":"water","stylers":[{"color":"#a0cbeb"}]},{"featureType":"water","elementType":"labels","stylers":[{"color":"#e1e1e1"}]}],
	      streetViewControl: false,
	      fullscreenControl: false,
	      zoomControlOptions: {
	          position: google.maps.ControlPosition.RIGHT_CENTER
	      },
	      mapTypeControlOptions: { mapTypeIds: [] }
	    });
    });

    $('.destinations-list .select, .add-to-route').click(function() {
    	var map = new google.maps.Map(document.getElementById('map'), {
          center: malaysia,
          zoom: 7,
          styles: [{"featureType":"administrative.country","stylers":[{"visibility":"off"}]},{"featureType":"administrative.locality","stylers":[{"color":"#00355F"},{"visibility":"simplified"}]},{"featureType":"administrative.locality","elementType":"labels.text.fill","stylers":[{"color":"#00355F"},{"visibility":"on"}]},{"featureType":"administrative.locality","elementType":"labels.text.stroke","stylers":[{"visibility":"off"},{"weight":1.5}]},{"featureType":"administrative.province","stylers":[{"visibility":"off"}]},{"featureType":"landscape.man_made","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural","stylers":[{"color":"#6a958f"}]},{"featureType":"landscape.natural","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural.terrain","stylers":[{"color":"#E49925"},{"visibility":"off"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry","stylers":[{"color":"#E49925"}]},{"featureType":"poi.park","stylers":[{"color":"#8FAAA6"}]},{"featureType":"poi.park","elementType":"labels","stylers":[{"color":"#00355F"}]},{"featureType":"poi.park","elementType":"labels.text.fill","stylers":[{"color":"#00355F"}]},{"featureType":"poi.park","elementType":"labels.text.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","stylers":[{"color":"#c1c1c1"}]},{"featureType":"road.arterial","elementType":"labels","stylers":[{"color":"#ffffff"},{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"labels.text","stylers":[{"color":"#333333"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#FFCB00"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#c93b00"},{"weight":0.5}]},{"featureType":"road.highway","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.highway","elementType":"labels.text.stroke","stylers":[{"color":"#333333"}]},{"featureType":"road.local","stylers":[{"color":"#ffffff"},{"visibility":"off"}]},{"featureType":"road.local","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"transit.station.airport","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"transit.station.airport","elementType":"labels.text.fill","stylers":[{"color":"#00355F"}]},{"featureType":"water","stylers":[{"color":"#a0cbeb"}]},{"featureType":"water","elementType":"labels","stylers":[{"color":"#e1e1e1"}]}],
          streetViewControl: false,
          fullscreenControl: false,
          zoomControlOptions: {
	          position: google.maps.ControlPosition.RIGHT_CENTER
	      },
          mapTypeControlOptions: { mapTypeIds: [] }
        });

  		var start = $(this).parents('.destinations-list li').attr('data-start');
  		var end = $(this).parents('.destinations-list li').attr('data-end');

        var directionsDisplay = new google.maps.DirectionsRenderer({
          map: map
        });

        // Set destination, origin and travel mode.
        var request = {
          destination: end,
          origin: start,
          travelMode: 'DRIVING'
        };

        // Pass the directions request to the directions service.
        var directionsService = new google.maps.DirectionsService();
        directionsService.route(request, function(response, status) {
          if (status == 'OK') {
            // Display the route on the map.
            directionsDisplay.setDirections(response);
          }
        });

    });
  }

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBa-9gXhxW7MWRvr8YHMGncOUiFAbU5J6A&callback=initMap"
    async defer></script>

</body>
</html>