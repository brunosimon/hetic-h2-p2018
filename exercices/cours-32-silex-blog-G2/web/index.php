<?php

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../models/articles.class.php';

$app = new Silex\Application();
$app['debug'] = true;

// Services
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array (
        'driver'    => 'pdo_mysql',
        'host'      => 'localhost',
        'dbname'    => 'hetic-p2018-blog-G2',
        'user'      => 'root',
        'password'  => 'root',
        'charset'   => 'utf8'
    ),
));

$app['db']->setFetchMode(PDO::FETCH_OBJ);

// Models
$articles_models = new Articles_Model($app['db']);

$app->get('/',function() use ($app,$articles_models)
{
	$data = array(
		'title' => 'Home',
		'articles' => $articles_models->get_all(),
	);

	return $app['twig']->render('page.twig',$data); 
})
->bind('home');

$app->get('/page/{number}',function($number) use ($app)
{
	$data = array(
		'title' => 'Page '.$number
	);

	return $app['twig']->render('page.twig',$data); 
})
->assert('number','[0-9]+')
->bind('page');

$app->get('/article/{article}',function($article) use ($app)
{
	$data = array(
		'title' => 'Article '.$article
	);

	return $app['twig']->render('article.twig',$data); 
})
->assert('article','[a-z0-9_-]+')
->bind('article');

$app->get('/category/{category}',function($category) use ($app)
{
	$data = array(
		'title' => 'Category '.$category
	);

	return $app['twig']->render('page.twig',$data); 
})
->assert('category','[a-z0-9_-]+')
->bind('category');

$app->get('/about',function() use ($app)
{
	$data = array(
		'title' => 'About'
	);

	return $app['twig']->render('about.twig',$data); 
})
->bind('about');

$app->get('/contact',function() use ($app)
{
	$data = array(
		'title' => 'Contact'
	);

	return $app['twig']->render('contact.twig',$data); 
})
->bind('contact');


$app->run();
