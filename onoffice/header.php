
<?php
include('../../controllers/config.php');
include('../../session.php');
$userDetails=$userClass->userDetails($session_uid);
//print_r($userDetails->status);
?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>
  <meta charset="utf-8" />
  <title>On Office</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  
  <link rel="stylesheet" href="../css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="../css/animate.css" type="text/css" />
  <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="../css/font.css" type="text/css" />
  <!--<link rel="stylesheet" href="js/datatables/datatables.css" type="text/css"/>-->
  
  
  <link rel="stylesheet" href="../js/select2/select2.css" type="text/css" />
<link rel="stylesheet" href="../js/select2/theme.css" type="text/css" />
<link rel="stylesheet" href="../js/fuelux/fuelux.css" type="text/css" />
<link rel="stylesheet" href="../js/datepicker/datepicker.css" type="text/css" />
<link rel="stylesheet" href="../js/slider/slider.css" type="text/css" />
  <link rel="stylesheet" href="../css/app.css" type="text/css" />
  
 
  </head>
<body>
  <section class="vbox">
   
    <section>
      <section class="hbox stretch">
        <!-- .aside -->
        <aside class="bg-dark lter aside-md hidden-print" id="nav">          
          <section class="vbox">
           
            <section class="w-f scrollable">
              <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px" data-color="#333333">
                       <!-- nav -->
                       <nav class="nav-primary hidden-xs">
                  <ul class="nav">
                    <li  class="active" >
                      <a href="../dashboard/dashboard.php"  onMouseOver="this.style.color='black'" onMouseOut="this.style.color='#ffffff'">
                        <i class="fa fa-dashboard icon">
                          <b class="bg-danger"></b>
                        </i>
                        <span>Dashboard</span>
                      </a>
                    </li>
                                   
                        <li class="active">
                          <a href="../address/" onMouseOver="this.style.color='black'" onMouseOut="this.style.color='#ffffff'">                                                        
                            <i class="fa fa-users">
                            <b class="bg-warning"></b></i>
                            <span>Adressen</span>
                          </a>
                        </li>
                        <li class="active">
                        <a href="../mail/" onMouseOver="this.style.color='black'" onMouseOut="this.style.color='#ffffff'">
                        <i class="fa fa-envelope-o icon">
                          <b class="bg-primary dker"></b>
                        </i>
                        <span>E-Mail</span>
                      </a>
                    </li>
                        <li class="active">
                          <a href="../property/" onMouseOver="this.style.color='black'" onMouseOut="this.style.color='#ffffff'">                                                        
                            <i class="fa fa-home">
                            <b class="bg-danger"></b></i>
                            <span>Immobilien</span>
                          </a>
                        </li>
                        <li class="active">
                          <a href="../task/" onMouseOver="this.style.color='black'" onMouseOut="this.style.color='#ffffff'" >                                                        
                            <i class="fa fa-tasks">
                            <b class="bg-success"></b></i>
                            <span>Aufgaben</span>
                          </a>
                        </li>
                        <li class="active">
                        <a href="../calendar/" onMouseOver="this.style.color='black'" onMouseOut="this.style.color='#ffffff'" >   
                           <i class="fa fa-calendar">
                           <b class="bg-primary dker"></b></i>
                            <span>Kalender</span>
                          </a>
                        </li>
                        <li class="active">
                        <a href="../notes/" onMouseOver="this.style.color='black'" onMouseOut="this.style.color='#ffffff'" >   
                           <i class="fa fa-book">
                           <b class="bg-warning"></b></i>
                            <span>Notes</span>
                          </a>
                        </li>
                        <?php
                           if($userDetails->status == 'approved'){
                             echo('<li class=active>
                             <a href=../user/ onMouseOver=this.style.color=black onMouseOut=this.style.color=#ffffff>                                                        
                             <i class="fa fa-users">
                             <b class="bg-success"></b></i>
                             <span>User</span>
                           </a>
                             </li>');
                           }
                           ?>   
                      </ul>        
                
                </nav>
                <!-- / nav -->
              </div>
            </section>
            
            <footer class="footer lt hidden-xs b-t b-dark"> 
              <a href="#nav" data-toggle="class:nav-xs" class="pull-right btn btn-sm btn-dark btn-icon">
                <i class="fa fa-angle-left text"></i>
                <i class="fa fa-angle-right text-active"></i>
              </a>
             
            </footer>
          </section>
        </aside>
  <section class="vbox">
    <header class="bg-dark dk header navbar navbar-fixed-top-xs">
      <div class="navbar-header aside-md">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
          <i class="fa fa-bars"></i>
        </a>
       
        <h3 style="color:#fff;"> On Office </h3>
        <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".nav-user">
          <i class="fa fa-cog"></i>
        </a>
      </div>
      
      <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user">
        <li class="hidden-xs">
          <a href="#" class="dropdown-toggle dk" data-toggle="dropdown">
            <i class="fa fa-bell"></i>
            <span class="badge badge-sm up bg-danger m-l-n-sm count">2</span>
          </a>
          <section class="dropdown-menu aside-xl">
            <section class="panel bg-white">
              <header class="panel-heading b-light bg-light">
                <strong>You have <span class="count">2</span> notifications</strong>
              </header>
              <div class="list-group list-group-alt animated fadeInRight">
                <a href="#" class="media list-group-item">
                  <span class="pull-left thumb-sm">
                    <img src="../../images/<?php echo $userDetails->logo?>" alt="John said" class="img-circle">
                  </span>
                  <span class="media-body block m-b-none">
                    Use awesome animate.css<br>
                    <small class="text-muted">10 minutes ago</small>
                  </span>
                </a>
                <a href="#" class="media list-group-item">
                  <span class="media-body block m-b-none">
                    1.0 initial released<br>
                    <small class="text-muted">1 hour ago</small>
                  </span>
                </a>
              </div>
              <footer class="panel-footer text-sm">
                <a href="#" class="pull-right"><i class="fa fa-cog"></i></a>
                <a href="#notes" data-toggle="class:show animated fadeInRight">See all the notifications</a>
              </footer>
            </section>
          </section>
        </li>
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="thumb-sm avatar pull-left">
              <img src="../../images/<?php echo $userDetails->logo?>"?>
            </span>
            <?php echo $userDetails->last_name; ?> <b class="caret"></b>
          </a>
          <ul class="dropdown-menu animated fadeInRight" id="allItems">
            <span class="arrow top"></span>
            <li>
              <a href="#">Settings</a>
            </li>
            <li>
              <a href="../dashboard/profile.php">Profile</a>
            </li>
            
            <li>
              <a href="#">
                <span class="badge bg-danger pull-right">3</span>
                Notifications
              </a>
            </li>
            <li>
              <a href="docs.html">Help</a>
            </li>
            <li class="divider"></li>
            <li>
              <a href="../logout.php" data-toggle="ajaxModal" >Logout</a>
            </li>
          </ul>
        </li>
      </ul>      
   
      <section>
  
  </header>