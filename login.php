<?php
// Start session
session_start();

// Database connection
$servername = "172.17.0.4";
$username = "wwago"; // MySQL username
$password = "bodenkapsel"; // MySQL password
$database = "database"; // Database name
$port = "3306"; // MySQL port
$conn = new mysqli($servername, $username, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // SQL injection prevention
    $username = stripslashes($username);
    $password = stripslashes($password);
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // Query
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    // Check if user exists
    if ($result->num_rows == 1) {
        // User found, verify password
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Password correct, set session variable
            $_SESSION['logged_in'] = true;
            // Redirect to the second file with login query
            if(isset($_GET['login'])) {
                $login_dest = $_GET['login'];
                switch ($login_dest) {
                    case '1':
                        header("Location: one.php");
                        exit();
                    case '2':
                        header("Location: otherone.php");
                        exit();
                    // Add more cases for additional destinations
                    default:
                        // Default to a generic page
                        header("Location: https://www.example.com");
                        exit();
                }
            }
        } else {
            // Password incorrect
            echo "Login failed. Invalid password.";
        }
    } else {
        // User not found
        echo "Login failed. User not found.";
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username"><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
