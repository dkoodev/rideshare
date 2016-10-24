function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: -33.8688, lng: 151.2195},
    zoom: 13
  });

  var input = document.getElementById('pac-input');

  var autocomplete = new google.maps.places.Autocomplete(input);
  autocomplete.bindTo('bounds', map);

  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

  var infowindow = new google.maps.InfoWindow();
  var marker = new google.maps.Marker({
    map: map
  });
  marker.addListener('click', function() {
    infowindow.open(map, marker);
  });

  // var input = document.getElementById('pac-input');
  // var autocomplete = new google.maps.places.Autocomplete(input);
  var geo_id;
  autocomplete.addListener('place_changed', function() {
    // My code--------------
    var place = autocomplete.getPlace();
    geo_id = place.place_id;
    document.getElementById("addressArea").value = geo_id;
    // ---------------------

  });
}

function initAutocomplete() {
	var map = new google.maps.Map(document.getElementById('map'), {
	  center: {lat: -33.8688, lng: 151.2195},
	  zoom: 13,
	  mapTypeId: 'roadmap'
	});

	// Create the search box and link it to the UI element.
	var input = document.getElementById('pac-input');
	var searchBox = new google.maps.places.SearchBox(input);
	map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

	// Bias the SearchBox results towards current map's viewport.
	map.addListener('bounds_changed', function() {
 		searchBox.setBounds(map.getBounds());
	});

	var markers = [];
	// Listen for the event fired when the user selects a prediction and retrieve
	// more details for that place.
	searchBox.addListener('places_changed', function() {
		var places = searchBox.getPlaces();

		if (places.length == 0) {
    		return;
  	}

 		// Clear out the old markers.
  	markers.forEach(function(marker) {
    		marker.setMap(null);
  	});
  	
  	markers = [];

  	// For each place, get the icon, name and location.
  	var bounds = new google.maps.LatLngBounds();
  	places.forEach(function(place) {
    		if (!place.geometry) {
      		console.log("Returned place contains no geometry");
      		return;
    		}
    
      	var icon = {
        	url: place.icon,
        	size: new google.maps.Size(71, 71),
        	origin: new google.maps.Point(0, 0),
        	anchor: new google.maps.Point(17, 34),
        	scaledSize: new google.maps.Size(25, 25)
      	};

      	// Create a marker for each place.
      	markers.push(new google.maps.Marker({
        	map: map,
        	icon: icon,
        	title: place.name,
        	position: place.geometry.location
      	}));

      	if (place.geometry.viewport) {
        	// Only geocodes have viewport.
        	bounds.union(place.geometry.viewport);
      	} 
      	else {
        	bounds.extend(place.geometry.location);
      	}
  	});
  	
  	map.fitBounds(bounds);


    var input = document.getElementById('pac-input');
    var autocomplete = new google.maps.places.Autocomplete(input);

    autocomplete.addListener('place_changed', function() {

      console.log("does it even enter");
      infowindow.close();
      var place = autocomplete.getPlace();
      if (!place.geometry) {
        return;
      }

      if (place.geometry.viewport) {
        map.fitBounds(place.geometry.viewport);
      } else {
        map.setCenter(place.geometry.location);
        map.setZoom(17);
      }

      // Set the position of the marker using the place ID and location.
      marker.setPlace({
        placeId: place.place_id,
        location: place.geometry.location
      });
      marker.setVisible(true);

      infowindow.setContent('<div><strong>' + place.name + '</strong><br>' +
          'Place ID: ' + place.place_id + '<br>' +
          place.formatted_address);
      infowindow.open(map, marker);

    });
	});






}
