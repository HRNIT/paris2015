/* Google maps Embed Code configuration */
$(document).ready(function() {

	//------- Google Maps ---------//
		  
	// Creating a LatLng object containing the coordinate for the center of the map
	var latlng = new google.maps.LatLng(48.878723,2.2908767);
	  
	// Creating an object literal containing the properties we want to pass to the map  
	var options = {  
		zoom: 15, // This number can be set to define the initial zoom level of the map
		center: latlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP // This value can be set to define the map type ROADMAP/SATELLITE/HYBRID/TERRAIN
	}; 
	if(screen.width > 2000) {
		options.zoom = 16;
	}
	// Calling the constructor, thereby initializing the map  
	var map = new google.maps.Map(document.getElementById('GoogleMapsDesktop'), options);  
	
	// Define Marker properties
	var venuePin = new google.maps.MarkerImage('img/travel/hotels/pins/venue.png',
		new google.maps.Size(53, 66),
		new google.maps.Point(0,0),
		new google.maps.Point(37, 50)
	);	
	var hotelPin2 = new google.maps.MarkerImage('img/travel/hotels/pins/pin1.png',
		new google.maps.Size(37, 46),
		new google.maps.Point(0,0),
		new google.maps.Point(18, 46)
	);
	var hotelPin1 = new google.maps.MarkerImage('img/travel/hotels/pins/pin2.png',
		new google.maps.Size(26, 32),
		new google.maps.Point(0,0),
		new google.maps.Point(13, 32)
	);
	var hotelPin3 = new google.maps.MarkerImage('img/travel/hotels/pins/pin3.png',
		new google.maps.Size(26, 32),
		new google.maps.Point(0,0),
		new google.maps.Point(13, 32)
	);	
	var hotelPin4 = new google.maps.MarkerImage('img/travel/hotels/pins/pin4.png',
		new google.maps.Size(26, 32),
		new google.maps.Point(0,0),
		new google.maps.Point(13, 32)
	);	
	var hotelPin5 = new google.maps.MarkerImage('img/travel/hotels/pins/pin5.png',
		new google.maps.Size(26, 32),
		new google.maps.Point(0,0),
		new google.maps.Point(13, 32)
	);	
	var hotelPin6 = new google.maps.MarkerImage('img/travel/hotels/pins/pin6.png',
		new google.maps.Size(26, 32),
		new google.maps.Point(0,0),
		new google.maps.Point(13, 32)
	);	
	var hotelPin7 = new google.maps.MarkerImage('img/travel/hotels/pins/pin7.png',
		new google.maps.Size(26, 32),
		new google.maps.Point(0,0),
		new google.maps.Point(13, 32)
	);	
	var hotelPin8 = new google.maps.MarkerImage('img/travel/hotels/pins/pin8.png',
		new google.maps.Size(26, 32),
		new google.maps.Point(0,0),
		new google.maps.Point(13, 32)
	);
	var hotelPin9 = new google.maps.MarkerImage('img/travel/hotels/pins/pin9.png',
		new google.maps.Size(26, 32),
		new google.maps.Point(0,0),
		new google.maps.Point(13, 32)
	);		
	var hotelPin10 = new google.maps.MarkerImage('img/travel/hotels/pins/pin10.png',
		new google.maps.Size(26, 32),
		new google.maps.Point(0,0),
		new google.maps.Point(13, 32)
	);	
	var hotelPin11 = new google.maps.MarkerImage('img/travel/hotels/pins/pin11.png',
		new google.maps.Size(26, 32),
		new google.maps.Point(0,0),
		new google.maps.Point(13, 32)
	);		
	
	// Add Marker
	var venueMarker = new google.maps.Marker({
		position: new google.maps.LatLng(48.8794493,2.2837122), 
		map: map,		
		icon: venuePin // This path is the custom pin to be shown. Remove this line and the proceeding comma to use default pin
	});		
	var Marker1 = new google.maps.Marker({
		position: new google.maps.LatLng(48.8794618,2.2850517), 
		map: map,		
		icon: hotelPin1 // This path is the custom pin to be shown. Remove this line and the proceeding comma to use default pin
	});	
	var Marker2 = new google.maps.Marker({
		position: new google.maps.LatLng(48.8802908,2.2842957), 
		map: map,		
		icon: hotelPin2 // This path is the custom pin to be shown. Remove this line and the proceeding comma to use default pin
	});	
	var Marker3 = new google.maps.Marker({
		position: new google.maps.LatLng(48.8750109,2.2934813), 
		map: map,		
		icon: hotelPin3 // This path is the custom pin to be shown. Remove this line and the proceeding comma to use default pin
	});	
	var Marker4 = new google.maps.Marker({
		position: new google.maps.LatLng(48.874372,2.289751), 
		map: map,		
		icon: hotelPin4 // This path is the custom pin to be shown. Remove this line and the proceeding comma to use default pin
	});		
	var Marker5 = new google.maps.Marker({
		position: new google.maps.LatLng(48.8797357,2.2920448), 
		map: map,		
		icon: hotelPin5 // This path is the custom pin to be shown. Remove this line and the proceeding comma to use default pin
	});		
	var Marker6 = new google.maps.Marker({
		position: new google.maps.LatLng(48.874357,2.2981265), 
		map: map,		
		icon: hotelPin6 // This path is the custom pin to be shown. Remove this line and the proceeding comma to use default pin
	});		
	var Marker7 = new google.maps.Marker({
		position: new google.maps.LatLng(48.8755492,2.2835672), 
		map: map,		
		icon: hotelPin7 // This path is the custom pin to be shown. Remove this line and the proceeding comma to use default pin
	});			
	var Marker8 = new google.maps.Marker({
		position: new google.maps.LatLng(48.880172,2.2859728), 
		map: map,		
		icon: hotelPin8 // This path is the custom pin to be shown. Remove this line and the proceeding comma to use default pin
	});	
	var Marker9 = new google.maps.Marker({
		position: new google.maps.LatLng(48.8752714,2.2866142), 
		map: map,		
		icon: hotelPin9 // This path is the custom pin to be shown. Remove this line and the proceeding comma to use default pin
	});		
	var Marker10 = new google.maps.Marker({
		position: new google.maps.LatLng(48.8750419,2.3012093), 
		map: map,		
		icon: hotelPin10 // This path is the custom pin to be shown. Remove this line and the proceeding comma to use default pin
	});		
	var Marker11 = new google.maps.Marker({
		position: new google.maps.LatLng(48.882135,2.28212), 
		map: map,		
		icon: hotelPin11 // This path is the custom pin to be shown. Remove this line and the proceeding comma to use default pin
	});
		
});

$(document).ready(function() {

	//------- Google Maps ---------//
		  
	// Creating a LatLng object containing the coordinate for the center of the map
	var latlng = new google.maps.LatLng(48.8794493,2.2837122);
	  
	// Creating an object literal containing the properties we want to pass to the map  
	var options = {  
		zoom: 15, // This number can be set to define the initial zoom level of the map
		center: latlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP // This value can be set to define the map type ROADMAP/SATELLITE/HYBRID/TERRAIN
	}; 
	if(screen.width > 2000) {
		options.zoom = 16;
	}
	if(screen.width <= 640) {
		options.draggable = false;
	    options.scrollwheel = false;
		options.panControl = false;
	}
	// Calling the constructor, thereby initializing the map  
	var map = new google.maps.Map(document.getElementById('GettingThereMap'), options);  
	
	// Define Marker properties
	
	var venuePinGettingThere = new google.maps.MarkerImage('img/travel/getting-there/pin.png',
		new google.maps.Size(38, 48),
		new google.maps.Point(0,0),
		new google.maps.Point(19,48)
	);
	var GettingThereMarker = new google.maps.Marker({
		position: new google.maps.LatLng(48.8794493,2.2837122),
		map: map,		
		title: 'View on Google Maps',
		icon: venuePinGettingThere // This path is the custom pin to be shown. Remove this line and the proceeding comma to use default pin
	});
	
	// If someone clicks on the Pin, it opens the Google Map on a blank page
	google.maps.event.addListener(GettingThereMarker, 'click', function() {
		this.title = 'View on Google Maps';
		window.open('https://www.google.com/maps/place/Le+Palais+des+Congr%C3%A8s+de+Paris/@48.8794493,2.2837122,17z/data=!3m1!4b1!4m2!3m1!1s0x47e66f8b41cac529:0x3c64b279efb84cbe','_blank');
	});
		
});	
	