<?php
include('../../controllers/config.php');
include('../../session.php');
 $userDetails=$userClass->userDetails($session_uid);
?>
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
<?php include "../../controllers/todoClass.php";
$todoClass=new todoClass();
// $todoDetailss=$todoClass->todoDetails($session_uid,$userDetails->company_id);
$company_userDetails=$userClass->allUserDetails($userDetails->company_id);
?>

<!--<head><meta http-equiv="refresh" content="5"></head>-->
<section class="vbox">
   <section class="scrollable padder">
	   <span style="float:right;"><a href="#"> <i class="fa fa-print">Print</i></a></span>
		   <header class="panel-heading font-bold">ToDo Management</header>
  <link rel="stylesheet" href="css/reset.css">  
	<link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
  <link rel="stylesheet" href="css/global.css">
               
				<div class="page-wrapper">

	<div class="main-container">
		<div class="row container">
        					<!-- the else condition is not working  -->
					<!-- <div class="alert alert-success">
							<strong>Success!</strong> Indicates a successful or positive action.
					</div> -->
					
                    
                    <form action="assign_user.php" method="post">		
			<input type="hidden" name="todo_id"  value="<?php  echo $_GET['todo_id'];?>">
			<input type="hidden" name="todo_user_id"  value="<?php  echo $_GET['todo_user_id'];?>">
			<div class="m-b-sm">
		                <div class="btn-group" data-toggle="buttons">
		                  <label class="btn btn-sm btn-info active">
		                    <input type="radio" name="options" id="option1" value="public"><i class="fa fa-check text-active"></i> Public
		                  </label>
		                  <label class="btn btn-sm btn-success">
		                    <input type="radio" name="options" id="option2" value="me"><i class="fa fa-check text-active"></i> Me
											</label>
											<label class="btn btn-sm btn-success">
		                    <input type="radio" name="options" id="option2" value="user"><i class="fa fa-check text-active"></i>User
		                  </label>
		                </div>
			</div>

			<input type="submit" value="Ok" class="btn btn-s-md btn-info btn-rounded" name="submit">
			</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- local javascript -->
<script src="js/javascript.js"></script>
                
        
   
      
      <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
    </section>
    <aside class="bg-light lter b-l aside-md hide" id="notes">
      <div class="wrapper">Notification</div>
    </aside>
  </section>



<?php include "../footer.php" ?>
 

  