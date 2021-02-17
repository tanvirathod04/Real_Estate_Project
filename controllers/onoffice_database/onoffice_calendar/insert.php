<?php
include('../../config.php');
include('../../../session.php');
//insert.php

$db = getDB();

if(isset($_POST["title"]))
{
 $query = "INSERT INTO events 
 (title, start_event, end_event,user_id,meeting_with) 
 VALUES (:title, :start_event, :end_event,:user_id,:meeting_with)
 ";
 $statement = $db->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end'],
   ':user_id' => $_POST['user_id'],
   ':meeting_with' => $_GET['meeting_with']
  )
 );
}


?>