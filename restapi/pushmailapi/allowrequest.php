<?php

// required headers
header("Access-Control-Allow-Origin: *");
// header("Content-Type: application/json; charset=UTF-8");

require_once('../config/dbconnection.php');
require_once "../library/phpmailer/class.phpmailer.php";

if(isset($_GET['bookid']) && isset($_GET['deptid']) && isset($_GET['group']) && isset($_GET['date']) && isset($_GET['dayorder']) && isset($_GET['period']) && isset($_GET['username']) && isset($_GET['subcode']) && isset($_GET['description']) && isset($_GET['userid']) && isset($_GET['roleid'])) {
    
    $group = trim($_GET['group']);
    $subcode = trim($_GET['subcode']);
    $userid = trim($_GET['userid']);
    $username = trim($_GET['username']);
    $date = trim($_GET['date']);
    $period = trim($_GET['period']);

    $details = array(); 
    $details = explode("-",$subcode);
    $subject = $details[0];
    $dept = $details[1];
    $sec = $details[2];
    $sem = $details[4];

    $sql7 = "select user_name from tbl_staff where user_id = ".$userid;
    $result7 = mysqli_query($DB,$sql7);
    $row7 = mysqli_fetch_array($result7);
    $username = $row7['user_name'];

    $sql = "select book_id from tbl_booking where user_name = '".$username."' and group_name = '".$group."' and date = '".$date."' and period = '".$period."' and sub_code = '".$subject."'";

    $result = mysqli_query($DB,$sql);
    $count = mysqli_num_rows($result);

    if($count == 0) {

        $sql3 = "select t1.current_usage, t2.max_book from tbl_limit t1 inner join tbl_role t2 on t1.role_id = t2.role_id where user_id = ".$userid." and sub_code = '".$subject."' and group_name = '".$group."'";
        $result3 = mysqli_query($DB,$sql3);
        $row3 = mysqli_fetch_array($result3);
        $currentusage = $row3['current_usage'];
        $maxbook = $row3['max_book'];

        if($currentusage < $maxbook) {

        $bookid = trim($_GET['bookid']);
        $sql1 = "select  dept_id, group_name, date, day_order, period, sub_code, user_name from tbl_booking where book_id = " .$bookid; 
        $result = mysqli_query($DB,$sql1);
        $row = mysqli_fetch_array($result); 

        $deptid = $row['dept_id']; 
        $groupname = $row['group_name']; 
        $date = $row['date']; 
        $dayorder = $row['day_order']; 
        $period = $row['period'];
        $subcode = $row['sub_code'];
        $recievername = $row['user_name'];

        $sql7 = "select user_id from tbl_staff where user_name = '".$recievername."'";
        $result7 = mysqli_query($DB,$sql7);
        $row7 = mysqli_fetch_array($result7);
        $userid = $row7['user_id'];

        $sql2 = "delete from tbl_booking where book_id = ".$bookid;
        mysqli_query($DB,$sql2);

        $sql3 = "update tbl_timeline set ".$period." = 0 where dept_id = ".$deptid." and group_name = '".$groupname."' and date = '".$date."' and day_order = ".$dayorder;
        mysqli_query($DB,$sql3);

        $sql4 = "select t1.current_usage, t2.max_book from tbl_limit t1 inner join tbl_role t2 on t1.role_id = t2.role_id where user_id = ".$userid." and sub_code = '".$subcode."' and group_name = '".$groupname."'";
        $result4 = mysqli_query($DB,$sql4);
        $row4 = mysqli_fetch_array($result4);
        $currentusage = $row4['current_usage'];
        $maxbook = $row4['max_book'];
        // echo $currentusage;
        // $today = $todaysusage - 1;
        // $sql5 = "update tbl_todaylimit set todaysusage = ".$today." where user_id = ".$userid." and sub_code = '".$subcode."'";
        // mysqli_query($DB,$sql5);

        $current = $currentusage - 1;
        // echo $current;
        $sql6 = "update tbl_limit set current_usage = ".$current." where user_id = ".$userid." and sub_code = '".$subcode."' and group_name = '".$groupname."'";
        mysqli_query($DB,$sql6);


        $deptid = trim($_GET['deptid']);
        $group = trim($_GET['group']);
        $date = trim($_GET['date']);
        $dayorder = trim($_GET['dayorder']);
        $period = trim($_GET['period']);
        $sendername = trim($_GET['username']);
        $subcode = trim($_GET['subcode']);
        $description = trim($_GET['description']);
        $userid = trim($_GET['userid']);
        $roleid = trim($_GET['roleid']);
        $active = 0;
        $event = 0;

        $details = array(); 
        $details = explode("-",$subcode);
        $subject = $details[0];
        $dept = $details[1];
        $sec = $details[2];
        $sem = $details[4];

        $sql7 = "select user_name from tbl_staff where user_id = ".$userid;
        $result7 = mysqli_query($DB,$sql7);
        $row7 = mysqli_fetch_array($result7);
        $username = $row7['user_name'];

        $sql3 = "select t1.current_usage, t2.max_book from tbl_limit t1 inner join tbl_role t2 on t1.role_id = t2.role_id where user_id = ".$userid." and sub_code = '".$subject."' and group_name = '".$group."'";
        $result3 = mysqli_query($DB,$sql3);
        $row3 = mysqli_fetch_array($result3);
        $currentusage = $row3['current_usage'];
        $maxbook = $row3['max_book'];

        $sql = "insert into tbl_booking (dept_id, group_name, date, day_order, period, user_name, sub_code, dept, sec, sem, description, active, event) values (".$deptid.", '".$group."', '".$date."', ".$dayorder.", '". $period."', '".$username."', '".$subject."', '".$dept."', '".$sec."',".$sem.",'".$description."', ".$active.", ".$event.")";
        mysqli_query($DB,$sql);

        $sql1 = "select book_id from tbl_booking where dept_id = ".$deptid." and group_name = '".$group."' and date = '".$date."' and day_order = ".$dayorder." and period = '".$period."'";
        $result1 = mysqli_query($DB,$sql1);
        $row1 = mysqli_fetch_array($result1);
        $bookid = $row1['book_id'];
        // echo $bookid;

        $sql2 = "update tbl_timeline set ".$period." = ".$bookid." where dept_id = ".$deptid." and group_name = '".$group."' and date = '".$date."' and day_order = ".$dayorder;
        mysqli_query($DB,$sql2);

        $current = $currentusage + 1;
        $sql6 = "update tbl_limit set current_usage = ".$current." where user_id = ".$userid." and sub_code = '".$subject."' and group_name = '".$group."'";
        mysqli_query($DB,$sql6);

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
                                    <p><span class="font-weight-bold">Hello  '.$sendername.'</span>,<br><br>
                                    <span class="font-weight-bold">'.$recievername.'</span> Accepted the request you have placed and the period is booked for your lecture (ie., <span class="text-warning"> '.$date.' Day Order - '.$dayorder.'  '.$dept.' Seminar Hall for the Class '.$subject.' - '.$dept.' - '.$sec.' -SEM- '.$sem.' </span>)
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
        $email = "rajavignesh36@gmail.com";
        $mail->AddAddress($email);
        $mail->Subject = trim("Seminar Hall Booking Portal");
        $mail->MsgHTML($message);
        try {
            $mail->send();

            if(!$mail){
                $json = array();
                $json["response"] = array("status" => false);
                // echo json_encode($json);

                echo '<html>
                <head>
                <style>
                    .banner-color {
                    background-color: #eb681f;
                    }
                    .title-color {
                    color: #0066cc;
                    }
                    .button-color {
                    background-color: #0066cc;
                    }
                    @media screen and (min-width: 500px) {
                    .banner-color {
                    background-color: #0066cc;
                    }
                    .title-color {
                    color: #eb681f;
                    }
                    .button-color {
                    background-color: #eb681f;
                    }
                    }
                </style>
                </head>
                <body>
                <div style="background-color:#ececec;padding:0;margin:0 auto;font-weight:200;width:100%!important">
                    <table align="center" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed;font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
                        <tbody>
                            <tr>
                            <td align="center">
                                <center style="width:100%">
                                    <table bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0" style="margin:0 auto;max-width:512px;font-weight:200;width:inherit;font-family:Helvetica,Arial,sans-serif" width="512">
                                        <tbody>
            
                                        <tr>
                                            <td align="left">
                                                <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
                                                    <tbody>
                                                    <tr>
                                                        <td width="100%">
                                                            <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
                                                                <tbody>
                                                                <tr>
                                                                    <td align="center" bgcolor="#8BC34A" style="padding:20px 48px;color:#ffffff" class="banner-color">
                                                                        <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
                                                                            <tbody>
                                                                            <tr>
                                                                                <td align="center" width="100%">
                                                                                    <h1 style="padding:0;margin:0;color:#ffffff;font-weight:500;font-size:20px;line-height:24px">Saranathan College of Engineering</h1>
                                                                                    <br>
                                                                                    <h3 style="padding:0;margin:0;color:#ffffff;font-weight:500;font-size:18px;line-height:24px"> Semianr Hall Booking </h3>
                                                                                </td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="center" style="padding:20px 0 10px 0">
                                                                        <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
                                                                            <tbody>
                                                                            <tr>
                                                                                <td align="center" width="100%" style="padding: 0 15px;text-align: justify;color: rgb(76, 76, 76);font-size: 12px;line-height: 18px;">
                                                                                    <h3 style="font-weight: 600; padding: 0px; margin: 0px; font-size: 16px; line-height: 24px; text-align: center;" class="title-color">User that you have allowed reached his/her maximum booking limit!</h3>
                                                                                </td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                </tr>
                                                                <tr>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left">
                                                <table bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0" style="padding:0 24px;color:#999999;font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
                                                    <tbody>
                                                    <tr>
                                                        <td align="center" width="100%">
                                                            <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
                                                                <tbody>
                                                                <tr>
                                                                    <td align="center" style="padding:0 0 8px 0" width="100%"></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </center>
                            </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                </body>
        </html>';
            }
            else{
                $json = array();
                $json["response"] = array("status" => true);
                // echo json_encode($json);
                echo '<html>
                <head>
                   <style>
                      .banner-color {
                      background-color: #eb681f;
                      }
                      .title-color {
                      color: #0066cc;
                      }
                      .button-color {
                      background-color: #0066cc;
                      }
                      @media screen and (min-width: 500px) {
                      .banner-color {
                      background-color: #0066cc;
                      }
                      .title-color {
                      color: #eb681f;
                      }
                      .button-color {
                      background-color: #eb681f;
                      }
                      }
                   </style>
                </head>
                <body>
                   <div style="background-color:#ececec;padding:0;margin:0 auto;font-weight:200;width:100%!important">
                      <table align="center" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed;font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
                         <tbody>
                            <tr>
                               <td align="center">
                                  <center style="width:100%">
                                     <table bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0" style="margin:0 auto;max-width:512px;font-weight:200;width:inherit;font-family:Helvetica,Arial,sans-serif" width="512">
                                        <tbody>
             
                                           <tr>
                                              <td align="left">
                                                 <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
                                                    <tbody>
                                                       <tr>
                                                          <td width="100%">
                                                             <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
                                                                <tbody>
                                                                   <tr>
                                                                      <td align="center" bgcolor="#8BC34A" style="padding:20px 48px;color:#ffffff" class="banner-color">
                                                                         <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
                                                                            <tbody>
                                                                               <tr>
                                                                               <td align="center" width="100%">
                                                                               <h1 style="padding:0;margin:0;color:#ffffff;font-weight:500;font-size:20px;line-height:24px">Saranathan College of Engineering</h1>
                                                                               <br>
                                                                               <h3 style="padding:0;margin:0;color:#ffffff;font-weight:500;font-size:18px;line-height:24px"> Semianr Hall Booking </h3>
                                                                           </td>
                                                                               </tr>
                                                                            </tbody>
                                                                         </table>
                                                                      </td>
                                                                   </tr>
                                                                   <tr>
                                                                      <td align="center" style="padding:20px 0 10px 0">
                                                                         <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
                                                                            <tbody>
                                                                               <tr>
                                                                                  <td align="center" width="100%" style="padding: 0 15px;text-align: justify;color: rgb(76, 76, 76);font-size: 12px;line-height: 18px;">
                                                                                     <h3 style="font-weight: 600; padding: 0px; margin: 0px; font-size: 16px; line-height: 24px; text-align: center;" class="title-color">Allow Request Granted.</h3>
                                                                                  </td>
                                                                               </tr>
                                                                            </tbody>
                                                                         </table>
                                                                      </td>
                                                                   </tr>
                                                                   <tr>
                                                                   </tr>
                                                                   <tr>
                                                                   </tr>
                                                                </tbody>
                                                             </table>
                                                          </td>
                                                       </tr>
                                                    </tbody>
                                                 </table>
                                              </td>
                                           </tr>
                                           <tr>
                                              <td align="left">
                                                 <table bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0" style="padding:0 24px;color:#999999;font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
                                                    <tbody>
                                                       <tr>
                                                          <td align="center" width="100%">
                                                             <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
                                                                <tbody>
                                                                   <tr>
                                                                      <td align="center" style="padding:0 0 8px 0" width="100%"></td>
                                                                   </tr>
                                                                </tbody>
                                                             </table>
                                                          </td>
                                                       </tr>
                                                    </tbody>
                                                 </table>
                                              </td>
                                           </tr>
                                        </tbody>
                                     </table>
                                  </center>
                               </td>
                            </tr>
                         </tbody>
                      </table>
                   </div>
                </body>
             </html>';
            }
        } catch (Exception $ex) {

            $msg = $ex->getMessage();
            $msgType = "warning";
        }
 
        }
        else {
        $json = array();
        $json["response"] = array(  
            "status" => false,
            "error" => "maximum booking limit reached"
        );
        echo '<html>
                <head>
                <style>
                    .banner-color {
                    background-color: #eb681f;
                    }
                    .title-color {
                    color: #0066cc;
                    }
                    .button-color {
                    background-color: #0066cc;
                    }
                    @media screen and (min-width: 500px) {
                    .banner-color {
                    background-color: #0066cc;
                    }
                    .title-color {
                    color: #eb681f;
                    }
                    .button-color {
                    background-color: #eb681f;
                    }
                    }
                </style>
                </head>
                <body>
                <div style="background-color:#ececec;padding:0;margin:0 auto;font-weight:200;width:100%!important">
                    <table align="center" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed;font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
                        <tbody>
                            <tr>
                            <td align="center">
                                <center style="width:100%">
                                    <table bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0" style="margin:0 auto;max-width:512px;font-weight:200;width:inherit;font-family:Helvetica,Arial,sans-serif" width="512">
                                        <tbody>
            
                                        <tr>
                                            <td align="left">
                                                <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
                                                    <tbody>
                                                    <tr>
                                                        <td width="100%">
                                                            <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
                                                                <tbody>
                                                                <tr>
                                                                    <td align="center" bgcolor="#8BC34A" style="padding:20px 48px;color:#ffffff" class="banner-color">
                                                                        <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
                                                                            <tbody>
                                                                            <tr>
                                                                                <td align="center" width="100%">
                                                                                    <h1 style="padding:0;margin:0;color:#ffffff;font-weight:500;font-size:20px;line-height:24px">Saranathan College of Engineering</h1>
                                                                                    <br>
                                                                                    <h3 style="padding:0;margin:0;color:#ffffff;font-weight:500;font-size:18px;line-height:24px"> Semianr Hall Booking </h3>
                                                                                </td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="center" style="padding:20px 0 10px 0">
                                                                        <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
                                                                            <tbody>
                                                                            <tr>
                                                                                <td align="center" width="100%" style="padding: 0 15px;text-align: justify;color: rgb(76, 76, 76);font-size: 12px;line-height: 18px;">
                                                                                    <h3 style="font-weight: 600; padding: 0px; margin: 0px; font-size: 16px; line-height: 24px; text-align: center;" class="title-color">User that you have allowed reached his/her maximum booking limit!</h3>
                                                                                </td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                </tr>
                                                                <tr>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left">
                                                <table bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0" style="padding:0 24px;color:#999999;font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
                                                    <tbody>
                                                    <tr>
                                                        <td align="center" width="100%">
                                                            <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
                                                                <tbody>
                                                                <tr>
                                                                    <td align="center" style="padding:0 0 8px 0" width="100%"></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </center>
                            </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                </body>
        </html>';
        }
    }
}
?>




