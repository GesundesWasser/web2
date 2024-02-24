<?php

// Add Error Reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Database Account Info
$servername = "172.17.0.4"; // Change this to your database server address if needed
$username = "web"; // Change this to your database username
$password = "#K31N3-B0D3NK4PS3L!"; // Change this to your database password
$database = "wwagodata"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted for login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    // Get username and password from form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // SQL query to fetch user from database
    $sql = "SELECT * FROM accounts WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    // Check if user exists
    if ($result->num_rows > 0) {
        // User found, login successful
        echo "Login successful!";
        // You can redirect to another page here
    } else {
        // User not found, login failed
        echo "Invalid username or password!";
    }
}

// Check if form is submitted for registration
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    // Get username and password from form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // SQL query to insert user into database
    $sql = "INSERT INTO accounts (username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "User registered successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Registration</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Login" name="login">
    </form>

    <h2>Register</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="new_username">New Username:</label><br>
        <input type="text" id="new_username" name="username"><br>
        <label for="new_password">New Password:</label><br>
        <input type="password" id="new_password" name="password"><br><br>
        <input type="submit" value="Register" name="register">
    </form>
</body>
</html>
