<?php
header('Content-Type: application/json; charset=utf-8');
$allow=true;
include("Config.php");

  $result=$con->selectComponent("master_component");
        if($result==true){
        	     while($row=$result->fetch_assoc()){
            	   $component_name=$row['component_name'];
            	   $com_id=$row['com_id'];
            	   $component_uri=$row['component_uri'];
            	  /*   $mobile=$row['mobile_no'];
            	   $email=$row['email_id'];
            	   $password=$row['password'];
            	   $created=$row['created'];
            	   $modify=$row['modifydate'];
            	   $premium_status=$row['premium_status'];*/

            	    // $huntygo[] = array('stk' => 'success','component_name' =>$component_name,'id'=>$com_id,'component_uri'=>$component_uri);


                  $arr[] =  array('component_name' =>$component_name,'id'=>$com_id,'component_uri'=>$component_uri);

                $array = [
                            "component"=> $arr,
                            'stk' => 'SUCCESS!',
                            'Code' => '200'
                     ];

                $huntygo = $array;

        	 }

        }
	   else
	    {
            $huntygo[] = array('stk' => 'unsuccess');
        }
      echo json_encode($huntygo,JSON_PRETTY_PRINT);
?>
