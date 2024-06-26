// ---------------------------
// Main JS File of the Site
// Copyright mcdonelts.city
// ---------------------------

window.onload = function() {
  var currentYear = new Date().getFullYear();
  document.getElementById('copyright-year').innerText = currentYear;
  var codename = "Codename Kapselordnung v1.8";
  document.getElementById('site-name-version').innerText = codename;
};