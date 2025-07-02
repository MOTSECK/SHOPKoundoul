document.addEventListener("DOMContentLoaded", function () { 
    const panierContainer = document.querySelector(".panier-container");
    let panier = JSON.parse(localStorage.getItem("panier")) || [];

    function regrouperProduits() {
        let produitsRegroupés = {};

        panier.forEach(produit => {
            let key = produit.nom; // Clé unique basée sur le nom du produit

            if (produitsRegroupés[key]) {
                produitsRegroupés[key].quantite += 1;
            } else {
                produitsRegroupés[key] = { ...produit, quantite: 1 };
            }
        });

        return Object.values(produitsRegroupés);
    }

    function afficherPanier() {
        panierContainer.innerHTML = ""; // Nettoyer l'affichage avant de recharger les éléments
        let panierRegroupé = regrouperProduits();

        if (panierRegroupé.length === 0) {
            panierContainer.innerHTML = `
                <div class="empty-cart">
                    <i class="fas fa-shopping-cart"></i>
                    <p>Votre panier est vide</p>
                </div>
            `;
            return;
        }
        
        panierRegroupé.forEach((produit, index) => {
            let itemHTML = `
                <div class="panier-item">
                    <img src="${produit.image}" alt="${produit.nom}">
                    <div class="panier-details">
                        <p class="panier-title">${produit.nom}</p>
                        <p class="panier-price">Prix: ${produit.prix} FCFA</p>
                        <div class="quantity-control">
                            <button class="decrease-btn" data-index="${index}">-</button>
                            <span>${produit.quantite}</span>
                            <button class="increase-btn" data-index="${index}">+</button>
                        </div>
                        <button class="remove-btn" data-index="${index}">Supprimer</button>
                        <button class="whatsapp-btn" data-index="${index}">Commander sur WhatsApp</button>
                    </div>
                </div>
            `;
            panierContainer.innerHTML += itemHTML;
        });

        // Écouteurs d'événements pour modifier la quantité
        document.querySelectorAll(".increase-btn").forEach(button => {
            button.addEventListener("click", function () {
                let index = this.getAttribute("data-index");
                modifierQuantite(index, 1);
            });
        });

        document.querySelectorAll(".decrease-btn").forEach(button => {
            button.addEventListener("click", function () {
                let index = this.getAttribute("data-index");
                modifierQuantite(index, -1);
            });
        });

        // Écouteurs d'événements pour supprimer
        document.querySelectorAll(".remove-btn").forEach(button => {
            button.addEventListener("click", function () {
                let index = this.getAttribute("data-index");
                supprimerDuPanier(index);
            });
        });

        // Écouteurs d'événements pour commander via WhatsApp
        document.querySelectorAll(".whatsapp-btn").forEach(button => {
            button.addEventListener("click", function () {
                let index = this.getAttribute("data-index");
                commanderSurWhatsApp(index);
            });
        });
    }

    function modifierQuantite(index, changement) {
        let panierRegroupé = regrouperProduits();
        let produit = panierRegroupé[index];

        if (produit.quantite + changement <= 0) {
            supprimerDuPanier(index);
            return;
        }

        produit.quantite += changement;
        panier = [];

        // Recréer le panier avec la nouvelle quantité
        panierRegroupé.forEach(p => {
            for (let i = 0; i < p.quantite; i++) {
                panier.push({ image: p.image, nom: p.nom, prix: p.prix });
            }
        });

        localStorage.setItem("panier", JSON.stringify(panier));
        afficherPanier();
    }

    function supprimerDuPanier(index) {
        let panierRegroupé = regrouperProduits();
        let produit = panierRegroupé[index];

        panier = panier.filter(p => p.nom !== produit.nom);
        localStorage.setItem("panier", JSON.stringify(panier));
        afficherPanier();
    }

    function commanderSurWhatsApp(index) {
        let panierRegroupé = regrouperProduits();
        let produit = panierRegroupé[index];

        let message = `Bonjour, je souhaite commander cet article:\nNom: ${produit.nom}\nPrix: ${produit.prix} FCFA\nQuantité: ${produit.quantite}\nLien: http://localhost/Koundoul%20shop%20web/pages/product.html?image=${produit.image}&nom=${encodeURIComponent(produit.nom)}&prix=${produit.prix}`;
        let url = `https://wa.me/221765570261?text=${encodeURIComponent(message)}`;
        window.open(url, "_blank");
    }

    afficherPanier();
});
