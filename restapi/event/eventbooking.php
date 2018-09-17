<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once('../config/dbconnection.php');

if(isset($_GET['deptid']) && isset($_GET['date']) && isset($_GET['period']) && isset($_GET['username']) && isset($_GET['description']) && isset($_GET['userid']) && isset($_GET['eventname'])) {
    $deptid = trim($_GET['deptid']);
    $date = trim($_GET['date']);
    $period = trim($_GET['period']);
    $name = trim($_GET['username']);
    $description = trim($_GET['description']);
    $userid = trim($_GET['userid']);
    $eventname = trim($_GET['eventname']);
    $event = 0;
    $active = 0;

    $timestamp = strtotime($date);
    $sql3 = "select dept_name from tbl_dept where dept_id = ".$deptid;
    $result3 = mysqli_query($DB,$sql3);
    $row3 = mysqli_fetch_array($result3);
    $dept = $row3['dept_name'];

    $sql2 = "select group_name, date, day_order from tbl_temp where date = '".$date."'";
    $result2 = mysqli_query($DB,$sql2);
    if ($row2 = mysqli_fetch_array($result2)) {
        $group = $row2['group_name']; 
        $date = $row2['date']; 
        $dayorder = $row2['day_order'];
        $periods = array(); 
        $periods = explode("-",$period);
        $periodcount = count($periods);

        for($x=0; $x < $periodcount; $x++) {
            $sql1 = "select book_id, dept_id, group_name, date, day_order, period, user_name, sub_code, dept, sec, sem, description, active, event from tbl_booking where date = '".$date."' and day_order = ".$dayorder." and period = '".$periods[$x]."' and group_name = '".$group."' and event = ".$event;
            $result1 = mysqli_query($DB,$sql1);
            if($row1 = mysqli_fetch_array($result1)) {
                $usrbookid = $row1['book_id'];
                $usrdeptid = $row1['dept_id'];
                $usrgroupname = $row1['group_name'];
                $usrdate = $row1['date'];
                $usrdayorder = $row1['day_order'];
                $usrperiod = $row1['period'];
                $username = $row1['user_name'];
                $usrsubcode = $row1['sub_code'];
                $usrdept = $row1['dept'];
                $usrsec = $row1['sec'];
                $usrsem = $row1['sem'];
                $usrdescription = $row1['description'];
                $usractive = $row1['active'];
                $usrevent = $row1['event'];

                $sql2 = "select user_id from tbl_staff where user_name = '".$username."'";
                $result2 = mysqli_query($DB,$sql2);
                $row2 = mysqli_fetch_array($result2);
                $userid = $row2['user_id'];
                // echo $userid;

                $sql7 = "insert into tbl_eventbackup(book_id, dept_id, group_name, date, day_order, period, user_name, sub_code, dept, sec, sem, description, active, event) values (".$usrbookid.", ".$usrdeptid.", '".$usrgroupname."', '".$usrdate."', ".$usrdayorder.", '".$usrperiod."', '".$username."', '".$usrsubcode."', '".$usrdept."', '".$usrsec."', ".$usrsem.", '".$usrdescription."', ".$usractive.", ".$usrevent.")";
                mysqli_query($DB,$sql7);

                ///cancellation to be mailed
                $message = '
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <meta http-equiv="X-UA-Compatible" content="ie=edge">
                
                    <style>
                    body{
                        display:flex;
                        background: #f3f3f3;
                        align-items:center;
                        align-contents:center;
                        text-align:center;
                        margin:0;
                        padding:0;
                        height: 100%;
                        width:100%;
                        overflow-x:hidden;
                    }
                    .container {
                        padding: 50px;
                        
        
                    }
        
                    .container > .row {
                        height: auto;
                        padding: 50px;
                        border-radius: 10px;
                        box-shadow: 10px 10px 10px 10px grey;
                        font-family: sans-serif;
                        line-height: 30px;
                        background:white;
        
                    }
        
                    .logo {
        
                        font-family: sans-serif;
                        font-size: 25px;
                        color: blue;
                    }
        
                    .button {
                        margin-top: 50px;
                        text-align: center;
                        text-decoration: none;
                        border-radius: 30px;
                        padding: 10px;
                    }
        
        
        
                    .text-p {
                        background: green;
                        color: white;
                    }
                    .text-d {
                        background: red;
                        color: white;
                    }
                    </style>
                </head>
                <body class="bg-light" style="max-width: 100vw; overflow:hidden;">
                    <div class="conatiner">
                        <div class="row  pt-5" >
                            <div class="col-md-8 shadow rounded offset-md-2 col-sm-10 offset-sm-1 bg-white pt-4" >
                                <div class="row">
                                    <div class="col text-center">
                                        <h3 class="logo text-warning">Saranathan College of Engineering</h3>
                                        <h5 class="text-primary">Seminar Hall Booking</h5>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col m-2 p-4">
                                        <p><span class="font-weight-bold">Hello  '.$username.'</span>,<br><br>
                                        <span class="font-weight-bold"></span> The seminar hall that you have booked for the period (ie., <span class="text-warning"> '.$usrdate.' Day Order - '.$usrdayorder.'  '.$usrdept.' Seminar Hall for the Class '.$usrsubcode.' - '.$usrdept.' - '.$usrsec.' -SEM- '.$usrsem.' </span>) has been cancelled due to the event('.$eventname.'). 
                                        <br> 
                                        </p>1
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </body>
                </html>
        ';
        
        
            // php mailer code starts
            date_default_timezone_set('Etc/UTC');
            $mail = new PHPMailer(true);
            $mail->IsSMTP(); // telling the class to use SMTP
            $mail->SMTPDebug = 0;                     // enables SMTP debug information (for testing)
            $mail->SMTPAuth = true;                  // enable SMTP authentication
            $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
            $mail->Host = gethostbyname('ssl://smtp.gmail.com');      // sets GMAIL as the SMTP server
            $mail->Port = 465;                   // set the SMTP port for the GMAIL server
            $mail->Username = 'dotcodecommunity@gmail.com';
            $mail->Password = 'dotcc@123';
            $mail->SetFrom('dotcodecommunity@gmail.com', 'Sara Seminar hall');
            $email = "grthayalan18@gmail.com";
            $mail->AddAddress($email);
            $mail->Subject = trim("Seminar Hall Booking Portal");
            $mail->MsgHTML($message);
            try {
                $mail->send();
            
                if(!$mail){
                    $json = array();
                    $json["response"] = array(  "status" => false);
                    echo json_encode($json);
                }
                else{
                    $json = array();
                    $json["response"] = array(  "status" => true);
                    echo json_encode($json);
                }
            } catch (Exception $ex) {
        
                $msg = $ex->getMessage();
                $msgType = "warning";
        
            }            

                $sql3 = "delete from tbl_booking where book_id = ".$usrbookid;
                mysqli_query($DB,$sql3);

                $sql4 = "update tbl_timeline set ".$usrperiod." = 0 where dept_id = ".$usrdeptid." and group_name = '".$usrgroupname."' and date = '".$usrdate."' and day_order = ".$usrdayorder;
                mysqli_query($DB,$sql4);

                $sql8 = "select t1.current_usage, t2.max_book from tbl_limit t1 inner join tbl_role t2 on t1.role_id = t2.role_id where user_id = ".$userid." and sub_code = '".$usrsubcode."' and group_name = '".$usrgroupname."'";
                $result8 = mysqli_query($DB,$sql8);
                $row8 = mysqli_fetch_array($result8);
                $currentusage = $row8['current_usage'];
                
                $current = $currentusage - 1;
                // echo $current;
                $sql9 = "update tbl_limit set current_usage = ".$current." where user_id = ".$userid." and sub_code = '".$usrsubcode."' and group_name = '".$usrgroupname."'";
                mysqli_query($DB,$sql9);
            }
            $sql6 = "insert into tbl_booking (dept_id, group_name, date, day_order, period, user_name, dept, description, active, event,event_name) values (".$deptid.", '".$group."', '".$date."', ".$dayorder.", '".$periods[$x]."', '".$name."', '".$dept."', '".$description."', ".$active.", ".$event.", '".$eventname."')";
            mysqli_query($DB,$sql6);

            $sql10 = "select book_id from tbl_booking where dept_id = ".$deptid." and group_name = '".$group."' and date = '".$date."' and day_order = ".$dayorder." and period = '".$periods[$x]."'";
            $result10 = mysqli_query($DB,$sql10);
            $row10 = mysqli_fetch_array($result10);
            $bookid = $row10['book_id'];

            $sql2 = "update tbl_timeline set ".$periods[$x]." = ".$bookid." where dept_id = ".$deptid." and group_name = '".$group."' and date = '".$date."' and day_order = ".$dayorder;
            mysqli_query($DB,$sql2);
        }
        $json = array();
        $json["response"] = array(  
            "status" => true
        );
        echo json_encode($json); 
    }
    else {
        $sql1 = "insert into tbl_events (dept_id, date, period, user_name, event_name, description, timestamp) values (".$deptid.", '".$date."', '".$period."', '".$name."', '".$eventname."', '".$description."', ".$timestamp.")";
        mysqli_query($DB,$sql1);
        $json = array();
        $json["response"] = array(  
            "status" => true
        );
        echo json_encode($json); 
    }
}
?>
