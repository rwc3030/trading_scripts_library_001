<?php
// Load environment variables
require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

global $conn;

try {
    $conn = new PDO("mysql:host=" . $_ENV['DB_HOST'] . ";dbname=" . $_ENV['DB_NAME'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}
