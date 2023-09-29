<html>

<head>
  <script type="text/javascript" src="swal/jquery.min.js"></script>
  <script type="text/javascript" src="swal/bootstrap.min.js"></script>
  <script type="text/javascript" src="swal/sweetalert2@11.js"></script>
</head>

<body>
    <?php
    session_start();
    require '../../connect.php';
    if (isset($_POST['add'])) {
        $photo = $_FILES['photo']['name'];
        $carname = $_POST['carname'];
        $carcategory = $_POST['category'];
        /*$carmodel = $_POST['modelyear'];
        $carbrand = $_POST['carbrand'];
        $platenumber = $_POST['platenumber'];*/
        $color = $_POST['color'];
        $capacity = $_POST['capacity'];
        $description = $_POST['description'];
        $amount = $_POST['amount'];
        

        $sql = "INSERT INTO product(image,name,category,color,capacity,description,amount,status)
         VALUES ('$photo','$carname','$carcategory','$color','$capacity','$description','$amount',0)";
        insert_data($sql);

        $targetDirectory = "../uploads/products/";
        $target_file = $targetDirectory . basename($_FILES["photo"]["name"]);
        move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);

    ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Product Added',
            }).then((result) => {
                window.location.replace('../index.php');
            })
        </script>

    <?php
    }
    ?>
</body>

</html>