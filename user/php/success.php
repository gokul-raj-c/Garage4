<html>

<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php
    session_start();
    require('../../connect.php');
    if (isset($_GET['amt'])) {
        $email = $_SESSION['email_id'];
        $amt = $_GET['amt'];
        $bid = $_GET['id'];
        $date = date('Y-m-d H:i:s');


        $sql = "insert into payment (booking_id,amount,paid_date) values ('$bid','$amt','$date')";
        insert_data($sql);

        $pay_id = mysqli_insert_id($conn);

        $sql = "select * from booking where booking_id='$bid'";
        $res = select_data($sql);

        while ($row = mysqli_fetch_assoc($res)) {
            $product_id = $row['booking_id'];
            /*$quantity = $row['quantity'];*/
            /*$sql2 = "insert into pro_order (email_id,product_id,order_date,quantity,payment_id) values ('$email','$product_id','$date','$quantity','$pay_id')";
            insert($sql2);*/

            $sql3 = "UPDATE booking SET status=1 WHERE booking_id='$product_id'";
            update_data($sql3);
        }


       /* $sql = "delete from cart where user='$email'";
        delete($sql);*/



    ?>
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Booking Successfully!',
    }).then((result) => {
        window.location.replace('../viewcar.php');
    })
    </script>
    <?php
    } else {
    ?>
    <script>
    Swal.fire({
        icon: 'error',
        title: 'Error!',
    }).then((result) => {
        window.location.replace('../index.php');
    })
    </script>
    <?php

    }

    ?>
</body>

</html>