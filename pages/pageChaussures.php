<?php
$conn = new mysqli("localhost", "root", "", "koundoulshop");
if ($conn->connect_error) {
    die("Erreur : " . $conn->connect_error);
}

$sql = "SELECT * FROM produits WHERE categorie = 'chaussure' ORDER BY id DESC";
$result = $conn->query($sql);

$produits = [];
while ($row = $result->fetch_assoc()) {
    $produits[] = $row;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Chaussure | Koundoul Shop</title>
    <link rel="stylesheet" href="../css/global.css" />
    <link rel="stylesheet" href="../css/header.css" />
    <link rel="stylesheet" href="../css/footer.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <style>
        /* (Garde le CSS tel quel, ou adapte si besoin) */
        /* === Grille des produits === */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 40px 24px;
            padding: 0;
            margin: 0 auto 50px auto;
            max-width: 1200px;
        }
        /* Carte produit */
        .product-card {
            background-color: #fff;
            border-radius: 14px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            overflow: hidden;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            opacity: 1;
            transform: translateY(0);
            text-align: center;
        }
        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.18);
        }
        .product-card img {
            width: 100%;
            height: 280px;
            object-fit: cover;
            transition: transform 0.5s ease;
            border-bottom: 1px solid #eee;
            border-radius: 14px 14px 0 0;
            display: block;
        }
        .product-card:hover img {
            transform: scale(1.05);
        }
        .header-section h1 {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 32px;
            color: #FC0100;
            margin-bottom: 20px;
            text-align: center;
        }
        .product-card h3 {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 20px;
            color: #222;
            margin: 16px 10px 6px 10px;
            text-transform: capitalize;
        }
        .product-card p {
            font-family: 'Cambria', serif;
            font-weight: bold;
            font-size: 18px;
            color: #FC0100;
            margin: 0 10px 20px 10px;
        }
        .NbrProduit-disponible {
            display: flex;
            justify-content: center;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            margin-top: 32px;
            font-size: 18px;
            color: #444;
        }
        .NbrProduit-disponible p b {
            color: #FC0100;
        }
        .filters {
            display: flex;
            justify-content: space-between;
            max-width: 800px;
            margin: 30px auto 40px;
            padding: 0 10px;
        }
        .filter-group {
            display: flex;
            align-items: center;
            background: #fff;
            padding: 10px 18px;
            border-radius: 10px;
            box-shadow: 2px 2px 12px rgba(0,0,0,0.08);
            transition: box-shadow 0.3s ease;
            cursor: pointer;
            width: 48%;
        }
        .filter-group:hover {
            box-shadow: 4px 4px 18px rgba(0,0,0,0.15);
        }
        .filter-group select {
            border: none;
            background: transparent;
            font-size: 16px;
            outline: none;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            color: #282828;
            width: 100%;
        }
        .filter-group i {
            margin-left: 10px;
            color: #FC0100;
        }
        .filter-group select:focus {
            border-bottom: 2px solid #FC0100;
        }
        @media (max-width: 992px) {
            .product-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 32px 20px;
                max-width: 700px;
                padding: 0 15px;
            }
            .product-card img {
                height: 280px;
            }
        }
        @media (max-width: 600px) {
            .product-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 24px 20px;
                max-width: 420px;
                padding: 0 15px;
            }
            .product-card img {
                height: 220px;
                border-radius: 14px 14px 0 0;
            }
            .product-card h3, 
            .product-card p {
                margin: 12px 10px;
            }
            .filters {
                max-width: 420px;
                margin: 20px auto 30px;
                padding: 0 5px;
                display: flex;
                justify-content: space-between;
                gap: 10px;
            }
            .filter-group {
                width: 48%;
                justify-content: center;
            }
        }
        #scrollTopBtn {
            position: fixed;
            bottom: 50px;
            right: 20px;
            width: 50px;
            height: 50px;
            background-color: #FC0100;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            display: none;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.15);
            transition: background-color 0.3s ease, transform 0.3s ease;
            z-index: 10000;
        }
        #scrollTopBtn:hover {
            background-color: #b63737;
            transform: scale(1.1);
        }
        .drawer-overlay {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: none;
            z-index: 9998;
        }
        .product-drawer {
            position: fixed;
            top: 0; right: -100%;
            width: 100%; max-width: 800px;
            height: 100%;
            background: white;
            z-index: 9999;
            transition: right 0.4s ease;
            overflow-y: auto;
        }
        .product-drawer.open { right: 0; }
        .drawer-content {
            display: flex;
            flex-direction: row;
            padding: 20px;
            gap: 20px;
        }
        .drawer-image img {
            width: 300px;
            border-radius: 10px;
        }
        .drawer-details { flex: 1; }
        .drawer-details h2 { font-size: 24px; margin-bottom: 10px; }
        .drawer-details p { font-size: 20px; color: #FC0100; }
        .drawer-buttons { margin-top: 20px; display: flex; gap: 15px; }
        .btn-whatsapp, .btn-panier {
            background-color: #FC0100;
            color: white;
            padding: 12px 18px;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
        }
        .close-drawer {
            background: none;
            border: none;
            font-size: 20px;
            padding: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header id="header-container"></header>

    <script>
      fetch("header.php")
        .then(response => response.text())
        .then(html => {
          document.getElementById("header-container").innerHTML = html;
    
          //Charger le fichier header.js
          const scriptHeader = document.createElement("script");
          scriptHeader.src = "../javascript/header.js";
          scriptHeader.defer = true;
          document.body.appendChild(scriptHeader);

        })
        .catch(err => console.error("Erreur chargement header :", err));
    </script>
    <!-- Section Produits Vêtements -->
    <section class="product-section">
        <div class="header-section">
            <h1>Nos Chaussures</h1>
        </div>

        <!-- Filtres -->
        <div class="filters">
            <div class="filter-group">
                <select id="filter-price">
                    <option value="default">Trier par prix</option>
                    <option value="asc">Croissant</option>
                    <option value="desc">Décroissant</option>
                </select>
                <i class="fas fa-sort-amount-down"></i>
            </div>
            <div class="filter-group">
                <select id="filter-category">
                    <option value="all">Tous</option>
                    <option value="T-shirt">T-shirt</option>
                    <option value="Pantalon">Pantalon</option>
                    <option value="Autres">Autres</option>
                </select>
                <i class="fas fa-filter"></i>
            </div>
        </div>
    </section>
    <div class="product-grid">
        <?php foreach ($produits as $produit): ?>
            <div class="product-card" onclick="openDrawer(this)"
                data-id="<?= $produit['id'] ?>"
                data-nom="<?= htmlspecialchars($produit['nom']) ?>"
                data-prix="<?= number_format($produit['prix'], 0, '', ' ') ?>"
                data-image="../<?= htmlspecialchars($produit['image']) ?>">
                <img src="../<?= htmlspecialchars($produit['image']) ?>" alt="<?= htmlspecialchars($produit['nom']) ?>">
                <h3><?= htmlspecialchars($produit['nom']) ?></h3>
                <p><?= number_format($produit['prix'], 0, '', ' ') ?> FCFA</p>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Drawer -->
    <div class="drawer-overlay" id="drawer-overlay"></div>
    <div class="product-drawer" id="product-drawer">
        <button class="close-drawer" onclick="closeDrawer()">&larr; Retour</button>
        <div class="drawer-content">
            <div class="drawer-image">
                <img id="drawer-image" src="" alt="Produit">
            </div>
            <div class="drawer-details">
                <h2 id="drawer-title"></h2>
                <p id="drawer-price"></p>
                <div class="drawer-buttons">
                    <a id="whatsapp-btn" target="_blank" class="btn-whatsapp">Commander sur WhatsApp</a>
                    <button class="btn-panier">Ajouter au panier</button>
                </div>
            </div>
        </div>
    </div>

    <script>
    function openDrawer(element) {
        const nom = element.dataset.nom;
        const prix = element.dataset.prix;
        const image = element.dataset.image;

        document.getElementById("drawer-title").textContent = nom;
        document.getElementById("drawer-price").textContent = prix + " FCFA";
        document.getElementById("drawer-image").src = image;
        document.getElementById("whatsapp-btn").href = `https://wa.me/221770000000?text=Je suis intéressé par ${encodeURIComponent(nom)} à ${prix} FCFA.`;

        document.getElementById("drawer-overlay").style.display = "block";
        document.getElementById("product-drawer").classList.add("open");
        document.body.style.overflow = 'hidden';
    }

    function closeDrawer() {
        document.getElementById("drawer-overlay").style.display = "none";
        document.getElementById("product-drawer").classList.remove("open");
        document.body.style.overflow = '';
    }

    document.getElementById("drawer-overlay").addEventListener("click", closeDrawer);
    </script>
    <!-- Scroll Top Button -->
    <button id="scrollTopBtn"><i class="fas fa-chevron-up"></i></button>
    <!-- footer -->
    <footer id="footer-container"></footer>

    <script>
      fetch("footer.php")
        .then(response => response.text())
        .then(html => {
          document.getElementById("footer-container").innerHTML = html;
    
        //  slider dans le footer
            let slides = document.querySelectorAll(".slide");
            let dots = document.querySelectorAll(".dot");
            let currentIndex = 0;

            function showSlide(index) {
                slides.forEach((slide, i) => {
                    slide.classList.remove("active");
                    dots[i].classList.remove("active");
                });

                slides[index].classList.add("active");
                dots[index].classList.add("active");
            }

            function nextSlide() {
                currentIndex = (currentIndex + 1) % slides.length;
                showSlide(currentIndex);
            }

            setInterval(nextSlide, 2000); // Change toutes les 2 secondes

        })
        .catch(err => console.error("Erreur chargement footer :", err));
    </script>

    <!-- Scripts -->
    <script src="../javascript/productsVetements.js" defer></script>
    <script src="../javascript/main.js" defer></script>

    <script>
        // Filtrage prix et catégorie (adapté de ton script)
        document.addEventListener("DOMContentLoaded", function () {
            const priceFilter = document.getElementById("filter-price");
            const categoryFilter = document.getElementById("filter-category");
            const productList = document.getElementById("product-list");

            function filterProducts() {
                const products = document.querySelectorAll(".product-card");
                const category = categoryFilter.value;
                const priceOrder = priceFilter.value;

                let sorted = Array.from(products);

                if (priceOrder === "asc") {
                    sorted.sort((a, b) => parseFloat(a.dataset.price) - parseFloat(b.dataset.price));
                } else if (priceOrder === "desc") {
                    sorted.sort((a, b) => parseFloat(b.dataset.price) - parseFloat(a.dataset.price));
                }

                sorted.forEach(product => productList.appendChild(product));

                products.forEach(product => {
                    const type = product.dataset.type;
                    if (category === "all" || type === category) {
                        product.style.display = "block";
                    } else {
                        product.style.display = "none";
                    }
                });
            }

            priceFilter.addEventListener("change", filterProducts);
            categoryFilter.addEventListener("change", filterProducts);
        });
    </script>
</body>
</html>
