<!DOCTYPE html>
<html lang="en" class="app">
<head>
  <meta charset="utf-8" />
  <title>Company SignUp</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="../css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="../css/animate.css" type="text/css" />
  <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="../css/font.css" type="text/css" />
  <link rel="stylesheet" href="../js/select2/select2.css" type="text/css" />
<link rel="stylesheet" href="../js/select2/theme.css" type="text/css" />
<link rel="stylesheet" href="../js/fuelux/fuelux.css" type="text/css" />
<link rel="stylesheet" href="../js/datepicker/datepicker.css" type="text/css" />
<link rel="stylesheet" href="../js/slider/slider.css" type="text/css" />
  <link rel="stylesheet" href="../css/app.css" type="text/css" />
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="../css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="../css/animate.css" type="text/css" />
  <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="../css/font.css" type="text/css" />
    <link rel="stylesheet" href="../css/app.css" type="text/css" />
</head>
<body>
  <section class="vbox">
   
      <section class="hbox stretch">
        <section id="content" class="m-t-lg wrapper-md animated fadeInDown">
         
            <section class="scrollable padder">
             
              <div class="row">
             
              <form id="company_form" action="../../controllers/company_database/onoffice_company_client_add.php" method="POST" class="panel-body wrapper-lg" enctype="multipart/form-data" style="background-color:#2e3e4e;">
              
              <header class="panel-heading text-center">
                <strong style="color:white;font-size: 20px;">Company Sign up</strong>
             </header>
                <div class="col-sm-6">
                  <section class="panel panel-default">
                <div class="panel-body">
                 <div class="form-group">
                   <label class="control-label">Company Name</label>
                  <input type="text" name="company" class="form-control" required>
                </div>
                    
    <div class="form-group">
      <label class="control-label">Country</label>
      <input type="text" name="country" class="form-control" required>
    </div>
    <div class="form-group">
      <label class="control-label">Language</label>
      <input type="text" name="language"  class="form-control" required>
    </div>

              <div class="form-group">
                    <label class="control-label">Address</label>
                    <input type="text" name="address"  class="form-control" required>
                  </div>
                        
                  <div class="form-group">
                    <label class="control-label">Fax</label>
                    <input type="text" name="fax"  class="form-control" > 
                  </div>

                  <div class="form-group">
                    <label class="control-label">Phone</label>
                    <input type="text" name="phone" class="form-control" required>
                  </div>
                  </div></section>
                </div>   <!--col     -->

                <div class="col-sm-6">
                  <section class="panel panel-default">
                
                    <div class="panel-body">
                     
                  <div class="form-group">
                    <label class="control-label">Email</label>
                    <input type="email" name="email"  class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label class="control-label">Password</label>
                    <input type="password" name="password"  class="form-control" required>
                  </div>
                 
                  <div class="form-group">
                    <label class="control-label">URL</label>
                    <input type="text" name="url" id="url"  class="form-control" >
                  </div>
                  <div class="form-group">
                    <label class="control-label">Profile Photo</label>
                    <input type="file" name="logo" id="logo"  required>
                  </div>

                    
                    <input type="hidden" name="package_name" id="package_name" value="<?php  echo $_GET['package'];?>">
                 
                  </div></section>
                  <div class="row" style="background-color:#2e3e4e;">
                <div class="col-sm-6">  <button type="submit" name= "signup" class="btn btn-facebook btn-block m-b-sm">Sign up</button></div>
                <div class="col-sm-6"><a href="../../signin.php" class="btn btn-twitter btn-block m-b-sm">Sign in</a></div>
                </div>
                </div>   <!--col     -->        
                 
                
             
                </form>
                </div><!--row -->
              </section>
          
          </section>
      </section>
    </section>

    <!-- footer -->
 
  <!-- / footer -->
  <script src="../js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../js/bootstrap.js"></script>
  <!-- App -->
  <script src="../js/app.js"></script>
  <script src="../js/app.plugin.js"></script>
  <script src="../js/slimscroll/jquery.slimscroll.min.js"></script>
  </body>
</html>