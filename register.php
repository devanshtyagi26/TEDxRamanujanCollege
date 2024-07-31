<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register</title>
  <link rel="stylesheet" href="Style/nav.css" />
  <link rel="stylesheet" href="Style/register.css" />
  <link rel="stylesheet" href="Style/footer.css" />
  <link rel="stylesheet" href="Style/navMedia.css" />
  <link rel="stylesheet" href="Style/footerMedia.css" />
  <link rel="stylesheet" href="Style/registerMedia.css" />
</head>

<body>
  <div class="top"></div>
  <label id="overlay" for="sidebar"></label>
  <nav>
    <input type="checkbox" name="ham" id="sidebar" />
    <label for="sidebar"><img src="Images/Hamburger.svg" class="white open-sidebar" /></label>

    <div class="navbar">
      <div class="logo">
        <a href="index.html">
          <img src="Images/TedxLogo.svg" alt="TEDx Logo" />
        </a>
      </div>

      <ul class="menu">
        <label for="sidebar"><img src="Images/Close.svg" alt="" class="white close-sidebar" /></label>
        <li><a href="./index.html">HOME</a></li>
        <li><a href="./speakers.html">SPEAKERS</a></li>
        <li><a href="./team.html">OUR TEAM</a></li>
        <li><a href="#">SPONSORS</a></li>
        <li><a href="./ContactUs/index.php">CONTACT US</a></li>
        <li id="Register"><a href="#">REGISTER</a></li>
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
      <form id="login" class="input">
        <input type="text" class="inputField" placeholder="User Id" />
        <input type="password" class="inputField" placeholder="Password" />
        <button type="submit" class="submitBtn">Log In</button>
      </form>
      <form id="register" class="input" method="POST">
        <div class="inputName">
          <div class="block">
            <div class="input-value">
              <input type="text" class="inputField" name="firstName" id="firstName" placeholder="First Name" />
              <span class="firstName"> </span>
            </div>
          </div>
          <div class="block">
            <div class="input-value">
              <input type="text" class="inputField" name="lastName" id="lastName" placeholder="Last Name" />
              <span class="lastName"></span>
            </div>
          </div>
        </div>
        <div class="input-value">
          <input type="email" class="inputField" name="email" id="email" placeholder="Email Address" />
          <span class="email"></span>
        </div>
        <div class="input-value">
          <input type="text" class="inputField" name="phone" id="phone" placeholder="Phone No." />
          <span class="phone"></span>
        </div>
        <div class="input-value">
          <input type="text" class="inputField" name="college" id="college" placeholder="College Name" />
          <span class="college"></span>
        </div>
        <div class="input-value">
          <input type="password" class="inputField" name="password" id="password" placeholder="Password" />
          <span class="password"></span>
        </div>
        <div class="input-value">
          <input type="password" class="inputField" name="confirmPassword" id="confirmPassword" placeholder="Re-enter Password" />
          <span class="confirmPassword"></span>
        </div>
        <button type="submit" class="submitBtn" name="submitReg">Register</button>
        <p>Have an Account? <span id="link" onclick="login()">Log In</span></p>
      </form>
    </div>
  </section>
  <section id="footer">
    <div class="footLogo">
      <img src="Images/TedxLogoWhite.svg" alt="" />
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
  <a href="Respond/index.php"> Clocjk</a>
  <script src="JavaScript/register.js"></script>
</body>

</html>

<?php
include "Php/process.php"; ?>