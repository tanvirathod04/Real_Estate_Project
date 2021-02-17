<?php
include("config.php");
if(isset($_GET["code"])){
    
    // Get access token
    $token_request_data = array (
        "grant_type" => "authorization_code",
        "code" => $_GET["code"],
        "redirect_uri" => redirect_uri,
        "scope" => implode(" ", scopes),
        "client_id" => client_id,
        "client_secret" => client_secret
    );
    $body = http_build_query($token_request_data);
    $response = runCurl(token_url, $body);
    $response = json_decode($response);
    $_SESSION["access_token"] = $response->access_token;
    
    // Get user email
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
    
    $_SESSION["user_email"] = $response->EmailAddress;
    
    header("Location: index.php");
}
 
?>