<?php
    function filtrer_nounous_DBR(){
        echo "<table class='table table-striped'>";
        echo "<thead>";
        echo "<tr>";  
        echo "<th>Nom</th>";
        echo "<th>Prenom</th>";
        echo "<th>Age</th>";
        echo "<th>Note Moyen</th>";
        echo "<th>Langue</th>";
        echo "<th>Detail</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        //table dynamique
        $sql_sentence="select * from nounous where situation ='normal'";
        if ($_POST['Nom']=='' and 
            $_POST['Prenom']=='' and 
            $_POST['min']<0 and 
            $_POST['max']<0 and 
            $_POST['Language']=='' and 
            $_POST['dd']=='' and 
            $_POST['df']=='') {
            echo "<h4>Aucune condition, Afficher tout</h4>";
        }
        else{
            if ($_POST['Nom']!='') {
                $sql_sentence=$sql_sentence." and nom='".$_POST['Nom']."'";
            } 
            if($_POST['Prenom']!=''){
                $sql_sentence=$sql_sentence." and prenom='".$_POST['Prenom']."'";
            }
            if ($_POST['Ville']!='') {
                $sql_sentence=$sql_sentence." and ville='".$_POST['Ville']."'";
            }
            if ($_POST['Nom']!='') {
                $sql_sentence=$sql_sentence." and nom='".$_POST['Nom']."'";
            }
            if ($_POST['Prenom']!='') {
                $sql_sentence=$sql_sentence." and prenom='".$_POST['Prenom']."'";
            }
            if ($_POST['dd']!='') {
                $sql_sentence=$sql_sentence." and date_debut<'".$_POST['dd']."'";
            } 
            if ($_POST['df']!='') {
                $sql_sentence=$sql_sentence." and date_fin>'".$_POST['df']."'";
            } 
            //where langues REGEXP ".*francais.*chinois";
            if ($_POST['Language']!='') {
                $SQL_regex = ".*".implode(".*",$_POST['Language']);
                $sql_sentence=$sql_sentence." and langues REGEXP \"".$SQL_regex."\"";
            } 
            if ($_POST['min'] > 0) {
                $sql_sentence=$sql_sentence." and age>=".$_POST['min'];
            }
            if ($_POST['max'] > 0) {
                $sql_sentence=$sql_sentence." and age<=".$_POST['max'];
            }  
        }
        $sql_sentence=$sql_sentence.";";
        print("<br/>");
        $DB_conn = mysqli_connect ('localhost','solange','abc1234567','nounous');
        $DB_result = mysqli_query($DB_conn,$sql_sentence); 
        if ($DB_result){
            while($temp = mysqli_fetch_array ($DB_result,MYSQLI_ASSOC)){
                print("<tr>");
                print("<td>".$temp["nom"]."</td>");
                print("<td>".$temp["prenom"]."</td>");
                print("<td>".$temp["age"]."</td>");
                print("<td>Note</td>");
                print("<td>".$temp["langues"]."</td>");
                print("<td><a href='nounous_detail.php?id_nounous=".$temp['id_nounous']."'target='_blank'>Detail</a></td>");
                print("</tr>");
            }
        }
        mysqli_close($DB_conn);
      //partie statique
      echo "</tbody>";
      echo "</table>"; 
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Nounous candidat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/self.js"></script>
    <!--
        http://localhost/LO07_projet/nouveau_nounous.html
    -->
</head>
<body>
<img class='logo' src="img/logo.png" href="http://localhost/LO07_projet/index.html">
<div class="container" id="A">
    <!-- Nav pills -->
    <ul class="nav nav-pills" role="tablist" id="navigation">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="pill" href="#Introduction">Introduction</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="pill" href="#menu1">Menu 1</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="pill" href="#menu2">Menu 2</a>
        </li>
    </ul> 
    <!-- Tab panes -->
    <div class="tab-content">
        <div id="Introduction" class="container tab-pane active"><br>
            <h3>Nounous & Moi</h3>
            <p>
            Nounous & Moi a été fondée en 2018 et a été largement saluée par les clients depuis sa création. Permettre aux clients de sélectionner leurs nounous sans quitter leur domicile et effectuer les opérations
            </p>
        </div>
        <div id="menu1" class="container tab-pane fade"><br>
            <h3>Menu 1</h3>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
        <div id="menu2" class="container tab-pane fade"><br>
            <h3>Menu 2</h3>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
        </div>
    </div>
</div>

<div class="container" id="B">

</div>
<div class="container myform" id="C">
    <?php filtrer_nounous_DBR(); ?>
</div>

</body>
</html>