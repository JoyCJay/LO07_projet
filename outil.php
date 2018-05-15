<?php


function show_table($table_name){
  $DB_conn = mysqli_connect ('localhost','root','123456','LO07_projet');
  $sql_sentence = "select * from $table_name;";
  $DB_result = mysqli_query($DB_conn,$sql_sentence); 
  if ($DB_result){
      echo "<pre>";
      while($temp = mysqli_fetch_array ($DB_result,MYSQLI_ASSOC)){
      $DB_arrays[]=$temp;
      }
  print_r($DB_arrays);
  echo "</pre>";
  }
  mysqli_close($DB_conn);
}

?>

<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    
  <div class="container">
        <div class="row">
          <div class="col-sm-4">
            <h3>第一列</h3>
            <p1>这是一行</p1>
          </div>
          <div class="col-sm-4">
            <h3>第二列</h3>
            <p1>这是一行</p1>
          </div>
        </div>
  </div>
      
      <div id="accordion">
          <div class="card">
            <div class="card-header">
              <a class="card-link" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                Collapsible Group Item #1
              </a>
            </div>
            <div id="collapseOne" class="collapse show">
              <div class="card-block">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <a class="collapsed card-link" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
              Collapsible Group Item #2
            </a>
            </div>
            <div id="collapseTwo" class="collapse">
              <div class="card-block">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <a class="collapsed card-link" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                Collapsible Group Item #3
              </a>
            </div>
            <div id="collapseThree" class="collapse">
              <div class="card-block">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
              </div>
            </div>
          </div>
      </div>
    

    
</body>
</html>