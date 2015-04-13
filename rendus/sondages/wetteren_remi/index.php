<?php 

$q = !empty($_GET['q']) ? $_GET['q'] : '' ;

if(empty($q)){
	$view ="home";
}
else if((preg_match('/^quel-psychopathe-etes-vous\/?$/', $q))){
	$view ="sondage";
}
else if((preg_match('/^stats\/?$/', $q))){
	$view ="stats";
}
else if((preg_match('/^psycho\/?$/', $q))){
	$view ="psycho";
}
else if((preg_match('/^not_psycho\/?$/', $q))){
	$view ="not_psycho";
}
else if((preg_match('/^resultats\/?$/', $q))){
	$view ="resultats";
}
else if((preg_match('/^contact\/?$/', $q))){
	$view ="contact";
}
else if((preg_match('/^map\/?$/', $q))){
	$view ="carte";
}
else if((preg_match('/^mail\/?$/', $q))){
	$view ="mail";
}
else if((preg_match('/^goodMail\/?$/', $q))){
	$view ="goodMail";
}
else if((preg_match('/^erreurMail\/?$/', $q))){
	$view ="erreurMail";
}
else if((preg_match('/^infos\/?$/', $q))){
	$view ="infos";
}
else{
    $view ="404";
}

ob_start();
include 'views/'.$view.'.php';
$result = ob_get_clean();

include 'partials/header.php';
include 'partials/menu.php';
echo $result;
include 'partials/footer.php';