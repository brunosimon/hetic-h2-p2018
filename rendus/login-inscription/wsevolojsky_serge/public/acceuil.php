<?php 
	
	require '../inc/config.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../css/reset.css">
		<link rel="stylesheet" href="../css/style.css">
		
		<title>Acceuil</title>
	</head>
	<body>
		<header class="main-header">
			<p>Bonjour <span><?php echo $_SESSION['name'] ?></span></p>
			<!-- bouton permettant de deconnecté l'utilisateur -->
			<a href="../inc/logout.php"><button>Log Out</button></a>
			<button>Mon compte</button>
			
		</header>	
	</body>
</html>