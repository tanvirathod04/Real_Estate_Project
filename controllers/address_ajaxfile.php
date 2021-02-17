<?php
include 'config.php';
include('../session.php');
$userDetails=$userClass->userDetails($session_uid);
//echo $userDetails->company_id;
$db = getDB();
## Read value

$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value

$searchArray = array();

## Search 
$searchQuery = " ";
if($searchValue != ''){
	$searchQuery = " AND (first_name LIKE :first_name or 
        client_no LIKE :client_no OR 
        entry_date LIKE :entry_date ) ";
    $searchArray = array( 
        'first_name'=>"%$searchValue%", 
        'client_no'=>"%$searchValue%",
        'entry_date'=>"%$searchValue%"
    );
}

## Total number of records without filtering
$stmt = $db->prepare("SELECT COUNT(*) AS allcount FROM onoffice_address WHERE company_id =".$userDetails->company_id);
$stmt->execute();
$records = $stmt->fetch();
$totalRecords = $records['allcount'];

## Total number of records with filtering
$stmt = $db->prepare("SELECT COUNT(*) AS allcount FROM onoffice_address WHERE company_id =".$userDetails->company_id.$searchQuery);
$stmt->execute($searchArray);
$records = $stmt->fetch();
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$stmt = $db->prepare("SELECT * FROM onoffice_address WHERE company_id = ".$userDetails->company_id.$searchQuery." ORDER BY ".$columnName." ".$columnSortOrder." LIMIT :limit,:offset");

// Bind values
foreach($searchArray as $key=>$search){
    $stmt->bindValue(':'.$key, $search,PDO::PARAM_STR);
}

$stmt->bindValue(':limit', (int)$row, PDO::PARAM_INT);
$stmt->bindValue(':offset', (int)$rowperpage, PDO::PARAM_INT);
$stmt->execute();
$empRecords = $stmt->fetchAll();

$data = array();

foreach($empRecords as $row){
    $data[] = array(       
            
"id"=> $row["id"],
"client_no"=> $row["client_no"],
"salutation" => $row["salutation"],
"entry_date" => $row["entry_date"],
"first_name" => $row["first_name"],
"name" => $row["name"],
"telefon1" => $row["telefon1"],
"telefon2" => $row["telefon2"],
"mobile" => $row["mobile"],
"main_contact" => $row["main_contact"],
"company" => $row["company"],
"city" => $row["city"],
"zip" => $row["zip"],
"country" => $row["country"]
        );
}

## Response
$response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $data
);

echo json_encode($response);
