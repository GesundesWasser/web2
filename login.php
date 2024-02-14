<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
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

        .container {
            text-align: center;
        }

        .form-container {
            background-color: #333;
            padding: 20px;
            border-radius: 5px;
            margin-top: 20px;
            width: 300px;
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
        }

        input[type="submit"],
        .button {
            width: 100%;
            background-color: #fff;
            color: #222;
            cursor: pointer;
            font-size: 14px;
        }

        input[type="submit"]:hover,
        .button:hover {
            background-color: #eee;
        }

        .signup-link {
            display: block;
            margin-top: 10px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <p>Please enter your credentials to log in.</p>
        <div class="form-container">
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

                // Query user from database
                $sql = "SELECT * FROM users WHERE username='$username'";
                $result = $conn->query($sql);

                if ($result->num_rows == 1) {
                    $row = $result->fetch_assoc();
                    if (password_verify($password, $row['password'])) {
                        echo "Login successful!";
                    } else {
                        echo "Login failed. Invalid username or password.";
                    }
                } else {
                    echo "Login failed. Invalid username or password.";
                }
            }
            ?>
            <form method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required><br><br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required><br><br>
                <input type="submit" value="Login" class="button">
            </form>
            <a href="signup.php" class="signup-link button" style="background-color: #fff; color: #222; font-size: 12px;">Don't Have An Account? Signup</a>
        </div>
    </div>
</body>
</html>
