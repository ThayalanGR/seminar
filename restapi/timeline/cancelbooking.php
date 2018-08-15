<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once('../config/dbconnection.php');

if(isset($_GET['bookid'])) {
    $bookid = trim($_GET['bookid']);
    $sql1 = "select  dept_id, group_name, date, day_order, period from tbl_booking where book_id = " .$bookid; 
    $result = mysqli_query($DB,$sql1);
    $row = mysqli_fetch_array($result); 
    $deptid = $row['dept_id']; 
    $groupname = $row['group_name']; 
    $date = $row['date']; 
    $dayorder = $row['day_order']; 
    $period = $row['period'];
    $sql2 = "delete from tbl_booking where book_id = ".$bookid;
    mysqli_query($DB,$sql2);
    $sql3 = "update tbl_timeline set ".$period." = 0 where dept_id = ".$deptid." and group_name = '".$groupname."' and date = '".$date."' and day_order = ".$dayorder;
    mysqli_query($DB,$sql3);
    $json = array();
    $json["response"] = array(  
        "status" => true
    );
    echo json_encode($json);
}
?>