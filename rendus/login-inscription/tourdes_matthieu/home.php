<?php 
require 'inc/config.php';

if(!empty($_SESSION['name']) || !empty($_SESSION['mail'])){

?>	

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:700,400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>MyAudioReact - Home</title>
</head>
<body>
	<div class="header">
		<div class="wrapper">
			<h1 class="logo">MyAudioReact</h1>
			<div class="form_login">
				<h2 class="title_name">Hi, <?php echo($_SESSION['name']) ?></h2>
				<a class="links" href="logout.php">LOG OUT</a>
				<a class="links" href="delete.php">DELETE ACCOUNT</a>
			</div>
		</div>
	</div>
	<div class="audioreact">
		<iframe width="960" height="540" src="https://www.youtube.com/embed/3a7sVXpV9D0" frameborder="0" allowfullscreen></iframe>
	</div>
	
<?php } else header('location: index.php'); ?>
</body>
</html>