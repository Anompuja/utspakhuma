<?php
session_start();
include 'config.php'; // Database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Check if username exists
    $query = $conn->prepare("SELECT id, password FROM user1 WHERE username = ?");
    $query->bind_param("s", $username);
    $query->execute();
    $query->bind_result($userId, $hashedPassword);
    $query->fetch();

    if ($userId && password_verify($password, $hashedPassword)) {
        // Login successful
        $_SESSION['user_id'] = $userId;
        $_SESSION['username'] = $username;
        echo "<script>alert('Login successful!'); window.location.href = 'index.php';</script>";
    } else {
        // Login failed
        echo "<script>alert('Invalid username or password. Please try again.');</script>";
    }

    $query->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/login.css">
</head>

<body>
    <div class="login-container">
        <h2>Login</h2>
        <form method="POST" action="login.php">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <div class="form-footer">
            Don't have an account? <a href="register.php">Register here</a>
        </div>
    </div>
</body>

</html>