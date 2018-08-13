<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once('../config/dbconnection.php');

if(isset($_GET['userid']) && isset($_GET['roleid'])) {
    $userid = trim(isset($_GET['userid']));
    $roleid = trim(isset($_GET['roleid']));
    $sql = "select current_usage from tbl_limit where user_id = ".$userid." and role_id = ".$roleid;
    $result = mysqli_query($DB,$sql);
    if($row) {
        $json = array();
        $json["response"] = array();
        $jsonArray= array(
        'capture' => true,
        'usage' => $row['current_usage']
        );
        array_push($json["response"], $jsonArray);  
        echo json_encode($json);
    }
    else {
        $json = array();
        $json["response"] = array();
        $jsonArray= array(
        'capture' => false,
        );
        array_push($json["response"], $jsonArray);  
        echo json_encode($json);
    } 