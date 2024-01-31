<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Replace with your actual MySQL database details
$host = "localhost";
$username = "web";
$password = "bodenkapsel";
$database = "users";

$mysqli = new mysqli($host, $username, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Default image filename
$defaultImage = '/img/default_user.png'; // Change this to the actual path of your default image

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $enteredPasscode = $_POST["passcode"];

    // Check if the username already exists
    $checkQuery = "SELECT COUNT(*) FROM users WHERE username = ?";
    $checkStmt = $mysqli->prepare($checkQuery);
    $checkStmt->bind_param("s", $username);
    $checkStmt->execute();
    $checkStmt->bind_result($userCount);
    $checkStmt->fetch();
    $checkStmt->close();

    if ($userCount > 0) {
        echo "Username '$username' is already taken. Please choose a different username.";
    } else {
        // Hash the password before storing it
        $hashedPassword = password_hash($enteredPasscode, PASSWORD_BCRYPT);

        // Insert the user into the database with the hashed password and image filename
        $insertQuery = "INSERT INTO users (username, passcode, image) VALUES (?, ?, ?)";
        $insertStmt = $mysqli->prepare($insertQuery);
        $insertStmt->bind_param("sss", $username, $hashedPassword, $defaultImage);

        if ($insertStmt->execute()) {
            // Get the ID of the inserted user
            $userId = $mysqli->insert_id;

            // Handle file upload for image with user ID as filename
            $uploadDir = '/var/www/upload/'; // Change this to the actual upload directory

            // Check if the directory exists, create it if necessary
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            // Check if the uploaded file is a PNG
            $allowedExtensions = ['png'];
            $uploadedFileExtension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

            if (in_array($uploadedFileExtension, $allowedExtensions)) {
                $imageFileName = $uploadDir . $userId . '.png';

                if (move_uploaded_file($_FILES['image']['tmp_name'], $imageFileName)) {
                    // Update the user's image path in the database
                    $updateImageQuery = "UPDATE users SET image = ? WHERE id = ?";
                    $updateImageStmt = $mysqli->prepare($updateImageQuery);
                    $updateImageStmt->bind_param("si", $imageFileName, $userId);
                    $updateImageStmt->execute();
                    $updateImageStmt->close();

                    echo "Image uploaded successfully.";
                } else {
                    echo "Error uploading image.";
                }
            } else {
                echo "Only PNG files are allowed.";
            }

            echo "User '$username' (ID: $userId) successfully registered.";
        } else {
            echo "Error during registration: " . $insertStmt->error;
        }

        $insertStmt->close();
    }
}

// Close the database connection
$mysqli->close();
?>

<!-- Display the registration form -->
<form method="post" action="" enctype="multipart/form-data">
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="passcode"><br>
    Image: <input type="file" name="image" accept=".png"><br> <!-- Restrict file selection to PNG files -->
    <input type="submit" value="Register">
</form>
