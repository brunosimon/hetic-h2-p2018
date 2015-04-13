<?php


	$calm = 0;
	$serious = 0;
	$easyWork = 0;
	$radioactive = 0;

	require 'inc/config.php';

	// ADD values to caracteristic

	switch ($_SESSION['votes'][2]) {
	    case 1 :
	        $serious += 1;
	        break;
	    case 2 :
	        $serious -= 1;
	        break;
	    default :
	        $radioactive += 1;
	        break;
	}

	switch ($_SESSION['votes'][3]) {
	    case 3 :
	        $calm -= 1;
	        break;
	    case 4 :
	        $calm += 1;
	        break;
	    default :
	        $radioactive += 1;
	        break;
	}

	switch ($_SESSION['votes'][4]) {
	    case 5 :
	        $serious += 1;
	        break;
	    case 6 :
	        $serious -= 1;
	        break;
	    default :
	        $radioactive += 1;
	        break;
	}

	switch ($_SESSION['votes'][5]) {
	    case 7 :
	        $serious -= 1;
	        break;
	    case 8 :
	        $serious += 1;
	        break;
	    default :
	        $radioactive += 1;
	        break;
	}

	switch ($_SESSION['votes'][6]) {
	    case 9 :
	        $easyWork -= 1;
	        break;
	    case 10 :
	        $easyWork += 1;
	        break;
	    default :
	        $radioactive += 1;
	        break;
	}

	switch ($_SESSION['votes'][7]) {
	    case 11 :
	        $easyWork -= 1;
	        break;
	    case 12 :
	        $easyWork += 1;
	        break;
	    default :
	        $radioactive += 1;
	        break;
	}

	switch ($_SESSION['votes'][8]) {
	    case 13 :
	        $calm -= 1;
	        break;
	    case 14 :
	        $calm += 1;
	        break;
	    default :
	        $radioactive += 1;
	        break;
	}

	switch ($_SESSION['votes'][9]) {
	    case 15 :
	        $easyWork += 1;
	        break;
	    case 16 :
	        $easyWork -= 1;
	        break;
	    default :
	        $radioactive += 1;
	        break;
	}

	switch ($_SESSION['votes'][10]) {
	    case 17 :
	        $calm -= 1;
	        break;
	    case 18 :
	        $calm += 1;
	        break;
	    default :
	        $radioactive += 1;
	        break;
	}

	switch ($_SESSION['votes'][11]) {
	    case 19 :
	        $easyWork -= 1;
	        break;
	    case 20 :
	        $easyWork += 1;
	        break;
	    default :
	        $radioactive += 1;
	        break;
	}

	if ( $radioactive > 0 )
	{
		$img = 'img/special.jpg';
		$text = "Les radiatons vous ont légèrement affecté, on voit presque rien ! ( ça vous apprendra à tester les failles )<br><br>Vous êtes donc un ch..., une sorte de lapin ? Ptin c'est quoi ce monstre ?";
	} 

	else if ( $serious > 0 && $calm > 0 && $easyWork > 0 )
	{
		$img = 'img/smart.jpg';
		$text = "Bon, ba vous êtes parfait, vous gérez tranquil' (Je vous hais ).<br><br>Aux USA vous seriez la cible n°1 des brutes, Chat bon élève.";
	} 

	else if ( $serious < 0 && $calm > 0 && $easyWork > 0 )
	{
		$img = 'img/rouleau.jpg';
		$text = "Vous êtes gentil et très calme mais aussi très fainéant, inutile, vous ne servez à rien et vous restez dans votre coin.<br><br>vous êtes donc le rouleau de printemp. #bigTRoll";
	} 

	else if ( $serious > 0 && $calm < 0 && $easyWork > 0 )
	{
		$img = 'img/faith.jpg';
		$text = "Oh grand maitre chat ! Je vous ai enfin retrouvé ! Nous avons suivi les ordres à la lettre,<br><br>nous sommes enfin pret pour accomplir la prophéthie et s'emparer d'HETIC au nom de CIFACOM ! Grand maitre chat j'attend votre signal";
	} 
	else if ( $serious > 0 && $calm > 0 && $easyWork < 0 )
	{
		$img = 'img/secret-agent.jpg';
		$text = "AH HA ! SPOTTED !!! Vous êtes un ancient/actif agent secret, alors vous allez me versez 3 000 000£ sur un compte suisse sinon je révèlerais votre identité<br><br>Et puis bien sur j'ai pris certaines sécurités dans la cas où vous tenteriez de me tuer agent-secret, bisous xoxo.";
	} 

	else if ( $serious < 0 && $calm < 0 && $easyWork > 0 )
	{
		$img = 'img/wallstreet.jpg';
		$text = "Vous ne foutez rien mais ça vous n'empeche pas d'obtenir de putins de notes, en clair vous gérez !!!<br><br>Vous êtes donc le chat de wallstreet.";
	} 

	else if ( $serious > 0 && $calm < 0 && $easyWork < 0 )
	{
		$img = 'img/rabageois.jpg';
		$text = "Vous n'êtes jamais heureux, que se soit en cours ou en classe vous faites toujours la tête. En clair vous faites toujours chier.<br><br>Vous êtes le chat rabageois.";
	} 

	else if ( $serious < 0 && $calm > 0 && $easyWork < 0 )
	{
		$img = 'img/smiling.jpg';
		$text = "Ooooh trop mignons ! Comment on peut vous resistez hein ? avec ce sourire, c'est contagieux !<br><br>Vous êtes le chat chanceux ( c'est surment le résultat le plus poli et le moins drôle de tous ! )";	
	} 

	else if ( $serious < 0 && $calm < 0 && $easyWork < 0)
	{
		$img = 'img/gros-porc.jpg';
		$text = "il n'y a pas plus fainéant que vous, comment cela se fait que vous soyez encore à HETIC ? hein ?<br><br>Vous êtes donc le chat gros porc.";
	}

	else
	{
		$img = 'img/royal-cat.jpg';
		$text = "Vous avez des goûts plutôt exotique et vous avez les moyens de les satisfaire, vous êtes le roi des Sept Royaumes.<br><br>Attention la durée de vie du roi dans ce monde est très réduite, soyez sur vos gardes #gameOfThrones.";
	} 

	
?>


<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>Des chats à HETIC</title>
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<div class="container">
			<div class="text"><?= $text ?></div>
			<img class="gif" src="<?= $img ?>" alt="">
		</div>
	</body>
</html>

