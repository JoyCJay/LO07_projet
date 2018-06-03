<?php
  session_start();
  $sql_sentence="select * from nounous where id_nounous=".$_SESSION['id_utilisateur'].";";
  $DB_conn = mysqli_connect ('localhost','solange','abc1234567','nounous');
  $DB_result = mysqli_query($DB_conn,$sql_sentence); 
  if ($DB_result){
      $nounous = mysqli_fetch_array ($DB_result,MYSQLI_ASSOC);
  }
  mysqli_close($DB_conn);
  $_SESSION=$_SESSION+$nounous;
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
    <img id='profil' src="<?php echo $_SESSION['photo'] ?>" style="width:120px;height:120px;">
    <div id="profil_info">
        <?php echo "Bonjour, ".$_SESSION['login']."! ".$_SESSION['type'];?>
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
                <a class="B" href="#" onclick="afficherC('disponibilite');">Déclarer mes disponibilité</a></br>
                <a class="B" href="#" onclick="afficherC('mes_info');">Mes informations</a>
              </div>
            </div>
          </div>

          <div class="card" id="panel_histoire">
            <div class="card-header">
              <a class="collapsed card-link B" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                Contrats
            </a>
            </div>
            <div id="collapseTwo" class="collapse">
              <div class="card-block">
                <a class="B" href="#" onclick="afficherC('mes_contrat');">Tous mes contrats</a>
              </div>
            </div>
          </div>

          <div class="card" id="panel_setting">
            <div class="card-header">
              <a class="collapsed card-link B" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
               Mes disponibilités
              </a>
            </div>
            <div id="collapseThree" class="collapse">
              <div class="card-block">
                <a class="B" href="#" onclick="afficherC('mes_dispo');">Mes disponibilités</a>
              </div>
            </div>
          </div>
      </div>
</div>

<div class="container myform" id="C"> 
  <div id="mes_info" class="admin_function" style="display: none;">
    <h3>Mes informations</h3>
    <?php
    echo "<ul>";
      echo "<li>";            
      echo "Login: ".$_SESSION['login'];            
      echo "</li>";
      echo "<li>";
      echo "Nom de famille: ".$_SESSION['nom'];
      echo "</li>";
      echo "<li>";
      echo "Prénom: ".$_SESSION['prenom'];
      echo "</li>";
      echo "<li>";
      echo "Age: ".$_SESSION['age'];
      echo "</li>";
      echo "<li>";
      echo "ID: ".$_SESSION['id_nounous'];
      echo "</li>";
      echo "<li>";
      echo "Ville: ".$_SESSION['ville'];
      echo "</li>";
      echo "<li>";
      echo "Situation: ".$_SESSION['situation'];
      echo "</li>";
      echo "<li>";
      echo "Email: ".$_SESSION['email'];
      echo "</li>";
      echo "<li>";
      echo "Portable: ".$_SESSION['portable'];
      echo "</li>";
      echo "<li>";
      echo "Langues: ".$_SESSION['langues'];
      echo "</li>";

      echo "<li>";
      echo "Mes expériences: ".$_SESSION['experience'];
      echo "</li>";
      echo "</ul>";
      
      ?>
  </div>
    <div id="mes_dispo" class="admin_function" style="display: none;">
        <?php
    echo "<h3>Mes disponibilités</h3>";
      echo "<table class='table table-hover'>";
      echo "<tr>";
      echo  "       <th>Creneau</th>
                <th>Lun.</th>
                <th>Mar.</th>
                <th>Mer.</th>
                <th>Jeu.</th>
                <th>Ven.</th>
                <th>Sam.</th>
                <th>Dim.</th>
            </tr>";

  
                $creneau=array("8:00-10:00","10:00-12:00","12:00-14:00","14:00-16:00","16:00-18:00","18:00-20:00"); 
                $time=6;
                foreach ($creneau as $h2){
                    $time=$time+2;
                    echo "<tr>";
                    echo "<td>".$h2."</td>";
                    for ($i=1;$i<=7;$i=$i+1){  
                        if (strstr($nounous['jour'],strval($i)) and intval($nounous['heure_debut'])<=$time and intval($nounous['heure_fin'])>=$time+2) {
                            echo "<td><img src='./img/disp.png' style='width:15px;height:15px;'/></td>";
                        } else {
                            echo "<td><img src='./img/occu.png' style='width:15px;height:15px;'/></td>";
                        }
                    }
                    echo "</tr>";
                }

         
        echo "</table>"; ?>
   </div>
  <div id="disponibilite" class="admin_function" >
    <form role="form" action="./disponibilite_action.php" method="post" name="dispo" >
            <fieldset>
                <legend >Déclarer vos disponibilités</legend>
                <div class="form-group row">
                <label for="hd" class="col-sm-4 form-control-label">Heure de début:</label>
                <div class="col-sm-8">
                <input type="number" max="18" min="8" step="2" id="hd" name="hd" placeholder="Heure"> h
                </div></div>
                <div class="form-group row">
                <label for="hf" class="col-sm-4 form-control-label">Heure de fin:</label>
                <div class="col-sm-8">
                <input type="number" max="20" min="10" step="2" id="hf" name="hf" placeholder="Heure"> h
                </div></div>
                <div class="form-group row">
                <label for="dd" class="col-sm-4 form-control-label">Date début:</label>
                <div class="col-sm-8">
                <input type="date"  id="dd" name="dd" > 
                </div></div>
                <div class="form-group row">
                <label for="df" class="col-sm-4 form-control-label">Date fin:</label>
                <div class="col-sm-8">
                <input type="date"  id="df" name="df" > 
                </div></div>
                <label for="jour" class=" form-control-label">Vos jours:</label>
                <ol >
                    <li><input type="checkbox"  id="jour[]" name="jour[]" value="8" /> tous les jours travaillés (Lu, Ma, Me, Je, Ve)</li>
                    <li><input type="checkbox"  id="jour[]" name="jour[]" value="9" /> tous les jours (lundi, .., dimanche)</li>
                    <li><input type="checkbox"  id="jour[]" name="jour[]" value="1" /> tous les lundi</li>
                    <li><input type="checkbox"  id="jour[]" name="jour[]" value="2" /> tous les mardi</li>
                    <li><input type="checkbox"  id="jour[]" name="jour[]" value="3" /> tous les mercredi</li>
                    <li><input type="checkbox"  id="jour[]" name="jour[]" value="4" /> tous les jeudi</li>
                    <li><input type="checkbox"  id="jour[]" name="jour[]" value="5" /> tous les vendredi</li>
                    <li><input type="checkbox"  id="jour[]" name="jour[]" value="6" /> tous les samedi</li>
                    <li><input type="checkbox"  id="jour[]" name="jour[]" value="7" /> tous les dimanche</li>
                </ol>
                <div class="form-group ">
                  <button type="submit" class="btn btn-primary ">Submit</button>
                  <button type="reset" class="btn btn-danger">Reset</button>
                </div>
            </fieldset>
        </form>
  </div>



  <div id="mes_contrat" class="admin_function" style="display: none;">
    tous mes contrats
  </div>
</div>

</body>
</html>