<?php
include("../../header.php");
include("config_office.php");

if(isset($_SESSION["access_token"])) {
    echo "<a href='index.php''>Home</a>";
    
    echo " || <a href='index.php?list_email=true'>List Email</a>";
    
    echo " || <a href='index.php?profile=true'>Profile</a>";
    
    echo " || <a href='logout.php'>Logout</a><br/><br/>";
    
    if(isset($_GET["profile"])) {
        view_profile();
    }
    else if(isset($_GET["list_email"])) {
        list_email();
    }
    else if(isset($_GET["view_email"])) {
        view_email();
    }
}
else{
    $accessUrl = accessUrl;
    echo "<div class='clearfix text-center m-t'>
    <a href='$accessUrl' class='btn btn-primary btn-block'>Login with Office 365</a>
    <div class='clearfix text-center m-t'>";
   // <button onclick='window.location.href = '$accessUrl';' class='btn btn-primary '>Login with Office 365</button>
}

function view_profile() {
    $headers = array(
        "User-Agent: phplift.net/1.0",
        "Authorization: Bearer ".$_SESSION["access_token"],
        "Accept: application/json"
    );
    $outlookApiUrl = api_url."/Me";
    $response = runCurl($outlookApiUrl, null, $headers);
    $response = explode("\n", trim($response));
    $response = $response[count($response) - 1];
    $response = json_decode($response);
    
    echo "User ID: ".$response->Id."<br><br>";
    echo "User Email: ".$response->EmailAddress;
}

function list_email() {
    $headers = array(
        "User-Agent: phplift.net/1.0",
        "Authorization: Bearer ".$_SESSION["access_token"],
        "Accept: application/json",
        "X-AnchorMailbox: ". $_SESSION["user_email"]
    );
    $top = 10;
    $skip = isset($_GET["skip"]) ? intval($_GET["skip"]) : 0;
    $search = array (
        // Only return selected fields
        "\$select" => "Subject,ReceivedDateTime,Sender,From,ToRecipients,HasAttachments,BodyPreview",
        // Sort by ReceivedDateTime, newest first
        "\$orderby" => "ReceivedDateTime DESC",
        // Return at most n results
        "\$top" => $top, "\$skip" => $skip
    );
    $outlookApiUrl = api_url . "/Me/MailFolders/Inbox/Messages?" . http_build_query($search);
    $response = runCurl($outlookApiUrl, null, $headers);
    $response = explode("\n", trim($response));
    $response = $response[count($response) - 1];
    $response = json_decode($response, true);
    //echo "<pre>"; print_r($response); echo "</pre>";
    if(isset($response["value"]) && count($response["value"]) > 0) {
        echo "<style type='text/css'>td{border: 2px solid #cccccc;padding: 30px;text-align: center;vertical-align: top;}</style>";
        echo "<table style='width: 100%;'><tr><th>From</th><th>Subject</th><th>Preview</th></tr>";
        foreach ($response["value"] as $mail) {
            $BodyPreview = str_replace("\n", "<br/>", $mail["BodyPreview"]);
            echo "<tr>";
            echo "<td>".$mail["From"]["EmailAddress"]["Address"].
                "<br/><a target='_blank' href='?view_email=".$mail["Id"]."'>View Email</a>";
            if($mail["HasAttachments"] == 1) {
                echo "<br/><a target='_blank' href='?view_attachments=".$mail["Id"]."'>View Attachments</a>";
            }
            echo "</td><td>".$mail["Subject"]."</td>";
            echo "<td>".$BodyPreview."</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    else {
        echo "<div><h3><i>No email found</i></h3></div>";
    }
    $prevLink = "";
    if($skip > 0) {
        $prev = $skip - $top;
        $prevLink = "<a href='?list_email=true&skip=".$prev."'>Previous Page</a>";
    }
    if(isset($response["@odata.nextLink"])) {
        if($prevLink != "") {
            $prevLink .= " ||| ";
        }
        echo "<br/>".$prevLink."<a href='?list_email=true&skip=".($skip + $top)."'>Next Page</a>";
    }
    else {
        echo "<br/>" . $prevLink;
    }
}

function view_email() {
    $mailID = $_GET["view_email"];
    $headers = array(
        "User-Agent: phplift.net/1.0",
        "Authorization: Bearer ".$_SESSION["access_token"],
        "Accept: application/json",
        "X-AnchorMailbox: ".$_SESSION["user_email"]
    );
    $outlookApiUrl = api_url . "/me/Messages('$mailID')";
    $response = runCurl($outlookApiUrl, null, $headers);
    $response = explode("\n", trim($response));
    $response = $response[count($response) - 1];
    $response = json_decode($response, true);
    echo "From: ".$response['Sender']['EmailAddress']['Name']." (".$response['Sender']['EmailAddress']['Address'].")<br>";
    echo "To: ";
    foreach($response['ToRecipients'] as $to)
    {
        echo $to['EmailAddress']['Name']." (".$to['EmailAddress']['Name'].") ";
    }
    echo "<br>";
    $ReceivedDateTime = date("Y-m-d H:i:s",mktime($response['ReceivedDateTime']));
    echo "Received on: ".$ReceivedDateTime."<br>";
    echo "Subject: ".$response['Subject']."<br><br><hr />";
    
    echo $response['Body']['Content'];
}

include("../footer.php");
?>