<html>

<head>
    <script type="text/javascript" src="swal/jquery.min.js"></script>
    <script type="text/javascript" src="swal/bootstrap.min.js"></script>
    <script type="text/javascript" src="swal/sweetalert2@11.js"></script>
</head>

<body>

<?php
session_start();
require("../connect.php");
if(isset($_POST["submit"])){

    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $contact=$_POST['contact'];
    $email=$_SESSION['email_id'];
    $dateofbirth=$_POST['dateofbirth'];
    $hname=$_POST['hname'];
    $sname=$_POST['sname'];
    $district=$_POST['district'];
    $pincode=$_POST['pincode'];
    $state=$_POST['state'];
    

    
    $sql="UPDATE registration SET `first_name`='$fname',`last_name`='$lname',`contact`='$contact',`date_of_birth`='$dateofbirth',`house_name`='$hname',`street_name`='$sname',`district`='$district',`pincode`='$pincode',`state`='$state' WHERE `email_id`='$email';";
if(update_data($sql)) { 
        ?>
        <script>
            Swal.fire({
                icon:'success',
                text: 'Updated Successfully',
                didClose: () => {
                    window.location.replace('../user/profile.php');
                }
            });
        </script>
    <?php
    } else { ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'unsuccessfully',
                didClose: () => {
                    window.location.replace('../user/profile.php');
                }
            });
        </script>



    <?php
    }
    }
   ?>
</body>
</html>