const handleOnMouseMove = (e) => {
  const { currentTarget: target } = e;

  const rect = target.getBoundingClientRect(),
    x = e.clientX - rect.left,
    y = e.clientY - rect.top;
  target.style.setProperty("--mouse-x", `${x}px`);
  target.style.setProperty("--mouse-y", `${y}px`);
};

for (card of document.querySelectorAll(".block")) {
  card.onmousemove = (e) => handleOnMouseMove(e);
}

const panel = document.querySelector("#SpeakerDesc");
const Akash = document.querySelector("#Akash");
const Anita = document.querySelector("#Anita");
const Sajju = document.querySelector("#Sajju");
const Ananda = document.querySelector("#Ananda");
const Soumyadeep = document.querySelector("#Soumyadeep");
const Gaurav = document.querySelector("#Gaurav");

Akash.addEventListener("click", () => {
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });
  panel.style.display = "flex";
  panel.querySelector(
    ".speakerImage"
  ).innerHTML = `<img src="Images/SpeakerPhotos/AkashTandon.png" alt="" />`;
  panel.querySelector("#name").innerHTML = "Mr. Akash";
  panel.querySelector("#surname").innerHTML = "Tandon";
  panel.querySelector("#title").innerHTML = "Social Worker";
  panel.querySelector("#desc").innerHTML =
    "Empowering through education, Akash Tandon is the co-founder of Pehchaan, a street school uplifting children in slum areas. In 9 years, he has impacted over 2000 underprivileged children. With 10+ years of diverse marketing experience in B2B and B2C sectors, Akash is a true changemaker.";
});

Anita.addEventListener("click", () => {
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });
  panel.style.display = "flex";
  panel.querySelector("#insta").style.display = "none";
  panel.querySelector("#fb").style.display = "none";
  panel
    .querySelector("#linkedIn")
    .querySelector(
      "a"
    ).href = `https://www.linkedin.com/in/anita-anand-4949513?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app`;
  panel.querySelector(
    ".speakerImage"
  ).innerHTML = `<img src="Images/SpeakerPhotos/AnitaAnand.png" alt="" />`;
  panel.querySelector("#name").innerHTML = "Ms. Anita";
  panel.querySelector("#surname").innerHTML = "Anand";
  panel.querySelector("#title").innerHTML = "Psychologist/Therapist";
  panel.querySelector(
    "#desc"
  ).innerHTML = `Anita Anand is a seasoned clinical therapist, trainer, editor, and artist with over 40 years of experience. With a master's degree in psychology from Ohio University, she specialises in hypnotherapy and crystal healing. Since 2002, Anita has addressed issues like anxiety, depression, and addictions, positively impacting hundreds of lives. Her unique approach blends talk therapy, hypnosis, and writing exercises. She has consulted for UNAIDS, UNDP, UN Women (India), and other organisations, and was featured in the documentary "House of Secrets: The Burari Deaths.”`;
});

Sajju.addEventListener("click", () => {
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });
  panel.style.display = "flex";
  panel.querySelector("#insta").style.display = "none";
  panel.querySelector("#fb").style.display = "none";
  panel
    .querySelector("#linkedIn")
    .querySelector(
      "a"
    ).href = `https://www.linkedin.com/in/sajjujain?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app`;
  panel.querySelector(
    ".speakerImage"
  ).innerHTML = `<img src="Images/SpeakerPhotos/SajjuJain.png" alt="" />`;
  panel.querySelector("#name").innerHTML = "Mr. Sajju";
  panel.querySelector("#surname").innerHTML = "Jain";
  panel.querySelector("#title").innerHTML = "Entrepreneur";
  panel.querySelector(
    "#desc"
  ).innerHTML = `Supporting startups in their early stages, Sajju Jain is a social entrepreneur who has elevated numerous ventures from garages to a global level, impacting over 150 million people worldwide. He mentors startups in India, the USA, the UK, Singapore, Kenya, and Australia. With 25 years of coaching experience, Sajju has been globally recognized and awarded for his expertise. He aims to empower 10,000 startups over the next decade, transforming the world for the greater good.`;
});

Ananda.addEventListener("click", () => {
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });
  panel.style.display = "flex";
  panel.querySelector(
    ".speakerImage"
  ).innerHTML = `<img src="Images/SpeakerPhotos/AnandaHota.png" alt="" />`;
  panel.querySelector("#name").innerHTML = "Dr. Ananda";
  panel.querySelector("#surname").innerHTML = "Hota";
  panel.querySelector("#title").innerHTML = "Citizen Centred Scientist";
  panel.querySelector(
    "#desc"
  ).innerHTML = `Ananda Hota, with over a decade of experience in science and astronomy, is the director of RAD@home, India's first citizen-science research platform in astronomy. He is also a UGC Assistant Professor at UM-DAE CEBS, a member of the International Astronomical Union, and an Associate Member and Education and Public Outreach coordinator at SKA India Consortium. Ananda serves as a scientist at CBS.ac.in and is a member of the Consultative Group of the Principal Scientific Adviser to the Government of India. He leads the Nationwide Inter-University Interdisciplinary Scientists for Society (NIISS) collaboration, involving over 50 scientists in India.`;
});

Soumyadeep.addEventListener("click", () => {
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });
  panel.style.display = "flex";
  panel.querySelector("#linkedIn").style.display = "none";
  panel.querySelector("#fb").style.display = "none";
  panel
    .querySelector("#insta")
    .querySelector(
      "a"
    ).href = `https://www.instagram.com/soumyadeepmukherjeephotos?igsh=MWV2MXk5Y28xbHMzNQ==`;
  panel.querySelector(
    ".speakerImage"
  ).innerHTML = `<img src="Images/SpeakerPhotos/SoumyadeepMukherjee.png" alt="" />`;
  panel.querySelector("#name").innerHTML = "Mr. Soumyadeep";
  panel.querySelector("#surname").innerHTML = "Mukherjee";
  panel.querySelector("#title").innerHTML = "Astrophotographer";
  panel.querySelector(
    "#desc"
  ).innerHTML = `Soumyadeep Mukherjee, a distinguished astro photographer, is currently pursuing his PhD in cognitive linguistics at IIT Kanpur. Notably, he is the first Indian to win the Astronomy Photographer of the Year competition and has over 140 publications in international books and magazines. His work has been featured on renowned platforms such as National Geographic and NASA, earning him multiple APOD awards for his exceptional contributions to the field of astrophotography. He is also a part of a group of astrophotography enthusiasts based in West Bengal known as Astronomers Bangla.`;
});

Gaurav.addEventListener("click", () => {
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });
  panel.style.display = "flex";
  panel.querySelector(
    ".speakerImage"
  ).innerHTML = `<img src="Images/SpeakerPhotos/GauravBarhadiya.png" alt="" />`;
  panel.querySelector("#name").innerHTML = "Mr. Gaurav";
  panel.querySelector("#surname").innerHTML = "Barhadiya";
  panel.querySelector("#title").innerHTML = "Astrophotographer";
  panel.querySelector(
    "#desc"
  ).innerHTML = `Gaurav Barhadiya , assistant professor at Delhi University, is an environmental enthusiast who has contributed vastly in the areas of environmental conservation including wildlife preservation, ecology, climate change, etc. He has various international publications in various international journals and has given a number of lectures and talks on several environmental issues including single use plastic, snakes of India, effects of loosing touch with Nature, etc. He continues to enlighten students and empower the less explored studies of the environment.`;
});
