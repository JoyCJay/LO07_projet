$('#myCarousel').carousel({interval : 2500,});
//$('#self_carousel').({interval : 2500,});

function apparaitre(){
    document.getElementById("B").style.visibility='visible';
    document.getElementById("B").innerHTML="red";
}

function disparaitre(){
    document.getElementById("B").style.visibility='hidden';
}

function admin_do(){
    window.alert("R U sure?");
}
function afficher(id){
    $("p.pannel").hide();
    document.getElementById(id).style.display='block';
}