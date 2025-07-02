<?php
$conn = new mysqli("localhost", "root", "", "koundoulshop");
if ($conn->connect_error) {
    die("Erreur : " . $conn->connect_error);
}

$sql = "SELECT * FROM produits WHERE categorie = 'accessoire' ORDER BY id DESC";
$result = $conn->query($sql);

$produits = [];
while ($row = $result->fetch_assoc()) {
    $produits[] = $row;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accessoires | Koundoul Shop</title>
    <link rel="icon" href="/photo/icon_koundoul_Shop.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<body>
    <style>
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

/* Hover effet */
.product-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.18);
}

/* Image produit */
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

/* Titre section centré */
.header-section h1 {
    font-family: 'Poppins', sans-serif;
    font-weight: 700;
    font-size: 32px;
    color: #FC0100; /* rouge */
    margin-bottom: 20px;
    text-align: center;
}

/* Nom du produit */
.product-card h3 {
    font-family: 'Poppins', sans-serif;
    font-weight: 700;
    font-size: 20px;
    color: #222;
    margin: 16px 10px 6px 10px;
    text-transform: capitalize;
}

/* Prix du produit */
.product-card p {
    font-family: 'Cambria', serif;
    font-weight: bold;
    font-size: 18px;
    color: #FC0100;
    margin: 0 10px 20px 10px;
}

/* Nombre total produits */
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

/* Filtres */
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

/* Focus sur select */
.filter-group select:focus {
    border-bottom: 2px solid #FC0100;
}

/* Responsive - Tablette */
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

/* Responsive - Mobile */
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

/* Bouton Scroll Top */
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
    <!-- Header -->
    <header id="header-container"></header>
    <script>
    fetch("header.php")
        .then(response => response.text())
        .then(data => {
            document.getElementById("header-container").innerHTML = data;
        });
    </script>

    <!-- Section Produits Accessoires -->
    <section class="product-section">
        <div class="header-section">
            <h1>Nos Accessoires</h1>
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
                    <option value="Sac à dos">Sac à dos</option>
                    <option value="Sacoche">Sacoche</option>
                    <option value="Autres">Autres</option>
                </select>
                <i class="fas fa-filter"></i>
            </div>
        </div>

        <!-- Liste des produits -->
        <div class="product-grid" id="product-list">
            <?php foreach ($produits as $produit): ?>
                <div class="product-card" data-type="<?= htmlspecialchars($produit['type']) ?>" data-price="<?= $produit['prix'] ?>">
                    <a href="product.php?id=<?= $produit['id'] ?>">
                        <img src="../<?= htmlspecialchars($produit['image']) ?>" alt="<?= htmlspecialchars($produit['nom']) ?>">
                    </a>
                    <h3>
                        <a href="product.php?id=<?= $produit['id'] ?>">
                            <?= htmlspecialchars($produit['nom']) ?>
                        </a>
                    </h3>
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

    <!-- Footer -->
    <footer id="footer-container"></footer>
    <script>
    fetch("footer.php")
        .then(response => response.text())
        .then(data => {
            document.getElementById("footer-container").innerHTML = data;
        });
    </script>

    <!-- Scripts -->
    <script src="../javascript/header.js" defer></script>
    <script src="../javascript/productsAccessoires.js" defer></script>
    <script src="../javascript/main.js" defer></script>
    <script src="../javascript/slider.js" defer></script>
</body>
</html>
