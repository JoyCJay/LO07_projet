<?php
  function nounous_DBR(){
    echo "<table class='table table-striped'>";
    echo "<thead>";
    echo "<tr>";  
    echo "<th>Nom</th>";
    echo "<th>Prenom</th>";
    echo "<th>Email</th>";
    echo "<th>Note Moyen</th>";
    echo "<th>Situation</th>";
    echo "<th>Do</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    //table dynamique
    $DB_conn = mysqli_connect ('localhost','solange','abc1234567','nounous');
    $DB_result = mysqli_query($DB_conn,'select * from nounous;'); 
    if ($DB_result){
      while($temp = mysqli_fetch_array ($DB_result,MYSQLI_ASSOC)){
        if ($temp["situation"]=="candidat" or $temp["situation"]=="bloquer") {
          $do="Valider";
        } else {
          $do="Bloquer";
        }
        print("<tr>");
        print("<td>".$temp["nom"]."</td>");
        print("<td>".$temp["prenom"]."</td>");
        print("<td>".$temp["email"]."</td>");
        print("<td>Note</td>");
        print("<td>".$temp["situation"]."</td>");
        print("<td><a href='admin_do.php?id_nounous=".$temp['id_nounous']."&situation=".$temp['situation']."'>$do</a>");
        if ($temp["situation"]=="candidat"){
          print("/<a href='admin_do.php?id_nounous=".$temp['id_nounous']."&sup=1'>Suprimer</a>");
        }
        print("</td>");
        print("</tr>");
      }
    }
    mysqli_close($DB_conn);
  //partie statique
  echo "</tbody>";
  echo "</table>"; 
  }
  function nombre_nounous($situ){
    $DB_conn = mysqli_connect ('localhost','solange','abc1234567','nounous');
    $sql_sentence="select COUNT(*) from nounous where situation='".$situ."';";
    $DB_result = mysqli_query($DB_conn,$sql_sentence); 
    if ($DB_result){
      while($temp = mysqli_fetch_array ($DB_result,MYSQLI_NUM)){
        $num=$temp[0];
      }
      return $num;
    }
    mysqli_close($DB_conn);
    return 0;
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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/self.js"></script>
    <!--
        http://localhost/LO07_projet/admin.php
    -->
</head>
<body>
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
    <a  href="http://localhost/LO07_projet/index.html"><img class='logo' src="img/logo.png"></a>
</div>

<div class="container" id="B">
    <img id='profil' src="./img/profil.png">
    <div id="profil_info">
      <?php session_start();
        echo "Bonjour!  ";
        echo $_SESSION['login']."  ";
        echo $_SESSION['type'];
      ?>
    </div>
    <div id="accordion" class="panel_B">
          <div class="card" id="panel_compte">
            <div class="card-header">
              <a class="card-link B" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                Gerer nounous
              </a>
            </div>
            <div id="collapseOne" class="collapse">
              <div class="card-block">
                <a class="B" href="#admin1-1" onclick="afficherC('admin1-1');">Valider/Bloquer</a></br>
                <a class="B" href="#admin1-2" onclick="afficherC('admin1-2');">Filtrer nounous</a>
              </div>
            </div>
          </div>

          <div class="card" id="panel_histoire">
            <div class="card-header">
              <a class="collapsed card-link B" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
              Contrat
            </a>
            </div>
            <div id="collapseTwo" class="collapse">
              <div class="card-block">
                <a>Afficher tous les contrats</a></br>
                <a>Filtrer contrats</a></br>
              </div>
            </div>
          </div>

          <div class="card" id="panel_setting">
            <div class="card-header">
              <a class="collapsed card-link B" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                Vue global
              </a>
            </div>
            <div id="collapseThree" class="collapse">
              <div class="card-block">
              <a class="B" href="#admin3-1" onclick="afficherC('piechart');">Repartition de nounous</a></br>
              <a>b.Chiffre d’affair</a></br>
              <a>c.Tendance du site</a></br>
              <a>d.Boite de message</a></br>
              </div>
            </div>
          </div>
      </div>
</div>

<div class="container myform" id="C">

  <div id="admin1-1" class="admin_function" style="display: none;">
    <?php nounous_DBR();?>
  </div>

  <div id="admin1-2" class="admin_function" style="display: none;">
  <form enctype="multipart/form-data" method="post" name="form1" action = 'filtrer_nounous.php'>
    <div class="form_left form_l1">
    <h2>Recherche floue</h2></div>
    <div class="Ville form_left form_l2">
        <label for="Ville">Ville:</label>
        <input type="text" id="Ville" name="Ville" placeholder="Enter Ville" style="width:200px;">
    </div>
    <div class="Email form_left form_l3">
        <label>Age:</label>
        <input type="number" id="Age min" name="min" placeholder="Age min" style="width:200px;">
    </div>
    <div class="Portable form_right form_l3">
        <input type="number" id="Age max" name="max" placeholder="Age max" style="width:200px;">
    </div>

    <div class="Language form_left form_l4">
        <input type="checkbox" name="Language[]" value="Francais">Français
		    <input type="checkbox" name="Language[]" value="Anglais">Anglais
		    <input type="checkbox" name="Language[]" value="Allemande">Allemande
		    <input type="checkbox" name="Language[]" value="Chinois">Chinois
    </div>    
 
    <div class="form_left form_l5">
      <label for="dd">Date debut:</label>
      <input type="date"  id="dd" name="dd" >
    </div>

    <div class="form_right form_l5">
      <label for="df">Date de fin:</label>
      <input type="date"  id="df" name="df" >
    </div>
    <div class="form_left form_l6">
      <h3>Recherche précise</h3>
    </div>
    <div class="Nom form_left form_l7">
        <label for="Nom">Nom:</label>
        <input type="text" id="Nom" name="Nom" placeholder="Enter Nom" style="width:200px;">
    </div>
    <div class="Prenom form_right form_l7">
        <label for="Prenom">Prenom:</label>
        <input type="text" id="Prenom" name="Prenom" placeholder="Enter Prenom" style="width:200px;">
    </div>
    <div class="form_left form_l8">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-danger">Reset</button>
    </div>
  </form>
  </div>

  <div id="piechart" class="admin_function" style="display: none,width:500px;">
  </div>

</div>

</body>
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      var arr =new Array();
      arr[0]=['Task','nounous'];
      arr[1]=['Normal',<?php echo nombre_nounous('normal'); ?>];
      arr[2]=['Candidat',<?php echo nombre_nounous('candidat'); ?>];
      arr.push(['bloquer',<?php echo nombre_nounous('bloquer'); ?>]);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(arr);
        var options = {
          title: 'Repartition de nounous'
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
    </script>
</html>