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
                    case 'stellar':
                        header("Location: one.php");
                        exit();
                    case 'shop':
                        header("Location: otherone.php");
                        exit();
                    // Add more cases for additional destinations
                    default:
                        // Default to a generic page
                        header("Location: site");
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kapselordnung</title>
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="img/favicon.ico" type="img/x-icon">
    <style>
        body {
            background-color: #222;
            font-family: Arial, sans-serif;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background-color: #333;
            padding: 20px;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: none;
            border-radius: 3px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 3px;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
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
