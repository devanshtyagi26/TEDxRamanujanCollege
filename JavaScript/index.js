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