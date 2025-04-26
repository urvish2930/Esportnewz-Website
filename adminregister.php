<?php
require_once "config.php";

// Establish a PDO connection
$dsn = "mysql:host=localhost;dbname=login;charset=utf8mb4";
$pdo = new PDO($dsn, 'root', '');

$username = "admin2023";
$password = "12345";

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Prepare and execute the query
$sql = "INSERT INTO admin_table (username, password) VALUES (?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$username, $hashedPassword]);
?>

