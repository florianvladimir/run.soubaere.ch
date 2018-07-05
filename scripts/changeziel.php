<?php
/**
 * Created by PhpStorm.
 * User: moserfl
 * Date: 04.07.2018
 * Time: 17:04
 */

$_SESSION["update"]=$_POST;

if($_GET['ansicht']<2){
    updateZiel($_GET["id"]);
    if($_GET["ansicht"]!=1){
        header('Location: detailansichttermin?id='.$_GET["id"]);
    }
    else {
        header('Location: detailansicht?id='.$_GET["id"]);
    }
}
else{
    updateAuswert($_GET["id"]);
    header('Location: detailansicht?id='.$_GET["id"]);
}
