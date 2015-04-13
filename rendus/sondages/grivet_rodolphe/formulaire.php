<?php
	


	$errors		= array();
	$success	= array();

	function get_errors($data)
	{
		$result = array();

		// Set variables
		$cour = trim($data['cour']);
		$date = trim($data['date']);
		$resumer = trim($data['resumer']);


		//Testing cour
		if(empty($cour))
			$result['cour'] = 'Vous navez pas rentré de cours.';
		else if(strlen($cour) < 2 )
			$result['cour'] = 'Votre cour est trop cours.';
		//Testing date
		if(empty($date))
			$result['date'] = 'Vous navez pas rentré date.';
		//Testing resumer
		if(empty($resumer))
			$result['resumer'] = 'Vous navez pas rentré de resumer.';
	

		return $result;
	}

	// Data sent
	if(!empty($_POST))
	{

		//Get errors
		$errors = get_errors($_POST);
		//Success
		if(empty($errors))
		{
			$success[] ='Bravo !';
		}
	}


