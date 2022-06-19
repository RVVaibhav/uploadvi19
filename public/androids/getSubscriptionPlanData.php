<?php
header('Content-Type: application/json; charset=utf-8');
$allow=true;
include("Config.php");

$type=$_POST['type'];


  $result=$con->selectSubTPlanDatas("notes_purcheses",$type);
        if($result==true){
        	     while($row=$result->fetch_assoc()){
            	    $id=$row['id'];
            	    $subsription=$row['subsription'];
                  $description=$row['description'];
            	    $tab1=$row['tab1'];
                  $tab2=$row['tab2'];
                  $tab3=$row['tab3'];
                  $tab4=$row['tab4'];
                  $complete=$row['complete'];
                  $createdBy=$row['createdBy'];
                  $admin_i=$row['admin_i'];
                  $created_at=$row['created_at'];
            	    $updated_at=$row['updated_at'];

            	    $huntygo['sub'][] = array('stk' => 'success','id' =>$id,
                 'subsription' =>$subsription,'description' =>$description,'tab1' =>$tab1,'tab1' =>$tab1,'tab2' =>$tab2,
                 'tab3' =>$tab3,'tab4' =>$tab4,'complete' =>$complete,'createdBy' =>$createdBy,
                 'admin_i' =>$admin_i,'created_at' =>$created_at,'updated_at' =>$updated_at);
        	 }

        }
	   else  {
            $huntygo['sub'][] = array('stk' => 'unsuccess');
        }
echo json_encode($huntygo,JSON_PRETTY_PRINT);
?>
