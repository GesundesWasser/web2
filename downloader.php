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
            margin: 0; /* Set margin to 0 for left alignment */
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
            max-width: 80px;
            height: auto;
            margin-right: 15px;
            vertical-align: middle; /* Align the image vertically */
        }

        main h2 {
            margin: 0;
            display: inline-block;
            vertical-align: middle; /* Align the text vertically */
        }

        section {
            margin-bottom: 20px;
        }

        section img {
            max-width: 100%; /* Ensure the image doesn't exceed its original width */
            height: auto; /* Maintain the aspect ratio */
            margin-right: 15px;
            margin-bottom: 15px; /* Add bottom margin to separate image and text */
            vertical-align: middle; /* Align the image vertically */
        }

        section#section3 img {
            display: block; /* Set the image to block-level to make it appear above the text */
            margin-bottom: 10px; /* Add some space between the image and the text */
        }

    </style>
</head>
<body>

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
    $enteredPasscode = $_POST["passcode"];

    if (empty($enteredPasscode)) {
        // Handle the case where passcode is empty
        header("Location: invalidpass");
        exit();
    }

    // Query the database to get the username, image, and downloadpass associated with the entered passcode
    $query = "SELECT username, image, downloadpass FROM users WHERE passcode = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $enteredPasscode);
    $stmt->execute();
    $stmt->bind_result($username, $userImage, $downloadPass);

    if ($stmt->fetch()) {
        // Check if downloadpass is set to 1
        if ($downloadPass == 1) {
            // Store the user in the session
            $_SESSION['user'] = $username;
        } else {
            // Handle the case where download Pass is not Valid
            header("Location: download");
            exit();
        }
    } else {
        // Handle the case where an Invalid Password is Detected
        header("Location: download");
        exit();
    }

    $stmt->close();
} else {
    // Handle the case where the form is not submitted
    header("Location: download");
    exit();
}

// Check if the user is logged in before fetching the coin count
if (isset($_SESSION['user'])) {
    // Query the database to get the coin count associated with the logged-in user
    $coinQuery = "SELECT coins FROM users WHERE username = ?";
    $coinStmt = $mysqli->prepare($coinQuery);
    $coinStmt->bind_param("s", $_SESSION['user']);
    $coinStmt->execute();
    $coinStmt->bind_result($userCoins);

    // Fetch the coin count
    if ($coinStmt->fetch()) {
        $coinCount = $userCoins;
    } else {
        $coinCount = 0; // Default value if no coins are found
    }

    $coinStmt->close();
} else {
    $coinCount = 0; // Default value if the user is not logged in
}

// Process the removal of coins if the "Remove Coins" button is clicked
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["removeCoins"]) && isset($_SESSION['user'])) {
    // Check if the user is logged in before removing coins
    $removeCoinsQuery = "UPDATE users SET coins = GREATEST(coins - 10, 0) WHERE username = ?";
    $removeCoinsStmt = $mysqli->prepare($removeCoinsQuery);
    $removeCoinsStmt->bind_param("s", $_SESSION['user']);
    $removeCoinsStmt->execute();
    $removeCoinsStmt->close();
    
    // Redirect to the current page to avoid re-submitting the form
    header("Location: site");
    exit();
}
?>


<header>
    <div class="user-info">
        <a href="site">
            <img src="img/<?php echo isset($userImage) ? $userImage : 'default-image.png'; ?>" alt="User Icon">
        </a>
        <span><?php echo isset($_SESSION['user']) ? "Hiya! " . $_SESSION['user'] : "USERNAME: "; ?></span>
    </div>
    
    <div class="coin-info">
        <img src="img/coin.png" alt="Coin">
        <span>COINS: <?php echo $coinCount; ?></span>
    </div>
</header>

<main>
        <section id="section1">
            <h2>Winwows Installer</h2>
            <p>TEXT</p>
            <button onclick="window.location.href='dl/downloader.py'">Download</button>
        </section>

        <section id="section2">
            <h2>Gratspiel Downloader</h2>
            <p>TEXT</p>
            <button onclick="window.location.href='dl/winwowsinstall-1.0desktop-18012024.vbs'">Download</button>
        </section>

        <section id="section3">
        <h2>Remove Coins</h2>
        <p>Click the button to remove 10 coins</p>
        <form method="post" action="">
            <!-- Add a hidden input for the passcode -->
            <input type="hidden" name="passcode" value="<?php echo htmlspecialchars($enteredPasscode ?? '', ENT_QUOTES); ?>">
            <button type="submit" name="removeCoins">Remove Coins</button>
        </form>
    </section>

        <footer>
        <p>&copy; WWAGO Inc.</p>
        </footer>
</main>
<footer>
    <p>&copy; WWAGO Inc.</p>
</footer>