<?php 
	/*
		TODO :
		[√] Create form
		[√] Handle errors
		[√] Put back data if an error occurred
	 */
	
	// Function that will return every errors in table
	function handle_errors($datas)
	{
		$errors = array();

		// Set variables
		$name   = trim($datas['name']);
		$age    = trim($datas['age']);
		$gender = trim($datas['gender']);

		// Name
		if(empty($name))
			$errors['name'] = 'Name missing';

		// Age
		if(empty($age))
			$errors['age'] = 'Age missing';
		else if($age < 0 || $age > 115)
			$errors['age'] = 'Wrong age';

		// Gender
		if(empty($gender))
			$errors['gender'] = 'Gender missing';
		else if(in_array($gender, array('male','female')))
			$errors['gender'] = 'Wrong gender';

		// Return errors
		return $errors;
	}

	// Set variables
	$errors  = array();
	$success = array();

	// Test if datas has been sent
	if(!empty($_POST))
	{
		// Default value for gender
		if(empty($_POST['gender']))
			$_POST['gender'] = '';

		// Get errors
		$errors = handle_errors($_POST);

		// No errors
		if(empty($errors))
		{
			// Success value
			$success[] = 'Bravo !';

			// Default values
			$_POST['name']   = '';
			$_POST['age']    = '';
			$_POST['gender'] = '';
		}
	}
	else
	{
		// Default values
		$_POST['name']   = '';
		$_POST['age']    = '';
		$_POST['gender'] = '';
	}

	// print_r($_POST)

?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

	<!-- ERRORS -->
	<?php if(!empty($errors)) { ?>
		<div class="errors">
			<?php foreach($errors as $_error){ ?>
				<p>
					<?php echo $_error ?>
				</p>
			<?php } ?>
		</div>
	<?php } ?>

	<!-- SUCCESS -->
	<?php if(!empty($success)) { ?>
		<div class="success">
			<?php foreach($success as $_success){ ?>
				<p>
					<?php echo $_success ?>
				</p>
			<?php } ?>
		</div>
	<?php } ?>

	<!-- FORM -->
	<form action="#" method="POST">
		<div class="<?php echo array_key_exists('name', $errors) ? 'error' : '' ?>">
			<input type="text" placeholder="Name" name="name" id="name" value="<?php echo $_POST['name'] ?>">
			<label for="name">Name</label>
		</div>
		<div class="<?php echo array_key_exists('age', $errors) ? 'error' : '' ?>">
			<input type="number" placeholder="20" name="age" id="age" value="<?php echo $_POST['age'] ?>">
			<label for="age">Age</label>
		</div>
		<div class="<?php echo array_key_exists('gender', $errors) ? 'error' : '' ?>">
			<label><input type="radio" name="gender" value="Male" <?php echo $_POST['gender'] == 'male' ? 'checked' : '' ?>> Male</label>
			<label><input type="radio" name="gender" value="Female" <?php echo $_POST['gender'] == 'female' ? 'checked' : '' ?>> Female</label>
		</div>
		<div>
			<input type="submit" value="Submit">
		</div>
	</form>
</body>
</html>