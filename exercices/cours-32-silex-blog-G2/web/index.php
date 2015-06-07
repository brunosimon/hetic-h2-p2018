<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints;

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../models/articles.class.php';

$app = new Silex\Application();
$app['debug'] = true;

// Services
$app->register(new Silex\Provider\FormServiceProvider());
$app->register(new Silex\Provider\TranslationServiceProvider());
$app->register(new Silex\Provider\ValidatorServiceProvider());
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
$app->register(new Silex\Provider\SwiftmailerServiceProvider(), array(
    'swiftmailer.options' => array(
        'host'       => 'smtp.gmail.com',
        'port'       => 465,
        'username'   => 'hetic.p2018.smtp@gmail.com',
        'password'   => 'heticp2018smtp',
        'encryption' => 'ssl',
        'auth_mode'  => 'login'
    )
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

$app->match('/contact',function(Request $request) use ($app)
{
	$data = array(
		'title' => 'Contact'
	);

	// Create form builder
	$form_builder = $app['form.factory']->createBuilder('form');

	// Set up builder
	$form_builder->setAction($app['url_generator']->generate('contact'));
	$form_builder->setMethod('post');

	// Add inputs
	$form_builder->add(
		'name',
		'text',
		array(
			'label' => 'Your name',
			'max_length' => 50,
			'trim' => true,
			'error_bubbling' => true,
			'constraints' => array(
				new Constraints\NotEqualTo(
					array(
						'value' => 'fuck',
						'message' => 'Be polite you shithead'
					)
				)
			)
		)
	);
	$form_builder->add(
		'email',
		'email',
		array(
			'label' => 'Your email',
			'trim' => true
		)
	);
	$form_builder->add(
		'subject',
		'choice',
		array(
			'label'   => 'Toto',
			'choices' => array(
				'sujet 1' => 'sujet 1',
				'sujet 2' => 'sujet 2',
				'sujet 3' => 'sujet 3',
			)
		)
	);
	$form_builder->add(
		'message',
		'textarea',
		array(
			'label' => 'Your message',
			'trim' => true,
		)
	);
	$form_builder->add(
		'submit',
		'submit'
	);

	// Create form
	$form = $form_builder->getForm();

	// Handle request
	$form->handleRequest($request);

	// Test if form submitted
	if($form->isSubmitted())
	{
		$form_data = $form->getData();

		if($form->isValid())
		{
			$message = \Swift_Message::newInstance();

			$message->setSubject($form_data['subject'].' ('.$form_data['email'].')');
			$message->setFrom($form_data['email']);
			$message->setTo('bruno.simon@hetic.net');
			$message->setBody($form_data['message']);

			$app['mailer']->send($message);

			// echo '<pre>';
			// print_r($form_data);
			// echo '</pre>';
		}
	}

	$data['form'] = $form->createView();


	return $app['twig']->render('contact.twig',$data); 
})
->bind('contact');


$app->run();
