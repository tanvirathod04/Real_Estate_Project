<?php
include('../../config.php');
include('../../../session.php');
$db = getDB();
//delete.php

if(isset($_POST["id"]))
{
 $query = "DELETE from events WHERE id=:id";
 $statement = $db->prepare($query);
 $statement->execute(
  array(
   ':id' => $_POST['id']
  )
 );
}

?>