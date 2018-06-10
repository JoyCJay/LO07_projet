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
    var nb_jour = 0;
    var nb_enfant = 0;
    var devis_jour = 0;
    var devis_semaine = 0;
    $("li.jour").each(function( index ) {
        checkbox=$( this ).children("input");
        if (checkbox[0].checked == true) {
            nb_jour ++;
        }
    });

    $("td.enfant").each(function( index ) {
        checkbox=$( this ).children("input");
        if (checkbox[0].checked == true) {
            nb_enfant ++;
        }
    });
    if ($("#service").val()=='babysit') {
        devis_jour= 7+(nb_enfant-1)*4;
    } 
    else if ($("#service").val()=='langue'){
        devis_jour= nb_enfant*15;
    }
    else if ($("#service").val()=='reguliere'){
        devis_jour= 10+(nb_enfant-1)*5;
    }
    devis_semaine=nb_jour*devis_jour;
    alert($("#service").val()+"\n"+
        "Nombre d'enfant : "+nb_enfant+"\n"+
        "Nombre de jour : "+nb_jour+"\n"+
        "Devis par jour: "+devis_jour+"\n"+
        "Devis par semaine: "+devis_semaine
    );
}