<?php
    session_start();
    $sql_sentence="select * from enfant where parents='".$_SESSION['login']."';";
    $DB_conn = mysqli_connect ('localhost','solange','abc1234567','nounous');
    $DB_result = mysqli_query($DB_conn,$sql_sentence); 
    $enfants=array();
    if ($DB_result){
        while($temp = mysqli_fetch_array ($DB_result,MYSQLI_ASSOC)){
            $enfants[]=$temp;
        }
    }
    mysqli_close($DB_conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Proposer_Contrat</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/self.js"></script>
</head>
<body style="background: white;">
<div id="C" class="container">
    <form role="form" action="./contrat_DB.php" method="post" name="contrat" >
            <fieldset>
                <legend>Proposer le contrat!</legend>
                <div class="form-group row">
                  <button type="submit" class="btn btn-primary ">Submit</button>
                  <button type="reset" class="btn btn-danger">Reset</button>
                </div>
                <div class="form-group row">
                  <label for="Partie_A" class="col-sm-4 form-control-label">Partie A(Parent)</label>
                  <span id="Partie_A">
                      <div class="col">Nom:
                      <input type="text" id="NomA" name="NomA" style="width:200px;" required="required">
                      </div>
                      <div class="col">Prenom:
                      <input type="text" id="PrenomA" name="PrenomA" style="width:200px;" required="required">
                      </div>
                      <div class="col">id_utilisateur:
                      <input type="text" id="IdA" name="IdA" value=<?php echo $_SESSION['id_utilisateur'] ?> style="width:200px;" required="required">
                      </div>
                  </span>
                  <label for="Partie_B" class="col-sm-4 form-control-label">Partie B(Nounous)</label>
                  <span id="Partie_B">
                    <div class="col">Nom:
                    <input type="text" id="NomB" name="NomB" value=<?php echo $_SESSION['nom'] ?> style="width:200px;" required="required">
                    </div>
                    <div class="col">Prenom:
                    <input type="text" id="PrenomB" name="PrenomB" value=<?php echo $_SESSION['prenom'] ?> style="width:200px;" required="required">
                    </div>
                    <div class="col">id_nounous:
                    <input type="text" id="IdB" name="IdB" value=<?php echo $_SESSION['id_nounous'] ?> style="width:200px;" required="required">
                    </div>
                  </span>
                </div>                
                <div class="form-group row">
                <label for="dd" class="col-sm-4 form-control-label">Date début:</label>
                <div class="col-sm-8">
                <input type="date"  id="dd" name="dd" min=<?php echo $_SESSION['date_debut'];?> required="required"> 
                </div></div>
                <div class="form-group row">
                <label for="df" class="col-sm-4 form-control-label">Date fin:</label>
                <div class="col-sm-8">
                <input type="date"  id="df" name="df" max=<?php echo $_SESSION['date_fin'];?> required="required" > 
                </div></div>

                <label for="jour" class=" form-control-label">Jours de travaille:</label>
                <ul >
                    <?php
                      foreach (explode(",",$_SESSION['jour']) as $day) {
                        if ($day=='1') {
                          echo "<li><input type='checkbox' id='jour' name='jour[]' value='1' /> tous les lundi</li>";
                        }
                        if ($day=='2') {
                          echo "<li><input type='checkbox' id='jour' name='jour[]' value='2' /> tous les mardi</li>";
                        }
                        if ($day=='3') {
                          echo "<li><input type='checkbox' id='jour' name='jour[]' value='3' /> tous les mercredi</li>";
                        }
                        if ($day=='4') {
                          echo "<li><input type='checkbox' id='jour' name='jour[]' value='4' /> tous les jeudi</li>";
                        }
                        if ($day=='5') {
                          echo "<li><input type='checkbox' id='jour' name='jour[]' value='5' /> tous les vendredi</li>";
                        }
                        if ($day=='6') {
                          echo "<li><input type='checkbox' id='jour' name='jour[]' value='6' /> tous les samedi</li>";
                        }
                        if ($day=='7') {
                          echo "<li><input type='checkbox' id='jour' name='jour[]' value='7' /> tous les dimanche</li>";
                        }
                      }

                    ?>
                </ul>

                <div class="form-group row">
                  <label for="service" class="col-sm-4 form-control-label">Type de service:</label>
                  <div class="col-sm-8">
                    <select name="service" id="service" class="form-control" style="width:200px;">
                      <option value="babysit">Babysit</option>
                      <option value="langue">Langue</option>
                      <option value="reguliere">Reguiliere</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="enfants" class="col-sm-4 form-control-label">Vos enfants:</label>
                    <?php
                        echo "<table class='table table-striped'>";
                        echo "<thead>";
                        echo "<tr>";  
                        echo "<th>Prenom</th>";
                        echo "<th>Naissance</th>";
                        echo "<th>Restrictions</th>";
                        echo "<th>Do</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        foreach ($enfants as $bebe) {
                            print("<tr>");
                            print("<td>".$bebe["prenom"]."</td>");
                            print("<td>".$bebe["date_de_naissance"]."</td>");
                            print("<td>".$bebe["restrictions_alimentaires"]."</td>");
                            print("<td><input type='checkbox' name='list_enfants[]' value=".$bebe["id_enfant"]."></td>");
                            print("</tr>");
                        }
                    ?>
                </div>
                <button onclick="devis();">Devis</button>
            </fieldset>
        </form>
  </div>
</body>
</html>