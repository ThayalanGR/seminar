<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once('../config/dbconnection.php');

if(isset($_GET['userid']) && isset($_GET['roleid']) && isset($_GET['subid'])) {
    $userid = trim(isset($_GET['userid']));
    $roleid = trim(isset($_GET['roleid']));
    $subid = trim(isset($_GET['subid']));
    $sql = "SELECT `current_usage` FROM `tbl_limit` WHERE `user_id` = ".$userid." and `role_id` =".$roleid." and `sub_id` = ".$subid;
    $result = mysqli_query($DB,$sql);
    $row = mysqli_fetch_array($result);
    $currentuse = $row['current_usage'] + 1;
    $sql1 = "update tbl_limit set current_usage = ".$currentuse." where `user_id` = ".$userid." and `role_id` =".$roleid;
    mysqli_query($DB,$sql1);
    $json = array();
    $json["response"] = array();
    $jsonArray= array(
    'status' => true,
    );
    array_push($json["response"], $jsonArray);  
    echo json_encode($json);
}

?>