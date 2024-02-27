<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <h1>Hello, <?php echo $_SESSION['name']; ?></h1>
     <a href="logout.php">Logout</a>

     <button onclick="window.location.href='stellar.php?<?php echo htmlspecialchars(http_build_query($_SESSION)); ?>'">Zur Gratspiel Seite!</button>

</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>