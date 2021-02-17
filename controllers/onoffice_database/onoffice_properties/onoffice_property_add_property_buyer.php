<?php
include("../../config.php");
include('../../propertyClass.php');
include('../../../session.php');

$userDetails=$userClass->userDetails($session_uid);
$propertyClass = new propertyClass();

if($_SERVER['REQUEST_METHOD']=='POST'){
    $property_basic_data_id = $_POST['id'];
    //`name`, `mode`, `filter`, `status`, `status2`, `no_of_datasets`, `display_above`,
    // `hide_contacted_interested_parties`, `only_show_int_par`, `hide_rejections`, `hide_links`
       $name=$_POST['name'];
       $mode=$_POST['mode'];
       $filter=$_POST['filter'];
       $status=$_POST['status'];
       $status2=$_POST['status2'];
       $no_of_datasets=$_POST['no_of_datasets'];
       $display_above=$_POST['display_above'];
             
       if( empty($_POST["hide_contacted_interested_parties"]) ) {  $hide_contacted_interested_parties="0";}
       else {  $hide_contacted_interested_parties="1"; }
      

       if( empty($_POST["only_show_int_par"]) ) {  $only_show_int_par="0";}
       else {  $only_show_int_par="1"; }
      
       if( empty($_POST["hide_rejections"]) ) {  $hide_rejections="0";}
       else {  $hide_rejections="1"; }
      
       if( empty($_POST["hide_links"]) ) {  $hide_links="0";}
       else {  $hide_links="1"; }
             
        $property_basic_data_id=$propertyClass->propertyBuyerInsert($property_basic_data_id, 
        $name, $mode, $filter, $status, $status2, $no_of_datasets, $display_above,
        $hide_contacted_interested_parties, $only_show_int_par, $hide_rejections, $hide_links);
   
        if($property_basic_data_id)
        {
            //echo $address_basic_data_id1;
           echo "<script>alert('Property Buyer Added');</script>";
           echo "<script>window.location = '../../../onoffice/property/';</script>";;
        }
        else
        {
            echo "<script>alert('Error Occured try again ..');</script>";
           echo "<script>window.location = '../../../onoffice/property/';</script>";;
         
        }
        }
?>