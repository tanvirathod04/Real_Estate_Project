<?php include "../../header.php" ?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>
  <meta charset="utf-8" />
  <title>Notebook | Web Application</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="../css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="../css/animate.css" type="text/css" />
  <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="../css/font.css" type="text/css" />
    <link rel="stylesheet" href="../js/fuelux/fuelux.css" type="text/css" />
  <link rel="stylesheet" href="../js/fullcalendar/fullcalendar.css" type="text/css"  />
  <link rel="stylesheet" href="../js/fullcalendar/theme.css" type="text/css" />
  <link rel="stylesheet" href="../css/app.css" type="text/css" />
  <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <script src="js/ie/excanvas.js"></script>
  <![endif]-->
</head>
<body>
  
        <!-- /.aside -->
        <section id="content">
          <section class="hbox stretch">          
            <!-- .aside -->
            <aside>
              <section class="vbox">
                <section class="scrollable wrapper">
                  <section class="panel panel-default">
                    <header class="panel-heading bg-light clearfix">
                      <div class="btn-group pull-right" data-toggle="buttons">
                        <label class="btn btn-sm btn-bg btn-default active" id="monthview">
                          <input type="radio" name="options">Month
                        </label>
                        <label class="btn btn-sm btn-bg btn-default" id="weekview">
                          <input type="radio" name="options">Week
                        </label>
                        <label class="btn btn-sm btn-bg btn-default" id="dayview">
                          <input type="radio" name="options">Day
                        </label>
                      </div>
                      <span class="m-t-xs inline">
                        Fullcalendar
                      </span>
                    </header>
                    <div class="calendar" id="calendar">

                    </div>
                  </section>
                </section>
              </section>
            </aside>
            <!-- /.aside -->
            <!-- .aside -->
            <aside class="aside-lg b-l">
              <div class="padder">
                <h5>Dragable events</h5>
                <div class="line"></div>
                <div id="myEvents" class="pillbox clearfix m-b no-border no-padder">
                  <ul>
                    <li class="label bg-dark">Item One</li>
                    <li class="label bg-success">Item Two</li>
                    <li class="label bg-warning">Item Three</li>
                    <li class="label bg-danger">Item Four</li>
                    <li class="label bg-info">Item Five</li>
                    <li class="label bg-primary">Item Six</li>
                    <input type="text" placeholder="add an event">
                  </ul>
                </div>
                <div class="line"></div>
                <div class="checkbox">
                  <label class="checkbox-custom"><input type='checkbox' id='drop-remove' /><i class="fa fa-square-o"></i> remove after drop</label>
                </div>
              </div>
            </aside>
            <!-- /.aside -->
          </section>
          
      </section>
    </section>
  </section>
  <script src="../js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../js/bootstrap.js"></script>
  <!-- App -->
  <script src="../js/app.js"></script>
  <script src="../js/app.plugin.js"></script>
  <script src="../js/slimscroll/jquery.slimscroll.min.js"></script>
  <!-- fuelux -->
<script src="../js/fuelux/fuelux.js"></script>
<!-- fullcalendar -->
<script src="../js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="../js/jquery.ui.touch-punch.min.js"></script>
<script src="../js/fullcalendar/fullcalendar.min.js"></script>
<script src="../js/fullcalendar/demo.js"></script>

</body>
</html>