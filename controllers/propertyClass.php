<?php
class propertyClass
{

  
  /*propertyAddressContactPersonAssign*/
  public function propertyAddressContactPersonAssign($task_id,$client_no){
    try{
      $db = getDB();
        $stmt = $db->prepare("INSERT INTO `onoffice_property_assign_contactperson`(`onoffice_property_basic_data_id`, `client_no`)
         VALUES(:onoffice_property_basic_data_id,:client_no)");  
        $stmt->bindParam("onoffice_property_basic_data_id", $task_id,PDO::PARAM_INT) ;  
             $stmt->bindParam("client_no", $client_no,PDO::PARAM_INT) ;  
            
      $stmt->execute();
      $task_assign_address_id=$db->lastInsertId();
      $db = null;
      return true;      
      } 
      catch(PDOException $e) {
      echo '{"error":{"text":'. $e->getMessage() .'}}'; 
      }
  }

  /*propertyAddressOwnerAssign*/
  public function propertyAddressOwnerAssign($task_id,$client_no){
    try{
      $db = getDB();
        $stmt = $db->prepare("INSERT INTO `onoffice_property_assign_owner`(`onoffice_property_basic_data_id`, `client_no`)
         VALUES(:onoffice_property_basic_data_id,:client_no)");  
        $stmt->bindParam("onoffice_property_basic_data_id", $task_id,PDO::PARAM_INT) ;  
             $stmt->bindParam("client_no", $client_no,PDO::PARAM_INT) ;  
            
      $stmt->execute();
      $task_assign_address_id=$db->lastInsertId();
      $db = null;
      return true;      
      } 
      catch(PDOException $e) {
      echo '{"error":{"text":'. $e->getMessage() .'}}'; 
      }
  }

  public function getPropertyBasicDataId($property_data_ref,$property_title){
    try{
      $db = getDB();
      $stmt = $db->prepare("SELECT `id` FROM `onoffice_property_basic_data` WHERE Data_Record_Ref_No=:Data_Record_Ref_No OR property_title=:property_title");  
     $stmt->bindParam("Data_Record_Ref_No", $property_data_ref,PDO::PARAM_STR);
     $stmt->bindParam("property_title", $property_title,PDO::PARAM_STR);
     $stmt->execute();
     $data = $stmt->fetch(PDO::FETCH_OBJ);
     $db = null;
     return $data;
    } catch(PDOException $e) {
      echo '{"error":{"text":'. $e->getMessage() .'}}'; 
      }
  }

  public function propertyCity($company_id){
    try{
      $db = getDB();
      $stmt = $db->prepare("SELECT DISTINCT town FROM `onoffice_property_basic_data`
       WHERE company_id=:company_id");  
      $stmt->bindParam("company_id", $company_id,PDO::PARAM_INT);
      $stmt->execute();
      
      $data = $stmt->fetchAll(PDO::FETCH_OBJ);
      return $data;
     }
     catch(PDOException $e) {

      echo '{"error":{"text":'. $e->getMessage() .'}}'; 
      }
  }
  public function propertyStreet($company_id,$propertyCity){
    try{
      $db = getDB();
      $stmt = $db->prepare("SELECT DISTINCT street FROM `onoffice_property_basic_data`
       WHERE company_id=:company_id AND town=:town");  
      $stmt->bindParam("company_id", $company_id,PDO::PARAM_INT);
      $stmt->bindParam("town", $propertyCity,PDO::PARAM_INT);
      $stmt->execute();
      
      $data = $stmt->fetchAll(PDO::FETCH_OBJ);
      return $data;
     }
     catch(PDOException $e) {
      echo '{"error":{"text":'. $e->getMessage() .'}}'; 
      }
  }

  public function propertyBuyerInsert($onoffice_property_basic_data_id,$name, $mode, $filter, $status, $status2, $no_of_datasets,
   $display_above,$hide_contacted_interested_parties, $only_show_int_par, $hide_rejections, $hide_links){
    try{
      $db = getDB();
      
      $stmt = $db->prepare("INSERT INTO `onoffice_property_propective_buyer`(`onoffice_property_basic_data_id`, `name`, `mode`, `filter`, `status`, `status2`, `no_of_datasets`, `display_above`, `hide_contacted_interested_parties`,
       `only_show_int_par`, `hide_rejections`, `hide_links`) VALUES (:onoffice_property_basic_data_id,
      :name,:mode,:filter,:status,:status2,:no_of_datasets,:display_above,:hide_contacted_interested_parties,:hide_rejections,:only_show_int_par,:hide_links)");
         $stmt->bindParam("onoffice_property_basic_data_id", $onoffice_property_basic_data_id,PDO::PARAM_INT) ;
         $stmt->bindParam("name", $name,PDO::PARAM_STR) ;
         $stmt->bindParam("mode", $mode,PDO::PARAM_STR) ;
         $stmt->bindParam("filter", $filter,PDO::PARAM_STR) ;
         $stmt->bindParam("status", $status,PDO::PARAM_STR) ;
         $stmt->bindParam("status2", $status2,PDO::PARAM_STR) ;
         $stmt->bindParam("no_of_datasets", $no_of_datasets,PDO::PARAM_STR) ; 
         $stmt->bindParam("display_above", $display_above,PDO::PARAM_STR) ;
         $stmt->bindParam("hide_contacted_interested_parties", $hide_contacted_interested_parties,PDO::PARAM_INT) ;
         $stmt->bindParam("hide_rejections", $hide_rejections,PDO::PARAM_INT) ;
         $stmt->bindParam("only_show_int_par", $only_show_int_par,PDO::PARAM_INT) ;
         $stmt->bindParam("hide_links", $hide_links,PDO::PARAM_INT) ;

      $stmt->execute();
      //$stmt->debugDumpParams();
      
      $property_basic_data_id=$db->lastInsertId();
      $db = null;
       return true;
    } 
      catch(PDOException $e) {
      echo '{"error":{"text":'. $e->getMessage() .'}}'; 
      }
  }

  public function propertyMarketingUpdate($id,$user_id,$archive_property, $status2_nach_dem, $permanantly_in_rotation, 
  $fictional_address_active, $fictional_price_active, 
  $fictitional_price, $portals_website_api, $word_brochure_email, 
  $pdf_brochure, $owner_addr_in_pdf, $marketing_status, $public,
   $exclusive, $top_offer, $google_maps,
   $new, $pricereduction, $reference, $free_of_commission, 
   $property_of_the_day, $publish){
    try{
      $db = getDB();
     
      $stmt = $db->prepare("UPDATE `onoffice_property_basic_data` SET 
      `archive_property`=:archive_property,`status2_nach_dem`=:status2_nach_dem,
      `permanantly_in_rotation`=:permanantly_in_rotation,`fictional_address_active`=:fictional_address_active,
      `fictional_price_active`=:fictional_price_active,`fictitional_price`=:fictitional_price,
      `portals_website_api`=:portals_website_api,`word_brochure_email`=:word_brochure_email,
      `pdf_brochure`=:pdf_brochure,`owner_addr_in_pdf`=:owner_addr_in_pdf,`marketing_status`=:marketing_status,
      `public`=:public,`exclusive`=:exclusive,`top_offer`=:top_offer,`google_maps`=:google_maps,
      `new`=:new,`pricereduction`=:pricereduction,`reference`=:reference,
      `free_of_commission`=:free_of_commission,`property_of_the_day`=:property_of_the_day,`publish`=:publish
        WHERE user_id=:user_id AND id=:id");
         
         $stmt->bindParam("id", $id,PDO::PARAM_INT) ;
          $stmt->bindParam("user_id", $user_id,PDO::PARAM_INT) ;

          $stmt->bindParam("archive_property", $archive_property,PDO::PARAM_STR) ;
          $stmt->bindParam("status2_nach_dem", $status2_nach_dem,PDO::PARAM_STR) ;
          $stmt->bindParam("permanantly_in_rotation", $permanantly_in_rotation,PDO::PARAM_STR) ;
          $stmt->bindParam("fictional_address_active", $fictional_address_active,PDO::PARAM_STR) ;
          $stmt->bindParam("fictional_price_active", $fictional_price_active,PDO::PARAM_STR) ;
          $stmt->bindParam("fictitional_price", $fictitional_price,PDO::PARAM_STR) ;
          $stmt->bindParam("portals_website_api", $portals_website_api,PDO::PARAM_STR) ;
          $stmt->bindParam("word_brochure_email", $word_brochure_email,PDO::PARAM_STR) ;
          $stmt->bindParam("pdf_brochure", $pdf_brochure,PDO::PARAM_STR) ;
          $stmt->bindParam("owner_addr_in_pdf", $owner_addr_in_pdf,PDO::PARAM_STR) ;
          $stmt->bindParam("marketing_status", $marketing_status,PDO::PARAM_STR) ;
          $stmt->bindParam("public", $public,PDO::PARAM_STR) ;
          $stmt->bindParam("exclusive", $exclusive,PDO::PARAM_STR) ;
          $stmt->bindParam("top_offer", $top_offer,PDO::PARAM_STR) ;
          $stmt->bindParam("google_maps", $google_maps,PDO::PARAM_STR) ;
          $stmt->bindParam("new", $new,PDO::PARAM_STR) ;
          $stmt->bindParam("pricereduction", $pricereduction,PDO::PARAM_STR) ;
          $stmt->bindParam("reference", $reference,PDO::PARAM_STR) ;
          $stmt->bindParam("free_of_commission", $free_of_commission,PDO::PARAM_STR) ;
          $stmt->bindParam("property_of_the_day", $property_of_the_day,PDO::PARAM_STR) ;
          $stmt->bindParam("publish", $publish,PDO::PARAM_STR) ;
         
                 
       
        $stmt->execute();
      //$stmt->debugDumpParams();
      
      $property_basic_data_id=$db->lastInsertId();
      $db = null;
       return true;
    } 
      catch(PDOException $e) {
      echo '{"error":{"text":'. $e->getMessage() .'}}'; 
      }
  }

  public function propertyDetailsUpdate($id,$user_id,$cable_satellite_TV, $energy_performance, $energy_pass_valid, $energy_cerrificate, 
  $hot_water_included, $year_of_construction, $main_fuel_type, $dist_kindergarten, $dist_to_primary_schools,
  $dist_high_school, $dist_highway, $dist_to_downtown, $avail_from, $commercial_use, $rented, 
  $listed_building, $Beaconing, $Heating, $Number_of_Floors, $Parking, $conditions, $Pets,$Balkon,$Terrasse,$Wintergarten){
  try{
    echo $Balkon,$Terrasse,$Wintergarten;
    $db = getDB();
   
    $stmt = $db->prepare("UPDATE `onoffice_property_basic_data` SET 
    `cable_satellite_TV`=:cable_satellite_TV,`energy_performance`=:energy_performance,
    `energy_pass_valid`=:energy_pass_valid,`energy_cerrificate`=:energy_cerrificate,
    `hot_water_included`=:hot_water_included,`year_of_construction`=:year_of_construction,
    `main_fuel_type`=:main_fuel_type,`dist_kindergarten`=:dist_kindergarten,`dist_to_primary_schools`=:dist_to_primary_schools,
    `dist_high_school`=:dist_high_school,`dist_highway`=:dist_highway,`dist_to_downtown`=:dist_to_downtown,
    `avail_from`=:avail_from,`commercial_use`=:commercial_use,`rented`=:rented,`listed_building`=:listed_building,`Beaconing`=:Beaconing,
    `Heating`=:Heating,`Number_of_Floors`=:Number_of_Floors,`Parking`=:Parking,`conditions`=:conditions,`Pets`=:Pets,
    `Balkon`=:Balkon,`Terrasse`=:Terrasse,`Wintergarten`=:Wintergarten WHERE user_id=:user_id AND id=:id");
       
       $stmt->bindParam("id", $id,PDO::PARAM_INT) ;
        $stmt->bindParam("user_id", $user_id,PDO::PARAM_INT) ;
        $stmt->bindParam("cable_satellite_TV", $cable_satellite_TV,PDO::PARAM_STR) ;
        $stmt->bindParam("energy_performance", $energy_performance,PDO::PARAM_STR) ;
        $stmt->bindParam("energy_pass_valid", $energy_pass_valid,PDO::PARAM_STR) ;
        $stmt->bindParam("energy_cerrificate", $energy_cerrificate,PDO::PARAM_STR) ;
        $stmt->bindParam("hot_water_included", $hot_water_included,PDO::PARAM_STR) ;
        $stmt->bindParam("year_of_construction", $year_of_construction,PDO::PARAM_STR) ;
        $stmt->bindParam("main_fuel_type", $main_fuel_type,PDO::PARAM_STR) ;
        $stmt->bindParam("dist_kindergarten", $dist_kindergarten,PDO::PARAM_STR) ;
        $stmt->bindParam("dist_to_primary_schools", $dist_to_primary_schools,PDO::PARAM_STR) ;
        $stmt->bindParam("dist_high_school", $dist_high_school,PDO::PARAM_STR) ;
        $stmt->bindParam("dist_highway", $dist_highway,PDO::PARAM_STR) ;
        $stmt->bindParam("dist_to_downtown", $dist_to_downtown,PDO::PARAM_STR) ;
        $stmt->bindParam("avail_from", $avail_from,PDO::PARAM_STR) ;
        $stmt->bindParam("commercial_use", $commercial_use,PDO::PARAM_STR) ;
        $stmt->bindParam("rented", $rented,PDO::PARAM_STR) ;
        $stmt->bindParam("listed_building", $listed_building,PDO::PARAM_STR) ;
        $stmt->bindParam("Beaconing", $Beaconing,PDO::PARAM_STR) ;
        $stmt->bindParam("Heating", $Heating,PDO::PARAM_STR) ;
        $stmt->bindParam("Number_of_Floors", $Number_of_Floors,PDO::PARAM_STR) ;
        $stmt->bindParam("Parking", $Parking,PDO::PARAM_STR) ;
        $stmt->bindParam("conditions", $conditions,PDO::PARAM_STR) ;
        $stmt->bindParam("Pets", $Pets,PDO::PARAM_STR) ;
        $stmt->bindParam("Balkon", $Balkon,PDO::PARAM_STR) ;
        $stmt->bindParam("Terrasse", $Terrasse,PDO::PARAM_STR) ;
        $stmt->bindParam("Wintergarten", $Wintergarten,PDO::PARAM_STR) ;
     
      $stmt->execute();
    //$stmt->debugDumpParams();
    
    $property_basic_data_id=$db->lastInsertId();
    $db = null;
     return true;
  } 
    catch(PDOException $e) {
    echo '{"error":{"text":'. $e->getMessage() .'}}'; 
    }
 }


  public function propertyPrices_Surfaces_update($id,$user_id,$currency,$external_commission,$internal_commission,
  $plus_VAT_to_provision,$usable_area,$purchase_price,$living_area,$number_of_rooms,$number_of_bedrooms, 
 $number_of_bathrooms,$plot_surface, $number_of_toilets){
  try{
    $db = getDB();
   
    $stmt = $db->prepare("UPDATE `onoffice_property_basic_data` SET `currency`=:currency,
    `external_commission`=:external_commission,`internal_commission`=:internal_commission,
    `plus_VAT_to_provision`=:plus_VAT_to_provision,`usable_area`=:usable_area,`purchase_price`=:purchase_price,
    `living_area`=:living_area,`number_of_rooms`=:number_of_rooms,`number_of_bedrooms`=:number_of_bedrooms,
    `number_of_bathrooms`=:number_of_bathrooms,`plot_surface`=:plot_surface,
    `number_of_toilets`=:number_of_toilets WHERE user_id=:user_id AND id=:id");
       
       $stmt->bindParam("id", $id,PDO::PARAM_INT) ;
        $stmt->bindParam("user_id", $user_id,PDO::PARAM_INT) ;
      $stmt->bindParam("currency", $currency,PDO::PARAM_STR) ;
      $stmt->bindParam("external_commission", $external_commission,PDO::PARAM_STR) ;
      $stmt->bindParam("internal_commission", $internal_commission,PDO::PARAM_STR) ;
      $stmt->bindParam("plus_VAT_to_provision", $plus_VAT_to_provision,PDO::PARAM_STR) ;

      $stmt->bindParam("usable_area", $usable_area,PDO::PARAM_STR) ;
      $stmt->bindParam("purchase_price", $purchase_price,PDO::PARAM_STR) ;
      $stmt->bindParam("living_area", $living_area,PDO::PARAM_STR) ;
      $stmt->bindParam("number_of_rooms", $number_of_rooms,PDO::PARAM_STR) ;

      $stmt->bindParam("number_of_bedrooms", $number_of_bedrooms,PDO::PARAM_STR) ;
      $stmt->bindParam("number_of_bathrooms", $number_of_bathrooms,PDO::PARAM_STR) ;
      $stmt->bindParam("plot_surface", $plot_surface,PDO::PARAM_STR) ;
      $stmt->bindParam("number_of_toilets", $number_of_toilets,PDO::PARAM_STR) ;
     
      $stmt->execute();
    //$stmt->debugDumpParams();
    
    $property_basic_data_id=$db->lastInsertId();
    $db = null;
     return true;
  } 
    catch(PDOException $e) {
    echo '{"error":{"text":'. $e->getMessage() .'}}'; 
    }
 }

  public function propertyFileTextDataUpdate($id,$user_id,$description,$location,
  $equipment_description,$miscellaneous){
    try{
      $db = getDB();
      $stmt = $db->prepare("UPDATE `onoffice_property_basic_data` SET `description`=:description,
      `equipment_description`=:equipment_description,`location`=:location,`miscellaneous`=:miscellaneous  WHERE user_id=:user_id AND id=:id");
         
         $stmt->bindParam("id", $id,PDO::PARAM_INT) ;
         $stmt->bindParam("user_id", $user_id,PDO::PARAM_INT) ;
      $stmt->bindParam("description", $description,PDO::PARAM_STR) ;
      $stmt->bindParam("location", $location,PDO::PARAM_STR) ;
      $stmt->bindParam("equipment_description", $equipment_description,PDO::PARAM_STR) ;
      $stmt->bindParam("miscellaneous", $miscellaneous,PDO::PARAM_STR) ;
      
      $stmt->execute();
      //$stmt->debugDumpParams();
      
      $property_basic_data_id=$db->lastInsertId();
      $db = null;
       return true;
    }catch(PDOException $e) {
      echo '{"error":{"text":'. $e->getMessage() .'}}'; 
      }
  }

  public function propertyBasicDataUpdate($id,$user_id, $Data_Record_Ref_No,
  $Status,$Property_External,$Agent,$Type_of_order,$Order_Until,
  $Sold_on, $last_action, $status2,$property_title,$street,$house_no,$postal_code,$town,
  $country,$Property_class,$Property_type,$type_of_usage,$marketing_method){
    try{
      $db = getDB();
     
      $stmt = $db->prepare("UPDATE `onoffice_property_basic_data` SET `Data_Record_Ref_No`=:Data_Record_Ref_No,
      `Status`=:Status,`Property_External`=:Property_External,`Agent`=:Agent,`Type_of_order`=:Type_of_order,
      `Order_Until`=:Order_Until,`Sold_on`=:Sold_on,`last_action`=:last_action,`status2`=:status2,
      `property_title`=:property_title,`street`=:street,`house_no`=:house_no,`postal_code`=:postal_code,
      `town`=:town,`country`=:country,`Property_class`=:Property_class,`Property_type`=:Property_type,
      `type_of_usage`=:type_of_usage,`marketing_method`=:marketing_method
       WHERE user_id=:user_id AND id=:id");
        
        $stmt->bindParam("id", $id,PDO::PARAM_INT) ;
        $stmt->bindParam("user_id", $user_id,PDO::PARAM_INT) ;
        $stmt->bindParam("Data_Record_Ref_No", $Data_Record_Ref_No,PDO::PARAM_STR) ;
       
        $stmt->bindParam("Status", $Status,PDO::PARAM_STR) ;
        $stmt->bindParam("Property_External", $Property_External,PDO::PARAM_STR) ;
        $stmt->bindParam("Agent", $Agent,PDO::PARAM_STR) ;
        $stmt->bindParam("Type_of_order", $Type_of_order,PDO::PARAM_STR) ;
        $stmt->bindParam("Order_Until", $Order_Until,PDO::PARAM_STR) ;
        $stmt->bindParam("Sold_on", $Sold_on,PDO::PARAM_STR) ;
        $stmt->bindParam("last_action", $last_action,PDO::PARAM_STR) ;
        $stmt->bindParam("status2", $status2,PDO::PARAM_STR) ;
        $stmt->bindParam("property_title", $property_title,PDO::PARAM_STR) ;
        $stmt->bindParam("street", $street,PDO::PARAM_STR) ;
        $stmt->bindParam("house_no", $house_no,PDO::PARAM_STR) ;
        $stmt->bindParam("postal_code", $postal_code,PDO::PARAM_STR) ;
        $stmt->bindParam("town", $town,PDO::PARAM_STR) ;
        $stmt->bindParam("country", $country,PDO::PARAM_STR) ;

        $stmt->bindParam("Property_class", $Property_class,PDO::PARAM_STR) ;
        $stmt->bindParam("Property_type", $Property_type,PDO::PARAM_STR) ;
        $stmt->bindParam("type_of_usage", $type_of_usage,PDO::PARAM_STR) ;
        $stmt->bindParam("marketing_method", $marketing_method,PDO::PARAM_STR) ;
        
       
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

  /*property delete */

      public function propertyBasicDataDelete($property_basic_data_id){
        try{
          $db = getDB();
          $pdo_statement=$db->prepare("delete from onoffice_property_basic_data where id=" .$property_basic_data_id);
          $pdo_statement->execute();
          $db=null;
          return true;
        }catch(PDOException $e) {
          echo '{"error":{"text":'. $e->getMessage() .'}}'; 
          }
      }

     /* property insert */   
       public function propertyBasicDataInsert($company_id,$Data_Record_Ref_No,$user_id,
       $property_image,$Status,$Property_External,$Agent,$Type_of_order,$Order_Until,
       $Sold_on, $last_action, $status2,$property_title,$street,$house_no,$postal_code,$town,
       $country,$Property_class,$Property_type,$type_of_usage,$marketing_method)
     {
          try{
          $db = getDB();
          
          $stmt = $db->prepare(
            "INSERT INTO `onoffice_property_basic_data`(`Data_Record_Ref_No`,`company_id`, `Status`,
             `Property_External`, `Agent`, `Type_of_order`, `Order_Until`, `Sold_on`, `last_action`, 
             `status2`, `property_title`, `street`, `house_no`, `postal_code`, `town`, `country`,
              `Property_class`, `Property_type`, `type_of_usage`,`marketing_method`, `user_id`, `property_image`) 
              VALUES (:Data_Record_Ref_No,:company_id,:Status,:Property_External,:Agent,:Type_of_order,
              :Order_Until,:Sold_on,:last_action,:status2,:property_title,:street,:house_no,:postal_code,:town,:country,
              :Property_class,:Property_type,:type_of_usage,:marketing_method,:user_id,:property_image)");  
            
             $stmt->bindParam("user_id", $user_id,PDO::PARAM_INT) ;
             $stmt->bindParam("company_id", $company_id,PDO::PARAM_INT) ;
             $stmt->bindParam("Data_Record_Ref_No", $Data_Record_Ref_No,PDO::PARAM_STR) ;
             $stmt->bindParam("Status", $Status,PDO::PARAM_STR) ;
             $stmt->bindParam("Property_External", $Property_External,PDO::PARAM_STR) ;
             $stmt->bindParam("Agent", $Agent,PDO::PARAM_STR) ;
             $stmt->bindParam("Type_of_order", $Type_of_order,PDO::PARAM_STR) ;
             $stmt->bindParam("Order_Until", $Order_Until,PDO::PARAM_STR) ;


             $stmt->bindParam("Sold_on", $Sold_on,PDO::PARAM_STR) ;
             $stmt->bindParam("last_action", $last_action,PDO::PARAM_STR) ;
             $stmt->bindParam("status2", $status2,PDO::PARAM_STR) ;
             $stmt->bindParam("property_title", $property_title,PDO::PARAM_STR) ;
            
             $stmt->bindParam("street", $street,PDO::PARAM_STR) ;
             $stmt->bindParam("house_no", $house_no,PDO::PARAM_STR) ;
             $stmt->bindParam("postal_code", $postal_code,PDO::PARAM_STR) ;
             $stmt->bindParam("town", $town,PDO::PARAM_STR) ;
             $stmt->bindParam("country", $country,PDO::PARAM_STR) ;

             
             $stmt->bindParam("Property_class", $Property_class,PDO::PARAM_STR) ;
             $stmt->bindParam("Property_type", $Property_type,PDO::PARAM_STR) ;
             $stmt->bindParam("type_of_usage", $type_of_usage,PDO::PARAM_STR) ;
             $stmt->bindParam("marketing_method", $marketing_method,PDO::PARAM_STR) ;
           
             $stmt->bindParam("property_image", $property_image,PDO::PARAM_STR) ;
            
          $stmt->execute();
          //$stmt->debugDumpParams();
          
          $property_basic_data_id=$db->lastInsertId();
          $db = null;
           return true;
        } 
          catch(PDOException $e) {
          echo '{"error":{"text":'. $e->getMessage() .'}}'; 
          }
     }
     
     /* property Details of perticular user*/
     public function propertyDetails($property_basic_data_id)
     {
        try{
          $db = getDB();
          $stmt = $db->prepare("SELECT * FROM `onoffice_property_basic_data`
           WHERE id=:id");  
          $stmt->bindParam("id", $property_basic_data_id,PDO::PARAM_INT);
          $stmt->execute();
          
          $data = $stmt->fetch(PDO::FETCH_OBJ);
          return $data;
         }
         catch(PDOException $e) {
          echo '{"error":{"text":'. $e->getMessage() .'}}'; 
          }

     }


     /*Property Buyer*/
     public function propertyBuyer($property_basic_data_id){
      try{
        $db = getDB();
        $stmt = $db->prepare("SELECT * FROM `onoffice_property_propective_buyer` 
         WHERE onoffice_property_basic_data_id=:id");  
        $stmt->bindParam("id", $property_basic_data_id,PDO::PARAM_INT);
        $stmt->execute();
        
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data; 

       }
       catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}'; 
        }

     }


     /*Property Files*/
     public function propertyFiles($property_basic_data_id){
      try{
        $db = getDB();
        $stmt = $db->prepare("SELECT * FROM `onoffice_property_files` 
         WHERE onoffice_property_basic_data_id=:id");  
        $stmt->bindParam("id", $property_basic_data_id,PDO::PARAM_INT);
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