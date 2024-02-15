<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            background-image: url('img/login.png'); /* Replace 'background_image.jpg' with the path to your image */
            background-size: cover;
            font-family: Arial, sans-serif;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            text-align: center;
        }

        .form-container {
            background-color: rgba(0, 0, 0, 0.7); /* Add transparency to the background color */
            padding: 20px;
            border-radius: 5px;
            margin-top: 20px;
            width: 300px;
            margin: auto; /* Center the form */
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="password"],
        .button {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            border: none;
            border-radius: 3px;
            color: #fff;
            background-color: rgba(255, 255, 255, 0.1); /* Add transparency to the background color */
            box-sizing: border-box; /* Include padding and border in element's total width and height */
        }

        input[type="submit"],
        .login-button {
            width: calc(100% - 20px); /* Adjusted button width */
            background-color: #4CAF50; /* Green color */
            color: #fff;
            cursor: pointer;
            font-size: 14px;
            border: none; /* Remove border */
            border-radius: 3px; /* Apply border radius */
            padding: 10px; /* Apply padding */
            box-sizing: border-box; /* Include padding and border in element's total width and height */
            text-decoration: none; /* Remove default underline */
            display: inline-block; /* Ensure the element behaves like a block-level element */
            text-align: center; /* Center the text horizontally */
        }

        input[type="submit"]:hover,
        .login-button:hover {
            background-color: #45a049; /* Darker green color on hover */
        }

        .signup-link {
            display: block;
            margin-top: 10px;
            text-decoration: none;
            color: #fff;
        }

        .signup-button {
            background-color: #fff; /* White color */
            color: #222; /* Dark text color */
            font-size: 14px;
            display: inline-block;
            padding: 10px 20px; /* Apply padding */
            border: none; /* Remove border */
            border-radius: 3px; /* Apply border radius */
            box-sizing: border-box; /* Include padding and border in element's total width and height */
        }

        .signup-button:hover {
            background-color: #eee; /* Lighter background color on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <p>Please enter your credentials to log in.</p>
        <div class="form-container">
        <?php
// Ensure no whitespace or output before this line
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

    // Query user from database
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Set session variable for logged-in user
            $_SESSION['username'] = $username;

            // Redirect based on login query parameter
            if(isset($_GET['login'])) {
                $login = $_GET['login'];
                if($login == 1) {
                    header("Location: google.com");
                    exit();
                } elseif($login == 2) {
                    header("Location: bing.com");
                    exit();
                } else {
                    // Default redirect
                    header("Location: default-redirect.com");
                    exit();
                }
            } else {
                // Default redirect if no query parameter provided
                header("Location: default-redirect.com");
                exit();
            }
        } else {
            $login_error = "Login failed. Invalid username or password.";
        }
    } else {
        $login_error = "Login failed. Invalid username or password.";
    }
}
?>
            <form method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required><br><br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required><br><br>
                <input type="submit" value="Login" class="login-button">
            </form>
            <p>Don't have an account? <a href="signup.php" class="signup-button">Sign Up</a></p>
        </div>
    </div>
</body>
</html>
