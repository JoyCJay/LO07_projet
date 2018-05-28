<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="fr">
    <head>
        <title>Disponibilité du Nounous</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/form.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/self.js"></script>
    </head>
    <body >
        <div class="container" id="A">
            <a  href="http://localhost/LO07_projet/index.html"><img class='logo' src="img/logo.png"></a>
        </div>
        <div class="container" id="B">
            <img id='profil' src="img/profil.png">
            <div id="profil_info">
                <?php session_start(); echo "Bonjour,".$_SESSION['login'];?>
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
        <div class="container myform" id="C"> 
        <form    role="form" action="./disponibilite_action.php" method="post" name="dispo" >
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
      <br />
      <br />
      <br />
          <input type='button' name='back' value='Rentrer' onclick='javascript:history.go(-1)' />
    </div>
            </fieldset>
        </form>
        </div>
    </body>
</html>