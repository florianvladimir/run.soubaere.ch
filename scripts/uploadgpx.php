<?php
/**
 * Created by PhpStorm.
 * User: moserfl
 * Date: 21.06.2018
 * Time: 09:01
 */

$target_dir = "uploads/gpx/";


$count=0;

$fileName = $_FILES['gpxfile']['name'];
$fileTempName = $_FILES['gpxfile']['tmp_name'];
$fileSize = $_FILES['gpxfile']['size'];
$fileError = $_FILES['gpxfile']['error'];
$fileType = $_FILES['gpxfile']['type'];

$fileExt = explode('.', $fileName);
$fileActualExt = strtolower(end($fileExt));

$allowed = array('gpx');

if (in_array($fileActualExt, $allowed)) {
    if ($fileError === 0) {
        if ($fileSize < 5000000) {
            $fileNameNew = uniqid('', true) . $fileExt[0] . "." . $fileActualExt;
            $fileDest = $target_dir . $fileNameNew;
            move_uploaded_file($fileTempName, $fileDest);
            $_SESSION["aktGPXDest"] = $fileDest;
            $_SESSION["aktGPXname"] = $fileName;
        } else {
            echo "Ds Biud isch ds gross";
            echo $fileSize;
        }
    } else {
        echo "Het nid chönne ufelade";
        echo $fileError;
    }
} else {
    echo "Fail fausches Format";
}

$xml=simplexml_load_file($fileDest) or die("Error: Cannot create object");
$a=$xml->trk->trkseg->children();

//Distanz
$len=sizeof($a)-1;
$namespace=$xml->trk->trkseg->trkpt[$len]->getNamespaces(true);
$gpxext=$xml->trk->trkseg->trkpt[$len]->extensions->children($namespace['gpxdata']);
$distance = (string) $gpxext->distance;
//Zeit
$zeitStart = $xml->trk->trkseg->trkpt[0]->time;
$zeitEnde = $xml->trk->trkseg->trkpt[$len]->time;

$zeitStart=dataToTinme($zeitStart);
$zeitEnde=dataToTinme($zeitEnde);

$zeit=getRunTime($zeitStart,$zeitEnde);
//Höhe
$verticalheight=0;
$altitudeold=123456789;
foreach($a as $aa){
    $namespace=$aa->getNamespaces(true);
    $gpxext=$aa->extensions->children($namespace['gpxdata']);
    $altitudenew = (int) $gpxext->altitude;
    if($altitudeold!=123456789){
        if($altitudeold<$altitudenew) {
            $verticalheight = $verticalheight + ($altitudenew - $altitudeold);
        }
    }
    if($altitudenew!=0){
        $altitudeold=$altitudenew;
    }





}
echo "<br>";
echo "Distanz: ".$distance;
echo "<br>";
echo "Höhe: ".$verticalheight;
echo "<br>";
echo "Zeit: ";
echo $zeit;

$_SESSION['aktGPXn']['Distanz']=$distance/1000;
$_SESSION['aktGPXn']['verticalheight']=$verticalheight;
$_SESSION['aktGPXn']['time']=$zeit;



header("Location: newrun");


function dataToTinme($datum){
    $zeit = explode('T', $datum)[1];
    $zeit = explode('.',$zeit)[0];
    return $zeit;
}

function getRunTime($start,$ende){
    $startA=explode(':',$start);
    $endeA=explode(':',$ende);
    $stunde=(int)$endeA[0]-(int)$startA[0];
    $minute=$endeA[1]-$startA[1];
    $minute=addZero($minute);
    $sekunden=$endeA[2]-$startA[2];
    $sekunden=addZero($sekunden);
    return $stunde.":".$minute."'".$sekunden;
}

function addZero($zeit){
    if($zeit<=9){
        return "0".$zeit;
    }
    else{
        return $zeit;
    }
}