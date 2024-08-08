const nav = document.querySelector("nav");
const sec1 = document.querySelector("#Home");
const options = {
  rootMargin: "-200px 0px 0px 0px",
};

const navColor = new IntersectionObserver(function (entries, navColor) {
  entries.forEach((entry) => {
    if (!entry.isIntersecting) {
      nav.classList.add("stick");
    } else {
      nav.classList.remove("stick");
    }
  });
}, options);

navColor.observe(sec1);

let texts = Array.from(document.querySelectorAll(".whiteLine"));
let i = 1;

setInterval(() => {
  texts.forEach((text) => {
    text.classList.remove("visible");
  });
  texts[i].classList.add("visible");
  i += 1;
  if (i >= texts.length) {
    i = 0;
  }
}, 2000);

let countDownEnds = new Date("Aug 24, 2024 09:00:00").getTime();
let x = setInterval(function () {
  let now = new Date().getTime();
  let distance = countDownEnds - now;

  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  if (days < 10) {
    days = "0" + days;
  }
  if (hours < 10) {
    hours = "0" + hours;
  }
  if (minutes < 10) {
    minutes = "0" + minutes;
  }
  if (seconds < 10) {
    seconds = "0" + seconds;
  }
  document.querySelector('#day').innerHTML = days;
  document.querySelector('#hour').innerHTML = hours;
  document.querySelector('#minute').innerHTML = minutes;
  document.querySelector('#second').innerHTML = seconds;

  if(distance <0){
    clearInterval(x);
    document.querySelector('#day').innerHTML = "00";
    document.querySelector('#hour').innerHTML = "00";
    document.querySelector('#minute').innerHTML = "00";
    document.querySelector('#second').innerHTML = "00";
  }
}, 1000);
