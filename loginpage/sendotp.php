<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer; 

require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';


require '../connect.php';
session_start();
$otp = rand(100000, 999999);
$email = $_POST['email'];
$_SESSION['otpmail']=$_POST['email'];
$expiry = date("Y-m-d H:i:s", strtotime("+15 minutes")); 
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'teamgarage4web@gmail.com';//sender email
    $mail->Password = 'tptnqdqdzmojldoe';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('teamgarage4web@gmail.com');

    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = "OTP verfication";
    $mail->Body = "Your OTP is :".$otp;

    $mail->send();
      ?>
    <script>
         alert('OTP has been sent to your email');
         window.location.href='verifyotp.php';
   
     </script>

    <?php
    
    $sql = "INSERT INTO otp (email, otp, expiry) VALUES ('$email', '$otp', '$expiry')";
    insert_data($sql);
 
?>