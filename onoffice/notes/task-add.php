<?php

  include('database.php');

if(isset($_POST['name'])) {
 #echo $_POST['name'] . ', ' . $_POST['description'];
  $task_name = $_POST['name'];
  $user_id = $_POST['user_id'];
  
  $query = "INSERT into task(name,user_id) VALUES ('$task_name','$user_id')";
  $result = mysqli_query($connection, $query);
  echo "<pre>".$query."</pre>";
  
  if (!$result) {
    die('Query Failed.');
  }

  echo "Task Added Successfully";  

}

?>
 