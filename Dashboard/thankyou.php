<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header('location:../Respond/index.php');
    die();
}

if (isset($_COOKIE['actionThank'])) {
    // action already done
    setcookie('actionThank', "set", time() - 180, "/");
    echo "N";
    unset($_POST['pay']);
    header('location:dashboard.php');
    die();
} else {
    setcookie('actionThank', "set", time() + 180, "/");
    echo "Y";
}

unset($_POST['pay']);
?>
<h1> thankyou </h1>