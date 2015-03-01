
<?php

	session_start();

	if(!empty($_SESSION['name']))
		$name = $_SESSION['name'];
	else
		$name = '';
	
	// Test if form sent
	if(!empty($_POST))
	{
		$action = $_POST['action'];

		// Save the name in cookies
		if($action == 'save')
		{
			$name = $_POST['name'];
			$_SESSION['name'] = $name;
		}

		// Delete the name from cookies
		else
		{
			$name = '';
			$_SESSION['name'] = null;
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php if(empty($name)): ?>
		<p>Quel est votre nom ?</p>
		<form action="#" method="post">
			<input type="hidden" name="action" value="save">
			<input type="text" name="name" placeholder="Votre nom">
			<input type="submit">
		</form>
	<?php else: ?>
		<p>Salut <?= $name ?></p>
		<form action="#" method="post">
			<input type="hidden" name="action" value="forget">
			<input type="submit" value="Forget me">
		</form>
	<?php endif; ?>
</body>
</html>










