<?php
    //session_start();
    
    // define your api credentils and redirect url
    define("client_id", "aff62767-51e9-4da4-bc03-3bbb6d5d4806");
    define("client_secret", "h=Wl_3=6uWVtWwe03y[a0jeJq0AphoCK");
    define("redirect_uri", "http://localhost/Real%20Estate%20Project/realestate/teamproq/office365/redirect.php");
    
    
    // Static urls
    define("scopes", array("offline_access", "openid","https://outlook.office.com/mail.read"));
    define("accessUrl", "https://login.microsoftonline.com/common/oauth2/v2.0/authorize?client_id=".client_id."&redirect_uri=".redirect_uri."&response_type=code&scope=".implode(" ", scopes));
    define("token_url", "https://login.microsoftonline.com/common/oauth2/v2.0/token");
    define("api_url", "https://outlook.office.com/api/v2.0");
?>