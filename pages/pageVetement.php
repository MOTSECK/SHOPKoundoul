<?php
$conn = new mysqli("localhost", "root", "", "koundoulshop");
if ($conn->connect_error) {
    die("Erreur : " . $conn->connect_error);
}

$sql = "SELECT * FROM produits WHERE categorie = 'vetement' ORDER BY id DESC";
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
    <title>Vêtements | Koundoul Shop</title>
    <link rel="icon" href="../photo/icon_koundoul_Shop.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/accueil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
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
            <h1>Nos Vêtements</h1>
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

        <!-- Liste des produits -->
        <div class="product-grid" id="product-list">
            <?php foreach ($produits as $produit): ?>
                <div class="product-card" data-type="<?= htmlspecialchars($produit['type']) ?>" data-price="<?= $produit['prix'] ?>" onclick="location.href='products.php?id=<?= $produit['id'] ?>'">
                    <img src="../<?= htmlspecialchars($produit['image']) ?>" alt="<?= htmlspecialchars($produit['nom']) ?>" />
                    <h3><?= htmlspecialchars($produit['nom']) ?></h3>
                    <p><?= number_format($produit['prix'], 0, '', ' ') ?> FCFA</p>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="NbrProduit-disponible">
            <p id="nombre-de-produit">Nombre total : <?= count($produits) ?> produits</p>
        </div>
    </section>

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
