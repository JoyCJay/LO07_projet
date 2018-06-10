<?php
    $DB_conn = mysqli_connect ('localhost','solange','abc1234567','nounous');
    $DB_result = mysqli_query($DB_conn,"select * from contrat where id_contrat=".$_GET['id_contrat'].";"); 
    if ($DB_result){
      $temp = mysqli_fetch_array ($DB_result,MYSQLI_ASSOC);
    }
    mysqli_close($DB_conn);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Nounous candidat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/self.js"></script>
</head>
<body>


<div class="container" >
    <ul>
        <li class="col-sm-6 col-md-6" style="position:absolute;left:250px;top:150px;" >
            <fieldset><legend>Info Partie A : Parents</legend>
                <?php
                    echo "id_parents : ".$temp['id_parents']."</br>";
                    echo "nom : ".$temp['nom_p']."</br>";
                    echo "prenom : ".$temp['prenom_p']."</br>";
                ?>
                <ul>
                    <?php
                        $list=explode(",",$temp['list_enfant']);
                        $DB_conn = mysqli_connect ('localhost','solange','abc1234567','nounous');
                        foreach ($list as $id_bebe) {
                            echo "<li>";
                            $sql="select * from enfant where id_enfant=$id_bebe;";
                            $DB_result2 = mysqli_query($DB_conn,$sql); 
                            if ($DB_result2){
                                $bebe = mysqli_fetch_array ($DB_result2,MYSQLI_ASSOC);
                                echo "id_enfant : ".$bebe['id_enfant']."</br>";
                                echo "prenom : ".$bebe['prenom']."</br>";
                                echo "date_de_naissance : ".$bebe['date_de_naissance']."</br>";
                                echo "restrictions_alimentaires : ".$bebe['restrictions_alimentaires']."</br>";
                            }
                            echo "</li>";
                        }
                        mysqli_close($DB_conn);
                    ?>
                </ul>
            </fieldset>
        </li>

        <li class="col-sm-6 col-md-6" style="position:absolute;left:600px;top:150px;">
            <fieldset><legend>Info Partie B : Nounous</legend>
                <?php
                    echo "id_nounous : ".$temp['id_nounous']."</br>";
                    echo "nom : ".$temp['nom_n']."</br>";
                    echo "prenom : ".$temp['prenom_n']."</br>";
                    echo "debut : ".$temp['debut']."</br>";
                    echo "fin : ".$temp['fin']."</br>";
                    echo "jour : ".$temp['jour']."</br>";
                    echo "heure : ".$temp['heure']."</br>";
                ?>
            </fieldset>
        </li>

        <li class="col-sm-6 col-md-6" style="position:absolute;left:250px;top:500px;width:250px;">
            <fieldset><legend>Info de contrat</legend>
                <?php
                    echo "id_contrat : ".$temp['id_contrat']."</br>";
                    echo "type : ".$temp['type']."</br>";
                    echo "revenue : ".$temp['revenue']."</br>";
                    echo "Note : ".$temp['note']."</br>";
                    echo "evaluation : ".$temp['evaluation']."</br>";
                ?>
            </fieldset>
        </li>

    </ul>
</div>

</body>
</html>