<?php

require 'inc/config.php';

// // Create users
// $logins = array(
// 	'toto',
// 	'tata',
// 	'tutu',
// 	'titi',
// 	'tete',
// );

// foreach($logins as $_login)
// {
// 	$prepare = $pdo->prepare( 'INSERT INTO users (login) VALUES (:login)' );
// 	$prepare->execute(array(
// 		'login' => $_login
// 	));

// 	echo '<pre>';
// 	print_r($prepare);
// 	echo '</pre>';
// }


// // Create games
// $query = $pdo->query( 'SELECT * FROM users' );
// $users = $query->fetchAll();

// $games_count = 10;
// while( $games_count-- )
// {
// 	shuffle( $users );

// 	$id_user  = $users[ 0 ]->id;
// 	$score    = rand( 500, 10000 );
// 	$won      = rand( 0, 1 );

// 	$prepare = $pdo->prepare( 'INSERT INTO games (id_user,score,won) VALUES (:id_user,:score,:won)' );
// 	$prepare->execute( array(
// 		'id_user'  => $id_user,
// 		'score'    => $score,
// 		'won'      => $won,
// 	) );
// }


