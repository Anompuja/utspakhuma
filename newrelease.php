<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>New Releases</title>
    <link rel="stylesheet" href="assets/new-releases.css" />

    <?php
    include 'config.php';
    include 'include/header.php';

    try {
        
        $stmt = $pdo->query("SELECT DISTINCT * FROM games"); 
        $games = $stmt->fetchAll(PDO::FETCH_ASSOC);

        
        if ($games) {
            echo "<section class='game-grid'>"; 
            foreach ($games as $game) {
                if (!empty($game['image_url']) && file_exists('img/' . $game['image_url'])) {
                    echo "<div class='game-card'>";
                    echo "<img src='img/" . htmlspecialchars($game['image_url'], ENT_QUOTES, 'UTF-8') . "' alt='" . htmlspecialchars($game['title'], ENT_QUOTES, 'UTF-8') . "' />";
                    echo "<h2>" . htmlspecialchars($game['title'], ENT_QUOTES, 'UTF-8') . "</h2>";
                    echo "<p>Price: $" . number_format($game['price'], 2) . "</p>";
                    echo "<button class='add-to-cart' data-title='" . htmlspecialchars($game['title'], ENT_QUOTES, 'UTF-8') . "' data-price='" . number_format($game['price'], 2) . "' data-id='" . $game['id'] . "'>Add to Cart</button>";
                    echo "</div>";
                }
            }
            echo "</section>"; 
        } else {
            echo "<p style='text-align: center; color: #bbb;'>No games found!</p>";
        }
    } catch (PDOException $e) {
        echo "<p style='color: red; text-align: center;'>Error fetching games: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "</p>";
    }

    include 'include/footer.php';
    ?>

    <script src="assets/new-releases.js"></script>
    </body>

</html>