<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once('../config/dbconnection.php');

if(isset($_GET['deptid']) && isset($_GET['group']) && isset($_GET['date']) && isset($_GET['dayorder']) && isset($_GET['period']) && isset($_GET['username']) && isset($_GET['description']) && isset($_GET['userid']) && isset($_GET['event'])) {
    $deptid = trim($_GET['deptid']);
    $group = trim($_GET['group']);
    $date = trim($_GET['date']);
    $dayorder = trim($_GET['dayorder']);
    $period = trim($_GET['period']);
    $username = trim($_GET['username']);
    $description = trim($_GET['description']);
    $userid = trim($_GET['userid']);
    $event = trim($_GET['event']);
    $active = 0;
    $event = 1;

    $periods = array(); 
    $periods = explode("-",$period);
    $periodcount = count($periods);

    for($x=0; $x<$periodcount; $x++) {

        $sql1 = "select book_id, sub_code, sec, sem, date, day_order where date = '".$date."' and day_order = '".$dayorder."' and period = '".$periods[$x]."' and group_name = '".$group"'";
        $result1 = mysqli_query($DB,$sql1);
        if($row1 = mysqli_fetch_array($result1)) {
            $usrbookid = $row1['book_id'];
            $usrsubcode = $row1['sub_code'];
            $usrsec = $row1['sec'];
            $usrsem = $row1['sem'];
            $usrdate = $row1['date'];
            $usrdayorder = $row1['day_order'];

            $sql2 = "select user_id from tbl_staff where user_name = '".$username."'";
            $result2 = mysqli_query($DB,$sql2);
            $row2 = mysqli_fetch_array($result2);
            $userid = $row2['user_id'];

            ///cancellation to be mailed
            
            $sql3 = "delete from tbl_booking where book_id = ".$usrbookid;
            mysqli_query($DB,$sql3);

            $sql4 = "update tbl_timeline set ".$periods[$x]." = 0 where dept_id = ".$deptid." and group_name = '".$groupname."' and date = '".$date."' and day_order = ".$dayorder;
            mysqli_query($DB,$sql4);

            $current = $currentusage - 1;
            $sql5 = "update tbl_limit set current_usage = ".$current." where user_id = ".$userid." and sub_code = '".$subcode."'";
            mysqli_query($DB,$sql5);
            
        }
        $sql3 = "insert into tbl_booking (dept_id, group_name, date, day_order, period, user_name, dept, description, active, event) values (".$deptid.", '".$group."', '".$date."', ".$dayorder.", '".$periods[$x]."', '".$username."', '".$dept."', '".$description."', ".$active.", ".$event.")";
        mysqli_query($DB,$sql3);
    }

}
?>
