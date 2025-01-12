<?php
include 'include/header.php'; 
include 'config.php';  


$sql = "SELECT id, title, price, image_url FROM games WHERE title IN ('Until Daylight', 'EA FC 24', 'Elden Ring', 'Fantastap', 'Flinthook', 'God Of War', 'Guildlings')";  
$result = $conn->query($sql);
?>

<link rel="stylesheet" href="/utspakhuma/assets/trending.css">

<header class="trending-header">
    <h1>Trending Games</h1>
    <p>Discover the most popular games that players are enjoying right now!</p>
</header>

<section class="game-grid">
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            
            echo '<div class="game-card">';
            echo '<img src="' . $row['image_url'] . '" alt="' . $row['title'] . '" />';  // Image URL from the database
            echo '<h2>' . $row['title'] . '</h2>';
            echo '<p>Price: $' . number_format($row['price'], 2) . '</p>';
            echo '<p>Trending Now</p>';
            echo '<button class="add-to-cart" data-title="' . $row['title'] . '" data-price="' . $row['price'] . '" data-id="' . $row['id'] . '">Add to Cart</button>';
            echo '</div>';
        }
    } else {
        echo "<p>No trending games available at the moment.</p>";
    }
    ?>
</section>

<script src="assets/trending.js"></script>
</body>

<?php include 'include/footer.php'; ?>

</html>