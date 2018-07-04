<?php
/**
 * Created by PhpStorm.
 * User: moserfl
 * Date: 04.07.2018
 * Time: 17:04
 */

$id=$_GET["id"];
$result=selectTeminById($id);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $ziel=$row['planung'];
    }
}
?>
<main id="content">
    <article class="contFormular" style="height: auto">
        <div class="formular">
            <form method="post" action="newterminupload" name="zSetzung">
                <div id="zielsetzung">
                    <i class="fas fa-pen iconLeft"></i>
                    <p>Zielsetzung</p>
                    <textarea  rows="20" name="ziele" id="ziele" cols="40" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true"><?php echo $ziel ?></textarea>
                </div>
                <div class="btn" style="margin-bottom: 20px">
                    <input type="submit" class="button btnsave" value="Speichern">
                </div>
            </form>
        </div>
    </article>
</main>