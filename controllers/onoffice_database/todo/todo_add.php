<?php
include("../../config.php");
include('../../../session.php');
include('../../todoClass.php');
$todoClass=new todoClass();
$userDetails=$userClass->userDetails($session_uid);
$title = $_REQUEST['title'];
$content = $_REQUEST['content'];
$itemTemplate = $_REQUEST['itemTemplate'];
$todo_type_complete = $_REQUEST['todo_type_complete'];
$todo_type_inprogress = $_REQUEST['todo_type_inprogress'];
$type_todo;

$company_id = $userDetails->company_id;
if($itemTemplate){
$type_todo=$itemTemplate;
}else if($todo_type_complete){
    $type_todo=$todo_type_complete;
}else{
    $type_todo=$todo_type_inprogress;
}

$todo_id=$todoClass->addTodo($company_id,$session_uid,$title,$content,$type_todo);

if($todo_id)
{
    echo "Added Successfully";
  // echo "<script>alert('Immosuche Added');</script>";
   //echo "<script>window.location = '../../../onoffice/address/';</script>";;
}
else
{
    echo "<script>alert('Error Occured try again ..');</script>";
   //echo "<script>window.location = '../../../onoffice/address/';</script>";;
 
}
//echo 'title- '.$title . ', content- ' . $content.'comapny- '.$company_id . ', user_id- ' . $session_uid;     
?>