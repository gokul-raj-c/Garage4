<?php
session_start();
require('../../connect.php');

if (isset($_POST['add'])) {
    $id = $_POST['id'];
    $email = $_SESSION['email'];

    $sql = "insert into wishlist (car_id,email) values ('$id','$email')";
    insert_data($sql);
    echo 1;
    exit();
}

if (isset($_POST['remove'])) {
    $id = $_POST['id'];

    $sql = "delete from wishlist where wishlist_id='$id'";
    delete_data($sql);
    echo 1;
    exit();
}
