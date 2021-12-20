@extends('admin.dashboard')
@section('saloni')
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['name', 'status'],
          <?php echo $chartData2?>
        ]);

        var options = {
          chart: {
            title: 'product status',
           
          },
          bars: 'vertical' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
     <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
           <?php echo $chartData?>
        ]);
        var options = {
          title: 'Products Available',
          is3D:true
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
    </script>
  </head>

  <body>
    <div class="container">
      <div class="row">
        <div class="col-6">
        <div id="barchart_material" style="width: 350px; height: 300px;"></div>

        </div>
        <div class="col-6">
       
        <div id="piechart" style="width: 400px; height:300px; "></div>
        </div>
      </div>

    </div>
   
  </body>
  
</html>

    @endsection
    
   