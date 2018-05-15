$('#myCarousel').carousel({interval : 2500,});
//$('#self_carousel').({interval : 2500,});

function apparaitre(){
    document.getElementById("B").style.visibility='visible';
    document.getElementById("B").innerHTML="red";
}

function disparaitre(){
    document.getElementById("B").style.visibility='hidden';
}


/*
onmouseover="B_mouseover()" onmouseout="B_mouseout()"
function profil_info_move(){
    var css_sentence="width:60px;height:60px;position:absolute;top:40px;left:150px;";
    document.getElementById("profil_info").setAttribute("style",css_sentence);
}
function B_mouseover(){
    setTimeout("profil_info_move()",700);
}

function profil_info_init(){
    var css_sentence="width:135px;height:20px;position:absolute;top:145px;left:0px;";
    document.getElementById("profil_info").setAttribute("style",css_sentence);
}
function B_mouseout(){
    setTimeout("profil_info_init()",1000);
}
*/