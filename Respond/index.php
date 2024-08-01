<?php
session_start();
ob_start();

include "Actions/action.php";
include "Actions/loginAction.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../Style/nav.css" />
    <link rel="stylesheet" href="../Style/register.css" />
    <link rel="stylesheet" href="../Style/footer.css" />
    <link rel="stylesheet" href="../Style/navMedia.css" />
    <link rel="stylesheet" href="../Style/footerMedia.css" />
    <link rel="stylesheet" href="../Style/registerMedia.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="http://parsleyjs.org/dist/parsley.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="top"></div>
    <label id="overlay" for="sidebar"></label>
    <nav>
        <input type="checkbox" name="ham" id="sidebar" />
        <label for="sidebar"><img src="../Images/Hamburger.svg" class="white open-sidebar" /></label>

        <div class="navbar">
            <div class="logo">
                <a href="index.html">
                    <img src="../Images/TedxLogo.svg" alt="TEDx Logo" />
                </a>
            </div>

            <ul class="menu">
                <label for="sidebar"><img src="../Images/Close.svg" alt="" class="white close-sidebar" /></label>
                <li><a href="../index.html">HOME</a></li>
                <li><a href="../speakers.html">SPEAKERS</a></li>
                <li><a href="../team.html">OUR TEAM</a></li>
                <li><a href="#Contact">SPONSORS</a></li>
                <li><a href="../ContactUs/index.php">CONTACT US</a></li>
                <li id="Register"><a href="#l">REGISTER</a></li>
            </ul>
        </div>
    </nav>

    <section id="formSpace">
        <div class="formBox">
            <div class="btnBox">
                <div id="btnColor"></div>
                <button type="button" class="toggleBtn" id="logText" onclick="login()">
                    Log In
                </button>
                <button type="button" class="toggleBtn" id="regText" onclick="register()">
                    Register
                </button>
            </div>
            <form id="login" class="input" method="POST">
                <div class="align">
                    <input type="text" name="logEmail" class="inputField" placeholder="Email Address" required data-parsley-type="email" data-parsley-trigger="keyup" value="<?php echo $_SESSION['emailCookie']; ?>" />
                    <input type="password" name="logPassword" class="inputField" placeholder="Password" required data-parsley-length="[8, 16]" data-parsley-trigger="keyup" value="<?php echo $_SESSION['passCookie']; ?>" />
                    <p><span id="link" onclick="location.replace('ForgetPass/recover.php')">Forget Password?</span></p>
                    <div class="checkbox">
                        <label><input type="checkbox" name="rememberMe" />
                            <p> Remember Me</p>
                        </label>
                    </div>
                </div>
                <button type="submit" class="submit" name="login">Log In</button>
                <p>Don't Have an Account? <span id="link" onclick="register()">Register Here</span></p>
                <div class="emailVerified  ">
                    <p>Email Verified</p>
                    <ion-icon name="shield-checkmark-outline"></ion-icon>
                    <p class="smallTxt">Continue Logging In</p>
                </div>
            </form>
            <form id="validate_form" class="input" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
                <div class="inputName">
                    <div class="block">
                        <div class="input-value">
                            <input type="text" name="first_name" id="first_name" class="inputField" placeholder="Enter First Name" required data-parsley-pattern="^[a-zA-Z]+$" data-parsley-trigger="keyup" class="form-control" data-parsley-pattern-message="Enter Valid First Name" />
                        </div>
                    </div>
                    <div class="block">
                        <div class="input-value">
                            <input type="text" name="last_name" id="last_name" class="inputField" placeholder="Last Name" required data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-trigger="keyup" data-parsley-pattern-message="Enter Valid Last Name" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="input-value">
                    <input type="text" name="email" id="email" class="inputField" placeholder="Email" required data-parsley-type="email" data-parsley-trigger="keyup" class="form-control">
                </div>
                <div class="input-value">
                    <input type="text" name="mobilePhone" id="mobilePhone" class="inputField" placeholder="Phone Number" value="" data-parsley-pattern="^(?:\+91|91|0)?[6-9]\d{9}$" data-parsley-pattern-message="Enter Valid Phone Number" data-parsley-trigger="keyup" required class="form-control" />
                </div>
                <div class="input-value">
                    <input type="text" name="college" id="college" class="inputField" placeholder="College Name" required data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-trigger="keyup" class="form-control">
                </div>
                <div class="input-value">
                    <input type="password" name="password" id="password" class="inputField" placeholder="Password" required data-parsley-length="[8, 16]" data-parsley-trigger="keyup" class="form-control">
                </div>
                <div class="input-value">
                    <input type="password" name="confirm_password" id="confirm_password" class="inputField" placeholder="Confirm Password" data-parsley-equalto="#password" data-parsley-trigger="keyup" required class="form-control">
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" id="check_rules" name="check_rules" required />
                        <p> I Accept the Terms & Conditions</p>
                    </label>
                </div>
                <input type="submit" id="submit" class="submit" name="submit" value="Register" />
                <p>Have an Account? <span id="link" onclick="login()">Log In</span></p>
                <div class="verifyYourEmail">
                    <p>Thanks for Registering</p>
                    <ion-icon name="shield-checkmark-outline"></ion-icon>
                    <p class="smallTxt">Check Your Inbox for Verification</p>
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
        <a href="#top"><img src="../Images/ArrowUp.svg" alt="Top Arrow" /></a>
    </div>
    <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <script>
        $("#login").parsley();
    </script>
</body>

</html>

<?php
if (isset($_SESSION['flip'])) {
    if ($_SESSION['flip'] == "invalEmail") {
?>
        <script>
            document.querySelector(".emailVerified").innerHTML = ` <p>Invalid Email</p>
                    <ion-icon name="bug-outline"></ion-icon>
                    <p class="smallTxt">Please Check your Email</p>`;
            $(".emailVerified").addClass("reveal");
            document.querySelector(".emailVerified").querySelector("ion-icon").style.color = "red";
            setTimeout(() => {
                $(".emailVerified").removeClass("reveal");
            }, 4000);
        </script>
    <?php
    } elseif ($_SESSION['flip'] == "invalPass") {
    ?>
        <script>
            document.querySelector(".emailVerified").innerHTML = ` <p>Invalid Password</p>
                        <ion-icon name="bug-outline"></ion-icon>
                        <p class="smallTxt">Please Check your Password</p>`;
            $(".emailVerified").addClass("reveal");
            document.querySelector(".emailVerified").querySelector("ion-icon").style.color = "red";
            setTimeout(() => {
                $(".emailVerified").removeClass("reveal");
            }, 4000);
        </script>
    <?php
    } elseif ($_SESSION['flip'] == "passUpdated") {
    ?>
        <script>
            document.querySelector(".emailVerified").innerHTML = ` <p>Password Updated</p>
                            <ion-icon name="shield-checkmark-outline"></ion-icon>
                            <p class="smallTxt">You May LogIn</p>`;
            $(".emailVerified").addClass("reveal");
            document.querySelector(".emailVerified").querySelector("ion-icon").style.color = "red";
            setTimeout(() => {
                $(".emailVerified").removeClass("reveal");
            }, 4000);
        </script>
    <?php
    } elseif ($_SESSION['flip'] == "error") {
    ?>
        <script>
            document.querySelector(".emailVerified").innerHTML = ` <p>Account Not Updated</p>
                            <ion-icon name="bug-outline"></ion-icon>
                            <p class="smallTxt">Please Re-Register</p>`;
            $(".emailVerified").addClass("reveal");
            document.querySelector(".emailVerified").querySelector("ion-icon").style.color = "red";
            setTimeout(() => {
                $(".emailVerified").removeClass("reveal");
            }, 4000);
        </script>
    <?php
    } elseif ($_SESSION['flip'] == "yes") {
    ?>
        <script>
            $(".emailVerified").addClass("reveal");
            setTimeout(() => {
                $(".emailVerified").removeClass("reveal");
            }, 5000);
        </script>
<?php
    }

    // Unset the session variable after displaying the message
    unset($_SESSION['flip']);
}

if (isset($_POST['rememberMe'])) {
    echo "yes";
} else {
    echo "no";
}
die();
