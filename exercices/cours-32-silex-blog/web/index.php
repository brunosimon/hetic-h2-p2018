<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;

// Twig
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));

$app->get('/',function()
{
    global $app;

    $data = array(
	    'values' => array(
	        'key1' => 'a',
	        'key2' => 'b',
	        'key3' => 'c',
	        'key4' => 'd',
	        'key5' => 'e',
	    )
	);

    return $app['twig']->render('example.twig',$data);
});





$app->get('/hello', function () {
    return 'Hello!';
});

$app->get('/hello/{first_name}-{last_name}', function($first_name,$last_name) {
    return 'Hello '.$first_name.' '.$last_name;
});

$app->get('/page/{number}', function ($number) {
    return 'Page number : '.$number;
})
->assert('number', '\d+')
->value('number', '1');

$app->get('/category/{slug}', function ($slug) {
    return 'Category slug : '.$slug;
})
->assert('slug', '[a-z0-9_]+')
->value('slug', 'test');

$app->run();
