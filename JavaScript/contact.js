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

const button = document.querySelector("button");
const mailAlert = document.querySelector(".mailAlert");
const closeBtn = document.querySelector(".cross");
const progress = document.querySelector(".progress");

function sendMail() {
  if (mailValid == true) {
    if (phoneValid == true) {
      let params = {
        name: document.querySelector("#name").value,
        email: document.querySelector("#email").value,
        phone: document.querySelector("#phone").value,
        message: document.querySelector("#message").value,
      };

      const serviceId = "service_k8u192e";
      const templateId = "template_haov2t5";

      emailjs
        .send(serviceId, templateId, params)
        .then((res) => {
          document.querySelector("#name").value = "";
          document.querySelector("#email").value = "";
          document.querySelector("#phone").value = "";
          document.querySelector("#message").value = "";
          document.querySelector(".mailValid").innerHTML = "";
          document.querySelector(".phoneValid").innerHTML = "";
          console.log(res);
          mailAlert.style.display = "flex";
          progress.style.display = "flex";
          setTimeout(() => {
            mailAlert.classList.add("active");
            progress.classList.add("active");
          }, 10);

          setTimeout(() => {
            mailAlert.classList.remove("active");
          }, 5000);

          setTimeout(() => {
            progress.classList.remove("active");
          }, 5300);
          setTimeout(() => {
            mailAlert.style.display = "none";
          }, 5250);
          setTimeout(() => {
            progress.style.display = "none";
          }, 5320);
          closeBtn.addEventListener("click", () => {
            mailAlert.classList.remove("active");

            setTimeout(() => {
              progress.classList.remove("active");
            }, 300);
            setTimeout(() => {
              progress.style.display = "none";
            }, 310);
            setTimeout(() => {
              mailAlert.style.display = "none";
            }, 320);
          });
        })
        .catch((err) => console.log(err));
    } else {
      document.querySelector(".alertMsg").innerHTML = "Check Phone Number";
      mailAlert.style.display = "flex";
      progress.style.display = "flex";
      setTimeout(() => {
        mailAlert.classList.add("active");
        progress.classList.add("active");
      }, 10);

      setTimeout(() => {
        mailAlert.classList.remove("active");
      }, 5000);

      setTimeout(() => {
        progress.classList.remove("active");
      }, 5300);
      setTimeout(() => {
        mailAlert.style.display = "none";
      }, 5250);
      setTimeout(() => {
        progress.style.display = "none";
      }, 5320);
      closeBtn.addEventListener("click", () => {
        mailAlert.classList.remove("active");

        setTimeout(() => {
          progress.classList.remove("active");
        }, 300);
        setTimeout(() => {
          progress.style.display = "none";
        }, 310);
        setTimeout(() => {
          mailAlert.style.display = "none";
        }, 320);
      });
    }
  } else {
    document.querySelector(".alertMsg").innerHTML = "Check Email Address";
    mailAlert.style.display = "flex";
    progress.style.display = "flex";
    setTimeout(() => {
      mailAlert.classList.add("active");
      progress.classList.add("active");
    }, 10);

    setTimeout(() => {
      mailAlert.classList.remove("active");
    }, 5000);

    setTimeout(() => {
      progress.classList.remove("active");
    }, 5300);
    setTimeout(() => {
      mailAlert.style.display = "none";
    }, 5250);
    setTimeout(() => {
      progress.style.display = "none";
    }, 5320);
    closeBtn.addEventListener("click", () => {
      mailAlert.classList.remove("active");

      setTimeout(() => {
        progress.classList.remove("active");
      }, 300);
      setTimeout(() => {
        progress.style.display = "none";
      }, 310);
      setTimeout(() => {
        mailAlert.style.display = "none";
      }, 320);
    });
  }
}


// EC1301EA51185679B0C7FB3DEE55342F16A5


Email.send({
  Host : "smtp.elasticemail.com",
  Username : "tyagidevansh3@gmail.com",
  Password : "EC1301EA51185679B0C7FB3DEE55342F16A5",
  To : 'them@website.com',
  From : "you@isp.com",
  Subject : "This is the subject",
  Body : "And this is the body"
}).then(
message => alert(message)
);