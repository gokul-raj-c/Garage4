<html>

<head>
    <script type="text/javascript" src="swal/jquery.min.js"></script>
    <script type="text/javascript" src="swal/bootstrap.min.js"></script>
    <script type="text/javascript" src="swal/sweetalert2@11.js"></script>
</head>

<body>

<?php
require("../connect.php");
if(isset($_POST["submit"])){

    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $contact=$_POST['contact'];
    $email=$_POST['email'];
    $dateofbirth=$_POST['dateofbirth'];
    $hname=$_POST['housename'];
    $sname=$_POST['streetname'];
    $district=$_POST['district'];
    $pincode=$_POST['pincode'];
    $state=$_POST['state'];
    $password=$_POST['password'];
    
    $sql="INSERT INTO registration (first_name,last_name,contact,email_id,date_of_birth,house_name,street_name,district,pincode,state)
     VALUES ('$fname','$lname','$contact','$email','$dateofbirth','$hname','$sname','$district','$pincode','$state')";
    $sql2="INSERT INTO  login (email_id,password,user_type,user_status) VALUES ('$email','$password','1','0')";
if(insert_data($sql) && insert_data($sql2)) { 
        ?>
        <script>
            Swal.fire({
                icon:'success',
                text: 'Added Successfully',
                didClose: () => {
                    window.location.replace('../login.html');
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
                    window.location.replace('../index.html');
                }
            });
        </script>



    <?php
    }
    }
   ?>
</body>
</html>