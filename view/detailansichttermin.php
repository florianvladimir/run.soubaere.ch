<?php
/**
 * Created by PhpStorm.
 * User: moserfl
 * Date: 03.07.2018
 * Time: 09:21
 */
$id=$_GET['id'];
$result=selectTeminById($id);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $map=$row['MapName'];
        $datum=$row['wdate'];
        $ort=$row['ort'];
        $ziele=$row['planung'];
    }
}
$datum=explode("00",$datum)[0];
?>

<body onload="init(<?php echo $coor ?>)">
<main class="whitecont cont22" id="content">
    <article class="contText" id="contTextID">
    <?php

    echo "<h1>".$map."</h1>";
    echo "<h2>".$datum.", ".$ort."</h2>";
    echo "<hr><br>";

    if($ziele!=""){
    echo "<div class='ziele_auswert'>";
    echo "<h1>Zielsetzung</h1>";
    echo "<p class='zieleSchrift'>".nl2br($ziele)."</p>";}
    ?>
        </div>
    </article>
</main>
</body>
