document.addEventListener("DOMContentLoaded", function () {
  const countdownElements = document.querySelectorAll(".countdown");
  const addToCartButtons = document.querySelectorAll(".add-to-cart");
  const cartCountElement = document.getElementById("cart-count");

  // Update cart count on page load
  updateCartCount();

  countdownElements.forEach((countdownEl) => {
    let timeLeft = 60 * 60 * 23; // Waktu countdown (dalam detik)

    const timerInterval = setInterval(() => {
      if (timeLeft <= 0) {
        clearInterval(timerInterval);
        countdownEl.textContent = "Offer Expired";
      } else {
        const hours = Math.floor(timeLeft / 3600);
        const minutes = Math.floor((timeLeft % 3600) / 60);
        const seconds = timeLeft % 60;

        countdownEl.textContent = `${String(hours).padStart(2, "0")}:${String(minutes).padStart(2, "0")}:${String(seconds).padStart(2, "0")}`;
        timeLeft--;
      }
    }, 1000);
  });

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

            // Tampilkan notifikasi sukses
            alert(`${title} has been added to your cart.`);
          } else {
            alert(data.error || "Stock unavailable.");
          }
        })
        .catch((err) => console.error("Error:", err));
    });
  });
});
