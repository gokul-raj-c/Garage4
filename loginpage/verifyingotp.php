<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        ?>
    <script>
    Swal.fire({
        icon: 'success',
        title: 'OTP verified!!!',
    }).then((result) => {
        window.location.replace('newpassword.php');
    });
   </script>
<?php
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
