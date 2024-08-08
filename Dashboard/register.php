<?php

session_start();
if (!isset($_SESSION['isLogin'])) {
    header('location:../Respond/index.php');
    die();
}

include '../Respond/Connect/logcon.php';

$ids = $_SESSION['UID'];
$selectQuery = "
SELECT * FROM registrations WHERE ID=$ids";
$Query = mysqli_query($con, $selectQuery);
$res = mysqli_fetch_array($Query);



$uploadedImg = "SELECT IMAGE FROM registrations WHERE ID = $ids";
$uploadedImgquery = mysqli_query($con, $uploadedImg);
$resImg = mysqli_fetch_array($uploadedImgquery);
if ($resImg === false || empty($resImg['IMAGE'])) {
    $showImg = "addImg.svg";
} else {
    $showImg = $resImg['IMAGE'];
}


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome - <?php echo $res['FIRST_NAME'] ?></title>
    <link rel="stylesheet" href="../Style/nav.css" />
    <link rel="stylesheet" href="../Style/dashboard.css" />
    <link rel="stylesheet" href="../Style/updateinfo.css" />
    <link rel="stylesheet" href="../Style/payment.css" />
    <link rel="stylesheet" href="../Respond/style.css" />
    <link rel="stylesheet" href="../Style/footer.css" />
    <link rel="stylesheet" href="../Style/imgUpload.css" />
    <link rel="stylesheet" href="../Style/navMedia.css" />
    <link rel="stylesheet" href="../Style/footerMedia.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="http://parsleyjs.org/dist/parsley.js"></script>
</head>

<body>
    <div id="top"></div>
    <label id="overlay" for="sidebar"></label>
    <nav>
        <input type="checkbox" name="ham" id="sidebar" />
        <label for="sidebar"><img src="../../Images/Hamburger.svg" class="white open-sidebar" /></label>

        <div class="navbar">
            <div class="logo">
                <a href="../../index.html">
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
                <li id="Register"><a href="../../Respond/index.php">REGISTER</a></li>
            </ul>
        </div>
    </nav>
    <section class="dashboard">
        <div class="navigation">
            <a href="dashboard.php">
                <ion-icon name="person-outline"></ion-icon>
                <div class="expand">Dashboard</div>
            </a>
            <a href="updateInfo.php">
                <ion-icon name="create-outline"></ion-icon>
                <div class="expandSmall">Update</div>
            </a>
            <a href="register.php">
                <ion-icon name="mail-open-outline"></ion-icon>
                <div class="expandSmall">Register</div>
            </a>
            <a href="../Respond/index.php">
                <ion-icon name="log-out-outline"></ion-icon>
                <div class="expandSmall">Logout</div>
            </a>
        </div>
        <div class="profilePic">

            <div class="photo" style="background: url(../Images/UserPhotos/<?php echo $showImg; ?>);"></div>


        </div>
        <div class="updateInfo">
            <h2><?php echo $_SESSION['fName'] ?>, Confirm Your Details</h2>
            <form id="validate_form" class="input" action="gateway.php" method="POST">
                <div class="input-value">
                    <?php echo $res['FIRST_NAME'] ?>
                </div>
                <div class="input-value">
                    <?php echo $res['LAST_NAME'] ?>
                </div>
                <div class="input-value">
                    <?php echo $res['EMAIL'] ?>
                </div>
                <div class="input-value">
                    <?php echo $res['PHONE'] ?>
                </div>
                <div class="input-value">
                    <?php echo $res['COLLEGE'] ?>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" id="check_rules" name="check_rules" required />
                        <p> Details Confirmed / <a href="updateInfo.php?id=<?php echo $res['ID']; ?>"> Change Details</a></p>
                    </label>
                </div>
                <input type="submit" id="submit" class="submit" name="pay" value="Pay 200INR" />
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
    <script src="../../JavaScript/nav.js"></script>
    <script src="../../JavaScript/index.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>


</html>