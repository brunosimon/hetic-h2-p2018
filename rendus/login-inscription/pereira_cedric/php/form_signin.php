<?php 

if(isset($_POST['send'])) {
	if(!empty($_POST['email']) && !empty($_POST['password'])) {

		// Data recovery in the database
		$prepare = $pdo->prepare('SELECT * FROM users WHERE email = :email');
		$prepare->bindValue(':email', $_POST['email']);
		$prepare->execute();
		$data = $prepare->fetch();
		
		if(isset($data->id_users)) {
			if($data->wrong_pwd < WRONG_PWD_MAX) {
				if($data->pwd == hash('sha512', $_POST['password'].SALT)) {
					if($data->is_valid == 1) {

						// If the password is valid and the user connected > Reset the wrong_pwd counter
						$prepare = $pdo->prepare('UPDATE users SET wrong_pwd = "0" WHERE id_users = :id_users');
						$prepare->bindValue(':id_users', $data->id_users);
						$prepare->execute();

						// All it's alright, creation of the session
						$_SESSION['id_users'] = $data->id_users;
						$_SESSION['email'] = $data->email;
						
						// To keep the user connected, we create the cookie
						if(isset($_POST['rememberme'])) {
							$identifier = md5(time());
							$token = md5(time().SALT);

							// Token is saved in the database
							$prepare = $pdo->prepare('INSERT INTO `users_tokens`(`id_users`, `identifier`, `token`) VALUES (:id_users, :identifier, :token)');
							$prepare->bindValue(':id_users', $data->id_users);
							$prepare->bindValue(':identifier', $identifier);
							$prepare->bindValue(':token', $token);
							$prepare->execute();
							
							// Cookie duration
							$time = time() + 3600 * 24 * 30;
							setcookie('remember', $data->id_users.':'.$identifier.':'.$token, $time, '/');
						}
						
						// Redirection after user login
						return header('Location: ./private.php');
					} else {
						$errors = 'Le compte n\'est pas encore validé.';
					}
				} else {
					// Password error > Saved to the database to limit login attempt
					$prepare = $pdo->prepare('UPDATE users SET wrong_pwd = wrong_pwd +1 WHERE id_users = :id_users');
					$prepare->bindValue(':id_users', $data->id_users);
					$prepare->execute();
					
					$errors = 'La combinaison email et mot de passe est incorrect';
				}
			} else {
				$errors = 'Vous avez atteint le maximum d\'erreurs de mot de passe, veuillez faire mot de passe oublié';
			}
		} else {
			$errors = 'La combinaison email et mot de passe est incorrect';
		}
	} else {
		$errors = 'Un des champs est vide';
	}
}