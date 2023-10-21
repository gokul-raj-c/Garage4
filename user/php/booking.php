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
    /*$days=$_POST['noofdays'];*/
    $bdate=date("Y-m-d"); 
    $pdate=($_POST['pickupdate']);
    $ddate=($_POST['dropdate']);
   

$firstDate = DateTime::createFromFormat('Y-m-d', $pdate);
$secondDate = DateTime::createFromFormat('Y-m-d', $ddate);

if ($firstDate && $secondDate) {
    $interval = $firstDate->diff($secondDate);
    $daysDifference = $interval->days;
    echo $daysDifference; // This will give you the difference in days
} else {
    echo "Invalid date format";
}
$daysDifference1=$daysDifference+1;
    $total=$rate*$daysDifference1;
    

    
    $sql="INSERT INTO booking(carname,category,color,capacity,rate,car_id,email,days,bdate,pick,dropd,total,status,payment) 
    values ('$carname','$category','$color','$capacity','$rate','$id','$email','$daysDifference1','$bdate','$pdate','$ddate','$total','0','0')";
    insert_data($sql);
    $ld = mysqli_insert_id($conn);
    
    ?>
    <script>
              Swal.fire({
                icon: 'success',
                text: 'Proceeding To Payment',
                didClose: () => {
                  window.location.replace('../booking.php?id=<?php echo $ld ?>');
                }
              });
            </script>
             <?php
    }
    
   ?>
    </body>
    </html>