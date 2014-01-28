<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Google Maps JavaScript API v3 Example: Info Window Simple</title>
   <link href="beyloo_oud.css" REL="stylesheet" TYPE="text/css">
    <link href="beyloo.css" REL="stylesheet" TYPE="text/css">
    <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script>
      function initialize() {
        		var myLatlng = new google.maps.LatLng(52.843016, 6.494540);
        		var myLatlng2 = new google.maps.LatLng(45,6, -35,5);

        		var mapOptions = {
	        	zoom: 3,
	        	center: myLatlng2,
	        	mapTypeId: google.maps.MapTypeId.ROADMAP
	        }

        	var map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
//voeg markers toe
addMarker(myLatlng,map,"Beilen - Scouting Beyloo Ter Horst");

        	;
        	addMarker(new google.maps.LatLng(52.71633, 6.9324),map,"Erica");
        	addMarker(new google.maps.LatLng(53.18392, 5.5545),map,"Franeker");
        	addMarker(new google.maps.LatLng(51.656, 4.595),map,"Zevenbergen");
        	addMarker(new google.maps.LatLng(50.9894, 5.8111),map,"Geleen");
        	addMarker(new google.maps.LatLng(52.1329, 6.6074),map,"Neede");
        	addMarker(new google.maps.LatLng(52.18166, 5.94214),map,"Ugchelen");
        	addMarker(new google.maps.LatLng(51.6542, 5.634),map,"Uden");
        	addMarker(new google.maps.LatLng(52.063, 5.346),map,"Doorn");
        	addMarker(new google.maps.LatLng(51.9421, 4.5765),map,"Capelle aan den IJssel");
        	addMarker(new google.maps.LatLng(51.8341, 4.361),map,"Spijkernisse");
        	addMarker(new google.maps.LatLng(51.51251, 5.0490),map,"Goirle");
        	addMarker(new google.maps.LatLng(51.5353, 4.2805),map,"Halsteren");
        	addMarker(new google.maps.LatLng(52.01890, 5.05135),map,"IJsselstein");
        	addMarker(new google.maps.LatLng(39.2968, -76.612),map,"Baltimore");
        	addMarker(new google.maps.LatLng(60.1560, 15.193),map,"Ludvika");
        	addMarker(new google.maps.LatLng(43.780, 11.249),map,"Florence");
        	addMarker(new google.maps.LatLng(49.317, 33.1335),map,"Svitlovods'k");
        	addMarker(new google.maps.LatLng(50.42430, 6.02424),map,"Malmedy");

        	

        }
        function addMarker(myLatlng,map,plaatsnaam) {
        	var infowindow = new google.maps.InfoWindow({content: plaatsnaam});

        	var marker = new google.maps.Marker({
        		position: myLatlng,
            	map: map,
            	title: plaatsnaam
            });
            google.maps.event.addListener(marker, 'click', function() {infowindow.open(map,marker);});
	      }
    </script>
  </head>
  
  <body onload="initialize()">
  
    <div id="map_canvas"></div>
     </body>
</html>




