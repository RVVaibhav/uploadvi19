<?php
header('Content-Type: application/json; charset=utf-8');
$allow=true;
include("Config.php");
$test_id = null;
$i=0;

$test_id=$_POST['test_id'];

$result=$con->selectQuestions("question_bank","questions_in_test",$test_id);
       $cnt=mysqli_num_rows($result);
        if($cnt > 0){
        	     while($row=$result->fetch_assoc()){
                     $i++;
            	   $question_id=$row['question_id'];
            	   $subject_group_id=$row['subject_group_id'];
            	   $question=$row['question'];
                 $option_1=$row['option_1'];
                 $qID=$i;
            	   $option_2=$row['option_2'];
            	   $option_3=$row['option_3'];
            	   $option_4=$row['option_4'];
            	   $option_5=$row['option_5'];
                 $correct_option=$row['correct_option'];
                 $questions_selection_count=$row['questions_selection_count'];
            	   $admin_id=$row['admin_id'];
                 $created_at=$row['created_at'];
                 $updated_at=$row['updated_at'];

            	  $huntygo['question'][] = array('stk' => 'success','question_id' =>$question_id,
                 'subject_group_id'=>$subject_group_id,
                'question' =>$question,'option_1'=>$option_1,'option_2'=>$option_2,'option_3'=>$option_3,
                'option_4' =>$option_4,'option_5'=>$option_5,'correct_option' =>$correct_option,'questions_selection_count'=>$questions_selection_count,'qid' =>$qID,
                'admin_id' =>$admin_id,'created_at'=>$created_at,'updated_at' =>$updated_at);
        	 }

        }
	   else
	    {
            $huntygo['question'][] = array('stk' => 'unsuccess');
        }
echo json_encode($huntygo,JSON_PRETTY_PRINT);
?>
