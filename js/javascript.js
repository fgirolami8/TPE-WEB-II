"use strict";

let botonesParaMostrarForm = document.querySelectorAll(".btnshow");
botonesParaMostrarForm.forEach( btn => btn.addEventListener('click', showAddOption))

let inputs = document.querySelectorAll("input");
inputs.forEach(i=>i.setAttribute('required', true));
function showAddOption() {
    this.nextElementSibling.classList.toggle('hideoptionAdd');
}

