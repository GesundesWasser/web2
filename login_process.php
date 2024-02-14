<?php
// Database connection
$servername = "172.17.0.4";
$username = "wwago"; // Your MySQL username
$password = "bodenkapsel"; // Your MySQL password
$database = "database"; // Your database name
$port = "3306"; // Your MySQL port
$conn = new mysqli($servername, $username, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form data
$username = $_POST['username'];
$password = $_POST['password'];

// SQL injection prevention
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($conn, $username);

// Query
$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

// Check if user exists
if ($result->num_rows == 1) {
    // User found, verify password
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        // Password correct, login successful
        echo "Login successful!";
    } else {
        // Password incorrect
        echo "Login failed. Invalid password.";
    }
} else {
    // User not found
    echo "Login failed. User not found.";
}

$conn->close();
?>