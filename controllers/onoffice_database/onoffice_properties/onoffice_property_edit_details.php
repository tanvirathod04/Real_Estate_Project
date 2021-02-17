<?php
include("../../config.php");
include('../../propertyClass.php');
include('../../../session.php');

$userDetails=$userClass->userDetails($session_uid);
$propertyClass = new propertyClass();

if($_SERVER['REQUEST_METHOD']=='POST'){
    $property_basic_data_id = $_POST['id'];
   
    $energy_performance=$_POST['energy_performance'];
    $energy_pass_valid=$_POST['energy_pass_valid'];
    $energy_cerrificate=$_POST['energy_cerrificate'];
   
    $year_of_construction=$_POST['Year_of_construction'];
    $main_fuel_type=$_POST['main_fuel_type'];
    $dist_kindergarten=$_POST['dist_kindergarten'];
    $dist_to_primary_schools=$_POST['dist_to_primary_schools'];
    $dist_high_school=$_POST['dist_high_school'];
     $dist_highway=$_POST['dist_highway'];
      $dist_to_downtown=$_POST['dist_to_downtown'];
      $avail_from=$_POST['avail_from']; 
    
     $Beaconing=$_POST['Beaconing']; 
     $Heating=$_POST['Heating']; 
     $Number_of_Floors=$_POST['Number_of_Floors'];
      $Parking=$_POST['Parking'];
      $conditions=$_POST['conditions'];
       $Pets=$_POST['Pets'];
       
       if( empty($_POST["Balkon"]) ) {  $Balkon="0";}
       else {  $Balkon="1"; }
       if( empty($_POST["Terrasse"]) ) {  $Terrasse="0";}
       else {  $Terrasse="1"; }
       if( empty($_POST["Wintergarten"]) ) {  $Wintergarten="0";}
       else {  $Wintergarten="1"; }

       if( empty($_POST["cable_satellite_TV"]) ) {  $cable_satellite_TV="0";}
       else {  $cable_satellite_TV="1"; }
      

       if( empty($_POST["hot_water_included"]) ) {  $hot_water_included="0";}
       else {  $hot_water_included="1"; }
      
       if( empty($_POST["commercial_use"]) ) {  $commercial_use="0";}
       else {  $commercial_use="1"; }
      
       if( empty($_POST["rented"]) ) {  $rented="0";}
       else {  $rented="1"; }
      
       if( empty($_POST["listed_building"]) ) {  $listed_building="0";}
       else {  $listed_building="1"; }
            
       
        
        $property_basic_data_id=$propertyClass->propertyDetailsUpdate($property_basic_data_id,$session_uid, 
        $cable_satellite_TV, $energy_performance, $energy_pass_valid, $energy_cerrificate, 
        $hot_water_included, $year_of_construction, $main_fuel_type, $dist_kindergarten, $dist_to_primary_schools,
        $dist_high_school, $dist_highway, $dist_to_downtown, $avail_from, $commercial_use, $rented, 
        $listed_building, $Beaconing, $Heating, $Number_of_Floors, $Parking, $conditions, $Pets,$Balkon,$Terrasse,$Wintergarten);
   
        if($property_basic_data_id)
        {
            //echo $address_basic_data_id1;
           echo "<script>alert('Property Details Updated');</script>";
           echo "<script>window.location = '../../../onoffice/property';</script>";;
        }
        else
        {
            echo "<script>alert('Error Occured try again ..');</script>";
           echo "<script>window.location = '../../../onoffice/property';</script>";;
         
        }
        }
?>