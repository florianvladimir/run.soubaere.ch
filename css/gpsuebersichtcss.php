<?php
/**
 * Created by PhpStorm.
 * User: moserfl
 * Date: 29.06.2018
 * Time: 08:45
 */

header('Content-type: text/css');
include_once "../db/db_connection.php";
$result = selectallEvent();
$i=0;
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $info=selectEinheitByBasicDetailID($row['ID_Basic_Detail']);
        $i++;
        if(isset($info['detailInfo']['KarteBild'])) {
            echo "#gps".$i."{";
            echo "background-image: url(../" . $info['detailInfo']['KarteBild'] . ");}";
        }

    }
}



    $result = selectlastEvent();

            $info=selectEinheitByBasicDetailID($result);
            $i++;
            if(isset($info['detailInfo']['KarteBild'])) {
                echo "#b3{";
                echo "background-image: url(../" . $info['detailInfo']['KarteBild'] . ");}";


}


?>

