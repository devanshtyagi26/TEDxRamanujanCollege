document.addEventListener("DOMContentLoaded", function () {
  const button = document.querySelector("button");
  const mailAlert = document.querySelector(".mailAlert");
  const closeBtn = document.querySelector(".cross");
  const progress = document.querySelector(".progress");

  $("#form").parsley();

  button.addEventListener("click", function (event) {
    event.preventDefault();
    sendMail();
  });

  function sendMail() {
    if ($("#form").parsley().isValid()) {
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
          console.log("Mail sent successfully:", res);
          clearForm();
          showAlert("Mail sent successfully!");

          closeBtn.addEventListener("click", hideAlert);
        })
        .catch((err) => {
          console.log("Error sending mail:", err);
        });
    } else {
      console.log("Form validation failed");
      showAlert("Check Details");

      closeBtn.addEventListener("click", hideAlert);
    }
  }

  function clearForm() {
    document.querySelector("#name").value = "";
    document.querySelector("#email").value = "";
    document.querySelector("#phone").value = "";
    document.querySelector("#message").value = "";
    document.querySelector(".mailValid").innerHTML = "";
    document.querySelector(".phoneValid").innerHTML = "";
  }

  function showAlert(message) {
    document.querySelector(".alertMsg").innerHTML = message;
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
  }

  function hideAlert() {
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
  }
});

// EC1301EA51185679B0C7FB3DEE55342F16A5

// Email.send({
//   Host: "smtp.elasticemail.com",
//   Username: "tyagidevansh3@gmail.com",
//   Password: "EC1301EA51185679B0C7FB3DEE55342F16A5",
//   To: "them@website.com",
//   From: "you@isp.com",
//   Subject: "This is the subject",
//   Body: "And this is the body",
// }).then((message) => alert(message));
