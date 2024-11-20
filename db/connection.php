<?php
$host = 'localhost';
$dbname = 'online_teaching_platform';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Include reusable controllers
    require_once __DIR__ . '/controllers.php';
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>