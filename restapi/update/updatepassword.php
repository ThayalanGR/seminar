<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once('../config/dbconnection.php');

if(isset($_GET['password']) && isset($_GET['staffid'])) {
    $staffid = $_GET['staffid'];
    $password = md5(trim($_GET['password']));
    $forgotpassword = md5($password);
    $sql = "update tbl_staff set password = '".$password."', forgot_password = '".$forgotpassword."', initial_change = 1 where user_id =".$staffid;

    mysqli_query($DB,$sql);
    
    $json = array();
    $json["response"] = array(  "status" => true);
    echo json_encode($json);
}
?>