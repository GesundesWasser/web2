window.onload = function() {
  var randomBg = Math.floor(Math.random() * 10) + 1; // Generate a random number between 1 and 10
  document.body.style.backgroundImage = "url('../img/bedwars/" + randomBg + ".png')"; // Set the background image
};