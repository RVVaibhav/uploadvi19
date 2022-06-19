<?php
header('Content-Type: application/json; charset=utf-8');
$allow=true;
include("Config.php");

$user_id=$_POST['user_id'];
$test_id=$_POST['test_id'];

  $result=$con->selectAmbigutyTestList("result_test_questions",$user_id,$test_id);
        $cnt=mysqli_num_rows($result);
        if($cnt > 0){
        	     while($row=$result->fetch_assoc()){
                $test_id=$row['test_id'];
                $result_id=$row['result_id'];
                $selected_option=$row['selected_option'];
                $question_id=$row['question_id'];
                $question=$row['question'];
                $option_1=$row['option_1'];
                $option_2=$row['option_2'];
                $option_3=$row['option_3'];
                $option_4=$row['option_4'];
                $correct_option=$row['correct_option'];
                $admin_id=$row['admin_id'];
                $userId=$row['user_id'];


             $arr[] =  array('test_id'=>$test_id,'selected_option'=>$selected_option,'question_id'=>$question_id,'question' =>             $question,'option_1'=>$option_1,
    'option_2' =>$option_2,'option_3'=>$option_3,'option_4' =>$option_4,'correct_option' =>$correct_option,
            'admin_id' =>$admin_id,'userId'=>$userId);

         $array = [
                    "ht"=> $arr,
                    "stk"=>"SUCCESS!",
                    "Code"=>200,
                ];

       $huntygo = $array;
      }
  }
else{
      $huntygo = array('stk' => 'unsuccess',"Code"=>400);
  }
echo json_encode($huntygo,JSON_PRETTY_PRINT);
?>
