<?php
	require 'inc/config.php';
	session_start();
	if (isset($_SESSION['name'])){
		$prepare = $pdo->prepare('SELECT * FROM user WHERE name = :name LIMIT 1');
		$prepare->bindValue(':name',$_SESSION['name']);

		$prepare->execute();
		$user = $prepare->fetch();
		if (hash('sha256',$user->password)!=$_SESSION['id']){
			header("location:inscription.php");
		}
		if (!empty($_POST['action'])){
			$_SESSION['id'] = null;
			header("location:connection.php");
		}
	} else {
		header("location:inscription.php");
	}
	echo "Bonjour " . $_SESSION['name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="#" method="post">
		<input type="hidden" name="action" value="forget">
		<input type="submit" value="Déconnecter">
	</form>
	
</body>
</html>