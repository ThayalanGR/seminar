<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require_once('../config/dbconnection.php');

if(isset($_GET['userid']) && isset($_GET['auth']) && isset($_GET['dept']) && isset($_GET['tit']) && isset($_GET['jname']) && isset($_GET['mon'])
&& isset($_GET['year']) && isset($_GET['vol']) && isset($_GET['is']) && isset($_GET['pag'])
&& isset($_GET['jtype']) && isset($_GET['jurl']) && isset($_GET['ptype']) && isset($_GET['acad']) && isset($_GET['rem']) && isset($_GET['dis'])){

$id1 = $_GET['userid'];  
$author = $_GET['auth'];
$department = $_GET['dept'];
$title = $_GET['tit'];
$j_name = $_GET['jname'];
$month = $_GET['mon'];
$year = $_GET['year'];
$volume = $_GET['vol'];
$issue = $_GET['is'];
$pages = $_GET['pag'];
$j_type = $_GET['jtype'];
$j_url = $_GET['jurl'];
$p_type = $_GET['ptype'];
$acad_year = $_GET['acad'];
$remarks = $_GET['rem'];
$disporder = $_GET['dis'];

$sql = "INSERT INTO staff_journals(USERID,author_name,dept,title,journal_name,pub_month,pub_year,volume,issue,pages,jtype,remarks,j_url,pub_type,disporder,aca_yr)
VALUES('$id1','$author','$department','$title','$j_name','$month','$year','$volume','$issue','$pages','$j_type','$remarks','$j_url','$p_type','$disporder','$acad_year')";
mysqli_query($DB,$sql);
$json = array();
$json["Conference_response"] = array(  "status" => true);
echo json_encode($json);

}

?>
