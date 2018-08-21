<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once('../config/dbconnection.php');

if(isset($_GET['date']) && isset($_GET['count'])) {
    $gndate = trim($_GET['date']); 
    $count = trim($_GET['count']);
    $count = $count * 5;
    $dayorder = 1;
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
        $sql = "insert into tbl_dayorder (`group_name`,`day_order`,`date`) values ('".$groupname."', ".$do.", '". $reqdate."')";
        mysqli_query($DB,$sql); 
        $dayorder++;
        $i++;
    }
    $json = array();
    $json["response"] = array(  
        "status" => true
    );
    echo json_encode($json);
}
?>