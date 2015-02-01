<?php

	/*
		TODO :
		[√] Create HTML form
		[√] Handle errors
		[√] Set data back if errors occured
		[√] Handle success
	 */

	error_reporting(E_ALL); 
	ini_set('display_errors', 1);

	function get_errors($data)
	{
		$result = array();

		// Set variables
		$name   = trim($data['name']);
		$age    = trim($data['age']);
		$gender = trim($data['gender']);

		// Testing name
		if(empty($name))
			$result['name'] = 'Missing name';
		else if(strlen($name) < 2)
			$result['name'] = 'Wrong name';

		// Testing age
		if(empty($age))
			$result['age'] = 'Missing age';
		else if($age < 1 || $age > 125)
			$result['age'] = 'Wrong age';

		// Testing gender
		if(empty($gender))
			$result['gender'] = 'Missing gender';
		else if(!in_array($gender, array('male','female')))
			$result['gender'] = 'Wrong gender';

		return $result;
	}

	$errors  = array();
	$success = array();

	// Data sent
	if(!empty($_POST))
	{
		// Default gender
		if(empty($_POST['gender']))
			$_POST['gender'] = '';

		// Get errors
		$errors = get_errors($_POST);

		// Success
		if(empty($errors))
		{
			$success[] = 'Bravo !';

			$_POST['name']   = '';
			$_POST['age']    = '';
			$_POST['gender'] = '';
		}
	}

	// No data sent
	else
	{
		$_POST['name']   = '';
		$_POST['age']    = '';
		$_POST['gender'] = '';
	}

	echo '<pre>';
	print_r($_POST);
	echo '</pre>';

	echo '<pre>';
	print_r($errors);
	echo '</pre>';










