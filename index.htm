<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koundoul Shop</title>
    <link rel="icon" href="photo/icon_koundoul_Shop.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/accueil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">

</head>
<body>
    <!-- En-tête  -->
    <header >
        <div class="header_button_link">
        <div class="logo_name">
            <div><a href="pages/pageAccueil.html"><img src="photo/icon_koundoul_Shop.ico" alt="Logo de Koundoul Shop" class="logo" ></a></div>
            <h1><a href="pages/pageAccueil.html">KOUNDOUL SHOP</a></h1>
        </div>
        <div>
            <nav>
                <ul class="link_button_position">
                    <li><a href="pages/pageAccueil.html">Accueil</a></li>
                    <li><a href="pages/pageVetement.html"></i> Vêtements</a></li>
                    <li><a href="pages/pageAccessoires.html"></i> Accessoires</a></li>
                    <li><a href="pages/pageChaussures.html"></i> Chaussures</a></li>
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
                <li><a href="pages/pagePanier.html"><i class="fas fa-shopping-cart"></i></a></li>
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
                    <li><a href="pages/pageAccueil.html"><i class="fas fa-home"></i> Accueil</a></li>
                    <li><a href="pages/pageVetement.html"><i class="fas fa-tshirt"></i> Vêtements</a></li>
                    <li><a href="pages/pageAccessoires.html"><i class="fas fa-cogs"></i> Accessoires</a></li>
                    <li><a href="pages/pageChaussures.html"><i class="fas fa-shoe-prints"></i> Chaussures</a></li>
                    <li><a href="pages/pagePanier.html"><i class="fas fa-shopping-cart"></i> Panier</a></li>
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
    </div>
    </header>

    <div class="aside_welcome reveal">
        <div class="aside_welcome_text">
            <h4>QUALITÈ & BON PRIX !</h4>
            <h1>Bienvenue Sur Koundoul Shop</h1>
            <p>Découvrez des produits de qualité à des prix abordables, vêtements, accessoires et chaussures.</p>
            <a href="#galery">
                <button>Dècouvrez nos produits</button>
            </a>
        </div>
        <div class="aside_welcome_image"><img src="photo/icon_koundoul_Shop.ico" alt="logo de Koundoul Shop"></div>
    </div>
    <div class="bande_rouge reveal">
        <div class="bande_slide active">
            <div class="bande_item">
                <i class="fas fa-fire"></i>  
                <p>TENDANCE</p>
            </div>
        </div>
        <div class="bande_slide">
            <div class="bande_item">
                <i class="fas fa-tshirt"></i>  
                <p>MODE</p>
            </div>
        </div>
        <div class="bande_slide">
            <div class="bande_item">
                <i class="fas fa-star"></i> 
                <p>QUALITÉ</p>
            </div>
        </div>
            <!-- Indicateurs -->
        <div class="bande_rouge_dots">
            <span class="bande_rouge_dot"></span>
            <span class="bande_rouge_dot"></span>
            <span class="bande_rouge_dot"></span>
        </div>
    </div>
    <div class="container_black reveal" id="galery">
        <div class="container_galery reveal">
            <div class="container_galery_div reveal">
                <div class="container_galery_div_pic">
                    <a href="pages/pageVetement.html"><img src="photo/vetements/t-shirt/T-SHIRT.jpg" alt="PIC T-SHIRT" ></a>
                </div>
                <div class="container_galery_div_link">
                    <a href="pages/pageVetement.html">
                       <button>DÈCOUVRIR</button>
                    </a>
                </div>
            </div>
            <div class="container_galery_div reveal">
                <div class="container_galery_div_pic">
                    <a href="pages/pageVetement.html"><img src="photo/vetements/tenu/ENSEMBLE.jpg" alt="PIC ENSEMBLE" ></a>
                </div>
                <div class="container_galery_div_link">
                    <a href="pages/pageVetement.html">
                        <button>DÈCOUVRIR</button>
                    </a>
                </div>
            </div>
            <div class="container_galery_div reveal">
                <div class="container_galery_div_pic">
                    <a href="pages/pageAccessoires.html"><img src="photo/accessoires/accessoires-1.jpg" alt="PIC Accessoires" ></a>
                </div>
                <div class="container_galery_div_link">
                    <a href="pages/pageAccessoires.html">
                        <button>DÈCOUVRIR</button>
                    </a>
                </div>
            </div>
            <div class="container_galery_div reveal">
                <div class="container_galery_div_pic">
                    <a href="pages/pageChaussures.html"><img src="photo/chaussures/chaussures-11.jpg" alt="PIC Chaussures" ></a>
                </div>
                <div class="container_galery_div_link">
                    <a href="pages/pageChaussures.html">
                        <button>DÈCOUVRIR</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Section Témoignages -->
    <section class="testimonial-section reveal">
        <div class="testimonial-container">
            <h2 class="testimonial-title">Témoignages de clients</h2>

            <div class="testimonial-cards reveal">
                <div class="testimonial-card">
                    <div class="testimonial-client-name">MBODJ FALL</div>
                    <div class="testimonial-text">
                        <i class="fas fa-quote-left"></i>
                        Excellent ! flexible, simple, rapide et fiable.
                        <i class="fas fa-quote-right"></i>
                    </div>
                </div>
                <div class="testimonial-card reveal">
                    <div class="testimonial-client-name">CHEIKH KANDJI</div>
                    <div class="testimonial-text">
                        <i class="fas fa-quote-left"></i>
                        Service client impeccable, je recommande vivement !
                        <i class="fas fa-quote-right"></i>
                    </div>
                </div>
                <div class="testimonial-card reveal">
                    <div class="testimonial-client-name">ASTOU POUYE</div>
                    <div class="testimonial-text">
                        <i class="fas fa-quote-left"></i>
                        Très satisfait de mes achats, la qualité est au rendez-vous.
                        <i class="fas fa-quote-right"></i>
                    </div>
                </div>
            </div>

            <!-- Formulaire de témoignage -->
            <div class="testimonial-form reveal" id="testimonial-form">
                <h3>Ajouter un témoignage</h3>
                <form id="testimonial-form-content">
                    <input type="text" name="nom" id="nom" placeholder="Votre Nom" required>
                    <input type="text" name="prenom" id="prenom" placeholder="Votre Prénom" required>
                    <input type="email" name="email" id="email" placeholder="Votre Email" required>
                    <textarea name="testimonial" id="testimonial" rows="4" placeholder="Écrivez votre témoignage ici..." required></textarea>
                    <input type="submit" value="Envoyer" id="submit-testimonial" />
                </form>
            </div>

            <!-- Message de remerciement caché au départ -->
            <div id="thank-you-message" style="display: none;">
                <h3>Merci pour votre avis !</h3>
                <p>Votre témoignage a bien été envoyé. Nous apprécions votre contribution.</p>
            </div>
        </div>
        <script defer>
            document.getElementById('testimonial-form-content').addEventListener('submit', async function (event) {
            event.preventDefault();

            const nom = document.getElementById('nom').value;
            const prenom = document.getElementById('prenom').value;
            const email = document.getElementById('email').value;
            const testimonial = document.getElementById('testimonial').value;

            const response = await fetch('http://localhost:5000/api/testimonials/add', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ nom, prenom, email, testimonial })
            });

            const result = await response.json();
            
            if (response.ok) {
                document.getElementById('testimonial-form').style.display = 'none';
                document.getElementById('thank-you-message').style.display = 'block';
            } else {
                alert(result.error);
            }
        });
        </script>
    </section>
    <script defer>
            // slider du barre rouge 
            document.addEventListener("DOMContentLoaded", function () {
                const slides = document.querySelectorAll('.bande_slide');
                const dots = document.querySelectorAll('.bande_rouge_dot');
                let currentIndex = 0;

                function changeSlide() {
                    // Supprime la classe "active" de l'élément actuel
                    slides[currentIndex].classList.remove('active');
                    dots[currentIndex].classList.remove('active');

                    // Passe à l'élément suivant
                    currentIndex = (currentIndex + 1) % slides.length;

                    // Ajoute la classe "active" au nouvel élément
                    slides[currentIndex].classList.add('active');
                    dots[currentIndex].classList.add('active');
                }

                // Change d'élément toutes les 2 secondes
                setInterval(changeSlide, 3500);
            });
    </script>
    <footer>
        <div class="div_footer_section_horizontal reveal">
            <div class="slide active">
                <div class="div_footer_section_horizontal_delivery">
                    <div class="div_footer_section_horizontal_delivery_icon">
                        <i class="fas fa-truck"></i>
                    </div>
                    <h3>Livraison partout à DAKAR</h3>
                    <p>À domicile et en point relais</p>
                </div>
            </div>
            
            <div class="slide reveal">
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
        <div class="dots reveal">
            <span class="dot active"></span>
            <span class="dot"></span>
        </div>
        
        
        <div class="div_footer_section_link reveal">
            <div class="div_footer_section_link_aboutUs">
                <a href="pages/pageAccueil.html" id="aboutUs"><img src="../photo/icon_koundoul_Shop.ico" alt="logo"  class="div_footer_section_link_aboutUs_logo"></a>
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
    <script src="javascript/header.js" defer></script>
    <script src="javascript/slider.js" defer></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
        const reveals = document.querySelectorAll('.reveal');

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target); // Ne l'observe plus → pas de disparition
            }
            });
        });
        reveals.forEach(el => {
        observer.observe(el);
        });
        });
    </script>
</body>
</html>
