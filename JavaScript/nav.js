const show = document.querySelector(".open-sidebar");

show.addEventListener("click", () => {
  document.querySelector("#overlay").style.display = "block";
  console.log("working");
});

const hides1 = document.querySelector("#overlay");
const hides2 = document.querySelector(".close-sidebar");

function disappear() {
  document.querySelector("#overlay").style.display = "none";
  console.log("working");
}

hides1.addEventListener("click", disappear);
hides2.addEventListener("click", disappear);