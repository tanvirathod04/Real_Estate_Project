<?php
include("../../config.php");
include('../../propertyClass.php');
include('../../../session.php');

$userDetails=$userClass->userDetails($session_uid);
$propertyClass = new propertyClass();

if($_SERVER['REQUEST_METHOD']=='POST'){
    $property_basic_data_id = $_POST['id'];
    $description= $_POST['description'];
    $location= $_POST['location'];;
    $equipment_description= $_POST['equipment_description'];;
    $miscellaneous= $_POST['miscellaneous'];;
        
        $property_free_text_id=$propertyClass->propertyFileTextDataUpdate($property_basic_data_id,$session_uid, 
        $description,$location,$equipment_description,$miscellaneous);
   
        if($property_basic_data_id)
        {
            //echo $address_basic_data_id1;
           echo "<script>alert('Property Free Text Updates');</script>";
           echo "<script>window.location = '../../../onoffice/property/';</script>";;
        }
        else
        {
            echo "<script>alert('Error Occured try again ..');</script>";
           echo "<script>window.location = '../../../onoffice/property/';</script>";;
         
        }
        }
?>