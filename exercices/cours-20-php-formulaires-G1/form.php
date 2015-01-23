<?php 
	/*
		TODO :
		[√] Create form
		[ ] Handle errors
		[ ] Put back data if an error occurred
	 */
	
	// Show errors
	error_reporting(E_ALL); 
	ini_set('display_errors', 1);

	// Function that return every errors in $data
	function get_errors($data)
	{
		$result = array();

		// Set variables
		$name   = $data['name'];
		$age    = $data['age'];
		$gender = $data['gender'];

		// Testing name
		if(empty($name))
			$result['name'] = 'Missing name';
		else if(strlen($name) <= 1)
			$result['name'] = 'Wrong name';

		// Testing age
		if(empty($age))
			$result['age'] = 'Missing age';
		else if($age < 1 || $age > 125)
			$result['age'] = 'Wrong age';

		// Testing gender
		if(empty($gender))
			$result['gender'] = 'Missing gender';
		else if(!in_array($gender,array('male','female')))
			$result['gender'] = 'Wrong gender';

		return $result;
	}

	// Set variables
	$errors  = array();
	$success = array();

	// POST is not empty
	if(!empty($_POST))
	{
		// Default gender
		if(empty($_POST['gender']))
			$_POST['gender'] = '';

		$errors = get_errors($_POST);
	}

	// POST is empty
	else
	{
		
	}

	echo '<pre>';
	print_r($_POST);
	echo '</pre>';

	echo '<pre>';
	print_r($errors);
	echo '</pre>';










