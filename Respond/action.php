<?php

// action.php

sleep(5);

if (isset($_POST['first_name'])) {

    include "conn.php";

    $data = array(
        ':first_name'  => $_POST['first_name'],
        ':last_name'  => $_POST['last_name'],
        ':email'   => $_POST['email'],
        ':mobilePhone' => $_POST['mobilePhone'],
        ':college' => $_POST['college'],
        ':password'   => password_hash($_POST['password'], PASSWORD_BCRYPT),
    );

    $emailQuery = "SELECT * FROM registrations WHERE EMAIL = :email";
    $verify = $connect->prepare($emailQuery);
    $verify->execute(array(':email' => $_POST['email']));
    $emailCount = $verify->rowCount();

    if ($emailCount > 0) {
        echo 'This Email Already Exists.';
    } else {
        $query = "
        INSERT INTO registrations
        (FIRST_NAME, LAST_NAME, EMAIL, PHONE, COLLEGE, PASSWORD)
        VALUES (:first_name, :last_name, :email, :mobilePhone, :college, :password)
        ";
        $statement = $connect->prepare($query);
        if ($statement->execute($data)) {
            echo 'Registration Completed Successfully...';
        } else {
            echo 'Some Error occurred, Please Retry';
        }
    }
}
