document.addEventListener("DOMContentLoaded", function () {
  const countdownElements = document.querySelectorAll(".countdown");
  const addToCartButtons = document.querySelectorAll(".add-to-cart");
  const cartCountElement = document.getElementById("cart-count");

  // Memperbarui jumlah cart di halaman
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

  // Fungsi untuk memperbarui jumlah cart
  function updateCartCount() {
    const cart = JSON.parse(localStorage.getItem("cart")) || [];
    cartCountElement.textContent = cart.length;
  }

  // Menambahkan item ke dalam cart
  addToCartButtons.forEach((button) => {
    button.addEventListener("click", () => {
      const title = button.getAttribute("data-title");
      const price = button.getAttribute("data-price");
      const gameId = button.getAttribute("data-id");
      const stock = parseInt(button.getAttribute("data-stock"));

      let cart = JSON.parse(localStorage.getItem("cart")) || [];

      // Cek apakah stok cukup
      if (stock > 0) {
        cart.push({ title, price, gameId });
        localStorage.setItem("cart", JSON.stringify(cart));

        // Memperbarui cart count
        updateCartCount();

        // Kirim permintaan untuk update stok di database
        fetch("update_stock.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/x-www-form-urlencoded",
          },
          body: `game_id=${gameId}&quantity=1`,
        })
          .then((response) => response.json())
          .then((data) => {
            if (data.error) {
              alert(data.error);
            } else {
              console.log(data.message); // Pesan sukses
            }
          })
          .catch((err) => {
            console.error("Error:", err);
          });

        // Notifikasi
        if (Notification.permission === "granted") {
          new Notification("Added to Cart", {
            body: `${title} has been added to your cart.`,
          });
        } else if (Notification.permission !== "denied") {
          Notification.requestPermission().then((permission) => {
            if (permission === "granted") {
              new Notification("Added to Cart", {
                body: `${title} has been added to your cart.`,
              });
            }
          });
        }
      } else {
        alert("Sorry, this game is out of stock.");
      }
    });
  });
});
