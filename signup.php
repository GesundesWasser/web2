<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <style>
        body {
            background-image: url('img/login.png'); /* Set The Background Image */
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
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            border: none;
            border-radius: 3px;
            color: #fff;
            background-color: rgba(255, 255, 255, 0.1); /* Add transparency to the background color */
            box-sizing: border-box; /* Include padding and border in element's total width and height */
        }

        input[type="submit"] {
            width: calc(100% - 20px);
            background-color: #4CAF50; /* Green color */
            color: #fff;
            cursor: pointer;
            font-size: 14px;
            border: none; /* Remove border */
            border-radius: 3px; /* Apply border radius */
            padding: 10px; /* Apply padding */
            box-sizing: border-box; /* Include padding and border in element's total width and height */
        }

        input[type="submit"]:hover {
            background-color: #45a049; /* Darker green color on hover */
        }

        .signup-button {
            width: calc(100% - 20px); /* Adjusted button width */
            background-color: #4CAF50; /* Green color */
            color: #fff;
            cursor: pointer;
            font-size: 14px;
            border: none; /* Remove border */
            border-radius: 3px; /* Apply border radius */
            padding: 10px; /* Apply padding */
            box-sizing: border-box; /* Include padding and border in element's total width and height */
            margin-top: 10px; /* Adjusted margin-top */
        }

        .signup-button:hover {
            background-color: #45a049; /* Darker green color on hover */
        }

    </style>
</head>
<body>
    <div class="container">
        <h2>Sign Up</h2>
        <p>Please fill out the following information to create an account.</p>
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

                // Hash password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // Insert user into database
                $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";
                if ($conn->query($sql) === TRUE) {
                    echo "Account created successfully!";
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
            <p>Already have an account? <a href="login.php">Login</a></p>
        </div>
    </div>
</body>
</html>
