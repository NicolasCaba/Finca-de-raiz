"use strict";
document.addEventListener("DOMContentLoaded", function () {
    eventListeners();
});

function eventListeners() {
    const MOBILE_MENU = document.querySelector(".mobile-menu");

    MOBILE_MENU.addEventListener("click", navegacionResponsive);
}

function navegacionResponsive() {}
