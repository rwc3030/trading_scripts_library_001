<?php include '../src/partials/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinescript Code Viewer</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div id="content">
        <h1>Welcome to the Pinescript Code Viewer</h1>
        <div id="snippets"></div>
        <div id="login-form">
            <h2>Login</h2>
            <form id="form-login">
                <input type="email" id="email" placeholder="Email" required>
                <input type="password" id="password" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>
            <div id="login-message"></div>
        </div>
    </div>
    <script src="app.js"></script>
</body>
</html>
