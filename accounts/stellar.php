<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

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
            width: 125px;
            height: 38px;
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
        
        section#section2 img {
            width: 110px;
            height: 80px;
        }

        body::-webkit-scrollbar {
            width: 8px;
        }

        body::-webkit-scrollbar-thumb {
            background-color: #fff;
            border-radius: 6px;
        }

        body::-webkit-scrollbar-track {
            background-color: transparent;
        }

        body::-webkit-scrollbar-track-piece {
            background-color: transparent;
        }
        img {
            width: 50px;
            height: 50px;
        }
    </style>
<script src="cookie.js"></script>
</head>
<body>

<header>
    <a href="site">
    <img src="img/wwagoinc.png" alt="WWAGO Inc.">
    </a>
    </header>

<main>

    <!-- Show the Cookie Popup -->
    <div id="cookieConsent" style="display: none; background-color: rgba(0, 0, 0, 0.8); color: #fff; position: fixed; bottom: 0; left: 0; width: 100%; padding: 20px; text-align: center; z-index: 9999;">
        This website uses cookies to ensure you get the best experience on our website.
        <button style="background-color: #007bff; color: #fff; border: none; padding: 10px 20px; cursor: pointer; border-radius: 5px; margin-left: 20px;" onclick="acceptCookies()">Accept</button>
    </div>

        <section id="section1">
            <h2>Oh Nein, Der Tower Brennt!</h2>
            <p>WENN DER DIE SIRENE HÖRT, FÜHLT ER SICH SEHR GESTÖRT!</p>
            <button onclick="window.location.href='video/tower-fire.html'">Anzeigen</button>
        </section>

        <section id="section2">
            <h2>Mystery Video</h2>
            <p>ITS A MYSTERY!</p>
            <button onclick="window.location.href='video/rickroll.html'">Anzeigen</button>
        </section>

        <section id="section3">
            <h2>PLACEHOLDER</h2>
            <p>TEXT</p>
            <button disabled>Coming Soon...</button>
        </section>

        <section id="section4">
            <h2>PLACEHOLDER</h2>
            <p>TEXT</p>
            <button disabled>Coming Soon...</button>
        </section>

</main>

<footer>
<p>&copy; WWAGO Studios</p>    
<p>&copy; Jakobsoft Inc.</p>
</footer>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>