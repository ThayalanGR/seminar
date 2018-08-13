<?php

require_once('../config/dbconnection.php');

$currenttime = strtotime(date("Y-m-d"));
$sql1 = "select date from tbl_group";
$result1 = mysqli_query($DB,$sql1);
$current = "";
$group = "";

while($row1 = mysqli_fetch_array($result1)) {
    $group = $row1['date'];
    $newtime = strtotime($group);
    if($newtime == $currenttime) {
        $current = $group;
    }
}

$sql2 = "select group_id from tbl_group where date = '".$current."'";
$result2 = mysqli_query($DB,$sql2);
$row2 = mysqli_fetch_array($result2);
$groupid = $row2['group_id'];
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

for($x=1; $x<=8; $x++) {
    $sql6 = "insert into tbl_timeline (dept_id, group_name, date, day_order) values (".$x.",'".$tempgroupname."', '".$tempdaterow."', ".$tempdayorder.")";
    mysqli_query($DB,$sql6);
}

$sql7 = "select group_id from tbl_group where date = '".$current."'";
$result7 = mysqli_query($DB,$sql7);
$row7 = mysqli_fetch_array($result7);
$previd = $row7['group_id'] - 1;

$sql8 = "select date from tbl_group where group_id = ".$previd;
$result8 = mysqli_query($DB,$sql8);
$row8 = mysqli_fetch_array($result8);
$yesterday = $row8['date'];
echo $yesterday;
$sql9 = "delete from tbl_temp where date = '".$yesterday."'";
mysqli_query($DB,$sql9);
$sql10 = "delete from tbl_timeline where date = '".$yesterday."'";
mysqli_query($DB,$sql10);
$sql11 = "insert into  tbl_history(book_id, dept_id, group_name, date, day_order, period, user_name, sub_code, dept, sec, sem, description) (select book_id, dept_id, group_name, date, day_order, period, user_name, sub_code, dept, sec, sem, description from tbl_booking where date = '".$yesterday."')";
mysqli_query($DB,$sql11);

?>
