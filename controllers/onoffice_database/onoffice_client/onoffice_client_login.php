<?php 
include("../../config.php");
include('../../userClass.php');
include('../../teamproquserClass.php');
$userClass = new userClass();
$teamproquserClass = new teamproquserClass();

$errorMsgReg='';
$errorMsgLogin='';

if($_SERVER['REQUEST_METHOD']=='POST')
{

$usernameEmail=$_POST['mail'];
$password=$_POST['password'];
 if(strlen(trim($usernameEmail))>1 && strlen(trim($password))>1 )
   {
   
    $uid=$userClass->userLogin($usernameEmail,$password);
    $tuid=$teamproquserClass->userLogin($usernameEmail,$password);
   // $cid=$companyClass->companyLogin($usernameEmail,$password);
    if($uid)
    {
        if($tuid)
        {
          
            echo "<script>alert('Login successful');</script>";
            echo "<script>window.location = '../../../teamproq/dashboard/dashboard.php';</script>";;
        }else{
            echo "<script>alert('Login successful');</script>";
            echo "<script>window.location = '../../../onoffice/dashboard/dashboard.php';</script>";;
        }
        
    }
    
    else
    {
      
        echo "<script>alert('Please check login details.');</script>";
        echo "<script>window.location = '../../../signin.php';</script>";;
    }
   
   }
}
?>