<?php
header('Content-Type: application/json');

// Function to sanitize and validate input
function validateInput($input) {
    // Sanitize input
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);

    // Validate input (example: check if it's not empty)
    if (empty($input)) {
        return false;
    }
    return $input;
}

// Example of expected input: ?category=some_category
$category = isset($_GET['category']) ? validateInput($_GET['category']) : null;

$response = [
    'status' => 'error',
    'message' => '',
    'data' => null
];

// Input validation
if ($category === false) {
    $response['message'] = 'Invalid input: category cannot be empty.';
    echo json_encode($response);
    exit;
}

// Database connection (replace with your own connection details)
$servername = "localhost";
$username = "root";
$password = "your_secure_password"; // Updated to a more secure placeholder
$dbname = "project_name_example_database";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    $response['message'] = 'Database connection failed: ' . $conn->connect_error;
    echo json_encode($response);
    exit;
}

// Prepare and execute SQL statement
$stmt = $conn->prepare("SELECT * FROM trading_scripts_library_001_snippets WHERE category = ?");
$stmt->bind_param("s", $category);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $snippets = $result->fetch_all(MYSQLI_ASSOC);
    $response['status'] = 'success';
    $response['message'] = 'Data retrieved successfully.';
    $response['data'] = $snippets;
} else {
    $response['message'] = 'No snippets found for the specified category.';
}

// Close connections
$stmt->close();
$conn->close();

// Return JSON response
echo json_encode($response);
