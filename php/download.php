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
      padding: 0;
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      flex-direction: column;
    }

    header,
    nav,
    main,
    footer {
      padding: 20px;
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

    .download-container {
      width: 300px;
      border: 1px solid #ccc;
      padding: 10px;
      border-radius: 5px;
    }

    .download-bar {
      width: 100%;
      height: 30px;
      background-color: #eee;
      border-radius: 5px;
      position: relative;
      overflow: hidden;
    }

    .progress-bar {
      height: 100%;
      width: 0;
      background-color: #4caf50;
      border-radius: 5px;
      transition: width 0.3s ease;
      position: relative;
      overflow: hidden;
    }

    .status-text {
      text-align: center;
      margin-top: 10px;
    }

    .video-container {
      margin-top: 20px;
    }

    .completion-message {
      margin-top: 10px;
      color: rgb(0, 255, 13);
      font-weight: bold;
      display: none;
    }

    .passcode-form {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-top: 20px;
    }

    .download-button {
      display: none;
      margin-top: 10px;
    }
  </style>
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9235748631542962" crossorigin="anonymous"></script>
</head>

<body>
  <div class="download-container">
    <div class="download-bar">
      <div class="progress-bar"></div>
      <div class="status-text">Downloading...</div>
    </div>
  </div>

  <div class="completion-message" id="completionMessage">Download Complete!</div>

  <div class="passcode-form" id="passcodeForm" style="display: none;">
    <form method="post" action="downloader.php">
      <!-- Add a hidden input for the passcode -->
      <input type="hidden" name="passcode" value="<?php echo htmlspecialchars($enteredPasscode ?? '', ENT_QUOTES); ?>">
      <label for="passcode">Have Download Pass?</label>
      <input type="password" id="passcode" name="passcode" placeholder="Password" />
      <button type="submit">Submit</button>
    </form>
  </div>

  <div class="video-container">
    <iframe src="https://drive.google.com/file/d/1gKF9u3RZ2AkEa_U5OvsV2BmLvMkMdS84/preview" width="640" height="480" allow="autoplay"></iframe>
  </div>

  <button class="download-button" id="downloadButton" onclick="startDownload()">Download Now</button>

  <script>
    function startDownload() {
      const progressBar = document.querySelector('.progress-bar');
      const statusText = document.querySelector('.status-text');
      const completionMessage = document.getElementById('completionMessage');
      const downloadButton = document.getElementById('downloadButton');
      const passcodeForm = document.getElementById('passcodeForm');

      const downloadDuration = 600000;
      const interval = 1000;
      let progress = 0;

      const updateProgressBar = () => {
        progress += (interval / downloadDuration) * 100;
        progressBar.style.width = `${progress}%`;

        if (progress < 100) {
          // Continue updating the progress bar
        } else {
          clearInterval(progressInterval);
          statusText.textContent = 'Download Complete!';
          statusText.style.color = 'green';
          completionMessage.style.display = 'block';
          passcodeForm.style.display = 'flex'; // Display the passcode form
          downloadButton.style.display = 'none'; // Hide the download button
        }
      };

      const progressInterval = setInterval(updateProgressBar, interval);
    }
  </script>
</body>

</html>