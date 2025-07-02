
const scrollTopBtn = document.getElementById("scrollTopBtn");

        // Afficher/Masquer le bouton selon le scroll
        window.onscroll = function () {
            if (document.documentElement.scrollTop > 300) {
                scrollTopBtn.style.display = "flex"; // Affiche le bouton
            } else {
                scrollTopBtn.style.display = "none"; // Cache le bouton
            }
        };

        // Action de retour en haut
        scrollTopBtn.addEventListener("click", function () {
            window.scrollTo({ top: 0, behavior: "smooth" }); // Remonte avec un effet fluide
        });



