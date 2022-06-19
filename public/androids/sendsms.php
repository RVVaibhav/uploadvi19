<?php
class smsmh
{
	public function sendsms($mobile_no,$message)
	{	//echo $message;
//	exit;
//Your authentication key
$authKey = "65888";

//Multiple mobiles numbers separated by comma
$mobileNumber = $mobile_no;

//echo $mobileNumber;
	//exit;
//Sender ID,While using route4 sender id should be 6 characters long.
$senderId = "mica";
$sendr="MICASS";
       // echo $message;
//	exit;
//Your message to send, Add URL encoding here.
//$fmessage.="your Verification Code of Mhbvadhuvar is".$message;
//$message = urlencode($message);
//$message = "your Verificarion Code for Mhb vahuvar is ".$message;
//echo $message;
//	exit;

//Define route 
$route = "550";
//Prepare you post parameters
$postData = array(
    'username' => $senderId,
    'password' => $authKey,
    'sender'=>"micass",//$sendr,
    'to' => $mobileNumber,
    'message' => $message,
    'format'=>'{json|text}',
    'route' => $route
);

//API URL
$url="http://203.129.225.68/API/WebSMS/Http/v1.0a/index.php?";

// init the resource
$ch = curl_init();
curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $postData,
    CURLOPT_FOLLOWLOCATION => true
));


//Ignore SSL certificate verification
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


//get response
$output = curl_exec($ch);

//Print error if any
if(curl_errno($ch))
{
    echo 'error:' . curl_error($ch);
}

curl_close($ch);

//echo print_r($ch);
//exit;
   }
	

public function sendsms1($mobileno,$message)
	{	
	    ECHO "SADSAD";
	   
		   $url ="http://203.129.225.68/API/WebSMS/Http/v1.0a/index.php?username=mica&password=65888&sender=MICASS&to=".$mobileno."&message=".$message." from mhbvadhuvar&reqid=1&format={json|text}&route_id=550";
		   header('location:'.$url);
//echo $url;
           
      
    }


	
	
}
?>