<?php
include("../../config.php");
include('../../addressClass.php');
include('../../../session.php');
$userDetails=$userClass->userDetails($session_uid);
$addressClass = new addressClass();

    $address_basic_data_id = $_GET['id'];
    $address_basic_data_id1=$addressClass->addressBasicDataDelete($address_basic_data_id);

        
    if($address_basic_data_id1)
    {
       
       echo "<script>alert('Address Deleted successfully');</script>";
       echo "<script>window.location = '../../../onoffice/address/';</script>";;
    }
    else
    {
        echo "<script>alert('Error Occured try again ..');</script>";
        echo "<script>window.location = '../../../onoffice/address/';</script>";;
     
    }
    

?>