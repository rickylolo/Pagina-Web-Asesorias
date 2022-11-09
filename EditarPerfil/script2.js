// console.log("prueba");
"use strict";
const modal = document.querySelector(".modal");
const overlay = document.querySelector(".overlay");
const btnCancelarModal = document.querySelector(".btn--cancelar");
const btnLimpiarModal = document.querySelector(".btn--limpiar");
const btnConfirmarModal = document.querySelector(".btn--confirmar");
const btnCloseModal = document.querySelector(".close-modal");
const btnsOpenModal = document.querySelectorAll(".show-modal");
const botonAgenda = document.querySelector(".btn--agendar");
const agendado = document.querySelector(".btn--form");

//Inputs Interfaz Agregar materia 
const InputMateria = document.querySelector(".Input--Materia");
const InputDescripcion = document.querySelector(".Input--Descripcion");
const InputLugar = document.querySelector(".Input--Lugar");
const InputCosto = document.querySelector(".Input--Costo");

//Funcion para abrir la interfaz
const openModal = function () {
  modal.classList.remove("hidden");
};

//Funcion para limpiar los Inputs de la interfaz
const LimpiarInputs = function () {
  InputMateria.value = " ";
  InputDescripcion.value = " ";
  InputLugar.value = " ";
  InputCosto.value = " ";
}

//Funcion para cerrar la interfaz
const closeModal = function () {
  modal.classList.add("hidden");
  LimpiarInputs ();
};

//For para leer los botones del calendario
// .length sirve para leer la cantidad de botones que hay
for (let i = 0; i < btnsOpenModal.length; i++){
  btnsOpenModal[i].addEventListener("click", openModal);
}

//Boton para Limpiar Inputs
btnLimpiarModal.addEventListener("click", LimpiarInputs);

//Boton para Cerrar Interfaz 
btnCloseModal.addEventListener("click", closeModal);

//Boton para Cancelar Interfaz 
btnCancelarModal.addEventListener("click", closeModal);

//Para que funcione la tecla "ESC" (para salir)
document.addEventListener("keydown", function (e) {
  if (e.key === "Escape" && !modal.classList.contains("hidden")) {
    closeModal();
  }
});


