<?php
header('Content-Type: application/json; charset=utf-8');
$allow=true;
include("Config.php");

$test_header_1_id=$_POST['test_header_1_id'];
$test_header_2_id=$_POST['test_header_2_id'];
$test_header_3_id=$_POST['test_header_3_id'];


  $result=$con->selectHeaders("test_header_4",$test_header_1_id,$test_header_2_id,$test_header_3_id);
        $cnt=mysqli_num_rows($result);
        if($cnt > 0){
        	     while($row=$result->fetch_assoc()){
            	   $test_header_3_id=$row['test_header_3_id'];
            	   $test_header_1_id=$row['test_header_1_id'];
                   $test_header_2_id=$row['test_header_2_id'];
                   $test_header_4_id=$row['test_header_4_id'];
            	   $test_header_4=$row['test_header_4'];

            
            	    $huntygo['ht'][] = array('stk' => 'success','test_header_3_id' =>$test_header_3_id,'test_header_4_id' =>$test_header_4_id,
                 'test_header_1_id' =>$test_header_1_id,'test_header_2_id' =>$test_header_2_id,'test_header_4' =>$test_header_4);

                  $arr[] = array('stk' => 'success','test_header_3_id' =>$test_header_3_id,'test_header_4_id' =>$test_header_4_id,
                 'test_header_1_id' =>$test_header_1_id,'test_header_2_id' =>$test_header_2_id,'test_header_4' =>$test_header_4);

                        $array = [
                                     "headers"=> $arr,
                                     'success' => true,
                                     'message' => 'Found SuccessFully!'
                               ];

                      $profile = $array;
        	 }

        }
	   else  {
            $profile['headers'][] = array('stk' => 'unsuccess');
        }
echo json_encode($profile,JSON_PRETTY_PRINT);
?>

