<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once('../config/dbconnection.php');

// if(isset($_GET['date']) && isset($_GET['count'])) {


    
if(isset($_GET['count']) && isset($_GET['initial']) && isset($_GET['date'])) {
    $sql1 = "truncate table tbl_booking";
    mysqli_query($DB,$sql1);
    $sql1 = "truncate table tbl_events";
    mysqli_query($DB,$sql1);
    $sql1 = "truncate table tbl_eventbackup";
    mysqli_query($DB,$sql1);
    $sql1 = "truncate table tbl_group";
    mysqli_query($DB,$sql1);
    $sql1 = "truncate table tbl_history";
    mysqli_query($DB,$sql1);
    $sql1 = "truncate table tbl_limit";
    mysqli_query($DB,$sql1);
    $sql1 = "truncate table tbl_temp";
    mysqli_query($DB,$sql1);
    $sql1 = "truncate table tbl_timeline";
    mysqli_query($DB,$sql1);


    $count = trim($_GET['count']);
    $initial = trim($_GET['initial']);
    $date = trim($_GET['date']); 
    $timeline = $date ;

    if($initial == 1) {
        $count = $count * 5;
        $dayorder = 1;
        $i = 0;
        $gndate = $date;
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
            $sql = "insert into tbl_group (`group_name`,`day_order`,`date`) values ('".$groupname."', ".$do.", '". $reqdate."')";
            mysqli_query($DB,$sql); 
            $dayorder++;
            $i++;
        }
    }

    $sql5 = "select group_name, date, day_order from tbl_group where group_name = '".$timeline."'";
    // echo $sql5;
    $result5 = mysqli_query($DB,$sql5);
    while($row5 = mysqli_fetch_array($result5)) {
        // echo "hhh";
        $tempgroupname = $row5['group_name'];      
        $tempdaterow = $row5['date'];  
        $tempdayorder = $row5['day_order'];       
        for($x=1; $x<=7; $x++) {
            $sql6 = "insert into tbl_timeline (dept_id, group_name, date, day_order) values (".$x.",'".$tempgroupname."', '".$tempdaterow."', ".$tempdayorder.")";
            mysqli_query($DB,$sql6);
        }

    }
    header("location: ./timelineupdate.php?initial=1");
    $json = array();
    $json["response"] = array(  
        "status" => true
    );
    echo json_encode($json);
}
?>
