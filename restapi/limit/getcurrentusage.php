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
    if($row) {
        $json = array();
        $json["usage"] = array();
        $jsonArray= array(
        'capture' => true,
        'usage' => $row['current_usage']
        );
        array_push($json["usage"], $jsonArray);  
        echo json_encode($json);
    }
    else {
        $json = array();
        $json["usage"] = array();
        $jsonArray= array(
        'capture' => false,
        );
        array_push($json["usage"], $jsonArray);  
        echo json_encode($json);
    } 
}

?>