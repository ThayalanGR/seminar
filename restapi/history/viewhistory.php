<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once('../config/dbconnection.php');

if(isset($_GET['roleid'])) {
    $roleid = trim($_GET['roleid']);
    if($roleid == 3)
    {
        $sql = "SELECT t1.book_id, t2.dept_name, t1.week, t1.day_order, t1.period, t3.user_name, t1.subject_code, tt4.hall_id FROM tbl_history t1 inner join tbl_dept t2 on t1.dept_id = t2.dept_id inner join tbl_staff t3 on t1.uesr_id = t3.user_id  inner join tbl_seminar_hall t4 on t1.hall_id = t4.hall_id ";

        $result = mysqli_query($DB,$sql);
        
        if($row = mysqli_fetch_array($result)) {
            $json = array();
            $json["response"] = array();
            $jsonArray= array(
            'oAuth' => true,
            'token' => $row['user_id'],
            'initial' => $row['initial_change']
            );
            array_push($json["response"], $jsonArray);  
            echo json_encode($json);
        }
        else {
            $json = array();
            $json["response"] = array();
            $jsonArray= array(
            'oAuth' => false,
            );
            array_push($json["response"], $jsonArray);  
            echo json_encode($json);
        }
    }


}


?>