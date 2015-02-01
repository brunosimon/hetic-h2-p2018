<?php

	$lionel = !empty($_COOKIE['lionel']);
	setcookie('lionel','1',time() + 60 * 60 * 24);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
	<?php if($lionel): ?>
		<p>L'utilisateur est deja venu sur le site</p>
	<?php else: ?>
		<p>L'utilisateur est nouveau</p>
	<?php endif; ?>

</body>
</html>






