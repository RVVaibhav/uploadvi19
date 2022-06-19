<?php
header('Content-Type: application/json; charset=utf-8');
$allow=true;
include("Config.php");


 $user_id=$_POST['user_id'];
  

 $result=$con->selectAmbiguity("question_report_table",$user_id);
       $cnt=mysqli_num_rows($result);
        if($cnt > 0){
        	     while($row=$result->fetch_assoc()){

            	    $report_id=$row['report_id'];
            	    $user_id=$row['user_id'];
                    $test_id=$row['test_id'];
            	    $admin_id=$row['adminId'];
                    $questionId=$row['questionId'];
                    $question_Comment=$row['question_Comment'];
            	    $reference=$row['reference'];
                    $created_at=$row['created_at'];
                    $updated_at=$row['updated_at'];
                    $question=$row['question'];
                    $option_1=$row['option_1'];
            	    $option_2=$row['option_2'];
                    $option_3=$row['option_3'];
                    $option_4=$row['option_4'];
                    $correct_option=$row['correct_option'];
                    $admin_id=$row['admin_id'];
                    $report=$row['report'];
                    $myReport=$row['myReport'];
                    $solution_id=$row['solution_id'];
                    $rep=$row['rep'];
                    $solution=$row['solution'];
                    $createdBy=$row['createdBy'];
                    $ref=$row['ref'];


            	   $arr[] =  array('report_id' =>$report_id,
                        'user_id' =>$user_id,
                        'test_id'=>$test_id,
                        'admin_id'=>$admin_id,
                        'questionId'=>$questionId,
                        'question_Comment'=>$question_Comment,
                        'reference'=>$reference,
                        'created_at'=>$created_at,
                        'updated_at'=>$updated_at,
                        'question'=>$question,
                        'option_1'=>$option_1,
                        'option_2'=>$option_2,
                        'option_3'=>$option_3,
                        'option_4'=>$option_4,
                        'correct_option'=>$correct_option,
 			'solution_id'=>$solution_id,
                        'rep'=>$rep,
                        'solution'=>$solution,
                        'createdBy'=>$createdBy,
                        'ref'=>$ref,
                        'admin_id'=>$admin_id);

         $array = [
                    "ambiguity"=> $arr,
                       'report' => $report,
                       'myReport' =>$myReport,
                       'stk' => 'SUCCESS!',
                       'Code' => '200'
                ];

       $profile = $array;

            	
        
        	 }

        }
	   else  {
            $profile = array('stk' => 'unsuccess','Code'=>'400');
        }
echo json_encode($profile,JSON_PRETTY_PRINT);
?>
