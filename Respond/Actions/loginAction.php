<?php


include './Connect/logcon.php';
if (isset($_POST['login'])) {
    $logEmail = trim($_POST['logEmail']);
    $logPassword = trim($_POST['logPassword']);

    $mailSearch = "
    SELECT * FROM registrations WHERE EMAIL='$logEmail' AND STATUS='active' 
    ";

    $logQuery = mysqli_query($con, $mailSearch);
    $email_count = mysqli_num_rows($logQuery);
    if ($email_count) {
        $logEmail_pass = mysqli_fetch_assoc($logQuery);
        $fetchedPass = $logEmail_pass['PASSWORD'];
        $decodePass = password_verify($logPassword, $fetchedPass);


        $_SESSION['fName'] = $logEmail_pass['FIRST_NAME'];
        $_SESSION['lName'] = $logEmail_pass['LAST_NAME'];
        $_SESSION['email'] = $logEmail_pass['EMAIL'];
        $_SESSION['phone'] = $logEmail_pass['PHONE'];
        $_SESSION['college'] = $logEmail_pass['COLLEGE'];
        $id = $logEmail_pass['ID'];



        if ($decodePass) {
            if (isset($_POST['rememberMe'])) {
                setcookie('emailCookie', $logEmail, time() + 86400, "/");
                setcookie('passCookie', $logPassword, time() + 86400, "/");

                $_SESSION['postData'] = $_POST;
                $_SESSION['isLogin'] = "yes";
?>
                <script>
                    location.replace('../Dashboard/dashboard.php?id=<?php echo $id; ?>');
                </script>
            <?php
            } else {
                setcookie('emailCookie', '', time() - 3600, "/");
                setcookie('passCookie', '', time() - 3600, "/");

                $_SESSION['isLogin'] = "yes";
                $_SESSION['postData'] = $_POST;
            ?>
                <script>
                    location.replace('../Dashboard/dashboard.php?id=<?php echo $id; ?>');
                </script>
            <?php
            }
            ?>
        <?php
        } else {
            $_SESSION['flip'] = "invalPass";
            if (!$decodePass) {
                header("Location: index.php");
                exit();
            }
        }
    } else {
        ?>
<?php
        $_SESSION['flip'] = "invalEmail";
    }
    if (!$email_count) {
        header("Location: index.php");
        exit();
    }
}

$_SESSION['emailCookie'] = "";
$_SESSION['passCookie'] = "";

if (isset($_COOKIE['emailCookie']) && isset($_COOKIE['passCookie'])) {
    $_SESSION['emailCookie'] = $_COOKIE['emailCookie'];
    $_SESSION['passCookie'] = $_COOKIE['passCookie'];
}

if (isset($_POST['rememberMe'])) {
    echo "fgad";
};
?>