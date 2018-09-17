<?php

require_once('../config/dbconnection.php');

$currenttime = "2018-09-20";

$sql1 = "select dept_id, date, period, user_name, event_name, description from tbl_events where date = '".$currenttime."'";
$result1 = mysqli_query($DB,$sql1);
if($row1 = mysqli_fetch_array($result1)) {
    $deptid = $row1['dept_id']; 
    $date = $row1['date'];
    $period = $row1['period'];
    $name = $row1['user_name'];
    $description = $row1['description'];
    $eventname = $row1['event_name'];
    $event = 0;
    $active = 0;

    $sql2 = "select user_id from tbl_staff where user_name = '".$name."'";
    $result2 = mysqli_query($DB,$sql2);
    $row2 = mysqli_fetch_array($result2);
    $userid = $row2['user_id'];
    
    $sql3 = "select dept_name from tbl_dept where dept_id = ".$deptid;
    $result3 = mysqli_query($DB,$sql3);
    $row3 = mysqli_fetch_array($result3);
    $dept = $row3['dept_name'];

    $sql4 = "select group_name, date, day_order from tbl_temp  where date = '".$date."'";
    $result4 = mysqli_query($DB,$sql4);
    if ($row4 = mysqli_fetch_array($result4)) {
        $group = $row4['group_name']; 
        $date = $row4['date']; 
        $dayorder = $row4['day_order'];
        $periods = array(); 
        $periods = explode("-",$period);
        $periodcount = count($periods);

        for($x=0; $x < $periodcount; $x++) {
            $sql6 = "insert into tbl_booking (dept_id, group_name, date, day_order, period, user_name, dept, description, active, event,event_name) values (".$deptid.", '".$group."', '".$date."', ".$dayorder.", '".$periods[$x]."', '".$name."', '".$dept."', '".$description."', ".$active.", ".$event.", '".$eventname."')";
            mysqli_query($DB,$sql6);

            $sql10 = "select book_id from tbl_booking where dept_id = ".$deptid." and group_name = '".$group."' and date = '".$date."' and day_order = ".$dayorder." and period = '".$periods[$x]."'";
            $result10 = mysqli_query($DB,$sql10);
            $row10 = mysqli_fetch_array($result10);
            $bookid = $row10['book_id'];

            $sql2 = "update tbl_timeline set ".$periods[$x]." = ".$bookid." where dept_id = ".$deptid." and group_name = '".$group."' and date = '".$date."' and day_order = ".$dayorder;
            mysqli_query($DB,$sql2);
        }
        $json = array();
        $json["response"] = array(  
            "status" => true
        );
        echo json_encode($json); 
    }

}

?>
