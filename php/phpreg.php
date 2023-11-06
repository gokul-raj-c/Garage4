<html>

<head>
    <script type="text/javascript" src="swal/jquery.min.js"></script>
    <script type="text/javascript" src="swal/bootstrap.min.js"></script>
    <script type="text/javascript" src="swal/sweetalert2@11.js"></script>
</head>


<body>


    <?php
    include '../connect.php';
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
    $cpassword=$_POST['cpassword'];
    $date = date("Y-m-d"); 

    $sql1 = "SELECT *from registration where email_id='$email'";
    $result = $conn->query($sql1);
    if ($result && mysqli_num_rows($result) > 0) 
    {
        //Emailid exits in the table
        
        ?>
        <script>
            Swal.fire({
                icon: 'warning',
                text: 'Email Already Exixts',
                didClose: () => {
                    window.location.replace('../register.php');
                }
            });
        </script>
        <?php
    }
    else 
    {
        if ($password == $cpassword) 
        {
            $sql="INSERT INTO registration (first_name,last_name,contact,email_id,date_of_birth,house_name,street_name,district,pincode,state,date_of_join)
            VALUES ('$fname','$lname','$contact','$email','$dateofbirth','$hname','$sname','$district','$pincode','$state','$date')";
            if (insert_data($sql)) 
            {
                //echo $sql;
                $sql2="INSERT INTO  login (email_id,password,user_type,user_status) VALUES ('$email','$password',1,1)";
                if (insert_data($sql2)) 
                {
                    ?>
                    <script>
                        Swal.fire({
                            icon: 'success',
                            text: 'Registration Successful',
                            didClose: () => {
                                window.location.replace('../login.html');
                            }
                        });
                    </script>
                    <?php
                }
            }
        } 
        else 
        {
            ?>
            <script>
                Swal.fire({
                    icon: 'warning',
                    text: 'Password Doesnt Match',
                    didClose: () => {
                        window.location.replace('../index.html');
                    }
                });
            </script>
            <?php
        }
    }
    mysqli_close($conn);
    ?>

</body>

</html>