<?php

session_start();
include "../Connect/logcon.php";

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    $updateQuery = "UPDATE registrations SET STATUS='active' WHERE TOKEN='$token'";
    $query = mysqli_query($con, $updateQuery);

    if ($query) {
        if (isset($_SESSION['flip'])) {
            echo "Account updated Successfully";
            $_SESSION['flip'] = "yes";
            header('location:../index.php');
        } else {
            echo "You are logged out";
            $_SESSION['flip'] = "error";
            header('location:../index.php');
        }
    } else {
        echo "Account Not updated, Please re-register.";
        $_SESSION['flip'] = "error";
        header('location:../index.php');
    }
}
