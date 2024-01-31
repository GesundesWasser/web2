<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

// Replace with your actual MySQL database details
$host = "localhost";
$username = "web";
$password = "bodenkapsel";
$database = "users";

$mysqli = new mysqli($host, $username, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enteredUsername = $_POST["username"];
    $enteredPasscode = $_POST["passcode"];

    // Query the database to get the hashed password associated with the entered username
    $query = "SELECT passcode FROM users WHERE username = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $enteredUsername);
    $stmt->execute();
    $stmt->bind_result($hashedPassword);
    
    if ($stmt->fetch()) {
        // Debug information
        echo "Entered Username: $enteredUsername<br>";
        echo "Entered Password: $enteredPasscode<br>";
        echo "Stored Password from Database: $hashedPassword<br>";

        // Verify the entered password against the stored hash
        if (password_verify($enteredPasscode, $hashedPassword)) {
            // Password is correct, store the user in the session
            $_SESSION['user'] = $enteredUsername;
            echo "Login Successful";
        } else {
            // Handle the case where an Invalid Password is Detected
            echo "Invalid Password";
        }
    } else {
        // Handle the case where an Invalid Username is Detected
        echo "Invalid Username";
    }

    $stmt->close();
} else {
    // Display the login form
    // ...

    // Example form:
    ?>
    <form method="post" action="">
        Username: <input type="text" name="username"><br>
        Password: <input type="password" name="passcode"><br>
        <input type="submit" value="Login">
    </form>
    <?php
}

// Close the database connection
$mysqli->close();
?>