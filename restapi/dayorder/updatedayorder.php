<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once('../config/dbconnection.php');



if(isset($_GET['holiday'])) {

    $holiday = trim($_GET['holiday']); 
    $sql1 = "select group_id, group_name, date, day_order from tbl_group where date = '".$holiday."'";
    $result1 = mysqli_query($DB,$sql1);
    $row1 = mysqli_fetch_array($result1);
    $did = $row1['group_id'];
    $dayorder = $row1['day_order'];
    $groupname = $row1['group_name'];

    
    $sql3 = "select group_name, date from tbl_group where group_id >= ".$did." limit 5";
    $result3 = mysqli_query($DB,$sql3);
    $x = 0;
    while ($row3 = mysqli_fetch_array($result3)) {
    $olddate[$x] = $row3['date'];
    $oldgroupname[$x] = $row3['group_name'];
    $x++;
    }

    $sql2 = "select date, day_order from tbl_group where group_id >= ".$did;
    $result2 = mysqli_query($DB,$sql2);
    $count = mysqli_num_rows($result2);
    // echo $count;
    $gndate = $holiday;
    $i = 1;
    
    for($x=0; $x<$count; $x++) {
        $date = date('Y-m-d', strtotime("+$i days", strtotime($gndate)));   
        $is_sunday = date('l', strtotime($date)); 

        if($is_sunday == "Sunday")
        {
            $i=$i+1;
        }

        $do=$dayorder % 5;
        if($do == 0) {
            $do = 5;
        }

        $reqdate = date('Y-m-d', strtotime("$i days",strtotime($gndate)));  
        if($do == 1) {
            $groupname = $reqdate;
        }

        $sql = "update tbl_group set group_name = '".$groupname."', date = '".$reqdate."' where group_id = ".$did;
        mysqli_query($DB,$sql); 

        $dayorder++;
        $i++;
        $did++;
    }
    
    $sql3 = "select group_name, date from tbl_group where group_id > ".$did." limit 5";
    $result3 = mysqli_query($DB,$sql3);
    $x = 0;
    while ($row3 = mysqli_fetch_array($result3)) {
    $newdate[$x] = $row3['date'];
    $newgroupname[$x] = $row3['group_name'];
    $x++;
    }

    for($i=0; $i<$x; $i++) {
        $sql = "update tbl_temp set group_name = '".$newgroupname[$i]."', date = '".$newdate[$i]."' where date = ".$olddate[$i].;
        mysqli_query($DB,$sql);
        $sql = "update tbl_timeline set group_name = '".$newgroupname[$i]."', date = '".$newdate[$i]."' where date = ".$olddate[$i].;
        mysqli_query($DB,$sql);
    }




    // while($row2 = mysqli_fetch_array($result2)) {
    //     $swapdate = $row2['date'];
    //     $did++;
    // }
    // $sql6 = "select group_id, day_order from tbl_group where date = '".$swapdate."'";
    // $result6 = mysqli_query($DB,$sql6);
    // $row6 = mysqli_fetch_array($result6);    
    // $extradid = $row6['group_id'];
    // $extrado = $row6['day_order'];
    // $sql7 = "select count(group_id) from tbl_group where group_id > ".$extradid;
    // $result7 = mysqli_query($DB,$sql7);
    // $extra = mysqli_num_rows($result7);
    // $count = $extra;
    // $gndate = $swapdate;
    // $dayorder = $extrado;
    // $i = 0;
    // for($x=0; $x<$count; $x++) {
    //     $date = date('Y-m-d', strtotime("+$i days", strtotime($gndate)));   
    //     $is_sunday = date('l', strtotime($date)); 
    //     if($is_sunday == "Sunday")
    //     {
    //         $i=$i+1;
    //     }
    //     $do=$dayorder % 5;
    //     if($do == 0) {
    //         $do = 5;
    //     }
    //     $reqdate = date('Y-m-d', strtotime("$i days",strtotime($gndate)));  
    //     if($do == 1) {
    //         $groupname = $reqdate;
    //     }
    //     $extradid++;
    //     $sql = "update tbl_group set date = '".$reqdate."' where group_id = ".$extradid;
    //     mysqli_query($DB,$sql); 
    //     $dayorder++;
    //     $i++;
    // }
    // $sql4 = "select group_id, date, day_order from tbl_group";
    // $result4 = mysqli_query($DB,$sql4); 
    // while($row4 = mysqli_fetch_array($result4)) {
    //     $grpdid = $row4['group_id'];
    //     $grpdate = $row4['date'];
    //     $grpdo = $row4['day_order'];
    //     if($grpdo == 1) {
    //         $groupname = $grpdate;
    //     }
    //     $sql5 = "update tbl_group set group_name = '".$groupname."' where group_id = ".$grpdid;
    //     mysqli_query($DB,$sql5);
    // }


    $json = array();
    $json["response"] = array(  
        "status" => true
    );
    echo json_encode($json);
}
?>