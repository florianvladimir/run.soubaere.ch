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

<main id="content33">
    <article class="bigTermine" id="titelTermine">
        <h1 class="dark">Termine</h1>
        <p class="termin-info-txt">Alle Termine der OL-Saison auf einem Blick</p>
    </article>
    <div>
        <article class="bigTermine smallSize" id="move">
            <div class="terminName">
                <h4>Urseller-OL, ol norska</h4>
                <p class="TerminTitel">Grunigelwald</p>

            </div>

            <div class="terminContainer terminLocation">
                <p class="light terminLocation-txt">Staffelalp</p>
            </div>

            <div class="terminContainer terminInfo">
                <p class="light terminLocation-txt">Info</p>
            </div>
            <div class="terminContainer terminDatum">
                <p class="DatumZahl">12</p>
                <p class="DatumMonat">September</p>
            </div>
        </article>
    </div>
    <div class="master">
        <article class="bigTermine smallSize" id="move">
            <div class="terminName">
                <h4>Urseller-OL, ol norska</h4>
                <p class="TerminTitel">Grunigelwald</p>

            </div>

            <div class="terminContainer terminLocation">
                <p class="light terminLocation-txt">Staffelalp</p>
            </div>

            <div class="terminContainer terminInfo">
                <p class="light terminLocation-txt">Info</p>
            </div>
            <div class="terminContainer terminDatum">
                <p class="DatumZahl">12</p>
                <p class="DatumMonat">September</p>
            </div>
        </article>
    </div>
    <?php
    $row = 1;
    if (($handle = fopen("./uploads/csv/dates.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
    $num = count($data);
    echo "<p> $num Felder in Zeile $row: <br></p>\n";
    $row++;
    for ($c=0; $c < $num; $c++) {
    echo $data[$c] . "<br>";
    }
    }
    fclose($handle);
    }
    ?>
</main>
