<?php
session_start();
require 'inc/config.php';
require 'inc/form.php';


$q = !empty($_GET['q']) ? $_GET['q'] : '';

if(empty($q) || preg_match('/^home\/?$/', $q))
{
	$view = 'home';
}
else if(preg_match('/^inscription\/?$/', $q))
{
	$view = 'inscription';
}
else if(preg_match('/^login\/?$/', $q))
{
	$view = 'login';
}
else if(preg_match('/^choose\/?$/', $q))
{
	$view = 'choose';
}
else if(preg_match('/^stat(s)?\/?$/', $q))
{
	$view = 'stat';
}
else
{
	$view = 'not-found';
}


ob_start();
include 'views/'.$view.'.php';
$result = ob_get_clean();

include 'partials/header.php';
echo $result;
include 'partials/footer.php';
?>