$('#myCarousel').carousel({interval : 2500,});
//$('#self_carousel').({interval : 2500,});

function apparaitre(){
    document.getElementById("B").style.visibility='visible';
    document.getElementById("B").innerHTML="red";
}

function disparaitre(){
    document.getElementById("B").style.visibility='hidden';
}