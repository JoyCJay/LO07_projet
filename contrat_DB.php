<?php
    print("<pre>");
    print_r($_POST);
    print("</pre>");
    
    if ($_POST['service']=="babysit") {
        $salary = 7 + (count($_POST['list_enfants'])-1)*4;
    }
    elseif ($_POST['service']=="langue") {
        $salary = count($_POST['list_enfants'])*15;
    }
    elseif ($_POST['service']=="reguliere") {
        $salary = 10 + (count($_POST['list_enfants'])-1)*5;
    }

    $couting_time=strtotime($_POST['dd']);
    $final_time=strtotime($_POST['df']);

    $money = 0;
    while ($couting_time<=$final_time) {
        if ( in_array(date("w",$couting_time),$_POST['jour'])) {
            $money = $money + $salary;
        }
        $couting_time = strtotime("+1day",$couting_time);//next day
    }
    
    $DB_conn = mysqli_connect ('localhost','solange','abc1234567','nounous');
    $sql_sentence = "INSERT INTO `contrat` (`nom_p`, `prenom_p`, `id_parents`, `nom_n`, `prenom_n`, `id_nounous`, `type`, `debut`, `fin`, `jour`, `heure`,`revenue`) 
    VALUES("
        ."'".$_POST['NomA']."',"
        ."'".$_POST['PrenomA']."',"
        .$_POST["IdA"].","
        ."'".$_POST['NomB']."',"
        ."'".$_POST['PrenomB']."',"
        .$_POST["IdB"].","
        ."'".$_POST['service']."',"
        ."'".$_POST['dd']."',"
        ."'".$_POST['df']."',"
        ."'".implode(",",$_POST['jour'])."',"
        ."'".$_POST['hd']."-".$_POST['hf']."',"
        .$money.");"
        ;
    echo $sql_sentence;

    $DB_result = mysqli_query($DB_conn,$sql_sentence);          
    mysqli_close($DB_conn);
?>