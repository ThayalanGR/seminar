<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once('../config/dbconnection.php');

if(isset($_GET['bookid']) && isset($_GET['deptid']) && isset($_GET['group']) && isset($_GET['date']) && isset($_GET['dayorder']) && isset($_GET['period']) && isset($_GET['username']) && isset($_GET['subcode']) && isset($_GET['description']) && isset($_GET['userid']) && isset($_GET['roleid'])) {
    $bookid = trim($_GET['bookid']);
    $sql1 = "select  dept_id, group_name, date, day_order, period, sub_code, user_name from tbl_booking where book_id = " .$bookid; 
    $result = mysqli_query($DB,$sql1);
    $row = mysqli_fetch_array($result); 

    $deptid = $row['dept_id']; 
    $groupname = $row['group_name']; 
    $date = $row['date']; 
    $dayorder = $row['day_order']; 
    $period = $row['period'];
    $subcode = $row['sub_code'];
    $username = $row['user_name'];

    $sql7 = "select user_id from tbl_staff where user_name = '".$username."'";
    $result7 = mysqli_query($DB,$sql7);
    $row7 = mysqli_fetch_array($result7);
    $userid = $row7['user_id'];

    $sql2 = "delete from tbl_booking where book_id = ".$bookid;
    mysqli_query($DB,$sql2);

    $sql3 = "update tbl_timeline set ".$period." = 0 where dept_id = ".$deptid." and group_name = '".$groupname."' and date = '".$date."' and day_order = ".$dayorder;
    mysqli_query($DB,$sql3);

    $sql4 = "select t1.current_usage, t2.max_book from tbl_limit t1 inner join tbl_role t2 on t1.role_id = t2.role_id where user_id = ".$userid." and sub_code = '".$subcode."' and group_name = '".$groupname."'";
    $result4 = mysqli_query($DB,$sql4);
    $row4 = mysqli_fetch_array($result4);
    $currentusage = $row4['current_usage'];
    $maxbook = $row4['max_book'];
    // echo $currentusage;
    // $today = $todaysusage - 1;
    // $sql5 = "update tbl_todaylimit set todaysusage = ".$today." where user_id = ".$userid." and sub_code = '".$subcode."'";
    // mysqli_query($DB,$sql5);
    
    $current = $currentusage - 1;
    // echo $current;
    $sql6 = "update tbl_limit set current_usage = ".$current." where user_id = ".$userid." and sub_code = '".$subcode."' and group_name = '".$groupname."'";
    mysqli_query($DB,$sql6);
    if() {
    $deptid = trim($_GET['deptid']);
    $group = trim($_GET['group']);
    $date = trim($_GET['date']);
    $dayorder = trim($_GET['dayorder']);
    $period = trim($_GET['period']);
    $username = trim($_GET['username']);
    $subcode = trim($_GET['subcode']);
    $description = trim($_GET['description']);
    $userid = trim($_GET['userid']);
    $roleid = trim($_GET['roleid']);
    $active = 0;
    $event = 0;

    $details = array(); 
    $details = explode("-",$subcode);
    $subject = $details[0];
    $dept = $details[1];
    $sec = $details[2];
    $sem = $details[4];

    $sql3 = "select t1.current_usage, t2.max_book from tbl_limit t1 inner join tbl_role t2 on t1.role_id = t2.role_id where user_id = ".$userid." and sub_code = '".$subject."' and group_name = '".$group."'";
    $result3 = mysqli_query($DB,$sql3);
    $row3 = mysqli_fetch_array($result3);
    $currentusage = $row3['current_usage'];
    $maxbook = $row3['max_book'];
    
    if($currentusage < $maxbook) {
        $sql = "insert into tbl_booking (dept_id, group_name, date, day_order, period, user_name, sub_code, dept, sec, sem, description, active, event) values (".$deptid.", '".$group."', '".$date."', ".$dayorder.", '". $period."', '".$username."', '".$subject."', '".$dept."', '".$sec."',".$sem.",'".$description."', ".$active.", ".$event.")";
        mysqli_query($DB,$sql);

        $sql1 = "select book_id from tbl_booking where dept_id = ".$deptid." and group_name = '".$group."' and date = '".$date."' and day_order = ".$dayorder." and period = '".$period."'";
        $result1 = mysqli_query($DB,$sql1);
        $row1 = mysqli_fetch_array($result1);
        $bookid = $row1['book_id'];
        // echo $bookid;

        $sql2 = "update tbl_timeline set ".$period." = ".$bookid." where dept_id = ".$deptid." and group_name = '".$group."' and date = '".$date."' and day_order = ".$dayorder;
        mysqli_query($DB,$sql2);

        // $today = $todaysusage + 1;
        // $sql5 = "update tbl_todaylimit set todaysusage = ".$today." where user_id = ".$userid." and sub_code = '".$subject."'";
        // mysqli_query($DB,$sql5);
        
        $current = $currentusage + 1;
        $sql6 = "update tbl_limit set current_usage = ".$current." where user_id = ".$userid." and sub_code = '".$subject."' and group_name = '".$group."'";
        mysqli_query($DB,$sql6);

        $json = array();
        $json["response"] = array(  
            "status" => true
        );
        echo json_encode($json);
    }
    else {
        $json = array();
        $json["response"] = array(  
            "status" => false,
            "error" => "maximum booking limit reached"
        );
        echo json_encode($json);
    }
}
?>