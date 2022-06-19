<?php
header('Content-Type: application/json; charset=utf-8');
include("Config.php");
date_default_timezone_set('Asia/Kolkata');

        $enj=$_POST['user_name'];
        $description=$_POST['description'];
        $user_id=$_POST['user_id'];
        $user_mobile=$_POST['user_mobile'];
        $date=$_POST['date'];
        $amount=$_POST['amount'];
        $time_now=mktime(date('h')+5,date('i')+30,date('s'));
        $created =date("Y-m-d",$time_now);
        $dates = date("Y-m-d");
       if($description === "Save Points"){
         $fields=array('dp_id','name','mobile','date','particular','credited','debited','created','updated');
         $values=array($user_id,$enj,$user_mobile,$dates,$description,$amount,0,$created,$created);
         $result_insert=$con->insert('wallet',$fields,$values);
       }else if($description === "getVedio"){
         $fields=array('dp_id','name','mobile','date','particular','credited','debited','created','updated');
         $values=array($user_id,$enj,$user_mobile,$dates,$description,0,$amount,$created,$created);
         $result_insert=$con->insert('wallet',$fields,$values);
       }else{
         $fields=array('dp_id','name','mobile','date','particular','credited','debited','created','updated');
         $values=array($user_id,$enj,$user_mobile,$dates,$description,0,$amount,$created,$created);
         $result_insert=$con->insert('wallet',$fields,$values);
       }
    	//echo $passcode; exit;
      //	echo $result_insert  ; exit;
		if($result_insert){
      $result=$con->getDataWallet($user_mobile,$dates);
      $cnt=mysqli_num_rows($result);
    //  echo $result_insert  ; exit;
     if($cnt==1){
       while($row=mysqli_fetch_assoc($result)){
             $mobile=$row['mobile'];
         	   $fname=$row['name'];
         	   $credited=$row['credited'];
         	   $id=$row['id'];
       }
        $profile['ht'][] = array('stk' => 'success','id' =>$id,'mobile'=>$mobile,'name'=>$fname,'credited'=>$credited,'Code' => '200');
      }
	   }else {
    $profile['ve'][] = array('stk' => 'unsucces','Code' => '400');
}
//echo $mhb;
echo json_encode($profile,JSON_PRETTY_PRINT);

?>
