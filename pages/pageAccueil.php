<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koundoul Shop</title>
    <link rel="icon" href="/photo/icon_koundoul_Shop.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/accueil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">

</head>
<body>
    <!-- Header -->
    <header id="header-container"></header>

    <script>
      fetch("header.php")
        .then(response => response.text())
        .then(html => {
          document.getElementById("header-container").innerHTML = html;
    
          // Charger le fichier header.js
          const scriptHeader = document.createElement("script");
          scriptHeader.src = "../javascript/header.js";
          scriptHeader.defer = true;
          document.body.appendChild(scriptHeader);

        })
        .catch(err => console.error("Erreur chargement header :", err));
    </script>
    <div class="aside_welcome reveal">
        <div class="aside_welcome_text">
            <h4>QUALITÈ & BON PRIX !</h4>
            <h1>Bienvenue Sur Koundoul Shop</h1>
            <p>Découvrez des produits de qualité à des prix abordables, vêtements, accessoires et chaussures.</p>
            <a href="#galery">
                <button>Dècouvrez nos produits</button>
            </a>
        </div>
        <div class="aside_welcome_image"><img src="../photo/icon_koundoul_Shop.ico" alt="logo de Koundoul Shop"></div>
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
                    <a href="pageVetement.html"><img src="../photo/vetements/t-shirt/T-SHIRT.jpg" alt="PIC T-SHIRT" ></a>
                </div>
                <div class="container_galery_div_link">
                    <a href="pageVetement.html">
                       <button>DÈCOUVRIR</button>
                    </a>
                </div>
            </div>
            <div class="container_galery_div reveal">
                <div class="container_galery_div_pic">
                    <a href="pageVetement.html"><img src="../photo/vetements/tenu/ENSEMBLE.jpg" alt="PIC ENSEMBLE" ></a>
                </div>
                <div class="container_galery_div_link">
                    <a href="pageVetement.html">
                        <button>DÈCOUVRIR</button>
                    </a>
                </div>
            </div>
            <div class="container_galery_div reveal">
                <div class="container_galery_div_pic">
                    <a href="pageAccessoires.html"><img src="../photo/accessoires/accessoires-1.jpg" alt="PIC Accessoires" ></a>
                </div>
                <div class="container_galery_div_link">
                    <a href="pageAccessoires.html">
                        <button>DÈCOUVRIR</button>
                    </a>
                </div>
            </div>
            <div class="container_galery_div reveal">
                <div class="container_galery_div_pic">
                    <a href="pageChaussures.html"><img src="../photo/chaussures/chaussures-11.jpg" alt="PIC Chaussures" ></a>
                </div>
                <div class="container_galery_div_link">
                    <a href="pageChaussures.html">
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
    <script src="../javascript/header.js" defer></script>
    <script src="../javascript/slider.js" defer></script>
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
