<?php

    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    require_once('../config/dbconnection.php');

  if(isset($_GET['aof']) && isset($_GET['dis']) && isset($_GET['userid'])){
  
        $areaOfInterest = $_GET['aof'];
        $disporder = $_GET['dis'];
        $userId = $_GET['userid'];
  
        $sql = "INSERT INTO staff_areaofinterest(userid,areaofinterest,disporder) VALUES('$userId','$areaOfInterest','$disporder')";
        mysqli_query($DB,$sql);
        $json = array();
        $json["response"] = array(  "status" => true);
        echo json_encode($json);
      
 }

?>