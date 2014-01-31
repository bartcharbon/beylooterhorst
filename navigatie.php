<?php
function toonPagina($subpagina){
	include 'agenda.php';
	switch ($subpagina) {
	case "verhuur":
		include 'verhuur.php';
		break;
	case "geschiedenis":
		include 'geschiedenis.php';
		break;
	case "foto":
		include 'foto.php';
		break;
	case "video":
		include 'video.php';
		break;
	case "welpen":
		include 'welpen.php';
		break;
	case "contact":
		echo"<p><img src=\"images/invisible.png\"width=\"50\"height=\"50\"\">
		       <iframe src =\"contact.php\" width=\"884\" height=\"750\" border=\"0\"><p>Your browser does not support iframes.</p></iframe></p>";
		break;
	case "gug":
		include 'gug.php';
		break;
	case "links":
		include 'links.php';
		break;
	case "bestuur":
		include 'bestuur.php';
		break;
	case "agendawelpen":
		echo $agendawelpen;
		break;
	case "stopmotion":
		include 'stopmotion.php';
		break;
	case "agendascouts":
		echo $agendascouts;
		break;
	case "fotosscouts":
		include 'scoutsfotos_iframe.php';
		break;
	case "documentenscouts":
		include 'googledocs.php';
		break;
	case "agendagug":
		echo $agendagug;
		break;
	case "agendastam":
		echo $agendastam;
		break;
	case "agendarsa":
		echo $agendarsa;
		break;
	case "agendabevers":
		echo $agendabevers;
		break;
	case "documenten":
		include 'documenten.php';
		break;
	case "scouts":
		include 'scouts.php';
		break;
	case "bevers":
		include 'bevers.php';
		break;
	case "rsa":
		include 'RSA.php';
		break;
	case "stam":
		include 'stam.php';
		break;
	case "fotostrips":
		include 'fotostrip.php';
		break;
	case "joti":
		include 'joti.php';
		break;
	case "vertaal":
		echo"<p><iframe style=\"border:0px\" src =\"/translator.php\" width=\"1286\" height=\"1000\" border=\"0\"><p>Your browser does not support iframes.</p></iframe></p>";
		break;
	case "gmap":
		echo"<p><iframe style=\"border:0px\" src =\"/gmap.php\" width=\"1000\" height=\"600\" border=\"0\"><p>Your browser does not support iframes.</p></iframe></p>";
		break;
	case "gmap2":
		echo"<p><iframe style=\"border:0px\" src =\"/gmap2.php\" width=\"1000\" height=\"600\" border=\"0\"><p>Your browser does not support iframes.</p></iframe></p>";
		break;
	default:
		include 'home.php';
	}
}
?>