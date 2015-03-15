<?php
/*=====================================================
=            Gestion des "user"            =
=====================================================*/
$router->addRoute(array(
	'path'     => '/account/register',
	'post'     => array('Account', 'register'),
	'get'     => array('Account', 'register'),
));

$router->addRoute(array(
	'path'     => '/account/login',
	'post'     => array('Account', 'login'),
	'get'     => array('Account', 'login'),
));

$router->addRoute(array(
	'path'     => '/account/confirm/{confirmationcode}',
	'get'     => array('Account', 'confirm'),
	'post'     => array('Account', 'confirm'),
));

$router->addRoute(array(
	'path'     => '/account/home',
	'get'     => array('Account', 'home'),
	'post'     => array('Account', 'home'),
));

$router->addRoute(array(
	'path'     => '/account/logout',
	'get'     => array('Account', 'logout'),
	'post'     => array('Account', 'logout'),
));

$router->addRoute(array(
	'path'     => '/account/recover/',
	'get'     => array('Account', 'recover'),
	'post'     => array('Account', 'recover'),
));

$router->addRoute(array(
	'path'     => '/account/recover/{code}',
	'get'     => array('Account', 'recover'),
	'post'     => array('Account', 'recover'),
));



/*=====================================================
=            Gestion des "pages"            =
=====================================================*/
$router->addRoute(array(
	'path'     => '/page/404',
	'get'     => array('Page', '_404'),
	'post'     => array('Page', '_404'),
));

$router->addRoute(array(
	'path'     => '/',
	'get'     => array('Page', 'home'),
	'post'     => array('Page', 'home'),
));

$router->addRoute(array(
	'path'     => '/page/mail_tracking/{id_sent_mail}',
	'get'     => array('Page', 'mail_tracking'),
	'post'     => array('Page', 'mail_tracking'),
));

?>