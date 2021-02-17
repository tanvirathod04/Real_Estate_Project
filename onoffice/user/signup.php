<?php include "../../header.php" ?>
<html lang="en" class="app">
<head>
  <meta charset="utf-8" />
  <title>Employee SignUp</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="css/animate.css" type="text/css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="css/font.css" type="text/css" />
  <link rel="stylesheet" href="js/select2/select2.css" type="text/css" />
<link rel="stylesheet" href="js/select2/theme.css" type="text/css" />
<link rel="stylesheet" href="js/fuelux/fuelux.css" type="text/css" />
<link rel="stylesheet" href="js/datepicker/datepicker.css" type="text/css" />
<link rel="stylesheet" href="js/slider/slider.css" type="text/css" />
  <link rel="stylesheet" href="css/app.css" type="text/css" />
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="css/animate.css" type="text/css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="css/font.css" type="text/css" />
    <link rel="stylesheet" href="css/app.css" type="text/css" />
</head>
<body>
  <section class="vbox">
   
      <section class="hbox stretch">
        <section id="content" class="m-t-lg wrapper-md animated fadeInDown">
         
            <section class="scrollable padder">
            <?php

include('../../controllers/companyClass.php');
$companyClass = new companyClass();
    if(isset($_REQUEST['signup']))
    {
      $company_id=$_POST['company_id'];
      $company_counter=$_POST['company_counter'];
      $salutation=$_POST['salutation'];
      $fname=$_POST['first_name'];
      $lname=$_POST['last_name'];
      $company=$_POST['company'];
      $uemail=$_POST['email'];
      $umobile=$_POST['mobile'];
      $upassword=$_POST['password'];
      $fax=$_POST['fax'];
      
      //$logo=$_POST['logo'];
      $logo=$_FILES['logo']['name'];
      $phone=$_POST['phone'];
      $country=$_POST['country'];
      $language=$_POST['language'];
      $postal_code=$_POST['postal_code'];
      $town=$_POST['town'];
      $house_no=$_POST['house_no'];
      $street=$_POST['street'];
  
      $temp=$_FILES['logo']['tmp_name'];
      move_uploaded_file($temp,"../images/".$logo);
      
      
      $cid = $companyClass->updateEmployeeCount((int)$company_counter-1,$company_id);
      $uid=$userClass->userRegistration($company_id,$salutation,$upassword,$uemail,$fname,$lname,$company,$umobile,$fax,$logo,$phone,
      $country,$language,$postal_code,$town,$house_no,$street,"pending");
     

      if($cid && $uid)
      {
        echo "<script>alert('Employee registration successful');</script>";
        echo "<script>window.location = 'index.php';</script>";;
      }else{
        echo "<script>alert('Please try again');</script>";
      }
    }
?>
              <div class="row">
             
              <form action="" method="POST" class="panel-body wrapper-lg" enctype="multipart/form-data" >
             
                <div class="col-sm-6">
                  <section class="panel panel-default">
                  <?php 
                  $company_data=$companyClass->companyId($userDetails->company);
                  ?>
                  <input type="hidden" name="company_counter"  value="<?php  echo $company_data->counter;?>">
                  <input type="hidden" name="company_id"  value="<?php  echo $company_data->company_id;?>">
                    <div class="panel-body">
                    <div class="row">
                    <div class="col-sm-3">  <div class="form-group">
                    <label class="control-label">Anrede Titel</label>
                    <select name="salutation" class="form-control m-b">
                    <option value="keine Angabe" style="color: #000000;">keine Angabe</option>
                    <option value="Herr" style="color: #000000;">Herr</option>
                    <option value="Frau" style="color: #000000;">Frau</option>
                    <option value="Firma" style="color: #000000;">Firma</option>
                    <option value="Familie" style="color: #000000;">Familie</option>
                    <option value="Eheleute" style="color: #000000;">Eheleute</option>
                    </select>
                    </select>
                   </div></div>
                 <div class="col-sm-4"> <div class="form-group">
                 <label class="control-label">Vorname</label>
               <input type="text" name="first_name" class="form-control" required>
               </div></div>
                 <div class="col-sm-4">
                 <div class="form-group">
                   <label class="control-label">Name</label>
                  <input type="text" name="last_name" class="form-control" required>
                </div>
                 </div>
                </div>
                    
    <div class="form-group">
      <label class="control-label">Firma</label>
      <input type="text" name="company" class="form-control" value=<?php echo $userDetails->company;?> readonly>
    </div>
    <div class="form-group">
      <label class="control-label">Land</label>
      <input type="text" name="country" class="form-control" required>
    </div>
    <div class="form-group">
      <label class="control-label">Language</label>
      <input type="text" name="language"  class="form-control" required>
    </div>

              <div class="form-group">
                    <label class="control-label">Strase</label>
                    <input type="text" name="street"  class="form-control" required>
                  </div>
                        
                  <div class="form-group">
                    <label class="control-label">Telefaxnummern</label>
                    <input type="text" name="fax"  class="form-control" > 
                  </div>
                  </div></section>
                </div>   <!--col     -->

                <div class="col-sm-6">
                  <section class="panel panel-default">
                
                    <div class="panel-body">
                     
                    <div class="row">
                    <div class="col-sm-3">
                    <div class="form-group">
                    <label class="control-label">Hausnummer</label>
                    <input type="text" name="house_no"  class="form-control" required>
                  </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
            <label class="control-label">Ort</label>
            <input type="text" name="town"  class="form-control " required> 
          </div> 
                    </div>
                    <div class="col-sm-5">
                    <div class="form-group">
            <label class="control-label">PLZ</label>
            <input type="text" name="postal_code" class="form-control " required>
          </div>
                    </div>
                    </div>
                   
                 <div class="row"><div class="col-sm-5">
                 <div class="form-group">
                    <label class="control-label">Mobil</label>
                    <input type="text" name="mobile" pattern="[0-9]{10}"  class="form-control" required>
                  </div></div><div class="col-sm-5">
                  <div class="form-group">
                    <label class="control-label">Telefon</label>
                    <input type="text" name="phone" class="form-control" >
                  </div></div></div>
                  
                
                  <div class="form-group">
                    <label class="control-label">E-Mail</label>
                    <input type="email" name="email"  class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label class="control-label">Password</label>
                    <input type="password" name="password"  class="form-control" required>
                  </div>
                 
                 
                  <div class="form-group">
                    <label class="control-label">Kundenlogo</label>
                    <input type="file" name="logo" id="logo"  required>
                  </div>
                       
                      
                  </div></section>
                  <div class="row">
                <div class="col-sm-6">  <button type="submit" name= "signup" class="btn btn-primary btn-block m-b-sm">Sign up</button></div>
                
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
  <script src="js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="js/bootstrap.js"></script>
  <!-- App -->
  <script src="js/app.js"></script>
  <script src="js/app.plugin.js"></script>
  <script src="js/slimscroll/jquery.slimscroll.min.js"></script>
  </body>
</html>