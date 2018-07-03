<?php
/**
 * Created by PhpStorm.
 * User: moserfl
 * Date: 22.06.2018
 * Time: 09:02
 */
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function dataIsset($data,$string){
    if(($data[$string])==0){
        return null;
    }
    return $data[$string];
}

function getCoord($file){
    $result="";
    $xml = simplexml_load_file($file) or die("Error: Cannot create object");
    foreach($xml->trk->trkseg->trkpt[0]->attributes() as $a => $b) {
        //echo $a,'="',$b,"\"\n";
        if($a=="lat"){
            $result=$b;
        }
        elseif ($a=="lon"){
            $result=$result.", ".$b;
        }

    }
    //echo $result;
    return $result.", '".$file."'";
}

function generateRandomColor(){
    $a=array("0","1","2","3","4","5","6","7","8","9","a","b","c","d","e","f");
    $res="#";
    for($i=0;$i<4;$i++){
        $k=rand(5,14);
        $res=$res.$a[$k];
    }
    $res=$res."ff";
    return $res;
}

function gpxUpload(){
    ?>
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <h2>Neue Einheit erfassen</h2>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <form action="uploadgpx" method="post" enctype="multipart/form-data">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01" name="gpxfile" accept=".gpx">
                            <label class="custom-file-label" for="inputGroupFile01">Bitte wähle das GPX-File der Einheit aus</label>
                        </div>
                        <br>
                        <input type="submit" class="custom-file-input" id="btnWeiterFile" value="Weiter">
                        <label class="custom-file-label" for="btnWeiterFile">Weiter</label>
                    </form>
                </div>
                <a href="newrun?termin=true">Kein GPX - lade die Einheit manuell hoch.</a>
            </div>
            <div class="modal-footer">
                <h3></h3>
            </div>
        </div>


    </div>
<?php
}