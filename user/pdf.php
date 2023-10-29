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
        $mail->Body = '
        <!DOCTYPE html>
<html lang="en">
<body>
<div class="container">
   <div class="col-md-12">
      <div class="invoice">
        
         <!-- begin invoice-header -->
         <div class="invoice-header">
            <div class="invoice-from">
               <small>From</small>
               <address class="m-t-5 m-b-5">
                  <strong class="text-inverse">Team GARAGE4</strong><br>
                  Opp Old Petrol Pump<br>
                  Piravom,Ernakulam<br>
                  Phone: 9061393951<br>
                  Mail: teamgarage4web@gmail.com
               </address>
            </div>
            <div class="invoice-to">
               <small>To</small>
               <address class="m-t-5 m-b-5">
                  <strong class="text-inverse">'.$fname.' '.$lname.'<br>
                  '.$hname.',<br>
                  '.$sname.',<br>
                  '.$district.',<br>
                  Phone:'.$contact.',<br><br>
                  Mail:'.$email.',<br>?>
                  
               </address>
            </div>
           
         </div>
         <!-- end invoice-header -->
         <div>
         BOOKING ID: '. $id .' <br>
         CAR NAME: '. $cname .' <br>
         RATE: '. $rate .' <br>
         NO OF DAYS: '. $days .' <br>
         PICK UP DATE: '. $pick .' <br>
         DROP DATE: '. $drop .' <br>
         BOOKING DATE: '. $bdate .' <br>
         TOTAL AMOUNT: '. $total .' <br>
           
            </div>  
         
         
      </div>
   </div>
</div>


</body>

</html>

        ';
    
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