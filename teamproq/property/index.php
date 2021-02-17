<?php include "header.php" ?>
<body>
  <section class="vbox">
    <section>
      <section class="hbox stretch">
        <section id="content" style="background-color:lightsteelblue">
          <section class="vbox">  
            <section class="scrollable wrapper">  

            <aside class="lter aside-md hidden-print" id="nav">                
            <section class="w-f scrollable">
              <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px" data-color="#333333">
           
                       <!-- nav -->
                       <nav class="nav-primary hidden-xs">
                  <ul class="nav">
                  <?php foreach($propertyCity as $row): ?>
                    <li >
                      <a href="#layout">
                        <i class="fa fa-columns icon">
                          <b class="bg-warning"></b>
                        </i>
                        <span class="pull-right">
                          <i class="fa fa-angle-down text"></i>
                          <i class="fa fa-angle-up text-active"></i>
                        </span>
                        <span><?=$row->town?></span>
                      </a>
                      <ul class="nav lt">
                      
                      <?php $propertyStreet=$propertyClass->propertyStreet($userDetails->company_id,$row->town);?>
                      <?php foreach($propertyStreet as $rowStreet): ?>
                        <li >
                          <a href="#layout">                                                        
                            <i class="fa fa-book"></i>
                            <span><?=$rowStreet->street?></span>
                          </a>
                        </li>
                        <?php endforeach ?>
                        </ul>
                     </li >
                     
                    <?php endforeach ?>
                  </ul>
                </nav>
                <!-- / nav -->
              </div>
            </section>
            </aside>
            </section>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>
        <aside class="bg-light lter b-l aside-md hide" id="notes">
          <div class="wrapper">Notification</div>
        </aside>
      </section>
    </section>
  </section>
 <?php include "footer.php" ?>
</body>
</html>