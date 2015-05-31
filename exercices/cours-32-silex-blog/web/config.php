<?php

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../models/articles.class.php';

// Silex
$app = new Silex\Application();
$app['debug'] = true;

// Services
$app->register(new Silex\Provider\TwigServiceProvider(), array( 'twig.path' => __DIR__.'/../views' ));
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
$app->register(new Silex\Provider\FormServiceProvider());
$app->register(new Silex\Provider\TranslationServiceProvider());
$app->register(new Silex\Provider\ValidatorServiceProvider());
$app->register(new Silex\Provider\SwiftmailerServiceProvider(), array(
    'swiftmailer.options' => array(
        'host' => 'smtp.gmail.com',
        'port' => 465,
        'username' => 'hetic.p2018.smtp@gmail.com',
        'password' => 'heticp2018smtp',
        'encryption' => 'ssl',
        'auth_mode' => 'login'
    )
));
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array (
        'driver'    => 'pdo_mysql',
        'host'      => 'localhost',
        'dbname'    => 'hetic-p2018-blog',
        'user'      => 'root',
        'password'  => 'root',
        'charset'   => 'utf8'
    ),
));

$app['db']->setFetchMode(PDO::FETCH_OBJ);

// Models
$articles_model = new Articles_Model($app['db']);