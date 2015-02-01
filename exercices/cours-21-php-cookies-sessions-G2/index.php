<?php

	// Show errors
	error_reporting(E_ALL); 
	ini_set('display_errors',1);

	$name = !empty($_COOKIE['name']) ? $_COOKIE['name'] : '';

	if(!empty($_POST))
	{
		$action = $_POST['action'];

		if($action === 'save')
		{
			$name = $_POST['name'];
			setcookie('name',$name,time() + 60 * 10);
		}
		else
		{
			setcookie('name','',time() - 10);
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






