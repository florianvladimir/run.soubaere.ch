var intw;
var x= window.innerWidth;
if(x>999){
    var intw=1000;
    var w=1000+"px";
}
function widthTerm(){
    var wTer=document.getElementsByClassName("bigTermine");
    for(var i=0;i<wTer.length;i++){
        wTer[i].style.width = w;
        var left = (x-intw)/2;
        //console.log(left);
        wTer[i].style.left = left+"px";
    }

}
var alleElemete =document.getElementsByClassName("bigTermine");
for(var j=1;j<alleElemete.length;j++){
    dragElement(alleElemete[j]);
}




function dragElement(elmnt) {
    var x= window.innerWidth;
    var y= intw;
    var abstand =(x-y)/2;

    var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
    if (elmnt) {
        /* if present, the header is where you move the DIV from:*/
        elmnt.onmousedown = dragMouseDown;
    } /*else {
    /* otherwise, move the DIV from anywhere inside the DIV:
    elmnt.onmousedown = dragMouseDown;
  }*/

    function dragMouseDown(e) {
        e = e || window.event;
        e.preventDefault();
        // get the mouse cursor position at startup:
        pos3 = e.clientX;
        pos4 = e.clientY;
        document.onmouseup = closeDragElement;
        // call a function whenever the cursor moves:
        document.onmousemove = elementDrag;
    }

    function elementDrag(e) {
        e = e || window.event;
        e.preventDefault();
        // calculate the new cursor position:
        pos1 = pos3 - e.clientX;
        pos2 = pos4 - e.clientY;
        pos3 = e.clientX;
        pos4 = e.clientY;
        // set the element's new position:
        //elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
        var x= window.innerWidth;
        var y= elmnt.offsetLeft+elmnt.offsetWidth;
        elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
        var aktAbstand = x-y;
        console.log(aktAbstand);
        console.log("..."+abstand);
        elmnt.style.opacity=aktAbstand/abstand+"";
        if(y>=x-100){
            elmnt.style.display="none";
            setTimeout("self.location.href='termine'",1000);
            setTimeout("self.location.href='https://www.o-l.ch'",0)

        }
    }

    function closeDragElement() {
        /* stop moving when mouse button is released:*/
        document.onmouseup = null;
        document.onmousemove = null;
        var pos = elmnt.offsetWidth;
        var w = window.innerWidth;
        console.log(w-pos);
        elmnt.style.left = (w-pos)/2+"px";
        elmnt.style.opacity="1";
    }
}