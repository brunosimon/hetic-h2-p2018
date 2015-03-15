<?php 
	
	require 'config.php';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Youssra Manad</title>
	<link rel="stylesheet" href="../src/style/style.css">
	<link rel="stylesheet" href="../src/style/reset.css">
	<link href='http://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,700,300,600,400' rel='stylesheet' type='text/css'>
</head>
<body>
	<div class="member_container">
		<p id='welcoming'>Hello <?php echo $_SESSION['session_name'].' '.$_SESSION['session_lastname']; ?></p>
		<p class="member_content">Nous sommes ravis de vous compter parmis nos membres.</p>
		<a href="deconnexion.php"><button class='btn_deconnect'>ME DECONNECTER</button></a>
	</div>
</body>
</html>