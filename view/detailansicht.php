<?php
$id=$_GET['id'];
$info=selectEinheitByBasicDetailID($id);
$coor = getCoord($info['basicInfo']['file']);

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




function htmlAndereSportart($info){
    ?>
    <a class="big" id="picgpsGr" href="./pictures/awesome.jpg" target="_blank" title="Ansehen"></a>
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

function htmlDL($info){
    ?>
    <a class="big" id="picgpsGr" href="./pictures/awesome.jpg" target="_blank" title="Ansehen"></a>
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

function htmlOL($info){
    ?>
   <a class="big" id="picgpsGr" href="./pictures/awesome.jpg" target="_blank" title="Ansehen"></a>
    <article class="contText" id="contTextID">
        <p class="kursiv"><?php echo $info['basicInfo']['Datum'];?></p>
        <h1><?php echo $info['detailInfo']['Name'];?></h1>

        <?php
        htmlbasicInfo($info);
        htmlDetailOLInfo($info);

        ?>

    </article>
    <?php
}

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
                <p class="InfoTitel grossInfoTitel"><?php echo $info['detailInfo']['gelaendeGrob'];?></p>
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

