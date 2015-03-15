<?php

class UserModel extends Model {

	public function getAllUser () {

		var_dump($this->readAll());
	}

	public function createAccount ($data) {

		$data['token_validation'] = uniqid();

		$this->create($data);

		$transport = Swift_SmtpTransport::newInstance(SMTP, 25)
		 ->setUsername(USER_MAIL)
		 ->setPassword(PASSWORD_MAIL);
		$mailer = Swift_Mailer::newInstance($transport);

		$message = Swift_Message::newInstance('Bienvenu sur le site')
		 ->setFrom(array('hello@baloran.fr' => 'Baloran Corporation'))
		 ->setTo(array($data['email']))
		 ->setBody('Ahoj, <br> Ici le lien pour valider votre compte: <a href="'.BASE_PATH.'user/'.$data['token_validation'].'">'.BASE_PATH.'user/validate/'.$data['token_validation'].'</a> <br> <br> The bot. <3', 'text/html');

		$result = $mailer->send($message);

		header('Location: '.BASE_PATH.'user/login');
	}

	public function connect ($data) {

		$user = $this->readOne('email', $data['email']);

		if ($user->code == 200) {

			if ($user->data->password == hash('sha256', SALT, $data['password'])) {

				$_SESSION['user']['email'] = $user->data->email;
				$_SESSION['user']['pseudo'] = ($user->data->pseudo) ? $user->data->pseudo : null;
				$_SESSION['user']['id'] = $user->data->id;

				header('Location: '.BASE_PATH.'user/profil');
			} else {
				$error['login'] = "Bad login";
				$_SESSION['error'] = $error;
				header('Location: '.BASE_PATH.'user/login');
			}
		} else {

			$error['login'] = "Bad login";
			$_SESSION['error'] = $error;
			header('Location: '.BASE_PATH.'user/login');

		}
	}

	public function firstTime ($data) {

		$user = $this->updateOne('pseudo', $data['pseudo']);

		if ($user) {
			$_SESSION['user']['pseudo'] = $data['pseudo'];
			header('Location: '.BASE_PATH.'user/profil');
		} else {
			$error['pseudo'] = "Bad Pseudo";
			$_SESSION['error'] = $error;
			header('Location: '.BASE_PATH.'user/first');
		}
	}

	public function validate ($token) {

		$user = $this->readOne('token_validation', $token);

		if ($user->code == 200) {

			$up = $this->updateOne('verified', true, $user->data->id);

			if ($up) {
				$_SESSION['info'] = "Votre compte est valider";
				header('Location: '.BASE_PATH.'user/login');
			} else {
				$_SESSION['info'] = "Pas de compte associer";
				header('Location: '.BASE_PATH.'user/login');
			}
		} else {
			$_SESSION['info'] = "Pas de compte associer";
			header('Location: '.BASE_PATH.'user/login');
		}

	}
}