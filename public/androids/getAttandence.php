<?php
header('Content-Type: application/json; charset=utf-8');
$allow=true;
include("Config.php");

$test_id=$_POST['test_id'];

  $result=$con->getAttandance("result_test_questions",$test_id);
  if($result==true){
         while($row=$result->fetch_assoc()){
          $counts=$row['counts'];

      }

      $array = array( 'counts' =>$counts,
       'stk' => 'success',
       'Code' => '200');
                      
        $profile = $array;
  }
else{
      $profile[] = array('stk' => 'unsuccess');
  }
echo json_encode($profile,JSON_PRETTY_PRINT);
?>
