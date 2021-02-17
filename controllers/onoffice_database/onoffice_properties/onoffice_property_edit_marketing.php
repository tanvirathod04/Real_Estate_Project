<?php
include("../../config.php");
include('../../propertyClass.php');
include('../../../session.php');

$userDetails=$userClass->userDetails($session_uid);
$propertyClass = new propertyClass();

if($_SERVER['REQUEST_METHOD']=='POST'){
    $property_basic_data_id = $_POST['id'];
    $status2_nach_dem = $_POST['status2_nach_dem'];
    $permanantly_in_rotation = $_POST['permanantly_in_rotation'];
    $fictitional_price = $_POST['fictitional_price'];
    $portals_website_api = $_POST['portals_website_api'];
    $word_brochure_email = $_POST['word_brochure_email'];
    $pdf_brochure = $_POST['pdf_brochure'];
    $owner_addr_in_pdf = $_POST['owner_addr_in_pdf'];
    $marketing_status = $_POST['marketing_status'];
    $public = $_POST['public'];
    $publish = $_POST['publish'];
  
       if( empty($_POST["archive_property"]) ) {  $archive_property="0";}
       else {  $archive_property="1"; }
       if( empty($_POST["fictional_address_active"]) ) {  $fictional_address_active="0";}
       else {  $fictional_address_active="1"; }
       if( empty($_POST["fictional_price_active"]) ) {  $fictional_price_active="0";}
       else {  $fictional_price_active="1"; }  
       if( empty($_POST["exclusive"]) ) {  $exclusive="0";}
       else {  $exclusive="1"; }
       if( empty($_POST["top_offer"]) ) {  $top_offer="0";}
       else {  $top_offer="1"; }
       if( empty($_POST["google_maps"]) ) {  $google_maps="0";}
       else {  $google_maps="1"; }
       if( empty($_POST["new"]) ) {  $new="0";}
       else {  $new="1"; }
       if( empty($_POST["pricereduction"]) ) {  $pricereduction="0";}
       else {  $pricereduction="1"; }
       if( empty($_POST["reference"]) ) {  $reference="0";}
       else {  $reference="1"; }
       if( empty($_POST["free_of_commission"]) ) {  $free_of_commission="0";}
       else {  $free_of_commission="1"; }
       if( empty($_POST["property_of_the_day"]) ) {  $property_of_the_day="0";}
       else {  $property_of_the_day="1"; }
           /* echo $archive_property, $status2_nach_dem, $permanantly_in_rotation, 
            $fictional_address_active, $fictional_price_active, 
            $fictitional_price, $portals_website_api, $word_brochure_email, 
            $pdf_brochure, $owner_addr_in_pdf, $marketing_status, $public,
             $exclusive, $top_offer, $google_maps,
             $new, $pricereduction, $reference, $free_of_commission, 
             $property_of_the_day, $publish;*/
       
        
        $property_basic_data_id=$propertyClass->propertyMarketingUpdate($property_basic_data_id,$session_uid, 
        $archive_property, $status2_nach_dem, $permanantly_in_rotation, 
        $fictional_address_active, $fictional_price_active, 
        $fictitional_price, $portals_website_api, $word_brochure_email, 
        $pdf_brochure, $owner_addr_in_pdf, $marketing_status, $public,
         $exclusive, $top_offer, $google_maps,
         $new, $pricereduction, $reference, $free_of_commission, 
         $property_of_the_day, $publish);
   
        if($property_basic_data_id)
        {
            //echo $address_basic_data_id1;
           echo "<script>alert('Property Marketing Data Updated');</script>";
           echo "<script>window.location = '../../../onoffice/property/';</script>";;
        }
        else
        {
            echo "<script>alert('Error Occured try again ..');</script>";
           echo "<script>window.location = '../../../onoffice/property/';</script>";;
         
        }
        }
?>