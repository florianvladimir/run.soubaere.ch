<?php
session_start();

include_once './resources/builder.php';
//include_once 'scripts/db_abfragen.php';
//include_once 'scripts/funktionen.php';
//include_once 'scripts/Change.php';

$temp = trim($_SERVER['REQUEST_URI'], '/');
$url = explode('/', $temp);

if(!empty($url[1])){
    $url[1]=strtolower($url[1]);
    switch ($url[1]){
        case 'bio':
            build('bio.php');
            break;
        case 'detailansicht':
            build('detailansicht.php');
            break;
        case 'galerie':
            build('galerie.php');
            break;
        case 'gps':
            build('gps.php');
            break;
        case 'gpsarchiv':
            build('gpsarchiv.php');
            break;
        case 'home':
            build('home.php');
            break;
        case 'newrun':
            build('newrun.php');
            break;
        case 'impressum':
            build('impressum.php');
            break;
        /*
        case 'unsetgemerkt':
            checkLoggedIn();
            build('unsetGemerkt.php', true);
            break;*/

        default:
            build('home.php');
            break;
    }
}
else {
    checkLoggedIn();
    build('home.php');
    }
 ?>