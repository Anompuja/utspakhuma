<?php
include 'config.php';

// Ambil data dari request
$game_id = $_POST['game_id'];
$quantity = $_POST['quantity'];

// Update stock di database
try {
    $stmt = $pdo->prepare("UPDATE games SET stock = stock - :quantity WHERE id = :game_id");
    $stmt->execute([
        ':quantity' => $quantity,
        ':game_id' => $game_id,
    ]);
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
?>