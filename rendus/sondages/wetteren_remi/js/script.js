function slct(numQ, val){
    document.forms["sondage"].elements["Q"+numQ].value = val;
    document.getElementById("S"+numQ).className = "options";
    document.getElementById("C"+numQ).innerHTML = document.getElementById("R"+numQ+""+val).innerHTML;
    document.getElementById("C"+numQ).className = "valide";
    return false;
}
function ope(select){
    //The goal is to find the position of the mouse into the page, not only the screen
    var Mouse_X = event.clientX; 
    var Mouse_Y = event.clientY
    
    var scroll_x=document.body.scrollLeft || document.documentElement.scrollLeft;
    var scroll_y=document.body.scrollTop || document.documentElement.scrollTop;

    Mouse_X += scroll_x;
    Mouse_Y += scroll_y;
    
    var select = document.getElementById(select);
    select.className = "options open";
    select.style.left = Mouse_X-235+"px";
    select.style.top = Mouse_Y-80+"px";
    return false;
}