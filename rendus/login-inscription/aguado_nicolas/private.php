<?php
session_start();
if (!isset($_SESSION['login'])) {
	header ('Location: login.php');
	exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Private</title>
	<link href="css/style.css" rel="stylesheet">
    <link href=
    'http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,400,800,700,600,300'
    rel='stylesheet' type='text/css'>
</head>
<body style="text-align:center;">
	<h1><?php echo 'Bonjour '.$_SESSION['user']; ?></h1> 
	<br>
	<a href="deconnexion.php">Déconnexion</a>
</body>
</html>