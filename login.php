<?php
function login_DBR($id,$mdp){
    $DB_conn = mysqli_connect ('localhost','root','123456','LO07_projet');
    $DB_result = mysqli_query($DB_conn,'select * from login;'); 
    if ($DB_result){
        while($temp = mysqli_fetch_array ($DB_result,MYSQLI_ASSOC)){
            if ($temp['login']==$id and $temp['mot_de_passe']==$mdp){
                return $temp['type'];
            }
        }
    }
    mysqli_close($DB_conn);
    return "false";
}


echo login_DBR($_POST['id'],$_POST['mdp']);
/*
    if ($_POST['type']=='nounous'){
        echo "Nounous";
    }
    elseif ($_POST['type']=='parents') {
        $url="http://localhost/LO07_projet/parents.php";
    }
    elseif ($_POST['type']=='administrateur') {
        echo "admin";
    }
    Header("Location: $url"); 
*/
?>