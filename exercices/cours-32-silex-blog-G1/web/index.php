<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;

// Twig
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));

$app->get('/', function() use ($app) {

	$data = array(
	    'value' => '     Toto'
	);

	return $app['twig']->render('example.twig',$data);
});



$app->run();
