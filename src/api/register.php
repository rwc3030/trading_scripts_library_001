<?php
// Include database connection
require_once '../database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validate input
    if (empty($email) || empty($password)) {
        echo json_encode(['error' => 'Email and password are required.']);
        exit;
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare SQL statement
    $stmt = $pdo->prepare("INSERT INTO trading_scripts_library_001_users (email, password) VALUES (?, ?)");
    
    if ($stmt->execute([$email, $hashedPassword])) {
        echo json_encode(['success' => 'User registered successfully.']);
    } else {
        echo json_encode(['error' => 'Registration failed.']);
    }
}
?>
