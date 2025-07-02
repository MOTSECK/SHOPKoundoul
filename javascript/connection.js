
document.addEventListener("DOMContentLoaded", function () {
    const loginForm = document.querySelector("#login-form form");
    const registerForm = document.querySelector("#register-form form");

    loginForm.addEventListener("submit", function (e) {
        e.preventDefault();

        const email = document.querySelector("#email").value;
        const password = document.querySelector("#password").value;

        fetch("http://localhost:5000/login", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ email, password })
        })
        .then(response => response.json())
        .then(data => {
            if (data.token) {
                // localStorage.setItem("token", data.token);
                alert("Connexion réussie !");
                window.location.href = "pageAccueil.html";
            } else {
                alert(data.message);
            }
        });
    });

    registerForm.addEventListener("submit", function (e) {
        e.preventDefault();

        const name = document.querySelector("#name").value;
        const email = document.querySelector("#register-email").value;
        const password = document.querySelector("#register-password").value;
        const confirmPassword = document.querySelector("#confirm-password").value;

        if (password !== confirmPassword) {
            alert("Les mots de passe ne correspondent pas !");
            return;
        }

        fetch("http://localhost:5500/register", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ name, email, password })
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            window.location.href = "connection.html";
        });
    });
});

