<main class="whitecont" id="content">
        <?php
            $info=selectEinheitByBasicDetailID(11);
            if($info['Sportart']==3){
               htmlAndereSportart($info);
            }
        ?>

</main>
<?php

echo $info['basicInfo']['Datum'];


function htmlAndereSportart($info){
    ?>
    <a class="big" id="picgpsGr" href="./pictures/awesome.jpg" target="_blank" title="Ansehen"></a>
    <article class="contText" id="contTextID">
        <p class="kursiv"><?php echo $info['basicInfo']['Datum'];?></p>
        <h1><?php echo $info['detailInfo']['Name'];?></h1>
        <?php
        htmlbasicInfo($info);
        //echo $info['detailInfo']['Name'];
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