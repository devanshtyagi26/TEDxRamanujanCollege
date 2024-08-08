<?php

session_start();

include '../Connect/logcon.php';

$token = $_POST['token'];
$token_hash = hash("sha256", $token);

$match = "SELECT * FROM registrations WHERE RESET_TOKEN_HASH = '$token_hash'";
$Query = mysqli_query($con, $match);

$record = mysqli_fetch_assoc($Query); // Fetch the result as an associative array
if ($record === null) {
    die("token not found");
}

date_default_timezone_set('Asia/Kolkata');
if (strtotime($record['RESET_TOKEN_EXPIRES_AT']) <= time()) {
    die("token has expired");
}

$id = $record['ID'];

echo "reached safely";
?>

<?php

if (isset($_POST['newPassword'])) {

    $newPassword = trim($_POST['newPassword']);
    $confirmPassword = trim($_POST['confirmPassword']);

    $nPass = password_hash($newPassword, PASSWORD_BCRYPT);

    if ($newPassword === $confirmPassword) {
        $updatePassQuery = " UPDATE registrations SET PASSWORD='$nPass', RESET_TOKEN_HASH = NULL, RESET_TOKEN_EXPIRES_AT = NULL WHERE ID = $id";

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
