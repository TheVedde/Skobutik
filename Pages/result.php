<?php
include '../Includes/db_connect.php';
include '../Includes/header.php';

$mysql = db_connect();

$query = "SELECT shoeSize, COUNT(shoeSize) AS cnt
FROM Skobutik_contributers
GROUP BY shoeSize;
";
$result = $mysql->query($query);


?>

<html>
  <head>
    <!-- these scripts are required for google chart to work -->
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

        //google charts loader adn callback is required to work
       
      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('number', 'People');
        data.addColumn('number', 'size');
        <?php 
        while ($shoe = $result->fetch_assoc()){

            $size = $shoe['shoeSize'];
            $amount =  $shoe['cnt'];

            echo "";
        }
        
        ?>
        data.addRows([
          [1, 35],
          [2, 34],
          [3, 11],
          [4, 21],
          [5, 23]
        ]);

        // Set chart options
        var options = {'title':'Shoe sizes',
                       'width':500,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>

  <body>
    <!--Div that will hold the pie chart-->
    <div id="chart_div"></div>
  </body>
</html>



<?php
include '../Includes/footer.php';
