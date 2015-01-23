<?php 
	/*
		TODO :
	 */
	
	$name = empty($_COOKIE['name']) ? '' : $_COOKIE['name'];
	
	// Data sent using form
	if(!empty($_POST))
	{
		// Get and trim (remove spaces before and after) the name
		$name = trim($_POST['name']);

		// Test if name well sent
		if(!empty($name))
		{
			// Set the cookie
			setcookie('name',$name);
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
			<input type="text" name="name" placeholder="Your name">
			<input type="submit">
		</form>
	<?php else: ?>
		<p>I know you, your name is... <?= $name ?></p>
	<?php endif; ?>

</body>
</html>