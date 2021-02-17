<?php
include("../../config.php");
include('../../addressClass.php');
include('../../../session.php');

$userDetails=$userClass->userDetails($session_uid);
$addressClass = new addressClass();

if($_SERVER['REQUEST_METHOD']=='POST'){
    $address_id = $_POST['id'];
    //`name`, `mode`, `filter`, `status`, `status2`, `no_of_datasets`, `display_above`,
    // `hide_contacted_interested_parties`, `only_show_int_par`, `hide_rejections`, `hide_links`
       $name=$_POST['name'];
       $mode=$_POST['mode'];
       $filter=$_POST['filter'];
       $status=$_POST['status'];
       $status2=$_POST['status2'];
       $no_of_datasets=$_POST['no_of_datasets'];
       $display_above=$_POST['display_above'];
             
       if( empty($_POST["Bereits"]) ) {  $Bereits="0";}
       else {  $Bereits="1"; }
      

       if( empty($_POST["Nur"]) ) {  $Nur="0";}
       else {  $Nur="1"; }
                   
        $address_id=$addressClass->propertyBuyerInsert($address_id, 
        $name, $mode, $filter, $status, $status2, $no_of_datasets, $display_above,$Bereits,$Nur);
   
        if($address_id)
        {
            //echo $address_basic_data_id1;
           echo "<script>alert('Immosuche Added');</script>";
           echo "<script>window.location = '../../../onoffice/address/';</script>";;
        }
        else
        {
            echo "<script>alert('Error Occured try again ..');</script>";
           echo "<script>window.location = '../../../onoffice/address/';</script>";;
         
        }
        }
?>