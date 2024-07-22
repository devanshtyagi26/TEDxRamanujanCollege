// document.addEventListener("DOMContentLoaded", () => {
//   const boxes = document.querySelectorAll(".box");
//   const glass = document.querySelectorAll(".glass");
//   const ul = document.querySelectorAll("#handle");
//   boxes.forEach((box) => {
//     box.addEventListener("click", () => {
//       box.classList.toggle("active");
//     });
//   });
//   glass.forEach((box) => {
//     box.addEventListener("click", () => {
//       box.classList.toggle("active");
//     });
//   });
//   ul.forEach((box) => {
//     box.addEventListener("click", () => {
//       box.classList.toggle("active");
//     });
//   });
// });

document.addEventListener("DOMContentLoaded", () => {
  const containers = document.querySelectorAll(".container");

  containers.forEach((container) => {
    const box = container.querySelector(".box");
    const glass = container.querySelector(".glass");
    const handle = container.querySelector("#handle");

    const toggleActiveClass = () => {
      const isActive =
        box.classList.contains("active") ||
        glass.classList.contains("active") ||
        handle.classList.contains("active");

      box.classList.toggle("active", !isActive);
      glass.classList.toggle("active", !isActive);
      handle.classList.toggle("active", !isActive);
    };

    box.addEventListener("click", toggleActiveClass);
  });
});
