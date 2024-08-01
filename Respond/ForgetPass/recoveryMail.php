<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include "../Connect/conn.php";

if (isset($_POST['updatePassword'])) {

    $email = htmlspecialchars($_POST['email']);

    $data = array(
        ':email'   => $email,
    );

    $emailQuery = "SELECT * FROM registrations WHERE EMAIL = :email";
    $verify = $connect->prepare($emailQuery);
    $verify->execute(array(':email' => $_POST['email']));
    $emailCount = $verify->rowCount();


    if ($emailCount > 0) {
        $userdata = $verify->fetch(PDO::FETCH_ASSOC);
        $first_name = $userdata['FIRST_NAME'];
        $last_name = $userdata['LAST_NAME'];
        $token = $userdata['TOKEN'];
        //mail

        //Import PHPMailer classes into the global namespace
        //These must be at the top of your script, not inside a function


        //Load Composer's autoloader
        require '../Source/Exception.php';
        require '../Source/PHPMailer.php';
        require '../Source/SMTP.php';

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'tyagidevansh3@gmail.com';                     //SMTP username
            $mail->Password   = 'rhynppgnkyiqaqnh';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('tyagidevansh3@gmail.com', 'Contact Form');
            $mail->addAddress($email, 'By Website');     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Password Reset';
            $mail->Body    = "Hi, $first_name $last_name <br> Click here to <b> Reset your Password </b> <br>
                http://localhost:8000/Respond/ForgetPass/resetPassword.php?token=$token";


            $mail->send();
            echo 'Message has been sent';
            $_SESSION['RecoveryMail'] = "Sent";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo 'Email not exist';
        $_SESSION['RecoveryMail'] = "NotExist";
    }
} else {
    unset($_SESSION['RecoveryMail']);
}
