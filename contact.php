<?php
include 'class/core.Class.php';
include 'tools.php';
echo '<link rel="stylesheet" href="css/beyloo.css" REL="stylesheet" TYPE="text/css">
<link rel="stylesheet" href="css/beyloo_oud.css" REL="stylesheet" TYPE="text/css">
<link rel="stylesheet" href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/imageflow.css" type="text/css" />
<link href="js/jquery.slimbox2/jquery.slimbox2.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/jquery-custom.css" />

  <style>
  .custom-combobox {
    position: relative;
    display: inline-block;
  }
  .custom-combobox-toggle {
    position: absolute;
    top: 0;
    bottom: 0;
    margin-left: -1px;
    padding: 0;
    /* support: IE7 */
    *height: 1.7em;
    *top: 0.1em;
  }
  .custom-combobox-input {
    margin: 0;
    padding: 0.3em;
  }
  .controls{
  	width:700px;
  	
  }
  textarea {
    resize: none;
    width: 600px;
	}
  </style>
  
  
  
  <script type="text/javascript" src="csshorizontalmenu.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>    
<script src="js/jquery.slimbox2/jquery.slimbox2.js" type="text/javascript"></script>
<script src="js/jquery.blockUI.js" type="text/javascript"></script>
<script src="js/jquery.pwi-min.js" type="text/javascript"></script>
<script src="imageflow.js" type="text/javascript">
<script src="js/waitforpictures.js" type="text/javascript"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<!-- These files are needed for SlimBox2 -->
<script src="js/jquery.slimbox2/jquery.slimbox2.js" type="text/javascript"></script>
<script src="js/jquery.blockUI.js" type="text/javascript"></script>
<!-- These files are the PWI files -->
<script src="js/jquery.pwi-min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<!-- These files are needed for SlimBox2 -->
<script src="js/jquery.slimbox2/jquery.slimbox2.js" type="text/javascript"></script>
<script src="js/jquery.blockUI.js" type="text/javascript"></script>
    <!-- These files are the PWI files -->
<script src="js/jquery.pwi-min.js" type="text/javascript"></script>
<script src="imageflow.js" type="text/javascript"></script>
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  ';

core::SQLConnect();

$contactindex = $_GET["contactindex"];

if ((strpos($_SERVER['HTTP_USER_AGENT'],'Firefox') !== false)||(strpos($_SERVER['HTTP_USER_AGENT'],'MSIE') !== false)) {
   $terug = 1;
}else{
	$terug = 2;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (empty($_POST['naam']) || empty($_POST['email']) || empty($_POST['bericht']) || empty($_POST['onderwerp'])) {
		echo '<body bgcolor="#005214" text="WHITE">Je hebt niet alle velden ingevult!<br />
		<a href="#" OnClick="history.go(-'.$terug.')">Ga Terug</a></body>';
	} elseif (!eregi("^[a-z0-9._-]{2,}@[a-z0-9._-]{2,}\.[a-z]{2,6}$", $_POST['email'])) {
		echo '<body bgcolor="#005214" text="WHITE">Dit is geen geldig E-Mailadres.<br />
		<a href="#" OnClick="history.go(-'.$terug.')">Ga Terug</a></body>';
	}  elseif ($_POST['contact'] == "1") {
		echo '<body bgcolor="#005214" text="WHITE">Geen geldige bestemming gekozen<br />
		<a href="#" OnClick="history.go(-'.$terug.')">Ga Terug</a></body>';
	}else {
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
		echo '<body bgcolor="#005214" text="WHITE"><b>E-Mail verzonden</b><br />
		<br />
		De E-Mail is verzonden.<br /></body>';
		
	}
} else {
	echo '<body bgcolor="#005214" text="WHITE">
	<strong>Contact</strong><br><br>
	
		<form id="contact_form" class="form-horizontal">
	  <div class="control-group">
	    <label class="control-label" for="naam">Uw naam: </label>
	    <div class="controls">
	      <input type="text" id="naam" name="naam" required>
	    </div>
	  </div>
	  <div class="control-group">
	    <label class="control-label" for="email">Uw E-Mailadres:</label>
	    <div class="controls">
	      <input type="email" id="email" name="email" required>
	    </div>
	  </div>
	  <div class="control-group">
	    <label class="control-label" for="onderwerp">Onderwerp: </label>
	    <div class="controls">
	      <input type="text" id="onderwerp" name="onderwerp" required>
	    </div>
	  </div>
	  <div class="control-group">
	    <label class="control-label" for="contact">Ik zoek contact met: </label>
	    <div class="controls">
	      <select id="contact" name="contact" required>';
	$rContact = mysql_query("SELECT `id`,`naam` FROM `contact` ORDER BY ID ASC");
	while ($aDatabase = mysql_fetch_assoc($rContact)) {
		echo '<option value="'.$aDatabase['id'].'">'.$aDatabase['naam'].'</option>';
	}
	echo '</select>
	    </div>
	  </div>
	  <div class="control-group">
	    <label class="control-label" for="bericht">Bericht: </label>
	    <div class="controls">
			<textarea name="bericht" cols="55" rows="25" required></textarea>
	    </div>
	  </div>	  
	  
	  <div class="control-group">
	    <div class="controls">
	      <button id="send-btn" type="submit" class="btn btn-primary">Versturen</button>
	    </div>
	  </div>
	  
	</form>
(werkt het formulier niet, mail dan beylooterhorst[at]gmail.com)
	
	<script type="text/javascript">
  	$(function() {
  		var submitBtn = $("#send-btn");
  		var form = $("#contact_form");
  		form.validate();
  		
  		$("#contact").rules("add", {
			range: [2,101],
					messages: {
    range: jQuery.format("Kies een ontvanger.")
  }
		});
		jQuery.extend(jQuery.validator.messages, {
    required: "Dit veld is verplicht.",
    email: "Vul een emailadres in.",
});
		

  		
  		form.submit(function(e) {
	    	e.preventDefault();
	    	e.stopPropagation();
	    	if(form.valid()) {
	    		$(".text-error", form).remove();
		        if(form.valid()) {
	    	 	$.ajax({
		            type: "POST",
		            url:  "/contact.php",
		            data: form.serialize(),
		            success: function() {  
    $("#contact_form").html("<div id=\'message\'></div>");  
    $("#message").html(\'<h2>De email is verstuurd!</h2>\')  
    .append(\'<a href="/contact.php">Terug naar de contact pagina</a>\')  
    .hide()  
    .show(function() {  
      $("#message");  
    });  
  } 
		        });
	        }
	        }
	    });
	    submitBtn.click(function(e) {
	    	e.preventDefault();
	    	e.stopPropagation();
	    	form.submit();
	    });
		$("input", form).add(submitBtn).keydown(function(e) {
			if(e.which == 13) {
	    		e.preventDefault();
			    e.stopPropagation();
				form.submit();
	    	}
		});
    });
</script>
	</body>';
} 
core::SQLClose();
?>


<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js" type="text/javascript"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js" type="text/javascript" charset="utf-8"></script>


<style>
.error{color:#b94a48}
</style>




