<?php 
include("../../config.php");
include('../../userClass.php');
include('../../companyClass.php');
$userClass = new userClass();
$companyClass = new companyClass();

$errorMsgReg='';
$errorMsgLogin='';

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $user_id= $_POST['user_id'];
    $FileUpload1 =  $_FILES['FileUpload1']['name'];
    $temp=$_FILES['FileUpload1']['tmp_name'];
    move_uploaded_file($temp,"../../../images/".$FileUpload1);
    $user_id1=$userClass->profileUpdate($user_id,$FileUpload1);

    if($user_id1)
    {
        //echo $address_basic_data_id1;
       echo "<script>alert('Profile Changed');</script>";
       echo "<script>window.location = '../../../onoffice/dashboard/profile.php';</script>";;
    }
    else
    {
        echo "<script>alert('Error Occured try again ..');</script>";
       echo "<script>window.location = '../../../onoffice/dashboard/profile.php';</script>";;
     
    }
}
?>