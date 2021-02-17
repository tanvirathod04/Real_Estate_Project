<?php include "../../header.php" ?>
 <section id="content">
          
          <section class="vbox">          
            <section class="scrollable padder">
             
              <div class="m-b-md">
                <h3 class="m-b-none">Dashboard</h3>
                <small>Welcome back <strong><?php echo $userDetails->last_name; ?></strong></small>
              </div>
              <section class="panel panel-default">
                <div class="row m-l-none m-r-none bg-light lter">
                  <div class="col-sm-6 col-md-3 padder-v b-r b-light">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-info"></i>
                      <i class="fa fa-male fa-stack-1x text-white"></i>
                    </span>
                    <a class="clear" href="#">
                      <span class="h3 block m-t-xs"><strong>52,000</strong></span>
                      <small class="text-muted text-uc">New Addresses</small>
                    </a>
                  </div>
                  <div class="col-sm-6 col-md-3 padder-v b-r b-light lt">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-warning"></i>
                      <i class="fa fa-bug fa-stack-1x text-white"></i>
                      <span class="easypiechart pos-abt" data-percent="100" data-line-width="4" data-track-Color="#fff" data-scale-Color="false" data-size="50" data-line-cap='butt' data-animate="2000" data-target="#bugs" data-update="3000"></span>
                    </span>
                    <a class="clear" href="#">
                      <span class="h3 block m-t-xs"><strong id="bugs">468</strong></span>
                      <small class="text-muted text-uc">Properties</small>
                    </a>
                  </div>
                  <div class="col-sm-6 col-md-3 padder-v b-r b-light">                     
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-danger"></i>
                      <i class="fa fa-fire-extinguisher fa-stack-1x text-white"></i>
                      <span class="easypiechart pos-abt" data-percent="100" data-line-width="4" data-track-Color="#f5f5f5" data-scale-Color="false" data-size="50" data-line-cap='butt' data-animate="3000" data-target="#firers" data-update="5000"></span>
                    </span>
                    <a class="clear" href="#">
                      <span class="h3 block m-t-xs"><strong id="firers">359</strong></span>
                      <small class="text-muted text-uc">Tasks</small>
                    </a>
                  </div>
                  <div class="col-sm-6 col-md-3 padder-v b-r b-light lt">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x icon-muted"></i>
                      <i class="fa fa-clock-o fa-stack-1x text-white"></i>
                    </span>
                    <a class="clear" href="#">
                      <span class="h3 block m-t-xs"><strong>31:50</strong></span>
                      <small class="text-muted text-uc">Left to exit</small>
                    </a>
                  </div>
                </div>
              </section>
              <div class="row">
                <div class="col-md-8">
                  <section class="panel panel-default">
                    <header class="panel-heading font-bold">Statistics</header>
                    <div class="panel-body">
                      <div id="flot-1ine" style="height:210px"></div>
                    </div>
                    <footer class="panel-footer bg-white no-padder">
                      <div class="row text-center no-gutter">
                        <div class="col-xs-3 b-r b-light">
                          <span class="h4 font-bold m-t block">5,860</span>
                          <small class="text-muted m-b block">Orders</small>
                        </div>
                        <div class="col-xs-3 b-r b-light">
                          <span class="h4 font-bold m-t block">10,450</span>
                          <small class="text-muted m-b block">Sellings</small>
                        </div>
                        <div class="col-xs-3 b-r b-light">
                          <span class="h4 font-bold m-t block">21,230</span>
                          <small class="text-muted m-b block">Items</small>
                        </div>
                        <div class="col-xs-3">
                          <span class="h4 font-bold m-t block">7,230</span>
                          <small class="text-muted m-b block">Customers</small>                        
                        </div>
                      </div>
                    </footer>
                  </section>
                </div>
                <div class="col-md-4">
                  <section class="panel panel-default">
                  
                    <a class="weatherwidget-io" href="https://forecast7.com/en/40d71n74d01/new-york/" data-label_1="NEW YORK" data-label_2="WEATHER" data-theme="original" >NEW YORK WEATHER</a>
                      <script>
                    !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
                    </script>
                  </section>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8">
                  <h4 class="m-t-none">Todos</h4>
                  <ul class="list-group gutter list-group-lg list-group-sp sortable">
                    <li class="list-group-item box-shadow">
                      <a href="#" class="pull-right" data-dismiss="alert">
                        <i class="fa fa-times icon-muted"></i>
                      </a>
                      <span class="pull-left media-xs">
                        <i class="fa fa-sort icon-muted fa m-r-sm"></i>
                        <a  href="#todo-1" data-toggle="class:text-lt text-success" class="active">
                          <i class="fa fa-square-o fa-fw text"></i>
                          <i class="fa fa-check-square-o fa-fw text-active text-success"></i>
                        </a>
                      </span>
                      <div class="clear text-success text-lt" id="todo-1">
                        Browser compatibility
                      </div>
                    </li>
                    <li class="list-group-item box-shadow">
                      <a href="#" class="pull-right" data-dismiss="alert">
                        <i class="fa fa-times icon-muted"></i>
                      </a>
                      <span class="pull-left media-xs">
                        <i class="fa fa-sort icon-muted fa m-r-sm"></i>
                        <a  href="#todo-2" data-toggle="class:text-lt text-danger">
                          <i class="fa fa-square-o fa-fw text"></i>
                          <i class="fa fa-check-square-o fa-fw text-active text-danger"></i>
                        </a>
                      </span>
                      <div class="clear" id="todo-2">
                        Looking for more example templates
                      </div>
                    </li>
                    <li class="list-group-item box-shadow">
                      <a href="#" class="pull-right" data-dismiss="alert">
                        <i class="fa fa-times icon-muted"></i>
                      </a>
                      <span class="pull-left media-xs">
                        <i class="fa fa-sort icon-muted fa m-r-sm"></i>
                        <a  href="#todo-3" data-toggle="class:text-lt">
                          <i class="fa fa-square-o fa-fw text"></i>
                          <i class="fa fa-check-square-o fa-fw text-active text-success"></i>
                        </a>
                      </span>
                      <div class="clear" id="todo-3">
                        Customizing components
                      </div>
                    </li>
                    <li class="list-group-item box-shadow">
                      <a href="#" class="pull-right" data-dismiss="alert">
                        <i class="fa fa-times icon-muted"></i>
                      </a>
                      <span class="pull-left media-xs">
                        <i class="fa fa-sort icon-muted fa m-r-sm"></i>
                        <a  href="#todo-4" data-toggle="class:text-lt">
                          <i class="fa fa-square-o fa-fw text"></i>
                          <i class="fa fa-check-square-o fa-fw text-active text-success"></i>
                        </a>
                      </span>
                      <div class="clear" id="todo-4">
                        The fastest way to get started
                      </div>
                    </li>
                    <li class="list-group-item box-shadow">
                      <a href="#" class="pull-right" data-dismiss="alert">
                        <i class="fa fa-times icon-muted"></i>
                      </a>
                      <span class="pull-left media-xs">
                        <i class="fa fa-sort icon-muted fa m-r-sm"></i>
                        <a  href="#todo-5" data-toggle="class:text-lt">
                          <i class="fa fa-square-o fa-fw text"></i>
                          <i class="fa fa-check-square-o fa-fw text-active text-success"></i>
                        </a>
                      </span>
                      <div class="clear" id="todo-5">
                        HTML5 doctype required
                      </div>
                    </li>
                    <li class="list-group-item box-shadow">
                      <a href="#" class="pull-right" data-dismiss="alert">
                        <i class="fa fa-times icon-muted"></i>
                      </a>
                      <span class="pull-left media-xs">
                        <i class="fa fa-sort icon-muted fa m-r-sm"></i>
                        <a  href="#todo-6" data-toggle="class:text-lt">
                          <i class="fa fa-square-o fa-fw text"></i>
                          <i class="fa fa-check-square-o fa-fw text-active text-success"></i>
                        </a>
                      </span>
                      <div class="clear" id="todo-6">
                        LessCSS compiling
                      </div>
                    </li>
                  </ul>                  
                </div>
                <div class="col-md-4">
                  <section class="panel b-light">
                    <header class="panel-heading bg-primary dker no-border"><strong>Calendar</strong></header>
                    <div id="calendar" class="bg-primary m-l-n-xxs m-r-n-xxs"></div>
                    <div class="list-group">
                      <a href="onoffice/fullcalendar.php" class="list-group-item text-ellipsis">
                        <span class="badge bg-danger">7:30</span> 
                        Meet a friend
                      </a>
                      <a href="onoffice/fullcalendar.php" class="list-group-item text-ellipsis"> 
                        <span class="badge bg-success">9:30</span> 
                        Have a kick off meeting with .inc company
                      </a>
                      <a href="onoffice/fullcalendar.php" class="list-group-item text-ellipsis">
                        <span class="badge bg-light">19:30</span>
                        Milestone release
                      </a>
                    </div>
                  </section>                  
                </div>
              </div>
              <div>
                <div class="row">
                  <div class="col-md-8">
                  <div class="btn-group m-b" data-toggle="buttons">
                  <label class="btn btn-sm btn-default active">
                    <input type="radio" name="options" id="option1"> Timeline
                  </label>
                  <label class="btn btn-sm btn-default">
                    <input type="radio" name="options" id="option2"> Activity
                  </label>
                </div>
                <section class="comment-list block">
                  <article id="comment-id-1" class="comment-item">
                    <span class="fa-stack pull-left m-l-xs">
                      <i class="fa fa-circle text-info fa-stack-2x"></i>
                      <i class="fa fa-play-circle text-white fa-stack-1x"></i>
                    </span>
                    <section class="comment-body m-b-lg">
                      <header>
                        <a href="#"><strong><?php echo $userDetails->last_name; ?></strong></a> shared a <a href="#" class="text-info">video</a> to you
                        <span class="text-muted text-xs">
                          24 minutes ago
                        </span>
                      </header>
                      <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id neque quam.</div>
                    </section>
                  </article>
<!-- .comment-reply -->
<article id="comment-id-2" class="comment-reply">
                    <article class="comment-item">
                      <a class="pull-left thumb-sm">
                      <img src="../../images/<?php echo $userDetails->logo?>" class="img-circle">
                      </a>
                      <section class="comment-body m-b-lg">
                        <header>
                          <a href="#"><strong><?php echo $userDetails->last_name; ?></strong></a>
                          <span class="text-muted text-xs">
                            26 minutes ago
                          </span>
                        </header>
                        <div> Morbi id neque quam. Aliquam.</div>
                      </section>
                    </article>
                    <article class="comment-item">
                      <a class="pull-left thumb-sm">
                      <img src="../../images/<?php echo $userDetails->logo?>" class="img-circle">
                      </a>
                      <section class="comment-body m-b-lg">
                        <header>
                          <a href="#"><strong>Mike</strong></a>
                          <span class="text-muted text-xs">
                            26 minutes ago
                          </span>
                        </header>
                        <div>Good idea.</div>
                      </section>
                    </article>                     
                  </article>                     
                  <!-- / .comment-reply -->
                  <article id="comment-id-2" class="comment-item">
                    <span class="fa-stack pull-left m-l-xs">
                      <i class="fa fa-circle text-danger fa-stack-2x"></i>
                      <i class="fa fa-file-o text-white fa-stack-1x"></i>
                    </span>
                    <section class="comment-body m-b-lg">
                      <header>
                        <a href="#"><strong>John Doe</strong></a>
                        <span class="text-muted text-xs">
                          1 hour ago
                        </span>
                      </header>
                      <div>Lorem ipsum dolor sit amet, consecteter adipiscing elit.</div>
                    </section>
                  </article>
                  <article id="comment-id-2" class="comment-item">
                    <span class="fa-stack pull-left m-l-xs">
                      <i class="fa fa-circle text-success fa-stack-2x"></i>
                      <i class="fa fa-check text-white fa-stack-1x"></i>
                    </span>
                    <section class="comment-body m-b-lg">
                      <header>
                        <a href="#"><strong>Jonathan</strong></a> completed a task
                        <span class="text-muted text-xs">
                          1 hour ago
                        </span>
                      </header>
                      <div>Consecteter adipiscing elit.</div>
                    </section>
                  </article>
                </section>
                <a href="#" class="btn btn-default btn-sm m-b"><i class="fa fa-plus icon-muted"></i> more</a>
              </div>
            </section>
          </section>
                    </div>
                    <div class="col-md-4">
                    <section class="panel panel-default">
                        <div class="text-center wrapper bg-light lt">
                          <div class="sparkline inline" data-type="pie" data-height="165" data-slice-colors="['#77c587','#41586e','#f2f2f2']">45000,23200,15000</div>
                        </div>
                        <ul class="list-group no-radius">
                          <li class="list-group-item">
                            <span class="pull-right">45,000</span>
                            <span class="label bg-primary">1</span>
                            .inc company
                          </li>
                          <li class="list-group-item">
                            <span class="pull-right">23,200</span>
                            <span class="label bg-dark">2</span>
                            Gamecorp
                          </li>
                          <li class="list-group-item">
                            <span class="pull-right">15,000</span>
                            <span class="label bg-light">3</span>
                            Neosoft company
                          </li>
                        </ul>
                      </section>
                    </div>
                    </div>
                
                
                  
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>
        <aside class="bg-light lter b-l aside-md hide" id="notes">
          <div class="wrapper">Notification</div>
        </aside>
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
    <script src="../js/charts/easypiechart/jquery.easy-pie-chart.js"></script>
  <script src="../js/charts/sparkline/jquery.sparkline.min.js"></script>
  <script src="../js/charts/flot/jquery.flot.min.js"></script>
  <script src="../js/charts/flot/jquery.flot.tooltip.min.js"></script>
  <script src="../js/charts/flot/jquery.flot.resize.js"></script>
  <script src="../js/charts/flot/jquery.flot.grow.js"></script>
  <script src="../js/charts/flot/demo.js"></script>

  <script src="../js/calendar/bootstrap_calendar.js"></script>
  <script src="../js/calendar/demo.js"></script>

  <script src="../js/sortable/jquery.sortable.js"></script>
 
</body>
</html>