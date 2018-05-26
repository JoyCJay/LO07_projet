<?php
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Nounous</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/self.js"></script>
    <!--
        http://localhost/LO07_projet/nounous.php
    -->
</head>
<body>
<div class="container" id="A">
   
    <a  href="http://localhost/LO07_projet/index.html"><img class='logo' src="img/logo.png"></a>
</div>


<div class="container" id="B">
    <img id='profil' src="img/profil.jpg">
    <div id="profil_info">
        <?php session_start(); echo "Bonjour,".$_SESSION['login'];?>
    </div>
    <div id="accordion" class="panel_B">
          <div class="card" id="panel_compte">
            <div class="card-header">
              <a class="card-link B" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                Gerer mes compts
              </a>
            </div>
            <div id="collapseOne" class="collapse">
              <div class="card-block">
                <a class="B" href="./disponibilite.html">Déclarer mes disponibilité</a></br>
                <a class="B" href="">Mes informations</a>
              </div>
            </div>
          </div>

          <div class="card" id="panel_histoire">
            <div class="card-header">
              <a class="collapsed card-link B" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
              Mes contrats
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

<div class="container" id="C">
    
</div>

</body>
</html>