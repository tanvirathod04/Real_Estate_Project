<?php
class companyClass
{

       /* User Profile Update */
       public function profileUpdate($company_id,$FileUpload1){
            try{
              $db = getDB();
              $stmt = $db->prepare("UPDATE company SET logo=:logo WHERE company_id=:company_id");  
              $stmt->bindParam("company_id", $company_id,PDO::PARAM_INT);
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
      
        

      /*Update Employee count*/
      public function updateEmployeeCount($counter,$company_id){
            $db = getDB();
            
             $stmt = $db->prepare("UPDATE `company` SET `counter`=:counter WHERE company_id=:company_id");
             $stmt->bindParam("counter", $counter,PDO::PARAM_INT) ;
             $stmt->bindParam("company_id", $company_id,PDO::PARAM_INT) ;
             $stmt->execute();
            
             
             $company_id=$db->lastInsertId();
             $db = null;
              return true;
      }

      /* Company Login */
      public function companyLogin($usernameEmail,$password)
      {
 
           $db = getDB();
           $hash_password= hash('sha256', $password);
           $stmt = $db->prepare("SELECT company_id FROM company WHERE  (mail=:usernameEmail) AND  password=:hash_password");  
           $stmt->bindParam("usernameEmail", $usernameEmail,PDO::PARAM_STR) ;
           $stmt->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
           $stmt->execute();
           $count=$stmt->rowCount();
           $data=$stmt->fetch(PDO::FETCH_OBJ);
           $db = null;
           if($count)
           {
                 $_SESSION['company_id']=$data->company_id;
                
                 return true;
           }
           else
           {
                return false;
           }    
      }

       /* Company Details */
       public function companyDetails($company_id){
            try{
              $db = getDB();
              $stmt = $db->prepare("SELECT * FROM company WHERE company_id=:company_id");  
              $stmt->bindParam("company_id", $company_id,PDO::PARAM_INT);
              $stmt->execute();
              $data = $stmt->fetch(PDO::FETCH_OBJ);
             
              return $data;
             }
             catch(PDOException $e) {
              echo '{"error":{"text":'. $e->getMessage() .'}}'; 
              }
    
         }

         /* Company Details */
       public function companyId($company_name){
        try{
          $db = getDB();
          $stmt = $db->prepare("SELECT * FROM company WHERE company_name=:company_name");  
          $stmt->bindParam("company_name", $company_name,PDO::PARAM_STR);
          $stmt->execute();
          $data = $stmt->fetch(PDO::FETCH_OBJ);
         
          return $data;
         }
         catch(PDOException $e) {
          echo '{"error":{"text":'. $e->getMessage() .'}}'; 
          }

     }
    


     /* Company Registration */
     public function companyRegistration($password,$email,$company,$fax,$logo,$phone,
     $country,$language,$address,$package_name,$employee_count,$url)
     {
          try{
          $db = getDB();
          $st = $db->prepare("SELECT company_id FROM company WHERE mail=:email");  
          $st->bindParam("email", $email,PDO::PARAM_STR);
          $st->execute();
          $count=$st->rowCount();
          if($count<1)
          {
          $stmt = $db->prepare(
            "INSERT INTO company(`company_name`, `mail`, `password`, `phone`,
             `country`, `language`, `address`, `fax`, `url`, `logo`, `package_name`, `employee_count`,`counter`)
             VALUES(:company, :uemail, :upassword, :phone,:country, :language,
              :address, :fax, :url, :logo, :package_name, :employee_count,:employee_count)");  
            
             $stmt->bindParam("company", $company,PDO::PARAM_STR) ;
             $stmt->bindParam("uemail", $email,PDO::PARAM_STR) ;
             $upassword= hash('sha256', $password);
             $stmt->bindParam("upassword", $upassword,PDO::PARAM_STR) ;
             $stmt->bindParam("phone", $phone,PDO::PARAM_STR) ;
             $stmt->bindParam("country", $country,PDO::PARAM_STR) ;
             $stmt->bindParam("language", $language,PDO::PARAM_STR) ;
             $stmt->bindParam("address", $address,PDO::PARAM_STR) ;
             $stmt->bindParam("fax", $fax,PDO::PARAM_STR) ;
             $stmt->bindParam("url", $url,PDO::PARAM_STR) ;
             $stmt->bindParam("logo", $logo,PDO::PARAM_STR) ;
            $stmt->bindParam("package_name", $package_name,PDO::PARAM_STR) ;
             $stmt->bindParam("employee_count", $employee_count,PDO::PARAM_STR) ;
              
          $stmt->execute();
          $company_id=$db->lastInsertId();
          $db = null;
          $_SESSION['company_id']=$company_id;
         
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
     


}
?>