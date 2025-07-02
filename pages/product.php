<?php
// Connexion base
$conn = new mysqli("localhost", "root", "", "koundoulshop");
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

// Récupérer id produit depuis l'URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id <= 0) {
    die("Produit invalide");
}

// Requête pour récupérer infos produit
$stmt = $conn->prepare("SELECT nom, prix, image, categorie FROM produits WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Produit non trouvé");
}

$product = $result->fetch_assoc();

$stmt->close();
$conn->close();

// URL WhatsApp pour commander (numéro à changer)
$whatsappNumber = "221XXXXXXXXX"; // mettre ton numéro complet sans espace ni "+"
$messageWhatsApp = urlencode("Bonjour, je souhaite commander le produit : " . $product['nom'] . " (ID: $id)");

$whatsappLink = "https://wa.me/$whatsappNumber?text=$messageWhatsApp";

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title><?php echo htmlspecialchars($product['nom']); ?> - Koundoul Shop</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; background: #f4f4f4; }
        .product-container { max-width: 600px; margin: auto; background: white; padding: 20px; border-radius: 10px; }
        img { max-width: 100%; border-radius: 10px; }
        h1 { text-align: center; }
        .price { font-size: 1.5em; color: #FC0100; margin: 15px 0; text-align: center; }
        .actions { display: flex; justify-content: space-around; margin-top: 25px; }
        .actions a, .actions button {
            background: #FC0100; color: white; padding: 12px 20px; text-decoration: none; border-radius: 6px; font-weight: bold; cursor: pointer;
            border: none; font-size: 1em;
        }
        .actions a:hover, .actions button:hover { background: #d00000; }
    </style>
</head>
<body>
    <div class="product-container">
        <h1><?php echo htmlspecialchars($product['nom']); ?></h1>
        <img src="<?php echo '../' . htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['nom']); ?>">
        <p class="price"><?php echo number_format($product['prix'], 0, ',', ' '); ?> FCFA</p>

        <div class="actions">
            <!-- Lien vers WhatsApp pour commander -->
            <a href="<?php echo $whatsappLink; ?>" target="_blank" rel="noopener noreferrer">Commander via WhatsApp</a>

            <!-- Bouton Ajouter au panier -->
            <form method="post" action="ajouter_au_panier.php" style="margin:0;">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <button type="submit">Ajouter au panier</button>
            </form>
        </div>
    </div>
</body>
</html>
