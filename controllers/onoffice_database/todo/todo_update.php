<?php
include("../../config.php");
include('../../../session.php');
include('../../todoClass.php');
$todoClass=new todoClass();
$userDetails=$userClass->userDetails($session_uid);
$id = $_REQUEST['id'];
$type_todo = $_REQUEST['type_todo'];
$company_id = $userDetails->company_id;

$todo_id=$todoClass->updateTodo($company_id,$session_uid,$id,$type_todo);

if($todo_id)
{
  // echo "<script>alert('Immosuche Added');</script>";
   //echo "<script>window.location = '../../../onoffice/address/';</script>";;
   echo "<script>window.location = '../../../onoffice/todo';</script>";;
}
else
{
    echo "<script>alert('Error Occured try again ..');</script>";
   //echo "<script>window.location = '../../../onoffice/address/';</script>";;
 
}
//echo 'title- '.$title . ', content- ' . $content.'comapny- '.$company_id . ', user_id- ' . $session_uid;     
?>