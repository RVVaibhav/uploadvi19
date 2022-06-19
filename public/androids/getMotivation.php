<?php
header('Content-Type: application/json; charset=utf-8');
$allow=true;
include("Config.php");

$dates = $_POST['datesxx'];


  $result=$con->selectVisionMotivation("motivational_quotes",$dates);

       $cnt=mysqli_num_rows($result);
        if($cnt > 0){
        	     while($row=$result->fetch_assoc()){
            	    $id=$row['motivation_id'];
            	    $date=$row['date'];
                  $special_day=$row['special_day'];
            	    $special_image=$row['special_image'];
                  $motivation_txt=$row['motivation_txt'];
                  $motivation_image=$row['motivation_image'];
                  $admin_id=$row['admin_id'];
                  $created_at=$row['created_at'];
                  $updated_at=$row['updated_at'];

                  $arr =  array('id'=>$id,'date'=>$date,
                               'special_day' =>$special_day,'special_image'=>$special_image,'motivation_txt' =>$motivation_txt,'motivation_image'=>$motivation_image,'admin_id' =>$admin_id,'created_at'=>$created_at,'updated_at' =>$updated_at);

                        $array = [
                                     "data"=> $arr,
                                     'success' => true,
                                     'message' => 'Found SuccessFully!'
                               ];

                      $profile = $array;
        	 }

        }
	   else  {
            $profile = array('success' => false,'message' => 'Contacts Not Found!');
        }
echo json_encode($profile,JSON_PRETTY_PRINT);
?>
