<?php
/**
 * Created by PhpStorm.
 * User: moserfl
 * Date: 21.06.2018
 * Time: 16:40
 */
$_SESSION['upload']=$_POST;

if(isset($_POST['Gelaende_grob'])){
    $target_dir = "uploads/karten/";

    $count=0;

    $fileName = $_FILES['jpgkarte']['name'];
    $fileTempName = $_FILES['jpgkarte']['tmp_name'];
    $fileSize = $_FILES['jpgkarte']['size'];
    $fileError = $_FILES['jpgkarte']['error'];
    $fileType = $_FILES['jpgkarte']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg','jpeg','png');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 500000000) {
                $fileNameNew = uniqid('', true) . $fileExt[0] . "." . $fileActualExt;
                $fileDest = $target_dir . $fileNameNew;
                move_uploaded_file($fileTempName, $fileDest);
                $_SESSION['jpg']['destination'] = $fileDest;
            } else {
                echo "Ds Biud isch ds gross";
                echo $fileSize;
            }
        } else {
            echo "Het nid chönne ufelade";
            echo $fileError;
        }
    }
        else{
            echo "falsches format";
        }

    inserteventol();
    header("Location: home");
}

elseif(isset($_POST['DL_Form'])){
    inserteventdl();
    header("Location: home");
}

elseif(isset($_POST['Intens_Select'])){
    inserteventanders();
    header("Location: home");
}



