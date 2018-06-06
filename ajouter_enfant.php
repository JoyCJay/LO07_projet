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
        http://localhost/LO07_projet/main.php
    -->
</head>
<body>
<div class="container" id="A">
   
    <a  href="http://localhost/LO07_projet/index.html"><img class='logo' src="img/logo.png"></a>
</div>

<div class="container" id="B">
    <img id='profil' src="img/profil.jpg">
    <div id="profil_info">
        <?php session_start(); echo "Bonjour, <br />".$_SESSION['login'];?>
    </div>
    <div id="accordion" class="panel_B">
          <div class="card" id="panel_compte">
            <div class="card-header">
              <a class="card-link B" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                Gerer mes compt
              </a>
            </div>
            <div id="collapseOne" class="collapse">
              <div class="card-block">
                <a class="B" href="#" onclick="enfants()">Mes informations</a></br>
                <a class="B" href="./enfant.html">Ajouter un(e) enfants</a>
              </div>
            </div>
          </div>

          <div class="card" id="panel_histoire">
            <div class="card-header">
              <a class="collapsed card-link B" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
              Gerer mes réservations
            </a>
            </div>
            <div id="collapseTwo" class="collapse">
              <div class="card-block">
              <a class="B" href="#" onclick="contrats()">Mes réservations</a>
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
	<h3 >
       Ajouter un(e) enfant
	</h3>
       
            
<?php
  global $_POST;
 
  $login=$_SESSION['login'];
 function insert_enfants_DBR(){
     global $_POST; 
     global $login;
      $DB_conn = mysqli_connect ('localhost','solange','abc1234567','nounous');
        $sql= "INSERT INTO `enfant` (`id_enfant`, `prenom`, `parents`, `date_de_naissance`, `restrictions_alimentaires`, `id_contrat`) VALUES( NULL ,
            '".$_POST['prenom'] ."',
            '".$login ."',
             '".$_POST['naissance'] ."',
             '".$_POST['ra'] ."',NULL
           );";
        
        $result = mysqli_query($DB_conn,$sql);          
        mysqli_close($DB_conn);
    }
    insert_enfants_DBR();
    echo "<ul>Informations du enfant:";

    echo "<li>Prénom: ".$_POST['prenom']; 
    echo "</li>";
    echo "<li>Date de naissance: ".$_POST['naissance'];
    echo "</li>";
    echo "<li>Restrictions alimentaires: ".$_POST['ra'];
    echo "</li>";
    echo "</ul><br />";
    echo "<input type='button' name='rentrer' onclick='javascript:history.back(-1);' value='Rentrer' >";

  ?>
			
		</div>
	</div>
</div>
    </body>
</html>

