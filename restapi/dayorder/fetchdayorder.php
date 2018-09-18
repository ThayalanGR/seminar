
<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once('../config/dbconnection.php');

if(isset($_GET['roleid'])) {
    $roleid = trim($_GET['roleid']);
    $date = date("Y-m-d");
    if($roleid == 3)
    {
        $json = array();
        $sql2 = "select group_name from tbl_group where date = '".$date."'";
        $result2 = mysqli_query($DB,$sql2);
        $row2 = mysqli_fetch_array($result2);
        $grpname = $row2['group_name'];
        
        $sql3 = "select group_id from tbl_group where group_name = '".$grpname."'";
        $result3 = mysqli_query($DB,$sql3);
        $row3 = mysqli_fetch_array($result3);
        $grpid = $row3['group_id'];
        
        $sql1 = "select distinct group_name from tbl_group";
        $result1 = mysqli_query($DB,$sql1);
        $count = 0; 
        while($row1 = mysqli_fetch_array($result1)) {
            $groupname = $row1['group_name'];
            $sql = "select group_name, day_order, date from tbl_group where group_name = '".$groupname."' and group_id >= ".$grpid;
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
