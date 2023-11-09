<html>
<head>
  <script type="text/javascript" src="swal/jquery.min.js"></script>
  <script type="text/javascript" src="swal/bootstrap.min.js"></script>
  <script type="text/javascript" src="swal/sweetalert2@11.js"></script>
</head>

<body>
<?php
require '../../connect.php';
session_start();
$email=$_SESSION['email_id'];
$eventid=$_POST['eventid'];
$rate=$_POST['rate'];
$comment=$_POST['comment'];

  
  $sql1="INSERT INTO review(car_id,email,rating,review)VALUES('$eventid','$email','$rate','$comment')";
  insert_data($sql1);
  ?>
  <script>
        Swal.fire({
          icon: 'success',
          text: 'Rating Recorded !!!',
          didClose: () => {
            window.location.replace('../mybookings1.php');
          }
        });
      </script>
  
</body>
</html>


