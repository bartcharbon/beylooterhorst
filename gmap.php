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
        		var myLatlng2 = new google.maps.LatLng(52.568, 5.603);

        		var mapOptions = {
	        	zoom: 8,
	        	center: myLatlng2,
	        	mapTypeId: google.maps.MapTypeId.ROADMAP
	        }

        	var map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
//voeg markers toe
addMarker(myLatlng,map,"Beilen - Scouting Beyloo Ter Horst");

        	addMarker(new google.maps.LatLng(53.144, 6.408),map,"Roden");
        	addMarker(new google.maps.LatLng(52.7349, 6.4850),map,"Hoogeveen");
        	addMarker(new google.maps.LatLng(51.65203, 5.30352),map,"Vught");
        	addMarker(new google.maps.LatLng(52.958, 5.804),map,"Joure");
        	addMarker(new google.maps.LatLng(52.15223, 6.72717),map,"Haaksbergen");
        	addMarker(new google.maps.LatLng(51.59152, 4.5356),map,"Oudenbosch");
        	addMarker(new google.maps.LatLng(52.2521, 6.7672),map,"Hengelo");
        	addMarker(new google.maps.LatLng(51.81681, 3.9470),map,"Ouddorp");
        	addMarker(new google.maps.LatLng(52.71633, 6.9324),map,"Erica");
        	addMarker(new google.maps.LatLng(52.86020, 6.20189),map,"Vledder");
        	addMarker(new google.maps.LatLng(53.0601, 4.7959),map,"Texel");
        	addMarker(new google.maps.LatLng(53.18392, 5.5545),map,"Franeker");
        	addMarker(new google.maps.LatLng(52.9426, 5.954),map,"Oranjewoud");
        	addMarker(new google.maps.LatLng(53.05930, 6.08226),map,"Beetsterzwaag");
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




