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
$name=$_POST['name'];
$number=$_POST['number'];
$email=$_POST['email'];
$messsage=$_POST['message'];
$date = date("Y-m-d"); 
$sql="INSERT INTO website_review(name,phone_no,email_id,message,date,status)values('$name','$number','$email','$message','$date','0')";
insert_data($sql);
?>
<script>
          Swal.fire({
            icon: 'success',
            text: 'Review Submitted !!!',
            didClose: () => {
              window.location.replace('../index.html');
            }
          });
        </script>
</body>
</html>