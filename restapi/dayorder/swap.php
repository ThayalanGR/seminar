<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once('../config/dbconnection.php');



if(isset($_GET['holiday']) && isset($_GET['id']) && isset($_GET['group'])) {
    $date1 = trim($_GET['holiday']); 
    $group1 = trim($_GET['group']);
    $id = trim($_GET['id']);
    $sql1 = "select date, group_name from tbl_group where group_id > ".$id." limit 6";
    $result1 = mysqli_query($DB,$sql1);
    $x = 0;
    while($row1 = mysqli_fetch_array($result1)) {
        $date[$x] = $row1['date'];
        $group[$x] = $row1['group_name'];
        $x++;
    }
    

    for($i=$x; $i>0; $i--) {
        $j = $i+1;
        if($i < 5) {
        $sql2 = "update tbl_temp set date = '".$date[$j]."' , group_name = '".$group[$j]."' where date  = '".$date[$i]."'";
        mysqli_query($DB,$sql2);

        $sql3 = "update tbl_timeline set date = '".$date[$j]."' , group_name = '".$group[$j]."' where date  = '".$date[$i]."'";
        mysqli_query($DB,$sql3);

        echo $sql2, $sql3;
        }
    }
    
    $sql2 = "update tbl_temp set date = '".$date[0]."' , group_name = '".$group[0]."' where date  = '".$date1."'";
    // mysqli_query($DB,$sql2);

    $sql3 = "update tbl_timeline set date = '".$date[0]."' , group_name = '".$group[0]."' where date  = '".$date1."'";
    // mysqli_query($DB,$sql3);
    echo $sql2, $sql3;

}
