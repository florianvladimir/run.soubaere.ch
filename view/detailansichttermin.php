<?php
/**
 * Created by PhpStorm.
 * User: moserfl
 * Date: 03.07.2018
 * Time: 09:21
 */
//ID des Termins aus der URL auslesen
$id=$_GET['id'];
//Temin aus Datenbank
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
//Nur Datum, keine Zeit
$datum=explode("00",$datum)[0];

$id=$_GET["id"];
$result=selectTeminById($id);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $ziel=$row['planung'];
    }
}
?>
<style>
    footer{
        display: none;
    }
</style>
<body>
<main class="whitecont cont22" id="content">
    <article class="contText" id="contTextID">
    <?php

    echo "<h1>".$map."</h1>";
    echo "<h2>".$datum.", ".$ort."</h2>";
    echo "<hr><br>";


    echo "<div class='ziele_auswert'>";
    echo "<div  class='ziele_auswert_ueb'>";
    echo "<h1 id='id_ziele_auswert_ueb'>Zielsetzung</h1>";
    if($ziele==""){
         echo "<i id='changeZ' class=\"fas fa-plus icon\" onclick='zieleBe()'></i>";
    }
    else{
        echo "<i id='changeZ' class=\"fas fa-pen icon\" onclick='zieleBe()'></i>";
    }
    echo "</div>";
    echo "<p id='zieleSchrift' class='zieleSchrift'>".nl2br($ziele)."</p>";
    ?>
        <form method="post" action="changeziel?id=<?php echo $id ?>?ansicht=0" name="zSetzung" id="zSetzung">
            <div id="zielsetzung">

                <textarea  rows="20" name="ziele" id="ziele" cols="40" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true"><?php echo $ziel ?></textarea>
            </div>
            <div class="btn" style="margin-bottom: 20px">
                <input type="submit" class="button btnsave" value="Speichern">
            </div>
        </form>
        </div>

    </article>

</main>

