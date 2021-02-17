<?php
include("../../config.php");
include('../../addressClass.php');
include('../../../session.php');
$userDetails=$userClass->userDetails($session_uid);
$addressClass = new addressClass();
if($_SERVER['REQUEST_METHOD']=='POST'){
    
        $client_id= $_POST['client_id'];
        $company_id= $_POST['company_id'];
        $salutation =  $_POST['salutation'];
        $entry_date =  $_POST['entry_date'];
        $first_name =  $_POST['first_name'];
        $name =  $_POST['name'];
        $company =  $_POST['company'];
        $company_additional =  $_POST['company_additional'];
        $street =  $_POST['street'];
        $city =  $_POST['city'];
        $country =  $_POST['country'];
        $zip =  $_POST['zip'];
        $telefon1 =  $_POST['telefon1'];
        $telefon2 =  $_POST['telefon2'];
        $mobile =  $_POST['mobile'];
        $fax_no =  $_POST['fax_no'];
        $birthdate =  $_POST['birthdate'];
        $salutation2 =  $_POST['salutation2']; 
        $first_name2 =  $_POST['first_name2'];
        $last_name2 =  $_POST['last_name2'];
        $birthdate2 =  $_POST['birthdate2'];
        $employer =  $_POST['employer'];
        $job_title =  $_POST['job_title'];
        $position =  $_POST['position'];
        $salary =  $_POST['salary'];
        $employment =  $_POST['employment'];
        $Email1 =  $_POST['Email1'];
        $Email2 =  $_POST['Email2'];
        $Homepage =  $_POST['Homepage'];
        $contact_salutation=  $_POST['contact_salutation'];
        $Last_Contact=  $_POST['Last_Contact'];
        //$name=$_FILES['photo']['name'];
        $Customer_logo =  $_FILES['Customer_logo']['name'];
        $Preferred_form_of =  $_POST['Preferred_form_of'];
        $contact_Entry_Date =  $_POST['contact_Entry_Date']; 
        $Status =  $_POST['Status'];
        $Agent =  $_POST['Agent'];
        $Type_of_contract =  $_POST['Type_of_contract'];
        $Last_action =  $_POST['Last_action'];
        $Contact_source =  $_POST['Contact_source'];
        $Lead =  $_POST['Lead'];
        $Newsletter =  $_POST['Newsletter'];
      
        $Customer_since =  $_POST['Customer_since'];
        
        if( empty($_POST["Terms_accepted"]) ) {  $Terms_accepted="0";}
        else {  $Terms_accepted=  "1"; }
      
        if( empty($_POST["Accepted_recall"]) ) {  $Accepted_recall="0";}
        else {  $Accepted_recall=  "1"; }
            
        if( empty($_POST["Vip_contact"]) ) {  $Vip_contact="0";}
        else {  $Vip_contact=  "1"; }
      
        $warning_msg=  $_POST['warning_msg'];
        $Save_until_date =  $_POST['Save_until_date'];
        $Save_until_reason =  $_POST['Save_until_reason'];
        $GDPR_status =  $_POST['GDPR_status'];
        $main_contact=$_POST['main_contact'];
        $second_contact=$_POST['second_contact'];

        $temp=$_FILES['Customer_logo']['tmp_name'];
        move_uploaded_file($temp,"../../../onoffice/address/images/".$Customer_logo);

            $address_basic_data_id=$addressClass->addressBasicDataInsert($client_id,$company_id,$session_uid, $salutation, $entry_date, $first_name,
        $name, $company, $company_additional, $street, $zip, $city, $country, $telefon1, 
        $telefon2, $mobile, $fax_no, $birthdate, $salutation2,$first_name2, $last_name2, 
        $birthdate2, $employer, $job_title, $position, $salary, $employment, $Email1, $Email2, 
        $Homepage, $contact_salutation, $Last_Contact, $Customer_logo, $Preferred_form_of, 
        $contact_Entry_Date,$Status,$Agent, $Type_of_contract, $Last_action, $Contact_source,
        $Lead, $Newsletter, $Terms_accepted, $Accepted_recall, $Customer_since, $Vip_contact,
        $warning_msg, $Save_until_date, $Save_until_reason, $GDPR_status,$main_contact,$second_contact);

        
    if($address_basic_data_id)
    {
        //echo $address_basic_data_id;
       echo "<script>alert('Address Basic Data saved successfully');</script>";
       echo "<script>window.location = '../../../onoffice/address';</script>";;
    }
    else
    {
        echo "<script>alert('Error Occured try again ..');</script>";
        echo "<script>window.location = '../../../onoffice/address/createAddress.php';</script>";;
     
    }
    }

?>