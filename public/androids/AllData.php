<?php
header('Content-Type: application/json; charset=utf-8');
$allow=true;

include("Config.php");
$result=$con->selectTestList("test_details");
       $cnt=mysqli_num_rows($result);
        if($cnt > 0){
        	     while($row=$result->fetch_assoc()){
            	   $test_id=$row['test_id'];
            	   $test_header_3_id=$row['test_header_3_id'];
            	   $test_header_1_id=$row['test_header_1_id'];
                 $test_header_2_id=$row['test_header_2_id'];
            	   $test_header_4_id=$row['test_header_4_id'];
            	   $test_name=$row['test_name'];
            	   $description=$row['description'];
            	   $duration=$row['duration'];
            	   $start_date=$row['start_date'];
                 $expire_date=$row['expire_date'];
                 $attempt_limit=$row['attempt_limit'];
                 $correct_score=$row['correct_score'];
                 $is_view_correct_answers_allowed=$row['is_view_correct_answers_allowed'];
                 $incorrect_score=$row['incorrect_score'];
                 $created_at=$row['created_at'];
                 $updated_at=$row['updated_at'];
                 $admin_id=$row['admin_id'];
                 $num_questions=$row['num_questions'];
                 $total_marks=$row['total_marks'];

                 $huntygo['ht'][] = array('stk' => 'success','test_id' =>$test_id,'test_header_3_id'=>$test_header_3_id,
                'test_header_1_id' =>$test_header_1_id,'test_header_2_id'=>$test_header_2_id,'num_questions' =>$num_questions,'total_marks' =>$total_marks,
                'test_header_4_id' =>$test_header_4_id,'test_name'=>$test_name,'description' =>$description,'duration'=>$duration,
                'start_date' =>$start_date,'expire_date'=>$expire_date,'attempt_limit' =>$attempt_limit,'incorrect_score'=>$incorrect_score,
                'correct_score' =>$correct_score,'is_view_correct_answers_allowed' =>$is_view_correct_answers_allowed,'$created_at' =>$created_at,'updated_at' =>$updated_at,'admin_id' =>$admin_id);
        	 }

        }
	   else
	    {
            $huntygo['ht'][] = array('stk' => 'unsuccess');
        }
echo json_encode($huntygo,JSON_PRETTY_PRINT);
?>
