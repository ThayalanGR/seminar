<?php 

include("../config/dbconnection.php");
require_once "../library/phpmailer/class.phpmailer.php";


if(isset($_GET['token']) && isset($_GET['book_id']) && isset($_GET['request_msg']) && isset($_GET['sub_code'])) {

    $token = $_GET['token'];
    $book_id = $_GET['book_id'];
    $request_msg = $_GET['request_msg'];
    $sub = $_GET['sub_code'];

    $sourceName = "";
    $destinationName = "";

    $sql1 = "select name,role_id from tbl_staff where user_id = ".$token;
    $result1 = mysqli_query($DB, $sql1);
    $row1 = mysqli_fetch_array($result1);
    $sendername = $row1['name'];
    $role = $row1['role_id'];

    $sql2 = "select t1.book_id, t1.dept_id, t2.dept_name, t1.group_name, t1.date, t1.day_order, t1.period, t1.user_name, t1.sub_code, t1.dept, t1.sec, t1.sem, t1.description, t1.active from tbl_booking t1 inner join tbl_dept t2 on t1.dept_id = t2.dept_id where t1.book_id=".$book_id;
    $result2 = mysqli_query($DB,$sql2);
    $row2 = mysqli_fetch_array($result2); 

    $book_id = $row2['book_id'];
    $dept_id = $row2['dept_id'];
    $dept_name = $row2['dept_name'];
    $group_name = $row2['group_name'];
    $date = $row2['date'];
    $day_order = $row2['day_order'];
    $period = $row2['period'];
    $recievername = $row2['user_name'];
    $sub_code = $row2['sub_code'];
    $dept = $row2['dept'];
    $sec = $row2['sec'];
    $sem = $row2['sem'];
    $description = $row2['description'];
    $active = $row2['active'];

    $sql1 = "select name from tbl_staff where user_name = '".$recievername."'";
    $result1 = mysqli_query($DB, $sql1);
    $row1 = mysqli_fetch_array($result1);
    $recievername = $row1['name'];

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
                                    <p><span class="font-weight-bold">Hello  <b>'.$recievername.'</b></span>,<br><br>
                                    <span class="font-weight-bold"><b>'.$sendername.'</b></span> Requested the period that you have booked (ie., <span class="text-warning"> '.$date.' Day Order - '.$day_order.'  '.$dept_name.' Seminar Hall for the Class '.$sub_code. ' - '.$dept.'-'.$sec.'-SEM-'.$sem.' </span>)
                                    <br> 
                                    <hr>
                                </div>
                            </div>
                            <br> <br>
                            <div class="row pb-4">
                                <div class="col text-center">
                                    <a href="http://localhost/seminar/restapi/pushmailapi/allowrequest.php?bookid='.$book_id.'&deptid='.$dept_id.'&group='.$group_name.'&date='.$date.'&dayorder='.$day_order.'&period='.$period.'&username='.$sendername.'&subcode='.$sub.'&description='.$request_msg.'&userid='.$token.'&roleid='.$role.'" class="btn button text-p btn-success rounded pl-5 pr-5  text-white shadow">Allow</a>&nbsp;
                                    <a href="http://localhost/seminar/restapi/pushmailapi/denyrequest.php?sender='.$sendername.'&reciever='.$recievername.'&date='.$date.'&dayorder='.$day_order.'&dept='.$dept_name.'&sem='.$sem.'&sec='.$sec.'" class="btn button text-d btn-danger text-white rounded shadow pl-5 pr-5">Deny</a>
                                </div>
                            </div>
                            <br>
                            <br>
                            <hr>
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
            $json["response"] = array("status" => false);
            echo json_encode($json);
        }
        else{
            $json = array();
            $json["response"] = array("status" => true);
            echo json_encode($json);
        }
    } catch (Exception $ex) {

        $msg = $ex->getMessage();
        $msgType = "warning";
        
    }

}
?>

