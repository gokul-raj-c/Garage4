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
if (isset($_POST['submit'])) {
  $id = $_POST['carid'];
  /*$photo = $_FILES['photo']['name'];*/
  $carname = $_POST['carname'];
  $carcategory = $_POST['carcategory'];
  $color = $_POST['carcolor'];
  $capacity = $_POST['carcapacity'];
  $description = $_POST['description'];
  $amount = $_POST['carrate'];


  $sql ="UPDATE product SET `name`='$carname',`category`='$carcategory',`color`='$color',`capacity`='$capacity',`description`='$description',`amount`='$amount' WHERE `product_id`='$id';";
  update_data($sql);

  /*$targetDirectory = "../uploads/products/";
  $target_file = $targetDirectory . basename($_FILES["photo"]["name"]);
  move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);*/
?>
 <script>
            Swal.fire({
              icon: 'success',
              text: 'Car Updated',
              didClose: () => {
                window.location.replace('../viewcar.php');
              }
            });
          </script>
        <?php
}
?>