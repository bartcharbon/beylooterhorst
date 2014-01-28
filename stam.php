<html>
<head>
    <title></title>
</head>

<body>
    <div class="row">
        <div class="span12">
            <div class="content-header-background">
                <div class="content-header">
                    Stam
                </div>
            </div>

            <div id="tabs">
                <ul>
                    <li><a href="#tabs-1">Informatie</a></li>
                    <li><a href="#tabs-2">Aanmelden</a></li>
                    <li><a href="#tabs-3">Agenda</a></li>
                </ul>

                <div id="tabs-1">
                    <div style="overflow: hidden;">
                        <div style="width:400px;float:left;">
                            <?php echo twitter_widget("BeylooTerHorst", "351660880628424706");?>
                            </script>
                        </div>

                        <div style="width:480px;float:right;">
                        <b>Stam</b><br>

		De stam is de laatste speltak van scouting in Nederland voor leden van
		18 tot en met 21 jaar. <br>
		Een klein aantal groepen gebruikt nog de oudere term Pivo's.<br>

		De roverscouts hebben een eigen bestuur, bestaande uit een voorzitter,
		penningmeester en een stamcorrespondent (secretaris). <br>
		De roverscouts regelen dan ook alles zelf. De stam draagt officieel
		een brique kleurige blouse. <br>
		Maar het komt ook vaak voor dat ze zelf een T-shirt of sweater
		bedrukken (of laten bedrukken) en dat dragen als uniform.<br>
                                                    </div>
                    </div>
                </div>

                <div id="tabs-2">
                   <?php    echo"<p><img src=\"images/invisible.png\"width=\"50\"height=\"50\"\">
                                   <iframe src =\"contact.php?contactindex=stam\" width=\"884\" height=\"750\" border=\"0\"><p>Your browser does not support iframes.</p></iframe></p>";?>
                </div>
                        <div id="tabs-3">
            <? echo $agendastam; ?>
            </div>
            </div>
        </div>


    </div>

    <div class="content-footer-background"></div>
</body>
</html>
