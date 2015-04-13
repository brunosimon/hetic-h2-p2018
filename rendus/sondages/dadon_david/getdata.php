<?php

// Voici le fichier qui s'occupe de récuperer le contenu demandé par les fonctions des graphiques dans result.js

require('config.php');

// Cette condition me permet de savoir quelle information je dois renvoyer, car chaque graphique envoie une request differente, je peux donc faire le trie entre les differentes requetes AJAX

if ($_POST['request']=='resultvote') {
	
	// Je vais chercher dans la BDD les éléments correspondant au but du graphique, j'utilise donc PDO pour cela,, les lignes en dessous montre la préparation à la récuperation
	
	$prepare = $pdo->prepare('SELECT vote, COUNT(*) FROM googlechart GROUP BY vote');
	$prepare->execute();
	
	
	// Je fais un fetchall pour recuperer ,le contenu, au vue de la configuration de mon pdo (dans config.php) PDO me renvoie donc un objet dans $stdclass
	
	$stdclass = $prepare->fetchall();
	
	
	// Je convertis mon objet en tableau (En le codant en JSON puis en le décodant) et je le sotcke dans $data
	
	$data = json_decode(json_encode($stdclass), true);
	
	
//  Ce qui se trouve en dessous est le "convertisseur" me servant à convertir mon tableau en JSON lisible par Google Visualization API (Plus d'infos sur la syntaxe de Google Visualization API ici : https://developers.google.com/chart/interactive/docs/reference#dataparam 

// Début du convertisseur 

// Je crée deux tableaux, un pour les lignes et l'autre pour les colonnes
	$rows = array();
	$table = array();
	$table ['cols'] = array(
	 array('label' => 'vote', 'type' => 'string'),
	 array('label' => 'result', 'type' => 'number')
	);
	
// Je récupère toujours en PDO un tableau contenant 2 colonnes, la premiere colonne servant en tant que "label"

// Je parcours le tableau $data (Obtenu via PDO plus haut) et je remplace les elemnts par ceux voulu par Google, je récupère au travers de la variable $r les éléments stockés dans $data


	foreach($data as $r) {
		$temp = array();
		$temp[] = array('v' => (string) $r['vote']);
		$temp[] = array('v' => (int) $r['COUNT(*)']); 
		$rows[] = array('c' => $temp);
		
	}
	$table['rows'] = $rows;
	
	// Après avoir placé $rows dans $table, je peux enfin convertir en JSON et faire un "echo" qui sera récuperé en AJAX
	$jsonTable = json_encode($table);
	
	// Fin du Convertisseur 
	
	echo $jsonTable;

};

if ($_POST['request']=='resultsex') {
	
	$prepare = $pdo->prepare('SELECT sex, COUNT(*) FROM googlechart GROUP BY sex');
	$prepare->execute();
	$stdclass = $prepare->fetchall();
	$data = json_decode(json_encode($stdclass), true);

	$rows = array();
	$table = array();
	$table ['cols'] = array(
	 array('label' => 'vote', 'type' => 'string'),
	 array('label' => 'result', 'type' => 'number')
	);

	foreach($data as $r) {
		$temp = array();
		$temp[] = array('v' => (string) $r['sex']);
		$temp[] = array('v' => (int) $r['COUNT(*)']); 
		$rows[] = array('c' => $temp);
		
	}
	$table['rows'] = $rows;
	$jsonTable = json_encode($table);
	echo $jsonTable;

};


if ($_POST['request']=='resultage') {
	
	// Cette requête SQL est un peu spéciale, en effet étant donnée que je ne peux pas me servir du nom de la première colonne en tant que label de mon graphique (Je recherche des ages, donc des nombres, ce qui est inutile pour un label) j'ai du "forcé" le nom des colonnes en mettant entre guillement le nom voulu après le SELECT.
	
	// De plus, je me suis servi de UNION dans SQL pour afficher deux resultats de deux requête differente dans le même tableau.
	
	$prepare = $pdo->prepare('SELECT "< 30 ans", COUNT(*) FROM googlechart WHERE age<30 UNION SELECT "> 30 ans", COUNT(*) FROM googlechart WHERE age>30');
	$prepare->execute();
	$stdclass = $prepare->fetchall();
	$data = json_decode(json_encode($stdclass), true);

	$rows = array();
	$table = array();
	$table ['cols'] = array(
	 array('label' => 'vote', 'type' => 'string'),
	 array('label' => 'result', 'type' => 'number')

	);

	foreach($data as $r) {
		$temp = array();
		$temp[] = array('v' => (string) $r['< 30 ans']);
		$temp[] = array('v' => (int) $r['COUNT(*)']); 
		$rows[] = array('c' => $temp);
		
	}
	$table['rows'] = $rows;
	$jsonTable = json_encode($table);
	echo $jsonTable;

};

if ($_POST['request']=='resultlocationvote') {
	
	$prepare = $pdo->prepare('SELECT city, COUNT(*) FROM googlechart GROUP BY city');
	$prepare->execute();
	$stdclass = $prepare->fetchall();
	$data = json_decode(json_encode($stdclass), true);

	$rows = array();
	$table = array();
	$table ['cols'] = array(
	 array('label' => 'vote', 'type' => 'string'),
	 array('label' => 'result', 'type' => 'number')

	);

	foreach($data as $r) {
		$temp = array();
		$temp[] = array('v' => (string) $r['city']);
		$temp[] = array('v' => (int) $r['COUNT(*)']); 
		$rows[] = array('c' => $temp);
		
	}
	$table['rows'] = $rows;
	$jsonTable = json_encode($table);
	echo $jsonTable;

};


if ($_POST['request']=='evolution') {
	
	$prepare = $pdo->prepare('SELECT date, COUNT(*) FROM googlechart GROUP BY date');
	$prepare->execute();
	$stdclass = $prepare->fetchall();
	$data = json_decode(json_encode($stdclass), true);

	$rows = array();
	$table = array();
	$table ['cols'] = array(
	 array('label' => 'vote', 'type' => 'string'),
	 array('label' => 'result', 'type' => 'number')

	);

	foreach($data as $r) {
		$temp = array();
		$temp[] = array('v' => (string) $r['date']);
		$temp[] = array('v' => (int) $r['COUNT(*)']); 
		$rows[] = array('c' => $temp);
		
	}
	$table['rows'] = $rows;
	$jsonTable = json_encode($table);
	echo $jsonTable;

};


if ($_POST['request']=='resultlocationvoteobamafemale') {
	
	$prepare = $pdo->prepare('SELECT city, COUNT(*) FROM googlechart WHERE vote="Obama" AND sex="Female" GROUP BY city');
	$prepare->execute();
	$stdclass = $prepare->fetchall();
	$data = json_decode(json_encode($stdclass), true);

	$rows = array();
	$table = array();
	$table ['cols'] = array(
	 array('label' => 'vote', 'type' => 'string'),
	 array('label' => 'result', 'type' => 'number')

	);

	foreach($data as $r) {
		$temp = array();
		$temp[] = array('v' => (string) $r['city']);
		$temp[] = array('v' => (int) $r['COUNT(*)']); 
		$rows[] = array('c' => $temp);
		
	}
	$table['rows'] = $rows;
	$jsonTable = json_encode($table);
	echo $jsonTable;

};


if ($_POST['request']=='resultvoteold') {
	
	$prepare = $pdo->prepare('SELECT "Romney", COUNT(*) FROM googlechart WHERE age>50 AND vote="Romney" UNION SELECT "Obama", COUNT(*) FROM googlechart WHERE age>50 AND vote="Obama" ');
	$prepare->execute();
	$stdclass = $prepare->fetchall();
	$data = json_decode(json_encode($stdclass), true);

	$rows = array();
	$table = array();
	$table ['cols'] = array(
	 array('label' => 'vote', 'type' => 'string'),
	 array('label' => 'result', 'type' => 'number')

	);

	foreach($data as $r) {
		$temp = array();
		$temp[] = array('v' => (string) $r['Romney']);
		$temp[] = array('v' => (int) $r['COUNT(*)']); 
		$rows[] = array('c' => $temp);
		
	}
	$table['rows'] = $rows;
	$jsonTable = json_encode($table);
	echo $jsonTable;

};


if ($_POST['request']=='resultvoteyoung') {
	
	$prepare = $pdo->prepare('SELECT "Romney", COUNT(*) FROM googlechart WHERE age<30 AND vote="Romney" UNION SELECT "Obama", COUNT(*) FROM googlechart WHERE age<30 AND vote="Obama" ');
	$prepare->execute();
	$stdclass = $prepare->fetchall();
	$data = json_decode(json_encode($stdclass), true);

	$rows = array();
	$table = array();
	$table ['cols'] = array(
	 array('label' => 'vote', 'type' => 'string'),
	 array('label' => 'result', 'type' => 'number')

	);

	foreach($data as $r) {
		$temp = array();
		$temp[] = array('v' => (string) $r['Romney']);
		$temp[] = array('v' => (int) $r['COUNT(*)']); 
		$rows[] = array('c' => $temp);
		
	}
	$table['rows'] = $rows;
	$jsonTable = json_encode($table);
	echo $jsonTable;

};


if ($_POST['request']=='resultvoteyoungwomenparis') {
	$prepare = $pdo->prepare('SELECT "Romney", COUNT(*) FROM googlechart WHERE age<24 AND age>18 AND vote="Romney"AND city="Paris" AND sex="female" UNION SELECT "Obama", COUNT(*) FROM googlechart WHERE age<24 AND age>18 AND vote="Obama" AND city="Paris" AND sex="female"');
	$prepare->execute();
	$stdclass = $prepare->fetchall();
	$data = json_decode(json_encode($stdclass), true);

	$rows = array();
	$table = array();
	$table ['cols'] = array(
	 array('label' => 'vote', 'type' => 'string'),
	 array('label' => 'result', 'type' => 'number')

	);

	foreach($data as $r) {
		$temp = array();
		$temp[] = array('v' => (string) $r['Romney']);
		$temp[] = array('v' => (int) $r['COUNT(*)']); 
		$rows[] = array('c' => $temp);
		
	}
	$table['rows'] = $rows;
	$jsonTable = json_encode($table);
	echo $jsonTable;

};



?>