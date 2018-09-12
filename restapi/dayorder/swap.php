<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once('../config/dbconnection.php');

if(isset($_GET['holiday']) && isset($_GET['id']) && isset($_GET['group'])) {
    $date1 = trim($_GET['holiday']); 
    $group1 = trim($_GET['group']);
    $id = trim($_GET['id']);
    // echo $date1,$group1,$id;
    $sql = "select temp_id from tbl_temp where date = '".$date1."'";
    $result = mysqli_query($DB,$sql);
    $row = mysqli_fetch_array($result);
    $tempid = $row['temp_id'];

    $sql = "select temp_id from tbl_temp where temp_id >= ".$tempid;
    $result = mysqli_query($DB,$sql);
    $count = mysqli_num_rows($result);
    // echo $count;


    $sql1 = "select date, group_name, group_id from tbl_group where group_id >= ".$id." limit ".$count;
    $result1 = mysqli_query($DB,$sql1);
    $x = 0;
    while($row1 = mysqli_fetch_array($result1)) {
        $date[$x] = $row1['date'];
        $group[$x] = $row1['group_name'];
        $gid[$x] = $row1['group_id'];
        $x++;
    }
    // echo $x;
    
    $sql2 = "update tbl_temp set date = '".$date[0]."' , group_name = '".$group[0]."' , swap = 1 where swap = 0 and date  = '".$date1."'";
    mysqli_query($DB,$sql2);

    $sql3 = "update tbl_timeline set date = '".$date[0]."' , group_name = '".$group[0]."' , swap = 1 where swap = 0 and date  = '".$date1."'";
    mysqli_query($DB,$sql3);

    // echo $sql2, $sql3;
    for($i=0; $i<$x; $i++) {
        $j = $i+1;
        if($j < ($x)) {
        $sql2 = "update tbl_temp set date = '".$date[$j]."' , group_name = '".$group[$j]."' , swap = 1 where swap = 0 and date  = '".$date[$i]."'";
        mysqli_query($DB,$sql2);

        $sql3 = "update tbl_timeline set date = '".$date[$j]."' , group_name = '".$group[$j]."' , swap = 1 where swap = 0 and date  = '".$date[$i]."'";
        mysqli_query($DB,$sql3);

        // echo $sql2, $sql3;
        }
    }

    $sql4 = "update tbl_temp set swap = 0";
    mysqli_query($DB,$sql4);

    $sql5 = "update tbl_timeline set swap = 0";
    mysqli_query($DB,$sql5);

}
