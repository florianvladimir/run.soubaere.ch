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
