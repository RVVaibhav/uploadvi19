<?php
header('Content-Type: text/html; charset=utf-8');
$allow=true;
include("Config.php");
$test_id = null;
$i=0;

$test_id=$_POST['test_id'];

$result=$con->selectQuestions("question_bank","questions_in_test",$test_id);

function convToUtf8($str){
    if( mb_detect_encoding($str,"utf-8, ISO-8859-1, GBK")!="UTF-8" )
        return  iconv("gbk","utf-8",$str);
    else
        return $str;
}

if($result==true){
          while($row=$result->fetch_assoc()){
            $question_id=$row['question_id'];
             $subject_group_id=$row['subject_group_id'];
            $created_at=$row['created_at'];
            $updated_at=$row['updated_at'];
            $admin_id=$row['admin_id'];
            $option_1=$row['option_1'];
            $option_2=convToUtf8($row['option_2']);
            $option_3=$row['option_3'];
            $option_4=$row['option_4'];
            $option_5=$row['option_5'];


            $i++;
            $qID=$i;
            $correct_option=$row['correct_option'];
            $questions_selection_count=$row['questions_selection_count'];
            $arr[] =  array(
              'question_id' =>$question_id,
              'subject_group_id'=>$subject_group_id,
              'admin_id' =>$admin_id,
              'qid' =>$qID,
              'questionsd' =>$questions,
              'option_1'=>$option_1,
              'option_2'=>$option_2,
              'option_3'=>$option_3,
              'option_4' =>$option_4,
              'correct_option' =>$correct_option,
              'questions_selection_count'=>$questions_selection_count,
               'updated_at'=>$updated_at,
               'created_at'=>$created_at);

       $array = [
                    "data"=> $arr,
                    'success' => true,
                    'message' => 'Contacts Found SuccessFully!'
              ];

     $profile = $array;

      }

      }else{
          $profile = array('success' => false,'message' => 'Contacts Not Found!');
      }
    echo json_encode($profile,JSON_PRETTY_PRINT,JSON_UNESCAPED_UNICODE);


?>
