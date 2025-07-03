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
/* Style spécifique au dashboard admin */
.admin-content {
    max-width: 900px;
    margin: 40px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 12px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
    font-family: 'Poppins', sans-serif;
    transition: all 0.3s ease-in-out;
}

.admin-content h1 {
    margin-bottom: 30px;
    text-align: center;
    color:rgba(0, 0, 0, 0.67);
    font-size: 2rem;
}

/* Conteneur des liens admin */
.admin-links {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
    padding: 10px;
}

.admin-links a {
    display: inline-block;
    padding: 14px 28px;
    background-color:rgb(74, 32, 5);
    color: white;
    text-decoration: none;
    border-radius: 8px;
    font-weight: 600;
    font-size: 1rem;
    transition: background-color 0.3s ease, transform 0.2s ease;
    text-align: center;
    min-width: 180px;
}

.admin-links a:hover {
    background-color:rgb(179, 116, 34);
    transform: translateY(-2px);
}

/* Responsive */
@media (max-width: 768px) {
    .admin-content {
        margin: 20px 15px;
        padding: 15px;
    }

    .admin-content h1 {
        font-size: 1.6rem;
    }

    .admin-links a {
        padding: 12px 20px;
        font-size: 0.95rem;
        min-width: 140px;
    }
}

@media (max-width: 480px) {
    .admin-links {
        flex-direction: column;
        align-items: center;
    }

    .admin-links a {
        width: 100%;
        max-width: 280px;
    }
}

    </style>
</head>
<body>
    <!-- Header -->
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

   <footer>
        <div class="div_footer_section_horizontal reveal">
            <div class="slide active">
                <div class="div_footer_section_horizontal_delivery">
                    <div class="div_footer_section_horizontal_delivery_icon">
                        <i class="fas fa-truck"></i>
                    </div>
                    <h3>Livraison partout à DAKAR</h3>
                    <p>À domicile ou point relais</p>
                </div>
            </div>
            
            <div class="slide">
                <div class="div_footer_section_horizontal_client">
                    <div class="div_footer_section_horizontal_client_icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h3>Service client</h3>
                    <p>Réponse éclair de 10h à 19h <br> du lundi au vendredi</p>
                </div>
            </div>
        </div>
        
        <!-- Indicateurs -->
        <div class="dots">
            <span class="dot active"></span>
            <span class="dot"></span>
        </div>
        
        
        <div class="div_footer_section_link ">
            <div class="div_footer_section_link_aboutUs">
                <a href="pages/pageAccueil.php" id="aboutUs"><img src="../../photo/icon_koundoul_Shop.ico" alt="logo"  class="div_footer_section_link_aboutUs_logo"></a>
                <p>Koundoul Shop est une entreprise <br>baser au Sénegal particulierement à Dakar <br>qui evolue depuis 2020 avec de bonne resultat <br> avec satisfaction du client rapide efficace,<br>  leur boutique preferer c'est ici.</p>
                <div class="div_footer_section_link_aboutUs_reseau">
                    <a href="https://www.facebook.com/profile.php/?id=100089276384539" target="_blank"><i class="fab fa-facebook"></i></a>
                    <a href="https://www.instagram.com/koun_doulshop/" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="https://api.whatsapp.com/send/?phone=221765570261" target="_blank"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
            <div class="div_footer_section_link_commandes">
                <h2>Commandes</h2>
                <p>Faites vos commandes <br>en toute sécurite sur nos résseaux</p>
            </div>
            <div class="div_footer_section_link_contact">
                <h2 id="contact">Contact</h2>
                <p><i class="fas fa-phone"></i> +221 76 557 02 61</p>
                <p><i class="fas fa-envelope"></i> koundoulabdoule@gmail.com</p>
            </div>
            <div class="div_footer_section_link_payment">
                <h2>Paiement</h2>
                <p>Après la réception <br>de la commande</p>
            </div>
        </div>
        <div class="div_footer_sign">
            <p>&copy;Koundoul Shop ¤ <a href="mailto:motseck07@gmail.com">&copy;BY MOT SECK</a> - Tous droits réservés</p>
        </div>
    </footer> 
    <!-- Scripts -->
    <script src="../../javascript/header.js" defer></script>
    <script src="../../javascript/slider.js" defer></script>
</body>
</html>
