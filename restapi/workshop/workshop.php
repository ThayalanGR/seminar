<?php

    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    require_once('../config/dbconnection.php');

  if(isset($_GET['userid']) && isset($_GET['dept']) && isset($_GET['wname']) && isset($_GET['org'])
  && isset($_GET['loc']) && isset($_GET['on']) && isset($_GET['from']) && isset($_GET['to']) 
  && isset($_GET['wtype']) && isset($_GET['acad']) && isset($_GET['rem']) && isset($_GET['dis'])){
  
  $id1 = $_GET['userid'];  
  $department = $_GET['dept'];
  $w_name = $_GET['wname'];
  $organiz = $_GET['org'];
  $locat = $_GET['loc'];
  $onDate = $_GET['on'];
  $fromDate = $_GET['from'];
  $toDate = $_GET['to'];
  $w_type = $_GET['wtype'];
  $acad_year = $_GET['acad'];
  $remarks = $_GET['rem'];
  $disporder = $_GET['dis'];
  
  $sql = "INSERT INTO staff_workshop(userid,dept,ws_name,organized_by,location,ws_date,ws_from_date,ws_to_date,remarks,wtype,disporder,aca_yr)
  VALUES('$id1','$department','$w_name','$organiz','$locat','$onDate','$fromDate','$todate','$remarks','$w_type','$disporder','$acad_year')";
  mysqli_query($DB,$sql);
  $json = array();
  $json["Conference_response"] = array(  "status" => true);
  echo json_encode($json);

 }

?>