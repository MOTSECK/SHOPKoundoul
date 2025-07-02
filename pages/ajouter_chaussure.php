<?php
$conn = new mysqli("localhost", "root", "", "koundoulshop");
if ($conn->connect_error) {
    die("Erreur connexion: " . $conn->connect_error);
}

// Récupération des champs du formulaire
$nom = $_POST['nom'] ?? '';
$prix = $_POST['prix'] ?? 0;
$categorie = 'chaussure'; // Forcé pour les vêtements
$type = $_POST['type'] ?? 'Autres';

// Vérification de l'image
if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
    $imageTmp = $_FILES['image']['tmp_name'];
    $imageName = uniqid('', true) . '_' . basename($_FILES['image']['name']);
    $uploadDir = '../uploads/';
    $uploadPath = $uploadDir . $imageName;

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if (move_uploaded_file($imageTmp, $uploadPath)) {
        $imagePath = 'uploads/' . $imageName;

        $stmt = $conn->prepare("INSERT INTO produits (nom, prix, image, categorie, type) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sdsss", $nom, $prix, $imagePath, $categorie, $type);

        if ($stmt->execute()) {
            echo "chaussure ajouté avec succès.";
        } else {
            echo "Erreur lors de l'insertion en base de données.";
        }

        $stmt->close();
    } else {
        echo "Erreur lors de l’upload de l’image.";
    }
} else {
    echo "Aucune image reçue ou erreur.";
}

$conn->close();
?>
