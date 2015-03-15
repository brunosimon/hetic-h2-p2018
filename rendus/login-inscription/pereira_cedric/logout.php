<?php
	include 'inc/config.php';

	// Delete user cookie and user session
	if(isset($_COOKIE["remember"])){
		$data = explode(':', $_COOKIE["remember"]);

		$prepare = $pdo->prepare('DELETE FROM users_tokens WHERE id_users = :id_users AND identifier = :identifier AND token = :token');
		$prepare->bindValue(':id_users', $_SESSION['id_users']);
		$prepare->bindValue(':identifier', $data[1]);
		$prepare->bindValue(':token', $data[2]);
		$prepare->execute();
		
		setcookie('remember', '', time() - 3600, "/");
	}
		
	// Delete user session and user redirection
	unset($_SESSION['id_users']);
	unset($_SESSION['email']);
	header('Location: ./');