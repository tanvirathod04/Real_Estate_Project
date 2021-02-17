<?php
include("../../config.php");
include('../../../session.php');

if($_SERVER['REQUEST_METHOD']=='POST'){
    $user_id = $_POST['user_id'];
    $company_id = $_POST['company_id'];
    if( empty($_POST["address_read"]) ) {  $address_read="0";}
    else {  $address_read=  "1"; }
    if( empty($_POST["address_edit"]) ) {  $address_edit="0";}
    else {  $address_edit=  "1"; }
    if( empty($_POST["address_delete"]) ) {  $address_delete="0";}
    else {  $address_delete=  "1"; }
    
    if( empty($_POST["property_read"]) ) {  $property_read="0";}
    else {  $property_read=  "1"; }
    if( empty($_POST["property_edit"]) ) {  $property_edit="0";}
    else {  $property_edit=  "1"; }
    if( empty($_POST["property_delete"]) ) {  $property_delete="0";}
    else {  $property_delete=  "1"; }

    if( empty($_POST["task_read"]) ) {  $task_read="0";}
    else {  $task_read=  "1"; }
    if( empty($_POST["task_edit"]) ) {  $task_edit="0";}
    else {  $task_edit=  "1"; }
    if( empty($_POST["task_delete"]) ) {  $task_delete="0";}
    else {  $task_delete=  "1"; }

    if($address_read == '1' && $address_edit == '1' && $address_delete == '1' &&
    $property_read == '1' && $property_edit == '1' && $property_delete == '1' &&
    $task_read == '1' && $task_edit == '1' && $task_delete == '1'){

        $user=$userClass->makeAdmin($user_id,$company_id,"approved");
    }else{
        $user=$userClass->makeAdmin($user_id,$company_id,"pending");
    }

    $address_id=$userClass->addPrivildge($user_id,$company_id,$address_read,$address_edit,$address_delete,$property_read,
    $property_edit,$property_delete,$task_read,$task_edit,$task_delete);

    if($address_id)
    {
        //echo $address_basic_data_id1;
       echo "<script>alert('Priviledges Added');</script>";
       echo "<script>window.location = '../../../onoffice/user';</script>";;
    }
    else
    {
        echo "<script>alert('Error Occured try again ..');</script>";
       echo "<script>window.location = '../../../onoffice/user';</script>";;
     
    }
}
?>