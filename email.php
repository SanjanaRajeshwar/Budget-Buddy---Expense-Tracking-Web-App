<?php
include('homepage.html');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('phpmailer/Exception.php');
require('phpmailer/SMTP.php');
require('phpmailer/PHPMailer.php');

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'budgetbuddy.customercare@gmail.com';                     
    $mail->Password   = 'ynayimyzzpxfvctw';                             
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
    $mail->Port       = 465;                                   

    $mail->setFrom('budgetbuddy.customercare@gmail.com', 'BB Customer Care');
    $mail->addAddress('budgetbuddy.iwp@gmail.com', 'Budget Buddy');     

    $usere = $_POST['usere'];
    $usern = $_POST['usern'];
    $msg = $_POST['message'];
    $mail->isHTML(true);                                  
    $mail->Subject = 'User Feedback/ Complaint';
    $mail->Body    = "You have received a feedback/ complaint message from <b> user with name ".$usern." and email ".$usere.". </b>The message is as follows - <br>".$msg;
    //$mail->AltBody = $msg;

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

