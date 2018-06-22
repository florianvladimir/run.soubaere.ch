<?php
session_start();

include_once './resources/builder.php';
include_once 'db/db_connection.php';
include_once 'scripts/functions.php';
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
        case 'newrunselect':
            build('newrun2.php');
            break;
        case 'impressum':
            build('impressum.php');
            break;
        case 'uploadgpx':
            build('uploadgpx.php', true);
            break;
        case 'insertevent':
            build('insertevent.php', true);
            break;
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