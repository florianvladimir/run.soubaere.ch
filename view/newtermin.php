<main id="content">
    <article class="contFormular" style="height: auto">
        <div class="formular">
            <form method="post" action="newterminupload" name="zSetzung">

<?php

if(isset($_GET["wid"])){
$id=$_GET["wid"];
$row = 1;
if (($handle = fopen("./uploads/csv/dates.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
        $num = count($data);
        $data=array_map("utf8_encode", $data);
        if($row==1){
            $row++;
        }
        else {
            if($data[0]==$id){
                echo "<label for='nameK'>Karte</label>";
                echo "<input type=\"text\" name='nameK' class='inp' value='$data[11]'  required>";
                echo "<label for='ort'>Ort</label>";
                echo "<input type='text' name='ort' class='inp' value='$data[12]' required>";
                echo "<label for='date'>Datum</label>";
                echo "<input type='date'name='date' class='inp' value='$data[1]' required>";
            }
            $row++;

            }
    }
    }
    fclose($handle);
}
else{

                echo "<input type='text' name='nameK' class='inp' placeholder='Name'  required>";
                echo "<input type='text' name='ort' class='inp' placeholder='Ort' required>";
                echo "<input type='date'name='date' class='inp' placeholder='Datum' required>";

}?>
                <label class="container">Zielsetzng hinzufügen
                    <input type="radio" checked="checked" name="radioZ" id="mitZ" onclick="radioCh()">
                    <span class="checkmark"></span>
                </label>
                <label class="container">keine Zielsetzng
                    <input type="radio"  name="radioZ" onclick="radioCh()">
                    <span class="checkmark"></span>
                </label>
                <hr>
                <div id="zielsetzung">
                    <p>Zielsetzung</p>
                    <textarea placeholder="Ziele:" rows="20" name="ziele" id="ziele" cols="40" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true"></textarea>
                </div>
                <div class="btn" style="margin-bottom: 20px">
                    <input type="submit" class="button btnsave" value="Speichern">
                </div>
            </form>

    </article>
</main>
