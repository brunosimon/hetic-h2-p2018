<?php
	$title = "Espace membre";
	session_start();
	if(!isset($_SESSION['login'])){
		header('Location: index');
	}
	require 'inc/header.php';
?>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
			<h1 class="site-title">Espace membre</h1>
	
			<div class="panel panel-default"> 
				<div class="panel-heading">
		    		<h3 class="panel-title" style="color:#555"><span class="text-muted">Bienvenue</span> <?=$_SESSION['login']?> </h3>
		 		</div>
				
				<div class="panel-body">
					<p><b>Votre navigateur:</b><br /> <?=$_SERVER["HTTP_USER_AGENT"]?></p>
					<p><b>Votre adresse IP:</b> <?=$_SERVER["REMOTE_ADDR"]?></p>
					<p><b>Votre langue:</b> <?php echo explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE'])[0]; ?></p>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1 bot20">
		<a href="deconnexion" class="btn btn-primary w100">Se déconnecter</a>
	</div>
</div>
</body>
</html>