<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once('../config/dbconnection.php');



if(isset($_GET['olddate']) && isset($_GET['newdate'])) {
    $olddate_str = trim($_GET['olddate']); 
    $olddate = array(); 
    $olddate = explode("~",$olddate_str);
    $oldgroupname = $olddate[0];
    echo $oldgroupname.`<br>`;
    $newdate_str = trim($_GET['newdate']); 
    $newdate = array(); 
    $newdate = explode("~",$newdate_str);
    $daycount = count($newdate);
    $newgroupname = $newdate[0];
    $dayorder = 0;
    for($x=0; $x<$daycount; $x++)
    {
        echo $newdate[$x]."<br>";
        $dayorder = $x+1;
        $sql = "update tbl_group set date = '".$newdate[$x]."' where day_order = ".$dayorder." and group_name= '".$oldgroupname."'";
        mysqli_query($DB,$sql);
    }
    $sql1 = "update tbl_group set group_name = '".$newgroupname."' where group_name = '".$oldgroupname."'";
    mysqli_query($DB,$sql1);
    $json = array();
    $json["response"] = array(  
        "status" => true
    );
    echo json_encode($json);
}

?>