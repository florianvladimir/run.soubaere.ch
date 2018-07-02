
var ziel = document.getElementById("zielsetzung");
var footer = document.getElementById("fooo");
function radioCh() {
    var check = document.getElementById("mitZ").checked;
    if(!check){
        ziel.style.display="none";
        footer.style.bottom="0";
        footer.style.position="absolute";
    }
    if(check){
        ziel.style.display="block";
        footer.style.position="relative";
    }
}
