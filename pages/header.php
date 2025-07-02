 <div class="header_button_link">
        <div class="logo_name">
            <div><a href="pageAccueil.php"><img src="../photo/icon_koundoul_Shop.ico" alt="Logo de Koundoul Shop" class="logo" ></a></div>
            <h1><a href="pageAccueil.php">KOUNDOUL SHOP</a></h1>
        </div>
        <div>
            <nav>
                <ul class="link_button_position">
                    <li><a href="pageAccueil.php">Accueil</a></li>
                    <li><a href="pageVetement.php"></i> Vêtements</a></li>
                    <li><a href="pageAccessoires.php"></i> Accessoires</a></li>
                    <li><a href="pageChaussures.php"></i> Chaussures</a></li>
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
                    <li><a href="pageAccueil.php"><i class="fas fa-home"></i> Accueil</a></li>
                    <li><a href="pageVetement.php"><i class="fas fa-tshirt"></i> Vêtements</a></li>
                    <li><a href="pageAccessoires.php"><i class="fas fa-cogs"></i> Accessoires</a></li>
                    <li><a href="pageChaussures.php"><i class="fas fa-shoe-prints"></i> Chaussures</a></li>
                    <li><a href="pagePanier.php"><i class="fas fa-shopping-cart"></i> Panier</a></li>
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
