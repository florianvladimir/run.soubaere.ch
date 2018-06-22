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