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

// document.addEventListener("DOMContentLoaded", () => {
//   const containers = document.querySelectorAll(".container");

//   containers.forEach((container) => {
//     const box = container.querySelector(".box");
//     const glass = container.querySelector(".glass");
//     const handle = container.querySelector("#handle");

//     const toggleActiveClass = () => {
//       const isActive =
//         box.classList.contains("active") ||
//         glass.classList.contains("active") ||
//         handle.classList.contains("active");

//       box.classList.toggle("active", !isActive);
//       glass.classList.toggle("active", !isActive);
//       handle.classList.toggle("active", !isActive);
//     };

//     box.addEventListener("click", toggleActiveClass);
//   });
// });

// document.addEventListener("DOMContentLoaded", () => {
//     const containers = document.querySelectorAll(".container");

//     const removeActiveClass = () => {
//       containers.forEach((container) => {
//         const box = container.querySelector(".box");
//         const glass = container.querySelector(".glass");
//         const handle = container.querySelector("#handle");

//         box.classList.remove("active");
//         glass.classList.remove("active");
//         handle.classList.remove("active");
//       });
//     };

//     containers.forEach((container) => {
//       const box = container.querySelector(".box");
//       const glass = container.querySelector(".glass");
//       const handle = container.querySelector("#handle");

//       const toggleActiveClass = () => {
//         const isActive =
//           box.classList.contains("active") ||
//           glass.classList.contains("active") ||
//           handle.classList.contains("active");

//         if (isActive) {
//           removeActiveClass();
//         } else {
//           removeActiveClass();
//           box.classList.add("active");
//           glass.classList.add("active");
//           handle.classList.add("active");
//         }
//       };

//       box.addEventListener("click", toggleActiveClass);
//     });
//   });

document.addEventListener("DOMContentLoaded", () => {
  const containers = document.querySelectorAll(".container");

  const removeActiveClass = () => {
    containers.forEach((container) => {
      const box = container.querySelector(".box");
      const glass = container.querySelector(".glass");
      const handle = container.querySelector("#handle");

      box.classList.remove("active");
      glass.classList.remove("active");
      handle.classList.remove("active");
    });
  };

  const toggleActiveClass = (event) => {
    const box = event.currentTarget;
    const container = box.closest(".container");
    const glass = container.querySelector(".glass");
    const handle = container.querySelector("#handle");

    const isActive =
      box.classList.contains("active") ||
      glass.classList.contains("active") ||
      handle.classList.contains("active");

    if (isActive) {
      removeActiveClass();
    } else {
      removeActiveClass();
      box.classList.add("active");
      glass.classList.add("active");
      handle.classList.add("active");
    }
  };

  const setupEventListeners = () => {
    if (window.matchMedia("(max-width: 768px)").matches) {
      containers.forEach((container) => {
        const box = container.querySelector(".box");
        const glass = container.querySelector(".glass");
        const handle = container.querySelector("#handle");

        box.addEventListener("click", toggleActiveClass);
      });
    } else {
      // Remove event listeners if not on mobile
      containers.forEach((container) => {
        const box = container.querySelector(".box");
        const glass = container.querySelector(".glass");
        const handle = container.querySelector("#handle");

        box.removeEventListener("click", toggleActiveClass);
        glass.removeEventListener("click", toggleActiveClass);
        handle.removeEventListener("click", toggleActiveClass);
      });
    }
  };

  // Initial setup
  setupEventListeners();

  // Re-setup on window resize
  window.addEventListener("resize", setupEventListeners);
});