<?php
header('Content-Type: application/json; charset=utf-8');
$allow=true;
include("Config.php");


$cat_id=$_POST['cat_id'];

  $result=$con->selectByCategoriesP("study_materials",$cat_id);
        if($result==true){
        	     while($row=$result->fetch_assoc()){
            	   $id=$row['id'];
            	   $title=$row['title'];
            	   $category=$row['pdf_cat'];
            	   $image=$row['thumbimage'];
            	   $amount=$row['amount'];
            	   $user_id=$row['admin_id'];
                 $vedio=$row['materials'];
                 $updated_at=$row['updated_at'];
                 $created_at=$row['created_at'];
            	   $huntygo['ht'][] = array('stk' => 'success','category_name' =>$category,'id'=>$id,'vedio'=>$vedio,
                'title' =>$title,'image'=>$image,'user_id' =>$user_id,'created_at'=>$created_at,'updated_at' =>$updated_at);
        	 }

        }
	   else
	    {
            $huntygo['ht'][] = array('stk' => 'unsuccess');
        }
echo json_encode($huntygo,JSON_PRETTY_PRINT);
?>
