
var ziele = document.getElementById("zieleSchrift");
var blofi = document.getElementById("blofi");
var zBearb = document.getElementById("zSetzung")
var ueb = document.getElementById("id_ziele_ueb");

function zieleBe() {

    console.log(ziele.style.display);
    if(ziele.style.display=="none"){
        ziele.style.display = "block";
        zBearb.style.display = "none";
        ueb.innerHTML="Zielsetzung";
    }
    else{
        ziele.style.display = "none";
        zBearb.style.display = "block";
        ueb.innerHTML="<i class=\"fas fa-pen icon\" style='margin-left: 5px'></i>   Zielsetzung "
    }

}

var ausw = document.getElementById("auswertSchrift");
var aBearb = document.getElementById("aSetzung");
var ueb2 = document.getElementById("id_auswert_ueb");
function auswBe() {

    if(ausw.style.display=="none"){
        ausw.style.display = "block";
        aBearb.style.display = "none";
        ueb2.innerHTML="Auswertung";
    }
    else{
        ausw.style.display = "none";
        aBearb.style.display = "block";
        ueb2.innerHTML="<i class=\"fas fa-pen icon\" style='margin-left: 5px'></i>   Auswertung "
    }

}

function bottomFooter(){
    var hCont = document.getElementById("content").offsetHeight;
    var hWindow = window.innerHeight-160;
    var footer = document.getElementById("fooo");
    console.log(hCont);
    console.log(hWindow);
    if(hCont<hWindow){
        footer.style.position="absolute";
        footer.style.bottom="0";
    }
    else{
        footer.style.position="relative";
    }

}
