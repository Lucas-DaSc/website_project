// script.js

// Charger le header
fetch('header.html')
    .then(response => response.text())
    .then(data => {
        document.getElementById('header-placeholder').innerHTML = data;

        // MAINTENANT on initialise le burger menu
        initBurgerMenu();
    });
// Charger le footer
fetch('footer.html')
    .then(response => response.text())
    .then(data => {
        document.getElementById('footer').innerHTML = data;
    });

// On attend que le DOM soit chargé
document.addEventListener("DOMContentLoaded", function () {
    // Charger le header
    fetch('header.html') // ou le chemin vers ton fichier header
        .then(response => response.text())
        .then(data => {
            document.getElementById('header-placeholder').innerHTML = data;

            // MAINTENANT initialiser le menu burger
            initBurgerMenu();
        });
});

// Fonction pour initialiser le burger menu
function initBurgerMenu() {
    const burger = document.getElementById("burger");
    const navbar = document.getElementById("navbar");
    const navLinks = navbar.querySelectorAll("a");

    // Toggle menu
    burger.addEventListener("click", function (e) {
        e.stopPropagation();
        burger.classList.toggle("active");
        navbar.classList.toggle("show");
        document.body.style.overflow = navbar.classList.contains("show") ? "hidden" : "";
    });

    // Fermer au clic sur un lien
    navLinks.forEach(link => {
        link.addEventListener("click", function () {
            burger.classList.remove("active");
            navbar.classList.remove("show");
            document.body.style.overflow = "";
        });
    });

    // Fermer au clic extérieur
    document.addEventListener("click", function (e) {
        if (!burger.contains(e.target) && !navbar.contains(e.target)) {
            burger.classList.remove("active");
            navbar.classList.remove("show");
            document.body.style.overflow = "";
        }
    });
}