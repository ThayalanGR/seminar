<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once('../config/dbconnection.php');

// if(isset($_GET['date']) && isset($_GET['count'])) {


    
if(isset($_GET['count']) && isset($_GET['initial']) && isset($_GET['date'])) {
    $sql1 = "truncate table tbl_booking";
    mysqli_query($DB,$sql1);
    $sql1 = "truncate table tbl_events";
    mysqli_query($DB,$sql1);
    $sql1 = "truncate table tbl_eventbackup";
    mysqli_query($DB,$sql1);
    $sql1 = "truncate table tbl_group";
    mysqli_query($DB,$sql1);
    $sql1 = "truncate table tbl_history";
    mysqli_query($DB,$sql1);
    $sql1 = "truncate table tbl_limit";
    mysqli_query($DB,$sql1);
    $sql1 = "truncate table tbl_temp";
    mysqli_query($DB,$sql1);
    $sql1 = "truncate table tbl_timeline";
    mysqli_query($DB,$sql1);


    $count = trim($_GET['count']);
    $initial = trim($_GET['initial']);
    $date = trim($_GET['date']); 
    $timeline = $date ;

    if($initial == 1) {
        $count = $count * 5;
        $dayorder = 1;
        $i = 0;
        $gndate = $date;
        for($x=0; $x<$count; $x++) {
            $date = date('Y-m-d', strtotime("+$i days", strtotime($gndate)));   
            $is_sunday = date('l', strtotime($date)); 
            if($is_sunday == "Sunday")
            {
                $i=$i+1;
            }
            $do=$dayorder % 5;
            if($do == 0) {
                $do = 5;
            }
            $reqdate = date('Y-m-d', strtotime("$i days",strtotime($gndate)));  
            if($do == 1) {
                $groupname = $reqdate;
            }
            $sql = "insert into tbl_group (`group_name`,`day_order`,`date`) values ('".$groupname."', ".$do.", '". $reqdate."')";
            mysqli_query($DB,$sql); 
            $dayorder++;
            $i++;
        }
    }

    $sql5 = "select group_name, date, day_order from tbl_group where group_name = '".$timeline."'";
    $result5 = mysqli_query($DB,$sql5);
    while($row5 = mysqli_fetch_array($result5)) {
        $tempgroupname = $row5['group_name'];      
        $tempdaterow = $row5['date'];  
        $tempdayorder = $row5['day_order'];       
        for($x=1; $x<=7; $x++) {
            $sql6 = "insert into tbl_timeline (dept_id, group_name, date, day_order) values (".$x.",'".$tempgroupname."', '".$tempdaterow."', ".$tempdayorder.")";
            mysqli_query($DB,$sql6);
        }

    }
    $sql2 = "select group_id, day_order from tbl_group where date = '".$timeline."'";
    $result2 = mysqli_query($DB,$sql2);
    $row2 = mysqli_fetch_array($result2);
    $currentid = $row2['group_id'];
    $dayorder = $row2['day_order'];
    
    if($dayorder == 1) {        
        $sql3 = "select group_name from tbl_group where group_id = ".$currentid;
        $result3 = mysqli_query($DB,$sql3);
        $row3 = mysqli_fetch_array($result3);
        $nextgroup = $row3['group_name'];
    
        $sql1 = "select user_id, user_name, role_id from tbl_staff";
        $result1 = mysqli_query($DB,$sql1);
    
        while($row1 = mysqli_fetch_array($result1)) {
            $username = $row1['user_name'];
            $userid = $row1['user_id'];
            $roleid = $row1['role_id'];
            $sql2 = "select sub_code from tbl_workload where sub_type = 'T' and staff1 = '".$username."'";
            $result2 = mysqli_query($DB,$sql2);
            $groupname = "2018-08-18";
    
            while($row2 = mysqli_fetch_array($result2)) {
                $subcode = $row2['sub_code'];
                $sql3 = "insert into tbl_limit (user_id, sub_code, group_name, role_id) values (".$userid.", '".$subcode."', '".$nextgroup."', ".$roleid.")";
                mysqli_query($DB,$sql3);
                // $sql4 = "insert into tbl_todaylimit (user_id, sub_code, role_id) values (".$userid.", '".$subcode."', ".$roleid.")";
                // mysqli_query($DB,$sql4);
    
            }
        }
    }

    $currenttime = date("Y-m-d");
    // echo $currenttime;
    // $currenttime = $timeline;
    // echo $currenttime;

    
    $sql2 = "select group_id from tbl_group where date = '".$currenttime."'";
    $result2 = mysqli_query($DB,$sql2);
    $row2 = mysqli_fetch_array($result2);
    $groupid = $row2['group_id'];
    //  echo $groupid;

    $sql3 = "select group_name, day_order, date from tbl_group where group_id >= ".$groupid." limit 5";
    $result3 = mysqli_query($DB,$sql3);

    while($row3 = mysqli_fetch_array($result3)) {        
        $groupname = $row3['group_name'];        
        $dayorder = $row3['day_order'];        
        $daterow = $row3['date'];
        $sql4 = "insert into tbl_temp (group_name, date, day_order) values('".$groupname."', '".$daterow."', ".$dayorder.")";
        mysqli_query($DB,$sql4);
    }

    $sql5 = "select group_name, date, day_order from tbl_temp order by temp_id desc limit 1";
    $result5 = mysqli_query($DB,$sql5);
    $row5 = mysqli_fetch_array($result5);
    $tempgroupname = $row5['group_name'];      
    $tempdaterow = $row5['date'];  
    $tempdayorder = $row5['day_order'];

    for($x=1; $x<=7; $x++) {
        $sql6 = "insert into tbl_timeline (dept_id, group_name, date, day_order) values (".$x.",'".$tempgroupname."', '".$tempdaterow."', ".$tempdayorder.")";
        mysqli_query($DB,$sql6);
    }

    $sql7 = "select group_id from tbl_group where date = '".$currenttime."'";
    $result7 = mysqli_query($DB,$sql7);
    $row7 = mysqli_fetch_array($result7);
    $previd = $row7['group_id'] - 1;

    $sql8 = "select date from tbl_group where group_id = ".$previd;
    $result8 = mysqli_query($DB,$sql8);
    $row8 = mysqli_fetch_array($result8);
    $yesterday = $row8['date'];
    // echo $yesterday;

    $sql9 = "delete from tbl_temp where date = '".$yesterday."'";
    mysqli_query($DB,$sql9);

    $sql10 = "delete from tbl_timeline where date = '".$yesterday."'";
    mysqli_query($DB,$sql10);

    $sql11 = "insert into  tbl_history(book_id, dept_id, group_name, date, day_order, period, user_name, sub_code, dept, sec, sem, description) (select book_id, dept_id, group_name, date, day_order, period, user_name, sub_code, dept, sec, sem, description from tbl_booking where date = '".$yesterday."')";
    mysqli_query($DB,$sql11);

    $sql12 = "delete from tbl_booking where date = '".$yesterday."'";
    mysqli_query($DB,$sql12);



    $sql2 = "select group_id, day_order from tbl_group where date = '".$timeline."'";
    $result2 = mysqli_query($DB,$sql2);
    $row2 = mysqli_fetch_array($result2);
    $currentid = $row2['group_id'];
    $dayorder = $row2['day_order'];

    if($dayorder == 1) {        
        $currentid = $currentid + 5;
        $sql3 = "select group_name from tbl_group where group_id = ".$currentid;
        $result3 = mysqli_query($DB,$sql3);
        $row3 = mysqli_fetch_array($result3);
        $nextgroup = $row3['group_name'];

        $sql1 = "select user_id, user_name, role_id from tbl_staff";
        $result1 = mysqli_query($DB,$sql1);

        while($row1 = mysqli_fetch_array($result1)) {
            $username = $row1['user_name'];
            $userid = $row1['user_id'];
            $roleid = $row1['role_id'];
            $sql2 = "select sub_code from tbl_workload where sub_type = 'T' and staff1 = '".$username."'";
            $result2 = mysqli_query($DB,$sql2);
            // $groupname = "2018-08-18";

            while($row2 = mysqli_fetch_array($result2)) {
                $subcode = $row2['sub_code'];
                $sql3 = "insert into tbl_limit (user_id, sub_code, group_name, role_id) values (".$userid.", '".$subcode."', '".$nextgroup."', ".$roleid.")";
                mysqli_query($DB,$sql3);
                // $sql4 = "insert into tbl_todaylimit (user_id, sub_code, role_id) values (".$userid.", '".$subcode."', ".$roleid.")";
                // mysqli_query($DB,$sql4);

            }
        }
    }


    $json = array();
    $json["response"] = array(  
        "status" => true
    );
    echo json_encode($json);
}
?>
