<?php
session_start();
if(!isset($_SESSION['membre'])){
	header('Location: login.php');
}
include 'partials/header.php';  
?>
	<section class="global-page animated fadeInUp">
		<article class="page">
			<a href="logout.php"><button class="logout">Se déconnecter</button></a>
			<h1><?php echo 'Bonjour '.($_SESSION['membre']); ?></h1>
			<?php include 'partials/footer.php'; ?>
			<?php include 'debug.php'; ?>
		</article>
	</section>




