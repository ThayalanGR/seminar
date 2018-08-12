<?php
    include("./restapi/config/dbconnection.php");
    $sql = "select * from tbl_staff";
    $result = mysqli_query($DB, $sql);
    while($row = mysqli_fetch_array($result))
    {
        $user_name = $row['user_name'];
        $password = md5($user_name);
        $sql1= "update tbl_staff set password='".$password."' where user_name='".$user_name."'";
        mysqli_query($DB,$sql1);
    } 

    // catch(Exception $e)
    // {
    //     echo $e;
    // }
?>