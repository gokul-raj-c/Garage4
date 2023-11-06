<html>

<head>
    <script type="text/javascript" src="swal/jquery.min.js"></script>
    <script type="text/javascript" src="swal/bootstrap.min.js"></script>
    <script type="text/javascript" src="swal/sweetalert2@11.js"></script>
</head>

<body>

<?php
session_start();
require("../../connect.php");
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
    
    

    
    $selfpic = $_POST['selfpic'];

    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "../uploads/profile/" . $filename;
    $delfolder = "../uploads/profile/".$selfpic;

    if($filename !=  null)
    {
        $newpic = $filename;
    }
    else 
    {
        $newpic = $selfpic;
    }


    $sql="UPDATE registration SET `first_name`='$fname',`last_name`='$lname',`contact`='$contact',`date_of_birth`='$dateofbirth',`house_name`='$hname',`street_name`='$sname',`district`='$district',`pincode`='$pincode',`state`='$state',`image`='$newpic' WHERE `email_id`='$email';";
    if(update_data($sql)) { 
 
    if($filename !=  null)
    {
        if($selfpic != "default.jpg"){
            unlink($delfolder);
        }
        
        move_uploaded_file($tempname, $folder);
    } 

        ?>
        <script>
            Swal.fire({
                icon:'success',
                text: 'Updated Successfully',
                didClose: () => {
                    window.location.replace('../profile.php');
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
                    window.location.replace('../profile.php');
                }
            });
        </script>



    <?php
    }
    }
   ?>
</body>
</html>