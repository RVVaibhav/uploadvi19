<?php
header('Content-Type: application/json; charset=utf-8');
$allow=true;
include("Config.php");

$type=$_POST['type'];



  $result=$con->selectQFData("vision_question_format",$type);
       $cnt=mysqli_num_rows($result);
        if($cnt > 0){
        	     while($row=$result->fetch_assoc()){
            	    $id=$row['id'];
            	    $title=$row['title'];
                  $question_format=$row['question_format'];
            	    $description=$row['description'];
            	    $huntygo['qt'][] = array('stk' => 'success','id' =>$id,
                 'title' =>$title,'question_format' =>$question_format,'description' =>$description);
        	 }

        }
	   else  {
            $huntygo['qt'][] = array('stk' => 'unsuccess');
        }
echo json_encode($huntygo,JSON_PRETTY_PRINT);
?>
