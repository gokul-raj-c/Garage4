<?php
	session_start();
	require '../../connect.php'; 
	$email=$_SESSION['email_id'];
	$arr=mysqli_fetch_assoc(select_data("SELECT image FROM registration WHERE email_id='$email';"));
	$path="../../uploads/profile/".$user['image'];
	 if ($arr['image'] != 'default.jpg') { 
	          unlink($path);
     } 
	$target_dir = "../../uploads/profile/";
	$imageFileType = strtolower(pathinfo(basename($_FILES["pro"]["name"]),PATHINFO_EXTENSION));
	$Filename = str_replace(['@', '.'], '', $email) . "." . $imageFileType;
	$target_file = $target_dir . $Filename;
	if (move_uploaded_file($_FILES["pro"]["tmp_name"], $target_file)) {
		$sql=update_data("UPDATE registration SET image='$Filename' WHERE email_id='$email'");
		echo 1;
		exit();
	} 
	else {
		$sql=update_data("UPDATE registration SET image='default.jpg' WHERE email_id='$email'");
		echo 0;
		exit();
	}
?>