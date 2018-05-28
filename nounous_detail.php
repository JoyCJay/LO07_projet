<?php
    $sql_sentence="select * from nounous where id_nounous=".$_GET['id_nounous'].";";
    print("<br/>");
    $DB_conn = mysqli_connect ('localhost','solange','abc1234567','nounous');
    $DB_result = mysqli_query($DB_conn,$sql_sentence); 
    if ($DB_result){
        $temp = mysqli_fetch_array ($DB_result,MYSQLI_ASSOC);
        echo "<pre>";
        print_r($temp);
        echo "</pre>";
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
<ul id="nounous_detail">
    <li>
        <h2>Info personnelle</h2>
        <div class="row">
            <img src="./img/profil.png" style="width:120px;height:120px;">
            <span style="position:relative;top:30px;">
                <div class="col">Nom</div>
                <div class="col">Email</div>
            </span>
            <span style="position:relative;top:30px;">
                <div class="col">Prenom</div>
                <div class="col">Portable</div>
            </span>
            <span style="position:relative;top:30px;">
                <div class="col">Age</div>
                <div class="col">Langues</div>
            </span>
        </div>

    </li>
    <li>
        <h2>Presentation</h2>
    </li>
    <li>
        <h2>Experience</h2>
    </li>
    <li>
        <h2>Commentaire</h2>
    </li>
</ul>

</div>

</body>
</html>