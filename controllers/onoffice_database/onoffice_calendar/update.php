<?php
include('../../config.php');
include('../../../session.php');
$db = getDB();
//update.php
if(isset($_POST["id"]))
{
 $query = "UPDATE events 
 SET title=:title, start_event=:start_event, end_event=:end_event 
 WHERE id=:id
 ";
 $statement = $db->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end'],
   ':id'   => $_POST['id']
  )
 );
}

?>