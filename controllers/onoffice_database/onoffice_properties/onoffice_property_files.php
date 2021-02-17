<?php
include("../../config.php");
include('../../propertyClass.php');
include('../../../session.php');

 try
 {
  $file_id=$_GET['file_id'];
   $db = getDB();
   $stmt = $db->prepare("delete from onoffice_property_files where id=" .$file_id);
  


$stmt->bindParam(1, $file_id);


$db->beginTransaction();
$stmt->execute();
$db->commit();
echo "<script>alert('File Deleted');</script>";
echo "<script>window.location = '../../../onoffice/property/';</script>";;
 }
 catch(PDOException $e)
 {
    echo "<script>alert('Error Occured try again ..');</script>";
    echo "<script>window.location = '../../../onoffice/property/;</script>";;
 }

?>