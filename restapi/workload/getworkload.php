
<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once('../config/dbconnection.php');

if(isset($_GET['username'])) {
    $username = trim($_GET['username']);
    $sql = "select sem, dept, sec, sub_code from tbl_workload where sub_type = 'T' and staff1 = '".$username."'";
    $result = mysqli_query($DB,$sql);
    $json = array();
    $json["workload"] = array();
    while($row = mysqli_fetch_array($result)) {
        $jsonArray= array(
        'capture' => true,
        'sem' => $row['sem'],
        'dept' => $row['dept'],
        'section' => $row['sec'],
        'sub_code' => $row['sub_code'],
        );
        array_push($json["workload"], $jsonArray);  
    }
    echo json_encode($json);
}
?>