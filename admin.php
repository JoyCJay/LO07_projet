<?php
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
    <img id='profil' src="img/profil.jpg">
    <div id="profil_info">
        Song Xiaotong Administrator
    </div>
    <div id="accordion" class="panel_B">
          <div class="card" id="panel_compte">
            <div class="card-header">
              <a class="card-link B" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                Gerer mon compte
              </a>
            </div>
            <div id="collapseOne" class="collapse">
              <div class="card-block">
                <a class="B" href="https://www.baidu.com">baidu</a></br>
                <a class="B" href="https://www.google.fr">google</a>
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
<div class="container" id="C">
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Portable</th>
        <th>Note Moyen</th>
        <th>Situation</th>
        <th>Do</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>SONG</td>
        <td>Xiaotong</td>
        <td>07XXXXXXXX</td>
        <td>18</td>
        <td>candidat</td>
        <td><a href="https://www.google.fr">Valider</a></td>
      </tr>
      <tr>
        <td>WANG</td>
        <td>Gao</td>
        <td>07XXXXXXXX</td>
        <td>15</td>
        <td>formel</td>
        <td><a href="https://www.google.fr">Bloquer</a></td>
      </tr>
    </tbody>
    </table>
</div>

</body>
</html>