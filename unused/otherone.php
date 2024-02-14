<?php
// Start session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // If not logged in, redirect to the login page
    header("Location: login.php");
    exit();
}

// If logged in, display the content of the second file
?>
<!DOCTYPE html>
<html>
<head>
    <title>Second File</title>
</head>
<body>
    <h2>Welcome to the Other One!</h2>
    <p>This content is only accessible after a successful login.</p>
</body>
</html>
