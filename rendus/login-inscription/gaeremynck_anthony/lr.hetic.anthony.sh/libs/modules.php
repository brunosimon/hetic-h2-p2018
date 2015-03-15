<?php
class Account {
	public function __construct() {
		global $db, $smarty;
		$this->db = $db;
		$this->smarty = $smarty;
	}
	
	// Inscription
	public function register($req, $res) {
		if(isLoggedIn()) return header('Location: '.INDEX.'/account/home');
		
		if(isset($_POST['send'])) {
			// Envoi du formulaire
			if(!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['pwd']) && !empty($_POST['pwd2'])) {
				if($_POST['pwd'] == $_POST['pwd2']) {
					if(emailcheck($_POST['email'])) {
						if(check_password($_POST['pwd'])) {
							if(!is_ip_blacklisted($_SERVER['REMOTE_ADDR'])) {
								$rqt = $this->db->prepare('SELECT COUNT(*) AS nbr FROM user WHERE email = :email');
								$rqt->execute(array('email' => $_POST['email']));
								$data = $rqt->fetch();
								
								if($data['nbr'] == 0) {
									$rqt = $this->db->prepare('SELECT COUNT(*) AS nbr FROM user WHERE pseudo = :pseudo');
									$rqt->execute(array('pseudo' => $_POST['pseudo']));
									$data = $rqt->fetch();
									
									if($data['nbr'] == 0) {
										// On créer le compte :o
										$confirmation_code = md5(microtime() . $_POST['email']);
										
										$rqt = $this->db->prepare('INSERT INTO `user`(`pseudo`, `email`, `confirmation_code`, `pwd`, `birth_date`, `creation`) VALUES (:pseudo, :email, :confirmation_code, :pwd, :birth_date, NOW())');
										$rqt->execute(array(
											'pseudo' => $_POST['pseudo'],
											'email' => $_POST['email'],
											'confirmation_code' => $confirmation_code,
											'pwd' => pwd_crypt($_POST['pwd']),
											'birth_date' => date2db($_POST['birth_date']),
										));
										$id_user = $this->db->lastInsertId();
										
										// On met un beau petit message sur la page d'inscription
										$this->smarty->assign('msg', 'Bravo ! Tu as réussi à t\'inscrire :) Nous venons de t\'envoyer un mail de validation ;))');
										
										// on lui envoi un putain de mail pour qu'il valide son compte
										
										$content = 'Clique sur ce jolie lien : <a href="'.INDEX.'/account/confirm/'.$confirmation_code.'?1">'.INDEX.'/account/confirm/'.$confirmation_code.'</a>';
										send_mail($id_user, $_POST['email'], 'Valide ton inscription', $content);
									} else {
										$error = 'Je suis vraiment désolé mais ce pseudo est déjà pris, et ho combien je sais que c\'est chiant de s\'être fait voler son pseudo ;)';
									}
								} else {
									$error = 'Cette adresse mail est déjà utilisée... Aurais-tu oublier que tu t\'es déjà inscris ? ... Sinon tu peux faire mot de passe oublié ;)';
								}
							} else {
								$error = 'Il semblerait que ton IP soit blacklister, try to disable your fucking proxy or stop fucking bot !';
							}
						} else {
							$error = 'Le mot de passe n\'est pas assez compliqué, celui-ci soit comporter au moins 8 caractères, 1 chiffre & une lettre !';
						}
					} else {
						$error = 'Tu sais se que c\'est une adresse mail ou tu essaye juste pour check si sa fonctionne ? ^^';
					}
				} else {
					$error = 'Quand on te dit de retaper le même mot de passe, c\'est pas pour rien !';
				}
			} else {
				$error = 'Hum hum un des champs est vide...';
			}
			
			if(!empty($error)) $this->smarty->assign('error', $error);
			$this->smarty->assign('post', $_POST);
		}
		
		$this->smarty->display('account-register.tpl');
	}
	
	// Connexion
	public function login($req, $res) {
		if(isLoggedIn()) return header('Location: '.INDEX.'/account/home');
		
		if(isset($_POST['send'])) {
			$rqt = $this->db->prepare('SELECT * FROM user WHERE pseudo = :pseudo');
			$rqt->execute(array('pseudo' => $_POST['pseudo']));
			$data = $rqt->fetch();
			
			if($data['wrong_password'] < MAX_WRONG_PWD) {
				if($data['id_user']) {
					if(pwd_match($_POST['pwd'], $data['pwd'])) {
						if($data['confirmed']) {
							$url = INDEX.'/account/home';
							
							// On créer la session
							$_SESSION['user'] = $data;
							$_SESSION['ip'] = $_SERVER["REMOTE_ADDR"];
							
							// On remet le nombre de mauvais password à 0
							$rqt = $this->db->prepare('UPDATE user SET wrong_password = "0" WHERE id_user = :id_user');
							$rqt->execute(array('id_user' => $data['id_user']));
							
							// On log sa connexion
							$rqt = $this->db->prepare('INSERT INTO `auth_log`(`id_user`, `ip`, `reverse`, `date`, `user_agent`, `login_by`) VALUES (:id_user, :ip, :reverse, NOW(), :user_agent, :login_by)');
							$rqt->execute(array(
								'id_user' => $data['id_user'],
								'ip' => $_SERVER['REMOTE_ADDR'],
								'reverse' => gethostbyaddr($_SERVER['REMOTE_ADDR']),
								'user_agent' => $_SERVER['HTTP_USER_AGENT'],
								'login_by' => 'login_form',
							));
							
							// On créer le cookie
							if($_POST['remember']) {
								$identifier = md5(microtime());
								$token = md5(microtime().'897ds!87564');
								
								$rqt = $this->db->prepare('INSERT INTO `auth_token`(`id_user`, `identifier`, `token`, `last_used_date`) VALUES (:id_user, :identifier, :token, NOW())');
								$rqt->execute(array(
									'id_user' => $data['id_user'],
									'identifier' => $identifier,
									'token' => $token,
								));
								
								$time = time() + 3600 * 24 * 30;
								setcookie('xs', $data['id_user'].':'.$identifier.':'.$token, $time, '/', '', isset($_SERVER['HTTPS']), true);
							}
							
							// Si l'user viens d'une page qui nécessite d'être log, on le redirige vers celle-ci.
							if (isset($_COOKIE['r'])){
								$url = urldecode($_COOKIE['r']);
							}
							
							// On supprime le cookie de redirection
							setcookie('r', '', time() - 3600, '/');
							
							// Hop on le redirige après la connexion
							header('Location: '.$url);
						} else {
							$error = 'Votre compte n\'est pas encore validé, cliquez sur le lien dans le mail.';
						}
					} else {
						// On rajoute une erreur de pass en db
						$rqt = $this->db->prepare('UPDATE user SET wrong_password = wrong_password + 1 WHERE id_user = :id_user');
						$rqt->execute(array('id_user' => $data['id_user']));
						
						$error = 'Les identifiants sont incorrects';
					}
				} else {
					$error = 'Les identifiants sont incorrects';
				}
			} else {
				$error = 'Vous avez atteint le maximum de password incorrects. Vous êtes obliger de faire <a href="/account/recover">mot de passe oublié</a>';
			}
		}
		
		if(!empty($error)) $this->smarty->assign('error', $error);
		$this->smarty->display('account-login.tpl');
	}
	
	// Confirmation du compte
	public function confirm($req, $res) {
		if(isLoggedIn()) return header('Location: '.INDEX.'/account/home');

		$rqt = $this->db->prepare('SELECT * FROM user WHERE confirmation_code = :confirmation_code');
		$rqt->execute(array('confirmation_code' => $req->params['confirmationcode']));
		$data = $rqt->fetch();
		
		// On vérifie que le compte existe qu'il n'a pas déjà été confirmé
		if($data['id_user'] && $data['confirmed'] == 0) {
			$rqt = $this->db->prepare('UPDATE user SET confirmed="1" WHERE id_user = :id_user');
			$rqt->execute(array('id_user' => $data['id_user']));
			
			$this->smarty->assign('good', 1);
			
			// Envoi du mail de validation
			$content = 'Félicitations ! Votre compte a bien été validé ! Merci de nous faire confiance :)';
			send_mail($data['id_user'], $data['email'], 'Inscription validée !', $content);
		} elseif($data['id_user'] && $data['confirmed'] == 1) {
			// Le compte a déjà été confirmé
			$this->smarty->assign('good', 2);
		}
		$this->smarty->display('account-confirm.tpl');
	}
	
	// Page du compte
	public function home($req, $res) {
		need_login();
	
		$rqt = $this->db->prepare('SELECT * FROM user WHERE id_user = :id_user');
		$rqt->execute(array('id_user' => $_SESSION['user']['id_user']));
		$data = $rqt->fetch();
		
		$data['age'] = age($data['birth_date']);
		
		$this->smarty->assign('user', $data);
		$this->smarty->display('account-home.tpl');
	}
	
	// Mot de passe oublié
	public function recover($req, $res) {
		if(isLoggedIn()) return header('Location: '.INDEX.'/account/home');
		
		// Changement du mot de passe
		if(!empty($req->params['code'])) {
			$this->smarty->assign('changepw', 1);
			
			$rqt = $this->db->prepare('SELECT * FROM request_password WHERE code = :code AND used = "0"');
			$rqt->execute(array('code' => $req->params['code']));
			$data = $rqt->fetch();
			if(!$data) page_not_found();
			
			if(isset($_POST['send_changepw'])) {
				if(!empty($_POST['pwd']) && !empty($_POST['pwd2'])) {
					if($_POST['pwd'] == $_POST['pwd2']) {
						if(check_password($_POST['pwd'])) {
							$this->smarty->assign('good', 'Votre mot de passe a bien été changé, vous pouvez maintenant vous <a href="/account/login">connectez</a>');
							
							// On met à jour le password
							$rqt = $this->db->prepare('UPDATE user SET pwd = :pwd, wrong_password = "0" WHERE id_user = :id_user');
							$rqt->execute(array(
								'id_user' => $data['id_user'],
								'pwd' => pwd_crypt($_POST['pwd']),
							));
							
							// On marque le request comme utilisé
							$rqt = $this->db->prepare('UPDATE request_password SET used = "1" WHERE id_request_password = :id_request_password');
							$rqt->execute(array('id_request_password' => $data['id_request_password']));
						} else {
							$error = 'Le mot de passe n\'est pas assez compliqué, celui-ci soit comporter au moins 8 caractères, 1 chiffre & une lettre !';
						}
					} else {
						$error = 'Les deux mots de passes sont différents...';
					}
				} else {
					$error = 'Un des champs est vide...';
				}
				
				if(!empty($error)) $this->smarty->assign('error', $error);
			}
		}
		
		// Demande du lien pour changer le mot de passe
		if(isset($_POST['send'])) {
			if(!empty($_POST['email']) && !empty($_POST['pseudo'])) {
				$rqt = $this->db->prepare('SELECT * FROM user WHERE email = :email AND pseudo = :pseudo');
				$rqt->execute(array(
					'email' => $_POST['email'],
					'pseudo' => $_POST['pseudo'],
				));
				$data = $rqt->fetch();
				
				if($data) {
					$this->smarty->assign('good', 'Un mail viens de t\'être envoyé !');
					
					$code = md5(microtime() . $data['email'].time().sha1(md5($data['email'])));
					
					// On créer la demande de password
					$rqt = $this->db->prepare('INSERT INTO `request_password`(`id_user`, `code`, `date`) VALUES (:id_user, :code, NOW())');
					$rqt->execute(array(
						'id_user' => $data['id_user'],
						'code' => $code,
					));
					
					// On envoi le mail avec le lien pour changer de password
					$content = 'On espère que cette fois tu n\'oublieras plus ton mot de passe...<br/><a href="'.INDEX.'/account/recover/'.$code.'?1">'.INDEX.'/account/recover/'.$code.'</a>';
					send_mail($data['id_user'], $data['email'], 'Mot de passe oublié', $content);
				} else {
					$error = 'Aucun compte n\'existe avec cette adresse mail & pseudo.';
				}
			} else {
				$error = 'Un des champs est vide...';
			}
			
			if(!empty($error)) $this->smarty->assign('error', $error);
			$this->smarty->assign('post', $_POST);
		}
		
		$this->smarty->display('account-recover.tpl');
	}
	
	// déconnexion de l'user
	public function logout($req, $res) {
		
		// On supprime le cookie courant
		if(isset($_COOKIE["xs"])){
			$data = explode(':', $_COOKIE["xs"]);

			$rqt = $this->db->prepare('DELETE FROM auth_token WHERE id_user = :id_user AND identifier = :identifier AND token = :token');
			$rqt->execute(array(
				'id_user' => $data[0],
				'identifier' => $data[1],
				'token' => $data[2],
			));
			
			setcookie('xs', '', time() - 3600, "/", "", isset($_SERVER['HTTPS']), true);
		}
		
		// On supprime la session et on redirige
		unset($_SESSION['user']);
		unset($_SESSION['ip']);
		header('Location: '.INDEX);
	}
}

class Page {
	public function __construct() {
		global $db, $smarty;
		$this->db = $db;
		$this->smarty = $smarty;
	}
	
	// Page 404
	public function _404($req, $res) {
		$this->smarty->display('page-404.tpl');
	}
	
	// Page d'accueil
	public function home($req, $res) {
		if(isLoggedIn()) return header('Location: '.INDEX.'/account/home');
		
		$this->smarty->display('page-home.tpl');
	}
	
	// Tracking d'ouverture d'email
	public function mail_tracking($req, $res) {
		$file_path = ROOT_DIR.'/www/static/img/logo.jpg';
		header("Content-type: ".mime_content_type($file_path));

		$rqt = $this->db->prepare('UPDATE sent_mail SET opened = "1", open_date = NOW() WHERE id_sent_mail = :id_sent_mail');
		$rqt->execute(array('id_sent_mail' => $req->params['id_sent_mail']));

		readfile($file_path);
	}
}