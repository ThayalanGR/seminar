<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once('../config/dbconnection.php');

if(isset($_GET['date'])) {
    $date_str = trim($_GET['date']); 
    $date = array(); 
    $date = explode("~",$date_str);
    $daycount = count($date);
    $groupname = $date[0];
    for($x=0; $x<$daycount; $x++)
    {
        echo $date[$x];
        $dayorder = $x+1;
        $sql = "insert into tbl_group (`group_name`,`day_order`,`date`) values ('".$groupname."',". $dayorder.",'". $date[$x]."')";
        mysqli_query($DB,$sql);
    }
    $json = array();
    $json["response"] = array(  
        "status" => true
    );
    echo json_encode($json);
}
?>