<?php
// Koneksi ke database
include 'db_connection.php';

// Ambil data game_id dan quantity dari request
$game_id = $_POST['game_id'];
$quantity = $_POST['quantity'];

// Query untuk memeriksa stok
$sql = "SELECT stock FROM games WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$game_id]);
$game = $stmt->fetch();

if ($game && $game['stock'] >= $quantity) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false]);
}
?>