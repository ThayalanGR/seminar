<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once('../config/dbconnection.php');
if(isset($_GET['deptid']) && isset($_GET['group']) && isset($_GET['date']) && isset($_GET['dayorder']) && isset($_GET['period']) && isset($_GET['username']) && isset($_GET['description']) && isset($_GET['userid']) && isset($_GET['event']) && isset($_GET['eventname']) && isset($_GET['deptname'])) {
    $deptid = trim($_GET['deptid']);
    $dept = trim($_GET['deptname']);
    $group = trim($_GET['group']);
    $date = trim($_GET['date']);
    $dayorder = trim($_GET['dayorder']);
    $period = trim($_GET['period']);
    $name = trim($_GET['username']);
    $description = trim($_GET['description']);
    $userid = trim($_GET['userid']);
    $event = trim($_GET['event']);
    $active = 0;
    $event1 = 0;
    $eventname = trim($_GET['eventname']);

    $periods = array(); 
    $periods = explode("-",$period);
    $periodcount = count($periods);

    for($x=0; $x<$periodcount; $x++) {
        $sql1 = "select book_id, dept_id, group_name, date, day_order, period, user_name, sub_code, dept, sec, sem, description, active, event from tbl_booking where date = '".$date."' and day_order = ".$dayorder." and period = '".$periods[$x]."' and group_name = '".$group."' and event = ".$event1;
        $result1 = mysqli_query($DB,$sql1);
        if($row1 = mysqli_fetch_array($result1)) {
            $usrbookid = $row1['book_id'];
            $usrdeptid = $row1['dept_id'];
            $usrgroupname = $row1['group_name'];
            $usrdate = $row1['date'];
            $usrdayorder = $row1['day_order'];
            $usrperiod = $row1['period'];
            $username = $row1['user_name'];
            $usrsubcode = $row1['sub_code'];
            $usrdept = $row1['dept'];
            $usrsec = $row1['sec'];
            $usrsem = $row1['sem'];
            $usrdescription = $row1['description'];
            $usractive = $row1['active'];
            $usrevent = $row1['event'];

            $sql2 = "select user_id from tbl_staff where user_name = '".$username."'";
            $result2 = mysqli_query($DB,$sql2);
            $row2 = mysqli_fetch_array($result2);
            $userid = $row2['user_id'];
            // echo $userid;

            $sql7 = "insert into tbl_eventbackup(book_id, dept_id, group_name, date, day_order, period, user_name, sub_code, dept, sec, sem, description, active, event) values (".$usrbookid.", ".$usrdeptid.", '".$usrgroupname."', '".$usrdate."', ".$usrdayorder.", '".$usrperiod."', '".$username."', '".$usrsubcode."', '".$usrdept."', '".$usrsec."', ".$usrsem.", '".$usrdescription."', ".$usractive.", ".$usrevent.")";
            mysqli_query($DB,$sql7);


            
            
            ///cancellation to be mailed
            

            $sql3 = "delete from tbl_booking where book_id = ".$usrbookid;
            mysqli_query($DB,$sql3);

            $sql4 = "update tbl_timeline set ".$usrperiod." = 0 where dept_id = ".$usrdeptid." and group_name = '".$usrgroupname."' and date = '".$usrdate."' and day_order = ".$usrdayorder;
            mysqli_query($DB,$sql4);

            $sql8 = "select t1.current_usage, t2.max_book from tbl_limit t1 inner join tbl_role t2 on t1.role_id = t2.role_id where user_id = ".$userid." and sub_code = '".$usrsubcode."' and group_name = '".$usrgroupname."'";
            $result8 = mysqli_query($DB,$sql8);
            $row8 = mysqli_fetch_array($result8);
            $currentusage = $row8['current_usage'];
            
            $current = $currentusage - 1;
            // echo $current;
            $sql9 = "update tbl_limit set current_usage = ".$current." where user_id = ".$userid." and sub_code = '".$usrsubcode."' and group_name = '".$usrgroupname."'";
            mysqli_query($DB,$sql9);
        }
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
?>
