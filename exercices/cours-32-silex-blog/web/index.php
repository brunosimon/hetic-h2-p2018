<?php

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
$app->match('/contact', function(Symfony\Component\HttpFoundation\Request $request) use ($app)
{
    // View data
	$data = array(
		'active_page' => 'contact',
		'sent' => false,
		'title' => 'Contact'
	);

	// Form
	$form_data = array(
		'name'    => '',
		'email'   => '',
		'message' => '',
	);

	$form_builder = $app['form.factory']->createBuilder('form', $form_data);
    $form_builder->add('name');
    $form_builder->add('email');
    $form_builder->add('message','textarea');

    $form = $form_builder->getForm();
    $form->handleRequest($request);
    $data['form'] = $form->createView();

    // Valid form
    if($form->isValid())
    {
    	$form_data = $form->getData();
        
		// Send mail
		$message = \Swift_Message::newInstance();
	    $message->setSubject('Mail from: '.$form_data['name']);
	    $message->setFrom(array($form_data['email']));
	    $message->setTo(array('simon.bruno.77@gmail.com'));
	    $message->setBody($form_data['message']);

	    $app['mailer']->send($message);

	    // Todo : reset values

	    // Set as sent
	    $data['sent'] = true;
    }

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
