<?php

require_once('../config/dbconnection.php');

$sql1 = "select user_id, dept_name, dept_id from tbl_staff";
$result1 = mysqli_query($DB,$sql1);
while($row1 = mysqli_fetch_array($result1)) {
    $name = $row1['dept_name'];
    $id = $row1['dept_id'];


}
?>