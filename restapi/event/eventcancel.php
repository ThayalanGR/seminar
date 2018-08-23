<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once('../config/dbconnection.php');

if(isset($_GET['bookid'])) {
    $bookid = trim($_GET['bookid']);    
    $booking = array(); 
    $booking = explode("-",$bookid);
    $bookcount = count($booking);

    for($x=0; $x<$bookcount; $x++) {
        $sql1 = "select  dept_id, group_name, date, day_order, period, sub_code, user_name from tbl_booking where book_id = " .$booking[$x]; 
        $result = mysqli_query($DB,$sql1);
        $row = mysqli_fetch_array($result); 
    
        $deptid = $row['dept_id']; 
        $groupname = $row['group_name']; 
        $date = $row['date']; 
        $dayorder = $row['day_order']; 
        $period = $row['period'];
        $username = $row['user_name'];

    
        $sql2 = "delete from tbl_booking where book_id = ".$booking[$x];
        mysqli_query($DB,$sql2);
    
        $sql3 = "update tbl_timeline set ".$period." = 0 where dept_id = ".$deptid." and group_name = '".$groupname."' and date = '".$date."' and day_order = ".$dayorder;
        mysqli_query($DB,$sql3);

        $sql4 = "select book_id, dept_id, group_name, date, day_order, period, user_name, sub_code, dept, sec, sem, description, active, event from tbl_eventbackup where dept_id = ".$deptid." and group_name = '".$groupname."' and date = '".$date."' and day_order = ".$dayorder." and period = '".$period."'" ;
        $result4 = mysqli_query($DB,$sql4);
        if($row4 = mysqli_fetch_array($result4)) {
            $usrbookid = $row4['book_id'];
            $usrdeptid = $row4['dept_id'];
            $usrgroupname = $row4['group_name'];
            $usrdate = $row4['date'];
            $usrdayorder = $row4['day_order'];
            $usrperiod = $row4['period'];
            $username = $row4['user_name'];
            $usrsubcode = $row4['sub_code'];
            $usrdept = $row4['dept'];
            $usrsec = $row4['sec'];
            $usrsem = $row4['sem'];
            $usrdescription = $row4['description'];
            $usractive = $row4['active'];
            $usrevent = $row4['event'];
            // echo $username;

            $sql5 = "select user_id from tbl_staff where user_name = '".$username."'";
            $result5 = mysqli_query($DB,$sql5);
            $row5 = mysqli_fetch_array($result5);
            $userid = $row5['user_id'];
            
            $sql3 = "select t1.current_usage, t2.max_book from tbl_limit t1 inner join tbl_role t2 on t1.role_id = t2.role_id where user_id = ".$userid." and sub_code = '".$usrsubcode."' and group_name = '".$usrgroupname."'";
            $result3 = mysqli_query($DB,$sql3);
            $row3 = mysqli_fetch_array($result3);
            $currentusage = $row3['current_usage'];
            $maxbook = $row3['max_book'];

            if($currentusage < $maxbook) {
                $sql6 = "insert into tbl_booking(dept_id, group_name, date, day_order, period, user_name, sub_code, dept, sec, sem, description, active, event) values (".$usrdeptid.", '".$usrgroupname."', '".$usrdate."', ".$usrdayorder.", '".$usrperiod."', '".$username."', '".$usrsubcode."', '".$usrdept."', '".$usrsec."', ".$usrsem.", '".$usrdescription."', ".$usractive.", ".$usrevent.")";
                mysqli_query($DB,$sql6);

                $sql9 = "select book_id from tbl_booking where dept_id = ".$usrdeptid." and group_name = '".$usrgroupname."' and date = '".$usrdate."' and day_order = ".$usrdayorder." and period = '".$usrperiod."'";
                $result9 = mysqli_query($DB,$sql9);
                $row9 = mysqli_fetch_array($result9);
                $bookid = $row9['book_id'];
                // echo $bookid;

                $sql7 = "update tbl_timeline set ".$usrperiod." = ".$bookid." where dept_id = ".$usrdeptid." and group_name = '".$usrgroupname."' and date = '".$usrdate."' and day_order = ".$usrdayorder;
                mysqli_query($DB,$sql7);
    
                $current = $currentusage + 1;
                $sql8 = "update tbl_limit set current_usage = ".$current." where user_id = ".$userid." and sub_code = '".$usrsubcode."' and group_name = '".$usrgroupname."'";
                mysqli_query($DB,$sql8);
    
                $json = array();
                $json["response"] = array(  
                    "status" => true,
                    "username" => $username,
                    "msg" => "event cancelled and booking is rollbacked"
                );
                echo json_encode($json);
            }
            else {
                $json = array();
                $json["response"] = array(  
                    "status" => false,
                    "username" => $username,
                    "error" => "maximum booking limit reached",
                    "msg" => "unable to rollback to previous booking"
                );
                echo json_encode($json);
            }
        }
    }
}
?>