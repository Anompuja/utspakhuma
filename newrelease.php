<?php

include 'config.php';
try {
    
    $stmt = $pdo->query("SELECT * FROM games WHERE category_id = 1");  
    $games = $stmt->fetchAll(PDO::FETCH_ASSOC);

    
    if ($games) {
        foreach ($games as $game) {
            echo "<div class='game-card'>";
            echo "<img src='img/" . $game['image_url'] . "' alt='" . $game['title'] . "' />";
            echo "<h2>" . $game['title'] . "</h2>";
            echo "<p>Price: $" . $game['price'] . "</p>";
            echo "<button class='add-to-cart' data-title='" . $game['title'] . "' data-price='" . $game['price'] . "'>Add to Cart</button>";
            echo "</div>";
        }
    } else {
        echo "No games found!";
    }
} catch (PDOException $e) {
    echo "Error fetching games: " . $e->getMessage();
}
?>