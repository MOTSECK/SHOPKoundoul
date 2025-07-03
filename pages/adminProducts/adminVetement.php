<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Admin Vêtements</title>
    <link rel="icon" href="../../photo/icon_koundoul_Shop.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../css/global.css">
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="../../css/footer.css">
    <link rel="stylesheet" href="../../css/products.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 0; }
        h1, h2 { text-align: center; color: #282828; }
        form, .message { max-width: 500px; margin: auto; padding: 20px; background: #fff; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        input, select, button, textarea { width: 100%; margin: 8px 0; padding: 12px; border: 1px solid #ccc; border-radius: 4px; font-size: 16px; }
        button { background: #FC0100; color: white; font-weight: bold; cursor: pointer; border: none; }
        button:hover { background: #d00000; }
        #admin-product-list { display: flex; flex-wrap: wrap; justify-content: center; padding: 20px; }
        .product-item { background: #fff; border-radius: 8px; width: 200px; margin: 10px; padding: 15px; text-align: center; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .product-item img { width: 100%; height: 150px; object-fit: cover; border-radius: 8px; }
        .product-item p { margin: 10px 0; font-weight: bold; }
        .product-item button { background: #FC0100; color: #fff; padding: 8px; border: none; border-radius: 4px; width: 100%; }
        .product-item button:hover { background: #d00000; }
        #search-bar { display: block; margin: 20px auto; padding: 10px; width: 60%; max-width: 400px; border-radius: 4px; border: 1px solid #ccc; }
    </style>
</head>
<body>
    <header>
            <div class="header_button_link">
        <div class="logo_name">
            <div><a href="admin.php"><img src="../../photo/icon_koundoul_Shop.ico" alt="Logo de Koundoul Shop" class="logo" ></a></div>
            <h1><a href="admin.php">KOUNDOUL SHOP</a></h1>
        </div>
        <div>
            <nav>
                <ul class="link_button_position">
                    <li><a href="admin.php">Accueil</a></li>
                    <li><a href="adminVetement.php"></i> Vêtements</a></li>
                    <li><a href="adminAccessoire.php"></i> Accessoires</a></li>
                    <li><a href="adminChaussure.php"></i> Chaussures</a></li>
                    <li><a href="#contact"></i> Contact</a></li>
                </ul>
           </nav>            
        </div>
        <div>
            <ul class="link_button_position">
                <li>
                    <div class="search-container">
                        <i class="fas fa-search search-icon" id="search-toggle"></i>
                        <!-- Tiroir de recherche -->
                        <div id="searchDrawer" class="search-drawer">
                            <div class="search-header">
                                <i class="fas fa-search search-icon"></i>
                                <input type="text" id="searchInput" placeholder="Rechercher un produit...">
                                <i class="fas fa-times close-search" onclick="closeSearchDrawer()"></i>
                            </div>
                            <div class="search-content">
                                <div class="search-results" id="searchResults"></div>
                            </div>
                            <div class="search-footer">
                                <p>🔥 Trouvez votre style avec Koundoul Shop ! 🔥</p>
                            </div>
                        </div>
                        <!-- Overlay pour assombrir l’écran -->
                        <div id="searchOverlay" class="search-overlay" onclick="closeSearchDrawer()"></div>
                    </div>
                </li>
                <li><a href="pagePanier.html"><i class="fas fa-shopping-cart"></i></a></li>
            </ul>
        </div>
        <div class="mobile-link">
            <!-- Barre de recherche pour mobile -->
            <div class="search-container-mobile">
                <i class="fas fa-search search-icon" id="search-toggle-mobile" onclick="openSearchDrawerMobile()"></i>
                
                <!-- Tiroir de recherche -->
                <div id="searchDrawerMobile" class="search-drawer-mobile">
                    <div class="search-header">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" id="searchInputMobile" placeholder="Rechercher un produit...">
                        <i class="fas fa-times close-search" onclick="closeSearchDrawerMobile()"></i>
                    </div>
                    <div class="search-content">
                        <div class="search-results" id="searchResultsMobile"></div>
                    </div>
                    <div class="search-footer">
                        <p>🔥 Trouvez votre style avec Koundoul Shop ! 🔥</p>
                    </div>
                </div>
                <script>
                    // Gestion du tiroir de recherche mobile
                    function openSearchDrawerMobile() {
                        document.getElementById("searchDrawerMobile").classList.add("active");
                        document.getElementById("searchOverlayMobile").classList.add("active");
                        document.body.classList.add("no-scroll");
                    }
                    
                    function closeSearchDrawerMobile() {
                        document.getElementById("searchDrawerMobile").classList.remove("active");
                        document.getElementById("searchOverlayMobile").classList.remove("active");
                        document.body.classList.remove("no-scroll");
                    }
                    
                    // Recherche dynamique
                    document.getElementById("searchInputMobile").addEventListener("input", async function () {
                        const query = this.value.trim();
                        const searchResults = document.getElementById("searchResultsMobile");
                        
                        if (query.length === 0) {
                            searchResults.innerHTML = "";
                            return;
                        }
                        
                        try {
                            const response = await fetch(`http://localhost:5000/search?query=${query}`);
                            const products = await response.json();
                            
                            if (products.length === 0) {
                                searchResults.innerHTML = "<p style='padding:10px;'>Aucun produit trouvé</p>";
                                return;
                            }
                            
                            searchResults.innerHTML = products.map(product => `
                                <div class="result-item" ">
                                    <a href="product.html?image=${product.image}&nom=${product.nom}&prix=${product.prix}">
                                        <img src="${product.image}" alt="${product.nom}">
                                        <span>${product.nom} - ${product.prix} FCFA</span>
                                    </a>
                                </div>
                            `).join("");
                        } catch (error) {
                            console.error("Erreur lors de la recherche :", error);
                        }
                    });
                </script>
            </div>
            <!-- Icône du menu mobile (trois barres) -->
            <div class="menu-icon" onclick="openMenu()">
                <i class="fas fa-bars"></i>
            </div>
        </div>
        <!-- Menu mobile caché au départ -->
        <div id="mobile-menu" class="mobile-menu">
            <div class="close-btn" onclick="closeMenu()">&times;</div>
            <div>
                <ul class="mobile-menu_link">
                    <li><a href="admin.php"><i class="fas fa-home"></i> Accueil</a></li>
                    <li><a href="adminVetement.php"><i class="fas fa-tshirt"></i> Vêtements</a></li>
                    <li><a href="adminAccessoires.php"><i class="fas fa-cogs"></i> Accessoires</a></li>
                    <li><a href="adminChaussures.php"><i class="fas fa-shoe-prints"></i> Chaussures</a></li>
                    <li><a href="adminPanier.php"><i class="fas fa-shopping-cart"></i> Panier</a></li>
                </ul>
            </div>
            <div>
                <ul>
                    <li><a href="#contact"><i class="fas fa-address-book"></i> Contact</a></li>
                    <li><a href="#aboutUs"><i class="fas fa-info-circle"></i> À propos</a></li>
                </ul>
            </div>
        </div>
    </div>
   
    </header>

    <h1>Gestion des Vêtements</h1>
    <h2>Ajouter un Vêtement</h2>
    <form id="product-form" enctype="multipart/form-data" method="post" action="ajouter_vetement.php">
        <input type="file" name="image" accept="image/*" required>
        <input type="text" name="nom" placeholder="Nom du produit" required>
        <input type="number" step="0.01" name="prix" placeholder="Prix (en FCFA)" required min="0">
        <input type="hidden" name="categorie" value="vetement">
        <select name="type" required>
            <option value="" disabled selected>-- Sélectionner un type --</option>
            <option value="T-shirt">T-shirt</option>
            <option value="Pantalon">Pantalon</option>
            <option value="Autres">Autres</option>
        </select>
        <button type="submit">Ajouter</button>
    </form>

    <input type="text" id="search-bar" placeholder="Rechercher un produit...">

    <h2>Produits</h2>
    <div id="admin-product-list"></div>
    <p class="message" id="no-products-message" style="display:none;">Aucun produit trouvé.</p>

    <script>
        const form = document.getElementById("product-form");
        const productList = document.getElementById("admin-product-list");
        const noProductsMessage = document.getElementById("no-products-message");
        const searchBar = document.getElementById("search-bar");

        form.addEventListener("submit", function(e) {
            e.preventDefault();
            const formData = new FormData(form);

            fetch("ajouter_vetement.php", {
                method: "POST",
                body: formData
            }).then(res => res.text())
              .then(msg => {
                  alert(msg);
                  form.reset();
                  fetchProducts();
              }).catch(() => alert("Erreur lors de l'ajout du produit."));
        });

        function fetchProducts() {
            fetch("recuperer_vetement.php")
                .then(res => res.json())
                .then(data => {
                    productList.innerHTML = "";
                    if (!data || data.length === 0) {
                        noProductsMessage.style.display = "block";
                        return;
                    }
                    noProductsMessage.style.display = "none";
                    data.forEach(product => {
                        const div = document.createElement("div");
                        div.className = "product-item";
                        div.innerHTML = `
                            <img src="../../${product.image}" alt="Produit ${product.nom}-CHEZ KOUNDOULSHOP">
                            <p>${product.nom} - ${product.prix} FCFA</p>
                            <button onclick="deleteProduct(${product.id})">Supprimer</button>
                        `;
                        productList.appendChild(div);
                    });
                })
                .catch(() => {
                    noProductsMessage.style.display = "block";
                    productList.innerHTML = "";
                });
        }

        function deleteProduct(id) {
            if (confirm("Supprimer ce produit ?")) {
                fetch("supprimer_produits.php?id=" + id)
                    .then(res => res.text())
                    .then(msg => {
                        alert(msg);
                        fetchProducts();
                    }).catch(() => alert("Erreur lors de la suppression."));
            }
        }

        searchBar.addEventListener("input", () => {
            const term = searchBar.value.toLowerCase();
            document.querySelectorAll(".product-item").forEach(item => {
                const name = item.querySelector("p").textContent.toLowerCase();
                item.style.display = name.includes(term) ? "block" : "none";
            });
        });

        fetchProducts();
    </script>
    <script src="../../javascript/header.js" defer></script>
</body>
</html>
