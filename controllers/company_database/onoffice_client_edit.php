<?php 
include("../config.php");
include('../companyClass.php');
$companyClass = new companyClass();

$errorMsgReg='';
$errorMsgLogin='';

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $company_id= $_POST['company_id'];
    $FileUpload1 =  $_FILES['FileUpload1']['name'];
    $temp=$_FILES['FileUpload1']['tmp_name'];
    move_uploaded_file($temp,"../../images/".$FileUpload1);
    $cid=$companyClass->profileUpdate($company_id,$FileUpload1);

    if($cid)
    {
        //echo $address_basic_data_id1;
       echo "<script>alert('Profile Changed');</script>";
       echo "<script>window.location = '../../onoffice/dashboard/company_profile.php';</script>";;
    }
    else
    {
        echo "<script>alert('Error Occured try again ..');</script>";
       echo "<script>window.location = '../../onoffice/dashboard/company_profile.php';</script>";;
     
    }
}
?>