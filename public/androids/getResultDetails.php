<?php
header('Content-Type: application/json; charset=utf-8');
include("Config.php");
date_default_timezone_set('Asia/Kolkata');

        $user_id=$_POST['user_id'];
        $test_id=$_POST['test_id'];
        $attempted_questions=$_POST['attempted_questions'];
        $unattempted_questions=$_POST['unattempted_questions'];
        $correct_questions=$_POST['correct_questions'];
        $incorrect_questions=$_POST['incorrect_questions'];
        $tagged_questions=$_POST['tagged_questions'];
        $total_score=$_POST['total_score'];
        $created =date("Y-m-d H:i:s");
        $result_status=$_POST['result_status'];
        $result_time= date('H:i:s');
        $result_date =date("Y-m-d");

       $fields=array      ('user_id','test_id','result_date','result_time','attempted_questions','unattempted_questions','correct_questions','incorrect_questions','tagged_questions',
'total_score','result_status','created_at','updated_at');

       $values=array($user_id,$test_id,$result_date,$result_time,$attempted_questions,$unattempted_questions,$correct_questions,$incorrect_questions,$tagged_questions,$total_score,$result_status,$created,$created);
       $result_insert=$con->insertResult('result_details',$fields,$values);
    	//echo $result_insert  ; exit;
   if($result_insert){
      $result=$con->getResultDetails($user_id,$test_id);
      $cnt=mysqli_num_rows($result);
     if($cnt > 0){
       while($row=mysqli_fetch_assoc($result)){
                   $user_id=$row['user_id'];
         	   $test_id=$row['test_id'];
         	   $attempted_questions=$row['attempted_questions'];
         	   $correct_questions=$row['correct_questions'];
         	   $incorrect_questions=$row['incorrect_questions'];
                   $tagged_questions=$row['tagged_questions'];
         	   $total_score=$row['total_score'];
                   $rank=$row['rank'];
         	   $attempted_questions=$row['attempted_questions'];
         	   $result_status=$row['result_status'];
                   $result_time=$row['result_time'];
         	   $result_date=$row['result_date'];
         	   
       }
        $array = [
                       "resultdetails"=> [array(
                         'user_id' =>$user_id,
                         'test_id' =>$test_id,
                         'rank' =>$rank,
                        'attempted_questions'=>$attempted_questions,
                        'correct_questions'=>$correct_questions,
                        'incorrect_questions'=>$incorrect_questions,
                        'tagged_questions'=>$tagged_questions,
                        'total_score'=>$total_score,
                        'attempted_questions'=>$attempted_questions,
                        'result_status'=>$result_status,
                        'result_time'=>$result_time,
                        'result_date'=>$result_date)


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
