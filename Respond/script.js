$(document).ready(function () {
  $("#validate_form").parsley();

  $("#validate_form").on("submit", function (event) {
    event.preventDefault();
    if ($("#validate_form").parsley().isValid()) {
      $.ajax({
        url: "Actions/action.php",
        method: "POST",
        data: $(this).serialize(),
        beforeSend: function () {
          $("#submit").attr("disabled", "disabled");
          $("#submit").val("Submitting...");
        },
        success: function (data) {
          $("#validate_form")[0].reset();
          $("#validate_form").parsley().reset();
          $("#submit").attr("disabled", false);
          $("#submit").val("Submit");
          alert(data);

          $(".verifyYourEmail").addClass("reveal");
          setInterval(() => {
            $(".verifyYourEmail").removeClass("reveal");
          }, 3000);
        },
      });
    }
  });
});

let loginPage = document.querySelector("#login");
let registerPage = document.querySelector("#validate_form");
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
