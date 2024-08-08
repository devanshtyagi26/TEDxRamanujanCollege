<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
if (!isset($_SESSION['isLogin'])) {
    header('location:../Respond/index.php');
    die();
}
// if (isset($_COOKIE['actionProcess'])) {
//     // action already done
//     setcookie('actionProcess', "set", time() - 180, "/");
//     echo "N";
//     unset($_POST['pay']);
//     header('location:dashboard.php');
//     die();
// } else {
//     setcookie('actionProcess', "set", time() + 180, "/");
//     echo "Y";
// }

include '../Respond/Connect/logcon.php';


$ids = $_SESSION['UID'];
$selectQuery = "
SELECT * FROM registrations WHERE ID=$ids";
$Query = mysqli_query($con, $selectQuery);
$res = mysqli_fetch_array($Query);
echo isset($_POST['amt']);
if (isset($_POST['amt']) && isset($_POST['name'])) {
    $amount = $_POST['amt'];
    $fname = $_POST['name'];
    $lname = $res['LAST_NAME'];
    $status = "pending";
    $added_on = date('Y-m-d h:i:s');
    $payQuery = "INSERT INTO paymentuser(`FIRST_NAME`, `LAST_NAME`, `AMOUNT`, `STATUS`, `ADDED_ON`) VALUES ('$fname','$lname',$amount,'$status','$added_on')";
    mysqli_query($con, $payQuery);
    $_SESSION['OID'] = mysqli_insert_id($con);
}


if (isset($_POST['payment_id']) && isset($_SESSION['OID'])) {
    $paymentId = $_POST['payment_id'];
    $payQueryComp = "UPDATE paymentuser SET STATUS = 'complete', PAYMENT_ID = '$paymentId' WHERE ID = '" . $_SESSION['OID'] . "'";
    mysqli_query($con, $payQueryComp);
    // Update the registration payment status
    $query = "UPDATE registrations SET PAYMENT = 'done' WHERE ID = $ids";
    mysqli_query($con, $query); // Execute the query here
}

// Close the database connection
mysqli_close($con);
