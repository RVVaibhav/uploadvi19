<?php
header('Content-Type: application/json; charset=utf-8');
$allow=true;
include("Config.php");

$type=$_POST['type'];


  $result=$con->selectAboutDatas("vision_about_us");
       $cnt=mysqli_num_rows($result);
        if($cnt > 0){
        	     while($row=$result->fetch_assoc()){
            	    $id=$row['id'];
            	    $name=$row['name'];
                  $education=$row['education'];
                  $description=$row['description'];
                  $attachment=$row['attachment'];
                  $admin_id=$row['admin_id'];
                  $createdBy=$row['createdBy'];
                  $created_at=$row['created_at'];
            	    $updated_at=$row['updated_at'];
            	  


                 $arr[] =  array('id' =>$id,
                'name' =>$name,'created_at' =>$created_at,'updated_at' =>$updated_at,
                'education' =>$education,'description' =>$description,'attachment' =>$attachment,
                'admin_id' =>$admin_id,'createdBy' =>$createdBy);

                 $array = [
                        "aboutus"=> $arr,
                       'stk' => 'SUCCESS!',
                       'Code' => '200'
                 ];

           $profile = $array;



       }
   } else  {
           $profile = array('stk' => 'unsuccess','Code'=>'400');
           }
 echo json_encode($profile,JSON_PRETTY_PRINT);
 ?>
