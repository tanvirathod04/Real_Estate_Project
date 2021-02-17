<?php include "../header.php" ?>
<body>
  <section class="vbox">
    <section>
      <section class="hbox stretch">
        <section id="content">
          <section class="vbox">
           <section class="scrollable wrapper">
           <div class="wrapper">
          

           <section class="panel panel-default">
                    <div class="panel-body">
                      <div class="clearfix text-center m-t">
                        <div class="inline">
                          <div class="easypiechart" data-percent="75" data-line-width="5" data-bar-color="#4cc0c1" data-track-Color="#f5f5f5" data-scale-Color="false" data-size="130" data-line-cap='butt' data-animate="1000">
                            <div class="thumb-lg">
                            <form action="../../controllers/onoffice_database/onoffice_client/onoffice_client_edit.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="user_id"  value="<?php  echo $session_uid;?>">
                              <img id="imgFileUpload" src="../../images/<?php echo $userDetails->logo?>" class="img-circle">
                              <span id="spnFilePath"></span>
                              <input type="file" id="FileUpload1" name="FileUpload1" style="display: none" />
<script type="text/javascript">
    window.onload = function () {
        var fileupload = document.getElementById("FileUpload1");
        var filePath = document.getElementById("spnFilePath");
        var image = document.getElementById("imgFileUpload");
        image.onclick = function () {
            fileupload.click();
        };
        fileupload.onchange = function () {
            var fileName = fileupload.value.split('\\')[fileupload.value.split('\\').length - 1];
            filePath.innerHTML = "<b>Selected File: </b>" + fileName;
            document.getElementById("imgbox1").style.display = "";
        };
    };
</script>
<button type="submit" id="imgbox1" name= "signup" style="display:none">Upload</button>
</form>
                            </div>
                          </div>
                          <div class="h4 m-t m-b-xs"><?php echo $userDetails->last_name; ?></div>
                          <i class="fa fa-map-marker"></i><small class="text-muted m-b">&nbsp;<?php echo $userDetails->town; ?></small>
                        </div>                      
                      </div>
                    </div>
                    
                   <footer class="panel-footer bg-info text-center">
                      <div class="row pull-out">
                        <div class="col-xs-4">
                          <div class="padder-v">
                            <span class="m-b-xs h3 block text-white">245</span>
                            <small class="text-muted">Followers</small>
                          </div>
                        </div>
                        <div class="col-xs-4 dk">
                          <div class="padder-v">
                            <span class="m-b-xs h3 block text-white">55</span>
                            <small class="text-muted">Following</small>
                          </div>
                        </div>
                        <div class="col-xs-4">
                          <div class="padder-v">
                            <span class="m-b-xs h3 block text-white">2,035</span>
                            <small class="text-muted">Tweets</small>
                          </div>
                        </div>
                      </div>
                    </footer>
                    <div class="list-group no-radius alt">
                          <a class="list-group-item" href="#">
                            <span class="badge bg-success">25</span>
                            <i class="fa fa-comment icon-muted"></i> 
                            Messages
                          </a>
                          <a class="list-group-item" href="#">
                            <span class="badge bg-info">16</span>
                            <i class="fa fa-envelope icon-muted"></i> 
                            Inbox
                          </a>
                          <a class="list-group-item" href="#">
                            <span class="badge bg-light">5</span>
                            <i class="fa fa-eye icon-muted"></i> 
                            Profile visits
                          </a>
                        </div>

                        <div class="clearfix text-center m-t">
                          <small class="text-uc text-xs text-muted">info</small>
                          <p>Firma : <?php echo $userDetails->company?><br/><br/>
                          E-Mail : <?php echo $userDetails->mail?><br/><br/>
                          Mobil : <?php echo $userDetails->mobile?><br/><br/>
                          Strase : <?php echo $userDetails->street?><br/><br/>
                          PLZ : <?php echo $userDetails->postal_code?><br/><br/>
                          Land : <?php echo $userDetails->country?></p>
                         
                        </div>
                      </div>
                  </section>
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
 <?php include "../footer.php" ?>
