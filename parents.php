
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Chercher un nounous</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/self.js"></script>
    <script>
function enfants(){
document.getElementById("div1").style.display="block";
document.getElementById("div2").style.display="none";
};
function ajouter()
{
document.getElementById("div2").style.display="block";
document.getElementById("div1").style.display="none";
}
</script>
    <!--
        http://localhost/LO07_projet/parents.php
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
                <a class="B" href="#" onclick="ajouter()">Ajouter un(e) enfants</a>
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

<div class="container  " id="C">
    <div  class="myform" style="display:none" id="div1">
        <h3> Mes informations</h3> 
     <?php
      
     $login=$_SESSION['login'];
      function list_enfant(){
      global $_POST;
      global $login;
      $DB_conn = mysqli_connect ('localhost','solange','abc1234567','nounous');
      $sql1= "SELECT * FROM `parents` WHERE `login`= '".$login."'";
      $result=mysqli_query($DB_conn,$sql1);
      $sql2= "SELECT * FROM `enfant` WHERE `parents`= '".$login."'";
      $DB_result = mysqli_query($DB_conn,$sql2);  
      while($temp1 = mysqli_fetch_array ($result,MYSQLI_ASSOC)){
                  echo "<ul>";
                  echo "<li>";
                  echo "Login: ".$temp1['login'];
                  echo "</li>";
                  echo "<li>";
                  echo "Nom de famille: ".$temp1['nom'];
                  echo "</li>";
                  echo "<li>";
                  echo "Ville: ".$temp1['ville'];
                  echo "</li>";
                  echo "<li>";
                  echo "Email: ".$temp1['email'];
                  echo "</li>";
                  echo "<li>";
                  echo "Portable: ".$temp1['portable'];
                  echo "</li>";
                  echo "</ul>";
            }
              echo "List des enfants :";
              echo "<table class='table '>";
              echo "<thead><tr>";
              echo "<th>ID_enfants</th>"; 
              echo "<th>Prénom des enfants</th>"; 
              echo "<th>Date de naissance</th>"; 
              echo "<th>Restrictions alimentaires</th>"; 
              echo "</tr></thead>"; 
              echo "<tbody>";   
             while($temp2 = mysqli_fetch_array ($DB_result,MYSQLI_ASSOC)){
                  echo "<tr>";
                  echo "<td>";
                  echo $temp2['id_enfant'];
                  echo "</td>";
                  echo "<td>";
                  echo $temp2['prenom'];
                  echo "</td>";
                  echo "<td>";
                  echo $temp2['date_de_naissance'];
                  echo "</td>";
                  echo "<td>";
                  echo $temp2['restrictions_alimentaires'];
                  echo "</td>";

            }
            echo "</tbody>"; 
            echo "</table>";
        mysqli_close($DB_conn);
  }
  list_enfant();
  ?>
       
    </div>
    <div style="display:none" id="div2">
        <h3> Ajouter un(e) enfant</h3> 
      <br />
    <form  class="myform" method="post" name="form3" action = './ajouter_enfant.php'>
    <fieldset>
       
    <div class="form-group row">
    <label for="parents" class="col-sm-4 form-control-label">Votre login:</label>
    <div class="col-sm-8">
      <input type="text"  id="parents" name="parents" placeholder="Votre login">
    </div>
    </div>
    <div class="form-group row">
    <label for="prenom" class="col-sm-4 form-control-label">Prénom:</label>
    <div class="col-sm-8">
      <input type="text"  id="prenom" name="prenom" placeholder="prenom">
    </div>
    </div>
    <div class="form-group row">
    <label for="naissance" class="col-sm-4 form-control-label">Date du naissance:</label>
    <div class="col-sm-8">
      <input type="date" id="naissance" name="naissance" placeholder="date du naissance">
    </div>
    </div>
    <div class="form-group row ">
    <label for="ra" class="col-md-4 form-control-label  ">Restrictions alimentaires:</label>
    <div class="col-sm-8">
      <input type="text" id="ra"  name="ra"  placeholder="Restrictions alimentaires" required="required">
    </div></div>
   
    <div class="form-group ">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-danger">Reset</button>
       
    </div>
     </fieldset>
  </form>
    </div>
</div>

</body>
</html>
