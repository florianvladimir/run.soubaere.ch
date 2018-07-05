<?php
function build($file, $script=false)
{
    ?>

    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>moserflorian.ch</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/newrun.css">
        <link rel="stylesheet" href="css/upload.css">
        <link rel="stylesheet" href="css/detailansicht.css">
        <link rel="stylesheet" href="css/gpsuebersichtcss.php">
        <link rel="stylesheet" href="css/termine.css">
        <link rel="stylesheet" href="css/newtermine.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">


    </head>
    <body>
    <header>
        <div id=header>
            <div id="header_pic">
            </div>

            <div id="navi">
                <nav id="naviga">
                    <label for="show-menu" class="show-menu"><i class="fa fa-bars" aria-hidden="false"></i></label>
                    <input type="checkbox" id="show-menu" role="button">
                    <ul id="menu">
                        <li><a href="home">Home</a></li>
                        <li>
                            <a href="gps">Training</a>
                            <ul class="hidden">
                                <li><a href="gpsarchiv">Archiv</a></li>
                                <li><a href="myTermine">Planung</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="termine?strdat=now">Termine</a>
                        </li>
                        <li><a href="bio">Biographie</a></li>
                        <li><a href="impressum">Impressum</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
  	<main>
      <?php
        if ($script==true){
            require_once './scripts/'.$file;
        }else{
            require_once './view/'.$file;
        }
     ?>
	</main>
    <footer id="fooo">
        <hr>
        <p class="light"><i class="fa fa-copyright" aria-hidden="true"></i>
            Florian Moser<p>
    </footer>
    <button onclick="topFunction()" id="scrlo" class="button" title="go to top"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>
    <script src="js/openstreetmap.js" type="text/javascript"/>
    <script src="js/navjs.js" type="text/javascript"></script>
    <script src="js/btnUp.js" type="text/javascript"></script>
    <script src="js/newrun.js" type="text/javascript"></script>
    <script src="js/upload.js" type="text/javascript"></script>
    <script src="js/ie.js" type="text/javascript"></script>
    <script src="js/detailansicht.js" type="text/javascript"></script>
    <script src="http://www.openlayers.org/api/OpenLayers.js"></script>
    <script src="http://www.openstreetmap.org/openlayers/OpenStreetMap.js"></script>
    <script src="js/termineMove.js" type="text/javascript"></script>
    <script src="js/newtermin.js" type="text/javascript"></script>
    </body>
</html>
<?php
}
?>


