<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once('../config/dbconnection.php');

    $sql = "select * from tbl_dept";

    $result = mysqli_query($DB,$sql);
    $json = array();
    $json["department"] = array();
    while($row = mysqli_fetch_array($result)) {

        $jsonArray= array(
         'deptId' => $row['dept_id'],
         'deptName' => $row['dept_name'],
        );
        array_push($json["department"], $jsonArray);  
     
    }
    echo json_encode($json);
    ?>