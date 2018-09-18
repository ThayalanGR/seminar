<?php

    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    require_once('../config/dbconnection.php');

  if(isset($_GET['userid']) && isset($_GET['tit']) && isset($_GET['monyr']) && isset($_GET['rem']) && isset($_GET['auth'])){
  
        $userid = $_GET['userid'];
        $author = $_GET['auth'];
        $title = $_GET['tit'];
        $monyr = $_GET['monyr'];
        $remarks = $_GET['rem'];
       
        $sql = "INSERT INTO staff_book(userid,author,btitle,monyr,remarks) VALUES('$userid','$author','$title','$monyr','$remarks')";
        mysqli_query($DB,$sql);
        $json = array();
        $json["response"] = array(  "status" => true);
        echo json_encode($json);
      
 }

?>