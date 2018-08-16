<?php 

include("../config/dbconnection.php");
require_once "../library/phpmailer/class.phpmailer.php";


if(isset($_GET['token']) && isset($_GET['book_id']) && isset($_GET['request_msg']) && isset($_GET['sub_code'])) {

    $token = $_GET['token'];
    $book_id = $_GET['book_id'];
    $request_msg = $_GET['request_msg'];

    $sourceName = "";
    $destinationName = "";

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
                                    <h5 class="text-primary">Seminar Hall Booking - RestApi</h5>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col m-2 p-4">
                                    <p><span class="font-weight-bold">Hello mohankumar-cse</span>,<br><br>
                                    <span class="font-weight-bold">kavitha-cse </span> Requested the period that you have booked (ie., <span class="text-warning"> 01-08-2018 Day Order - 1  CSE Seminar Hall for the Class CS6302-CSE-A-SEM-6 </span>)
                                    <br> 
                                    <hr>
                                    <span class="text-primary"> Request message from <b> kavitha-cse</b></span><br>&nbsp; &nbsp;
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores quae doloremque quam molestias adipisci dolore veritatis recusandae deleniti maxime sunt!
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