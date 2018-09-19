<?php

require_once('../config/dbconnection.php');

$currenttime = date("Y-m-d");
// $sql1 = "select date from tbl_group";
// $result1 = mysqli_query($DB,$sql1);
// $current = "";
// $group = "";

// while($row1 = mysqli_fetch_array($result1)) {
//     $group = $row1['date'];
//     $newtime = strtotime($group);
//     if($newtime == $currenttime) {
//         $current = $group;
//     }
// }

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


$currenttime = date("Y-m-d");

$sql2 = "select group_id, day_order from tbl_group where date = '".$currenttime."'";
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

$eventtime = $tempdaterow;

$sql1 = "select dept_id, date, period, user_name, event_name, description from tbl_events where date = '".$eventtime."'";
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
