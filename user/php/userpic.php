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

    $sql1 = "select profile_image from registration where email_id='$email'";
    $res = sel($sql1);
    $arr = mysqli_fetch_assoc($res);
    $oldFile = $row['profile_image'];
    $oldFilePath = '../uploads/profile/' . $oldFile;
    if ($oldFile != 'default.jpg') {
        unlink($oldFilePath);
    }

    if (isset($_POST['submit'])) {
        $photo = $_FILES['photo']['name'];
        
        

        $sql = "UPDATE `registration` SET profile_image='$photo' where email_id='$email'";
        insert_data($sql);

        $targetDirectory = "../uploads/profile/";
        $target_file = $targetDirectory . basename($_FILES["photo"]["name"]);
        move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);

    ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Product Added',
            }).then((result) => {
                window.location.replace('../profile.php');
            })
        </script>

    <?php
    }
    ?>
</body>

</html>