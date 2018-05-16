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
      
  <button onClick="location.href='http://www.baidu.com/'">baidu</button>

    
</body>
</html>

            \"$push['nom']\",
            \"$push['prenom']\",
            \"$push['age']\",
            \"$push['ville']\",
            \"$push['situation']\",
            \"$push['email']\",
            \"$push['portable']\",
            \"$push['langues']\",
            \"$push['presentation']\",
            \"$push['experience']\"