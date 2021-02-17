<?php

  include('database.php');

if(isset($_POST['id'])) {
  $task_name = $_POST['name']; 
  $id = $_POST['id'];
  $user_id = $_POST['user_id'];
  
  $query = "UPDATE task SET name = '$task_name',user_id='$user_id' WHERE id = '$id'";
  $result = mysqli_query($connection, $query);
  

  if (!$result) {
    die('Query Failed.');
  }
  echo "Task Update Successfully";  

}

?>
