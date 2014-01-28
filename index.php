<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
    <?php include 'head.php'; ?>

    <title></title>
</head>

<body class="page-background">
    <!-- facebook -->
    

    <div id="fb-root"></div>

    <div class="container">
        <div class="row">
            <div class="span12">
                <div style="background-repeat: no-repeat;min-height:228px;height:auto;height:228px;background-image: url(header.png);">
                    <div style="position:relative;top:195px;left:20px;z-index:3000;">
                        <?php include 'horizontal_menu.php'; ?>
                    </div>
                </div>
                <?php
                	toonPagina($_GET["pagina"]);
                ?>
            </div>
        </div>
    </div>
</body>
</html>
