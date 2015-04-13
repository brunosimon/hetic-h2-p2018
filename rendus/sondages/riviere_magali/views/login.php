<?php 
$title = 'Login';
?>

<h1>Login</h1>
<?php if($error == true) echo '<div class="alert alert-login">Identifiants incorrects</div>'; ?>
<form action="#" method="POST">

	<div>
		<input type="text" name="mail_log" id="name">
		<label class="label-login" for="name">Mail ou Pseudo</label>
	</div>
	
	<div>
		<input type="password" name="password_log" id="password">
		<label class="label-login" for="password">Password</label>
	</div>

	<input class="valid-login" type="submit" name="login" value="Se connecter">
</form>