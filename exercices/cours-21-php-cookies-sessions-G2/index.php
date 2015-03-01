<?php

	// Show errors
	error_reporting(E_ALL); 
	ini_set('display_errors',1);

	session_start();

	$name = !empty($_SESSION['name']) ? $_SESSION['name'] : '';

	if(!empty($_POST))
	{
		$action = $_POST['action'];

		if($action === 'save')
		{
			$name = $_POST['name'];
			$_SESSION['name'] = $name;
		}
		else
		{
			$_SESSION['name'] = null;
			$name = '';
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
		<p>Rentre ton nom</p>
		<form action="#" method="post">
			<input type="hidden" name="action" value="save">
			<input type="text" name="name" placeholder="Nom">
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






