<?php
// Database connection
require_once 'config/config.php';

function executeQuery($query) {
    $conn = getDBConnection();
    if ($conn->query($query) === FALSE) {
        error_log("Database query failed: " . $conn->error);
    }
    $conn->close();
}

// Example function to fetch snippets
function fetchSnippets() {
    $query = "SELECT * FROM trading_scripts_library_001_snippets";
    $conn = getDBConnection();
    $result = $conn->query($query);
    if ($result === FALSE) {
        error_log("Database query failed: " . $conn->error);
        return [];
    }
    return $result->fetch_all(MYSQLI_ASSOC);
}
