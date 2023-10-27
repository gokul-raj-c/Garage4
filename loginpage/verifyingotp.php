<!DOCTYPE html>
<html>
<head>
  <script type="text/javascript" src="swal/jquery.min.js"></script>
  <script type="text/javascript" src="swal/bootstrap.min.js"></script>
  <script type="text/javascript" src="swal/sweetalert2@11.js"></script>
</head>

<body>
<?php
session_start();
require '../connect.php';
$email = $_SESSION['otpmail'];
$OTP = $_POST['OTP'];
$sql="SELECT otp
FROM otp
WHERE email = '$email' 
ORDER BY sendtime DESC
LIMIT 1 ";

$data = select_data($sql);
if ($data && $data->num_rows > 0) {
    $row = $data->fetch_assoc();
    $storedOTP = $row['otp'];

    if ($OTP == $storedOTP) {
        echo "<script>alert('OTP VERIFIED');</script>";
        echo "<script>window.location.href='newpassword.php';</script>";
    
    
   
    
} else {
  
?>
    <script>
    Swal.fire({
        icon: 'error',
        title: 'Invalid OTP',
    }).then((result) => {
        window.location.replace('verifyotp.php');
    });
   </script>
<?php
}
}
?>
</body>
</html>
