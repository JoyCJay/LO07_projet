<?php
function login_DBR($id,$mdp){
    $DB_conn = mysqli_connect ('localhost','solange','abc1234567','nounous');
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
session_start();
$_SESSION['login']= $_POST['id'];
$_SESSION['type']=login_DBR($_POST['id'],$_POST['mdp']);
    if ($_SESSION['type']=='nounous'){
        $url="http://localhost/LO07_projet/nounous.php";;
    }
    elseif ($_SESSION['type']=='parents') {
        $url="http://localhost/LO07_projet/parents.php";
    }
    elseif ($_SESSION['type']=='admin') {
        $url="http://localhost/LO07_projet/admin.php";
    }
    else{
        echo "<h1>error!</h1>";
    }
    Header("Location: $url"); 
?>