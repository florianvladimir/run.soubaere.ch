<?php
/**
 * Created by PhpStorm.
 * User: moserfl
 * Date: 21.06.2018
 * Time: 15:44
 */

/*CREATE TABLE basicinfoEvent(
    ID_BasicInfo int not null AUTO_INCREMENT PRIMARY KEY,
    Datum Datetime,
    Zeit Datetime,
    Distanz double,
    hoehe double);

Create Table einheit(
    ID_Einheit int NOT Null AUTO_INCREMENT PRIMARY KEY,
    basicinfo_ID

Create Table detailinfoeventOL(
    ID_DetailInfo int NOT null AUTO_INCREMENT PRIMARY KEY,
    MapName varchar(50),
    ort varchar(50),
    stand varchar(50),
    massstab varchar(50),
    gelaendeGrob_ID int,
    gelaendeFein_ID int,
    deklaration_ID int,
    disziplin_ID int,
	FOREIGN KEY (gelaendeGrob_ID) REFERENCES gelaende (ID_gelaende),
    FOREIGN KEY (gelaendeFein_ID) REFERENCES gelaendefein (ID_gelaendeFein),
    FOREIGN KEY (deklaration_ID) REFERENCES deklaration (ID_deklaration),
    FOREIGN KEY (disziplin_ID) REFERENCES disziplin (ID_disziplin));

CREATE Table detailinfoeventdl(
    ID_DetailInfoDl int not null AUTO_INCREMENT PRIMARY KEY,
    NameDetailInfoDl varchar(50),
    DLForm_ID int,
    stringID varchar(32),
	FOREIGN KEY (DLForm_ID) REFERENCES dlform (ID_DLForm))

Create TABLE basic_detail(
    ID_Basic_Detail int NOT null AUTO_INCREMENT PRIMARY KEY,
    basicinfo_ID int,
    detailinfool_ID int,
    detailinfodl_ID int,
    detailinfoanders_ID int,
    FOREIGN KEY (basicinfo_ID) REFERENCES basicinfoevent (ID_Basicinfo),
    FOREIGN KEY (detailinfool_ID) REFERENCES detailinfoeventol (ID_DetailInfo),
    FOREIGN KEY (detailinfodl_ID) REFERENCES detailinfoeventdl (ID_DetailInfoDL),
    FOREIGN KEY (detailinfoanders_ID) REFERENCES detailinfoeventanders (ID_DetailInfoAnders))
*/

function connect()
{
    $db = new Mysqli('localhost', 'root', '', 'ttpdb');
    return $db;
    $db->close();
}

function insertBasicInfowithTermin($id){
    $data = $_SESSION['aktGPXn'];
    $db = connect();
    $id=StringIDwithBDID($id);
    $_SESSION["randomIDofBasicI"]=$id;

    //Vorbereiten des Queries
    $statement = $db->prepare('INSERT INTO basicinfoevent (Datum,Zeit,Distanz,hoehe,hr,stringID,filedest) VALUES (?,?,?,?,?,?,?)');

    //Daten an das Query binden
    $statement->bind_param('sssssss', $data['Datum'], $data['time'], $data['Distanz'], $data['verticalheight'],$data['hr'],$id,$data['file']);

    //Ausführen + Erfolgsmeldung
    if($statement->execute()) echo 'Erfolgreich ' .$db->affected_rows. ' Zeile(n) eingefügt!';

    $db->close();
}

function insertBasicInfo(){
    $data = $_SESSION['aktGPXn'];


    $db = connect();

    $id=generateRandomString(32);
    $_SESSION["randomIDofBasicI"]=$id;

    //Vorbereiten des Queries
    $statement = $db->prepare('INSERT INTO basicinfoevent (Datum,Zeit,Distanz,hoehe,hr,stringID,filedest) VALUES (?,?,?,?,?,?,?)');

    //Daten an das Query binden
    $statement->bind_param('sssssss', $data['Datum'], $data['time'], $data['Distanz'], $data['verticalheight'],$data['hr'],$id,$data['file']);

    //Ausführen + Erfolgsmeldung
    if($statement->execute()) echo 'Erfolgreich ' .$db->affected_rows. ' Zeile(n) eingefügt!';

    $db->close();
}

function inserteventol(){
    $data = $_SESSION['upload'];
    unset($_SESSION['upload']);
    $db = connect();

    if(!isset($_SESSION['aktGPXn'])){


        $id=generateRandomString(32);


        //Vorbereiten des Queries
        $statement = $db->prepare('INSERT INTO basicinfoevent (Datum,Zeit,Distanz,hoehe,stringID) VALUES (?,?,?,?,?)');

        //Daten an das Query binden
        $statement->bind_param('sssss', $data['datum'], $data['dauer'], $data['distanz'], $data['verticalheight'], $id);

        //Ausführen + Erfolgsmeldung
        if($statement->execute()) echo 'Erfolgreich ' .$db->affected_rows. ' Zeile(n) eingefügt!';
    }
    else{
        $id=$_SESSION["randomIDofBasicI"];
    }
    unset($_SESSION['aktGPXn']);

    $gelF=dataIsset($data,'Gelaende_fein');
    $gelG=dataIsset($data,'Gelaende_grob');
    $dekl=dataIsset($data,'deklaration');
    $disz=dataIsset($data,'disziplin');

    $statement2 = $db->prepare('INSERT INTO detailinfoeventol (MapName,ort,stand,massstab,gelaendeGrob_ID,gelaendeFein_ID,deklaration_ID,disziplin_ID,stringID,gpsjpg) VALUES (?,?,?,?,?,?,?,?,?,?)');

    $statement2->bind_param('ssssiiiiss', $data['nameK'], $data['ort'], $data['stand'], $data['massstab'], $gelG, $gelF, $dekl, $disz,$id,$_SESSION['jpg']['destination']);
    if($statement2->execute()) echo 'Erfolgreich ' .$db->affected_rows. ' Zeile(n) eingefügt!';

    $idBasicInfo=selectBasicInfoIDByStringID($id);
    $idDetailInfo=selectDetailInfoOlIDByStringID($id);
    echo "Detail: ".$idDetailInfo;

    $statement3 = $db->prepare('INSERT INTO basic_detail (basicinfo_ID,detailinfool_ID) VALUES (?,?)');

    $statement3->bind_param('ss',$idBasicInfo,$idDetailInfo);
    if($statement3->execute()) echo 'Erfolgreich ' .$db->affected_rows. ' Zeile(n) eingefügt!';
}

function inserteventdl(){
    $data = $_SESSION['upload'];
    $bild = randomPic();
    unset($_SESSION['upload']);
    $db = connect();

    if(!isset($_SESSION['aktGPXn'])){


        $id=generateRandomString(32);


        //Vorbereiten des Queries
        $statement = $db->prepare('INSERT INTO basicinfoevent (Datum,Zeit,Distanz,hoehe,stringID) VALUES (?,?,?,?,?)');

        //Daten an das Query binden
        $statement->bind_param('sssss', $data['datum'], $data['dauer'], $data['distanz'], $data['verticalheight'], $id);

        //Ausführen + Erfolgsmeldung
        if($statement->execute()) echo 'Erfolgreich ' .$db->affected_rows. ' Zeile(n) eingefügt!';
    }
    else{
        $id=$_SESSION["randomIDofBasicI"];
    }
    unset($_SESSION['aktGPXn']);

    $dlFrm=dataIsset($data,'DL_Form');


    $statement2 = $db->prepare('INSERT INTO detailinfoeventdl (NameDetailInfoDl,DLForm_ID,stringID,gpsjpg) VALUES (?,?,?,?)');

    $statement2->bind_param('siss', $data['nameK'], $dlFrm,$id,$bild);
    if($statement2->execute()) echo 'Erfolgreich ' .$db->affected_rows. ' Zeile(n) eingefügt!';

    $idBasicInfo=selectBasicInfoIDByStringID($id);
    $idDetailInfo=selectDetailInfoDlIDByStringID($id);
    echo "Detail: ".$idDetailInfo;

    $statement3 = $db->prepare('INSERT INTO basic_detail (basicinfo_ID,detailinfodl_ID) VALUES (?,?)');

    $statement3->bind_param('ss',$idBasicInfo,$idDetailInfo);
    if($statement3->execute()) echo 'Erfolgreich ' .$db->affected_rows. ' Zeile(n) eingefügt!';

}

function inserteventanders(){
    $bild = randomPic();
    $data = $_SESSION['upload'];
    unset($_SESSION['upload']);
    $db = connect();

    if(!isset($_SESSION['aktGPXn'])){


        $id=generateRandomString(32);


        //Vorbereiten des Queries
        $statement = $db->prepare('INSERT INTO basicinfoevent (Datum,Zeit,Distanz,hoehe,stringID) VALUES (?,?,?,?,?)');

        //Daten an das Query binden
        $statement->bind_param('sssss', $data['datum'], $data['dauer'], $data['distanz'], $data['verticalheight'], $id);

        //Ausführen + Erfolgsmeldung
        if($statement->execute()) echo 'Erfolgreich ' .$db->affected_rows. ' Zeile(n) eingefügt!';
    }
    else{
        $id=$_SESSION["randomIDofBasicI"];
    }
    unset($_SESSION['aktGPXn']);

    $intens=dataIsset($data,'Intens_Select');


    $statement2 = $db->prepare('INSERT INTO detailinfoeventanders (NameDetailInfoAnders,Intens_ID,stringID,gpsjpg) VALUES (?,?,?,?)');

    $statement2->bind_param('siss', $data['nameK'], $intens,$id,$bild);
    if($statement2->execute()) echo 'Erfolgreich ' .$db->affected_rows. ' Zeile(n) eingefügt!';

    $idBasicInfo=selectBasicInfoIDByStringID($id);
    $idDetailInfo=selectDetailInfoAndersIDByStringID($id);
    echo "Detail: ".$idDetailInfo;

    $statement3 = $db->prepare('INSERT INTO basic_detail (basicinfo_ID,detailinfoanders_ID) VALUES (?,?)');

    $statement3->bind_param('ss',$idBasicInfo,$idDetailInfo);
    if($statement3->execute()) echo 'Erfolgreich ' .$db->affected_rows. ' Zeile(n) eingefügt!';
}
function insertTermin(){
    $db = connect();
    $id=generateRandomString(32);
    $data=$_SESSION["uplTermin"];
    $statement2 = $db->prepare('INSERT INTO detailinfoeventol (MapName,ort,stringID,planung,wdate) VALUES (?,?,?,?,?)');

    $statement2->bind_param('sssss', $data["nameK"],$data["ort"],$id,$data["ziele"],$data["date"]);
    if($statement2->execute()) echo 'Erfolgreich ' .$db->affected_rows. ' Zeile(n) eingefügt!';


    $idDetailInfo=selectDetailInfoOlIDByStringID($id);
    echo "Detail: ".$idDetailInfo;
    $pl="tru";
    $statement3 = $db->prepare('INSERT INTO basic_detail (detailinfool_ID,Planung) VALUES (?,?)');

    $statement3->bind_param('ss',$idDetailInfo,$pl);
    if($statement3->execute()) echo 'Erfolgreich ' .$db->affected_rows. ' Zeile(n) eingefügt!';
}

function selectBasicInfoIDByStringID($stringID){
    $db = connect();
    $sql= "SELECT ID_BasicInfo FROM basicinfoevent WHERE stringID = '".$stringID."'";
    $result = $db->query($sql);

    if ($result->num_rows > 0)
    {
        // output data of each row
        while($row = $result->fetch_assoc())
        {
            $resID= $row["ID_BasicInfo"];
        }
    }
    echo "Return:".$resID;
    echo "<br>";
    return $resID;
}

function selectDetailInfoOlIDByStringID($stringID){
    $db = connect();
    $sql= "SELECT ID_DetailInfo FROM detailinfoeventol WHERE stringID = '".$stringID."'";
    $result = $db->query($sql);

    if ($result->num_rows > 0)
    {
        // output data of each row
        while($row = $result->fetch_assoc())
        {
            $resID= $row["ID_DetailInfo"];
        }
    }

    return $resID;
}

function selectDetailInfoDlIDByStringID($stringID){
    $db = connect();
    $sql= "SELECT ID_DetailInfoDl FROM detailinfoeventdl WHERE stringID = '".$stringID."'";
    $result = $db->query($sql);

    if ($result->num_rows > 0)
    {
        // output data of each row
        while($row = $result->fetch_assoc())
        {
            $resID= $row["ID_DetailInfoDl"];
        }
    }

    return $resID;
}

function selectDetailInfoAndersIDByStringID($stringID){
    $db = connect();
    $sql= "SELECT ID_DetailInfoAnders FROM detailinfoeventanders WHERE stringID = '".$stringID."'";
    $result = $db->query($sql);

    if ($result->num_rows > 0)
    {
        // output data of each row
        while($row = $result->fetch_assoc())
        {
            $resID= $row["ID_DetailInfoAnders"];
        }
    }

    return $resID;
}

/**
 * @param $basicInfoID
 * @return mixed
 */
function selectEinheitByBasicDetailID($basicInfoID,$onlyTer){
    $db = connect();
    $sql= "SELECT * FROM basic_detail join basicinfoevent on basicinfo_ID=ID_BasicInfo WHERE ID_Basic_Detail = '".$basicInfoID."'";
    $result = $db->query($sql);

    if ($result->num_rows > 0)
    {
        // output data of each row
        while($row = $result->fetch_assoc())
        {
            if($onlyTer){
            $res['basicInfo']['Datum']= $row["Datum"];
            $res['basicInfo']['Zeit']= $row["Zeit"];
            $res['basicInfo']['Distanz']= $row["Distanz"];
            $res['basicInfo']['hoehe']= $row["hoehe"];
            $res['basicInfo']['file']=$row['filedest'];
            $res['basicInfo']['hr']= $row["hr"];
            }
            if(isset($row['detailinfool_ID'])){
                $res['detailInfo']=selectEinheitOLByID($row['detailinfool_ID']);
                $res['Sportart']=1;
            }
            elseif(isset($row['detailinfodl_ID'])){
                $res['detailInfo']=selectEinheitDLByID($row['detailinfodl_ID']);
                $res['Sportart']=2;
            }
            elseif(isset($row['detailinfoanders_ID'])){
                $res['detailInfo']=selectEinheitAndersByID($row['detailinfoanders_ID']);
                $res['Sportart']=3;
            }

        }
    }

    return $res;
}
function selectEinheitByBasicDetailID_Termin($basicInfoID,$onlyTer){
    $db = connect();
    $sql= "SELECT * FROM basic_detail WHERE ID_Basic_Detail = '".$basicInfoID."'";
    $result = $db->query($sql);

    if ($result->num_rows > 0)
    {
        // output data of each row
        while($row = $result->fetch_assoc())
        {
            if($onlyTer){
                $res['basicInfo']['Datum']= $row["Datum"];
                $res['basicInfo']['Zeit']= $row["Zeit"];
                $res['basicInfo']['Distanz']= $row["Distanz"];
                $res['basicInfo']['hoehe']= $row["hoehe"];
                $res['basicInfo']['file']=$row['filedest'];
                $res['basicInfo']['hr']= $row["hr"];
            }
            if(isset($row['detailinfool_ID'])){
                $res['detailInfo']=selectEinheitOLByID_Termin($row['detailinfool_ID']);
                $res['Sportart']=1;
            }
            elseif(isset($row['detailinfodl_ID'])){
                $res['detailInfo']=selectEinheitDLByID($row['detailinfodl_ID']);
                $res['Sportart']=2;
            }
            elseif(isset($row['detailinfoanders_ID'])){
                $res['detailInfo']=selectEinheitAndersByID($row['detailinfoanders_ID']);
                $res['Sportart']=3;
            }

        }
    }

    return $res;
}

function selectEinheitAndersByID($id){
    $db = connect();
    $sql= "SELECT * FROM detailinfoeventanders join intensitaet on Intens_ID=ID_Intens WHERE ID_DetailInfoAnders = '".$id."'";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $res['Name']=$row["NameDetailInfoAnders"];
            $res['Intens']=$row['NameIntens'];
            $res['KarteBild']=$row['gpsjpg'];
        }
    }
    return $res;

}

function selectEinheitDlByID($id){
    $db = connect();
    $sql= "SELECT * FROM detailinfoeventdl join dlform on DLForm_ID=ID_DLForm WHERE ID_DetailInfoDl = '".$id."'";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $res['Name']=$row["NameDetailInfoDl"];
            $res['Intens']=$row['NameDLForm'];
            $res['KarteBild']=$row['gpsjpg'];
        }
    }
    return $res;
}

function selectEinheitOLByID($id){
    $db = connect();
    $sql= "SELECT * FROM detailinfoeventol join disziplin on ID_Disziplin=Disziplin_ID join deklaration on ID_Deklaration=Deklaration_ID join gelaende on ID_Gelaende=gelaendeGrob_ID join gelaendeFein on ID_GelaendeFein=GelaendeFein_ID WHERE ID_DetailInfo = '".$id."'";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $res['Name']=$row["MapName"];
            $res['ort']=$row['ort'];
            $res['stand']=$row['stand'];
            $res['massstab']=$row['massstab'];
            $res['gelaendeFein']=$row['NameGelaendeFein'];
            $res['gelaendeGrob']=$row['NameGelaende'];
            $res['deklaration']=$row['NameDeklaration'];
            $res['disziplin']=$row['NameDisziplin'];
            $res['KarteBild']=$row['gpsjpg'];
        }
    }
    return $res;
}

function selectEinheitOLByID_Termin($id){
    $db = connect();
    $sql= "SELECT * FROM detailinfoeventol WHERE ID_DetailInfo = '".$id."'";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $res['Name']=$row["MapName"];
            $res['ort']=$row['ort'];
            $res['planung']=$row['planung'];
            $res['wdate']=$row["wdate"];
        }
    }
    return $res;
}

function selectallEvent(){
    $db=connect();
    $sql = "SELECT * FROM basic_detail where Planung != 'tru' order by ID_Basic_Detail desc";
    $result = $db->query($sql);
    return $result;
}
function selectlastEvent(){
    $db=connect();
    $sql = "SELECT * FROM basic_detail where Planung != 'tru' order by ID_Basic_Detail desc limit 1";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $res = $row['ID_Basic_Detail'];
        }
    }

    return $res;
}
function selectallTermine(){
    $db=connect();
    $sql = "SELECT * FROM basic_detail where Planung like 'tru' order by ID_Basic_Detail desc";
    $result = $db->query($sql);
    return $result;
}

function selectTeminById($id){
    $db=connect();
    $sql = "SELECT * FROM basic_detail where Planung like 'tru' and ID_Basic_Detail='".$id."'";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $res = $row['detailinfool_ID'];

        }
    }
    $sql2 = "SELECT * FROM detailinfoeventol where ID_DetailInfo='".$res."'";
    $result2 = $db->query($sql2);
    return $result2;

}

function StringIDwithBDID($id){
    $db=connect();
    $sql = "SELECT * FROM basic_detail join detailinfoeventol on ID_Detailinfo=detailInfool_ID where basic_detail.Planung like 'tru' and ID_Basic_Detail='".$id."'";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $res = $row['stringID'];
        }
    }
    return $res;

}

function updateDetailInfool(){
    $data = $_SESSION['upload'];
    unset($_SESSION['upload']);

    $db=connect();
    $id=$_SESSION["randomIDofBasicI"];
    unset($_SESSION['aktGPXn']);

    $gelF=dataIsset($data,'Gelaende_fein');
    $gelG=dataIsset($data,'Gelaende_grob');
    $dekl=dataIsset($data,'deklaration');
    $disz=dataIsset($data,'disziplin');

    $statement2 = $db->prepare('UPDATE detailinfoeventol set MapName=?,ort=?,stand=?,massstab=?,gelaendeGrob_ID=?,gelaendeFein_ID=?,deklaration_ID=?,disziplin_ID=?,gpsjpg=? where stringID="'.$id.'"');
    $statement2->bind_param('ssssiiiis', $data['nameK'], $data['ort'], $data['stand'], $data['massstab'], $gelG, $gelF, $dekl, $disz,$_SESSION['jpg']['destination']);
    if($statement2->execute()) echo 'Erfolgreich ' .$db->affected_rows. ' Zeile(n) eingefügt!';

}

function updateBasicInfoTermin(){
    $db=connect();
    $id=$_SESSION["randomIDofBasicI"];
    unset($_SESSION["randomIDofBasicI"]);
    $biid=selectBasicInfoIDByStringID($id);
    $diolid=selectDetailInfoOlIDByStringID($id);
    $planung="";
    $statement2 = $db->prepare('UPDATE basic_detail set basicinfo_ID=?,Planung=? where detailInfool_ID="'.$diolid.'"');
    $statement2->bind_param('is', $biid,$planung);
    if($statement2->execute()) echo 'Erfolgreich ' .$db->affected_rows. ' Zeile(n) eingefügt!';

}


function randomPic(){
    $array = array("pictures/stone1_small.jpg", "pictures/stone2_small.jpg", "pictures/lake_small.jpg", "pictures/meer1_small.jpg","pictures/meer2_small.jpg","pictures/meer3_small.jpg");
    $rand= rand ( 1, 6 );
    return $array[$rand];
}
