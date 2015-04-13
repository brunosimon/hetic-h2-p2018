	<nav>
		<a href="index.php">Chez Moe</a>
		<a href="questionnaires">Questionnaires</a>
	<?php
		if(empty($_SESSION['pseudo'])) {
	?>
		<a href="sign">Connexion</a>
	<?php
		}
		else {
	?>
		<a href="account">Compte</a>
	<?php
			if($info->range == "admin") {
	?>
		<a href="admin">Administration</a>
	<?php
			}
	?>
		<a href="logout">Déconnexion</a>

	<?php
		}
	?>
	</nav>

</body>
</html>