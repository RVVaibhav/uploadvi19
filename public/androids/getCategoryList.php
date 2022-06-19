<?php
header('Content-Type: application/json; charset=utf-8');
$allow=true;
include("Config.php");

  $result=$con->selectBystatus("categories");
      $cnt=mysqli_num_rows($result);
        if($cnt > 0){
        	     while($row=$result->fetch_assoc()){
            	   $category_name=$row['category_name'];
            	   $id=$row['id'];
            	  /* $lname=$row['last_name'];
            	   $mobile=$row['mobile_no'];
            	   $email=$row['email_id'];
            	   $password=$row['password'];
            	   $created=$row['created'];
            	   $modify=$row['modifydate'];
            	   $premium_status=$row['premium_status'];*/

            	   $huntygo['ht'][] = array('stk' => 'success','category_name' =>$category_name,'id'=>$id);
        	 }

        }
	   else
	    {
            $huntygo['ht'][] = array('stk' => 'unsuccess');
        }
echo json_encode($huntygo,JSON_PRETTY_PRINT);
?>
