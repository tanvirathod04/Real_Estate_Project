<?php include "../../header.php" ?>
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
					
            <?php
            $assign_user = $_POST['options'];
            $todo_id = $_POST['todo_id'];
            $todo_user_id = $_POST['todo_user_id'];
            if($assign_user == 'user'){
							$todo_ids=$todoClass->updateTodoAssignUser($todo_id,'user');?>
                <div class="row">
			<div class="col-sm-6">	
			<h3>Assign User's </h3>
			<form method="post" action="../../controllers/onoffice_database/todo/assign_user.php">
			<input type="hidden" name="todo_id"  value="<?php  echo $todo_id;?>">
			<?php
			foreach($company_userDetails as $cud):{
				if($cud['user_id']!=$todo_user_id){
				?>

<div class="checkbox">
<div class="form-group">
	<label  class="col-sm-2 control-label">
		<input type="checkbox" name="users_cid[]" value="<?php echo $cud['user_id'];?>"><?php echo $cud['first_name'];?>
	</label>
</div>
</div>
<?php } } endforeach;?>
<input type="submit" value="Assign" class="btn btn-s-md btn-info btn-rounded" name="submit">
</form>
			</div>

			<div class="col-sm-6">
			<h3>Assigned User's</h3>
			<?php $getAssignTodoUsers=$todoClass->getAssignTodoUser($todo_id);
foreach($getAssignTodoUsers as $gud):{?>
<div class="panel-body">
                          <div class="comment-action m-t-sm"><?php echo $gud['first_name'];?>
                            <a href="../../controllers/onoffice_database/todo/remove_user.php?id=<?php echo $gud['id'];?>" class="btn btn-danger btn-xs">
                              <i class="fa fa-trash-o text-muted"></i> 
                               Remove
                            </a>
                          </div>
</div>												
<?php } endforeach;?>
			</div>
			</div>
            <?php }else if($assign_user == 'public'){
$todo_ids=$todoClass->updateTodoAssignUser($todo_id,'public');
echo"<script>alert('Todo set as Public')</script>";
echo "<script>window.location = '../../onoffice/todo/';</script>";
						}else if($assign_user == 'me'){
							$todo_ids=$todoClass->updateTodoAssignUser($todo_id,'me');
							echo"<script>alert('Todo set as Only Me')</script>";
							echo "<script>window.location = '../../onoffice/todo/';</script>";
						}
            ?>
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
 

  