<?php

echo "hii ";
include '../Connect/logcon.php';
echo  isset($_GET['token']);

if (isset($_POST['newPassword'])) {
    echo "entering";
    if (isset($_GET['token'])) {
        $token = $_GET['token'];
        $_SESSION['token'] = $_GET['token'];

        $newPassword = trim($_POST['newPassword']);
        $confirmPassword = trim($_POST['confirmPassword']);

        $nPass = password_hash($newPassword, PASSWORD_BCRYPT);

        if ($newPassword === $confirmPassword) {
            $updatePassQuery = " UPDATE registrations SET PASSWORD='$nPass' WHERE TOKEN='$token'";

            $runQuery = mysqli_query($con, $updatePassQuery);

            if ($runQuery) {
                $_SESSION['flip'] = "passUpdated";
                header('location:../index.php');
                exit();
            } else {
                $_SESSION['flip'] = "passNotUpdated";
                header('location:../ForgetPass/resetPassword.php');
                exit();
            }
        }
    } else {
        echo "token not found";
        $_SESSION['flip'] = "noToken";
        header('location:../ForgetPass/resetPassword.php');
        exit();
    }
    unset($_SESSION["once"]);
} else {
    echo " not entered";
}
