<?php
$conn = new mysqli("localhost", "root", "", "koundoulshop"); // adapte au besoin
if ($conn->connect_error) {
    die("Erreur connexion: " . $conn->connect_error);
}

$nom = $_POST['nom'];
$prix = $_POST['prix'];
$categorie = $_POST['categorie'];
$type = $_POST['type'];

if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
    $imageTmp = $_FILES['image']['tmp_name'];
    $imageName = uniqid() . "_" . basename($_FILES['image']['name']);
    $uploadDir = '../../uploads/';
    $uploadPath = $uploadDir . $imageName;

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if (move_uploaded_file($imageTmp, $uploadPath)) {
        $imagePath = 'uploads/' . $imageName;

        $stmt = $conn->prepare("INSERT INTO produits (nom, prix, image, categorie, type) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sdsss", $nom, $prix, $imagePath, $categorie, $type);
        $stmt->execute();

        echo "Produit ajouté avec succès";
    } else {
        echo "Erreur lors de l’upload de l’image.";
    }
} else {
    echo "Aucune image reçue ou erreur.";
}
?>
