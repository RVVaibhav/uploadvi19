<?php
header('Content-Type: application/json; charset=utf-8');
$allow=true;
include("Config.php");

$type=$_POST['type'];



  $result=$con->selectVisionMnemonics("vision_mnemonics");
      $cnt=mysqli_num_rows($result);
        if($cnt > 0){
        	     while($row=$result->fetch_assoc()){
            	    $id=$row['id'];
            	    $title=$row['title'];
                  $description=$row['description'];
            	    $admin_id=$row['admin_id'];
                  $created_at=$row['created_at'];
                  $updated_at=$row['updated_at'];
            	    $huntygo['nm'][] = array('stk' => 'success','id' =>$id,
                 'title' =>$title,'description' =>$description,'admin_id' =>$admin_id,'created_at' =>$created_at,'updated_at' =>$updated_at);
        	 }

        }
	   else  {
            $huntygo['nm'][] = array('stk' => 'unsuccess');
        }
echo json_encode($huntygo,JSON_PRETTY_PRINT);
?>
