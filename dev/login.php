<?php
// Start the session
session_start();

// Check if user is already logged in
if(isset($_SESSION['username'])) {
    // Redirect to a logged-in page or display a message
    header("Location: welcome.php");
    exit;
}

// Check if form is submitted for login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    // Get username and password from form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check login credentials (you should use password hashing for security)
    if($username === "your_username" && $password === "your_password") {
        // Set a cookie to remember the user's login status for 1 day (86400 seconds)
        setcookie("username", $username, time() + (86400 * 1), "/");
        // Redirect to a logged-in page or display a message
        header("Location: welcome.php");
        exit;
    } else {
        // Display an error message for invalid credentials
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Login" name="login">
        <?php if(isset($error)): ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>
    </form>
</body>
</html>
