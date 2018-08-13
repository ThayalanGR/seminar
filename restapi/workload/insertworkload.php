<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once('../config/dbconnection.php');

if(isset($_GET['userid']) && isset($_GET['deptid']) && isset($_GET['subid']) && isset($_GET['section'])) {
    $userid = trim($_GET['userid']); 
    $deptid = trim($_GET['deptid']);
    $subid = trim($_GET['subid']);
    $section = trim($_GET['section']);
    $sql = "INSERT INTO `tbl_workload`(`user_id`, `dept_id`, `sub_id`, `sec`) VALUES (".$userid.",".$deptid.",".$subid.",'".$section."')";
    mysqli_query($DB,$sql);
    $json = array();
    $json["response"] = array(  
        "status" => true
    );
    echo json_encode($json);
}
?>


<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once('../config/dbconnection.php');

if(isset($_GET['userid'])) {
    $userid = trim(isset($_GET['userid']));
    $sql = "SELECT t2.user_name, t3.dept_name, t1.sub_id, t1.sec FROM tbl_workload t1 INNER JOIN tbl_staff t2 ON t1.user_id = t2.user_id INNER JOIN tbl_dept t3 ON t1.dept_id = t3.dept_id INNER JOIN tbl_subject t4 ON t1.sub_id = t4.sub_id WHERE t1.user_id =".$userid;
    
    $result = mysqli_query($DB,$sql);
    $json = array();
    $json["workload"] = array();
    while($row = mysqli_fetch_array($result)) {
            $jsonArray= array(
            'capture' => true,
            'subid' => $row['sub_id'],
            'dept' => $row['dept_name'],
            'section' => $row['sec']
            );
            array_push($json["workload"], $jsonArray);  
    }
    echo json_encode($json);
}
?>
