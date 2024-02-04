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

        header,
        main,
        footer {
            width: 100%;
            text-align: center;
        }

        header img {
            max-width: 80px;
            height: auto;
            margin-right: 15px;
            vertical-align: middle;
        }

        header h1 {
            margin: 0;
            display: inline-block;
            vertical-align: middle;
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

        input[type="text"],
        input[type="password"],
        textarea {
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
    <div style="max-width: 800px; margin: 0 auto; padding: 20px; box-sizing: border-box;">
        <?php
        // Your PHP code for database connection and form processing

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

            // Debugging output
            var_dump($enteredUsername, $enteredPasscode, $hashedPassword, $userImage, $coinCount);
        }
        ?>
        <!-- Your header content here -->
        <header>
            <div class="user-info">
                <a href="site">
                    <img src="/var/www/upload/<?php echo isset($userImage) ? $userImage : 'default-user.png'; ?>" alt="User Icon">
                </a>
                <span><?php echo isset($_SESSION['user']) ? "Hiya! " . $_SESSION['user'] : "USERNAME: "; ?></span>
            </div>

            <div class="coin-info">
                <img src="img/coin.png" alt="Coin">
                <span>COINS: <?php echo isset($coinCount) ? $coinCount : 0; ?></span>
            </div>
        </header>
    </div>

    <div style="max-width: 800px; margin: 0 auto; padding: 20px; box-sizing: border-box;">
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
    </div>

    <div style="max-width: 800px; margin: 0 auto; padding: 20px; box-sizing: border-box;">
        <footer>
            <p>&copy; WWAGO-Sites Inc.</p>
        </footer>
    </div>
</body>

</html>
