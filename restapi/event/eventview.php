<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once('../config/dbconnection.php');

$currenttime = date("Y-m-d");
$timestamp = strtotime($currenttime);


$sql = "select event_id, dept_id, date, period, user_name, event_name, description from tbl_events where timestamp >= ".$timestamp." order by timestamp";
$result = mysqli_query($DB,$sql);
$json = array();
$json["eventdetails"] = array();
while($row = mysqli_fetch_array($result)) {
    $jsonArray= array(
    'capture' => true,
    'event_id' => $row['event_id'],
    'dept_id' => $row['dept_id'],
    'date' => $row['date'],
    'period' => $row['period'],
    'user_name' => $row['user_name'],
    'event_name' => $row['event_name'],
    'description' => $row['description']
    );
    array_push($json["eventdetails"], $jsonArray);  
}
echo json_encode($json);



?>