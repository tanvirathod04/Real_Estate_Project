<?php
class userClass
{

  public function makeAdmin($user_id,$company_id,$status){
    try{
      $db = getDB();
      $stmt = $db->prepare("UPDATE `onoffice` SET status=:status  WHERE user_id=:user_id AND company_id=:company_id");  
      $stmt->bindParam("user_id", $user_id,PDO::PARAM_INT) ;
      $stmt->bindParam("company_id", $company_id,PDO::PARAM_STR) ;
      $stmt->bindParam("status", $status,PDO::PARAM_STR) ;
      $stmt->execute();
      $address_id=$db->lastInsertId();
      $db = null;
       return true;
     }
     catch(PDOException $e) {
      echo '{"error":{"text":'. $e->getMessage() .'}}'; 
      }
  }
   
  public function getPriviledge($user_id,$company_id)
  {
     try{
       $db = getDB();
       $stmt = $db->prepare("SELECT * FROM `priviledge` WHERE user_id=:user_id AND company_id=:company_id");  
       $stmt->bindParam("user_id", $user_id,PDO::PARAM_INT) ;
       $stmt->bindParam("company_id", $company_id,PDO::PARAM_STR) ;
       $stmt->execute();
       $data = $stmt->fetch(PDO::FETCH_OBJ);
       return $data;  
      }
      catch(PDOException $e) {
       echo '{"error":{"text":'. $e->getMessage() .'}}'; 
       }

  }


public function addPrivildge($user_id,$company_id,$address_read,$address_edit,$address_delete,$property_read,
$property_edit,$property_delete,$task_read,$task_edit,$task_delete){
  try{
  $db = getDB();
  $stmt = $db->prepare("UPDATE `priviledge` SET `user_id`=:user_id,`company_id`=:company_id,`address_read`=:address_read,`property_read`=:property_read,
  `task_read`=:task_read,`address_edit`=:address_edit,`address_delete`=:address_delete,
  `property_edit`=:property_edit,`property_delete`=:property_delete,`task_edit`=:task_edit,
  `task_delete`=:task_delete WHERE company_id=:company_id AND user_id=:user_id");
     $stmt->bindParam("user_id", $user_id,PDO::PARAM_INT) ;
     $stmt->bindParam("company_id", $company_id,PDO::PARAM_STR) ;
     $stmt->bindParam("address_read", $address_read,PDO::PARAM_STR) ;
     $stmt->bindParam("property_read", $property_read,PDO::PARAM_STR) ;
     $stmt->bindParam("task_read", $task_read,PDO::PARAM_STR) ;
     $stmt->bindParam("address_edit", $address_edit,PDO::PARAM_STR) ;
     $stmt->bindParam("address_delete", $address_delete,PDO::PARAM_STR) ;
     $stmt->bindParam("property_edit", $property_edit,PDO::PARAM_STR) ; 
     $stmt->bindParam("property_delete", $property_delete,PDO::PARAM_STR) ;
     $stmt->bindParam("task_edit", $task_edit,PDO::PARAM_INT) ;
     $stmt->bindParam("task_delete", $task_delete,PDO::PARAM_INT) ;

  $stmt->execute();
  $address_id=$db->lastInsertId();
  $db = null;
   return true;
} 
  catch(PDOException $e) {
  echo '{"error":{"text":'. $e->getMessage() .'}}'; 
  }
}
	 /* User Login */
     public function userLogin($usernameEmail,$password)
     {

          $db = getDB();
          $hash_password= hash('sha256', $password);
          $stmt = $db->prepare("SELECT user_id FROM onoffice WHERE  (mail=:usernameEmail) AND  password=:hash_password");  
          $stmt->bindParam("usernameEmail", $usernameEmail,PDO::PARAM_STR) ;
          $stmt->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
          $stmt->execute();
          $count=$stmt->rowCount();
          $data=$stmt->fetch(PDO::FETCH_OBJ);
          $db = null;
          if($count)
          {
                $_SESSION['uid']=$data->user_id;
               
                return true;
          }
          else
          {
               return false;
          }    
     }


     /* User Registration */
     public function userRegistration($company_id,$salutation,$password,$email,$first_name,$last_name,$company,$umobile,$fax,$logo,$phone,
     $country,$language,$postal_code,$town,$house_no,$street,$status)
     {
       
          try{
          $db = getDB();
          $st = $db->prepare("SELECT user_id FROM onoffice WHERE mail=:email");  
          $st->bindParam("email", $email,PDO::PARAM_STR);
          $st->execute();
          $count=$st->rowCount();
          if($count<1)
          {
          $stmt = $db->prepare(
            "INSERT INTO onoffice(company_id,salutation,first_name,last_name,company,mail,password,phone,
            country,language,postal_code,town,street,house_no,mobile,fax,logo,status)
             VALUES(:company_id,:salutation,:fname,:lname,:company,:uemail,:upassword,:phone,:country,:language,
             :postal_code,:town,:street,:house_no,:umobile,:fax,:logo,:status)");  
             $stmt->bindParam("company_id", $company_id,PDO::PARAM_INT) ;
             $stmt->bindParam("salutation", $salutation,PDO::PARAM_STR) ;
             $stmt->bindParam("fname", $first_name,PDO::PARAM_STR) ;
             $stmt->bindParam("lname", $last_name,PDO::PARAM_STR) ;
             $stmt->bindParam("company", $company,PDO::PARAM_STR) ;
             $stmt->bindParam("umobile", $umobile,PDO::PARAM_STR) ;
             $stmt->bindParam("fax", $fax,PDO::PARAM_STR) ;
            
             $stmt->bindParam("logo", $logo,PDO::PARAM_STR) ;
             $stmt->bindParam("phone", $phone,PDO::PARAM_STR) ;
             $stmt->bindParam("country", $country,PDO::PARAM_STR) ;
             $stmt->bindParam("language", $language,PDO::PARAM_STR) ;

             $stmt->bindParam("postal_code", $postal_code,PDO::PARAM_STR) ;
             $stmt->bindParam("town", $town,PDO::PARAM_STR) ;
             $stmt->bindParam("house_no", $house_no,PDO::PARAM_STR) ;
             $stmt->bindParam("street", $street,PDO::PARAM_STR) ;

             $upassword= hash('sha256', $password);
             $stmt->bindParam("upassword", $upassword,PDO::PARAM_STR) ;
             $stmt->bindParam("uemail", $email,PDO::PARAM_STR) ;
             $stmt->bindParam("status", $status,PDO::PARAM_STR) ;
       
          $stmt->execute();
          $uid=$db->lastInsertId();
          $db = null;
        //  $_SESSION['uid']=$uid;
         
          return true;

          }
          else
          {
          $db = null;
          return false;
          }
          
         
          } 
          catch(PDOException $e) {
          echo '{"error":{"text":'. $e->getMessage() .'}}'; 
          }
     }
     
     /* User Details */
     public function userDetails($uid){
        try{
          $db = getDB();
          $stmt = $db->prepare("SELECT * FROM onoffice WHERE user_id=:uid");  
          $stmt->bindParam("uid", $uid,PDO::PARAM_INT);
          $stmt->execute();
          $data = $stmt->fetch(PDO::FETCH_OBJ);
          return $data;
         }
         catch(PDOException $e) {
          echo '{"error":{"text":'. $e->getMessage() .'}}'; 
          }

     }

     /* All User Details of company*/
     public function allUserDetails($cid){
      try{
        $db = getDB();
        $stmt = $db->prepare("SELECT * FROM onoffice WHERE company_id=:cid");  
        $stmt->bindParam("cid", $cid,PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
       }
       catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}'; 
        }

   }

      /* User Profile Update */
      public function profileUpdate($user_id,$FileUpload1){
        try{
          $db = getDB();
          $stmt = $db->prepare("UPDATE onoffice SET logo=:logo WHERE user_id=:user_id");  
          $stmt->bindParam("user_id", $user_id,PDO::PARAM_INT);
          $stmt->bindParam("logo", $FileUpload1,PDO::PARAM_STR);
          $stmt->execute();
          //$stmt->debugDumpParams();
          
          $user_id=$db->lastInsertId();
          $db = null;
           return true;
         }
         catch(PDOException $e) {
          echo '{"error":{"text":'. $e->getMessage() .'}}'; 
          }

     }
}
?>