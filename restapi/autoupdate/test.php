<?php

require_once('../config/dbconnection.php');

$sql5 = "select group_name, date, day_order from tbl_group where group_name = '18-08-14'";
$result5 = mysqli_query($DB,$sql5);
while($row5 = mysqli_fetch_array($result5)) {
    $tempgroupname = $row5['group_name'];      
    $tempdaterow = $row5['date'];  
    $tempdayorder = $row5['day_order'];       
    for($x=1; $x<=7; $x++) {
        $sql6 = "insert into tbl_timeline (dept_id, group_name, date, day_order) values (".$x.",'".$tempgroupname."', '".$tempdaterow."', ".$tempdayorder.")";
        mysqli_query($DB,$sql6);
    }
}

?>