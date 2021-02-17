 <?php
if(!empty($_SESSION['uid']))
{
$session_uid=$_SESSION['uid'];
include('controllers/userClass.php');
$userClass = new userClass();
}/*if(!empty($_SESSION['teamproquid'])){
    $teamproqsession_uid=$_SESSION['teamproquid'];
    include('controllers/teamproquserClass.php');
    $teamproquserClass = new teamproquserClass();
}*/

if(empty($session_uid))
{/*
$url='index.php';
header("Location: $url");*/
}


?>