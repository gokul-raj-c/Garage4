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
$email_id=$_SESSION['email_id'];
$currentpass=$_POST['cpass'];
$newpass=$_POST['npass'];
$renewpass=$_POST['cnpass'];

$sql="SELECT * from login where email_id='$email_id' ";
$data=select_data($sql);
$row = mysqli_fetch_assoc($data);

if ($row['password'] == $currentpass) 
{
   if($newpass==$renewpass)
   {
    $sql2="UPDATE login SET password='$newpass' where email_id='$email_id' ";
    update_data($sql2);
    ?>
    <script>
          Swal.fire({
            icon: 'success',
            text: 'User Password updated',
            didClose: () => {
              window.location.replace('../user/profile.php');
            }
          });
          </script>
          <?php
   }
   else if($newpass!=$renewpass)
   {
    ?>
          <script>
            Swal.fire({
              icon: 'error',
              text: 'Password updation failed !',
              didClose: () => {
                window.location.replace('../user/profile.php');
              }
            });
          </script>
        <?php
   }
}
else{
    ?>
          <script>
            Swal.fire({
              icon: 'error',
              text: 'Password updation failed !',
              didClose: () => {
                window.location.replace('../user/profile.php');
              }
            });
          </script>
        <?php
}
?>
</body>
</html>