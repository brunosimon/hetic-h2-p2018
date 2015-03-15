<?php
	include 'inc/config.php';
	if(isset($_SESSION['id_users'])) return header('Location: ./private.php');
	
	if(isset($_GET['key'])) {
		$prepare = $pdo->prepare('SELECT * FROM users WHERE confirmationcode = :confirmationcode');
		$prepare->bindValue('confirmationcode', $_GET['key']);
		$prepare->execute();
		$data = $prepare->fetch();
		
		if(!empty($data->id_users)) {
			// Account existed
			if($data->is_valid == 0) {
				$prepare = $pdo->prepare('UPDATE users SET is_valid ="1" WHERE id_users = :id_users');
				$prepare->bindValue(':id_users', $data->id_users);
				$prepare->execute();
				
				$msg = 'Votre compte vient d\'être validé, vous pouvez désormais vous connecter.';
			} else {
				$msg = 'Votre compte a déjà été validé.';
			}
		} else {
			$msg = 'Aucun compte n\'existe.';
		}
	} else {
		$msg = 'Aucun compte n\'existe.';
	}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
	<meta charset="UTF-8">
	<title>Accueil | Graphity</title>
</head>
<body class="preload">
	<div class="home">
		<h1>Graphity</h1>
		<h2>Bienvenue</h2>
		<p class="good"><?php echo $msg; ?></p>
		<a href="signin.php" class="backhome">Connexion</a>	
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>