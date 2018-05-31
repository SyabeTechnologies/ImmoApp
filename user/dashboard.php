<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title>Tableau de bord | Couple d'Honneur</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="css/animate.css" type="text/css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="css/icon.css" type="text/css" />
  <link rel="stylesheet" href="css/font.css" type="text/css" />
  <link rel="stylesheet" href="css/app.css" type="text/css" />  
  <link rel="stylesheet" href="js/calendar/bootstrap_calendar.css" type="text/css" />
  <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <script src="js/ie/excanvas.js"></script>
  <![endif]-->
</head>
<body class="" >
  <section class="vbox">
    <?php include("php/header.php"); ?>
    <section>
      <section class="hbox stretch">
        <!-- .aside -->
        <aside class="bg-black aside-md hidden-print hidden-xs" id="nav">          
          <section class="vbox">
            <section class="w-f scrollable">
              <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">

                <?php include("php/nav.php"); ?>                
                
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
                    <div class="col-sm-6">
                      <h3 class="m-b-xs text-black">TABLEAU DE BORD</h3>
                    </div>
                  </section>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="panel b-a">
                        <div class="row m-n">
                          <div class="col-md-12 b-b b-r">
                            <a href="#" class="block padder-v hover">
                              <span class="i-s i-s-2x pull-left m-r-sm">
                                <i class="i i-hexagon2 i-s-base text-danger hover-rotate"></i>
                                <i class="fa fa-user text-white"></i>
                              </span>
                              <?php

                                include ('connection.php');

                                  $sql = "SELECT * FROM Couple"; 

                                  $sql1 = "SELECT * FROM Coach"; 

                                  $result = mysqli_query($conn, $sql);

                                  $Couple = mysqli_num_rows($result);

                                  $result = mysqli_query($conn, $sql1);

                                  $Coach = mysqli_num_rows($result);

                                  mysqli_close($conn);

                              ?>
                              <span class="clear">
                                <span class="h3 block m-t-xs text-danger"><?php echo $Couple; ?></span>
                                <small class="text-muted text-u-c">Nombre de fiancés</small>
                              </span>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="panel b-a">
                        <div class="row m-n">
                          <div class="col-md-12 b-b">
                            <a href="#" class="block padder-v hover">
                              <span class="i-s i-s-2x pull-left m-r-sm">
                                <i class="i i-hexagon2 i-s-base text-success-lt hover-rotate"></i>
                                <i class="fa fa-mortar-board i-sm text-white"></i>
                              </span>
                              <span class="clear">
                                <span class="h3 block m-t-xs text-success"><?php echo $Coach; ?></span>
                                <small class="text-muted text-u-c">Nombre de coachs</small>
                              </span>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <section class="panel b-light">
                        <header class="panel-heading"><strong>Calendrier des cours</strong></header>
                        <div id="calendar" class="bg-light dker m-l-n-xxs m-r-n-xxs"></div>
                        <div class="list-group">
                          <a href="#" class="list-group-item text-ellipsis">
                            <span class="badge bg-warning">18:30</span> 
                            Comment gérer la belle famille
                          </a>
                          <a href="#" class="list-group-item text-ellipsis"> 
                            <span class="badge bg-success">18:30</span> 
                            La gestion des finances dans le couple
                          </a>
                        </div>
                      </section>                  
                    </div>
                  </div>
				  <div class="row">
					<div class="col-md-12">
					  <section class="panel panel-default">
						<header class="panel-heading font-bold">Evolution des participants à l'école des fiancés</header>
						<div class="panel-body">
						  <div id="flot-1ine" style="height:250px"></div>
						</div>
					  </section>
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
  <script src="js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="js/bootstrap.js"></script>
  <!-- App -->
  <script src="js/app.js"></script>  
  <script src="js/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="js/charts/easypiechart/jquery.easy-pie-chart.js"></script>
  <script src="js/charts/sparkline/jquery.sparkline.min.js"></script>
  <script src="js/charts/flot/jquery.flot.min.js"></script>
  <script src="js/charts/flot/jquery.flot.tooltip.min.js"></script>
  <script src="js/charts/flot/jquery.flot.spline.js"></script>
  <script src="js/charts/flot/jquery.flot.pie.min.js"></script>
  <script src="js/charts/flot/jquery.flot.resize.js"></script>
  <script src="js/charts/flot/jquery.flot.grow.js"></script>
  <script src="js/charts/flot/demo.js"></script>

  <script src="js/calendar/bootstrap_calendar.js"></script>
  <script src="js/calendar/demo.js"></script>

  <script src="js/sortable/jquery.sortable.js"></script>
  <script src="js/app.plugin.js"></script>
</body>
</html>