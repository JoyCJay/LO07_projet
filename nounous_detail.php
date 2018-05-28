<?php
    $sql_sentence="select * from nounous where id_nounous=".$_GET['id_nounous'].";";
    print("<br/>");
    $DB_conn = mysqli_connect ('localhost','solange','abc1234567','nounous');
    $DB_result = mysqli_query($DB_conn,$sql_sentence); 
    if ($DB_result){
        $temp = mysqli_fetch_array ($DB_result,MYSQLI_ASSOC);
        /*
        echo "<pre>";
        print_r($temp);
        echo "</pre>";
        */
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
    <!--
        http://localhost/LO07_projet/nouveau_nounous.html
    -->
</head>
<body>

<div class="container" id="C" style="position:absolute;left:350px;top:220px;height:750px;width:800px;">
<ul id="nounous_detail">
    <li>
        <h2>Info personnelle</h2>
        <div class="row">
            <img src="./img/profil.png" style="width:120px;height:120px;">
            <span style="position:relative;top:30px;">
                <div class="col">Nom:<?php echo $temp['nom'] ?></div>
                <div class="col">Prenom:<?php echo $temp['prenom'] ?></div>
                <div class="col">Age:<?php echo $temp['age'] ?></div>
            </span>
            <span style="position:relative;top:30px;">
                <div class="col">Email:<?php echo $temp['email'] ?></div>
                <div class="col">Portable:<?php echo $temp['portable'] ?></div>
                <div class="col">Langues:<?php echo $temp['langues'] ?></div>
            </span>
        </div>
    </li>
    <li style="width:600px;">
        <h2>Disponibilite</h2>
        <?php echo $temp['jour']; ?>
        <table class="table table-hover">
            <tr>
                <th>Creneau</th>
                <th>Lun.</th>
                <th>Mar.</th>
                <th>Mer.</th>
                <th>Jeu.</th>
                <th>Ven.</th>
                <th>Sam.</th>
                <th>Dim.</th>
            </tr>

            <?php
                $creneau=array("8:00-10:00","10:00-12:00","12:00-14:00","14:00-16:00","16:00-18:00","18:00-20:00"); 
                foreach ($creneau as $h2){
                    echo "<tr>";
                    echo "<td>".$h2."</td>";
                    for ($i=1;$i<=7;$i=$i+1){  
                        if (strpos($temp['jour'],strval($i))) {
                            echo "<td><img src='./img/occu.png' style='width:15px;height:15px;'/></td>";
                        } else {
                            echo "<td><img src='./img/disp.png' style='width:15px;height:15px;'/></td>";
                        }
                    }
                    echo "</tr>";
                }

            ?>
        </table>
    </li>
    <li style="width:600px;">
        <h2>Presentation</h2>
        <p><?php echo $temp['presentation'] ?></p>
    </li>
    <li style="width:600px;">
        <h2>Experience</h2>
        <p><?php echo $temp['experience'] ?></p>
    </li>
    <li style="width:600px;">
        <h2>Commentaire</h2>
        <p>this paragraph is for commentaire</p>
    </li>
</ul>

</div>

</body>
</html>