<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tableau de bord Admin - Koundoul Shop</title>
    
    <!-- Les mêmes CSS que ta page d’accueil -->
    <link rel="icon" href="/photo/icon_koundoul_Shop.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/products.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
    
    <style>
        /* Style spécifique au dashboard admin */
        .admin-content {
            max-width: 900px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            font-family: 'Poppins', sans-serif;
        }
        .admin-content h1 {
            margin-bottom: 30px;
            text-align: center;
            color: #007BFF;
        }
        .admin-links a {
            display: inline-block;
            margin: 10px 20px;
            padding: 15px 30px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }
        .admin-links a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="header_button_link">
            <div class="logo_name">
                <div><a href="admin.php"><img src="../photo/icon_koundoul_Shop.ico" alt="Logo de Koundoul Shop" class="logo" ></a></div>
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
                    <li><a href="adminAccessoire.php"><i class="fas fa-cogs"></i> Accessoires</a></li>
                    <li><a href="adminChaussure.php"><i class="fas fa-shoe-prints"></i> Chaussures</a></li>
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




    <!-- CONTENU ADMIN -->
    <main class="admin-content">
        <h1>Tableau de bord Admin</h1>
        <div class="admin-links">
            <a href="adminVetement.php">Gérer les Vêtements</a>
            <a href="adminChaussure.php">Gérer les Chaussures</a>
            <a href="adminAccessoire.php">Gérer les Accessoires</a>
        </div>
    </main>

    <!-- Footer -->
    <footer id="footer-container"></footer>

    <!-- Script pour insérer le footer -->
    <script>
        fetch("footer.php")
          .then(response => response.text())
          .then(html => {
            document.getElementById("footer-container").innerHTML = html;
            // Charger le fichier slider.js
            const scriptSlider = document.createElement("script");
            scriptSlider.src = "../javascript/slider.js";
            scriptSlider.defer = true;
            document.body.appendChild(scriptSlider);
          })
          .catch(err => console.error("Erreur chargement header :", err));
      </script>
    <!-- Scripts -->

    <script src="../javascript/header.js" defer></script>
    <script src="../javascript/slider.js" defer></script>
</body>
</html>
