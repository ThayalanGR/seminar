

<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once('../config/dbconnection.php');

if(isset($_GET['periodid'])) {
    $periodid = trim($_GET['periodid']);
    $sql = "select t1.book_id, t1.dept_id, t2.dept_name, t1.group_name, t1.date, t1.day_order, t1.period, t1.user_name, t1.sub_code, t1.dept, t1.sec, t1.sem, t1.description, t1.active, t1.event, t1.event_name from tbl_booking t1 inner join tbl_dept t2 on t1.dept_id = t2.dept_id where t1.book_id=".$periodid;
    $result = mysqli_query($DB,$sql);
    $row = mysqli_fetch_array($result); 
    
    $json = array();
    $json["perioddetails"] = array();
    $jsonArray= array(
    'capture' => true,
    'book_id' => $row['book_id'],
    'dept_id' => $row['dept_id'],
    'dept_name' => $row['dept_name'],
    'group_name' => $row['group_name'],
    'date' => $row['date'],
    'day_order' => $row['day_order'],
    'period' => $row['period'],
    'user_name' => $row['user_name'],
    'sub_code' => $row['sub_code'],
    'dept' => $row['dept'],
    'sec' => $row['sec'],
    'sem' => $row['sem'],
    'description' => $row['description'],
    'active' => $row['active'],
    'event' => $row['event'],
    'eventname' => $row['event_name']
    );
    array_push($json["perioddetails"], $jsonArray);  
    echo json_encode($json);
}
?>