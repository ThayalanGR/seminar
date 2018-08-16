<?php

require_once('../config/dbconnection.php');

$sql1 = "select user_id, user_name, role_id from tbl_staff";
$result1 = mysqli_query($DB,$sql1);
while($row1 = mysqli_fetch_array($result1)) {
    $username = $row1['user_name'];
    $userid = $row1['user_id'];
    $roleid = $row1['role_id'];
    $sql2 = "select sub_code from tbl_workload where sub_type = 'T' and staff1 = '".$username."'";
    $result2 = mysqli_query($DB,$sql2);
    while($row2 = mysqli_fetch_array($result2)) {
        $subcode = $row2['sub_code'];
        $sql3 = "insert into tbl_limit (user_id, sub_code, role_id) values (".$userid.", '".$subcode."', ".$roleid.")";
        mysqli_query($DB,$sql3);
        $sql4 = "insert into tbl_todaylimit (user_id, sub_code, role_id) values (".$userid.", '".$subcode."', ".$roleid.")";
        mysqli_query($DB,$sql4);

    }
}



?>