<?php 
session_start(); 

include('../php/check.php');
?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title>Antecedent | Modifier</title>
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
                        ?>  
                      </center>
                  </section>
                  <div class="row">

                    <div class="col-md-4">
                                 
                    </div>
                    <div class="col-md-4">
                
                    <?php

                        $ide = $_GET['id'];

                        $agenceid = $_SESSION['agenceid'];
                        
                        include('../connection.php');

                        $sql = "SELECT * FROM Antecedent WHERE ID= '$ide' AND AgenceID = '$agenceid'"; 
    
                        $result = mysqli_query($conn, $sql);

                        $sql1 = "SELECT * FROM Locataire WHERE AgenceID = '$agenceid'"; 
                        
                        $result1 = mysqli_query($conn, $sql1);
    
                        mysqli_close($conn);

                    ?>  

<!-- Material form subscription -->
<form method="post" action="edit_process.php">
    <p class="h4 text-center mb-4">Modifier Information Antecedent</p>
    <br>

    <!-- Material input montant -->
    <div class="md-form ">
        <input type="hidden" name="id" id="id" value="<?php foreach ($result as $roie){ echo $roie['ID']; } ?>">
    </div>
    <br>

    <!-- Material input type -->
    <div class="md-form">
        
        <input type="date" id="date" class="form-control" value="<?php foreach ($result as $roie){ echo $roie['Date']; } ?>" name="date" required autofocus>
        <label for="materialFormSubscriptionEmailEx">Date</label>
    </div>
    <br>

      <!-- Material input type -->
      <div class="md-form">
        
        <input type="text" id="description" class="form-control" value="<?php foreach ($result as $roie){ echo $roie['Description']; } ?>" name="description" autofocus>
        <label for="materialFormSubscriptionEmailEx">Description</label>
    </div>
    <br>
<!-- Material input type -->
      <div class="md-form ">  
        <select class="form-control chosen-select" id="locataire" name="locataire" disable>
                  <option value=""></option>
                  <?php foreach($result1 as $roiv){ ?>
                  <option value="<?php echo $roiv['ID'] ?>" data-tokens="<?php echo $roiv['Nom'] ?>" <?php foreach ($result as $roie){ if ($roie['LocataireID'] ==  $roiv['ID']){echo "selected"; }}?>><?php echo $roiv['Nom'] ?></option>
                  <?php } ?> 
        </select>
        <label for="materialFormSubscriptionNameEx">Nom</label>
        <input type="hidden" name="locataireid" id="locataireid" value="<?php foreach ($result as $roie){ echo $roie['LocataireID']; } ?>">
    </div>
    <br>
<div class="text-center mt-4">
        <button class="btn btn-outline-info" type="submit" name="submit">Valider<i class="fa fa-paper-plane-o ml-2"></i></button>
    </div>
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