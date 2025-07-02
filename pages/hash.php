<?php
// Mets ici ton mot de passe en clair
$motDePasseClair = "motseck@2003";

// Génère le hash avec bcrypt (recommandé)
$motDePasseHache = password_hash($motDePasseClair, PASSWORD_DEFAULT);

// Affiche le hash à copier
echo $motDePasseHache;
?>
