<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once('../config/dbconnection.php');



if(isset($_GET['holiday'])) {

    $holiday = trim($_GET['holiday']); 
    $sql1 = "select d_id from tbl_dayorder where date = '".$holiday."'";
    $result1 = mysqli_query($DB,$sql1);
    $row1 = mysqli_fetch_array($result1);
    $did = $row1['d_id'];
    $temp = $did;

    $sql2 = "select date from tbl_dayorder where d_id > ".$did;
    $result2 = mysqli_query($DB,$sql2);
    while($row2 = mysqli_fetch_array($result2)) {
        $swapdate = $row2['date'];
        $did++;
    }
    $sql6 = "select d_id, day_order from tbl_dayorder where date = '".$swapdate."'";
    $result6 = mysqli_query($DB,$sql6);
    $row6 = mysqli_fetch_array($result6);    
    $extradid = $row6['d_id'];
    $extrado = $row6['day_order'];
    $sql7 = "select count(d_id) from tbl_dayorder where d_id > ".$extradid;
    $result7 = mysqli_query($DB,$sql7);
    $extra = mysqli_num_rows($result7);
    $count = $extra;
    $gndate = $swapdate;
    $dayorder = $extrado;
    $i = 0;
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
        $extradid++;
        $sql = "update tbl_dayorder set date = '".$reqdate."' where d_id = ".$extradid;
        mysqli_query($DB,$sql); 
        $dayorder++;
        $i++;
    }
    $sql4 = "select d_id, date, day_order from tbl_dayorder";
    $result4 = mysqli_query($DB,$sql4); 
    while($row4 = mysqli_fetch_array($result4)) {
        $grpdid = $row4['d_id'];
        $grpdate = $row4['date'];
        $grpdo = $row4['day_order'];
        if($grpdo == 1) {
            $groupname = $grpdate;
        }
        $sql5 = "update tbl_dayorder set group_name = '".$groupname."' where d_id = ".$grpdid;
        mysqli_query($DB,$sql5);
    }
    $json = array();
    $json["response"] = array(  
        "status" => true
    );
    echo json_encode($json);
}
?>