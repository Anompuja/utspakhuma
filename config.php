<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cloud_gaming";  // Sesuaikan dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



try {
    // Membuat koneksi PDO ke database
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Menetapkan mode error PDO menjadi exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    // Jika terjadi error, tampilkan pesan error
    
}
?>