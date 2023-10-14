<html>

<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php
    session_start();
    require('../../php/connect.php');
    if (isset($_GET['amt'])) {
        $email = $_SESSION['email_id'];
        $amt = $_GET['amt'];
        $date = date('Y-m-d H:i:s');


        $sql = "insert into payment (amount,paid_date) values ('$amt','$date')";
        insert($sql);

        $pay_id = mysqli_insert_id($conn);

        $sql = "select * from cart where user='$email'";
        $res = sel($sql);

        while ($row = mysqli_fetch_assoc($res)) {
            $product_id = $row['product_id'];
            $quantity = $row['quantity'];
            $sql2 = "insert into pro_order (email_id,product_id,order_date,quantity,payment_id) values ('$email','$product_id','$date','$quantity','$pay_id')";
            insert($sql2);

            $sql3 = "update product set stock = stock - '$quantity' where product_id='$product_id'";
            update($sql3);
        }


        $sql = "delete from cart where user='$email'";
        delete($sql);



    ?>
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Order Placed Successfully!',
    }).then((result) => {
        window.location.replace('../order.php');
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