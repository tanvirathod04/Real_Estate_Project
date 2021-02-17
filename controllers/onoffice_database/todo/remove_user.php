<?php
include("../../config.php");
include('../../../session.php');
include('../../todoClass.php');
$todoClass=new todoClass();
$userDetails=$userClass->userDetails($session_uid);
$id = $_GET['id'];

$todo_id=$todoClass->removeTodoUser($id);
if($todo_id)
{
  
  echo "<script>alert('User removed successfully');</script>";
  echo "<script>window.location = '../../../onoffice/todo';</script>";;
}
else
{
    echo "<script>alert('Error Occured try again ..');</script>";
    echo "<script>window.location = '../../../onoffice/todo';</script>";;
 
}     
?>