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

    if ($_POST['Mdp']!=$_POST['Mdp_r']) {
        echo "<h1>2fois de mot de passe n'est pas le meme!</h1>";
        if ($_POST['identification']=="nounous") {
            echo "<button type='button' class='btn btn-outline-primary Nouveau1' onclick=\"location.href='./nouveau_nounous.html'\">Come back</button>";
        }
        elseif ($_POST['identification']=="parents") {
            echo "<button type='button' class='btn btn-outline-primary Nouveau1' onclick=\"location.href='./nouveau_parents.html'\">Come back</button>";
        }
    }
    else{
        $push = array($_POST['Login'],$_POST['Mdp'],$_POST['identification']);
        print_r($push);
        sign_in_DBR($push);
        echo "<h1>Succeed to sign in!</h1>";
        echo "<button type='button' class='btn btn-outline-primary Nouveau1' onclick=\"location.href='./index.html'\">Come back</button>";
    }
?>

