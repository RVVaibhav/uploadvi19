<?php
class DB {
    public $connection;
    private $host;
    private $user;
    private $password;
    private $database;
    public $table;
    function __construct($host, $user, $password, $database) {
        $this->host       = $host;
        $this->user       = $user;
        $this->password   = $password;
        $this->database   = $database;
        $this->connection=mysqli_connect($this->host,$this->user,$this->password,$this->database);
		//$this->connection = mysqli_connect('localhost', 'username', 'password', 'dbname');
        // Check connection
        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
        //echo "Connected successfully";
    }

    //-----------------------------------------------------------------------------------------------------
    public function close() {
        try {
            mysqli_close($this->connection);
        }
        catch (Exception $Ex) {
            echo $Ex;
        }
    }
        public function getData($mobile) {
        try {
             $sql ="select * from vision_registration where `user_mobile`='$mobile';";
        //    echo $sql;
          //  exit;
            $result = mysqli_query($this->connection, $sql);
            //var_dump($result);
           // exit;
            return $result;
        }
        catch (Exception $Ex) {
            echo $Ex;
        }
    }

    public function getResult($test_id) {
    try {
         $sql ="select * from result_test_questions where `test_id` ='$test_id';";
      // echo $sql;
      //  exit;
        $result = mysqli_query($this->connection, $sql);
        //var_dump($result);
       // exit;
        return $result;
    }
    catch (Exception $Ex) {
        echo $Ex;
    }
}


    public function getDataWallet($user_mobile,$dates) {
    try {
         $sql ="SELECT * FROM wallet WHERE `mobile`='$user_mobile' AND `date`='$dates'";
         //echo $sql;
      //  exit;
        $result = mysqli_query($this->connection, $sql);
        //var_dump($result);
       // exit;
        return $result;
    }
    catch (Exception $Ex) {
        echo $Ex;
    }
}

public function selectHeaders($table,$test_header_1_id,$test_header_2_id,$test_header_3_id) {
try {
     $sql ="SELECT * FROM $table WHERE `test_header_1_id`='$test_header_1_id' AND `test_header_2_id`='$test_header_2_id'AND `test_header_3_id`='$test_header_3_id'";
     //echo $sql;
  //  exit;
    $result = mysqli_query($this->connection, $sql);
    //var_dump($result);
   // exit;
    return $result;
}
catch (Exception $Ex) {
    echo $Ex;
}
}



public function selectStudyTipsData($table) {
try {
     $sql ="SELECT * FROM $table";
     //echo $sql;
  //  exit;
    $result = mysqli_query($this->connection, $sql);
    //var_dump($result);
   // exit;
    return $result;
}
catch (Exception $Ex) {
    echo $Ex;
}
}

public function selectMkclData($table) {
try {
     $sql ="SELECT * FROM $table";
     //echo $sql;
  //  exit;
    $result = mysqli_query($this->connection, $sql);
    //var_dump($result);
   // exit;
    return $result;
}
catch (Exception $Ex) {
    echo $Ex;
}
}


public function selectMkclDatas($table,$type) {
try {
     $sql ="SELECT * FROM $table where type='$type'";
     //echo $sql;
  //  exit;
    $result = mysqli_query($this->connection, $sql);
    //var_dump($result);
   // exit;
    return $result;
}
catch (Exception $Ex) {
    echo $Ex;
}
}

public function selectStudyTipsDatas($table,$type) {
try {
     $sql ="SELECT * FROM $table where type='$type'";
     //echo $sql;
  //  exit;
    $result = mysqli_query($this->connection, $sql);
    //var_dump($result);
   // exit;
    return $result;
}
catch (Exception $Ex) {
    echo $Ex;
}
}

//select rtq.*, qit.*, qb.* from questions_in_test qit
//inner join question_bank qb on (qit.question_id = qb.question_id)
//left join result_test_questions rtq on (qit.test_id = rtq.test_id and  qit.question_id = rtq.question_id and rtq.user_id = '16')
//where qit.test_id = '2'
//ORDER BY qit.test_id, qit.question_id;

public function selectAboutDatas($table) {
try {
     $sql ="SELECT * FROM $table ORDER BY RAND() LIMIT 3 ";
     //echo $sql;
  //  exit;
    $result = mysqli_query($this->connection, $sql);
    //var_dump($result);
   // exit;
    return $result;
}
catch (Exception $Ex) {
    echo $Ex;
}
}


public function selectQFDatas($table) {
try {
     $sql ="SELECT * FROM $table";
     //echo $sql;
  //  exit;
    $result = mysqli_query($this->connection, $sql);
    //var_dump($result);
   // exit;
    return $result;
}
catch (Exception $Ex) {
    echo $Ex;
}
}

public function selectVisionMnemonics($table) {
try {
     $sql ="SELECT * FROM $table";
     //echo $sql;
  //  exit;
    $result = mysqli_query($this->connection, $sql);
    //var_dump($result);
   // exit;
    return $result;
}
catch (Exception $Ex) {
    echo $Ex;
}
}

public function selectbykey($userId) {

      //$f= Where $f='$v'
      try {
           $sql ="SELECT * FROM vision_registration WHERE  user_mobile ='$userId'";
            //echo $sql;
          // exit;
          $result = mysqli_query($this->connection, $sql);
          return $result;
      }
      catch (Exception $Ex) {
          echo $Ex;
      }
  }


  public function selectbykeyEmail($userId) {

        //$f= Where $f='$v'
        try {
             $sql ="SELECT * FROM vision_registration WHERE  user_email ='$userId'";
              //echo $sql;
            // exit;
            $result = mysqli_query($this->connection, $sql);
            return $result;
        }
        catch (Exception $Ex) {
            echo $Ex;
        }
    }




public function otpVerify($mobile,$otp) {
      try {
          $sql    = "SELECT * FROM `vision_registration` WHERE `user_mobile`='$mobile' AND `otp`='$otp'";
       // echo $sql;
        //  exit;
          $result = mysqli_query($this->connection, $sql);
          return $result;
      }
      catch (Exception $Ex) {
          echo $Ex;
      }
  }

public function selectQFData($table,$type) {
try {
     $sql ="SELECT * FROM $table where `question_format`= '$type'";
    // echo $sql;
    // exit;
    $result = mysqli_query($this->connection, $sql);
    //var_dump($result);
   // exit;
    return $result;
}
catch (Exception $Ex) {
    echo $Ex;
}
}

public function getAttandance($table,$type) {
try {
     $sql ="SELECT count(distinct user_id) as counts FROM $table where `test_id`= '$type'";
    // echo $sql;
    // exit;
    $result = mysqli_query($this->connection, $sql);
    //var_dump($result);
   // exit;
    return $result;
}
catch (Exception $Ex) {
    echo $Ex;
}
}





public function getResultData($user_id,$test_id) {
try {
     $sql ="select * from result_test_questions where `user_id`='$user_id' and `test_id` = '$test_id';";
//    echo $sql;
  //  exit;
    $result = mysqli_query($this->connection, $sql);
    //var_dump($result);
   // exit;
    return $result;
}
catch (Exception $Ex) {
    echo $Ex;
}
}



public function selectSubTPlanDatas($table,$type) {
try {
     $sql ="SELECT * FROM $table where subsription='$type'";
     //echo $sql;
  //  exit;
    $result = mysqli_query($this->connection, $sql);
    //var_dump($result);
   // exit;
    return $result;
}
catch (Exception $Ex) {
    echo $Ex;
}
}

public function selectSubTDatas($table,$type) {
try {
     $sql ="SELECT * FROM $table where subsription='$type'";
     //echo $sql;
  //  exit;
    $result = mysqli_query($this->connection, $sql);
    //var_dump($result);
   // exit;
    return $result;
}
catch (Exception $Ex) {
    echo $Ex;
}
}

     public function selectMyInterest($vid,$cid) {

        //$f= Where $f='$v'
        try {
             $sql ="SELECT * FROM wishlist WHERE  vid='$vid' AND cid ='$cid'";
             //echo $sql;
            //exit;
            $result = mysqli_query($this->connection, $sql);
            //var_dump($result);
           // exit;
            return $result;
        }
        catch (Exception $Ex) {
            echo $Ex;
        }
    }

    public function login($email,$password,$uniqueId) {
      try {
          $sql    = "SELECT * FROM `vision_registration` WHERE `user_email`='$email' AND `user_password`='$password' AND `uniqueId`= '$uniqueId' AND `status` = 'Active'";
      //  echo $sql;
          //exit;
          $result = mysqli_query($this->connection, $sql);
          return $result;
      }
      catch (Exception $Ex) {
          echo $Ex;
      }
  }

  public function insertResult($table,$fields,$values) {
      try {
          $this->table=$table;
          $fields = implode('`,`', $fields);
          $values = implode("','", $values);
          $sql    = 'INSERT INTO ' . $this->table . ' (`' . $fields . "`) VALUES ('" . $values . "')";
         //redirect('location:index.php');
        //   echo $sql;
           //exit;
          $result = mysqli_query($this->connection, $sql);
          if ($result) {
              return $result;
          } else {
              return mysqli_error($this->connection);
          }
      }
      catch (Exception $Ex) {
          echo $Ex;
      }
  }


    public function insert($table,$rfields,$rvalues) {
        try {

            $this->table=$table;
            $fields = implode('`,`', $rfields);
            $values = implode("','", $rvalues);
            $sql    = 'INSERT INTO ' . $this->table . ' (`' . $fields . "`) VALUES ('" . $values . "')";


	           //redirect('location:index.php');
        //    echo $sql;
           //  exit;
            $result = mysqli_query($this->connection, $sql);
            if ($result) {
                return $result;
            } else {
                return mysqli_error($this->connection);
            }
        }
        catch (Exception $Ex) {
            echo $Ex;
        }
    }
    public function lastid() {
        try {
            return $result = mysqli_insert_id($this->connection);

        }
        catch (Exception $Ex) {
            echo $Ex;
        }
    }

    /*------------------------------------------------------------------------------*/

    public function selectByCategories($table,$header1,$header2,$header3,$header4) {
        try {
           $sql= "select * from $table where `headers_one` ='$header1' AND `headers_two` ='$header2' AND `headers_three` ='$header3' AND `headers_four` ='$header4' AND SYSDATE( ) between start_date and expire_date";

           //echo $sql;
          // exit;
             $result = mysqli_query($this->connection, $sql);
            return $result;
        }
        catch (Exception $Ex) {
            echo $Ex;
        }
}

public function selectVisionMotivation($table,$dates) {
    try {
       $sql= "select * from $table where `date` ='$dates'";

      // echo $sql;
      // exit;
         $result = mysqli_query($this->connection, $sql);
        return $result;
    }
    catch (Exception $Ex) {
        echo $Ex;
    }
}

public function selectByCategoriesP($table,$name) {
    try {
       $sql= "select * from $table where `pdf_cat` ='$name'";
      // echo $sql;
      // exit;
         $result = mysqli_query($this->connection, $sql);
        return $result;
    }
    catch (Exception $Ex) {
        echo $Ex;
    }
}

public function selectBystatus($table) {

        //$f= Where $f='$v'
        try {
           $sql = "select * from $table";
            //echo $sql;
           //exit;
            $result = mysqli_query($this->connection, $sql);
           return $result;
       }
       catch (Exception $Ex) {
           echo $Ex;
       }
    }

    public function selectState($table) {

            //$f= Where $f='$v'
            try {
               $sql = "select * from $table";
              //echo $sql;
               //exit;
                $result = mysqli_query($this->connection, $sql);
               return $result;
           }
           catch (Exception $Ex) {
               echo $Ex;
           }
        }

  public function selectComponent($table) {

            //$f= Where $f='$v'
            try {
               $sql = "select * from $table";
             // echo $sql;
              //exit;
                $result = mysqli_query($this->connection, $sql);
               return $result;
           }
           catch (Exception $Ex) {
               echo $Ex;
           }
        }


public function selectViewAll($table,$userId,$testId) {

            //$f= Where $f='$v'
            try {
               $sql = "select rtq.*, qit.*, qb.* from  $table qit
inner join question_bank qb on (qit.question_id = qb.question_id)
left join result_test_questions rtq on (qit.test_id = rtq.test_id and  qit.question_id = rtq.question_id and rtq.user_id = '$userId')
where qit.test_id = '$testId'
ORDER BY qit.test_id, qit.question_id";
              //echo $sql;
              //exit;
                $result = mysqli_query($this->connection, $sql);
               return $result;
           }
           catch (Exception $Ex) {
               echo $Ex;
           }
        }

public function selectAmbiguity($table,$userId) {

            //$f= Where $f='$v'
            try {
               $sql = "select (select count(qrt2.report_id)as myreport from question_report_table qrt2) as report, (select count(qrt2.report_id)as myreport from question_report_table qrt2 where `user_id`= '$userId') as myReport, r.report_id,r.user_id,r.test_id,r.adminId,r.questionId,r.question_Comment,r.reference, q.question,option_1,option_2,option_3,option_4,correct_option,admin_id,r.created_at,r.updated_at, rs.solution_id, rs.report_id as rep,solution,rs.reference as ref,createdBy,rs.adminId as adm from $table r
INNER JOIN question_bank  q ON (r.questionId = q.question_id) left JOIN report_solutions rs on (r.report_id = rs.report_id)";
              //echo $sql;
              //exit;
                $result = mysqli_query($this->connection, $sql);
               return $result;
           }
           catch (Exception $Ex) {
               echo $Ex;
           }
        }


 public function selectTestSolvedList($table,$user_id) {

            //$f= Where $f='$v'
            try {
               $sql = "select test.*, res.user_id from $table  as test INNER JOIN result_details as res on (test.test_id = res.test_id and `user_id` = '$user_id')";
             // echo $sql;
               //exit;
                $result = mysqli_query($this->connection, $sql);
               return $result;
           }
           catch (Exception $Ex) {
               echo $Ex;
           }
        }



public function selectTestUnSolvedList($table,$user_id) {

            //$f= Where $f='$v'
            try {
               $sql = "select test.*, res.user_id from $table  as test Left JOIN result_details as res on (test.test_id = res.test_id and `user_id` = '$user_id') where res.user_id is null";
             // echo $sql;
               //exit;
                $result = mysqli_query($this->connection, $sql);
               return $result;
           }
           catch (Exception $Ex) {
               echo $Ex;
           }
        }



public function selectAmbigutyTestList($table,$user_id,$test_id) {

            //$f= Where $f='$v'
            try {
               $sql = "select r.result_id,r.user_id,r.selected_option,r.question_id,r.test_id,q.question,option_1,option_2,option_3,option_4,correct_option,admin_id from $table r INNER JOIN question_bank  q ON (r.question_id = q.question_id)  where r.test_id = '$test_id' and r.user_id = '$user_id'";
             // echo $sql;
               //exit;
                $result = mysqli_query($this->connection, $sql);
               return $result;
           }
           catch (Exception $Ex) {
               echo $Ex;
           }
        }



  public function selectTestList($table,$user_id) {

            //$f= Where $f='$v'
            try {
               $sql = "select test.*, res.user_id from $table  as test Left join result_details as res on (test.test_id = res.test_id and `user_id` = '$user_id') where  SYSDATE() between start_date and expire_date";
              echo $sql;
               //exit;
                $result = mysqli_query($this->connection, $sql);
               return $result;
           }
           catch (Exception $Ex) {
               echo $Ex;
           }
        }

   public function getResultDetails($user_id,$test_id) {

            //$f= Where $f='$v'
            try {
               $sql = "select * from (SELECT p.*, @curRank := @curRank + 1 AS rank
			FROM result_details p, (
			SELECT @curRank := 0
			) q
ORDER BY total_score DESC) as r where `user_id`='$user_id' and `test_id` = '$test_id'";
              // echo $sql;
               //exit;
                $result = mysqli_query($this->connection, $sql);
               return $result;
           }
           catch (Exception $Ex) {
               echo $Ex;
           }
        }





        public function selectDataTestBySub($table,$cat_id,$user_id) {

                  //$f= Where $f='$v'

                  try {
                  //   $sql = "select * from $table as test where `test_header_4_id` ='$cat_id' and not exits(select null from result_details where `user_id` = '$user_id' and test.test_id = result_details.test_id)";
                       $sql = "select test.*, res.user_id from $table  as test Left join result_details as res on (test.test_id = res.test_id and `user_id` = '$user_id') where `test_header_4_id` ='$cat_id' AND res.user_id IS NULL AND SYSDATE() between start_date and expire_date";
                    //echo $sql;
        //(select question_id from loot_cutieadmin.questions_in_test where test_id ='$test_id')
                    // exit;
                      $result = mysqli_query($this->connection, $sql);
                     return $result;
                 }
                 catch (Exception $Ex) {
                     echo $Ex;
                 }
              }


public function selectQuestions($table_one,$table_two,$test_id) {

          //$f= Where $f='$v'
          try {
             $sql = " select qb.question_id,qb.subject_group_id,qb.question_type,qb.question,qb.option_1,qb.option_2,qb.option_3,qb.option_4,qb.option_5,
qb.correct_option,qb.questions_selection_count,qb.admin_id,qb.created_at,qb.updated_at FROM $table_one qb JOIN
$table_two qt ON qb.question_id = qt.question_id where test_id ='$test_id' order by qb.question_id desc;";
            // echo $sql;
//(select question_id from loot_cutieadmin.questions_in_test where test_id ='$test_id')
           // exit;
              $result = mysqli_query($this->connection, $sql);
             return $result;
         }
         catch (Exception $Ex) {
             echo $Ex;
         }
      }


}
?>
