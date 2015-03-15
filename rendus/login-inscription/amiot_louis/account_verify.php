<?php 

// PAGE VERIFICATION MAIL
// - Accessible via un token
// - Si pas de token ou si compte déjà validé, affichage d’un message d’erreur.
// - Sinon affichage d’un message « compte validé ».

	require 'inc/config.php';
	$error = false;
	// if there is a token as a URL parameter
	if (isset($_GET['token'])) {
		// we look for the token in db
		$token = $_GET['token'];
		$prepare = $pdo->prepare('SELECT * FROM users WHERE verifyhash = :verifyhash LIMIT 1');
		$prepare->bindValue(':verifyhash',$token);
		$prepare->execute();
		$dbtoken = $prepare->fetch();
		// if the token exists we verify account by updating active line in table to 1
		if ($dbtoken) {
			$prepare = $pdo->prepare('UPDATE users SET active = :active, verifyhash = :verifyhash2 WHERE verifyhash = :verifyhash LIMIT 1');
			$prepare->bindValue(':active',1);
			$prepare->bindValue(':verifyhash',$token);
			$prepare->bindValue(':verifyhash2','');
			$prepare->execute();
		}
		// else we display an error message
		else {
			$error = true;
		}
	}
	else {
		$error = true;
	}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Verify your account</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php if ($error) {
	?> 
	<h1>Your account must have already been verified.</h1>
	<?php
	} else {
	?>
	<h1>Your account has been verified.</h1>
	<?php } ?>
</body>
</html>