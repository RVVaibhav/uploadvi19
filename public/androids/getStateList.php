<?php
header('Content-Type: application/json; charset=utf-8');
$allow=true;
include("Config.php");

  $result=$con->selectState("master_states");
        if($result==true){
        	     while($row=$result->fetch_assoc()){
            	   $states_name=$row['state_name'];
            	   $state_id=$row['id'];
            	  /* $lname=$row['last_name'];
            	   $mobile=$row['mobile_no'];
            	   $email=$row['email_id'];
            	   $password=$row['password'];
            	   $created=$row['created'];
            	   $modify=$row['modifydate'];
            	   $premium_status=$row['premium_status'];*/



        	   $arr[] =  array('states_name' =>$states_name,'id'=>$state_id);

           $array = [
                       "data"=> $arr,
                       'stk' => 'SUCCESS!',
                       'Code' => '200'
                ];

           $huntygo = $array;


            	  // $huntygo[] = array('stk' => 'success','states_name' =>$states_name,'id'=>$state_id);
        	 }

        }
	   else
	    {
            $huntygo[] = array('stk' => 'unsuccess');
        }
echo json_encode($huntygo,JSON_PRETTY_PRINT);
?>
