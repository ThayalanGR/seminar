

<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once('../config/dbconnection.php');

if(isset($_GET['roleid'])) {
    $roleid = trim($_GET['roleid']);
    if($roleid == 3)
    {
        $sql = "select group_name, day_order, date from tbl_group";
        
        $result = mysqli_query($DB,$sql);
        $json = array();
        $json["group"] = array();
        while($row = mysqli_fetch_array($result)) {

            $jsonArray= array(
            'capture' => true,
            'groupname' => $row['group_name'],
            'dayorder' => $row['day_order'],
            'date' => $row['date']
            );
            array_push($json["group"], $jsonArray);  
        }
        echo json_encode($json);
    }
}
?>
