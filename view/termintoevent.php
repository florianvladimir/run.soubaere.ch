<style>
    #myModal{
        display: block;
    }
    header{
        display: none;
    }
    footer{
        display: none;
    }
</style>
<?php
/**
 * Created by PhpStorm.
 * User: moserfl
 * Date: 03.07.2018
 * Time: 13:17
 */
//GPX-UPLOAD Dialog, wenn man von einem Termin ein Event erstellen will
$_SESSION["aktB_B_ID"]=$_GET['id'];
gpxUpload();

