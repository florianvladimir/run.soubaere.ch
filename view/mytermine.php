
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
?>
</main>