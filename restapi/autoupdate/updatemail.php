<?php

require_once('../config/dbconnection.php');

$sql1 = "select user_name from tbl_staff";
$result1 = mysqli_query($DB,$sql1);
while($row1 = mysqli_fetch_array($result1)) {
    $usrname = $row1['user_name'];
    $email = $usrname."@saranathan.ac.in";
    echo $email."    ";
    $sql2 = "update tbl_staff set email = '".$email."' where user_name = '".$usrname."'";
    mysqli_query($DB,$sql2);
}
?>