<?php
//Id aus URL auslesen, Daten des Beitrages aus Datenbank laden
$id=$_GET['id'];
$info=selectEinheitByBasicDetailID($id,true);
if($info['basicInfo']['file']!=""){
//Ladet die Koordinaten des GPX
$coor = getCoord($info['basicInfo']['file']);
}
//Bild über den Infos --> Bei OL die Karte
echo "<style>".'#picgpsGr{ background-image: url('.$info['detailInfo']['KarteBild'].')}'."</style>";
?>


<body onload="init(<?php echo $coor ?>)">
<main class="whitecont cont22" id="content">
        <?php

            if($info['Sportart']==3){
               htmlAndereSportart($info);
            }
            elseif ($info['Sportart']==2){
                htmlDL($info);
            }
            else{
                htmlOL($info);

            }
        ?>
    <div class="OSMmap">
        <div style="width:100%; height:100%" id="map"></div>
    </div>
</main>
</body>
<?php



/*
 * Darstellung des Kategorie "Andere Sportart"
 */
function htmlAndereSportart($info){
    ?>
    <a class="big" id="picgpsGr"></a>
    <article class="contText" id="contTextID">
        <p class="kursiv"><?php echo $info['basicInfo']['Datum'];?></p>
        <h1><?php echo $info['detailInfo']['Name'];?></h1>
        <h2><?php echo 'Intensität: '.$info['detailInfo']['Intens']?></h2>
        <?php
        htmlbasicInfo($info);
        //echo $info['detailInfo']['Name'];
        ?>

    </article>
<?php
}

/*
 * Darstllung der Kategorie "Dauerlauf"
 */
function htmlDL($info){
    ?>
    <a class="big" id="picgpsGr"></a>
    <article class="contText" id="contTextID">
        <p class="kursiv"><?php echo $info['basicInfo']['Datum'];?></p>
        <h1><?php echo $info['detailInfo']['Name'];?></h1>
        <h2><?php echo 'Intensität: '.$info['detailInfo']['Intens']?></h2>
        <?php
        htmlbasicInfo($info);
        //echo $info['detailInfo']['Name'];
        ?>

    </article>
    <?php
}

/*
 * Darstellung der Kategorie "OL"
 */
function htmlOL($info){
    ?>
   <a class="big" id="picgpsGr" href="<?php echo $info['detailInfo']['KarteBild']?>" target="_blank" title="Ansehen"></a>
    <article class="contText" id="contTextID">
        <p class="kursiv"><?php echo $info['basicInfo']['Datum'];?></p>
        <h1><?php echo $info['detailInfo']['Name'];?></h1>

        <?php
        htmlbasicInfo($info);
        htmlDetailOLInfo($info);
        planung($info);
        auswertung($info);
        ?>

    </article>
    <?php
}

/*
 * Darsellung der Basis-Infos, die jede Sportart besitzt
 */
function htmlbasicInfo($info){
    ?>

    <div class="basicInfo" id="basicInfoBoxGross">
        <div id="basicinfoCenter">
            <div class="basicInfoElement">
                <p class="InfoTitel">Dauer</p>
                <p class="basicInfoInfo"><?php echo $info['basicInfo']['Zeit'];?></p>
                <p class="InfoTitel grossInfoTitel"></p>
            </div>
            <div class="basicInfoElement">
                <p class="InfoTitel">Distanz</p>
                <p class="basicInfoInfo"><?php echo $info['basicInfo']['Distanz'];?></p>
                <p class="InfoTitel grossInfoTitel">Kilometer</p>
            </div>
            <div class="basicInfoElement">
                <p class="InfoTitel">Höhenmeter</p>
                <p class="basicInfoInfo"><?php echo $info['basicInfo']['hoehe'];?></p>
                <p class="InfoTitel grossInfoTitel">Meter</p>
            </div>
            <div class="basicInfoElement">
                <p class="InfoTitel"> Ø Herzfrequenz</p>
                <p class="basicInfoInfo"><?php echo $info['basicInfo']['hr'];?></p>
                <p class="InfoTitel grossInfoTitel">bpm</p>
            </div>
        </div>
     </div>


    <?php
}
/*
 * Detailinfos vom OL
 */
function htmlDetailOLInfo($info){
    ?>
    <div class="basicInfo" id="basicInfoBoxGrossOL">
        <div id="basicinfoCenter">
            <div class="basicInfoElement">
                <p class="InfoTitel">Ort</p>
                <p class="basicInfoInfo"><?php echo $info['detailInfo']['ort'];?></p>
                <p class="InfoTitel grossInfoTitel"></p>
            </div>
            <div class="basicInfoElement">
                <p class="InfoTitel">Massstab</p>
                <p class="basicInfoInfo"><?php echo $info['detailInfo']['massstab'];?></p>
                <p class="InfoTitel grossInfoTitel"><?php echo $info['detailInfo']['stand'];?></p>
            </div>
            <div class="basicInfoElement">
                <p class="InfoTitel">Gelände</p>
                <p class="basicInfoInfo"><?php echo $info['detailInfo']['gelaendeFein'];?></p>
                <?php if($info['detailInfo']['gelaendeGrob']=='technisch Anspruchsvoll'){ ?>
                <p class="InfoTitel grossInfoTitelKlein"><?php echo $info['detailInfo']['gelaendeGrob'];?></p>
                <?php }
                else{
                    ?>
                     <p class="InfoTitel grossInfoTitel"><?php echo $info['detailInfo']['gelaendeGrob'];?></p>
                    <?php
                }

                ?>
            </div>
            <div class="basicInfoElement">
                <p class="InfoTitel">Disziplin</p>
                <p class="basicInfoInfo"><?php echo $info['detailInfo']['disziplin'];?></p>
                <p class="InfoTitel grossInfoTitel"><?php echo $info['detailInfo']['deklaration'];?></p>
            </div>
        </div>
    </div>
<?php
}

/*
 * Das Planungs DIV mit den Zielen
 */
function planung($data){
    if($data['detailInfo']['ziele']!="") {
        echo "<div class='ziele_auswert'>";
        echo "<h1>Zielsetzung</h1>";
        echo "<p class='zieleSchrift'>" . nl2br($data['detailInfo']['ziele']) . "</p>";
        echo "</div>";
    }
}
/*
 * Auswertungs DIV mit der Auswertung
 */
function auswertung($data){
    if($data['detailInfo']['auswertung']!=""){
        echo "<div class='ziele_auswert'>";
        echo "<h1>Auswertung</h1>";
        echo "<p class='zieleSchrift'>".nl2br($data['detailInfo']['auswertung'])."</p>";
        echo "</div>";
    }
}

