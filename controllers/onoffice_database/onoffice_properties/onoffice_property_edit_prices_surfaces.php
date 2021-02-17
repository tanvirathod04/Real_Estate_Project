<?php
include("../../config.php");
include('../../propertyClass.php');
include('../../../session.php');

$userDetails=$userClass->userDetails($session_uid);
$propertyClass = new propertyClass();

if($_SERVER['REQUEST_METHOD']=='POST'){
    $property_basic_data_id = $_POST['id'];
    $currency= $_POST['currency'];
    $external_commission= $_POST['external_commission'];
    $internal_commission= $_POST['internal_commission'];
    $plus_VAT_to_provision= $_POST['plus_VAT_to_provision'];
    $usable_area= $_POST['usable_area'];
    $purchase_price= $_POST['purchase_price'];
    $living_area= $_POST['living_area'];
    $number_of_rooms= $_POST['number_of_rooms'];
    $number_of_bedrooms= $_POST['number_of_bedrooms'];
    $number_of_bathrooms= $_POST['number_of_bathrooms'];
    $plot_surface= $_POST['plot_surface'];
    $number_of_toilets= $_POST['number_of_toilets'];
  

        $property_basic_data_id=$propertyClass->propertyPrices_Surfaces_update($property_basic_data_id,$session_uid,$currency,$external_commission,$internal_commission,
        $plus_VAT_to_provision,$usable_area,$purchase_price,$living_area,$number_of_rooms,$number_of_bedrooms, 
       $number_of_bathrooms,$plot_surface, $number_of_toilets,);

        
    if($property_basic_data_id)
    {
        //echo $address_basic_data_id1;
       echo "<script>alert('Property Prices/Surfaces Updates');</script>";
       echo "<script>window.location = '../../../onoffice/property/';</script>";;
    }
    else
    {
        echo "<script>alert('Error Occured try again ..');</script>";
       echo "<script>window.location = '../../../onoffice/property/';</script>";;
     
    }
    }

?>