<html>

<head>
    <script type="text/javascript" src="swal/jquery.min.js"></script>
    <script type="text/javascript" src="swal/bootstrap.min.js"></script>
    <script type="text/javascript" src="swal/sweetalert2@11.js"></script>
</head>

<body>

<?php
session_start();
$id=$_GET['id'];
require("../../connect.php");
if(isset($_POST["submit"])){

    $carname=$_POST['carname'];
    $category=$_POST['carcategory'];
    $color=$_POST['carcolor'];
    $capacity=$_POST['carcapacity'];
    $rate=$_POST['carrate'];

    $email=$_POST['useremail'];
    $days=$_POST['noofdays'];
    $bdate=date("Y-m-d"); 
    $pdate=$_POST['pickupdate'];
    $ddate=$_POST['dropdate'];
    $total=$rate*$days;
    

    
    $sql="INSERT INTO booking(carname,category,color,capacity,rate,car_id,email,days,bdate,pick,dropd,total,status,payment) 
    values ('$carname','$category','$color','$capacity','$rate','$id','$email','$days','$bdate','$pdate','$ddate','$total','0','0')";
    insert_data($sql);
    ?>
    <script>
              Swal.fire({
                icon: 'success',
                text: 'Proceeding To Payment',
                didClose: () => {
                  window.location.replace('../booking.php');
                }
              });
            </script>
             <?php
    }
    
   ?>
    </body>
    </html>