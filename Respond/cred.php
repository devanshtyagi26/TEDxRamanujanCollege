<?php

session_start();
if (!isset($_SESSION['isLogin'])) {
    header('location:index.php');
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cred</title>
    <link rel="stylesheet" href="../Style/cred.css">
</head>

<body>
    <p>Hi</p> <?php echo $_SESSION['fName'] ?>

    <div id="stars"></div>
    <div id="stars2"></div>
    <div id="stars3"></div>
</body>

</html>
<?php
// Replicate the print_r($_POST) for debugging purposes
if (isset($_SESSION['postData'])) {
    echo '<pre>';
    print_r($_SESSION['postData']);
    echo '</pre>';
} else {
    echo 'No POST data found.';
}

// Optionally, unset the session postData after using it
unset($_SESSION['postData']);
?>
<a href="index.php">Logout</a>
<?php
die();
