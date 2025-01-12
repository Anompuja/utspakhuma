<?php
include 'config.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = password_hash(trim($_POST['password']), PASSWORD_BCRYPT);

    
    $checkQuery = $conn->prepare("SELECT id FROM user1 WHERE username = ? OR email = ?");
    $checkQuery->bind_param("ss", $username, $email);
    $checkQuery->execute();
    $checkQuery->store_result();

    if ($checkQuery->num_rows > 0) {
        echo "<script>alert('Username or Email already exists!');</script>";
    } else {
        
        $insertQuery = $conn->prepare("INSERT INTO user1 (username, email, password) VALUES (?, ?, ?)");
        $insertQuery->bind_param("sss", $username, $email, $password);

        if ($insertQuery->execute()) {
            echo "<script>alert('Registration successful!'); window.location.href = 'login.php';</script>";
        } else {
            echo "<script>alert('Error during registration. Please try again.');</script>";
        }
    }

    $checkQuery->close();
    $insertQuery->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="assets/register.css``">
</head>

<body>
    <div class="registration-container">
        <h2>Create Account</h2>
        <form method="POST" action="register.php">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Register</button>
        </form>
        <div class="form-footer">
            Already have an account? <a href="login.php">Login here</a>
        </div>
    </div>
</body>

</html>