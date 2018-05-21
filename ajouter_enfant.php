<!DOCTYPE html>
<html>
<head>
    
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gerer mes enfants</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/self.js"></script>
    <!--
        http://localhost/LO07_projet/enfants.html
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
    <img id='profil' src="img/profil.jpg">
    <div id="profil_info">
        Song Xiaotong Parents
    </div>
    <div id="accordion" class="panel_B">
          <div class="card" id="panel_compte">
            <div class="card-header">
              <a class="card-link B" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                Gerer mes enfants
              </a>
            </div>
            <div id="collapseOne" class="collapse">
              <div class="card-block">
                <a class="B" href="https://www.baidu.com">Mes enfants</a></br>
                <a class="B" href="./ajouter_enfant.html">Ajouter_enfants</a>
              </div>
            </div>
          </div>

          <div class="card" id="panel_histoire">
            <div class="card-header">
              <a class="collapsed card-link B" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
              Histoire
            </a>
            </div>
            <div id="collapseTwo" class="collapse">
              <div class="card-block">
              collapseTwo
              </div>
            </div>
          </div>

          <div class="card" id="panel_setting">
            <div class="card-header">
              <a class="collapsed card-link B" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                Setting
              </a>
            </div>
            <div id="collapseThree" class="collapse">
              <div class="card-block">
                collapseThree
              </div>
            </div>
          </div>
      </div>
</div>
 <div class="container-fluid" id="C">
	<h2 class="text-center">
        <b>Mes enfants</b>
	</h2>
       
            
<?php
  global $_POST;
 function insert_enfants_DBR(){
     global $_POST; 
      global $push; 
      $DB_conn = mysqli_connect ('localhost','solange','abc1234567','nounous');
        $sql_sentence = "INSERT INTO `enfant` (`id_enfant`, `prenom`, `parents`, `date_de_naissance`, `restrictions_alimentaires`) VALUES("
            ."'".$push['id_enfant']."',"
            ."'".$_POST['prenom']."',"
            ."'".$_POST['parents']."',"
            ."'".$_POST['naissance']."',"
            ."'".$_POST['ra']."'"
            .");";
        echo $sql_sentence;
        $DB_result = mysqli_query($DB_conn,$sql_sentence);          
        mysqli_close($DB_conn);
    }

    function table(){
        global $_POST; 
        $push = array(
                "id_enfant"=>"",
                "prenom" => $_POST['prenom'],
                "parents" => $_POST['parents'],
                "naissance" => $_POST['naissance'],
                "ra" => $_POST['ra']
            );
        insert_enfants_DBR();
    }

  
  function list_enfant(){
      global $_POST;
      global $push;
      $DB_conn = mysqli_connect ('localhost','solange','abc1234567','nounous');
      $sql_sentence= "SELECT * FROM `enfant` WHERE `parents`= '".$_POST['parents']."'";
      $DB_result = mysqli_query($DB_conn,$sql_sentence);  
             echo "<table class='table'>";
              echo "<thead><tr>";
              echo "<th>ID_enfants</th>"; 
              echo "<th>Prénom des enfants</th>"; 
              echo "<th>Date de naissance</th>"; 
              echo "<th>Restrictions alimentaires</th>"; 
              echo "</tr></thead>"; 
              echo "<tbody>";   
             while($temp = mysqli_fetch_array ($DB_result,MYSQLI_ASSOC)){
                  echo "<tr>";
                  echo "<td>";
                  echo $temp['id_enfant'];
                  echo "</td>";
                  echo "<td>";
                  echo $temp['prenom'];
                  echo "</td>";
                  echo "<td>";
                  echo $temp['date_de_naissance'];
                  echo "</td>";
                  echo "<td>";
                  echo $temp['restrictions_alimentaires'];
                  echo "</td>";

            }
            echo "</tbody>"; 
            echo "</table>";
        mysqli_close($DB_conn);
  }


  table();
  list_enfant();
  ?>
			
		</div>
	</div>
</div>
    </body>
</html>

