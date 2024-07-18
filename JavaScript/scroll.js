const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      entry.target.classList.add("show");
    } else {
      entry.target.classList.remove("show");
    }
  });
});

const hiddenElements = document.querySelectorAll(".block");
hiddenElements.forEach((el) => observer.observe(el));

const hiddenElements2 = document.querySelectorAll(".displayContent");
hiddenElements2.forEach((el) => observer.observe(el));

const hiddenElements3 = document.querySelectorAll(".speakerImage");
hiddenElements3.forEach((el) => observer.observe(el));