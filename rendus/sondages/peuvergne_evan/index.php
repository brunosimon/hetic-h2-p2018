<?php

	/* SESSION */
	session_start();



	
	/*
		VIEW
	*/

	function view ($page, $css = null, $scripts = null)
	{

		$page = explode('.', $page);

		switch($page[0])
		{

			case 'admin':
				include 'web/partials/header.php';
				include 'web/pages/admin/' . $page[1] . '.php'; 
				include 'web/partials/footer.php';
				die();
			break;

			case 'public':
				include 'web/partials/header.php';
				include 'web/pages/public/' . $page[1] . '.php'; 
				include 'web/partials/footer.php';
				die();
			break;

			case 'static':
				include 'web/partials/header.php';
				include 'web/pages/statics/' . $page[1] . '.php'; 
				include 'web/partials/footer.php';
				die();
			break;

		}

	}

	
	/* HOMEPAGE */

	if(!isset($_GET['q']))
	{

		view('static.home', array('home'));
	
	}




	/* ADMIN */

	if(preg_match('/^admin/', $_GET['q']))
	{

		/* ADMIN URLS */

		if(preg_match('/^admin\/(create|connect)(\/?)$/', $_GET['q']))
		{

			/* NO AUTH */

			switch($_GET['q'])
			{

				case 'admin/create':
					view('admin.create', array('create'), array('create'));
				break;

				case 'admin/connect':
					view('admin.connect');
				break;

			}

		}
		else
		{

			/* AUTH */

			$survey = explode('/', $_GET['q']);
			$survey = $survey[sizeof($survey) - 1];

			if(!isset($_SESSION['surveys'][intval($survey)]))
			{
				$root = "http://" . $_SERVER['HTTP_HOST'] . substr($_SERVER['PHP_SELF'], 0, strlen($_SERVER['PHP_SELF']) - 9);
				header('Location: ' . $root . 'admin/connect');    
			}
			
			
			/* ROUTES */

			// EDIT

			if(preg_match('/^admin\/edit\/([0-9]+)(\/?)$/', $_GET['q']))
			{
				view('admin.edit', array('edit'), array('edit'));
			}

		}

	}


	
	/* VISUALISATION INTRO */

	if(preg_match('/view\/[0-9]+(\/?)$/', $_GET['q']))
	{
		view('public.view', array('view'));
	}


	/* VISUALISATION ISSUE */

	if(preg_match('/view\/[0-9]+\/issue-[0-9]+(\/?)$/', $_GET['q']))
	{
		view('public.issue', array('issue'), array('issue'));
	}
