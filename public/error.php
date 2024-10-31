<?php
// Simple error handling page
http_response_code(500);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin-top: 50px; }
        h1 { color: #ff0000; }
    </style>
</head>
<body>
    <h1>Oops! Something went wrong.</h1>
    <p>We're experiencing technical difficulties. Please try again later.</p>
</body>
</html>
