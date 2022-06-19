<?php
header('Content-Type: application/json; charset=utf-8');
$allow=true;
include("Config.php");

  $result=$con->selectStudyTipsData("reading_stuff_text");
       $cnt=mysqli_num_rows($result);
        if($cnt > 0){
        	     while($row=$result->fetch_assoc()){
            	    $id=$row['id'];
            	   $title=$row['title'];
                  $description=$row['description'];
                  $createdBy=$row['createdBy'];
            	   $created_at=$row['created_at'];
            	   $updated_at=$row['updated_at'];


            	    $huntygo['ht'][] = array('stk' => 'success','id' =>$id,
                 'title' =>$title,'description' =>$description,'createdBy' =>$createdBy,'created_at' =>$created_at,'updated_at' =>$updated_at);

        	   $arr[] = array('stk' => 'success','id' =>$id,
                 'title' =>$title,'description' =>$description,'createdBy' =>$createdBy,'created_at' =>$created_at,'updated_at' =>$updated_at);

                        $array = [
                                     "Readingdata"=> $arr,
                                     'success' => true,
                                     'message' => 'Found SuccessFully!'
                               ];

                      $profile = $array;
            	   
                  

        	 }

        }
	   else
	    {
            $profile[] = array('stk' => 'unsuccess');
        }
      echo json_encode($profile,JSON_PRETTY_PRINT);
?>
