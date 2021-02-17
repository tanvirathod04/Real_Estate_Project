<?php
include("../../config.php");
include('../../../session.php');
include('../../todoClass.php');
$todoClass=new todoClass();
$userDetails=$userClass->userDetails($session_uid);
$company_id = $userDetails->company_id;
$todo_id = $_REQUEST['todo_id'];
$visible=1;
if(!empty($_POST['users_id'])) {
    
            foreach($_POST['users_id'] as $value){
               // echo "value : ".$value.'<br/>';
                $userD=$userClass->userDetails($value);
                $getAssignTodoUsers=$todoClass->getAssignTodoUser($todo_id);
                if($getAssignTodoUsers){
                    echo"<script>alert('User is been assigned already')</script>";
                    //echo "<script>window.location = '../../../onoffice/todo/';</script>";
                }else{
                    $todo_id=$todoClass->assignTodoUser($todo_id,$value,$userD->first_name,$visible,$session_uid); 
                    echo"<script>alert('User assigned successfully')</script>";
                    //echo "<script>window.location = '../../../onoffice/todo/';</script>";      
                }
            }
        } else{
            echo"<script>alert('No User found')</script>";
            //echo "<script>window.location = '../../../onoffice/todo/';</script>";
        }       
?>