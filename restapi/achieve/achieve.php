<?php

    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    require_once('../config/dbconnection.php');

  if(isset($_GET['content']) && isset($_GET['disporder']) && isset($_GET['userid'])){
  
  $content = $_GET['content'];
  $disporder = $_GET['disporder'];
  $userId = $_GET['userid'];
  //echo $userId,$content,$disporder;

  $sql = "INSERT INTO staff_achievements(userid,content,disporder) VALUES('$userId','$content','$disporder')";
  mysqli_query($DB,$sql);
  $json = array();
  $json["response"] = array(  "status" => true);
  echo json_encode($json);

 }

?>