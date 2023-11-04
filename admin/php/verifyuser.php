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
$sql="select * from registration where email_id='$email'" ;

   $res=select_data($sql);
   $arr=mysqli_fetch_assoc($res);
   $user=$arr['first_name'];
/*$date = date("Y-m-d");*/
$sql = "UPDATE login SET user_status='$s' where email_id='$email'";
/*$sql2 = "UPDATE registration SET date_of_join='$date' where email_id='$email'";*/

update_data($sql);


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
        $mail->Subject = "Notice of Account Approval";
        $message = file_get_contents('../../mail-templates/welcome.html'); // Load your HTML content

#
     // Replace placeholders with actual dynamic data
   
    #$currentDate = date('Y-m-d');
    $message = str_replace('{{name}}', $user, $message);
   
   

    $mail->Body = $message;
// #die();
//     $mail->Body = $message;
    $mail->AltBody = 'If you cannot view this email, please contact support.';

    // Send the email
    $mail->send();
    
      ?>
    <script>
    Swal.fire({
      icon: 'success',
      text: 'User account approved !!!',
      didClose: () => {
         window.location.replace('../activeuser.php');
      }
    });
     </script>

    <?php
} 
 else if($s == -1)

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
        $mail->Subject = "Notice of Account Suspension";
        $message = file_get_contents('../../mail-templates/suspended.html'); // Load your HTML content

#
     // Replace placeholders with actual dynamic data
   
    #$currentDate = date('Y-m-d');
    $message = str_replace('{{name}}', $user, $message);
    

    $mail->Body = $message;
// #die();
//     $mail->Body = $message;
    $mail->AltBody = 'If you cannot view this email, please contact support.';

    // Send the email
    $mail->send();
  
  ?>
  <script>
    Swal.fire({
      icon: 'error',
      text: 'User account suspended !!!',
      didClose: () => {
        window.location.replace('../suspendeduser.php');
      }
    });
  </script>
  <?php
 }

?>
</body>
</html>

