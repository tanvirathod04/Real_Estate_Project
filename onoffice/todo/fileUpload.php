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
		   <header class="panel-heading font-bold">Upload Media</header>
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
					
                    <?php
//$conn=new PDO('mysql:host=localhost; dbname=realestate', 'root', '') or die(mysql_error());
$db = getDB();
if(isset($_POST['submit'])!=""){
  $name=$_FILES['photo']['name'];
  $address_id=$_POST['id'];
  $size=$_FILES['photo']['size'];
  $type=$_FILES['photo']['type'];
  $temp=$_FILES['photo']['tmp_name'];
  //$caption1=$_POST['caption'];
  //$link=$_POST['link'];
  move_uploaded_file($temp,"upload/".$name);
$query=$db->query("insert into onoffice_todo_files(onoffice_todo_id,file_)values($address_id,'$name')");

if($query){
// header("location:index.php");
}
else{
die(mysql_error());
}
}
?>
                    <form enctype="multipart/form-data" action="" name="form" method="post">
     
<input type="hidden" name="id" value="<?php  echo $_GET['todo_id'];?>">
					<input type="file" name="photo" id="photo" required/></td>
        <br/>
					<input type="submit"  class="btn btn-s-md btn-info btn-rounded" name="submit" id="submit" value="Upload" />
			</form>


			<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
			<thead>
				<tr>
					<th width="90%" align="center">Files</th>
					<th align="center">Action</th>	
				</tr>
			</thead>
			<?php
    	$query=$db->query("select * from onoffice_todo_files where onoffice_todo_id=".$_GET['todo_id']." order by id desc");
    //echo("select * from onoffice_address_files where onoffice_address_id=".$_GET['id']." order by id desc");
    //$query=$conn->query("select * from onoffice_address_files order by id desc");
			while($row=$query->fetch()){
        $name=$row['file_'];
        $file_id=$row['id'];
			?>
			<tr>
			
				<td>
					&nbsp;<?php echo $name ;?>
				</td>
				<td>
					<!--<button class="alert-success"><a href="../../controllers/onoffice_database/onoffice_address/onoffice_address_files.php?file_id=<?php echo $file_id;?>">Delete</a></button>-->
          </td>
          <td>
          <button class="alert-success"><a href="onoffice_todo_files_download.php?filename=<?php echo $name;?>">Download</a></button>
				</td>
			</tr>
			<?php }?>
		</table>

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
 

  