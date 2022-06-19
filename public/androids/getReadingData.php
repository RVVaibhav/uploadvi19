<?php
header('Content-Type: application/json; charset=utf-8');
$allow=true;
include("Config.php");
$type=$_POST['type'];



   $result=$con->selectStudyTipsDatas("reading_stuff_data",$type);
   $cnt=mysqli_num_rows($result);
        if($cnt > 0){
        	     while($row=$result->fetch_assoc()){
            	   $id=$row['id'];
            	   $title=$row['title'];
                  $description=$row['description'];
            	     $type=$row['type'];
                   $createdBy=$row['createdBy'];
            	    $attachment=json_decode($row['attachment']);
                   $created_at=$row['created_at'];
            	   $updated_at=$row['updated_at'];




         $arr[] =  array('stk' => 'success','id' =>$id,
                 'title' =>$title,'description' =>$description,'type' =>$type,'createdBy' =>$createdBy,
                 'attachment' =>$attachment,'created_at' =>$created_at,'updated_at' =>$updated_at);

                        $array = [
                                     "ReadData"=> $arr,
                                     'success' => true,
                                     'message' => 'Found SuccessFully!'
                               ];

                      $profile = $array;
        	 }

        }
	   else  {
            $profile['ReadData'][] = array('stk' => 'unsuccess');
        }
echo json_encode($profile,JSON_PRETTY_PRINT);
?>
