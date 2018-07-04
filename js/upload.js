function showUpload(){
    var olform=document.getElementById('sportat-ol');
    var selectSport = document.getElementById('sportart');
    var dlform=document.getElementById('sportat-dl');
    var andereform=document.getElementById('sportat-anders');

    console.log(selectSport.value);
    if(1==selectSport.value){
        dlform.style.display="none";
        olform.style.display="block";
        andereform.style.display="none";
    }
    else if(2==selectSport.value){
        olform.style.display="none";
        dlform.style.display="block";
        andereform.style.display="none";
    }
    else if(3==selectSport.value){
        andereform.style.display="block";
        dlform.style.display="none";
        olform.style.display="none";
    }

}

function switchSlider() {
    var auswertung=document.getElementById("auswetung_txt");
    var slider=document.getElementById("slider_chbx").checked;

    if(slider){
        auswertung.style.display="block";
    }
    else{
        auswertung.style.display="none";
    }
}