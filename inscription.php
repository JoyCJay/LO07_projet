<?php
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    function sign_in_DBR($push){
        $DB_conn = mysqli_connect ('localhost','root','123456','LO07_projet');
        $sql_sentence = "INSERT INTO `login` (`login`, `mot_de_passe`, `type`) VALUES(\"$push[0]\",\"$push[1]\",\"$push[2]\");";
        $DB_result = mysqli_query($DB_conn,$sql_sentence); 
        echo "OK, saved";            
        mysqli_close($DB_conn);
    }
    
    $id = $_POST['Prenom'].".".$_POST['Nom'];
    $push = array($id,$_POST['Portable'],$_POST['identification']);
    print_r($push);
    sign_in_DBR($push);
?>

