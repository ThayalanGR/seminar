

<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once('../config/dbconnection.php');

if(isset($_GET['periodid'])) {
    $periodid = trim($_GET['periodid']);
    $sql = "select t1.book_id, t1.dept_id, t1.group_name, t1.date, t1.day_order, t1.period, t2.user_name, t4.sub_code, t4.year, t4.reg, t1.active from tbl_booking t1 inner join tbl_staff t2 on t1.user_id = t2.user_id inner join tbl_workload t3 on t1.user_id = t3.user_id inner join tbl_subject t4 on t1.sub_id = t4.sub_id where t1.book_id=".$periodid." and t1.dept_id = t3.dept_id";
    $result = mysqli_query($DB,$sql);
    $row = mysqli_fetch_array($result); 
    $json = array();
    $json["perioddetails"] = array();
    $jsonArray= array(
    'capture' => true,
    'book_id' => $row['book_id'],
    'dept_id' => $row['dept_id'],
    'group_name' => $row['group_name'],
    'date' => $row['date'],
    'day_order' => $row['day_order'],
    'period' => $row['period'],
    'user_name' => $row['user_name'],
    'sub_code' => $row['sub_code'],
    'year' => $row['year'],
    'reg' => $row['reg'],
    'active' => $row['active']
    );
    array_push($json["perioddetails"], $jsonArray);  
    echo json_encode($json);
}
?>