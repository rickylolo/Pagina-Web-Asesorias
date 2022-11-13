// console.log("prueba");
"use strict";
const btnNavEl = document.querySelector(".btn-mobile-nav");
const headerEl = document.querySelector(".header");

btnNavEl.addEventListener("click", function () {
  headerEl.classList.toggle("nav-open");
});


let vista_preliminar = (event)=>{
  let leer_img = new FileReader();
  let id_img = document.getElementById('img-foto');

  leer_img.onload =() =>{
    if(leer_img.readyState==2){
      id_img.src = leer_img.result
    }
  }

  leer_img.readAsDataURL(event.target.files[0])
}