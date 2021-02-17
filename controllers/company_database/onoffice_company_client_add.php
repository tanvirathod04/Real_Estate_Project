<?php 
include("../config.php");
include('../companyClass.php');
include('../userClass.php');
include('../teamproquserClass.php');
$companyClass = new companyClass();
$userClass = new userClass();
$teamproquserClass = new teamproquserClass();

$errorMsgReg='';
$errorMsgLogin='';
//if (!empty($_POST['signupSubmit'])) 


if($_SERVER['REQUEST_METHOD']=='POST')
{
    $company=$_POST['company'];
    $uemail=$_POST['email'];
    $upassword=$_POST['password'];
    $fax=$_POST['fax'];
    $url=$_POST['url'];
    $package_name=$_POST['package_name'];
    if($package_name == 'basic'){
        $employee_count=1;
    }else if($package_name == 'standard'){
        $employee_count=3;
    }
    
    //$logo=$_POST['logo'];
    $logo=$_FILES['logo']['name'];
    $phone=$_POST['phone'];
    $country=$_POST['country'];
    $language=$_POST['language'];
    $address=$_POST['address'];

    $temp=$_FILES['logo']['tmp_name'];
    move_uploaded_file($temp,"../../images/".$logo);

    $cid=$companyClass->companyRegistration($upassword,$uemail,$company,$fax,$logo,$phone,
    $country,$language,$address,$package_name,$employee_count,$url);
   
    if($cid)
    {
        $company_data=$companyClass->companyId($company);
        if($package_name=='basic'){
            $uid=$userClass->userRegistration($company_data->company_id,"",$upassword,$uemail,$company,$company,$company,$phone,$fax,$logo,$phone,
            $country,$language,"",$address,"",$address,"approved");
        }else if($package_name=='standard'){
            $uid=$userClass->userRegistration($company_data->company_id,"",$upassword,$uemail,$company,$company,$company,$phone,$fax,$logo,$phone,
            $country,$language,"",$address,"",$address,"approved");
            /*$uid=$teamproquserClass->userRegistration($company_data->company_id,"",$upassword,$uemail,$company,$company,$company,$phone,$fax,$logo,$phone,
            $country,$language,"",$address,"",$address,"approved");*/
        }
        
        
        if($uid)
        {
            $activationcode=md5($email.time());
            $to=$email;
            $msg= "Thanks for new Registration.";
            $subject="Email verification (phpgurukul.com)";
            $headers .= "MIME-Version: 1.0"."\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
            $headers .= 'From:ThoratSoftwares<thoratglobalsoftwares@gmail.com>'."\r\n";
            $ms.="<html></body><div><div>Dear $lname,</div></br></br>";
            $ms.="<div style='padding-top:8px;'>Please click The following link For verifying and activation of your account</div>
            <div style='padding-top:10px;'><a href='http://www.phpgurukul.com/demos/emailverify/email_verification.php?code=$activationcode'>Click Here</a></div>
            <div style='padding-top:4px;'>Powered by <a href='phpgurukul.com'>phpgurukul.com</a></div></div>
            </body></html>";
            mail($to,$subject,$ms,$headers);
            echo "<script>alert('Registration successful, please verify in the registered Email-Id');</script>";
            echo "<script>window.location = '../../signin.php';</script>";;
        }else{
            echo "<script>alert('Username or Email already exists.');</script>";
            //echo "<script>window.location = '../../onoffice/dashboard/company_signup.php';</script>";;
            echo "<script> window.history.back();</script>";
        }
        
    }
    else
    {
        echo "<script>alert('Username or Email already exists.');</script>";
        //echo "<script>window.location = '../../onoffice/dashboard/company_signup.php';</script>";;
        echo "<script> window.history.back();</script>";
     
    }
}
?>