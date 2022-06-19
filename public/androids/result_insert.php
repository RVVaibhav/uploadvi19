<?php
header('Content-Type: application/json; charset=utf-8');
include("Config.php");
date_default_timezone_set('Asia/Kolkata');


        $user_id=$_POST['user_id'];
        $test_id=$_POST['test_id'];
        $is_attempted=$_POST['is_attempted'];
        $question_id=$_POST['question_id'];
        $selected_option=$_POST['selected_option'];
        $is_tagged=$_POST['is_tagged'];
        $created_at=date("Y-m-d");
      	$updated_at=date("Y-m-d");
        $fields=array('user_id','test_id','is_attempted','question_id','selected_option','is_tagged','created_at','updated_at');
        $values=array($user_id,$test_id,$is_attempted,$question_id,$selected_option,$is_tagged,$created_at,$updated_at);
        $result_insert=$con->insertResult('result_test_questions',$fields,$values);
      //	echo $result_insert  ; //exit;
    if($result_insert){
     $result=$con->getResultData($user_id,$test_id);
     $cnt=mysqli_num_rows($result);
    if($cnt > 0){
      while($row=mysqli_fetch_assoc($result)){
            $result_id=$row['result_id'];
            $user_id=$row['user_id'];
            $test_id=$row['test_id'];
            $question_id=$row['question_id'];
            $is_attempted=$row['is_attempted'];
            $selected_option=$row['selected_option'];
            $is_tagged=$row['is_tagged'];
                  //$otp=$row['otp'];
      }

      $array = [
                       "ResultData"=> [array(
                         'result_id' =>$result_id,
                         'user_id' =>$user_id,
                        'test_id'=>$test_id,
                        'question_id'=>$question_id,
                        'is_attempted'=>$is_attempted,
                        'selected_option'=>$selected_option,
                        'is_tagged'=>$is_tagged)


                           ],
                       'stk' => 'success',
                       'Code' => '200'
                   ];
        $profile = $array;
     }

	   }else {
      $profile = array('stk' => 'unsucces','Code' => '400');
}

echo json_encode($profile,JSON_PRETTY_PRINT);

?>
