<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once('../config/dbconnection.php');

if(isset($_GET['staffid']) && isset($_GET['password']) ) {

    $staffName = trim($_GET['staffid']);
    $password = md5(trim($_GET['password']));

    $sql = "select user_id, initial_change from tbl_staff where user_name = '".$staffName."' and password = '".$password."' ";

    $result = mysqli_query($DB,$sql);
    
    if($row = mysqli_fetch_array($result)) {
        $json = array();
        $json["response"] = array();
        $jsonArray= array(
         'oAuth' => true,
         'token' => $row['user_id'],
         'initial' => $row['initial_change']
        );
        array_push($json["response"], $jsonArray);  
        echo json_encode($json);
    }
    else {
        $json = array();
        $json["response"] = array();
        $jsonArray= array(
         'oAuth' => false,
        );
        array_push($json["response"], $jsonArray);  
        echo json_encode($json);
    }

    // $json = array();
    // $json["records"] = array();
    // $jn= array(
    //  'status' => $_GET['staffid'] 
    // );
    // array_push($json["records"], $jn);  
    // echo json_encode($json);
}

// $sql1 = "SELECT * from tbl_staff;
// $result1=mysqli_query($con,$sql1);
// $json = array();
// $json["records"] = array();
// $json["response"] = array();

// while($row = mysqli_fetch_array($result1))     
//  {
//     extract($row);
//     $jn= array(
//      'role_name' => $row['role_name'],
//      'role_id'=> $row['role_id'],
//      'max_book' => $row['max_book']
//     );
//     array_push($json["records"], $jn);  
//     array_push($json["response"], $jn); 
// }
 

// $jsonstring = json_encode($json);
//  echo $jsonstring;
?>