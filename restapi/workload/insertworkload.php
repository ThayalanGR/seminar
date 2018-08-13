<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once('../config/dbconnection.php');

if(isset($_GET['userid']) && isset($_GET['deptid']) && isset($_GET['subid']) && isset($_GET['section'])) {
    $userid = trim($_GET['userid']); 
    $deptid = trim($_GET['deptid']);
    $subid = trim($_GET['subid']);
    $section = trim($_GET['section']);
    $sql = "INSERT INTO `tbl_workload`(`user_id`, `dept_id`, `sub_id`, `sec`) VALUES (".$userid.",".$deptid.",".$subid.",'".$section."')";
    mysqli_query($DB,$sql);
    $json = array();
    $json["response"] = array(  
        "status" => true
    );
    echo json_encode($json);
}
?>
