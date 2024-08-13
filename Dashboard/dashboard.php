<?php

session_start();
if (!isset($_SESSION['isLogin'])) {
  header('location:../Respond/index.php');
  die();
}


include '../Respond/Connect/logcon.php';

if (isset($_GET['id'])) {
  $ids = $_GET['id'];
  $_SESSION['UID'] = $_GET['id'];
} else {
  $ids = $_SESSION['UID'];
}

$selectQuery = "
SELECT * FROM registrations WHERE ID=$ids";
$Query = mysqli_query($con, $selectQuery);
$res = mysqli_fetch_array($Query);




if (isset($_POST['imgSubmit'])) {

  include "../Respond/Connect/logcon.php";

  if ($_FILES['image']['error'] === 4) {
    echo "<script> alert('Image does not Exist'); </script>";
  } else {
    $fileName = $_FILES['image']['name'];
    $fileSize = $_FILES['image']['size'];
    $tmpName = $_FILES['image']['tmp_name'];

    $validImgExtns = ['jpg', 'jpeg', 'png'];
    $imgExtns = explode('.', $fileName);
    $imgExtns = strtolower(end($imgExtns));

    if (!in_array($imgExtns, $validImgExtns)) {
      echo "<script> alert('Invalid Image Extension'); </script>";
    } elseif ($fileSize > 1000000) {
      echo "<script> alert('Image Size is too large'); </script>";
    } else {
      $newImgName = uniqid();
      $newImgName .= '.' . $imgExtns;
      move_uploaded_file($tmpName, '../Images/UserPhotos/' . $newImgName);
      // $imgQuery = "INSERT INTO registrations('IMAGE') VALUES ('$newImgName') WHERE ID = $ids";
      $imgQuery = "UPDATE registrations SET IMAGE = '$newImgName' WHERE ID = $ids";

      $sendQuery = mysqli_query($con, $imgQuery);
      if ($sendQuery) {
        echo "<script>
              alert('Image Updated!'); </script>";
        header('location:updateInfo.php');
      } else {
        echo "<script>
              alert('Image Error!')
              </script>";
        // header('location:dashboard.php');
      }
    }
  }
}


$uploadedImg = "SELECT IMAGE FROM registrations WHERE ID = $ids";
$uploadedImgquery = mysqli_query($con, $uploadedImg);
$resImg = mysqli_fetch_array($uploadedImgquery);
if ($resImg === false || empty($resImg['IMAGE'])) {
  $showImg = "addImg.svg";
} else {
  $showImg = $resImg['IMAGE'];
}


$adminBtn = "SELECT ADMIN FROM registrations WHERE ID = $ids";
$adminquery = mysqli_query($con, $adminBtn);
$resAdmin = mysqli_fetch_array($adminquery);
if ($resAdmin === false || empty($resAdmin['ADMIN'])) {
  $showAdmin = false;
} else {
  $showAdmin = true;
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
  <link rel="stylesheet" href="../Style/footer.css" />
  <link rel="stylesheet" href="../Style/imgUpload.css" />
  <link rel="stylesheet" href="../Style/navMedia.css" />
  <link rel="stylesheet" href="../Style/dashboardMedia.css" />
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
      <a href="dashboard.php?id=<?php echo $res['ID']; ?>">
        <ion-icon name="person-outline"></ion-icon>
        <div class="expand">Dashboard</div>
      </a>
      <a href="updateInfo.php?id=<?php echo $res['ID']; ?>">
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
    <div class="hero">

      <h1>Hello, <span><?php echo $res['FIRST_NAME'] ?></span>!</h1>
      <p>Its good to see you again.</p>
    </div>
    <div class="imgUpload">
      <ion-icon name="close-outline" onclick="closeImg()"></ion-icon>
      <form action="" method="POST" autocomplete="off" enctype="multipart/form-data">
        <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png" value="">
        <button type="submit" name="imgSubmit"> Submit </button>
      </form>

    </div>
    <div class="profilePic">
      <label for="imgDiv">
        <div class="photo" style="background: url(../Images/UserPhotos/<?php echo $showImg; ?>);"></div>
      </label>
      <button onclick="img()" id="imgDiv">
        <p>Upload Picture</p>
      </button>
    </div>
    <div class="personalInfo">
      <h2>Personal Info</h2>
      <div class="cred">
        <div class="blocks">
          <div id="fname"><?php echo $res['FIRST_NAME'] ?></div>

        </div>
        <div class="blocks">
          <div id="lname"><?php echo $res['LAST_NAME'] ?></div>

        </div>

        <div class="blocks">
          <div id="email"><?php echo $res['EMAIL'] ?></div>
        </div>

        <div class="blocks">
          <div id="phone"><?php echo $res['PHONE'] ?></div>

        </div>

        <div class="blocks">
          <div id="college"><?php if ($res['COLLEGE'] === "NULL") {
                              echo $res['OCCUPATION'];
                            } else {
                              echo $res['COLLEGE'];
                            } ?></div>
          <button id="change"><a href="updateInfo.php?id=<?php echo $res['ID']; ?>">Update</a></button>
        </div>
      </div>
    </div>
    <?php
    if ($showAdmin) {
    ?>
      <div class="admin">
        <a href="../admin.php?post=admin"> <button>Admin Panel</button></a>
      </div>
    <?php } ?>
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
</body>
<script src="../../JavaScript/nav.js"></script>
<script src="../../JavaScript/index.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script>
  function img() {
    document.querySelector(".imgUpload").classList.add("revealImg");
  }

  function closeImg() {
    document.querySelector(".imgUpload").classList.remove("revealImg");
  }
</script>

</html>