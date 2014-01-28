<?php


include 'class/core.Class.php';
core::SQLConnect();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (empty($_POST['naam']) || empty($_POST['email']) || empty($_POST['bericht']) || empty($_POST['onderwerp'])) {
		echo 'Je hebt niet alle velden ingevult!<br />
		<a href="#" OnClick="history.go(-1)">Ga Terug</a>';
	} elseif (!eregi("^[a-z0-9._-]{2,}@[a-z0-9._-]{2,}\.[a-z]{2,6}$", $_POST['email'])) {
		echo 'Dit is geen geldig E-Mailadres.<br />
		<a href="#" OnClick="history.go(-1)">Ga Terug</a>';
	} elseif (empty($_POST['contact']) || !ctype_digit($_POST['contact'])) {
		echo 'Hacking attempt detected.<br /><br />Uw ip is opgeslagen om veiligheidsredenen';
	} else {
		$sEmailNaar = mysql_fetch_assoc(mysql_query("SELECT `email` FROM `contact` WHERE `id` = '".$_POST['contact']."'"));
		$sAfdeling = mysql_fetch_assoc(mysql_query("SELECT `naam` FROM `contact` WHERE `id` = '".$_POST['contact']."'"));
$sBericht = 'Er is een bericht verzonden vanaf de website van Scouting Beilen.
Aan: '.$_POST['contact'].' ('.$sAfdeling['naam'].')
Naam: '.$_POST['naam'].'
Email: '.$_POST['email'].'
Onderwerp: '.$_POST['onderwerp'].'
IP Adres: '.$_SERVER['REMOTE_ADDR'].'


------------------------------ Het bericht is hieronder toegevoegd ------------------------------
		
'.$_POST['bericht'].'

--------------------------------------------------------------------------------------------------';
		
		$sHeaders = "From: ".$_POST['naam']." <".$_POST['email'].">\r\n";
		$sHeaders .= "MIME-Version: 1.0\r\n";
		$sHeaders .= "X-Priority: 3\r\n";
		$sHeaders .= "X-MSMail-Priority: Normal\r\n";
		$sHeaders .= "X-Mailer: ScoutingBeilen-PHP/".phpversion()."\r\n";
		$sHeaders .= "Reply-To: ".$_POST['email']."\r\n";
		$sHeaders .= "Message-ID: <beyloo_".mktime()."@".$_SERVER['SERVER_NAME'].">\r\n";
		
		mail($sEmailNaar['email'], $_POST['onderwerp'], $sBericht, $sHeaders);
		mail('webmaster@scoutingbeilen.nl', '[BACKUP] '.$_POST['onderwerp'], $sBericht, $sHeaders);
		echo '<body><b>E-Mail verzonden!</b><br />
		<br />
		De E-Mail is verzonden.<br /></body>';
		
	}
} else {
	echo '<body>
	<form action="" method="post">
	<table border="0">
	<tr><td><b>Uw naam:</b></td><td><input type="text" name="naam" /></td></tr>
	<tr><td><b>Uw E-Mailadres:</b></td><td><input type="text" name="email" /></td></tr>
	<tr><td><b>Onderwerp:</b></td><td><input type="text" name="onderwerp" /></td></tr>
	<tr><td><b>Ik zoek contact met:</b></td><td><select name="contact">';
	$rContact = mysql_query("SELECT `id`,`naam` FROM `contact`");
	while ($aDatabase = mysql_fetch_assoc($rContact)) {
		echo '<option value="'.$aDatabase['id'].'">'.$aDatabase['naam'].'</option>';
	}
	echo '</select></td></tr>
	<tr><td><b>Uw bericht:</b></td><td><textarea name="bericht" cols="55" rows="25"></textarea></td></tr>
	</table>
	<input type="submit" name="s" value="Versturen" />
	</form></body>';
} 
core::SQLClose();
?>
