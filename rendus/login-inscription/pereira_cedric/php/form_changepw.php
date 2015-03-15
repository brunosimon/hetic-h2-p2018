<?php

$prepare = $pdo->prepare('SELECT * FROM users_lostpwd WHERE token = :token');
$prepare->bindValue(':token', $_GET['key']);
$prepare->execute();
$data = $prepare->fetch();

if(isset($data->token) && $data->token) {
	if(isset($_POST['send'])) {
		if(!empty($_POST['password']) && !empty($_POST['confirmpassword'])) {
			if($_POST['password'] == $_POST['confirmpassword']) {
				if(strlen($_POST['password']) > 7 && preg_match('/[A-Za-z]/', $_POST['password']) && preg_match('/[0-9]/', $_POST['password'])) {
					
					// All it's alright > password update
					$prepare = $pdo->prepare('UPDATE users SET pwd = :pwd, wrong_pwd = "0" WHERE id_users = :id_users');
					$prepare->bindValue(':pwd', hash('sha512', $_POST['password'].SALT));
					$prepare->bindValue(':id_users', $data->id_users);
					$prepare->execute();
					
					// Delete token to forbid another utilisation
					$prepare = $pdo->prepare('DELETE FROM users_lostpwd WHERE token = :token');
					$prepare->bindValue(':token', $_GET['key']);
					$prepare->execute();
					
					$good = 1;
				} else {
					$errors = 'Votre mot de passe n\'est pas assez complexe';
				}
			} else {
				$errors = 'Les deux mot de passe ne sont pas identiques.';
			}
		} else {
			$errors = 'Un des champs est vide.';
		}
	}
} else {
	// Redirection
	return header('Location: ./resetpassword.php');
}