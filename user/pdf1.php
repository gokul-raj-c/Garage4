<html>

<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>                 
    <?php
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer; 

require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';

    session_start();
    require('../connect.php');
    if (isset($_GET['id'])) {
      $email = $_SESSION['email_id'];
      $sql="select * from registration where email_id='$email'" ;
      $res=select_data($sql);
      $arr=mysqli_fetch_assoc($res);
   
   
   
   
   $id = $_GET['id'];
   $sql1="select * from booking where booking_id='$id'" ;
   $res1=select_data($sql1);
   $arr1=mysqli_fetch_assoc($res1);
   
   $fname=$arr['first_name'];
   $lname=$arr['last_name'];
   $hname=$arr['house_name'];
   $sname=$arr['street_name'];
   $district=$arr['district'];
   $contact=$arr['contact'];
   $cname=$arr1['carname'];
   $rate=$arr1['rate'];
   $bdate=$arr1['bdate'];
   $pick=$arr1['pick'];
   $drop=$arr1['dropd'];
   $days=$arr1['days'];
   $total=$arr1['total'];

        
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
        $mail->Subject = "Booking Receipt";
        
    
   

    // Include your generated HTML content from invoice.php
   

    $message = file_get_contents('invoice1.php'); // Load your HTML content

#
     // Replace placeholders with actual dynamic data
   
    #$currentDate = date('Y-m-d');
    $message = str_replace('[USERNAME]', $fname, $message);
    $message = str_replace('[ID]', $id, $message);
    $message = str_replace('[CARNAME]', $cname, $message);
    $message = str_replace('[BOOKINGDATE]', $bdate, $message);
    $message = str_replace('[PICKDATE]', $pick, $message);
    $message = str_replace('[DROPDATE]', $drop, $message);
    $message = str_replace('[NOOFDAYS]', $days, $message);
    $message = str_replace('[TOTALAMOUNT]', $total, $message);

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
        title: 'Send Successfully!',
    }).then((result) => {
        window.location.replace('./mybookings.php');
    })
    </script>
    <?php
    } else {
    ?>
    <script>
    Swal.fire({
        icon: 'error',
        title: 'Error!',
    }).then((result) => {
        window.location.replace('../index.php');
    })
    </script>
    <?php

    }

    ?>
</body>

</html>