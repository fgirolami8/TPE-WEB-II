"use strict";

document.querySelector("#btnshow").addEventListener('click', showAddOption);

function showAddOption() {
    document.querySelector("#showing").classList.toggle('showoptionAdd');
    document.querySelector("#showing").classList.toggle('hideoptionAdd');
}


