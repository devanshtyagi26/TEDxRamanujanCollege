<?php
// action.php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

sleep(5);

if (isset($_POST['first_name'])) {
    include "../Connect/conn.php";
    if (isset($_POST['heard'])) {
        $choice = htmlspecialchars($_POST['heard']);

        if ($choice === "student") {

            $first_name = htmlspecialchars($_POST['first_name']);
            $last_name = htmlspecialchars($_POST['last_name']);
            $email = htmlspecialchars($_POST['email']);
            $mobilePhone = htmlspecialchars($_POST['mobilePhone']);
            $college = htmlspecialchars($_POST['college']);
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $token = bin2hex(random_bytes(15));

            $data = array(
                ':first_name'  => $first_name,
                ':last_name'  => $last_name,
                ':email'   => $email,
                ':mobilePhone' => $mobilePhone,
                ':choice' => $choice,
                ':college' => $college,
                ':password'   => $password,
                ':token' => $token,
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
        (FIRST_NAME, LAST_NAME, EMAIL, PHONE, CHOICE, COLLEGE, OCCUPATION, PASSWORD, TOKEN, STATUS)
        VALUES (:first_name, :last_name, :email, :mobilePhone, :choice, :college, 'NULL', :password, :token, 'inactive')
        ";
                $statement = $connect->prepare($query);
                if ($statement->execute($data)) {
                    echo 'Registration Completed Successfully...';

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
                        $mail->Subject = 'Email Activation';
                        $mail->Body    = "Hi, $first_name $last_name <br> Click here to activate your account <br>
                http://localhost:8000/Respond/Source/activate.php?token=$token";


                        $mail->send();
                        echo 'Message has been sent';
                        $_SESSION['flip'] = "yes";
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                } else {
                    echo 'Some Error occurred, Please Retry';
                }
            }
        } else if ($choice === "others") {
            $first_name = htmlspecialchars($_POST['first_name']);
            $last_name = htmlspecialchars($_POST['last_name']);
            $email = htmlspecialchars($_POST['email']);
            $mobilePhone = htmlspecialchars($_POST['mobilePhone']);
            $occupation = htmlspecialchars($_POST['occupation']);
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $token = bin2hex(random_bytes(15));

            $data = array(
                ':first_name'  => $first_name,
                ':last_name'  => $last_name,
                ':email'   => $email,
                ':mobilePhone' => $mobilePhone,
                ':choice' => $choice,
                ':occupation' => $occupation,
                ':password'   => $password,
                ':token' => $token,
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
        (FIRST_NAME, LAST_NAME, EMAIL, PHONE, CHOICE, COLLEGE, OCCUPATION, PASSWORD, TOKEN, STATUS)
        VALUES (:first_name, :last_name, :email, :mobilePhone, :choice, 'NULL', :occupation, :password, :token, 'inactive')
        ";
                $statement = $connect->prepare($query);
                if ($statement->execute($data)) {
                    echo 'Registration Completed Successfully...';

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
                        $mail->Subject = 'Email Activation';
                        $mail->Body    = "Hi, $first_name $last_name <br> Click here to activate your account <br>
                http://localhost:8000/Respond/Source/activate.php?token=$token";


                        $mail->send();
                        echo 'Message has been sent';
                        $_SESSION['flip'] = "yes";
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                } else {
                    echo 'Some Error occurred, Please Retry';
                }
            }
        } else {
            echo 'Some Error occurred, Please Retry';
        }
    }
}
