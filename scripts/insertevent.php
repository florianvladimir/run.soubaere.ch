<?php
/**
 * Created by PhpStorm.
 * User: moserfl
 * Date: 21.06.2018
 * Time: 16:40
 */
$_SESSION['upload']=$_POST;

if(isset($_POST['Gelaende_grob'])){
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



