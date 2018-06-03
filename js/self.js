$('#myCarousel').carousel({interval : 2500,});

function afficherC(id){
    $("div.admin_function").hide();
    document.getElementById(id).style.display='block';
}

function afficherC1(id){
    $("div.parent_function").hide();
    document.getElementById(id).style.display='block';
}

function devis(){
    var jour=$("#jour");
    alert("devis:20 euro\n"+
        $("#service").val()+"\n"+
        "length de jour: "+jour.length
    );
}