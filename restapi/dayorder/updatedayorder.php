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
    
    $date1 = $holiday;
    $group1 = $groupname;
    $id = $did;

    // echo $date1, $group1,$id;

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


    // echo $date1,$group1,$id;

    // $sql = "select temp_id from tbl_temp where date = '".$date1."'";
    // $result = mysqli_query($DB,$sql);
    // $row = mysqli_fetch_array($result);
    // $tempid = $row['temp_id'];

    // $sql = "select temp_id from tbl_temp where temp_id >= ".$tempid;
    // $result = mysqli_query($DB,$sql);
    // $count = mysqli_num_rows($result);


    // $sql1 = "select date, group_name, group_id from tbl_group where group_id > ".$id." limit ".$count;
    // $result1 = mysqli_query($DB,$sql1);
    // $x = 0;
    // while($row1 = mysqli_fetch_array($result1)) {
    //     $date[$x] = $row1['date'];
    //     $group[$x] = $row1['group_name'];
    //     $gid[$x] = $row1['group_id'];
    //     $x++;
    // }
    
    // $sql2 = "update tbl_temp set date = '".$date[0]."' , group_name = '".$group[0]."' , swap = 1 where swap = 0 and date  = '".$date1."'";
    // mysqli_query($DB,$sql2);

    // $sql3 = "update tbl_timeline set date = '".$date[0]."' , group_name = '".$group[0]."' , swap = 1 where swap = 0 and date  = '".$date1."'";
    // mysqli_query($DB,$sql3);

    // echo $sql2, $sql3;
    // for($i=0; $i<$x; $i++) {
    //     $j = $i+1;
    //     if($j < ($x)) {
    //     $sql2 = "update tbl_temp set date = '".$date[$j]."' , group_name = '".$group[$j]."' , swap = 1 where swap = 0 and date  = '".$date[$i]."'";
    //     mysqli_query($DB,$sql2);

    //     $sql3 = "update tbl_timeline set date = '".$date[$j]."' , group_name = '".$group[$j]."' , swap = 1 where swap = 0 and date  = '".$date[$i]."'";
    //     mysqli_query($DB,$sql3);

    //     echo $sql2, $sql3;
    //     }
    // }

    // $sql4 = "update tbl_temp set swap = 0";
    // mysqli_query($DB,$sql4);

    // $sql5 = "update tbl_timeline set swap = 0";
    // mysqli_query($DB,$sql5);

    // $json = array();
    // $json["response"] = array(  
    //     "status" => true
    // );
    // echo json_encode($json);

    $divert=$date1."&id=".$id."&group=".$group1;
    header("location: ./swap.php?holiday=$divert");

    // header("location: ./swap.php?holiday=$holiday&id=$did&group=$groupname");
}
?>