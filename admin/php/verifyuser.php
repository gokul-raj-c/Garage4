<!DOCTYPE html>
<html>
<head>
  <script type="text/javascript" src="swal/jquery.min.js"></script>
  <script type="text/javascript" src="swal/bootstrap.min.js"></script>
  <script type="text/javascript" src="swal/sweetalert2@11.js"></script>
</head>
<body>
<?php

//use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer; 

require '../../phpmailer/src/Exception.php';
require '../../phpmailer/src/PHPMailer.php';
require '../../phpmailer/src/SMTP.php';


require '../../connect.php';
session_start();
/*$semail=$_SESSION['email'];*/
$email = $_GET['email'];
$s = $_GET['s'];
$date = date("Y-m-d");
$sql = "UPDATE login SET user_status='$s' where email_id='$email'";
$sql2 = "UPDATE registration SET date_of_join='$date' where email_id='$email'";

update_data($sql);
update_data($sql2);

if ($s == 1) {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'teamgarage4web@gmail.com';
    $mail->Password = 'tptnqdqdzmojldoe';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom($email);

    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = "Your Joining Request Has Been Approved";
    $mail->Body = "We are happy to inform you that your joining request has been approved.";

    $mail->send();
      ?>
    <script>
    Swal.fire({
      icon: 'success',
      text: 'User request has been approved !!!',
      didClose: () => {
         window.location.replace('../activeuser.php');
      }
    });
     </script>

    <?php
} 
 else if($s == -2)
 {
  $mail = new PHPMailer(true);
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'teamgarage4web@gmail.com';
  $mail->Password = 'tptnqdqdzmojldoe';
  $mail->SMTPSecure = 'ssl';
  $mail->Port = 465;
  $mail->setFrom($email);

  $mail->addAddress($email);
  $mail->isHTML(true);
  $mail->Subject = "Rejection Notification";
  $mail->Body = "We regret to inform you that your joining request has been rejected.
  We appreciate your interest, while we are unable to accommodate your request at this time,
   we encourage you to consider reapplying in the future .
   
   Thank you for your understanding.";

  $mail->send();
  ?>
  <script>
    Swal.fire({
      icon: 'error',
      text: 'User Request has been rejected !!!',
      didClose: () => {
        window.location.replace('../rejecteduser.php');
      }
    });
  </script>
  <?php
 }

?>
</body>
</html>

