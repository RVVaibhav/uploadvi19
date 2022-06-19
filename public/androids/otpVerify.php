<?php
header('Content-Type: application/json; charset=utf-8');
include("Config.php");
date_default_timezone_set('Asia/Kolkata');
    $mobile=$_POST['mobile'];
    $otp=$_POST['otp'];
    $result=$con->otpVerify($mobile,$otp);
	  $cnt=mysqli_num_rows($result);
//	echo $cnt; exit;
	 if($cnt > 0){
		while($row=mysqli_fetch_assoc($result)){
      $fname=$row['user_name'];
     $email=$row['user_email'];
      $mobile=$row['user_mobile'];
      $otp=$row['otp'];
     $id=$row['user_id'];
     $key=$row['user_password'];
      $ugC = $row['ug_college'];
      $city = $row['city'];
     $state= $row['state'];


    }
        $array = [
                  "data"=> [array(
                    'key' =>$key,
                    'id' =>$id,
                    'mobile'=>$mobile,
                    'name'=>$fname,
                    'email'=>$email,
                    'ugC'=>$ugC,
                    'city'=>$city,
                    'state'=>$state)
                      ],
                  'stk' => 'success',
                  'Code' => '200'
              ];
    $profile = $array;
    }else {
     $profile = array('stk' => 'unsucces','Code' => '400');

	   }
//echo $mhb;
echo json_encode($profile,JSON_PRETTY_PRINT);

?>
