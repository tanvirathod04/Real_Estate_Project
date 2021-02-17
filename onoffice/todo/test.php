<html>
<head>
<title>Bootstrap Grid</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

</head>
<body>
<div class="container" style="padding:150px;">
 
<div id="todomodal" class="modal fade" role='dialog'>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Assign User's</h4>
            </div>
            <div class="modal-body">
            <form action="assign_user.php" method="post">
			<p id="todomodal-todo_id">HEllo</p>
			<p id="todomodal-todo_user_id">Para 2</p>			
			<input type="hidden" name="todo_id"  value="<?php  echo $row['id'];?>">
			<input type="hidden" name="todo_user_id"  value="<?php  echo $row['user_id'];?>">
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
		
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
      </div>
  </div>


<button type="button" class="btn btn-info btn-lg open-modal" >Click Here To Open Modal</button>
</div>
<script type="text/javascript">
   $(document).on("click", ".open-modal", function () {
	 var x = new Date(); 
     var myHeading = "<p>I Am Added Dynamically </p>";
     $("#todomodal-todo_id").html(myHeading + x); 
		 $("#todomodal-todo_user_id").html(myHeading + x); 
     $('#todomodal').modal('show');
    });

</script>
</body>
</html>