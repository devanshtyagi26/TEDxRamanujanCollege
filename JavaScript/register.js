let loginPage = document.querySelector("#login");
let registerPage = document.querySelector("#register");
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
    registerText.style.color = "white";
    loginText.style.color = "black";
  }

  function login() {
    loginPage.style.left = "50px";
    registerPage.style.left = "450px";
    movingBtn.style.left = "0px";
    registerText.style.color = "black";
    loginText.style.color = "white";
  }
} else {
  function register() {
    loginPage.style.left = "-400px";
    registerPage.style.left = "50px";
    movingBtn.style.left = "110px";
    registerText.style.color = "white";
    loginText.style.color = "black";
  }

  function login() {
    loginPage.style.left = "50px";
    registerPage.style.left = "450px";
    movingBtn.style.left = "0px";
    registerText.style.color = "black";
    loginText.style.color = "white";
  }
}

var fName = document.querySelector("#firstName");
var lName = document.querySelector("#lastName");
var email = document.querySelector("#email");
var confirmPassword = document.querySelector("#confirmPassword");

document.addEventListener("DOMContentLoaded", (event) => {
  fName.addEventListener("input", () => {
    var fNameValue = fName.value.trim();
    if (fNameValue == "") {
      setError(fName, "*First Name can't be Blank");
    } else {
      if (fNameValue[0] !== fNameValue[0].toUpperCase()) {
        setError(fName, "*First Letter should be Upppercase");
      } else {
        setSuccess(fName);
      }
    }
  });

  lName.addEventListener("input", () => {
    var lNameValue = lName.value.trim();
    if (lNameValue == "") {
      setError(lName, "*Last Name can't be Blank");
    } else {
      if (lNameValue[0] !== lNameValue[0].toUpperCase()) {
        setError(lName, "*First Letter should be Upppercase");
      } else {
        setSuccess(lName);
      }
    }
  });

  email.addEventListener("input", () => {
    var emailValue = email.value.trim();
    if (emailValue == "") {
      setError(email, "*Email can't be Blank");
    } else {
      let pattern =
        /^(?=.{1,256})(?=.{1,64}@.{1,255}$)[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/;

      if (!emailValue.match(pattern)) {
        setError(email, "*Enter Valid Email");
      } else {
        setSuccess(email);
      }
    }
  });

  phone.addEventListener("input", () => {
    var phoneValue = phone.value.trim();
    if (phoneValue == "") {
      setError(phone, "*Phone Number can't be Blank");
    } else {
      if (isNaN(phoneValue)) {
        setError(phone, "*Enter Numbers Only");
      } else {
        if (phoneValue.length > 10) {
          setError(phone, "*Phone Number Invalid");
        } else {
          let pattern = /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/;

          if (!phoneValue.match(pattern)) {
            setError(phone, "*Phone Number Invalid");
          } else {
            setSuccess(phone);
          }
        }
      }
    }
  });

  college.addEventListener("input", () => {
    var collegeValue = college.value.trim();
    if (collegeValue == "") {
      setError(college, "*College Name can't be Blank");
    } else {
      if (collegeValue[0] !== collegeValue[0].toUpperCase()) {
        setError(college, "*First Letter should be Upppercase");
      } else {
        setSuccess(college);
      }
    }
  });

  password.addEventListener("input", () => {
    var passwordValue = password.value.trim();
    if (passwordValue == "") {
      setError(password, "*Password can't be Blank");
    } else {
      if (passwordValue.length < 8) {
        setError(password, "*Password should have atleast 8 characters");
      } else {
        setSuccess(password);
      }
    }
  });

  confirmPassword.addEventListener("input", () => {
    var confirmPasswordValue = confirmPassword.value.trim();
    if (confirmPasswordValue != password.value.trim()) {
      setError(confirmPassword, "*Password do not match");
    } else {
      setSuccess(confirmPassword);
    }
  });
});

function setError(u, msg) {
  let parentBox = u.parentElement;
  parentBox.className = "input-value error";
  let span = parentBox.querySelector("span");
  span.innerText = msg;
}

function setSuccess(u) {
  let parentBox = u.parentElement;
  parentBox.className = "input-value success";
}
