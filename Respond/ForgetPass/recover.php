<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updatePassword'])) {
    include 'recoveryMail.php';
    header('Location: recover.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../../Style/nav.css" />
    <link rel="stylesheet" href="../../Style/forgetPass.css">
    <link rel="stylesheet" href="../../Style/footer.css" />
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../../Style/navMedia.css" />
    <link rel="stylesheet" href="../../Style/footerMedia.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="http://parsleyjs.org/dist/parsley.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>


    <div class="top"></div>
    <label id="overlay" for="sidebar"></label>
    <nav>
        <input type="checkbox" name="ham" id="sidebar" />
        <label for="sidebar"><img src="../../Images/Hamburger.svg" class="white open-sidebar" /></label>

        <div class="navbar">
            <div class="logo">
                <a href="index.html">
                    <img src="../../Images/TedxLogo.svg" alt="TEDx Logo" />
                </a>
            </div>

            <ul class="menu">
                <label for="sidebar"><img src="../../Images/Close.svg" alt="" class="white close-sidebar" /></label>
                <li><a href="../../index.html">HOME</a></li>
                <li><a href="../../speakers.html">SPEAKERS</a></li>
                <li><a href="../../team.html">OUR TEAM</a></li>
                <li><a href="#Contact">SPONSORS</a></li>
                <li><a href="../../ContactUs/index.php">CONTACT US</a></li>
                <li id="Register"><a href="../index.php">REGISTER</a></li>
            </ul>
        </div>
    </nav>

    <section id="formSpace">
        <div class="formBox reco">
            <div class="btnBox">
                Recover Your Account
            </div>
            <form id="recovery" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" class="input" method="POST">
                <div class="align">
                    <input type="text" name="email" id="email" class="inputField" placeholder="Email" required data-parsley-type="email" data-parsley-trigger="keyup">

                    <button type="submit" class="submit" name="updatePassword">Send Mail</button>
                    <p>Have an Account? <span id="link" onclick="location.replace('../index.php')">Log In</span></p>
                    <div class="resPass  ">
                        <p>Recovery Mail Sent</p>
                        <ion-icon name="shield-checkmark-outline"></ion-icon>
                        <p class="smallTxt">Check to Reset Your Password</p>
                    </div>
            </form>
        </div>
    </section>
    <section id="footer">
        <div class="footLogo">
            <img src="../../Images/TedxLogoWhite.svg" alt="" />
            <p>
                This independent TEDx event is operated under license from TED.
                Copyright Stichting TEDxRamanujanCollege, 2024. All Rights Reserved.
            </p>
        </div>
        <div class="links">
            <div class="box">
                <a href="#" target="_blank"><ion-icon name="logo-linkedin"></ion-icon></a>
            </div>
            <div class="box">
                <a href="mailto:tedx@ramanujan.du.ac.in" target="_blank">
                    <ion-icon name="mail-outline"></ion-icon></a>
            </div>
            <div class="box">
                <a href="https://www.instagram.com/tedx_ramanujancollege?igsh=MWNwenIyd3Foazl0OA==" target="_blank">
                    <ion-icon name="logo-instagram"></ion-icon></a>
            </div>
        </div>
    </section>
    <div class="button">
        <a href="#top"><img src="../../Images/ArrowUp.svg" alt="Top Arrow" /></a>
    </div>
    <script src="../script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <script>
        $("#recovery").parsley();
    </script>
</body>

</html>
<?php
if (isset($_SESSION['RecoveryMail'])) {
    if ($_SESSION['RecoveryMail'] == "Sent") { ?>
        <script>
            $(".resPass").addClass("reveal");
            setInterval(() => {
                $(".resPass").removeClass("reveal");
            }, 3000);
        </script>
    <?php
        unset($_SESSION['RecoveryMail']); // Unset after use 
    } else if ($_SESSION['RecoveryMail'] == "NotExist") {
    ?>
        <script>
            document.querySelector(".resPass").innerHTML = ` <p>Email Not Exist</p>
                                <ion-icon name="bug-outline"></ion-icon>
                                <p class="smallTxt">Please Check Your Email</p>`;
            $(".resPass").addClass("reveal");
            document.querySelector(".resPass").querySelector("ion-icon").style.color = "red";
            setTimeout(() => {
                $(".resPass").removeClass("reveal");
            }, 4000);
        </script>
<?php
        unset($_SESSION['RecoveryMail']); // Unset after use 
    }
    unset($_SESSION['RecoveryMail']); // Unset after use 
}
die();
?>