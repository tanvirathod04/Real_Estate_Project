<?php
class addressClass
{

 

  public function propertyBuyerInsert($address_id, 
  $name, $mode, $filter, $status, $status2, $no_of_datasets, $display_above,$Bereits,$Nur){
   try{
     $db = getDB();
     
     $stmt = $db->prepare("INSERT INTO `onoffice_address_property_serach`(`onoffice_address_id`, `name`, `mode`, `filter`, `status`, `status2`, `no_of_datasets`, `display_above`, `hide_already_offered`, `only_show_own`) 
     VALUES (:onoffice_address_id,:name,:mode,:filter,:status,:status2,:no_of_datasets,:display_above,:hide_already_offered,:only_show_own)");
        $stmt->bindParam("onoffice_address_id", $address_id,PDO::PARAM_INT) ;
        $stmt->bindParam("name", $name,PDO::PARAM_STR) ;
        $stmt->bindParam("mode", $mode,PDO::PARAM_STR) ;
        $stmt->bindParam("filter", $filter,PDO::PARAM_STR) ;
        $stmt->bindParam("status", $status,PDO::PARAM_STR) ;
        $stmt->bindParam("status2", $status2,PDO::PARAM_STR) ;
        $stmt->bindParam("no_of_datasets", $no_of_datasets,PDO::PARAM_STR) ; 
        $stmt->bindParam("display_above", $display_above,PDO::PARAM_STR) ;
       
        $stmt->bindParam("hide_already_offered", $Bereits,PDO::PARAM_INT) ;
        $stmt->bindParam("only_show_own", $Nur,PDO::PARAM_INT) ;

     $stmt->execute();
     //$stmt->debugDumpParams();
     
     $address_id=$db->lastInsertId();
     $db = null;
      return true;
   } 
     catch(PDOException $e) {
     echo '{"error":{"text":'. $e->getMessage() .'}}'; 
     }
 }

/*Get Client No.*/
  public  function getClientNo($user_email,$user_name){
    try{
      $db = getDB();
      $stmt = $db->prepare("SELECT `client_no` FROM `onoffice_address` WHERE name=:name OR Email1=:email");  
     $stmt->bindParam("name", $user_name,PDO::PARAM_STR);
     $stmt->bindParam("email", $user_email,PDO::PARAM_STR);
     $stmt->execute();
     $data = $stmt->fetch(PDO::FETCH_OBJ);
     $db = null;
     return $data;
    } catch(PDOException $e) {
      echo '{"error":{"text":'. $e->getMessage() .'}}'; 
      }
  }

  /*Update Address Basic Data*/
  public function addressBasicDataUpdate($id,$user_id, $salutation, $entry_date, $first_name,
  $name, $company, $company_additional, $street, $zip, $city, $country, $telefon1, 
  $telefon2, $mobile, $fax_no, $birthdate, $salutation2,$first_name2, $last_name2, 
  $birthdate2, $employer, $job_title, $position, $salary, $employment, $Email1, $Email2, 
  $Homepage, $contact_salutation, $Last_Contact,$Preferred_form_of, 
  $contact_Entry_Date,$Status,$Agent, $Type_of_contract, $Last_action, $Contact_source,
  $Lead, $Newsletter, $Terms_accepted, $Accepted_recall, $Customer_since, $Vip_contact,
  $warning_msg, $Save_until_date, $Save_until_reason, $GDPR_status,$main_contact,$second_contact){
    try{
      $db = getDB();
     
      $stmt = $db->prepare("UPDATE `onoffice_address` SET `salutation`=:salutation,
      `entry_date`=:entry_date,`first_name`=:first_name,`name`=:name,`company`=:company,
      `company_additional`=:company_additional,`street`=:street,`zip`=:zip,
      `city`=:city,`country`=:country,`telefon1`=:telefon1,`telefon2`=:telefon2,
      `mobile`=:mobile,`fax_no`=:fax_no,`birthdate`=:birthdate,`salutation2`=:salutation2,
      `first_name2`=:first_name2,`last_name2`=:last_name2,`birthdate2`=:birthdate2,
      `employer`=:employer,`job_title`=:job_title,`position`=:position,`salary`=:salary,
      `employment`=:employment,`Email1`=:Email1,`Email2`=:Email2,`Homepage`=:Homepage,
      `contact_salutation`=:contact_salutation,`Last_Contact`=:Last_Contact,
      `Preferred_form_of`=:Preferred_form_of,`contact_Entry_Date`=:contact_Entry_Date,`Status`=:Status,
      `Agent`=:Agent,`Type_of_contract`=:Type_of_contract,`Last_action`=:Last_action,
      `Contact_source`=:Contact_source,`Lead`=:Lead,`Newsletter`=:Newsletter,
      `Terms_accepted`=:Terms_accepted,`Accepted_recall`=:Accepted_recall,`Customer_since`=:Customer_since,
      `Vip_contact`=:Vip_contact,`warning_msg`=:warning_msg,`Save_until_date`=:Save_until_date,
      `Save_until_reason`=:Save_until_reason,`GDPR_status`=:GDPR_status,`main_contact`=:main_contact,`second_contact`=:second_contact WHERE user_id=:user_id AND id=:id");
        
        $stmt->bindParam("id", $id,PDO::PARAM_INT) ;
        $stmt->bindParam("user_id", $user_id,PDO::PARAM_INT) ;
        $stmt->bindParam("salutation", $salutation,PDO::PARAM_STR) ;
        $stmt->bindParam("entry_date", $entry_date,PDO::PARAM_STR) ;
        $stmt->bindParam("first_name", $first_name,PDO::PARAM_STR) ;
        $stmt->bindParam("name", $name,PDO::PARAM_STR) ;
        $stmt->bindParam("company", $company,PDO::PARAM_STR) ;
        $stmt->bindParam("company_additional", $company_additional,PDO::PARAM_STR) ;
        $stmt->bindParam("street", $street,PDO::PARAM_STR) ;
        $stmt->bindParam("zip", $zip,PDO::PARAM_STR) ;
        $stmt->bindParam("city", $city,PDO::PARAM_STR) ;
        $stmt->bindParam("country", $country,PDO::PARAM_STR) ;
        $stmt->bindParam("telefon1", $telefon1,PDO::PARAM_STR) ;
        $stmt->bindParam("telefon2", $telefon2,PDO::PARAM_STR) ;
        $stmt->bindParam("mobile", $mobile,PDO::PARAM_STR) ;
         $stmt->bindParam("fax_no", $fax_no,PDO::PARAM_STR) ;
        $stmt->bindParam("birthdate", $birthdate,PDO::PARAM_STR) ;
        $stmt->bindParam("salutation2", $salutation2,PDO::PARAM_STR) ;
        $stmt->bindParam("first_name2", $first_name2,PDO::PARAM_STR) ;

        $stmt->bindParam("last_name2", $last_name2,PDO::PARAM_STR) ;
        $stmt->bindParam("birthdate2", $birthdate2,PDO::PARAM_STR) ;
        $stmt->bindParam("employer", $employer,PDO::PARAM_STR) ;
        $stmt->bindParam("job_title", $job_title,PDO::PARAM_STR) ;
        $stmt->bindParam("position", $position,PDO::PARAM_STR) ;
        $stmt->bindParam("salary", $salary,PDO::PARAM_STR) ;
        $stmt->bindParam("employment", $employment,PDO::PARAM_STR) ;
        $stmt->bindParam("Email1", $Email1,PDO::PARAM_STR);
       
        $stmt->bindParam("Email2", $Email2,PDO::PARAM_STR) ;
        $stmt->bindParam("Homepage", $Homepage,PDO::PARAM_STR) ;
        $stmt->bindParam("contact_salutation", $contact_salutation,PDO::PARAM_STR) ;
        $stmt->bindParam("Last_Contact", $Last_Contact,PDO::PARAM_STR) ;
       
        $stmt->bindParam("Preferred_form_of", $Preferred_form_of,PDO::PARAM_STR) ;
        $stmt->bindParam("contact_Entry_Date", $contact_Entry_Date,PDO::PARAM_STR) ;
        $stmt->bindParam("Status", $Status,PDO::PARAM_STR) ;
       $stmt->bindParam("Agent", $Agent,PDO::PARAM_STR) ;
        $stmt->bindParam("Type_of_contract", $Type_of_contract,PDO::PARAM_STR) ;
        $stmt->bindParam("Last_action", $Last_action,PDO::PARAM_STR) ;
        $stmt->bindParam("Contact_source", $Contact_source,PDO::PARAM_STR) ;
        $stmt->bindParam("Lead", $Lead,PDO::PARAM_STR) ;
        $stmt->bindParam("Newsletter", $Newsletter,PDO::PARAM_STR) ;
       $stmt->bindParam("Terms_accepted", $Terms_accepted,PDO::PARAM_INT) ;
        $stmt->bindParam("Accepted_recall", $Accepted_recall,PDO::PARAM_INT) ;
        $stmt->bindParam("Customer_since", $Customer_since,PDO::PARAM_STR) ;
        $stmt->bindParam("Vip_contact", $Vip_contact,PDO::PARAM_INT) ;
        $stmt->bindParam("warning_msg", $warning_msg,PDO::PARAM_STR) ;
        $stmt->bindParam("Save_until_date", $Save_until_date,PDO::PARAM_STR) ;
        $stmt->bindParam("Save_until_reason", $Save_until_reason,PDO::PARAM_STR) ;
        $stmt->bindParam("GDPR_status", $GDPR_status,PDO::PARAM_STR);
        $stmt->bindParam("main_contact", $main_contact,PDO::PARAM_STR);
        $stmt->bindParam("second_contact", $second_contact,PDO::PARAM_STR);
      $stmt->execute();
      //$stmt->debugDumpParams();
      
      $address_basic_data_id=$db->lastInsertId();
      $db = null;
       return true;
    } 
      catch(PDOException $e) {
      echo '{"error":{"text":'. $e->getMessage() .'}}'; 
      }
  }

  /*address delete */

      public function addressBasicDataDelete($address_basic_data_id){
        try{
          $db = getDB();
          $pdo_statement=$db->prepare("delete from onoffice_address where id=" .$address_basic_data_id);
          $pdo_statement->execute();
          $db=null;
          return true;
        }catch(PDOException $e) {
          echo '{"error":{"text":'. $e->getMessage() .'}}'; 
          }
      }

     /* address insert */   
       public function addressBasicDataInsert($client_no,$company_id,$user_id, $salutation, $entry_date, $first_name,
       $name, $company, $company_additional, $street, $zip, $city, $country, $telefon1, 
       $telefon2, $mobile, $fax_no, $birthdate, $salutation2,$first_name2, $last_name2, 
       $birthdate2, $employer, $job_title, $position, $salary, $employment, $Email1, $Email2, 
       $Homepage, $contact_salutation, $Last_Contact, $Customer_logo, $Preferred_form_of, 
       $contact_Entry_Date,$Status,$Agent, $Type_of_contract, $Last_action, $Contact_source,
       $Lead, $Newsletter, $Terms_accepted, $Accepted_recall, $Customer_since, $Vip_contact,
       $warning_msg, $Save_until_date, $Save_until_reason, $GDPR_status,$main_contact,$second_contact)
     {
          try{
          $db = getDB();
          
          $stmt = $db->prepare(
            "INSERT INTO onoffice_address(client_no,company_id,user_id, salutation, entry_date, first_name,
        name, company, company_additional, street, zip, city, country, telefon1, 
        telefon2, mobile, fax_no, birthdate, salutation2,first_name2, last_name2, 
        birthdate2, employer, job_title, position, salary, employment, Email1, Email2, 
        Homepage, contact_salutation, Last_Contact, Customer_logo, Preferred_form_of, 
        contact_Entry_Date,Status,Agent, Type_of_contract, Last_action, Contact_source,
        Lead, Newsletter, Terms_accepted, Accepted_recall, Customer_since, Vip_contact,
        warning_msg, Save_until_date, Save_until_reason, GDPR_status,main_contact,second_contact)
             VALUES(:client_no,:company_id,:user_id,:salutation, :entry_date, :first_name,
             :name, :company, :company_additional, :street, :zip, :city, :country, :telefon1, 
             :telefon2, :mobile, :fax_no, :birthdate, :salutation2,:first_name2, :last_name2, 
             :birthdate2, :employer, :job_title, :position, :salary, :employment, :Email1, :Email2, 
             :Homepage, :contact_salutation, :Last_Contact, :Customer_logo, :Preferred_form_of, 
             :contact_Entry_Date,:Status,:Agent, :Type_of_contract, :Last_action, :Contact_source,
             :Lead, :Newsletter, :Terms_accepted, :Accepted_recall, :Customer_since, :Vip_contact,
             :warning_msg, :Save_until_date, :Save_until_reason, :GDPR_status,:main_contact,:second_contact)");  
            
             $stmt->bindParam("client_no", $client_no,PDO::PARAM_INT) ;
             $stmt->bindParam("company_id", $company_id,PDO::PARAM_INT) ;
             $stmt->bindParam("user_id", $user_id,PDO::PARAM_INT) ;
             $stmt->bindParam("salutation", $salutation,PDO::PARAM_STR) ;
             $stmt->bindParam("entry_date", $entry_date,PDO::PARAM_STR) ;
             $stmt->bindParam("first_name", $first_name,PDO::PARAM_STR) ;
             $stmt->bindParam("name", $name,PDO::PARAM_STR) ;
             $stmt->bindParam("company", $company,PDO::PARAM_STR) ;
             $stmt->bindParam("company_additional", $company_additional,PDO::PARAM_STR) ;
             $stmt->bindParam("street", $street,PDO::PARAM_STR) ;
             $stmt->bindParam("zip", $zip,PDO::PARAM_STR) ;
             $stmt->bindParam("city", $city,PDO::PARAM_STR) ;
             $stmt->bindParam("country", $country,PDO::PARAM_STR) ;
             $stmt->bindParam("telefon1", $telefon1,PDO::PARAM_STR) ;
             $stmt->bindParam("telefon2", $telefon2,PDO::PARAM_STR) ;
             $stmt->bindParam("mobile", $mobile,PDO::PARAM_STR) ;
              $stmt->bindParam("fax_no", $fax_no,PDO::PARAM_STR) ;
             $stmt->bindParam("birthdate", $birthdate,PDO::PARAM_STR) ;
             $stmt->bindParam("salutation2", $salutation2,PDO::PARAM_STR) ;
             $stmt->bindParam("first_name2", $first_name2,PDO::PARAM_STR) ;

             $stmt->bindParam("last_name2", $last_name2,PDO::PARAM_STR) ;
             $stmt->bindParam("birthdate2", $birthdate2,PDO::PARAM_STR) ;
             $stmt->bindParam("employer", $employer,PDO::PARAM_STR) ;
             $stmt->bindParam("job_title", $job_title,PDO::PARAM_STR) ;
             $stmt->bindParam("position", $position,PDO::PARAM_STR) ;
             $stmt->bindParam("salary", $salary,PDO::PARAM_STR) ;
             $stmt->bindParam("employment", $employment,PDO::PARAM_STR) ;
             $stmt->bindParam("Email1", $Email1,PDO::PARAM_STR);
            
             $stmt->bindParam("Email2", $Email2,PDO::PARAM_STR) ;
             $stmt->bindParam("Homepage", $Homepage,PDO::PARAM_STR) ;
             $stmt->bindParam("contact_salutation", $contact_salutation,PDO::PARAM_STR) ;
             $stmt->bindParam("Last_Contact", $Last_Contact,PDO::PARAM_STR) ;
             
             $stmt->bindParam("Customer_logo", $Customer_logo,PDO::PARAM_STR) ;
             $stmt->bindParam("Preferred_form_of", $Preferred_form_of,PDO::PARAM_STR) ;
             $stmt->bindParam("contact_Entry_Date", $contact_Entry_Date,PDO::PARAM_STR) ;
             $stmt->bindParam("Status", $Status,PDO::PARAM_STR) ;
            $stmt->bindParam("Agent", $Agent,PDO::PARAM_STR) ;
             $stmt->bindParam("Type_of_contract", $Type_of_contract,PDO::PARAM_STR) ;
             $stmt->bindParam("Last_action", $Last_action,PDO::PARAM_STR) ;
             $stmt->bindParam("Contact_source", $Contact_source,PDO::PARAM_STR) ;
             $stmt->bindParam("Lead", $Lead,PDO::PARAM_STR) ;
             $stmt->bindParam("Newsletter", $Newsletter,PDO::PARAM_STR) ;
            $stmt->bindParam("Terms_accepted", $Terms_accepted,PDO::PARAM_INT) ;
             $stmt->bindParam("Accepted_recall", $Accepted_recall,PDO::PARAM_INT) ;
             $stmt->bindParam("Customer_since", $Customer_since,PDO::PARAM_STR) ;
             $stmt->bindParam("Vip_contact", $Vip_contact,PDO::PARAM_INT) ;
             $stmt->bindParam("warning_msg", $warning_msg,PDO::PARAM_STR) ;
             $stmt->bindParam("Save_until_date", $Save_until_date,PDO::PARAM_STR) ;
             $stmt->bindParam("Save_until_reason", $Save_until_reason,PDO::PARAM_STR) ;
             $stmt->bindParam("GDPR_status", $GDPR_status,PDO::PARAM_STR);
             $stmt->bindParam("main_contact", $main_contact,PDO::PARAM_STR);
             $stmt->bindParam("second_contact", $second_contact,PDO::PARAM_STR);

          $stmt->execute();
          //$stmt->debugDumpParams();
          
          $address_basic_data_id=$db->lastInsertId();
          $db = null;
           return true;
        } 
          catch(PDOException $e) {
          echo '{"error":{"text":'. $e->getMessage() .'}}'; 
          }
     }
     
     /* address Details of perticular user*/
     public function addressDetails($address_id)
     {
        try{
          $db = getDB();
          $stmt = $db->prepare("SELECT `id`, `client_no`, `user_id`, `salutation`, `entry_date`, `first_name`, `name`, `company`, `company_additional`, `street`, `zip`, `city`, `country`, `telefon1`, `telefon2`, `mobile`, `fax_no`, `birthdate`, `salutation2`, `first_name2`, `last_name2`, `birthdate2`, `employer`, `job_title`, `position`, `salary`, `employment`, `Email1`, `Email2`, `Homepage`, `contact_salutation`, `Last_Contact`, `Customer_logo`, `Preferred_form_of`, `contact_Entry_Date`, `Status`, `Agent`, `Type_of_contract`, `Last_action`, `Contact_source`, `Lead`, `Newsletter`, `Terms_accepted`, `Accepted_recall`, `Customer_since`, `Vip_contact`, `warning_msg`, `Save_until_date`, `Save_until_reason`, `GDPR_status`, `main_contact`, `second_contact` FROM `onoffice_address` 
           WHERE id=:id");  
          $stmt->bindParam("id", $address_id,PDO::PARAM_INT);
          $stmt->execute();
          
          $data = $stmt->fetch(PDO::FETCH_OBJ);
          return $data;
         }
         catch(PDOException $e) {
          echo '{"error":{"text":'. $e->getMessage() .'}}'; 
          }

     }


     /*address Files*/
     public function addressFiles($address_id){
      try{
        $db = getDB();
        $stmt = $db->prepare("SELECT * FROM `onoffice_address_files` 
         WHERE onoffice_address_id=:id");  
        $stmt->bindParam("id", $address_id,PDO::PARAM_INT);
        $stmt->execute();
        
        $data = $stmt->fetch(PDO::FETCH_OBJ);
        return $data; 

       }
       catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}'; 
        }

     }

     
     /* address Details of perticular user*/
     public function allAddressDetails()
     {
        try{
          $db = getDB();
          $stmt = $db->prepare("SELECT `id`, `client_no`, `user_id`, `salutation`, `entry_date`,
           `first_name`, `name`, `company`, `company_additional`, `street`, `zip`,
            `city`, `country`, `telefon1`, `telefon2`, `mobile`, `fax_no`, `birthdate`, 
            `salutation2`, `first_name2`, `last_name2`, `birthdate2`, `employer`,
             `job_title`, `position`, `salary`, `employment`, `Email1`, `Email2`,
              `Homepage`, `contact_salutation`, `Last_Contact`, `Customer_logo`,
               `Preferred_form_of`, `contact_Entry_Date`, `Status`, `Agent`, `Type_of_contract`, 
               `Last_action`, `Contact_source`, `Lead`, `Newsletter`, `Terms_accepted`, `Accepted_recall`,
                `Customer_since`, `Vip_contact`, `warning_msg`, `Save_until_date`, `Save_until_reason`, 
                `GDPR_status` FROM `onoffice_address`");  
         
          $stmt->execute();
          
          $data = $stmt->fetch(PDO::FETCH_OBJ);
          return $data;
         }
         catch(PDOException $e) {
          echo '{"error":{"text":'. $e->getMessage() .'}}'; 
          }

     }


}
?>