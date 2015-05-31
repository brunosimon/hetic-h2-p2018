<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints;

require_once __DIR__.'/config.php';

/**
 * Before
 */
$app->before(function() use ($app,$articles_model)
{
    
	$categories = $articles_model->getAllCategories();
	$app['twig']->addGlobal('categories',$categories);
});

/**
 * Home
 */
$app->get('/', function() use ($app)
{
    // View data
	$data = array(
		'active_page' => 'home'
	);

	// Return
	return $app['twig']->render('page.twig',$data);
})
->bind('home');

/**
 * Page
 */
$app->get('/page/{number}', function($number) use ($app)
{
    // View data
	$data = array(
		'active_page' => 'page',
		'active_number' => $number
	);

	// Return
	return $app['twig']->render('page.twig',$data);
})
->assert('number','[0-9]+')
->value('number',1)
->bind('page');

/**
 * Article
 */
$app->get('/article/{id}', function($id) use ($app)
{
    // View data
	$data = array(
		'active_page' => 'article',
		'title' => 'Test'
	);

	// Return
	return $app['twig']->render('article.twig',$data);
})
->assert('number','[0-9]+')
->bind('article');

/**
 * Category
 */
$app->get('/category/{category}', function($category) use ($app)
{
    // View data
	$data = array(
		'active_page' => 'article',
		'active_category' => $category,
		'title' => 'Test'
	);

	// Return
	return $app['twig']->render('page.twig',$data);
})
->assert('number','[a-z0-9_-]+')
->bind('category');

/**
 * About
 */
$app->get('/about', function() use ($app)
{
    // View data
	$data = array(
		'active_page' => 'about',
		'title' => 'About'
	);

	// Return
	return $app['twig']->render('about.twig',$data);
})
->bind('about');

/**
 * Contact
 */
$app->match('/contact', function(Request $request) use ($app)
{
    // View data
	$data = array(
		'active_page' => 'contact',
		'sent' => false,
		'title' => 'Contact'
	);

	// Create builder
	$form_builder = $app['form.factory']->createBuilder('form');

	// Set method and action
	$form_builder->setMethod('post');
	$form_builder->setAction($app['url_generator']->generate('contact'));

	// Add input
	$form_builder->add(
	    'name',
	    'text',
	    array(
	        'label'          => 'Your name',
	        'constraints'    => array(
	        	new Constraints\NotEqualTo(
	        		array(
	        			'value'   => 'fuck',
	        			'message' => 'Be polite you shithead'
        			)
    			)
			),
	        'trim'        => true,
	        'max_length'  => 50,
	        'required'    => true,
	    )
	);
	$form_builder->add(
	    'email',
	    'email',
	    array(
	        'label'      => 'Your email',
	        'trim'       => true,
	        'max_length' => 50,
	        'required'   => true,
	    )
	);
	$form_builder->add(
	    'subject',
	    'choice',
	    array(
	        'label'       => 'Subject',
	        'required'    => true,
	        'empty_value' => 'Choose a subject',
	        // 'multiple' => true,
	        // 'expanded' => true,
	        'choices'     => array(
	        	'Informations' => 'Informations',
	        	'Proposition'  => 'Proposition',
	        	'Other'        => 'Other',
        	)
	    )
	);
	$form_builder->add(
	    'message',
	    'textarea',
	    array(
	        'label'      => 'Message',
	        'trim'       => true,
	        'max_length' => 50,
	        'required'   => true,
	    )
	);
	$form_builder->add('submit','submit');

	// Create form
	$form = $form_builder->getForm();

	// Handle request
	$form->handleRequest($request);

	// Is submited
	if($form->isSubmitted())
	{
	    // Get form data
	    $form_data = $form->getData();

	    // Is valid
	    if($form->isValid())
	    {
			$message = \Swift_Message::newInstance();
		    $message->setSubject($form_data['subject'].' ('.$form_data['email'].')');
		    $message->setFrom(array($form_data['email']));
		    $message->setTo(array('bruno.simon@hetic.net'));
		    $message->setBody($form_data['message']);
		    
		    $app['mailer']->send($message);

		    return $app->redirect($app['url_generator']->generate('contact'));
	    }
	}


	// Send the form to the view
	$data['form'] = $form->createView();

	// Return
	return $app['twig']->render('contact.twig',$data);
})
->bind('contact');

/**
 * Search
 */
$app->get('/search', function() use ($app)
{
    // View data
	$data = array(
		'active_page' => 'search'
	);

	// Return
	return $app['twig']->render('page.twig',$data);
})
->bind('search');

/**
 * Error
 */
$app->error(function(\Exception $e, $code) use ($app)
{
    // If debug show 404
	if(!$app['debug'])
		return $app['twig']->render('404.twig');

	// Else show silex error
	else
		return;
});


$app->run();
