
<main id="content">
<?php
$result = selectallTermine();
$i=0;

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $info=selectEinheitByBasicDetailID_Termin($row['ID_Basic_Detail'],false);

        if($i%2==0){
            htmlUebLeft($info,$row,$i);
        }
        else{
            htmlUebRight($info,$row,$i);
        }
        $i++;

    }
}

function htmlUebLeft($data,$row,$i){
    $i++;
    ?>
    <div class="smallGps left" id="termin<?php echo $i ?>">

        <article class="training auswertungT">
            <h2 class="light"><?php echo $data['detailInfo']['Name'];?></h2>

        </article>


        <div class="btn_auswertungT btn">
            <a href="detailansichttermin?id=<?php echo $row['ID_Basic_Detail']?>">
                <div class="button"><span>Ansehen</span></div>
            </a>
        </div>
        <div class="btn_auswertungT btn">
            <a href="termintoevent?id=<?php echo $row['ID_Basic_Detail']?>">
                <div  class="button" ><span>Auswerten</span></div>
            </a>
        </div>

    </div>
    <?php
}


function htmlUebRight($data,$row, $i){
    $i++;
    ?>

    <div class="smallGps right" id="termin<?php echo $i ?>">

        <article class="auswertungT training">
            <h2 class="light"><?php echo $data['detailInfo']['Name'];?></h2>

        </article>
        <div class="btn_auswertungT btn">
            <a href="detailansichttermin?id=<?php echo $row['ID_Basic_Detail']?>">
                <div  class="button" ><span>Ansehen</span></div>
            </a>
        </div>
        <div class="btn_auswertungT btn">
            <a href="termintoevent?id=<?php echo $row['ID_Basic_Detail']?>">
                <div  class="button" ><span>Auswerten</span></div>
            </a>
        </div>
    </div>
    <?php
}
?>
    <?php gpxUpload(); ?>
</main>

