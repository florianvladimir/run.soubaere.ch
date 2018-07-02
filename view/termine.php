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
            <?php if($_GET["strdat"]=="now"){?>
            <a href="termine?strdat=alle">
                <div class="button"><span>alle Anzeigen</span></div></a>
            <?php }
            else{
                ?>
                <a href="termine?strdat=now">
                    <div class="button"><span>aktuelle Anzeigen</span></div></a>
                <?php
            }
            ?>
        </div>
    </article>


    <?php

    $monL=array("Januar","Februar","März","April","Mai","Juni","Juli","August","September","Oktober","November","Dezember");
    $row = 1;
    if (($handle = fopen("./uploads/csv/dates.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
            $num = count($data);
            $data=array_map("utf8_encode", $data);
            if($row==1){
                $row++;
            }
            else {
                if($_GET["strdat"]=="alle"){
                    $gestern="2018-01-01";
                }
                else if($_GET["strdat"]=="now"){
                $datTag=date("d");
                $datMon=date("m");
                if($datTag>8){
                    $datTag=$datTag-8;
                }
                else{
                    $dif=$datTag-8;
                    $datMon=$datMon-1;
                    if($datMon<10){
                        $datMon="0".$datMon;
                    }
                    $datTag=30+$dif;
                }
                $gestern  = date("Y")."-".$datMon."-".$datTag;
            }

                if($data[1]>=$gestern){
                $row++;
                echo "<div class=\"master\">
        <article class=\"bigTermine smallSize\" id=\"move\">
            <div class=\"terminName\">";
                echo "<h4>" . $data[8] . ", " . $data[10] . "</h4>";
                echo "<p class='TerminTitel'>" . $data[11] . "</p>";
                echo "</div>";
                echo "<a href=".linkCoord($data[13],$data[14])." target=\"_blank\">";
                echo "<div class='terminContainer terminLocation'>";
                echo "<p class='light terminLocation-txt'>" . $data[12] . "</p>";
                echo "</div>";
                echo "</a>";
                echo "<div class=\"terminContainer terminInfo\">";
                echo "<p class=\"light terminLocation-txt\">Info</p>";
                echo "</div>";

                $tag = explode("-", $data[1]);
                $tag2 = $tag[2];
                $monat=$tag[1];
                echo "<div class=\"terminContainer terminDatum\">";
                echo "<p class=\"DatumZahl\">" . $tag2 . "</p>";
                echo "<p class=\"DatumMonat\">".$monL[$monat-1]."</p>";
                echo "</div>";
                echo "</article></div>";
            }}
        }
        fclose($handle);
    }
    ?>

</main>
</body>

<?php

function linkCoord($x,$y){
    $linkStr="https://map.geo.admin.ch/?lang=de&topic=ech&bgLayer=ch.swisstopo.pixelkarte-farbe&layers=ch.swisstopo.zeitreihen,ch.bfs.gebaeude_wohnungs_register,ch.bav.haltestellen-oev,ch.swisstopo.swisstlm3d-wanderwege&layers_visibility=false,false,false,false&layers_timestamp=18641231,,,&E=".$x."&N=".$y."&zoom=8";
    return $linkStr;
}