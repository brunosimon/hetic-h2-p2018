<?php if(isset($_SESSION)){ ?>
	<nav class="menu">
		<ul>
	 		<li class="menu-item"><a href="index.php">Accueil</a></li>
	 		<li class= "menu-item"><?= $_SESSION['login'] ?></li>
	 		<li class="menu-item right"><a href="views/deconnexion.php">Déconnexion</a></li>
		</ul>	
	</nav>
 <?php }else{ ?>
	<nav class="menu">
 		<ul>
	 		<li class="menu-item"><a href="index.php">Accueil</a></li>
	 		<li class="menu-item right"><a href="views/connexion.php">Se connecter</a></li>
	 		<li class="menu-item right"><a href="views/inscription.php">S'inscrire</a></li>
 		</ul>	
 	</nav>
	<?php } ?>

