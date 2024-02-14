<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
</head>
<body>
    <h2>Sign Up</h2>
    <?php
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

        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert user into database
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";
        if ($conn->query($sql) === TRUE) {
            echo "User registered successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>
    <form method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Sign Up">
    </form>
</body>
</html>
