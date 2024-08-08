let loginPage = document.querySelector("#login");
let registerPage = document.querySelector("#update_form");
let movingBtn = document.querySelector("#btnColor");
let loginText = document.querySelector("#logText");
let registerText = document.querySelector("#regText");

function isMobile() {
  return window.matchMedia("(max-width: 58.75rem)").matches;
}

if (isMobile()) {
  function register() {
    loginPage.style.left = "-400px";
    registerPage.style.left = "40px";
    movingBtn.style.left = "110px";
  }

  function login() {
    loginPage.style.left = "50px";
    registerPage.style.left = "450px";
    movingBtn.style.left = "0px";
  }
} else {
  function register() {
    loginPage.style.left = "-400px";
    registerPage.style.left = "50px";
    movingBtn.style.left = "110px";
  }

  function login() {
    loginPage.style.left = "50px";
    registerPage.style.left = "450px";
    movingBtn.style.left = "0px";
  }
}
