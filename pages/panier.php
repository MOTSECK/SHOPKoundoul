<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Panier | Koundoul Shop</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
  <div class="max-w-4xl mx-auto py-10 px-4">
    <h1 class="text-3xl font-bold mb-6 text-center">🛒 Mon Panier</h1>

    <!-- Bouton Vider le panier -->
    <div class="text-center mb-6">
      <button id="clear-cart-btn"
              class="bg-red-600 text-white px-6 py-2 rounded-xl hover:bg-red-700 transition duration-300 hidden">
        🗑️ Vider le panier
      </button>
    </div>

    <div id="cart-list" class="space-y-4 mb-6"></div>

    <div class="text-center text-xl font-semibold mb-6">
      Total : <span id="cart-total">0</span> FCFA
    </div>

    <div class="text-center">
      <a id="whatsapp-btn" href="#" target="_blank"
         class="inline-block bg-green-500 text-white px-6 py-3 rounded-xl hover:bg-green-600 transition duration-300">
        💬 Commander sur WhatsApp
      </a>
    </div>
  </div>

  <script>
    const cartList = document.getElementById("cart-list");
    const cartTotal = document.getElementById("cart-total");
    const whatsappBtn = document.getElementById("whatsapp-btn");
    const clearCartBtn = document.getElementById("clear-cart-btn");

    let panier = JSON.parse(localStorage.getItem("panier") || "[]");

    function updateCartDisplay() {
      cartList.innerHTML = "";
      let total = 0;
      let message = "Bonjour Koundoul Shop, voici ma commande :%0A";

      if (panier.length === 0) {
        cartList.innerHTML = "<p class='text-center text-lg text-gray-500'>Votre panier est vide.</p>";
        cartTotal.textContent = "0";
        whatsappBtn.href = "#";
        whatsappBtn.classList.add("opacity-50", "pointer-events-none");
        clearCartBtn.classList.add("hidden");
        return;
      }

      clearCartBtn.classList.remove("hidden");

      panier.forEach((product, index) => {
        const item = document.createElement("div");
        item.className = "flex items-center bg-white rounded-lg shadow p-4";

        item.innerHTML = `
          <img src="../${product.image}" alt="${product.nom}" class="w-24 h-24 object-cover rounded mr-4">
          <div class="flex-1">
            <h3 class="text-lg font-bold">${product.nom}</h3>
            <p class="text-red-600 font-semibold">${product.prix} FCFA</p>
          </div>
          <button onclick="removeProduct(${index})"
                  class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
            ❌
          </button>
        `;

        cartList.appendChild(item);
        total += parseInt(product.prix);
        message += `- ${product.nom} (${product.prix} FCFA)%0A`;
      });

      cartTotal.textContent = total.toLocaleString();
      message += `%0ATotal : ${total.toLocaleString()} FCFA`;

      whatsappBtn.href = `https://wa.me/212600000000?text=${message}`;
    }

    function removeProduct(index) {
      if (confirm("Supprimer ce produit du panier ?")) {
        panier.splice(index, 1);
        localStorage.setItem("panier", JSON.stringify(panier));
        updateCartDisplay();
      }
    }

    clearCartBtn.addEventListener("click", () => {
      if (confirm("Voulez-vous vraiment vider tout le panier ?")) {
        panier = [];
        localStorage.removeItem("panier");
        updateCartDisplay();
      }
    });

    updateCartDisplay();
  </script>
</body>
</html>
