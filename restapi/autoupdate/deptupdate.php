<?php

require_once('../config/dbconnection.php');

// $sql1 = "select user_name from tbl_staff";
// $result1 = mysqli_query($DB,$sql1);
// while($row1 = mysqli_fetch_array($result1)) {
//     $name = $row1['user_name'];
//     $sql2 = "select Dept from stafftbl where empno = '".$name."'";
//     $result2 = mysqli_query($DB,$sql2);
//     $row2 = mysqli_fetch_array($result2);
//     $dept = $row2['Dept'];
//     $sql3 = "update tbl_staff set dept = '".$dept."' where user_name = '".$name."'";
//     mysqli_query($DB,$sql3);

// }


$sql1 = "select dept_name from tbl_staff";
$result1 = mysqli_query($DB,$sql1);
while($row1 = mysqli_fetch_array($result1)) {
    $dept = $row1['dept_name'];
    $sql2 = "select dept_id from tbl_dept where dept_name = '".$dept."'";
    $result2 = mysqli_query($DB,$sql2);
    $row2 = mysqli_fetch_array($result2);
    $deptid = $row2['dept_id'];
    $sql3 = "update tbl_staff set dept_id = '".$deptid ."' where dept_name = '".$dept."'";
    mysqli_query($DB,$sql3);

}




?>