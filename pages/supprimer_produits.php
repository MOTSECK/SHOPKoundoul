<?php
$conn = new mysqli("localhost", "root", "", "koundoulshop");

if ($conn->connect_error) {
    die("Erreur connexion : " . $conn->connect_error);
}

// Vérifie que l'ID est présent et valide
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    // On récupère d'abord le chemin de l'image
    $query = "SELECT image FROM produits WHERE id = $id LIMIT 1";
    $result = $conn->query($query);

    if ($result && $row = $result->fetch_assoc()) {
        $imagePath = '../' . $row['image'];

        // Supprime l'image du dossier si elle existe
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        // Supprime le produit de la base
        $delete = $conn->query("DELETE FROM produits WHERE id = $id");

        if ($delete) {
            echo "Produit supprimé avec succès.";
        } else {
            echo "Erreur lors de la suppression.";
        }
    } else {
        echo "Produit non trouvé.";
    }
} else {
    echo "ID invalide.";
}

$conn->close();
?>
