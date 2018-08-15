<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once('../config/dbconnection.php');
if(isset($_GET['deptid']) && isset($_GET['group']) && isset($_GET['date']) && isset($_GET['dayorder']) && isset($_GET['period']) && isset($_GET['userid']) && isset($_GET['subid'])) {
    $deptid = trim($_GET['deptid']);
    $group = trim($_GET['group']);
    $date = trim($_GET['date']);
    $dayorder = trim($_GET['dayorder']);
    $period = trim($_GET['period']);
    $userid = trim($_GET['userid']);
    $subid = trim($_GET['subid']);
    $active = 0; 
    $sql = "insert into tbl_booking (dept_id, group_name, date, day_order, period, user_id, sub_id, hall_id, active) values (".$deptid.", '".$group."', '".$date."', ".$dayorder.", '". $period."', ".$userid.", ".$subid.", ".$deptid.", ".$active.")";
    mysqli_query($DB,$sql);
    $sql1 = "select book_id from tbl_booking where dept_id = ".$deptid." and group_name = '".$group."' and date = '".$date."' and day_order = ".$dayorder." and period = '".$period."' and user_id = ".$userid." and sub_id = ".$subid;
    $result1 = mysqli_query($DB,$sql1);
    $row1 = mysqli_fetch_array($result1);
    $bookid = $row1['book_id'];
    // echo $bookid;
    // echo $period;
    $sql2 = "update tbl_timeline set ".$period." = ".$bookid." where dept_id = ".$deptid." and group_name = '".$group."' and date = '".$date."' and day_order = ".$dayorder;
    mysqli_query($DB,$sql2);
    $json = array();
    $json["response"] = array(  
        "status" => true
    );
    echo json_encode($json);
}
?>