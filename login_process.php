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
            // Password correct, redirect based on login parameter
            if(isset($_GET['login'])) {
                $login_dest = $_GET['login'];
                switch ($login_dest) {
                    case '1':
                        echo "<script>window.location.href = 'https://www.google.com';</script>";
                        exit();
                    case '2':
                        echo "<script>window.location.href = 'https://www.bing.com';</script>";
                        exit();
                    // Add more cases for additional destinations
                    default:
                        // Default to a generic page
                        echo "<script>window.location.href = 'https://www.example.com';</script>";
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
    <form id="loginForm" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username"><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Login">
    </form>

    <script>
        // Submit the form using JavaScript
        document.getElementById("loginForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent the default form submission
            // Perform form submission using AJAX
            var formData = new FormData(this);
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "<?php echo $_SERVER["PHP_SELF"]; ?>?login=<?php echo isset($_GET['login']) ? $_GET['login'] : ''; ?>", true);
            xhr.onload = function() {
                if (xhr.status == 200) {
                    // Check if the response contains a redirect script
                    var redirectScript = xhr.responseText.trim();
                    if (redirectScript.startsWith("<script>window.location.href")) {
                        // Execute the redirect script
                        eval(redirectScript);
                    } else {
                        // Display the response if it's not a redirect script
                        console.log(xhr.responseText);
                    }
                }
            };
            xhr.send(formData);
        });
    </script>
</body>
</html>
