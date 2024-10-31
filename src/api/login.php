<?php
header('Content-Type: application/json');

require_once '../database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $email = $data['email'] ?? '';
    $password = $data['password'] ?? '';

    if (empty($email) || empty($password)) {
        echo json_encode(['error' => 'Email and password are required.']);
        http_response_code(400);
        exit;
    }

    $db = new Database();
    $connection = $db->getConnection();

    $stmt = $connection->prepare('SELECT id, password FROM trading_scripts_library_001_users WHERE email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 0) {
        echo json_encode(['error' => 'Invalid email or password.']);
        http_response_code(401);
        exit;
    }

    $stmt->bind_result($userId, $hashedPassword);
    $stmt->fetch();

    if (!password_verify($password, $hashedPassword)) {
        echo json_encode(['error' => 'Invalid email or password.']);
        http_response_code(401);
        exit;
    }

    // Successful login
    echo json_encode(['message' => 'Login successful.', 'userId' => $userId]);
    http_response_code(200);
} else {
    echo json_encode(['error' => 'Invalid request method.']);
    http_response_code(405);
}
