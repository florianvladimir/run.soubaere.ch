<?php
/**
 * Created by PhpStorm.
 * User: moserfl
 * Date: 29.06.2018
 * Time: 10:26
 */?>
<style>
    footer{
        display: none;
    }
</style>

<body onload="widthTerm()">
<main id="content33">
    <article class="bigTermine" id="titelTermine">
        <h1 class="dark">Termine</h1>
        <p class="termin-info-txt">Alle Termine der OL-Saison auf einem Blick</p>
        <div class="btn">
            <?php
            //Button für die Sortiewrung der Termine
            if($_GET["strdat"]=="now"){
                ?>
            <a href="termine?strdat=alle">
                <div class="button"><span>alle anzeigen</span></div></a>
            <?php }
            else{
                ?>
                <a href="termine?strdat=now">
                    <div class="button"><span>aktuelle anzeigen</span></div></a>
                <?php
            }
            ?>
        </div>
    </article>


    <?php

    $monL=array("Januar","Februar","März","April","Mai","Juni","Juli","August","September","Oktober","November","Dezember");
    $row = 1;
    //Öffnen eines Fiels in PHP
    if (($handle = fopen("./uploads/csv/dates.csv", "r")) !== FALSE) {
        //Durch alle Daten iterieren
        while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
            $num = count($data);
            //UTF-8, sonst werden Umlaute nicht richtig dargestellt
            $data=array_map("utf8_encode", $data);
            //Erste Zeile überspringen
            if($row==1){
                $row++;
            }

            else {
                //Wenn alle Trmine des Jahres Dargestellt werden sollen
                if($_GET["strdat"]=="alle"){
                    $gestern="2018-01-01";
                }
                //Nur aktuelle Termine
                else if($_GET["strdat"]=="now"){
                $datTag=date("d");
                $datMon=date("m");
                if($datTag>8){
                    $datTag=$datTag-8;
                }
                //Wenn das aktuelle Datum kleiner als 8 ist --> Anderer Monat
                else{
                    $dif=$datTag-8;
                    $datMon=$datMon-1;
                    if($datMon<10){
                        $datMon="0".$datMon;
                    }
                    $datTag=30+$dif;
                }
                //$gesten--> Datum ab wann Termine dargestellt werden sollen
                $gestern  = date("Y")."-".$datMon."-".$datTag;
            }
                //Darstellung der Termin-Kacheln
                if($data[1]>=$gestern){
                $row++;
                echo "<div class=\"master\">
        <article class=\"bigTermine smallSize\" id=\"move\">
            <div class=\"terminName\">";
                echo "<h4 title='". $data[8] . ", " . $data[10] ."'>" . $data[8] . ", " . $data[10] . "</h4>";
                echo "<p class='TerminTitel'>" . $data[11] . "</p>";
                echo "</div>";
                echo "<a href=".linkCoord($data[13],$data[14])." target=\"_blank\">";
                echo "<div class='terminContainer terminLocation'>";
                echo "<p class='light terminLocation-txt'>" . $data[12] . "</p>";
                echo "</div>";
                echo "</a>";
                echo "<a href=".$data[9]." target=\"_blank\">";
                echo "<div class=\"terminContainer terminInfo\">";
                echo "<p class=\"light terminLocation-txt\">Info</p>";
                echo "</div>";
                echo "</a>";

                $tag = explode("-", $data[1]);
                $tag2 = $tag[2];
                $monat=$tag[1];
                echo "<div class=\"terminContainer terminDatum\">";
                echo "<p class=\"DatumZahl\">" . $tag2 . "</p>";
                echo "<p class=\"DatumMonat\">".$monL[$monat-1]."</p>";
                echo "</div>";
                echo "<div id='wid' style='display: none'>".$data[0]."</div>";
                echo "</article></div>";
            }}
        }
        //File-Schliessen
        fclose($handle);
    }
    ?>

</main>
</body>

<?php
//Generieren des Linkes für die Karte
function linkCoord($x,$y){
    $linkStr="https://map.geo.admin.ch/?lang=de&topic=ech&bgLayer=ch.swisstopo.pixelkarte-farbe&layers=ch.swisstopo.zeitreihen,ch.bfs.gebaeude_wohnungs_register,ch.bav.haltestellen-oev,ch.swisstopo.swisstlm3d-wanderwege&layers_visibility=false,false,false,false&layers_timestamp=18641231,,,&E=".$x."&N=".$y."&zoom=8";
    return $linkStr;
}