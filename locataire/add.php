<?php 
session_start(); 

include('../php/check.php');
?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title>Locataire | Ajouter</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="../css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="../css/animate.css" type="text/css" />
  <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="../css/icon.css" type="text/css" />
  <link rel="stylesheet" href="../css/font.css" type="text/css" />
  <link rel="stylesheet" href="../css/app.css" type="text/css" />  
  <link rel="stylesheet" href="../js/calendar/bootstrap_calendar.css" type="text/css" />
  <link rel="stylesheet" href="../js/chosen/chosen.css" type="text/css" />
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
                  <section class="row m-b-md">
                      <center>
                        <?php
                          if (isset($_SESSION['flash'])) 
                          {
                            echo"<div class='alert alert-success'><strong>" .$_SESSION['flash']. "</strong></div>";
                            unset($_SESSION['flash']);

                            
                          }

                          $agenceid = $_SESSION['agenceid'];

                          include('../connection.php');

                            $sql5 = "SELECT * FROM Locataire
                                     WHERE AgenceID = 'agenceid'"; 

                            $result = mysqli_query($conn, $sql5);

                            mysqli_close($conn);
                        ?>  
                      </center>
                  </section>
                  <div class="row">

                    <div class="col-md-4">
                                 
                    </div>
                    <div class="col-md-4">

                   

<!-- Material form subscription -->
<form method="post" action="add_process.php">
    <p class="h4 text-center mb-4">Nouveau Locataire</p>
    <br>

     <div class="md-form ">
        
        <input type="text" id="nom" class="form-control" name="nom" required autofocus>
        <label for="materialFormSubscriptionNameEx">Nom</label>
    </div>
    <br>

    <div class="md-form ">
        
        <input type="text" id="contact" class="form-control" name="contact" required autofocus>
        <label for="materialFormSubscriptionNameEx">Contact</label>
    </div>
    <br>

    <!-- Material input type -->
    <div class="md-form">
        
        <input type="date" id="datenaissance" class="form-control" name="datenaissance" required autofocus>
        <label for="materialFormSubscriptionEmailEx">Date de naissance</label>
    </div>
    <br>

    <!-- Material input montant -->
    <div class="md-form ">
        
        <input type="text" id="profession" class="form-control" name="profession" required autofocus>
        <label for="materialFormSubscriptionNameEx">Profession</label>
    </div>
    <br>

    <!-- Material input montant -->
    <div class="md-form ">
        
        <input type="text" id="numcompte" class="form-control" name="numcompte" required autofocus>
        <label for="materialFormSubscriptionNameEx">Numero de compte</label>
    </div>
    <br>

    <!-- Material input montant -->
    <div class="md-form ">
        
        <input type="text" id="cni" class="form-control" name="cni" required autofocus>
        <label for="materialFormSubscriptionNameEx">CNI</label>
    </div>
    <br>
    
    <div class="text-center mt-4">
        <button class="btn btn-outline-info" type="submit" name="submit">Valider<i class="fa fa-paper-plane-o ml-2"></i></button>
    </div>
    <br>
</form>
<!-- Material form subscription -->
                      
                           
                    </div>
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

  <script src="../js/chosen/chosen.jquery.min.js"></script>

  <script src="../js/calendar/bootstrap_calendar.js"></script>
  <script src="../js/calendar/demo.js"></script>

  <script src="../js/sortable/jquery.sortable.js"></script>
  <script src="../js/app.plugin.js"></script>
</body>
</html>