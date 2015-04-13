<?php

session_start();
require 'inc/config.php';
include 'inc/form.php';

// if signup then get data about user
if(!empty($_SESSION['pseudo'])) {
	$prepare = $pdo->prepare('SELECT * FROM users WHERE pseudo LIKE BINARY :pseudo');
	$prepare->bindValue(':pseudo', $_SESSION['pseudo']);
	$prepare->execute();
	$info = $prepare->fetch();
}

$q = (isset($_GET['q']) && !empty($_GET['q']))?$_GET['q']:'';

// routing
if(empty($q)) {
	$view = 'home';
}
else if(preg_match('/^sign\/?$/', $q)) {
	// if not signup
	if(empty($_SESSION['pseudo']))
		$view = 'sign';
	else {
		header('Location: account');
		exit;
	}
}
else if(preg_match('/^account\/?$/', $q)) {
	// if not signup
	if(!empty($_SESSION['pseudo']))
		$view = 'account';
	else {
		header('Location: sign');
		exit;
	}
}
else if(preg_match('/^admin\/?$/', $q)) {
	// if admin
	if($info->range == "admin")
		$view = 'admin';
	else {
		header('Location: account');
		exit;
	}
}
else if(preg_match('/^questionnaires\/?$/', $q)) {
	$view = 'questionnaires';}
else if(preg_match('/^logout\/?$/', $q)) {
	$view = 'logout';}
else {
	$view = 'not-found';
}

ob_start();
include 'views/'.$view.'.php';
$result = ob_get_clean();

include 'partials/header.php';
?>
<div class="blackboard"></div>
<div class="container">
<?php
echo $result;
?>
</div>
<?php
include 'partials/footer.php';