<?php
// updateAction.php


sleep(5);

if (isset($_POST['first_name'])) {
    if (isset($_GET['userToken'])) {
        $token = htmlspecialchars($_GET['userToken']);

        include "../Connect/conn.php";

        $first_name = htmlspecialchars($_POST['first_name']);
        $last_name = htmlspecialchars($_POST['last_name']);
        $mobilePhone = htmlspecialchars($_POST['mobilePhone']);
        $college = htmlspecialchars($_POST['college']);

        $data = array(
            ':first_name'  => $first_name,
            ':last_name'  => $last_name,
            ':mobilePhone' => $mobilePhone,
            ':college' => $college,

        );

        $updateAllQuery = "UPDATE registrations SET FIRST_NAME = :first_name, LAST_NAME = :last_name, PHONE = :mobilePhone COLLEGE = :college WHERE TOKEN = $token";
        $verify = $connect->prepare($updateAllQuery);

        if ($verify->execute($data)) {
?>
            <script>
                alert("Updated!")
            </script>
        <?php
        } else {
        ?>
            <script>
                alert("Error!")
            </script>
<?php

        }
    }
}
