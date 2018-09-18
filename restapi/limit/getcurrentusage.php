<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once('../config/dbconnection.php');

if(isset($_GET['userid']) && isset($_GET['subcode']) && isset($_GET['group'])) {
    $userid = trim($_GET['userid']);
    $subcode = trim($_GET['subcode']);
    $group = trim($_GET['group']);
    $sql3 = "select t1.current_usage, t2.max_book from tbl_limit t1 inner join tbl_role t2 on t1.role_id = t2.role_id where user_id = ".$userid." and sub_code = '".$subcode."' and group_name = '".$group."'";
    $result3 = mysqli_query($DB,$sql3);
    $row3 = mysqli_fetch_array($result3);
    $currentusage = $row3['current_usage'];
    $maxbook = $row3['max_book'];
    if($currentusage < $maxbook) {
        $json = array();
            $json["response"] = array(  
                "status" => true
            );
            echo json_encode($json);
    }
    else {
        $json = array();
            $json["response"] = array(  
                "status" => false
            );
            echo json_encode($json);
    }

}

?>