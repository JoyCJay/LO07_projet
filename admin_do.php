<?php
    print("<pre>");
    print_r($_GET);
    print("</pre>");
    $DB_conn = mysqli_connect ('localhost','solange','abc1234567','nounous');
    if ($_GET['situation']=='bloquer' or $_GET['situation']=='candidat' ) {
        $situation='normal';
    } else {
        $situation='bloquer';
    }
    $sql_sentence="UPDATE nounous SET situation ='"."$situation' WHERE id_nounous =".$_GET['id_nounous']." ;";
    echo $sql_sentence;
    $DB_result = mysqli_query($DB_conn,$sql_sentence); 
    if ($DB_result){
        echo "Succeed to modify";
    }else{
        echo "fail to modify";
    }
    mysqli_close($DB_conn);
    header('Refresh:3,Url=admin.php');
?>