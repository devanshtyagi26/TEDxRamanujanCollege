const canvas = document.getElementById("canvas1");
const ctx = canvas.getContext("2d");
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

let particlesArray;

let pointer = {
  x: null,
  y: null,
  radius: (canvas.height / 100) * (canvas.width / 100),
};

window.addEventListener("mousemove", function (e) {
  pointer.x = e.x;
  pointer.y = e.y;
});

//create particle
class Particle {
  constructor(x, y, directionX, directionY, size, color) {
    this.x = x;
    this.y = y;
    this.directionX = directionX;
    this.directionY = directionY;
    this.size = size;
    this.color = color;
  }
  // method to draw individual particle
  draw() {
    ctx.beginPath();
    ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2, false);
    ctx.fillStyle = "#ffbd3e63";
    ctx.fill();
  }
  // check particle position, check pointer position, move particle, draw particle
  update() {
    //check if particle is still within the canvas
    if (this.x > canvas.width || this.x < 0) {
      this.directionX = -this.directionX;
    }
    if (this.y > canvas.height || this.y < 0) {
      this.directionY = -this.directionY;
    }
    // check collision direction - poiner position/ particle position
    let dx = pointer.x - this.x;
    let dy = pointer.y - this.y;
    let distance = Math.sqrt(dx * dx + dy * dy);
    if (distance < pointer.radius + this.size) {
      if (pointer.x < this.x && this.x < canvas.width - this.size * 10) {
        this.x += 10;
      }
      if (pointer.x > this.x && this.x > this.size * 10) {
        this.x -= 10;
      }
      if (pointer.y > this.y && this.y < canvas.height - this.y * 10) {
        this.y += 10;
      }
      if (pointer.y < this.y && this.y > this.y * 10) {
        this.y -= 10;
      }
    }
    //move particles
    this.x += this.directionX;
    this.y += this.directionY;
    //draw a particle
    this.draw();
  }
}

// create particle array
function init() {
  particlesArray = [];
  let numberOfParticles = (canvas.height * canvas.width) / 7000;
  for (let i = 0; i < numberOfParticles * 2; i++) {
    let size = Math.random() * 2 + 1;
    let x = Math.random() * (innerWidth - size * 2 - size * 2) + size * 2;
    let y = Math.random() * (innerHeight - size * 2 - size * 2) + size * 2;
    let directionX = Math.random() * 5 - 2.5;
    let directionY = Math.random() * 5 - 2.5;
    let color = "#ffbd3e63";

    particlesArray.push(
      new Particle(x, y, directionX, directionY, size, color)
    );
  }
}

//animate loop
function animate() {
  requestAnimationFrame(animate);
  ctx.clearRect(0, 0, innerWidth, innerHeight);

  for (let i = 0; i < particlesArray.length; i++) {
    particlesArray[i].update();
  }
  connect();
}
let red = 255;
let green = 187;
let blue = 62;
//check if particles are close enough to draw a line between them
function connect() {
  let opacityValue = 1;
  function defaultColor() {
    red = 255;
    green = 187;
    blue = 62;
  }

  function byapti() {
    red = 171;
    green = 133;
    blue = 94;
  }

  function yash() {
    red = 253;
    green = 55;
    blue = 64;
  }

  function devansh() {
    red = 7;
    green = 187;
    blue = 237;
  }
  function mallika() {
    red = 255;
    green = 255;
    blue = 255;
  }
  function misti() {
    red = 162;
    green = 155;
    blue = 137;
  }
  function adya() {
    red = 200;
    green = 101;
    blue = 119;
  }
  document.querySelector(".byapti").addEventListener("mouseover", byapti);
  document.querySelector(".byapti").addEventListener("mouseout", defaultColor);

  document.querySelector(".yash").addEventListener("mouseover", yash);
  document.querySelector(".yash").addEventListener("mouseout", defaultColor);

  document.querySelector(".mallika").addEventListener("mouseover", mallika);
  document.querySelector(".mallika").addEventListener("mouseout", defaultColor);

  document.querySelector(".devansh").addEventListener("mouseover", devansh);
  document.querySelector(".devansh").addEventListener("mouseout", defaultColor);

  document.querySelector(".misti").addEventListener("mouseover", misti);
  document.querySelector(".misti").addEventListener("mouseout", defaultColor);

  document.querySelector(".adya").addEventListener("mouseover", adya);
  document.querySelector(".adya").addEventListener("mouseout", defaultColor);

  for (let a = 0; a < particlesArray.length; a++) {
    for (let b = a; b < particlesArray.length; b++) {
      let distance =
        (particlesArray[a].x - particlesArray[b].x) *
          (particlesArray[a].x - particlesArray[b].x) +
        (particlesArray[a].y - particlesArray[b].y) *
          (particlesArray[a].y - particlesArray[b].y);
      if (distance < (canvas.width / 7) * (canvas.height / 7)) {
        opacityValue = 1 - distance / 15000;
        ctx.strokeStyle = `rgba(${red}, ${green}, ${blue}, ${opacityValue})`;
        ctx.lineWidth = 1;
        ctx.beginPath();
        ctx.moveTo(particlesArray[a].x, particlesArray[a].y);
        ctx.lineTo(particlesArray[b].x, particlesArray[b].y);
        ctx.stroke();
      }
    }
  }
}

window.addEventListener("resize", function () {
  canvas.width = innerWidth;
  canvas.height = innerHeight;
  pointer.radius = (canvas.width / 70) * (canvas.height / 70);
  init();
});

window.addEventListener("mouseout", function () {
  pointer.x = undefined;
  pointer.y = undefined;
});

// function getRandomRGB() {
//   red = 255;
//   green = 255;
//   blue = 255;
//   console.log("working");
// }

// document.querySelector(".logo").addEventListener("click", getRandomRGB);

init();
animate();
