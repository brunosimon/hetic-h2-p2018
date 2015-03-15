<?php

if(isset($_POST['send'])) {

	// User email recovery in the database
	$prepare = $pdo->prepare('SELECT * FROM users WHERE email = :email');
	$prepare->bindValue(':email', $_POST['email']);
	$prepare->execute();
	$data = $prepare->fetch();
	
	// Token generate to allow the user to change his password
	if(isset($data->id_users)) {
		$token = md5(time());
		
		$prepare = $pdo->prepare('INSERT INTO `users_lostpwd`(`id_users`, `token`) VALUES (:id_users, :token)');
		$prepare->bindValue('id_users', $data->id_users);
		$prepare->bindValue('token', $token);
		$prepare->execute();
		
		// Sending the change password email
		$mail = new PHPMailer();
		$mail->SMTPDebug = 0;
		$mail->IsSMTP();
		$mail->SMTPAuth   = true;
		$mail->Host       = 'ns0.ovh.net';
		$mail->Port       = 587;
		$mail->Username   = 'dev@cedricpereira.com';
		$mail->Password   = 'devhetic';
		$mail->Subject    = 'Changement de mot de passe';
		$mail->SetFrom('dev@cedricpereira.com');
		$mail->MsgHTML('Pour changer votre mot de passe <br /> http://'.$_SERVER['SERVER_NAME'].':8888/PEREIRA_Cedric_Rendu_PHP/www/changepw.php?key='.$token.'');
		$mail->AddAddress($_POST['email']);
		$mail->Send();
		
		$good = 1;
	} else {
		$errors = 'L\'adresse de messagerie est incorrect ou n\'existe pas. Veuillez réessayer.';
	}
}