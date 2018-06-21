<?php 
session_start(); 
include('../php/check.php');
?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title>Location | Ajouter</title>
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

                          include('../connection.php');

                          $agenceid = $_SESSION['agenceid'];

                          $sql = "SELECT * FROM Bienimmobilier WHERE Bienimmobilier.Status = 0 AND AgenceID = '$agenceid'"; 

                          $bien = mysqli_query($conn, $sql);

                          $sql1 = "SELECT * FROM Locataire WHERE AgenceID = '$agenceid'";

                          $locataire = mysqli_query($conn, $sql1);

                           $sql2 = "SELECT Contrat.ID AS ID 
                            FROM Contrat, Bienimmobilier, Locataire
                            WHERE Contrat.BienImmobilierID = Bienimmobilier.ID AND Contrat.LocataireID = Locataire.ID AND Contrat.AgenceID = '$agenceid'";

                          $contrat = mysqli_query($conn, $sql2);

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
    <p class="h4 text-center mb-4">Nouvelle Location</p>
    <br>


    <div class="md-form ">
        
        <select class="form-control chosen-select" id="bienid" name="bienid" required>
                  <option value=""></option>
                  <?php foreach($bien as $roi){ ?>
                  <option value="<?php echo $roi['ID'] ?>" data-tokens="<?php echo $roi['Nom'] ?>"><?php echo $roi['Nom'] ?></option>
                  <?php } ?> 
        </select>
        <label for="materialFormSubscriptionNameEx">Bien</label>
    </div>
    <br>


    <div class="md-form ">
        
        <select class="form-control chosen-select" id="locataireid" name="locataireid" required>
                  <option value=""></option>
                  <?php foreach($locataire as $roit){ ?>
                  <option value="<?php echo $roit['ID'] ?>" data-tokens="<?php echo $roit['Nom'] ?>"><?php echo $roit['Nom'] ?></option>
                  <?php } ?> 
        </select>
        <label for="materialFormSubscriptionNameEx">Locataire</label>
    </div>
    <br>

    <!-- Material input type -->
    <div class="md-form">
        <?php foreach($contrat as $roite){ ?>
          <input type="text" id="contratid" name="contratid" class="form-control" value="<?php echo $roite['ID']?>" tabindex="10" required autofocus />
        <?php } ?> 
        <label for="materialFormSubscriptionEmailEx">Contrat</label>
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