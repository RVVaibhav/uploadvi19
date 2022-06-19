<?php
header('Content-Type: application/json; charset=utf-8');
$allow=true;
include("Config.php");


$header1=$_POST['header1'];
$header2=$_POST['header2'];
$header3=$_POST['header3'];
$header4=$_POST['header4'];


  $result=$con->selectByCategories("video_tutorials",$header1,$header2,$header3,$header4);
       $cnt=mysqli_num_rows($result);
        if($cnt > 0){
        	     while($row=$result->fetch_assoc()){


            	   $id=$row['id'];
            	   $title=$row['title'];
            	   $headers_one=$row['headers_one'];
            	   $image=$row['thumbimage'];
            	   $headers_two=$row['headers_two'];
                   $headers_four=$row['headers_four'];
                   $headers_three=$row['headers_three'];
            	   $user_id=$row['admin_id'];
                 $vedio=$row['video'];
                 $start_date=$row['start_date'];
                 $expire_date=$row['expire_date'];
                 $updated_at=$row['updated_at'];
                 $created_at=$row['created_at'];

		$arr[] =  array('id'=>$id,'vedio'=>$vedio,
                'title' =>$title,'image'=>$image,'start_date' =>$start_date,'expire_date'=>$expire_date,'user_id' =>$user_id,'created_at'=>$created_at,'updated_at' =>$updated_at);

         $array = [
                      "data"=> $arr,
                      'success' => true,
                      'message' => 'Video Found SuccessFully!'
                ];

       $profile = $array;

                  

            
        	 }

        }
	   else
	    {
              $profile = array('success' => false,'message' => 'Contacts Not Found!');
        }
echo json_encode($profile,JSON_PRETTY_PRINT);
?>
