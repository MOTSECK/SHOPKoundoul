<?php
session_start();

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = new mysqli('localhost', 'root', '', 'koundoulshop');
    if ($conn->connect_error) {
        die("Connexion échouée : " . $conn->connect_error);
    }

    $email = trim($_POST['nom_utilisateur']);
    $password = trim($_POST['mot_de_passe']);

    // Requête corrigée pour les bons noms de colonnes et table
    $stmt = $conn->prepare("
        SELECT id, mot_de_passe 
        FROM admin 
        WHERE nom_utilisateur = ?
    ");
    $stmt->bind_param("s", $email); // $email contient désormais le pseudo/nom_utilisateur
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $admin = $result->fetch_assoc();

        if (password_verify($password, $admin['mot_de_passe'])) {
            $_SESSION['admin_id'] = $admin['id'];
            header("Location: admin.php");
            exit();
        } else {
            $error = "Identifiants incorrects.";
        }
    } else {
        $error = "Identifiants incorrects.";
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<!-- Reste inchangé -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f3f3;
            padding: 50px;
        }
        .login-form {
            background: white;
            padding: 30px;
            max-width: 400px;
            margin: auto;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
        }
        button {
            background: #007BFF;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            cursor: pointer;
        }
        .error {
            color: red;
            margin-bottom: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-form">
        <h2>Connexion Admin</h2>
        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && $error): ?>
            <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <form method="post" action="">
            <input type="email" name="nom_utilisateur" placeholder="Email" required>
            <input type="password" name="mot_de_passe" placeholder="Mot de passe" required>
            <button type="submit">Se connecter</button>
        </form>
    </div>
</body>
</html>
