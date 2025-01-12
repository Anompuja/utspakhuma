<?php
include 'config.php';

// Pastikan parameter game_id dan quantity ada
if (isset($_POST['game_id']) && isset($_POST['quantity'])) {
    $gameId = (int)$_POST['game_id'];
    $quantity = (int)$_POST['quantity'];

    try {
        // Update stok di database
        $stmt = $pdo->prepare("UPDATE games SET stock = stock - ? WHERE id = ?");
        $stmt->execute([$quantity, $gameId]);

        // Periksa apakah update berhasil
        if ($stmt->rowCount() > 0) {
            echo json_encode(['message' => 'Stock updated successfully']);
        } else {
            echo json_encode(['error' => 'Failed to update stock or no changes']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => 'Missing game_id or quantity']);
}
?>