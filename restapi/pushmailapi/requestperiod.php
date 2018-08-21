<?php 

include("../config/dbconnection.php");
require_once "../library/phpmailer/class.phpmailer.php";


if(isset($_GET['token']) && isset($_GET['book_id']) && isset($_GET['request_msg']) && isset($_GET['sub_code'])) {

    $token = $_GET['token'];
    $book_id = $_GET['book_id'];
    $request_msg = $_GET['request_msg'];
    $sub_code = $_GET['sub_code'];

    $sourceName = "";
    $destinationName = "";

    $sql1 = "select name from tbl_staff where user_id = ".$token;
    $result1 = mysqli_query($DB, $sql1);
    $row1 = mysqli_fetch_array($result1);
    $sendername = $row1['name'];

    $sql2 = "select t1.book_id, t1.dept_id, t2.dept_name, t1.group_name, t1.date, t1.day_order, t1.period, t1.user_name, t1.sub_code, t1.dept, t1.sec, t1.sem, t1.description, t1.active from tbl_booking t1 inner join tbl_dept t2 on t1.dept_id = t2.dept_id where t1.book_id=".$periodid;
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
    $description = $row['description'];
    $active = $row['active'];

    $message = '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title>Document</title>
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
            </head>
            <body class="bg-light" style="max-width: 100vw; overflow:hidden;">
                <div class="conatiner">
                    <div class="row  pt-5" >
                        <div class="col-md-8 shadow rounded offset-md-2 col-sm-10 offset-sm-1 bg-white pt-4" >
                            <div class="row">
                                <div class="col text-center">
                                    <h3 class="text-warning">Saranathan College of Engineering</h3>
                                    <h5 class="text-primary">Seminar Hall Booking</h5>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col m-2 p-4">
                                    <p><span class="font-weight-bold">Hello  '.echo $recievername;.'</span>,<br><br>
                                    <span class="font-weight-bold">'.echo $sendername;.'</span> Requested the period that you have booked (ie., <span class="text-warning"> '.echo $date;.' Day Order - '.echo $day_order;.'  '.echo $dept_name;.' Seminar Hall for the Class '.echo $sub_code;. ' - '.echo $dept;.'-'.echo $sec;.'-SEM-'.echo $sem;.' </span>)
                                    <br> 
                                    <hr>
                                    <span class="text-primary"> Request message from <b>'.echo $sendername;.'</b></span><br>&nbsp; &nbsp;
                                    '.echo $request_msg;.'
                                    </p>
                                    <hr>
                                </div>
                            </div>
                            <div class="row pb-4">
                                <div class="col text-center">
                                    <a href="http://allowrequest.php" class="btn btn-success rounded pl-5 pr-5  text-white shadow">Allow</a>&nbsp;
                                    <a href="http://denyrequest.php" class="btn btn-danger text-white rounded shadow pl-5 pr-5">Deny</a>
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
    $mail->SetFrom('dotcodecommunity@gmail.com', 'dotCC');
    $mail->AddAddress($email);
    $mail->Subject = trim("Seminar Hall Booking Portal - restApi");
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

}

?>