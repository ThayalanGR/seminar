<?php

require_once('../config/dbconnection.php');

$sql2 = "select group_id, day_order from tbl_group where date = '2018-09-18'";
$result2 = mysqli_query($DB,$sql2);
$row2 = mysqli_fetch_array($result2);
$currentid = $row2['group_id'];
$dayorder = $row2['day_order'];

if($dayorder == 1) {        
    // $currentid = $currentid + 5;
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
?>