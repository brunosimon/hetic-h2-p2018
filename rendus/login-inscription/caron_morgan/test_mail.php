<?php
//this file can be manually used to try a mail token
//1.just read the DB to see the token's value
//2.change the form below to adapt it to correct values
//3. ????
//4. Profit !
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
	<html>
		<head>
			<title>Veuillez confirmer votre inscription à het.ic</title>
		</head>
		<body>
			<h1>Merci de votre inscription '.$to.' !</h1>
			<p>Merci de cliquer sur ce lien pour valider :</p>
			<form action="./register.php" method="GET">
				<input type="hidden" name="token" value="f56bdf90d8d9abac84ecae9acc34fdde">
				<input type="hidden" name="email" value="ranaa@gmail.com">
				<input type="submit" name="send" id="send" value="Envoyer">
			</form>
		</body>
	</html>
	
</body>
</html>