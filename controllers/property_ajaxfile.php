<?php
include 'config.php';
include('../session.php');
$userDetails=$userClass->userDetails($session_uid);
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
	$searchQuery = " AND (Data_Record_Ref_No LIKE :Data_Record_Ref_No or 
        Status LIKE :Status OR
        Agent LIKE :Agent OR
        Type_of_order LIKE :Type_of_order OR
        Order_Until LIKE :Order_Until OR 

        Sold_on LIKE :Sold_on OR
        property_title LIKE :property_title OR
        country LIKE :country OR
        Property_type LIKE :Property_type OR 
        Property_External LIKE :Property_External ) ";
    $searchArray = array( 
        'Data_Record_Ref_No'=>"%$searchValue%", 
        'Status'=>"%$searchValue%",
        'Agent'=>"%$searchValue%",
        'Type_of_order'=>"%$searchValue%",
        'Order_Until'=>"%$searchValue%",

        'Sold_on'=>"%$searchValue%",
        'property_title'=>"%$searchValue%",
        'country'=>"%$searchValue%",
        'Property_type'=>"%$searchValue%",
        'Property_External'=>"%$searchValue%"
    );
}

## Total number of records without filtering
$stmt = $db->prepare("SELECT COUNT(*) AS allcount FROM onoffice_property_basic_data WHERE company_id =".$userDetails->company_id);
$stmt->execute();
$records = $stmt->fetch();
$totalRecords = $records['allcount'];

## Total number of records with filtering
$stmt = $db->prepare("SELECT COUNT(*) AS allcount FROM onoffice_property_basic_data WHERE company_id =".$userDetails->company_id.$searchQuery);
$stmt->execute($searchArray);
$records = $stmt->fetch();
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$stmt = $db->prepare("SELECT * FROM onoffice_property_basic_data WHERE company_id=".$userDetails->company_id.$searchQuery." ORDER BY ".$columnName." ".$columnSortOrder." LIMIT :limit,:offset");

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
"Data_Record_Ref_No"=> $row["Data_Record_Ref_No"],
"Status" => $row["Status"],
"Property_External" => $row["Property_External"],
"Agent" => $row["Agent"],
"Type_of_order" => $row["Type_of_order"],
"Order_Until" => $row["Order_Until"],
"Sold_on" => $row["Sold_on"],
"property_title" => $row["property_title"],
"country" => $row["country"],
"Property_type" => $row["Property_type"],
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
