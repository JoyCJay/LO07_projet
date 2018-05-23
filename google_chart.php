<?php
  function nombre_nounous($situ){
    $DB_conn = mysqli_connect ('localhost','solange','abc1234567','nounous');
    $sql_sentence="select COUNT(*) from nounous where situation='".$situ."';";
    $DB_result = mysqli_query($DB_conn,$sql_sentence); 
    if ($DB_result){
      while($temp = mysqli_fetch_array ($DB_result,MYSQLI_NUM)){
        $num=$temp[0];
      }
      return $num;
    }
    mysqli_close($DB_conn);
    return 0;
  }
?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>

  <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      var arr =new Array();
      arr[0]=['Task','nounous'];
      arr[1]=['Normal',<?php echo nombre_nounous('normal'); ?>];
      arr[2]=['Candidat',<?php echo nombre_nounous('candidat'); ?>];
      arr.push(['bloquer',<?php echo nombre_nounous('bloquer'); ?>]);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(arr);
        var options = {
          title: 'Repartition de nounous'
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
    </script>
</html>