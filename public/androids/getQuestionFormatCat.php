<?php
header('Content-Type: application/json; charset=utf-8');
$allow=true;
include("Config.php");

$type=$_POST['type'];



  $result=$con->selectQFDatas("question_format_category");
        if($result==true){
        	     while($row=$result->fetch_assoc()){
            	    $id=$row['id'];
            	    $question_format_cat=$row['question_format_cat'];
                  $created_at=$row['created_at'];
            	    $updated_at=$row['updated_at'];
            	    $huntygo['qt'][] = array('stk' => 'success','id' =>$id,
                 'question_format_cat' =>$question_format_cat,'created_at' =>$created_at,'updated_at' =>$updated_at);
        	 }

        }
	   else  {
            $huntygo['ht'][] = array('stk' => 'unsuccess');
        }
echo json_encode($huntygo,JSON_PRETTY_PRINT);
?>
