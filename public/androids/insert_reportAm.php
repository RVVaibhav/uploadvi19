<?php
header('Content-Type: application/json; charset=utf-8');
include("Config.php");
date_default_timezone_set('Asia/Kolkata');


        $user_id=$_POST['user_id'];
        $test_id=$_POST['test_id'];
        $adminId=$_POST['adminId'];
        $question_Comment=$_POST['question_Comment'];
        $questionId=$_POST['questionId'];
        $reference=$_POST['reference'];
        $created =date("Y-m-d H:i:s");

      
       $fields=array('user_id','test_id','adminId','question_Comment','reference','created_at','updated_at','questionId');
       $values=array($user_id,$test_id,$adminId,$question_Comment,$reference,$created,$created,$questionId);
       $result_insert=$con->insert('question_report_table',$fields,$values);
    //	echo $result_insert  ; exit;

 if($result_insert){
     $array = [
                      
                       'stk' => 'SUCCESS!',
                       'Code' => '200'
                   ];
         $vaiedu = $array;

	   }else {
     $vaiedu = array('stk' => 'unsucces','Code' => '400');
}

echo json_encode($vaiedu,JSON_PRETTY_PRINT);

?>
