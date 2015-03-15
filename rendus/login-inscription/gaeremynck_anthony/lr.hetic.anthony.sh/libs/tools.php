<?php
/*=====================================================
=                                     Mini Doc        =

$req->clientIP // IP de la requête
$req->protocol // Protocol (Ex : HTTP/1.1)
$req->userAgent // Navigateur

=====================================================*/
function page_not_found() {
	header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
	header('Location: '.INDEX.'/page/404');
	return true;
}

function page_not_allowed() {
	header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden"); 
	
	if(isLoggedIn()) {
		header("Location: ".INDEX."/page/403/");
	} else {
		header("Location: ".INDEX."/account/login/");	
		$time = time() + 3600*24; //redirection valable 1jour
		$url = INDEX.$_SERVER["REQUEST_URI"];
		setcookie('r', $url, $time, '/');
	}
	exit;
}

function need_login() {
	if(!isLoggedIn()) {
		header("Location: ".INDEX."/account/login/");	
		$time = time() + 3600*24; //redirection valable 1jour
		$url = INDEX.$_SERVER["REQUEST_URI"];
		setcookie('r', $url, $time, '/');
	}
	return true;
}

// Crypter le password
function pwd_crypt($pwd, $salt = "") {
    if(strlen($salt) < 4) {
        $salt = base64_encode(md5(microtime(), TRUE));
    }
    $salt = substr($salt, 0, 4);
    $ret = $salt . sha1($salt . $pwd);
    
    return $ret;
}

// Vérifier que le password est correct avec le hash en bdd
function pwd_match($pwd, $crypted) {
    if ($crypted == pwd_crypt($pwd, $crypted)) {
        return true;
    }
    return false;
}

// Est-ce que le user est connecté
function isLoggedIn() {
    if(!isset($_SESSION["user"])) {
        return false;
    }
	return true;
}

// Est-ce que le user est un SuperUser
function isSuperUser()
{
    if(isLoggedIn() && $_SESSION["user"]["superuser"] == TRUE) {
        return true;
    }
    return false;
}

// Vérifier le format d'une adresse mail
function emailcheck($value) {
    if(!preg_match("/^([-_a-z0-9+.])+\@([-a-z0-9]+\.)+([a-z]){2,}$/i", $value)) {
        return false;
    }
    return true;
}

// Regarder la complexité d'un password
function check_password($pwd) {
    if(strlen($pwd) < 8) {
       return false;
    } elseif(!preg_match("#[0-9]+#", $pwd)) {
        return false;
    } elseif(!preg_match("#[a-zA-Z]+#", $pwd)) {
       return false;
    }     

	return true;
}

// Pour minifier le html
function minify_html($tpl_source, $smarty)
{
	$options = array(
		'cssMinifier' => array('Minify_CSS_Compressor', 'process'),
		'xhtml' => 0
	);
	$min = new Minify_HTML($tpl_source, $options);
    $html = $min->process();
	return $html;
}

// Envoyer un mail
function send_mail($id_user, $email, $subject, $content) {
	global $db, $smarty;
	
	$req = $db->prepare('INSERT INTO `sent_mail`(`id_user`, `email`, `sent_date`, `subject`) VALUES (:id_user, :email, NOW(), :subject)');
	$req->execute(array(
		'id_user' => $id_user,
		'email' => $email,
		'subject' => $subject,
	));
	$id_send_mail = $db->lastInsertId();
	
	$smarty->assign('content', $content);
	$output = $smarty->fetch('_mail.tpl');
	$output = preg_replace('/(?<=href=")[^"]+/', '$0&cie='.$id_send_mail, $output);
	$output = str_replace('logo.jpg', $id_send_mail.'?logo.jpg', $output);
	
	$mail = new PHPMailer;
	$mail->SMTPDebug = 0;
	$mail->IsSmtp();
	$mail->SMTPAuth = true;
	$mail->Port = 25;
	
	$mail->Host = MAIL_SMTP;
	$mail->Username = MAIL_ADDRESS;
	$mail->Password = MAIL_PASSWORD;

	$mail->From = MAIL_ADDRESS;
	$mail->FromName = MAIL_SENDER;
	$mail->addAddress($email);
	
	$mail->isHTML(true);
	$mail->Subject = utf8_decode($subject);
	$mail->Body = $output;
	$mail->send();
}

// Ip is blacklisted
function is_ip_blacklisted($ip) {
	$curl_handle = curl_init();
		curl_setopt($curl_handle, CURLOPT_URL, 'http://ip.api.anthony.sh/ipv4/'.$ip);
		curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);

		$buffer = json_decode(curl_exec($curl_handle));
		curl_close($curl_handle);
		
		if($buffer->status == 'OK') {
			return $buffer->content->blacklisted;
		} else {
			return 0;
		}
}

// Convertir une date FR en date pour de la db
function date2db($d)
{
    return preg_replace('&([0-9]{2})/([0-9]{2})/([0-9]{4})&', '$3-$2-$1', $d);
}

// Connaître l'age à partir de l'année de naissance
function age($naiss)  {
	list($annee, $mois, $jour) = preg_split('[-.]', $naiss);
	$today['mois'] = date('n');
	$today['jour'] = date('j');
	$today['annee'] = date('Y');
	$annees = $today['annee'] - $annee;
	if ($today['mois'] <= $mois) {
		if ($mois == $today['mois']) {
			if ($jour > $today['jour'])
				$annees--;
		}
		else
			$annees--;
    }
	return $annees;
}
?>