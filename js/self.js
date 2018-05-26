$('#myCarousel').carousel({interval : 2500,});
//$('#self_carousel').({interval : 2500,});

function afficherC(id){
    $("div.admin_function").hide();
    document.getElementById(id).style.display='block';
}