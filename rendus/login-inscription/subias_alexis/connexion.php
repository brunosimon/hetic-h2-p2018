<?php

session_start();

require 'inc/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Index</title>
	<style>
		body{
			width: 960px;
			margin: auto;
		}

		fieldset{
			border: none;
			border-top: 3px orange solid;
			margin: auto;
		}

		fieldset legend{
			padding: 0 25px;
		}

		h1{
			text-align: center;
		}
		input{
			float: right;
		}
	</style>
</head>
<body>
	<h1>Welcome</h1>
	<fieldset id="patie_1">
		<legend> Welcome </legend>
	</fieldset>
	<?php
	//mail verification
	if(!empty($_SESSION['mail'])){ //user connected
		echo "Connected";
	}
	else{
		?>
		<script>document.location.href="login.php";</script> <!-- user not connected => redirection on the login page -->
		<?php 
	}
	?>
	<!-- 	log out function -->
	<script>
		function log_out()
		{
			<?php 
			session_unset();
			session_destroy();
			?>
			window.setTimeout("history.go(-1);",0);
		}
	</script>
	<!-- log out button -->
	<input type="button" name="Disconect" value="Log out" onclick="log_out()">
	<?php 
	exit();
	?>
</body>
</html>