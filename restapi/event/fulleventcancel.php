<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once('../config/dbconnection.php');

if(isset($_GET['eventid'])) {
    $eventid = trim($_GET['eventid']);

    // $sql = "select event_id, dept_id, date, period, user_name, event_name, description from tbl_events where event_id = ".$eventid;
    // $result = mysqli_query($DB,$sql);
    // $row = mysqli_fetch_array($result)
    // $event_id = $row['event_id'];
    // $dept_id = $row['dept_id'];
    // $date = $row['date'];
    // $period = $row['period'];
    // $user_name = $row['user_name'];
    // $event_name = $row['event_name'];
    // $description = $row['description'];

    // $sql1 = "select date from tbl_temp where date = '".$date."'";
    // $result1 = mysqli_query($DB,$sql1);
    // if($row1 = mysqli_fetch_array($result1)) {
    //     $periods = array(); 
    //     $periods = explode("-",$period);
    //     $periodcount = count($periods);

    //     for($x=0; $x<$periodcount; $x++) {
            

    //     }
    // }
    // else {
        $sql1 = "delete from tbl_events where event_id = ".$eventid;
        mysqli_query($DB,$sql1);    
    // }

    
    
}

?>