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

    // Query the database to get the hashed password and image associated with the entered username
    $query = "SELECT passcode, image, coins FROM users WHERE username = ?";
    $stmt = $mysqli->prepare($query);

    if (!$stmt) {
        die("Error in query preparation: " . $mysqli->error);
    }

    $stmt->bind_param("s", $enteredUsername);
    $stmt->execute();
    $stmt->bind_result($hashedPassword, $userImage, $coinCount);

    if ($stmt->fetch()) {
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
}

// Check if the user is logged in
if (isset($_SESSION['user'])) {
    // Fetch user information (coins and userImage) from the database
    $loggedInUser = $_SESSION['user'];
    $userQuery = "SELECT coins, image FROM users WHERE username = ?";
    $userStmt = $mysqli->prepare($userQuery);

    if (!$userStmt) {
        die("Error in user query preparation: " . $mysqli->error);
    }

    $userStmt->bind_param("s", $loggedInUser);
    $userStmt->execute();
    $userStmt->bind_result($coinCount, $userImage);

    // Fetch the result before displaying the main content
    $userStmt->fetch();
    $userStmt->close();

    // Display the main HTML content
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Vergammelkapsel</title>
        <link rel="icon" href="img/favicon.ico" type="image/x-icon">
        <link rel="shortcut icon" href="img/favicon.ico" type="img/x-icon">
        <style>
            body {
                background-color: #222;
                color: #fff;
                margin: 0;
                font-family: 'Arial', sans-serif;
                padding: 0;
            }

            header, main, footer {
                padding: 20px;
                box-sizing: border-box;
                max-width: 800px; /* Set your desired max-width */
                margin: 0 auto; /* Center the content */
            }

            header img {
                max-width: 80px;
                height: auto;
                margin-right: 15px;
                vertical-align: middle; /* Align the image vertically */
            }

            header h1 {
                margin: 0;
                display: inline-block;
                vertical-align: middle; /* Align the text vertically */
            }

            nav ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
            }

            nav li {
                display: inline;
                margin-right: 15px;
            }

            a {
                color: #fff;
                text-decoration: none;
            }

            button {
                background-color: #555;
                color: #fff;
                padding: 10px;
                border: none;
                cursor: pointer;
                border-radius: 5px;
            }

            input[type="text"], input[type="password"], textarea {
                background-color: #333;
                color: #fff;
                padding: 8px;
                border: none;
                border-radius: 5px;
                width: 150px;
            }

            main img {
                max-width: 100%;
                height: auto;
                margin-right: 15px;
                margin-bottom: 15px;
                vertical-align: middle;
            }
        </style>
    </head>
    <body>
        <!-- Your header content here -->
        <header>
            <div class="user-info">
                <a href="site">
                    <img src="img/<?php echo isset($userImage) ? $userImage : 'default-image.png'; ?>" alt="User Icon">
                </a>
                <span><?php echo isset($_SESSION['user']) ? "Hiya! " . $_SESSION['user'] : "USERNAME: "; ?></span>
            </div>
            
            <div class="coin-info">
                <img src="img/coin.png" alt="Coin">
                <span>COINS: <?php echo isset($coinCount) ? $coinCount : 0; ?></span>
            </div>
        </header>

        <main>

            <section id="section1">
                <h2>Download Pass</h2>
                <p>Der Download Pass Pro Plus Ultra Premium Max</p>
            </section>

            <section id="section2">
                <img src="img/wwago.png" alt="Bild von WWAGO">
                <h2>WWAGO</h2>
                <p>Der OG WWAGO für 3 WWAGO Coins!</p>
                <button onclick="alert('Kauf Felgeschlagen!')">Kaufen!</button>
            </section>

            <section id="section3">
                <img src="img/wwago-kaputt.png" alt="Bild von Kaputten WWAGO :(">
                <h2>Kaputter WWAGO :(</h2>
                <p>Der Aller Beste WWAGO in der Kaputten Form! (Wieso willst du einen kaputten?)</p>
                <button onclick="alert('Kauf Felgeschlagen!')">Kaufen!</button>
            </section>

            <section id="section4">
                <img src="img/wago_klemme.png" alt="Bild von WAGO Klemme">
                <h2>WAGO Klemme</h2>
                <p>DER NEUE WAGO KLEMMEN WWAGO (der eigentlich gar keiner ist!)</p>
                <button onclick="alert('Kauf Felgeschlagen!')">Kaufen!</button>
            </section>

        </main>

        <footer>
            <p>&copy; WWAGO-Sites Inc.</p>
        </footer>
    </body>
    </html>
    <?php
}

// Close the database connection
$mysqli->close();
?>
