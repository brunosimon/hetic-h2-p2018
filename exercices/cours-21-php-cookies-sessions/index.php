<?php 
	/*
		TODO :
		[ ] Save
		[ ] Forget
	 */
	
	$name = empty($_COOKIE['name']) ? '' : $_COOKIE['name'];
	
	// Data sent using form
	if(!empty($_POST))
	{
		// Action save
		if($_POST['action'] == 'save')
		{
			// Get and trim (remove spaces before and after) the name
			$name = trim($_POST['name']);

			// Test if name well sent
			if(!empty($name))
			{
				// Set the cookie
				setcookie('name',$name,time()+60*2);
			}
		}

		// Action forget
		else
		{
			setcookie('name',$name,time() - 10);
			$name = '';
		}
	}

?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	
	<?php if(empty($name)): ?>
		<p>I don't know your name...</p>
		<form action="#" method="POST">
			<input type="hidden" name="action" value="save">
			<input type="text" name="name" placeholder="Your name">
			<input type="submit" value="Save">
		</form>
	<?php else: ?>
		<p>I know you, your name is... <?= $name ?></p>

		<form action="#" method="POST">
			<input type="hidden" name="action" value="forget">
			<input type="submit" value="Forget">
		</form>
	<?php endif; ?>

</body>
</html>