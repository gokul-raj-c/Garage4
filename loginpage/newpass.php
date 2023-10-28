<!DOCTYPE html>
<html>
<head>
  <script type="text/javascript" src="swal/jquery.min.js"></script>
  <script type="text/javascript" src="swal/bootstrap.min.js"></script>
  <script type="text/javascript" src="swal/sweetalert2@11.js"></script>
</head>

<body>
<?php
require '../connect.php';
session_start();
$email=$_SESSION['otpmail'];
$newpass=$_POST['newpass'];
$confirmpass=$_POST['confirmpass'];
if($newpass==$confirmpass)
{
    $sql="UPDATE login SET password='$newpass' where email_id='$email' ";
    update_data($sql);
    ?>
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Password Reset!!!',
    }).then((result) => {
        window.location.replace('../login.html');
    });
   </script>
<?php
}
else if($newpass!=$confirmpass)
{
    ?>
    <script>
    Swal.fire({
        icon: 'error',
        title: 'Password and Confirm Password do not match.!!!',
    }).then((result) => {
        window.location.replace('newpassword.php');
    });
   </script>
<?php
}
?>
</body>
</html>