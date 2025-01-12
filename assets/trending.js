document.addEventListener("DOMContentLoaded", function () {
  const addToCartButtons = document.querySelectorAll(".add-to-cart");
  const cartCountElement = document.getElementById("cart-count");

  updateCartCount();

  function updateCartCount() {
    const cart = JSON.parse(localStorage.getItem("cart")) || [];
    cartCountElement.textContent = cart.length;
  }

  addToCartButtons.forEach((button) => {
    button.addEventListener("click", () => {
      const title = button.getAttribute("data-title");
      const price = button.getAttribute("data-price");
      const gameId = button.getAttribute("data-id");

      fetch("check_stock.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        body: `game_id=${gameId}&quantity=1`,
      })
        .then((response) => response.json())
        .then((data) => {
          if (data.success) {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            cart.push({ title, price, gameId });
            localStorage.setItem("cart", JSON.stringify(cart));
            updateCartCount();

            alert(`${title} has been added to your cart.`);
          } else {
            alert(data.error || "Stock unavailable.");
          }
        })
        .catch((err) => console.error("Error:", err));
    });
  });
});
