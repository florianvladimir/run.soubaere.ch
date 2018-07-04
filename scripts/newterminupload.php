<?php
/**
 * Created by PhpStorm.
 * User: moserfl
 * Date: 02.07.2018
 * Time: 15:20
 */
//Nach dem Terminhinzufügen Formular
$_SESSION["uplTermin"]=$_POST;
//Termin in die DB
insertTermin();
echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Termin hinzugefügt');
        window.location.href='gps';
        </SCRIPT>");