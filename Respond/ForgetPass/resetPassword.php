<?php

session_start();

include '../Connect/logcon.php';

$token = $_GET['token'];
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

echo "reached safely";
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
                <label for="sidebar"><img src="../Images/Close.svg" alt="" class="white close-sidebar" /></label>
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
        <div class="reco">
            <div class="btnBox">
                Update Your Password
            </div>
            <form id="forget" class="input" method="POST" action="../Actions/recoveryAction.php">
                <div class="align">
                    <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
                    <input type="password" name="newPassword" id="newPassword" class="inputField" placeholder="New Password" required data-parsley-length="[8, 16]" data-parsley-trigger="keyup" />
                    <input type="password" name="confirmPassword" id="confirmPassword" class="inputField" placeholder="Confirm Password" data-parsley-equalto="#newPassword" data-parsley-trigger="keyup" required class="form-control">

                    <button type="submit" class="submit" name="try">Update Password</button>
                    <p>Have an Account? <span id="link" onclick="location.replace('index.php')">Log In</span></p>
                    <div class="resPass  ">
                        <p>Password Not Updated</p>
                        <ion-icon name="bug-outline"></ion-icon>
                        <p class="smallTxt">Try Again</p>
                    </div>
            </form>
        </div>
    </section>
    <section id="footer">
        <div class="footLogo">
            <img src="../Images/TedxLogoWhite.svg" alt="" />
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
        $("#forget").parsley();
    </script>
    <script>
        <?php if ($_SESSION['flip'] == "passNotUpdated") { ?>
            $(".resPass").addClass("reveal");
            setInterval(() => {
                $(".resPass").removeClass("reveal");
            }, 3000);
        <?php } else if ($_SESSION['flip'] == "noToken") { ?>
            document.querySelector(".resPass").innerHTML = ` <p>No Token Found</p>
            <ion-icon name="bug-outline"></ion-icon>
            <p class="smallTxt">Please Try Again</p>`;
            $(".resPass").addClass("reveal");
            document.querySelector(".resPass").querySelector("ion-icon").style.color = "red";
            setTimeout(() => {
                $(".resPass").removeClass("reveal");
            }, 4000);
        <?php } else if ($_SESSION['flip'] == "passUpdated") { ?>
            document.querySelector(".resPass").innerHTML = ` <p>Password Updated</p>
            <ion-icon name="bug-outline"></ion-icon>
            <p class="smallTxt">LogIn Now</p>`;
            $(".resPass").addClass("reveal");
            document.querySelector(".resPass").querySelector("ion-icon").style.color = "red";
            setTimeout(() => {
                $(".resPass").removeClass("reveal");
            }, 4000);
        <?php } ?>
    </script>
</body>

</html>