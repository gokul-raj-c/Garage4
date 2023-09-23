<?php
require '../../connect.php';
session_start();
/*$email=$_SESSION['email_id'];*/
$id=$_GET['$id'];
$v=1;
$sql="update complaint set reply='$v' where complaint_id='$id' ";
update_data($sql);
?>