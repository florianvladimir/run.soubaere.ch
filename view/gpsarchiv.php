<main id="content">
<?php
//Stellt jedes Training dar -->Übersicht
$result = selectallEvent();
$i=0;
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $info=selectEinheitByBasicDetailID($row['ID_Basic_Detail'],true);
        if($i%2==0){
            htmlUebLeft($info,$row,$i);
        }
        else{
            htmlUebRight($info,$row,$i);
        }
        $i++;
    }
}
/*
 * Kacheln auf der linken Seite
 */
function htmlUebLeft($data,$row,$i){
    $i++;
    ?>
    <div class="smallGps left" id="gps<?php echo $i ?>">

        <article class="training">
            <h2 class="light"><?php echo $data['detailInfo']['Name'];?></h2>

        </article>

        <div class="btn">
            <a href="detailansicht?id=<?php echo $row['ID_Basic_Detail']?>">
                <div class="button"><span>Mehr</span></div>
            </a>
        </div>

    </div>
    <?php
}

/*
 * Kacheln auf der rechten Seite
 */
function htmlUebRight($data,$row, $i){
    $i++;
    ?>

    <div class="smallGps right" id="gps<?php echo $i ?>">

        <article class="training">
            <h2 class="light"><?php echo $data['detailInfo']['Name'];?></h2>

        </article>
        <div class="btn">
            <a href="detailansicht?id=<?php echo $row['ID_Basic_Detail']?>">
                <div  class="button" ><span>Mehr</span></div>
            </a>
        </div>
    </div>
    <?php
}
?>



</main>
