<?php
include("../../config.php");
include('../../propertyClass.php');
include('../../addressClass.php');
include('../../../session.php');
$userDetails=$userClass->userDetails($session_uid);
$propertyClass = new propertyClass();
$addressClass = new addressClass();

if($_SERVER['REQUEST_METHOD']=='POST'){  
    $id =  $_POST['property_id'];
    $relation =  $_POST['relation'];
    $user_email =  $_POST['user-email'];
    $user_name =  $_POST['user-name'];
    if($user_email || $user_name){
        $address_data=$addressClass->getClientNo($user_email,$user_name);
       if($relation == 'owner'){
        if($address_data->client_no){
         $property_assign_address_id=$propertyClass->propertyAddressOwnerAssign($id,$address_data->client_no);
         echo "<script>alert('Owner Assigned Successfully');</script>";
         echo "<script> window.history.back();</script>";
        }
       }else{
        if($address_data->client_no){
            $property_assign_address_id=$propertyClass->propertyAddressContactPersonAssign($id,$address_data->client_no);
            echo "<script>alert('Contact Person Assigned Successfully');</script>";
            echo "<script> window.history.back();</script>";
           }  
       }
    }else{
        echo "<script>alert('Please enter address name or email');</script>";
        echo "<script> window.history.back();</script>";
    }
}