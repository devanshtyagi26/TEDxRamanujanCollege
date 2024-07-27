let mailValid = false;
function validateEmail() {
  let form = document.querySelector("#form");
  let email = document.querySelector("#email").value;
  let text = document.querySelector(".mailValid");

  let pattern =
    /^(?=.{1,256})(?=.{1,64}@.{1,255}$)[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/;

  if (email.match(pattern)) {
    form.classList.add("valid");
    form.classList.remove("invalid");
    text.innerHTML = "Your Email Address is Valid.";
    text.style.color = "lime";
    mailValid = true;
  } else {
    form.classList.remove("valid");
    form.classList.add("invalid");
    text.innerHTML = "Please enter valid Email Address.";
    text.style.color = "red";
    mailValid = false;
  }
}

let phoneValid = false;

function validatePhoneNumber() {
  let form = document.querySelector("#form");
  let phone = document.querySelector("#phone").value;
  let text = document.querySelector(".phoneValid");

  // Regex pattern for Indian phone number validation
  let pattern = /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/;

  if (phone.match(pattern)) {
    form.classList.add("valid");
    form.classList.remove("invalid");
    text.innerHTML = "Your Phone Number is Valid.";
    text.style.color = "lime";
    phoneValid = true;
  } else {
    form.classList.remove("valid");
    form.classList.add("invalid");
    text.innerHTML = "Please enter a valid Phone Number.";
    text.style.color = "red";
    phoneValid = false;
  }
}

document.addEventListener("DOMContentLoaded", (event) => {
  document
    .querySelector("#phone")
    .addEventListener("input", validatePhoneNumber);
  document.querySelector("#email").addEventListener("input", validateEmail);
});

function sendMail() {
  if (mailValid == true) {
    if (phoneValid == true) {
      let params = {
        name: document.querySelector("#name").value,
        email: document.querySelector("#email").value,
        message: document.querySelector("#message").value,
      };

      const serviceId = "service_k8u192e";
      const templateId = "template_haov2t5";

      emailjs
        .send(serviceId, templateId, params)
        .then((res) => {
          document.querySelector("#name").value = "";
          document.querySelector("#email").value = "";
          document.querySelector("#message").value = "";
          console.log(res);
          alert("Email Sent Successfully.");
        })
        .catch((err) => console.log(err));
    } else {
      alert("Please Check your Phone Number");
    }
  } else {
    alert("Please check your email.");
  }
}
