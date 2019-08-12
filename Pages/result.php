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
       var data = google.visualization.arrayToDataTable([
        ['Size', 'Count', { role: 'style' } ],
         <?php 
        while ($shoe = $result->fetch_assoc()){

            $size = $shoe['shoeSize'];
            $amount =  $shoe['cnt'];

            echo "['$size', $amount, 'color: blue'],";
        }
        ?>
        
//        ['2020', 14, 'color: #76A7FA'],
//        ['2030', 16, 'opacity: 0.2'],
//        ['2040', 22, 'stroke-color: #703593; stroke-width: 4; fill-color: #C5A5CF'],
//        ['2050', 28, 'stroke-color: #871B47; stroke-opacity: 0.6; stroke-width: 8; fill-color: #BC5679; fill-opacity: 0.2']
        ]);         
          


        // Set chart options
        var options = {'title':'Shoe sizes',
                       'width':500,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
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
