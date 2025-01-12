document.addEventListener("DOMContentLoaded", function () {
  const addToCartButtons = document.querySelectorAll(".add-to-cart");

  addToCartButtons.forEach((button) => {
    button.addEventListener("click", () => {
      const title = button.getAttribute("data-title");
      const price = button.getAttribute("data-price");
      const gameId = button.getAttribute("data-id");
      const quantity = 1; // Assuming adding one item at a time

      // Mengirim request AJAX untuk memeriksa stok
      fetch("check_stock.php", {
        method: "POST",
        body: new URLSearchParams({
          game_id: gameId,
          quantity: quantity,
        }),
      })
        .then((response) => response.json())
        .then((data) => {
          if (data.success) {
            // Jika stok tersedia, tambahkan ke keranjang
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            cart.push({ title, price, gameId, quantity });
            localStorage.setItem("cart", JSON.stringify(cart));

            alert(`${title} telah ditambahkan ke keranjang.`);

            // Update stock in the database
            fetch("update_stock.php", {
              method: "POST",
              body: new URLSearchParams({
                game_id: gameId,
                quantity: quantity, // Reduce the stock
              }),
            })
              .then((updateResponse) => updateResponse.json())
              .then((updateData) => {
                if (updateData.success) {
                  console.log("Stock updated successfully");
                } else {
                  console.error("Failed to update stock");
                }
              });
          } else {
            // Jika stok habis, tampilkan notifikasi
            alert(`Stok untuk ${title} tidak mencukupi.`);
          }
        });
    });
  });
});
