import "./bootstrap";

import AOS from "aos";
import "aos/dist/aos.css"; // You can also use <link> for styles
// ..
AOS.init();

const hamburger = document.querySelector("#hamburger");
const garis1 = document.getElementById("garis1");
const garis2 = document.getElementById("garis2");
const garis3 = document.getElementById("garis3");
const navMenu = document.getElementById("nav-menu");
hamburger.onclick = function () {
  garis1.classList.toggle("ham-active-1");
  garis2.classList.toggle("translate-x-40");
  garis3.classList.toggle("ham-active-2");
  navMenu.classList.toggle("hidden");
};

//DROPDOWN
const kategori = document.getElementById("kategori");
const dropitem = document.getElementById("dropitem");
const row = document.getElementById("row");
kategori.addEventListener("click", () => {
  row.classList.toggle("rotate-180");
  dropitem.classList.toggle("hidden");
  kategori.classList.toggle("ring-1");
});
// END DROPDOWN
