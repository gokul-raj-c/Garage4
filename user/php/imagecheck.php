<?php
	session_start();
	require '../../connect.php'; 
	$email=$_SESSION['email_id'];
	$user=mysqli_fetch_assoc(select_data("SELECT image from registration where email_id='$email';"));
	$path="../uploads/profile/".$user['image'];
	 if ($user['image'] != 'default.jpg') { 
	          unlink($path);
     } 
	$target_dir = "../uploads/profile/";
	$imageFileType = strtolower(pathinfo(basename($_FILES["pro"]["name"]),PATHINFO_EXTENSION));
	$Filename = str_replace(['@', '.'], '', $email) . "." . $imageFileType;
	$target_file = $target_dir . $Filename;
	if (move_uploaded_file($_FILES["pro"]["tmp_name"], $target_file)) {
		$sql=update_data("UPDATE registration set image='$Filename' where email_id='$email'");
		echo 1;
		exit();
	} 
	else {
		$sql=update_data("UPDATE registration set image='default.jpg' where email_id='$email'");
		echo 0;
		exit();
	}
?>