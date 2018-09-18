<?php

    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    require_once('../config/dbconnection.php');

  if(isset($_GET['userid']) && isset($_GET['auth']) && isset($_GET['dept']) && isset($_GET['tit']) && isset($_GET['cname']) && isset($_GET['org'])
  && isset($_GET['loc']) && isset($_GET['on']) && isset($_GET['from']) && isset($_GET['to']) && isset($_GET['pag'])
  && isset($_GET['ctype']) && isset($_GET['url'])&& isset($_GET['acad']) && isset($_GET['rem']) && isset($_GET['dis'])){
  
  $id1 = $_GET['userid'];  
  $author = $_GET['auth'];
  $department = $_GET['dept'];
  $title = $_GET['tit'];
  $confer_name = $_GET['cname'];
  $organiz = $_GET['org'];
  $locat = $_GET['loc'];
  $onDate = $_GET['on'];
  $fromDate = $_GET['from'];
  $toDate = $_GET['to'];
  $pages = $_GET['pag'];
  $confer_type = $_GET['ctype'];
  $url = $_GET['url'];
  $acad_year = $_GET['acad'];
  $remarks = $_GET['rem'];
  $disporder = $_GET['dis'];
  
  $sql = "INSERT INTO staff_conference(userid,author_name,dept,title,conf_name,organized_by,locat,conf_date,conf_from_date,con_to_date,pages,ctype,remarks,conf_url,disporder,aca_yr)
  VALUES('$id1','$author','$department','$title','$confer_name','$organiz','$locat','$onDate','$fromDate','$todate','$pages','$confer_type','$remarks','$url','$disporder','$acad_year')";
  mysqli_query($DB,$sql);
  $json = array();
  $json["Conference_response"] = array(  "status" => true);
  echo json_encode($json);

 }

?>