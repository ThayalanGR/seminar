<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once('../config/dbconnection.php');
require_once('../library/phpmailer/class.phpmailer.php');


if(isset($_GET['eventid']) && isset($_GET['periods']) && isset($_GET['date']) ) {
    $counter =false;
    $periodString = trim($_GET['periods']);    
    $periods = array(); 
    $periods = explode("-",$periodString);
    $periodsCount = count($periods);
    $eventDate = trim($_GET['date']);    
    $eventid = trim($_GET['eventid']);

    $sql4 = "select * from tbl_timeline where date = '".$eventDate."'";
    $result4 = mysqli_query($DB,$sql4);

    if($row4 = mysqli_fetch_array($result4)) {
        $sql1 = "select event_name from tbl_events where event_id = ".$eventid;
        $result = mysqli_query($DB,$sql1);
        $row = mysqli_fetch_array($result);  
        $eventname = $row['event_name']; 
    
    
        $sql1 = "delete from tbl_events where event_id = ".$eventid;
        mysqli_query($DB,$sql1);
    
    
        for($x=0; $x<$periodsCount; $x++) {
            $sql1 = "select  dept_id, group_name, date, day_order, period, sub_code, user_name, book_id from tbl_booking where period = '".$periods[$x]."' and date = '".$eventDate."' "; 
            $result = mysqli_query($DB,$sql1);
            $row = mysqli_fetch_array($result);  
    
            $deptid = $row['dept_id']; 
            $groupname = $row['group_name']; 
            $date = $row['date']; 
            $dayorder = $row['day_order']; 
            $period = $row['period'];
            $username = $row['user_name'];
            $bookid = $row['book_id'];
    
    
            $sql2 = "delete from tbl_booking where book_id = ".$bookid;
            mysqli_query($DB,$sql2);
    
            $sql3 = "update tbl_timeline set ".$period." = 0 where dept_id = ".$deptid." and group_name = '".$groupname."' and date = '".$date."' and day_order = ".$dayorder;
            mysqli_query($DB,$sql3);
    
            $sql4 = "select book_id, dept_id, group_name, date, day_order, period, user_name, sub_code, dept, sec, sem, description, active, event from tbl_eventbackup where dept_id = ".$deptid." and group_name = '".$groupname."' and date = '".$date."' and day_order = ".$dayorder." and period = '".$period."'" ;
            $result4 = mysqli_query($DB,$sql4);
            if($row4 = mysqli_fetch_array($result4)) {
                $usrbookid = $row4['book_id'];
                $usrdeptid = $row4['dept_id'];
                $usrgroupname = $row4['group_name'];
                $usrdate = $row4['date'];
                $usrdayorder = $row4['day_order'];
                $usrperiod = $row4['period'];
                $username = $row4['user_name'];
                $usrsubcode = $row4['sub_code'];
                $usrdept = $row4['dept'];
                $usrsec = $row4['sec'];
                $usrsem = $row4['sem'];
                $usrdescription = $row4['description'];
                $usractive = $row4['active'];
                $usrevent = $row4['event'];
                // echo $username;
    
                $sql5 = "select user_id from tbl_staff where user_name = '".$username."'";
                $result5 = mysqli_query($DB,$sql5);
                $row5 = mysqli_fetch_array($result5);
                $userid = $row5['user_id'];
                
                $sql3 = "select t1.current_usage, t2.max_book from tbl_limit t1 inner join tbl_role t2 on t1.role_id = t2.role_id where user_id = ".$userid." and sub_code = '".$usrsubcode."' and group_name = '".$usrgroupname."'";
                $result3 = mysqli_query($DB,$sql3);
                $row3 = mysqli_fetch_array($result3);
                $currentusage = $row3['current_usage'];
                $maxbook = $row3['max_book'];
    
                if($currentusage < $maxbook) {
                        $sql6 = "insert into tbl_booking(dept_id, group_name, date, day_order, period, user_name, sub_code, dept, sec, sem, description, active, event) values (".$usrdeptid.", '".$usrgroupname."', '".$usrdate."', ".$usrdayorder.", '".$usrperiod."', '".$username."', '".$usrsubcode."', '".$usrdept."', '".$usrsec."', ".$usrsem.", '".$usrdescription."', ".$usractive.", ".$usrevent.")";
                        mysqli_query($DB,$sql6);
    
                        $sql9 = "select book_id from tbl_booking where dept_id = ".$usrdeptid." and group_name = '".$usrgroupname."' and date = '".$usrdate."' and day_order = ".$usrdayorder." and period = '".$usrperiod."'";
                        $result9 = mysqli_query($DB,$sql9);
                        $row9 = mysqli_fetch_array($result9);
                        $bookid = $row9['book_id'];
                        // echo $bookid;
    
                        $sql7 = "update tbl_timeline set ".$usrperiod." = ".$bookid." where dept_id = ".$usrdeptid." and group_name = '".$usrgroupname."' and date = '".$usrdate."' and day_order = ".$usrdayorder;
                        mysqli_query($DB,$sql7);
            
                        $current = $currentusage + 1;
                        $sql8 = "update tbl_limit set current_usage = ".$current." where user_id = ".$userid." and sub_code = '".$usrsubcode."' and group_name = '".$usrgroupname."'";
                        mysqli_query($DB,$sql8);
            
                        // $json = array();
                        // $json["response"] = array(  
                        //     "status" => true,
                        //     "username" => $username,
                        //     "msg" => "event cancelled and booking is rollbacked"
                        // );
                        // echo json_encode($json);
    
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
                                                <span class="font-weight-bold"></span> The event ('.$eventname.') has been cancelled due to some reasons and the period you have on that day is rollbacked (ie., <span class="text-warning"> '.$usrdate.' Day Order - '.$usrdayorder.'  '.$usrdept.' Seminar Hall for the Class '.$usrsubcode.' - '.$usrdept.' - '.$usrsec.' -SEM- '.$usrsem.' </span>).
                                                <br> 
                                                </p>
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
                            // $json = array();
                            // $json["response"] = array(  "status" => false);
                            // echo json_encode($json);
                            $counter = true;
                        }
                        else{
                            // $json = array();
                            // $json["response"] = array(  "status" => true);
                            // echo json_encode($json);
                            $counter = false;
                        }
                    } catch (Exception $ex) {
                        $msg = $ex->getMessage();
                        $msgType = "warning";
                    } 
                } else {
                    // $json = array();
                    // $json["response"] = array(  
                    //     "status" => false,
                    //     "username" => $username,
                    //     "error" => "maximum booking limit reached",
                    //     "msg" => "unable to rollback to previous booking"
                    // );
                    // echo json_encode($json);
                    $counter = false;
                }
            } else {
                $counter = true;
            }
        }
    
        if( $counter == true) {
            $json = array();
            $json["response"] = array(  
                "status" => true,
                "msg" => "event cancelled and booking is rollbacked"
            );
            echo json_encode($json);
        } else {
            $json = array();
            $json["response"] = array(  
                "status" => false,
                "msg" => "Something went wrong"
            );
            echo json_encode($json);
    
        }

    } else {
        $sql1 = "delete from tbl_events where event_id = ".$eventid;
        mysqli_query($DB,$sql1);

        $json = array();
        $json["response"] = array(  
            "status" => true,
            "msg" => "event cancelled and booking is rollbacked"
        );
        echo json_encode($json);
    }


   
}
?>