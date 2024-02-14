<?php
// Database connection
$servername = "localhost";
$username = "wwago"; // Your MySQL username
$password = "bodenkapsel"; // Your MySQL password
$database = "database"; // Your database name
$conn = new mysqli($servername, $username, $password, $database);

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
$password = mysqli_real_escape_string($conn, $password);

// Query
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

// Check if user exists
if ($result->num_rows == 1) {
    // Login successful
    echo "Login successful!";
} else {
    // Login failed
    echo "Login failed. Invalid username or password.";
}

$conn->close();
?>
