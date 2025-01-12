<?php
include 'include/header.php'; 
include 'config.php';  


$sql = "SELECT g.id, g.title, g.price, g.image_url, g.description, g.offer_expiry, g.stock, c.name AS category
        FROM games g
        JOIN categories c ON g.category_id = c.id
        WHERE g.offer_expiry > NOW()";  
$result = $conn->query($sql);
?>

<link rel="stylesheet" href="/utspakhuma/assets/special-offers.css">
<header class="special-offers-header">
    <h1>Special Offers</h1>
    <p>Enjoy limited-time deals on your favorite games. Don't miss out!</p>
</header>

<section class="game-grid">
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<div class="game-card">';
            echo '<img src="' . $row['image_url'] . '" alt="' . $row['title'] . '" />'; // Menampilkan gambar
            echo '<h2>' . $row['title'] . '</h2>';
            echo '<p>Special offer price: $' . number_format($row['price'], 2) . '</p>';
            echo '<p>Hurry up! This offer expires in:</p>';
            echo '<div class="countdown" id="countdown' . $row['id'] . '">Loading...</div>';
            echo '<button class="add-to-cart" data-title="' . $row['title'] . '" data-price="' . $row['price'] . '" data-id="' . $row['id'] . '" data-stock="' . $row['stock'] . '">Add to Cart</button>'; // Menambahkan button Add to Cart dengan data-stock
            echo '</div>';
        }
    } else {
        echo "No special offers available at the moment.";
    }
    ?>
</section>

<section id="cart" class="cart">
    <h2>Cart</h2>
    <ul id="cart-items"></ul>
</section>

<script src="assets/special-offers.js"></script>
</body>

<?php include 'include/footer.php'; ?>

</html>