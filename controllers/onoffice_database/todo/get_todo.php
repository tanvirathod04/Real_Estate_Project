<?php
include("../../config.php");
include('../../../session.php');
include('../../todoClass.php');

include "../../../onoffice/footer.php";
$todoClass=new todoClass();

$userDetails=$userClass->userDetails($session_uid);
$company_id= $userDetails->company_id;
$user_id =  $session_uid;
$user=$_GET['assigned_user_id'];

try{
  
    $db = getDB();
    $stmt = $db->prepare("SELECT * FROM onoffice_todo WHERE assigned_user_id =:user");  
              $stmt->bindParam("user", $user,PDO::PARAM_INT);
              $stmt->execute();
             $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
             echo json_encode($records);
           //return $records;          
 }
 catch(PDOException $e) {
  echo '{"error":{"text":'. $e->getMessage() .'}}'; 
  }
?>
