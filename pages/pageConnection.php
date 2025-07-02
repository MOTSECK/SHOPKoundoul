<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koundoul Shop</title>
    <link rel="icon" href="/photo/icon_koundoul_Shop.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/connection.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="login-container">
        <!-- Partie gauche avec le formulaire -->
        <div class="login-left">
            <!-- Flèche de retour -->
            <a href="javascript:history.back()" class="back-arrow">
                <i class="fas fa-arrow-left"></i>
            </a>

            <div class="login-box">
                <!-- Formulaire de Connexion -->
                <div id="login-form">
                    <h2>Connexion</h2>
                    <form>
                        <div class="input-group">
                            <label for="email">Adresse e-mail</label>
                            <input type="email" id="email" placeholder="Entrez votre e-mail" required>
                        </div>

                        <div class="input-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" id="password" placeholder="Entrez votre mot de passe" required>
                        </div>

                        <button type="submit" class="login-btn">Se connecter</button>
                        <p class="register-link">Pas encore de compte ? <a href="#" id="show-register">Inscrivez-vous</a></p>
                    </form>
                </div>

                <!-- Formulaire d'Inscription -->
                <div id="register-form" style="display: none;">
                    <h2>Inscription</h2>
                    <form>
                        <div class="input-group">
                            <label for="name">Nom</label>
                            <input type="text" id="name" placeholder="Entrez votre nom" required>
                        </div>

                        <div class="input-group">
                            <label for="register-email">Adresse e-mail</label>
                            <input type="email" id="register-email" placeholder="Entrez votre e-mail" required>
                        </div>

                        <div class="input-group">
                            <label for="register-password">Mot de passe</label>
                            <input type="password" id="register-password" placeholder="Entrez votre mot de passe" required>
                        </div>

                        <div class="input-group">
                            <label for="confirm-password">Confirmez le mot de passe</label>
                            <input type="password" id="confirm-password" placeholder="Confirmez votre mot de passe" required>
                        </div>

                        <button type="submit" class="login-btn">S'inscrire</button>
                        <p class="register-link">Déjà un compte ? <a href="#" id="show-login">Connectez-vous</a></p>
                    </form>
                </div>
            </div>
        </div>

        <!-- Partie droite avec le logo -->
        <div class="login-right">
            <img src="../photo/icon_koundoul_Shop.ico" alt="Koundoul Shop">
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const loginForm = document.querySelector("#login-form");
            const registerForm = document.querySelector("#register-form");
            const showRegister = document.querySelector("#show-register");
            const showLogin = document.querySelector("#show-login");
        
            // Afficher le formulaire d'inscription
            showRegister.addEventListener("click", function (e) {
                e.preventDefault();
                loginForm.style.display = "none";
                registerForm.style.display = "block";
            });
        
            // Afficher le formulaire de connexion
            showLogin.addEventListener("click", function (e) {
                e.preventDefault();
                registerForm.style.display = "none";
                loginForm.style.display = "block";
            });
        });
        </script>
        
    <script src="../javascript/connection.js"></script>
</body>
</html>
