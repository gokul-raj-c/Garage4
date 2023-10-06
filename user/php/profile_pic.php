<?php
session_start();
require('../../connect.php');

if (isset($_POST['submit'])) {
    $photo = $_FILES['photo']['name'];
    $email = $_SESSION['email_id'];
    $targetDirectory = "../uploads/profile/";
    $originalFileName = basename($_FILES["photo"]["name"]);
    $fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);
    $newFileName = str_replace(['@', '.'], '', $email) . "." . $fileExtension;
    $targetFile = $targetDirectory . $newFileName;
    $sql = "select profile_image from registration where email_id='$email'";
    $res = select_data($sql);
    $row = mysqli_fetch_assoc($res);
    $oldFile = $row['profile_image'];
    $oldFilePath = '../uploads/profile/' . $oldFile;
    if ($oldFile != 'default.jpg') {
        unlink($oldFilePath);
    }
    $sql = "UPDATE `registration` SET profile_image='$newFileName' where email_id='$email'";
    update_data($sql);
    move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile);
    
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