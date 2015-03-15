<?php
// On créer la variable des routes
$router = new Zaphpa_Router();



/***********************************************
***********************************************
Connexion BDD
***********************************************
***********************************************/
try
{
	$db = new PDO('mysql:host='.DB_HOST.'; dbname='.DB_NAME.'', DB_USER, DB_PASSWORD);
	
	// i don't like this... (Problématique pour les tableaux multidimensionnels...)
	// $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
	
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
	// Impossible de se co à la BDD
	die('An error was occured, please try again.');
}



/***********************************************
***********************************************
Session + Cookies
***********************************************
***********************************************/
session_start();

// On check les cookies si la session n'existe pas
if(!isLoggedIn() && isset($_COOKIE["xs"]))
{
	$data = explode(':', $_COOKIE["xs"]);
	$id_user = $data[0];
	$identifier = $data[1];
	$token = $data[2];
	
	$rqt = $db->prepare('SELECT * FROM auth_token WHERE id_user = :id_user AND identifier = :identifier');
	$rqt->execute(array(
		'id_user' => $id_user,
		'identifier' => $identifier,
	));
	$data = $rqt->fetch();
	
	if($data) {
		if($data['token'] == $token) {
			// Le token est bon, on le met à jour
			$new_token = md5(time().'897ds!87564');
			
			$rqt = $db->prepare('UPDATE auth_token SET token = :token, last_used_date = NOW() WHERE id_user = :id_user AND identifier = :identifier');
			$rqt->execute(array(
				'id_user' => $id_user,
				'token' => $new_token,
				'identifier' => $identifier,
			));
			
			$time = time() + 3600 * 24 * 30;
			setcookie('xs', $id_user.':'.$identifier.':'.$new_token, $time, '/', '', isset($_SERVER['HTTPS']), true);
			
			$rqt = $db->prepare('SELECT * FROM user WHERE id_user = :id_user');
			$rqt->execute(array('id_user' => $data['id_user']));
			$data = $rqt->fetch();
			
			$_SESSION['user'] = $data;
			$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
			
			// On log la connexion
			$rqt = $db->prepare('INSERT INTO `auth_log`(`id_user`, `ip`, `reverse`, `date`, `user_agent`, `login_by`) VALUES (:id_user, :ip, :reverse, NOW(), :user_agent, :login_by)');
			$rqt->execute(array(
				'id_user' => $data['id_user'],
				'ip' => $_SERVER['REMOTE_ADDR'],
				'reverse' => gethostbyaddr($_SERVER['REMOTE_ADDR']),
				'user_agent' => $_SERVER['HTTP_USER_AGENT'],
				'login_by' => 'persistent',
			));
		} else {
			// Il y a eux un vol de token, on delete tous les tokens de l'user
			$rqt = $db->prepare('DELETE FROM auth_token WHERE id_user = :id_user');
			$rqt->execute(array('id_user' => $id_user));
			
			setcookie('xs', '', time() - 3600, "/", "", isset($_SERVER['HTTPS']), true);
		}
	}
}



/***********************************************
***********************************************
Smarty
***********************************************
***********************************************/
$smarty = new Smarty;
$smarty->debugging = false;
$smarty->caching = false;
// $smarty->cache_lifetime = 120;
$smarty->template_dir = ROOT_DIR . "smarty/templates/";
$smarty->compile_dir = ROOT_DIR . "smarty/templates_c/";
$smarty->config_dir = ROOT_DIR . "smarty/configs/";
$smarty->cache_dir = ROOT_DIR . "smarty/cache/";
$smarty->plugins_dir = array(
	ROOT_DIR . "/libs/vendor/Smarty-3.1.21/libs/plugins/", // the default under SMARTY_DIR
	ROOT_DIR . "smarty/plugins/"
);

// Pour minifier le html
$smarty->registerFilter('post','minify_html');

// Variables disponibles sur tous les templates
$smarty->assign('INDEX', INDEX);

if(isLoggedIn()) {
	$smarty->assign('user', $_SESSION['user']);
	$smarty->assign('IS_LOGGED_IN', 1);
} else {
	$smarty->assign('IS_LOGGED_IN', 0);
}
?>