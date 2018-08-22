<?php

// // required headers
// header("Access-Control-Allow-Origin: *");
// header("Content-Type: application/json; charset=UTF-8");

// require_once('../config/dbconnection.php');



// if(isset($_GET['olddata']) && isset($_GET['newdata'])) {
//     $olddata_str = trim($_GET['olddata']); 
//     $olddata = array(); 
//     $olddata = explode("~",$olddata_str);
//     $olduserid = $olddata[0];
//     $olddeptid = $olddata[1];
//     $oldsubid = $olddata[2];
//     $oldsection = $olddata[3];

//     $newdata_str = trim($_GET['newdata']); 
//     $newdata = array(); 
//     $newdata = explode("~",$newdata_str);
//     $newuserid = $newdata[0];
//     $newdeptid = $newdata[1];
//     $newsubid = $newdata[2];
//     $newsection = $newdata[3];

//     $sql = "update tbl_workload set user_id = ".$newuserid.", dept_id = ".$newdeptid.", sub_id = ".$newsubid.", sec = '".$newsection."' where user_id = ".$olduserid." and dept_id = ".$olddeptid." and sub_id = ".$oldsubid." and sec = '".$oldsection."'" ;
//     mysqli_query($DB,$sql);
//     $json = array();
//     $json["response"] = array(  
//         "status" => true
//     );
//     echo json_encode($json);
// }

?>