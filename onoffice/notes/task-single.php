<?php

include('database.php');

if(isset($_POST['id'])) {
  $id = mysqli_real_escape_string($connection, $_POST['id']);

  $user_id = $_GET['user_id'];
  $query = "SELECT * from task WHERE id = {$id} AND user_id=$user_id";

  $result = mysqli_query($connection, $query);
  if(!result) {
    die('Query Failed'. mysqli_error($connection));
  }

  $json = array();
  while($row = mysqli_fetch_array($result)) {
    $json[] = array(
      'date' => $row['date'],
      'name' => $row['name'],
      'id' => $row['id']
    );
  }
  $jsonstring = json_encode($json[0]);
  echo $jsonstring;
}

?>
