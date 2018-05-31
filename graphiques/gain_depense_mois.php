<?php
   session_start();
    include('../connection.php');
    include('../php/check.php');

    $sql = "SELECT SUM(Montant) AS Gain, CASE MONTH(Date) 
                                            WHEN 1 THEN 'janvier'
                                            WHEN 2 THEN 'février'
                                            WHEN 3 THEN 'mars'
                                            WHEN 4 THEN 'avril'
                                            WHEN 5 THEN 'mai'
                                            WHEN 6 THEN 'juin'
                                            WHEN 7 THEN 'juillet'
                                            WHEN 8 THEN 'août'
                                            WHEN 9 THEN 'septembre'
                                            WHEN 10 THEN 'octobre'
                                            WHEN 11 THEN 'novembre'
                                            ELSE 'décembre' END AS Mois
            FROM Enregistrement
            WHERE YEAR(DATE) = YEAR(NOW()) 
            GROUP BY Mois"; 
    $result = mysqli_query($conn, $sql);

    $sql1 = "SELECT SUM(Montant) AS Sortie
            FROM Decaissement 
            WHERE YEAR(Date) = YEAR(NOW())
            GROUP BY MONTH(Date)" ;         

    
    $result1 = mysqli_query($conn, $sql1);

    mysqli_close($conn);
?>    
<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title>Graphisme | Gain et dépense par mois</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="../css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="../css/animate.css" type="text/css" />
  <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="../css/icon.css" type="text/css" />
  <link rel="stylesheet" href="../css/font.css" type="text/css" />
  <link rel="stylesheet" href="../css/app.css" type="text/css" />  
  <link rel="stylesheet" href="../js/calendar/bootstrap_calendar.css" type="text/css" />

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css" />

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
     <script type="text/javascript">
        google.charts.load('current', {packages: ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawTrendlines); 
        function drawTrendlines()  
        {  
           var data = google.visualization.arrayToDataTable([  
                ['Mois', 'Gain', 'Sortie'],  
                  <?php  
                    foreach ($result1 as $sortie) {
                      while($row = mysqli_fetch_array($result))  
                      {  
                       echo "['".$row["Mois"]."', ".$row["Gain"].", ".$sortie["Sortie"]."],";  
                      }  
                    }
                  ?>  
                     ]);  
            var options = {  
                title: 'Vos Gains et Depenses par Mois',
                trendlines: {
                  0: {type: 'linear', lineWidth: 5, opacity: .3},
                  1: {type: 'exponential', lineWidth: 10, opacity: .3}
                  },
                hAxis: {
                    title: 'Mois',
                    viewWindow: {
                    min: [7, 30, 0],
                    max: [17, 30, 0]
                    }
                 },
                  vAxis: {
                     title: 'Gains et Sorties (en Franc CFA)'
                    }   
            };
            var chart = new google.visualization.ColumnChart(document.getElementById('piechart'));  
            chart.draw(data, options);  
        }  
    </script>  

</head>
<body class="" >

  <section class="vbox">
    <?php include("../php/header.php"); ?>
    <section>
      <section class="hbox stretch">
        <!-- .aside -->
        <aside class="bg-black aside-md hidden-print hidden-xs" id="nav">          
          <section class="vbox">
            <section class="w-f scrollable">
              <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">

                <?php include("../php/nav.php"); ?>                
                
              </div>
            </section>
        </aside>
        <!-- /.aside -->
        <section id="content">
          <section class="hbox stretch">
            <section>
              <section class="vbox">
                <section class="scrollable padder">              
                <p class="h4 text-center mb-4">GRAPHE DES GAINS ET DEPENSES PAR MOIS ANNEE EN COURS 
                    <br/><?php echo date('Y'); ?></p>
                <br /><br />  
                <div style="width:900px;">  
                   <div id="piechart"></div>  
                </div>  
                </section>
              </section>
            </section>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
        </section>
      </section>
    </section>
  </section>
  <script src="../js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../js/bootstrap.js"></script>
  <!-- App -->
  <script src="../js/app.js"></script>  
  <script src="../js/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="../js/charts/easypiechart/jquery.easy-pie-chart.js"></script>
  <script src="../js/charts/sparkline/jquery.sparkline.min.js"></script>
  <script src="../js/charts/flot/jquery.flot.min.js"></script>
  <script src="../js/charts/flot/jquery.flot.tooltip.min.js"></script>
  <script src="../js/charts/flot/jquery.flot.spline.js"></script>
  <script src="../js/charts/flot/jquery.flot.pie.min.js"></script>
  <script src="../js/charts/flot/jquery.flot.resize.js"></script>
  <script src="../js/charts/flot/jquery.flot.grow.js"></script>
  <script src="../js/charts/flot/demo.js"></script>

  <script src="../js/calendar/bootstrap_calendar.js"></script>
  <script src="../js/calendar/demo.js"></script>

  <script src="../js/sortable/jquery.sortable.js"></script>
  <script src="../js/app.plugin.js"></script>

  <!--Js pour le DataTable-->
  <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.16/pagination/input.js"></script>

<!-- Pour le Data table -->
<script type="text/javascript">
$( document ).ready(function() 
{
  $('#myTable').DataTable(
  {

        "scrollX": true,

        "pageLength": 5,

        dom: 'Bfrtip',
        
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
  });
});
</script>  
</body>
</html>