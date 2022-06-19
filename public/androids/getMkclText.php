<?php
header('Content-Type: application/json; charset=utf-8');
$allow=true;
include("Config.php");

  $result=$con->selectMkclData("mkcl_text_data");
        $cnt=mysqli_num_rows($result);
        if($cnt > 0){
        	     while($row=$result->fetch_assoc()){
		    	  $id=$row['id'];
		    	  $title=$row['title'];
		         $description=$row['description'];
		         $createdBy=$row['createdBy'];
		    	   $created_at=$row['created_at'];
		    	   $updated_at=$row['updated_at'];
            	
        	 $arr[] =  array('stk' => 'success','id' =>$id,
                 'title' =>$title,'description' =>$description,'createdBy' =>$createdBy,'created_at' =>$created_at,'updated_at' =>$updated_at);

         $array = [
                      "mkclText"=> $arr,
                       'stk' => 'SUCCESS!',
                       'Code' => '200'
                ];

       $profile = $array;

            	
        
        	 }

        }
	   else  {
            $profile = array('stk' => 'unsuccess','Code'=>'400');
        }
echo json_encode($profile,JSON_PRETTY_PRINT);
?>
