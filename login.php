<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php
    session_start();
    require("../php/connect.php");

    $email = $_POST["email"];
    $password = $_POST["password"];
    $sql = "select * from user_login where user_email='$email' and user_password='$password'";
    // echo $sql;
    // $sql2 = "insert into user_login (USER_EMAIL,USER_PASSWORD,user_type) VALUES ('$email','$password','$userType')";
    $result = num($sql);

    $data=sel($sql);
    $row=mysqli_fetch_assoc($data);
    if ($result > 0) {
        $_SESSION['email'] = $email;
        // user
        if ($row['user_type'] == 0) {
            ?>

            <script>
                // alert("Hello1");
                Swal.fire({
                    icon: 'success',
                    title: 'Welcome Back User!',
                }).then((result) => {
                    window.location.replace('../user/profile.php');
                });
            </script>
            <?php
        }
        // guide
        else if ($row['user_type'] == 1) {
            // echo "Hello";
            ?>

                <script>
                    // alert("hello");
                    Swal.fire({
                        icon: 'success',
                        title: 'Welcome Back admin!',
                    }).then((result) => {
                        window.location.replace('../admin/profile.php');
                    });
                </script>
            <?php

        }
    } else {
        ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Account doesn\'t exsist!',
            }).then((result) => {
                window.location.replace('../loginpage/index.html');
            });
        </script>
        <?php
    }


    ?>
</body>

</html>