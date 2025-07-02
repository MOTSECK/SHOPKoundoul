
  // Sélection des éléments
const menuIcon = document.querySelector(".menu-icon");
const mobileMenu = document.getElementById("mobile-menu");
const closeBtn = document.querySelector(".close-btn");
const menuLinks = document.querySelectorAll(".mobile-menu a");

// Fonction pour ouvrir le menu
function openMenu() {
    mobileMenu.classList.add("active");
    document.body.classList.add("no-scroll"); // Empêche le scroll du body
}

// Fonction pour fermer le menu
function closeMenu() {
    mobileMenu.classList.remove("active");
    document.body.classList.remove("no-scroll"); // Rétablit le scroll du body
}

// Événements d'ouverture et de fermeture
menuIcon.addEventListener("click", openMenu);
closeBtn.addEventListener("click", closeMenu);
// Fermer le menu quand on clique sur un lien
menuLinks.forEach(link => {
    link.addEventListener("click", closeMenu);
});



// fonction pour la recherche de produit 
document.addEventListener("DOMContentLoaded", () => {
    const searchInput = document.getElementById("searchInput");
    const searchResults = document.getElementById("searchResults");
    const searchContainer = document.getElementById("searchContainer"); // Conteneur du tiroir
    const openSearchButton = document.getElementById("openSearchButton"); // Bouton pour ouvrir la recherche
    let lastResults = ""; // Stocker les derniers résultats de recherche

    // Gérer la recherche en temps réel
    searchInput.addEventListener("input", async () => {
        const query = searchInput.value.trim();

        if (query.length === 0) {
            searchResults.innerHTML = "";
            searchResults.style.display = "none";
            lastResults = ""; // Réinitialiser les résultats
            return;
        }

        try {
            const response = await fetch(`http://localhost:5000/search?query=${query}`);
            const products = await response.json();

            if (products.length === 0) {
                searchResults.innerHTML = "<p style='padding:10px;'>Aucun produit trouvé</p>";
                searchResults.style.display = "block";
                lastResults = searchResults.innerHTML;
                return;
            }

            lastResults = products.map(product => `
                <div class="result-item">
                    <a href="product.html?image=${product.image}&nom=${product.nom}&prix=${product.prix}">
                        <img src="${product.image}" alt="${product.nom}">
                        <span>${product.nom} - ${product.prix} FCFA</span>
                    </a>
                </div>
            `).join("");

            searchResults.innerHTML = lastResults;
            searchResults.style.display = "block";
        } catch (error) {
            console.error("Erreur lors de la recherche :", error);
        }
    });




});


    document.getElementById("search-toggle").addEventListener("click", openSearchDrawer);

    function openSearchDrawer() {
        document.getElementById("searchDrawer").classList.add("active");
        document.getElementById("searchOverlay").classList.add("active");
        document.body.classList.add("no-scroll");
        
    }
    
    function closeSearchDrawer() {
        document.getElementById("searchDrawer").classList.remove("active");
        document.getElementById("searchOverlay").classList.remove("active");
        document.body.classList.remove("no-scroll");
        
    }
    // ouvrir le tiroir pour mobile 
    document.getElementById("search-toggle-mobile").addEventListener("click", openSearchDrawerMobile);

    function openSearchDrawerMobile() {
        document.getElementById("searchDrawerMobile").classList.add("active");
        document.body.classList.add("no-scroll");
        
    }
    
    function closeSearchDrawerMobile() {
        document.getElementById("searchDrawerMobile").classList.remove("active");
        document.body.classList.remove("no-scroll");
        
    }
