<?php
header('Content-Type: application/json; charset=utf-8');
include("Config.php");
date_default_timezone_set('Asia/Kolkata');

        $name=$_POST['user_name'];
        $email=$_POST['user_email'];
        $mobile=$_POST['user_mobile'];
        $address=$_POST['user_address'];
        $ugC=$_POST['ug_college'];
        $city=$_POST['city'];
        $state=$_POST['state'];
        $userId=$_POST['user_id'];
        $created =date("Y-m-d H:i:s");

       $fields=array('user_name','user_email','user_address','user_mobile','ug_college','city','state','created_at','updated_at','user_id');
       $values=array($name,$email,$address,$mobile,$ugC,$city,$state,$created,$created,$userId);
       $result_insert=$con->insert('user_purchase_notes',$fields,$values);
      // echo $result_insert  ; exit;
   if($result_insert == 1){
      $array = [
                      
                       'stk' => 'SUCCESS!',
                       'Code' => '200'
                   ];
         $profile = $array;
    
	   }else {
    $profile = array('stk' => 'unsucces','Code' => '400');
}

echo json_encode($profile,JSON_PRETTY_PRINT);

?>
