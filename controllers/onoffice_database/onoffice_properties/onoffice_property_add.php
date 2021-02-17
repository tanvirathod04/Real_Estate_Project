<?php
include("../../config.php");
include('../../propertyClass.php');
include('../../../session.php');
$userDetails=$userClass->userDetails($session_uid);
$propertyClass = new propertyClass();
if($_SERVER['REQUEST_METHOD']=='POST'){
    $company_id= $_POST['company_id'];
        $Data_Record_Ref_No= $_POST['Data_Record_Ref_No'];
        $property_image =  $_FILES['property_image']['name'];
        $temp=$_FILES['property_image']['tmp_name'];
        move_uploaded_file($temp,"../../../onoffice/property/images/".$property_image);
        $Status= $_POST['Status'];;
        $Property_External= $_POST['Property_External'];;
        $Agent= $_POST['Agent'];;
        $Type_of_order= $_POST['Type_of_order'];;
        $Order_Until= $_POST['Order_Until'];;
        $Sold_on= $_POST['Sold_on'];;
        $last_action= $_POST['last_action'];;
        $status2= $_POST['status2'];;
        $property_title= $_POST['property_title'];;
        $street= $_POST['street'];;
        $house_no= $_POST['house_no'];;
        $postal_code= $_POST['postal_code'];;
        $town= $_POST['town'];;
     
        $country= $_POST['country'];;
        $Property_class= $_POST['Property_class'];;
        $Property_type= $_POST['Property_type'];;
        $type_of_usage= $_POST['type_of_usage'];;
        $marketing_method= $_POST['marketing_method'];;


      /*  echo $Data_Record_Ref_No,$session_uid,
        $property_image,$Status,$Property_External,$Agent,$Type_of_order,$Order_Until,
        $Sold_on, $last_action, $status2,$property_title,$street,$house_no,$postal_code,$town,
        $country,$Property_class,$Property_type,$type_of_usage,$marketing_method;*/

        $property_basic_data_id=$propertyClass->propertyBasicDataInsert($company_id,$Data_Record_Ref_No,$session_uid,
        $property_image,$Status,$Property_External,$Agent,$Type_of_order,$Order_Until,
        $Sold_on, $last_action, $status2,$property_title,$street,$house_no,$postal_code,$town,
        $country,$Property_class,$Property_type,$type_of_usage,$marketing_method);

              
    if($property_basic_data_id)
    {
        //echo $address_basic_data_id;
       echo "<script>alert('Property Basic Data saved successfully');</script>";
       echo "<script>window.location = '../../../onoffice/property/';</script>";;
    }
    else
    {
        echo "<script>alert('Error Occured try again ..');</script>";
        echo "<script>window.location = '../../../onoffice/property/';</script>";;
     
    }
}

?>