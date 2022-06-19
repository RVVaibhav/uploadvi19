<?php
header('Content-Type: application/json; charset=utf-8');
include("Config.php");
date_default_timezone_set('Asia/Kolkata');

        $name=$_POST['user_name'];
        $email=$_POST['user_email'];
        $mobile=$_POST['user_mobile'];
        $password=$_POST['user_password'];
        $ugC=$_POST['ug_college'];
        $city=$_POST['city'];
        $state=$_POST['state'];
        $uniqueId=$_POST['uniqueId'];
      	$passcode=sha1($password);
        $time_now=mktime(date('h')+5,date('i')+30,date('s'));
        $created =date("Y-m-d");
        $verificationCode = mt_rand(100000,999990);
        $result=$con->selectbykey($mobile);
        $resultE=$con->selectbykeyEmail($email);
        $cntE=mysqli_num_rows($resultE);
        $cnt=mysqli_num_rows($result);
        if($cntE ==0){
          if($cnt==0){
             $fields=array('user_name','user_email','user_password','user_mobile','ug_college','city','state','otp','uniqueId','status','created_at','updated_at');
              $values=array($name,$email,$passcode,$mobile,$ugC,$city,$state,$verificationCode,$uniqueId,"inactive",$created,$created);
              $result_insert=$con->insert('vision_registration',$fields,$values);
            if($result_insert){
           $results=$con->getData($mobile);
           $cnts=mysqli_num_rows($results);
          if($cnts > 0){
            while($row=mysqli_fetch_assoc($results)){
              $user_id=$row['id'];
              $user_name=$row['user_name'];
              $user_email=$row['user_email'];
              $user_password=$row['user_password'];
              $user_mobile=$row['user_mobile'];
              $otp=$row['otp'];
              $city=$row['city'];
              $uniqueId=$row['uniqueId'];
              $state=$row['state'];
              $ug_college=$row['ug_college'];
              $created_at=$row['created_at'];
              $updated_at=$row['updated_at'];
            }
            $array = [
                         "data"=> [
                         'user_id' =>$user_id,
                         'user_name' =>$user_name,
                          'user_email'=>$user_email,
                          'user_password'=>$user_password,
                          'user_mobile'=>$user_mobile,
                          'otp'=>$otp,
                          'city'=>$city,
                          'state'=>$state,
                          'uniqueId'=>$uniqueId,
                          'ug_college'=>$ug_college,
                          'updated_at'=>$updated_at,
                          'created_at'=>$created_at
                             ],
                         'stk' => 'success',
                         'Code' => '200'
                     ];
           $profile = $array;
           }
          }else {
            $profile = array('stk' => 'unsucces','Code' => '400');

       	   }
          }else {
           $profile = array('stk' => 'Mobile already Exits! ','Code' => '400');;
       }
     }else {
        $profile = array('stk' => 'Email already Exits! ','Code' => '400');;
     }

//echo $mhb;
echo json_encode($profile,JSON_PRETTY_PRINT);



?>
