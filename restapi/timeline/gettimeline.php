<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once('../config/dbconnection.php');

if(isset($_GET['deptid'])) {
    $deptid = trim($_GET['deptid']);

    $sql = "select t1.temp_id, t1.dept_id, t1.group_name, t1.day_order, t1.date, t1.p1, t1.p2, t1.p3, t1.p4, t1.p5, t1.p6, t1.p7, t1.p8 from tbl_timeline t1 where t1.dept_id = ".$deptid;
    $result = mysqli_query($DB,$sql);
    $json = array();
    $json["timeline"] = array();
    while($row = mysqli_fetch_array($result)) {
        $jsonArray= array(
        'capture' => true,
        'deptid' => $row['dept_id'],
        'groupname' => $row['group_name'],
        'date' => $row['date'],
        'dayorder' => $row['day_order'],
        'p1' => $row['p1'],
        'p2' => $row['p2'],
        'p3' => $row['p3'],
        'p4' => $row['p4'],
        'p5' => $row['p5'],
        'p6' => $row['p6'],
        'p7' => $row['p7'],
        'p8' => $row['p8']
        );
        array_push($json["timeline"], $jsonArray);  
    }
    echo json_encode($json);
}
?>