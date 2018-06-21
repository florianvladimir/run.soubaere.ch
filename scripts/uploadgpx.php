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
            $fileNameNew = uniqid('', true) . $fileExt[0]. "." . $fileActualExt;
            $fileDest = $target_dir . $fileNameNew;
            move_uploaded_file($fileTempName, $fileDest);
            $_SESSION["aktGPX"]=$fileDest;
        } else {
            echo "Ds Biud isch ds gross";
            echo $fileSize;
        }
    } else {
        echo "Het nid chönne ufelade";
    }
} else {
    echo "Fail fausches Format";
}
