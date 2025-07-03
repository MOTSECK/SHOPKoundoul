<?php
$conn = new mysqli("localhost", "root", "", "koundoulshop");
if ($conn->connect_error) {
    die("Erreur connexion: " . $conn->connect_error);
}

$sql = "SELECT * FROM produits WHERE categorie = 'accessoire' ORDER BY id DESC";
$result = $conn->query($sql);

$produits = [];

while ($row = $result->fetch_assoc()) {
    $produits[] = $row;
}

header('Content-Type: application/json');
echo json_encode($produits);
?>
