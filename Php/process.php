<?php
include "Php/connection.php";
if (isset($_POST['submitReg']) && !isset($_SESSION['form_submitted'])) {
    $fName = $_POST['firstName'];
    $lName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $college = $_POST['college'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmPassword'];

    if ($fName != "" && $lName != "" && $email != "" && $phone != "" && $college != "" && $password != "" && $cpassword != "" && $password == $cpassword) {
        $query = "INSERT INTO registrations (FIRST_NAME, LAST_NAME, EMAIL, PHONE, COLLEGE, PASSWORD) VALUES ('$fName', '$lName', '$email', '$phone', '$college', '$password')";
        $data = mysqli_query($con, $query);

        if ($data) {
            echo "Inserted successfully";
        } else {
            echo "Insertion failed";
        }
    } else {
        echo "BLANK!!";
    }
}
