<?php

//add_comment.php
include("../../controllers/config.php");
$db = getDB();
$//connect = new PDO('mysql:host=localhost;dbname=realestate', 'root', '');

$error = '';
$comment_name = '';
$comment_content = '';
$card_id=$_POST["card_id"];

if(empty($_POST["comment_name"]))
{
 $error .= '<p class="text-danger">Name is required</p>';
}
else
{
 $comment_name = $_POST["comment_name"];
}

if(empty($_POST["comment_content"]))
{
 $error .= '<p class="text-danger">Comment is required</p>';
}
else
{
 $comment_content = $_POST["comment_content"];
}

if($error == '')
{
 $query = "
 INSERT INTO comments 
 (parent_comment_id, comment, comment_sender_name,card_id) 
 VALUES (:parent_comment_id, :comment, :comment_sender_name,:card_id)
 ";
 $statement = $db->prepare($query);
 $statement->execute(
  array(
   ':parent_comment_id' => $_POST["comment_id"],
   ':comment'    => $comment_content,
   ':card_id'    => $card_id,
   ':comment_sender_name' => $comment_name
  )
 );
 $error = '<label class="text-success">Comment Added</label>';
}

$data = array(
 'error'  => $error
);

echo json_encode($data);

?>
