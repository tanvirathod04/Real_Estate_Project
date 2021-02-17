<?php
include("../../config.php");
include('../../propertyClass.php');
include('../../../session.php');
$userDetails=$userClass->userDetails($session_uid);
$propertyClass = new propertyClass();

    $property_basic_data_id = $_GET['id'];
    $property_basic_data_id1=$propertyClass->propertyBasicDataDelete($property_basic_data_id);

        
    if($property_basic_data_id1)
    {
      
       echo "<script>alert('Property Deleted successfully');</script>";
       echo "<script>window.location = '../../../onoffice/property/';</script>";;
    }
    else
    {
        echo "<script>alert('Error Occured try again ..');</script>";
        echo "<script>window.location = '../../../onoffice/property/';</script>";;
     
    }
    

?>