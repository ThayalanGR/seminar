

<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once('../config/dbconnection.php');

if(isset($_GET['roleid'])) {
    $roleid = trim($_GET['roleid']);
    if($roleid == 3)
    {
        $json = array();
        $sql1 = "select distinct group_name from tbl_group";
        $result1 = mysqli_query($DB,$sql1);
        $count = 0; 
        while($row1 = mysqli_fetch_array($result1)) {
            $groupname = $row1['group_name'];
            // echo $groupname;
            $sql = "select group_name, day_order, date from tbl_group where group_name = '".$groupname."'";
            $result = mysqli_query($DB,$sql);
            $json[$count] = array();
            while($row = mysqli_fetch_array($result)) {
    
                $jsonArray= array(
                'capture' => true,
                'groupname' => $row['group_name'],
                'dayorder' => $row['day_order'],
                'date' => $row['date']
                );  
            array_push($json[$count], $jsonArray);
            }
        $count++;
        }
        echo json_encode($json);
    }
}
?>
