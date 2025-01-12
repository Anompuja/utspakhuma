<?php
include 'config.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $gameId = isset($_POST['game_id']) ? intval($_POST['game_id']) : 0;
    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;

    
    if ($gameId <= 0 || $quantity <= 0) {
        echo json_encode(['success' => false, 'error' => 'Invalid input']);
        exit;
    }

   
    $stmt = $conn->prepare("SELECT stock FROM games WHERE id = ?");
    $stmt->bind_param("i", $gameId);
    $stmt->execute();
    $stmt->bind_result($stock);
    $stmt->fetch();
    $stmt->close();

    if ($stock === null) {
        echo json_encode(['success' => false, 'error' => 'Game not found']);
        exit;
    }

    if ($stock >= $quantity) {
        
        $newStock = $stock - $quantity;
        $updateStmt = $conn->prepare("UPDATE games SET stock = ? WHERE id = ?");
        $updateStmt->bind_param("ii", $newStock, $gameId);
        $updateStmt->execute();
        $updateStmt->close();

        
        echo json_encode([
            'success' => true, 
            'message' => 'Stock updated successfully',
            'new_stock' => $newStock
        ]);
    } else {
        
        echo json_encode(['success' => false, 'error' => 'Insufficient stock']);
    }
}
?>